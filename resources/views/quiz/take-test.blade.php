@extends('layouts.app')

@section('title', 'Test - {{ $category->title }}')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-aptiv-orange-900">
    <!-- Header -->
    <div class="bg-white/10 backdrop-blur-sm border-b border-white/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-white">{{ $category->title }}</h1>
                    <p class="text-gray-300">{{ $category->process->title }}</p>
                </div>
                <div class="text-right text-white">
                    <p class="text-sm text-gray-300">Candidat:</p>
                    <p class="font-semibold">{{ $test->user->name }} {{ $test->user->last_name }}</p>
                    <p class="text-sm text-gray-300">Formateur: {{ $test->formateur->name }} {{ $test->formateur->last_name }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quiz Container -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex items-center justify-between text-white mb-2">
                <span class="text-sm font-medium">Progression</span>
                <span class="text-sm" id="progress-text">Question 1 sur {{ $questions->count() }}</span>
            </div>
            <div class="w-full bg-gray-700 rounded-full h-3">
                <div class="bg-gradient-to-r from-aptiv-orange-500 to-aptiv-orange-400 h-3 rounded-full transition-all duration-300" 
                     id="progress-bar" style="width: {{ 100 / $questions->count() }}%"></div>
            </div>
        </div>

        <!-- Quiz Form -->
        <form id="quizForm" action="{{ route('quiz.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="test_id" value="{{ $test->id }}">
            
            <!-- Questions Container -->
            <div id="questions-container">
                @foreach($questions as $index => $question)
                    <div class="question-slide {{ $index === 0 ? 'active' : 'hidden' }}" data-question="{{ $index + 1 }}">
                        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                            <!-- Question Header -->
                            <div class="bg-gradient-to-r from-aptiv-orange-500 to-aptiv-orange-600 px-6 py-4">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg font-semibold text-white">
                                        Question {{ $index + 1 }}
                                    </h3>
                                    <div class="text-white/80 text-sm">
                                        {{ $index + 1 }} / {{ $questions->count() }}
                                    </div>
                                </div>
                            </div>

                            <!-- Question Content -->
                            <div class="p-8">
                                <!-- Question Text -->
                                @if($question->question_text)
                                    <div class="mb-6">
                                        <h4 class="text-xl font-medium text-gray-800 leading-relaxed">
                                            {{ $question->question_text }}
                                        </h4>
                                    </div>
                                @endif

                                <!-- Question Image -->
                                @if($question->image)
                                    <div class="mb-6">
                                        <img src="{{ asset('storage/' . $question->image) }}" 
                                             alt="Question Image" 
                                             class="max-w-full h-auto rounded-lg shadow-lg mx-auto max-h-96 object-contain">
                                    </div>
                                @endif

                                <!-- Answer Options -->
                                <div class="space-y-4">
                                    @foreach($question->repos as $repoIndex => $answer)
                                        <label class="answer-option block cursor-pointer">
                                            <input type="radio" 
                                                   name="answers[{{ $question->id }}]" 
                                                   value="{{ $answer->id }}" 
                                                   class="sr-only"
                                                   required>
                                            <div class="flex items-center p-4 border-2 border-gray-200 rounded-xl hover:border-aptiv-orange-300 hover:bg-aptiv-orange-50 transition-all duration-200 group">
                                                <div class="flex-shrink-0 w-8 h-8 mr-4">
                                                    <div class="w-full h-full rounded-full border-2 border-gray-300 group-hover:border-aptiv-orange-400 flex items-center justify-center transition-colors">
                                                        <div class="w-4 h-4 rounded-full bg-aptiv-orange-500 opacity-0 group-hover:opacity-50 transition-opacity answer-indicator"></div>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <span class="text-lg text-gray-800 group-hover:text-aptiv-orange-700 transition-colors">
                                                        {{ chr(65 + $repoIndex) }}. {{ $answer->answer_text }}
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigation Buttons -->
            <div class="mt-8 flex items-center justify-between">
                <button type="button" 
                        id="prevBtn" 
                        class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                    <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Précédent
                </button>

                <div class="text-center">
                    <div id="timer" class="text-white text-xl font-bold mb-2"></div>
                    <div class="text-gray-300 text-sm">Temps écoulé</div>
                </div>

                <button type="button" 
                        id="nextBtn" 
                        class="px-6 py-3 bg-aptiv-orange-500 text-white rounded-lg hover:bg-aptiv-orange-600 transition-colors">
                    Suivant
                    <svg class="w-5 h-5 ml-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>

                <button type="submit" 
                        id="submitBtn" 
                        class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors hidden">
                    Terminer le Test
                    <svg class="w-5 h-5 ml-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </button>
            </div>
        </form>

        <!-- Help Section -->
        <div class="mt-8 bg-white/10 backdrop-blur-sm rounded-xl p-6 text-white">
            <h4 class="font-semibold mb-3 flex items-center">
                <svg class="w-5 h-5 mr-2 text-aptiv-orange-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Instructions
            </h4>
            <ul class="space-y-2 text-sm text-gray-300">
                <li>• Lisez attentivement chaque question avant de répondre</li>
                <li>• Sélectionnez une seule réponse par question</li>
                <li>• Vous pouvez naviguer entre les questions avec les boutons Précédent/Suivant</li>
                <li>• Cliquez sur "Terminer le Test" une fois toutes les questions répondues</li>
            </ul>
        </div>
    </div>
</div>

<script>
// Quiz functionality
let currentQuestion = 0;
const totalQuestions = {{ $questions->count() }};
let startTime = new Date();

// Timer
function updateTimer() {
    const now = new Date();
    const elapsed = Math.floor((now - startTime) / 1000);
    const minutes = Math.floor(elapsed / 60);
    const seconds = elapsed % 60;
    document.getElementById('timer').textContent = 
        `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
}

setInterval(updateTimer, 1000);

// Navigation
function showQuestion(index) {
    // Hide all questions
    document.querySelectorAll('.question-slide').forEach(slide => {
        slide.classList.add('hidden');
        slide.classList.remove('active');
    });
    
    // Show current question
    const currentSlide = document.querySelector(`.question-slide[data-question="${index + 1}"]`);
    if (currentSlide) {
        currentSlide.classList.remove('hidden');
        currentSlide.classList.add('active');
    }
    
    // Update progress
    const progress = ((index + 1) / totalQuestions) * 100;
    document.getElementById('progress-bar').style.width = `${progress}%`;
    document.getElementById('progress-text').textContent = `Question ${index + 1} sur ${totalQuestions}`;
    
    // Update navigation buttons
    document.getElementById('prevBtn').disabled = index === 0;
    
    if (index === totalQuestions - 1) {
        document.getElementById('nextBtn').classList.add('hidden');
        document.getElementById('submitBtn').classList.remove('hidden');
    } else {
        document.getElementById('nextBtn').classList.remove('hidden');
        document.getElementById('submitBtn').classList.add('hidden');
    }
}

// Event listeners
document.getElementById('nextBtn').addEventListener('click', function() {
    if (currentQuestion < totalQuestions - 1) {
        currentQuestion++;
        showQuestion(currentQuestion);
    }
});

document.getElementById('prevBtn').addEventListener('click', function() {
    if (currentQuestion > 0) {
        currentQuestion--;
        showQuestion(currentQuestion);
    }
});

// Answer selection styling
document.querySelectorAll('.answer-option input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', function() {
        // Reset all options in this question
        const questionSlide = this.closest('.question-slide');
        questionSlide.querySelectorAll('.answer-option').forEach(option => {
            const border = option.querySelector('div');
            const indicator = option.querySelector('.answer-indicator');
            border.classList.remove('border-aptiv-orange-500', 'bg-aptiv-orange-100');
            border.classList.add('border-gray-200');
            indicator.classList.remove('opacity-100');
            indicator.classList.add('opacity-0');
        });
        
        // Highlight selected option
        const selectedOption = this.closest('.answer-option');
        const border = selectedOption.querySelector('div');
        const indicator = selectedOption.querySelector('.answer-indicator');
        border.classList.remove('border-gray-200');
        border.classList.add('border-aptiv-orange-500', 'bg-aptiv-orange-100');
        indicator.classList.remove('opacity-0');
        indicator.classList.add('opacity-100');
    });
});

// Form submission
document.getElementById('quizForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Check if all questions are answered
    const totalAnswered = document.querySelectorAll('input[type="radio"]:checked').length;
    
    if (totalAnswered < totalQuestions) {
        alert(`Veuillez répondre à toutes les questions. Vous avez répondu à ${totalAnswered} sur ${totalQuestions} questions.`);
        return;
    }
    
    if (confirm('Êtes-vous sûr de vouloir soumettre votre test ? Vous ne pourrez plus modifier vos réponses.')) {
        const submitBtn = document.getElementById('submitBtn');
        submitBtn.innerHTML = 'Soumission en cours...';
        submitBtn.disabled = true;
        this.submit();
    }
});

// Initialize
showQuestion(0);
</script>
@endsection
