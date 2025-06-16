@extends('layouts.app')

@section('title', 'Aptiv - Shape the Future of Mobility')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-gray-900 to-black text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                Leading the Way to the Future of Mobility
            </h1>
            <p class="text-xl text-gray-200 mb-8 leading-relaxed">
                With our deep domain expertise, Aptiv is developing solutions that solve our customers' toughest challenges. 
                We are enabling the transition to software-defined vehicles supported by electrified and intelligently connected architectures.
            </p>              <div class="flex flex-col sm:flex-row gap-4">
                <a href="https://www.aptiv.com/en/solutions" class="btn-primary inline-block text-center">
                    READ MORE
                </a>
                <a href="{{ route('admin.login') }}" class="btn-orange-outline inline-block text-center">
                    ADMIN PORTAL
                </a>
            </div>
        </div>
    </div>
    
    <!-- Background Image/Video placeholder -->
    <div class="absolute inset-0 -z-10">
        <div class="w-full h-full bg-gradient-to-r from-black to-gray-800"></div>
    </div>
</section>

<!-- End-to-End Solutions Section -->
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Nos Processus</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Découvrez nos différents processus de production qui garantissent la qualité et l'efficacité de nos opérations industrielles.
            </p>
        </div>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">             @foreach($processes as $process)
            <!-- {{ $process->title }} -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border-t-4 border-aptiv-orange-500">                <div class="h-48 bg-gradient-to-br from-gray-600 to-gray-800 relative flex items-center justify-center">
                    @if(str_contains(strtolower($process->title), 'assemblage'))
                        <img src="{{ asset('images/assembly-process.svg') }}" alt="{{ $process->title }} Icon" class="w-full h-full object-cover">
                    @elseif(str_contains(strtolower($process->title), 'coupe'))
                        <img src="{{ asset('images/cutting-process.svg') }}" alt="{{ $process->title }} Icon" class="w-full h-full object-cover">
                    @elseif(str_contains(strtolower($process->title), 'lp'))
                        <img src="{{ asset('images/line-production.svg') }}" alt="{{ $process->title }} Icon" class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('images/default-process.svg') }}" alt="{{ $process->title }} Icon" class="w-full h-full object-cover">
                    @endif
                </div>                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $process->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $process->description }}</p>
                    <a href="{{ route('process.categories', $process) }}" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium">Learn More →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
