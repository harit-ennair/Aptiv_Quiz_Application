@extends('layouts.app')

@section('title', 'Tableau de Bord Administrateur - Aptiv')

@push('styles')
<style>
    /* Custom animations and effects */
    .modal {
        transition: opacity 0.25s ease;
        backdrop-filter: blur(4px);
    }
    .modal-body {
        transition: transform 0.25s ease;
        animation: modalSlideIn 0.3s ease-out;
    }
    
    @keyframes modalSlideIn {
        from {
            transform: scale(0.9) translateY(-20px);
            opacity: 0;
        }
        to {
            transform: scale(1) translateY(0);
            opacity: 1;
        }
    }
    
    .spinner {
        border: 2px solid #f3f3f3;
        border-top: 2px solid #ea580c;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* Enhanced hover effects */
    .card-hover {
        transition: all 0.2s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    
    /* Sidebar improvements */
    .nav-link {
        transition: all 0.2s ease;
        position: relative;
    }
    
    .nav-link:hover {
        transform: translateX(4px);
    }
    
    .nav-link.active::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 3px;
        height: 20px;
        background-color: #ea580c;
        border-radius: 0 2px 2px 0;
    }
    
    /* Message animations */
    .message-enter {
        animation: slideInRight 0.3s ease-out;
    }
    
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    /* Better focus states */
    .focus-ring:focus {
        outline: none;
        ring-width: 2px;
        ring-color: #ea580c;
        ring-opacity: 0.5;
    }
    
    /* Touch-friendly buttons */
    .btn-touch {
        min-height: 44px;
        touch-action: manipulation;
    }
    
    /* Responsive table improvements */
    @media (max-width: 1024px) {
        .table-compact {
            font-size: 0.875rem;
        }
        
        .table-compact th,
        .table-compact td {
            padding: 0.75rem 0.5rem;
        }
    }
    
    /* Mobile form optimization */
    @media (max-width: 640px) {
        .form-mobile input,
        .form-mobile select,
        .form-mobile textarea {
            font-size: 16px; /* Prevents zoom on iOS */
        }
        
        .modal-body {
            margin: 1rem;
            max-height: calc(100vh - 2rem);
        }
    }
    
    /* Loading state improvements */
    .loading-overlay {
        backdrop-filter: blur(2px);
    }    /* Custom scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #a1a1a1;
    }

    /* Smooth transitions for better UX */
    * {
        scroll-behavior: smooth;
    }

    /* Prevent horizontal scroll */
    body {
        overflow-x: hidden;
    }

    /* Improve touch targets for mobile */
    .btn-touch {
        min-height: 44px;
        min-width: 44px;
    }
      /* Enhanced Layout Structure */
    .dashboard-layout {
        display: flex;
        min-height: 100vh;
        position: relative;
    }
    
    /* Sidebar positioning for desktop */
    @media (min-width: 1024px) {
        .sidebar-desktop {
            position: fixed;
            top: 0;
            left: 0;
            width: 16rem;
            height: 100vh;
            z-index: 40;
            overflow-y: auto;
        }
        
        .main-content-desktop {
            margin-left: 16rem;
            width: calc(100% - 16rem);
            min-height: 100vh;
        }
    }
    
    /* Mobile sidebar positioning */
    @media (max-width: 1023px) {
        .sidebar-mobile {
            position: fixed;
            top: 0;
            left: 0;
            width: 16rem;
            height: 100vh;
            z-index: 50;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            overflow-y: auto;
        }
        
        .sidebar-mobile.open {
            transform: translateX(0);
        }
        
        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 40;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }
        
        .mobile-overlay.show {
            opacity: 1;
            visibility: visible;
        }
        
        .main-content-mobile {
            width: 100%;
            min-height: 100vh;
        }
    }
    
    /* Ensure proper header positioning */
    .header-sticky {
        position: sticky;
        top: 0;
        z-index: 30;
    }
    
    /* Content area improvements */
    .content-area {
        flex: 1;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }
      .scrollable-content {
        flex: 1;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* Improve touch targets for mobile */
    .btn-touch {
        min-height: 44px;
        min-width: 44px;
    }

    @media (max-width: 640px) {
        .btn-touch {
            min-height: 48px;
            min-width: 48px;
        }
    }

    /* Fix modal positioning */
    .modal-container {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 60;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
    }

    /* Prevent body scroll when modal is open */
    body.modal-open {
        overflow: hidden;
    }    /* Ensure proper stacking order */
    .z-modal { z-index: 60; }
    .z-overlay { z-index: 50; }
    .z-sidebar { z-index: 40; }
    .z-header { z-index: 30; }
    .z-content { z-index: 10; }
    
    /* Force hide tables on mobile */
    @media (max-width: 1023px) {
        #tests-table,
        #formateurs-table,
        #categories-table,
        #processes-table {
            display: none !important;
        }
        
        #tests-mobile,
        #formateurs-mobile,
        #categories-mobile,
        #processes-mobile {
            display: block !important;
        }
    }
</style>
@endpush

@section('content')
<div class="dashboard-layout bg-gray-50">
    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" class="mobile-overlay lg:hidden"></div>
    
    <!-- Sidebar -->
    <div id="sidebar" class="bg-white shadow-xl custom-scrollbar sidebar-mobile lg:sidebar-desktop">
        <div class="flex items-center justify-between h-16 px-4 bg-gradient-to-r from-aptiv-orange-600 to-aptiv-orange-700 flex-shrink-0">
            <h1 class="text-lg lg:text-xl font-bold text-white">Admin Panel</h1>
            <button id="sidebar-close" class="lg:hidden text-white hover:text-gray-200 p-1 rounded-md transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
          <nav class="flex-1 overflow-y-auto custom-scrollbar">
            <div class="px-4 my-6">
                <div class="flex items-center p-3 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl shadow-sm">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 bg-gradient-to-r from-aptiv-orange-500 to-aptiv-orange-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-md">
                        <span class="text-white font-bold text-sm lg:text-base">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                    <div class="ml-3 min-w-0 flex-1">
                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $user->name }} {{ $user->last_name }}</p>
                        <p class="text-xs text-gray-600 truncate bg-aptiv-orange-100 text-aptiv-orange-700 px-2 py-1 rounded-full inline-block mt-1">{{ $user->role->name ?? 'Admin' }}</p>
                    </div>
                </div>
            </div>
            
            <div class="space-y-1 px-3">
                <a href="#" onclick="showSection('dashboard')" class="nav-link flex items-center px-3 py-3 text-gray-700 hover:bg-aptiv-orange-50 hover:text-aptiv-orange-600 rounded-xl transition-all duration-200 active bg-aptiv-orange-50 text-aptiv-orange-600">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 5 4-3 4 3"></path>
                    </svg>
                    <span class="truncate font-medium">Tableau de bord</span>
                </a>
                
                <a href="#" onclick="showSection('profile')" class="nav-link flex items-center px-3 py-3 text-gray-700 hover:bg-aptiv-orange-50 hover:text-aptiv-orange-600 rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="truncate font-medium">Mon Profil</span>
                </a>
                
                <a href="#" onclick="showSection('processes')" class="nav-link flex items-center px-3 py-3 text-gray-700 hover:bg-aptiv-orange-50 hover:text-aptiv-orange-600 rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <span class="truncate font-medium">Processus</span>
                </a>
                
                <a href="#" onclick="showSection('categories')" class="nav-link flex items-center px-3 py-3 text-gray-700 hover:bg-aptiv-orange-50 hover:text-aptiv-orange-600 rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <span class="truncate font-medium">Catégories</span>
                </a>
                
                <a href="#" onclick="showSection('formateurs')" class="nav-link flex items-center px-3 py-3 text-gray-700 hover:bg-aptiv-orange-50 hover:text-aptiv-orange-600 rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                    </svg>
                    <span class="truncate font-medium">Formateurs</span>
                </a>
                  <a href="#" onclick="showSection('tests')" class="nav-link flex items-center px-3 py-3 text-gray-700 hover:bg-aptiv-orange-50 hover:text-aptiv-orange-600 rounded-xl transition-all duration-200">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                    <span class="truncate font-medium">Tests</span>
                </a>
                
                <!-- Separator -->
                <div class="my-4 border-t border-gray-200"></div>
                
                <!-- Logout Button -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="nav-link w-full flex items-center px-3 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-xl transition-all duration-200 btn-touch">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="font-medium">Déconnexion</span>
                    </button>
                </form>
            </div></nav>
    </div>
    
    <!-- Main Content -->
    <div class="content-area main-content-mobile lg:main-content-desktop">
        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b header-sticky flex-shrink-0">
            <div class="flex items-center justify-between px-4 lg:px-6 py-3 lg:py-4">
                <div class="flex items-center min-w-0 flex-1">
                    <button id="sidebar-toggle" class="lg:hidden mr-3 p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors btn-touch">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <h1 id="page-title" class="text-xl lg:text-3xl font-bold text-gray-900 truncate bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Tableau de Bord</h1>
                </div>
                
                <div class="flex items-center space-x-3 lg:space-x-4 flex-shrink-0">
                    <span class="px-3 py-1.5 lg:px-4 lg:py-2 text-xs lg:text-sm font-semibold bg-gradient-to-r from-aptiv-orange-100 to-aptiv-orange-200 text-aptiv-orange-800 rounded-full shadow-sm">
                        {{ $user->role->name ?? 'Administrateur' }}
                    </span>
                </div>
            </div>
        </header>
        
        <!-- Content Area -->
        <main class="scrollable-content p-4 lg:p-8 bg-gray-50">
            <!-- Dashboard Section -->
            <div id="dashboard-section" class="section">
                @include('admin.sections.dashboard-stats')
            </div>
            
            <!-- Profile Section -->
            <div id="profile-section" class="section hidden">
                @include('admin.sections.profile')
            </div>
            
            <!-- Processes Section -->
            <div id="processes-section" class="section hidden">
                @include('admin.sections.processes')
            </div>
            
            <!-- Categories Section -->
            <div id="categories-section" class="section hidden">
                @include('admin.sections.categories')
            </div>
            
            <!-- Formateurs Section -->
            <div id="formateurs-section" class="section hidden">
                @include('admin.sections.formateurs')
            </div>
            
            <!-- Tests Section -->
            <div id="tests-section" class="section hidden">
                @include('admin.sections.tests')
            </div>
        </main>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loading-overlay" class="loading-overlay fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg p-6 flex items-center shadow-xl">
        <div class="spinner mr-3"></div>
        <span class="text-gray-700">Chargement...</span>
    </div>
</div>

<!-- Success/Error Messages -->
<div id="message-container" class="fixed top-4 right-4 z-50 space-y-2 max-w-sm w-full"></div>

@endsection

@push('scripts')
<script src="{{ asset('js/admin-dashboard.js') }}"></script>
<script>
    // Auto-navigate to section if specified in URL or backend
    document.addEventListener('DOMContentLoaded', function() {
        @if(isset($activeSection))
            // Show the specified section from backend
            if (window.adminDashboard) {
                window.adminDashboard.showSection('{{ $activeSection }}');
            }
        @endif
        
        // Handle URL hash for direct section access
        const hash = window.location.hash.replace('#', '');
        const validSections = ['dashboard', 'profile', 'processes', 'categories', 'formateurs', 'tests'];
        
        if (hash && validSections.includes(hash)) {
            setTimeout(() => {
                if (window.adminDashboard) {
                    window.adminDashboard.showSection(hash);
                }
            }, 100);
        }
    });
</script>
@endpush
