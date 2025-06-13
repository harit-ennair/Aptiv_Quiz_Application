<header class="bg-black shadow-sm sticky top-0 z-50">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/aptiv-official.svg') }}" alt="Aptiv" class="h-5 w-auto">
                </a>
            </div>            <!-- Desktop Navigation -->
            <div class="hidden md:block">                <div class="ml-10 flex items-baseline space-x-10">
                    <div class="relative group">
                        <a href="https://www.aptiv.com/en/solutions" class="text-white hover:text-aptiv-orange-400 px-3 py-2 text-sm font-medium transition-colors duration-200">
                            Solutions
                        </a>
                        <!-- Dropdown would go here -->
                    </div>
                    
                    <div class="relative group">
                        <a href="https://www.aptiv.com/en/insights" class="text-white hover:text-aptiv-orange-400 px-3 py-2 text-sm font-medium transition-colors duration-200">
                            Insights
                        </a>
                    </div>
                    
                    <a href="https://www.aptiv.com/en/about" class="text-white hover:text-aptiv-orange-400 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        About
                    </a>
                    
                    <a href="https://www.aptiv.com/en/jobs" class="text-white hover:text-aptiv-orange-400 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Careers
                    </a>
                    
                    <a href="https://www.aptiv.com/en/newsroom" class="text-white hover:text-aptiv-orange-400 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Newsroom
                    </a>
                    
                    <a href="https://www.aptiv.com/en/contact" class="text-white hover:text-aptiv-orange-400 px-3 py-2 text-sm font-medium transition-colors duration-200">
                        Contact
                    </a>
                </div>
            </div>

            <!-- Search and Mobile menu button -->            <div class="flex items-center">
                <!-- Search Icon -->
                <a ahref="https://www.aptiv.com/en/global-search" class="text-white hover:text-aptiv-orange-400 p-2 mr-2 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </a>                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-white hover:text-aptiv-orange-400 p-2 transition-colors duration-200">
                        <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-black border-t border-gray-800">
                <div class="block">
                    <a href="https://www.aptiv.com/en/solutions" class="text-white hover:text-aptiv-orange-400 block px-3 py-2 text-base font-medium transition-colors duration-200">
                        Solutions
                    </a>
                </div>
                
                <div class="block">
                    <a href="https://www.aptiv.com/en/insights" class="text-white hover:text-aptiv-orange-400 block px-3 py-2 text-base font-medium transition-colors duration-200">
                        Insights
                    </a>
                </div>
                
                <a href="https://www.aptiv.com/en/about" class="text-white hover:text-aptiv-orange-400 block px-3 py-2 text-base font-medium transition-colors duration-200">
                    About
                </a>
                
                <a href="https://www.aptiv.com/en/jobs" class="text-white hover:text-aptiv-orange-400 block px-3 py-2 text-base font-medium transition-colors duration-200">
                    Careers
                </a>
                
                <a href="https://www.aptiv.com/en/newsroom" class="text-white hover:text-aptiv-orange-400 block px-3 py-2 text-base font-medium transition-colors duration-200">
                    Newsroom
                </a>
                
                <a href="https://www.aptiv.com/en/contact" class="text-white hover:text-aptiv-orange-400 block px-3 py-2 text-base font-medium transition-colors duration-200">
                    Contact
                </a>
            </div>
        </div>
    </nav>
</header>
