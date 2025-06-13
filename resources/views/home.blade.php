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
            </p>            <div class="flex flex-col sm:flex-row gap-4">
                <a href="https://www.aptiv.com/en/solutions" class="btn-primary inline-block text-center">
                    READ MORE
                </a>
                <a href="#" class="btn-orange-outline inline-block text-center">
                    WATCH VIDEO
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
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">End-to-End Solutions</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Discover our comprehensive portfolio of technologies that power the safe, green, and connected future of mobility.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">            <!-- ADAS & Autonomous Driving -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border-t-4 border-aptiv-orange-500">
                <div class="h-48 bg-gradient-to-br from-gray-700 to-black relative flex items-center justify-center">
                    <img src="{{ asset('images/adas-icon.svg') }}" alt="ADAS Icon" class="w-24 h-24">
                </div><div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">ADAS & Autonomous Driving</h3>
                    <p class="text-gray-600 mb-4">Advanced driver assistance systems and autonomous driving technologies that enhance safety and convenience.</p>
                    <a href="#" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium">Learn More →</a>
                </div>
            </div>
              <!-- User Experience -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border-t-4 border-aptiv-orange-500">
                <div class="h-48 bg-gradient-to-br from-aptiv-orange-400 to-aptiv-orange-600 relative flex items-center justify-center">
                    <img src="{{ asset('images/ux-icon.svg') }}" alt="UX Icon" class="w-24 h-24">
                </div>                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">User Experience</h3>
                    <p class="text-gray-600 mb-4">Intelligent interfaces and connected services that create intuitive and personalized mobility experiences.</p>
                    <a href="#" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium">Learn More →</a>
                </div>
            </div>
              <!-- Vehicle Architecture -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border-t-4 border-aptiv-orange-500">
                <div class="h-48 bg-gradient-to-br from-gray-600 to-gray-800 relative flex items-center justify-center">
                    <img src="{{ asset('images/architecture-icon.svg') }}" alt="Architecture Icon" class="w-24 h-24">
                </div>                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Vehicle Architecture</h3>
                    <p class="text-gray-600 mb-4">Scalable and flexible architectures that enable software-defined vehicles and electrification.</p>
                    <a href="#" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium">Learn More →</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Insights Section -->
<section class="py-16 lg:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Insights</h2>
            <p class="text-lg text-gray-600 mb-8">
                Explore the future of mobility with Aptiv's experts
            </p>
            <p class="text-gray-600 max-w-3xl mx-auto">
                Develop a richer understanding of the fundamental technologies shaping the safe, green and connected future of mobility.
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">            <!-- Featured Insight -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border-l-4 border-aptiv-orange-500">
                <div class="h-64 bg-gradient-to-br from-gray-800 to-gray-900"></div>
                <div class="p-6">
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-white bg-aptiv-orange-600 rounded-full mb-3">ADAS</span>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">How the 'Ice Cube' Sensor Supports Better ADAS</h3>
                    <p class="text-gray-600 mb-4">Discover how innovative sensor technology is revolutionizing advanced driver assistance systems.</p>
                    <span class="text-sm text-gray-500">April 11, 2025</span>
                </div>
            </div>
            
            <!-- Recent Insights -->
            <div class="space-y-6">                <div class="bg-white rounded-lg shadow-md p-6 border-l-2 border-aptiv-orange-300">
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-white bg-aptiv-orange-600 rounded-full mb-3">AUTONOMOUS DRIVING</span>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">The Key to Truly Humanlike Driving</h3>
                    <p class="text-gray-600 text-sm mb-2">Exploring the technologies that make autonomous vehicles more intuitive and safe.</p>
                    <span class="text-sm text-gray-500">December 12, 2024</span>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-6 border-l-2 border-aptiv-orange-300">
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-white bg-aptiv-orange-600 rounded-full mb-3">INNOVATION</span>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Revolution in Design and Implementation</h3>
                    <p class="text-gray-600 text-sm mb-2">How vehicle architecture is evolving to support next-generation mobility solutions.</p>
                    <span class="text-sm text-gray-500">November 28, 2024</span>
                </div>
            </div>
        </div>
        
        <div class="text-center">
            <a href="#" class="btn-primary">
                LEARN MORE
            </a>
        </div>
    </div>
</section>

<!-- Aptiv Highlights Section -->
<section class="py-16 lg:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Aptiv Highlights</h2>
            <p class="text-xl text-gray-600">Going Beyond the Possibilities</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">            <!-- Sustainability -->
            <div class="group cursor-pointer">
                <div class="bg-gradient-to-br from-green-500 to-green-700 h-64 rounded-lg mb-6 group-hover:shadow-xl transition-shadow duration-300"></div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Sustainability</h3>
                <p class="text-gray-600">
                    Sustainability starts with our product portfolio, helping to solve our customers' safe, green and connected challenges, 
                    and extends to how we operate.
                </p>                <a href="#" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium inline-block mt-3">Download the 2024 Report →</a>
            </div>
            
            <!-- Partnership -->
            <div class="group cursor-pointer">
                <div class="bg-gradient-to-br from-aptiv-orange-500 to-aptiv-orange-700 h-64 rounded-lg mb-6 group-hover:shadow-xl transition-shadow duration-300"></div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">ServiceNow and Aptiv</h3>
                <p class="text-gray-600">
                    Driving intelligent automation and operational resilience across telco, automotive, enterprise and industrial sectors.
                </p>
                <a href="#" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium inline-block mt-3">Learn More →</a>
            </div>
            
            <!-- Careers -->
            <div class="group cursor-pointer">
                <div class="bg-gradient-to-br from-gray-600 to-gray-800 h-64 rounded-lg mb-6 group-hover:shadow-xl transition-shadow duration-300"></div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Join Our Growing Software Engineering Team</h3>
                <p class="text-gray-600">
                    Be part of the team that's shaping the future of mobility through innovative software solutions and cutting-edge technology.
                </p>
                <a href="#" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 font-medium inline-block mt-3">Explore Opportunities →</a>
            </div>
        </div>
    </div>
</section>


@endsection
