<?php

namespace App\Http\Controllers;

use App\Models\quz;
use App\Models\repo;
use App\Models\categories;
use App\Http\Requests\StorequzRequest;
use App\Http\Requests\UpdatequzRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuzController extends Controller
{
    /**
     * Handle image upload for questions
     */
    private function handleImageUpload($image)
    {
        if (!$image) return null;

        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/questions', $filename);
        return $filename;
    }

    /**
     * Delete image file from storage
     */
    private function deleteImage($imagePath)
    {
        if ($imagePath && Storage::exists('public/questions/' . $imagePath)) {
            Storage::delete('public/questions/' . $imagePath);
        }
    }
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
        try {
            // Debug: log the incoming request data
            \Log::info('Question store request data:', $request->all());
            
            $validated = $request->validated();
            \Log::info('Question store validated data:', $validated);

            // Ensure at least one correct answer
            $correctAnswers = collect($validated['answers'])->filter(function($answer) {
                return in_array($answer['is_correct'], ['1', 'true', true], true);
            });
            if ($correctAnswers->count() < 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Il doit y avoir au moins une réponse correcte'
                ], 422);
            }

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->handleImageUpload($request->file('image'));
        }

        $question = quz::create([
            'question_text' => $validated['question_text'] ?? null,
            'image_path' => $imagePath,
            'categories_id' => $validated['categories_id'],
        ]);

        foreach ($validated['answers'] as $answer) {
            repo::create([
                'answer_text' => $answer['answer_text'],
                'quz_id' => $question->id,
                'is_correct' => in_array($answer['is_correct'], ['1', 'true', true], true),
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Question créée avec succès',
            'data' => $question->load(['category.process', 'repos'])
        ]);
        } catch (\Exception $e) {
            \Log::error('Error creating question: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la création de la question'
            ], 500);
        }
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
        // Debug: log the incoming request data
        \Log::info('Question update request data:', $request->all());
        
        $validated = $request->validated();

        // Ensure at least one correct answer
        $correctAnswers = collect($validated['answers'])->filter(function($answer) {
            return in_array($answer['is_correct'], ['1', 'true', true], true);
        });
        if ($correctAnswers->count() < 1) {
            return response()->json([
                'success' => false,
                'message' => 'Il doit y avoir au moins une réponse correcte'
            ], 422);
        }

        // Handle image update
        $imagePath = $quz->image_path;
        
        // If removing image
        if ($request->has('remove_image') && $request->remove_image) {
            $this->deleteImage($quz->image_path);
            $imagePath = null;
        }
        
        // If uploading new image
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($quz->image_path) {
                $this->deleteImage($quz->image_path);
            }
            $imagePath = $this->handleImageUpload($request->file('image'));
        }

        $quz->update([
            'question_text' => $validated['question_text'] ?? null,
            'image_path' => $imagePath,
            'categories_id' => $validated['categories_id'],
        ]);

        // Delete existing answers and create new ones
        $quz->repos()->delete();

        foreach ($validated['answers'] as $answer) {
            repo::create([
                'answer_text' => $answer['answer_text'],
                'quz_id' => $quz->id,
                'is_correct' => in_array($answer['is_correct'], ['1', 'true', true], true),
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
        // Delete associated image if exists
        if ($quz->image_path) {
            $this->deleteImage($quz->image_path);
        }

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
