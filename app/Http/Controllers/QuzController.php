<?php

namespace App\Http\Controllers;

use App\Models\quz;
use App\Models\repo;
use App\Models\categories;
use App\Http\Requests\StorequzRequest;
use App\Http\Requests\UpdatequzRequest;
use Illuminate\Http\Request;

class QuzController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = quz::with(['category.process', 'repos'])->get();
        return response()->json([
            'success' => true,
            'data' => $questions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorequzRequest $request)
    {
        $validated = $request->validated();

        // Ensure exactly one correct answer
        $correctAnswers = collect($validated['answers'])->where('is_correct', true);
        if ($correctAnswers->count() !== 1) {
            return response()->json([
                'success' => false,
                'message' => 'Il doit y avoir exactement une réponse correcte'
            ], 422);
        }

        $question = quz::create([
            'question_text' => $validated['question_text'],
            'categories_id' => $validated['categories_id'],
        ]);

        foreach ($validated['answers'] as $answer) {
            repo::create([
                'answer_text' => $answer['answer_text'],
                'quz_id' => $question->id,
                'is_correct' => $answer['is_correct'] ?? false,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Question créée avec succès',
            'data' => $question->load(['category.process', 'repos'])
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(quz $quz)
    {
        return response()->json([
            'success' => true,
            'data' => $quz->load(['category.process', 'repos'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatequzRequest $request, quz $quz)
    {
        $validated = $request->validated();

        // Ensure exactly one correct answer
        $correctAnswers = collect($validated['answers'])->where('is_correct', true);
        if ($correctAnswers->count() !== 1) {
            return response()->json([
                'success' => false,
                'message' => 'Il doit y avoir exactement une réponse correcte'
            ], 422);
        }

        $quz->update([
            'question_text' => $validated['question_text'],
            'categories_id' => $validated['categories_id'],
        ]);

        // Delete existing answers and create new ones
        $quz->repos()->delete();

        foreach ($validated['answers'] as $answer) {
            repo::create([
                'answer_text' => $answer['answer_text'],
                'quz_id' => $quz->id,
                'is_correct' => $answer['is_correct'] ?? false,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Question mise à jour avec succès',
            'data' => $quz->load(['category.process', 'repos'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(quz $quz)
    {
        $quz->delete();

        return response()->json([
            'success' => true,
            'message' => 'Question supprimée avec succès'
        ]);
    }

    /**
     * Get questions by category
     */
    public function getByCategory(categories $category)
    {
        $questions = $category->quzs()->with('repos')->get();
        
        return response()->json([
            'success' => true,
            'data' => $questions
        ]);
    }
}
