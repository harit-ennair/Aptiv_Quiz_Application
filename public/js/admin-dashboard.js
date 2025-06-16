// Admin Dashboard JavaScript
class AdminDashboard {
    constructor() {
        this.currentSection = 'dashboard';
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.setupCSRF();
        this.loadInitialData();
    }    setupEventListeners() {
        // Sidebar toggle for mobile
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarClose = document.getElementById('sidebar-close');
        const overlay = document.getElementById('mobile-menu-overlay');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.add('open');
                overlay.classList.add('show');
            });
        }

        if (sidebarClose) {
            sidebarClose.addEventListener('click', () => {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
            });
        }

        if (overlay) {
            overlay.addEventListener('click', () => {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
            });
        }

        // Profile form
        const profileForm = document.getElementById('profile-form');
        if (profileForm) {
            profileForm.addEventListener('submit', (e) => this.handleProfileUpdate(e));
        }

        // Process form
        const processForm = document.getElementById('process-form');
        if (processForm) {
            processForm.addEventListener('submit', (e) => this.handleProcessSubmit(e));
        }

        // Category form
        const categoryForm = document.getElementById('category-form');
        if (categoryForm) {
            categoryForm.addEventListener('submit', (e) => this.handleCategorySubmit(e));
        }

        // Formateur form
        const formateurForm = document.getElementById('formateur-form');
        if (formateurForm) {
            formateurForm.addEventListener('submit', (e) => this.handleFormateurSubmit(e));
        }

        // Test form
        const testForm = document.getElementById('test-form');
        if (testForm) {
            testForm.addEventListener('submit', (e) => this.handleTestSubmit(e));
        }

        // Search functionality
        const processSearch = document.getElementById('process-search');
        if (processSearch) {
            processSearch.addEventListener('input', () => this.filterProcesses());
        }        const categorySearch = document.getElementById('category-search');
        if (categorySearch) {
            categorySearch.addEventListener('input', () => this.filterCategories());
        }

        const processFilter = document.getElementById('process-filter');
        if (processFilter) {
            processFilter.addEventListener('change', () => this.filterCategories());
        }

        const formateurSearch = document.getElementById('formateur-search');
        if (formateurSearch) {
            formateurSearch.addEventListener('input', () => this.filterFormateurs());
        }

        const testSearch = document.getElementById('test-search');        if (testSearch) {
            testSearch.addEventListener('input', () => this.filterTests());
        }

        // Add keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            // Escape key to close modals
            if (e.key === 'Escape') {
                this.closeAllModals();
            }
            
            // Ctrl/Cmd + R to refresh current section
            if ((e.ctrlKey || e.metaKey) && e.key === 'r') {
                e.preventDefault();
                this.refreshCurrentSection();
            }
        });        // Auto-refresh data every 30 seconds (except when filters are active in questions section)
        setInterval(() => {
            if (this.currentSection !== 'dashboard' && this.currentSection !== 'profile') {
                // Skip auto-refresh for questions section if filters are active
                if (this.currentSection === 'questions' && this.hasActiveFilters()) {
                    return;
                }
                this.refreshCurrentSection();
            }
        }, 30000);

        // Handle window resize for mobile sidebar
        window.addEventListener('resize', () => {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-menu-overlay');
            
            if (window.innerWidth >= 1024) {
                if (sidebar) sidebar.classList.remove('open');
                if (overlay) overlay.classList.remove('show');
            }
        });
    }

    // Close all modals
    closeAllModals() {
        const modals = ['process-modal', 'category-modal', 'formateur-modal', 'test-modal'];
        modals.forEach(modalId => {
            const modal = document.getElementById(modalId);
            if (modal && !modal.classList.contains('hidden')) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    }

    setupCSRF() {
        // Setup CSRF token for AJAX requests
        const token = document.querySelector('meta[name="csrf-token"]');
        if (token) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.getAttribute('content');
        }
    }

    loadInitialData() {
        // Load processes if on processes section
        if (this.currentSection === 'processes') {
            this.loadProcesses();
        }
    }

    // Section Management
    showSection(sectionName) {
        // Hide all sections
        document.querySelectorAll('.section').forEach(section => {
            section.classList.add('hidden');
        });

        // Remove active class from all nav links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.classList.remove('active', 'bg-aptiv-orange-50', 'text-aptiv-orange-600');
        });

        // Show selected section
        const targetSection = document.getElementById(`${sectionName}-section`);
        if (targetSection) {
            targetSection.classList.remove('hidden');
        }

        // Update page title
        const titles = {
            dashboard: 'Tableau de Bord',
            profile: 'Mon Profil',
            processes: 'Gestion des Processus',
            categories: 'Gestion des Catégories',
            questions: 'Gestion des Questions',
            formateurs: 'Gestion des Formateurs',
            tests: 'Gestion des Tests'
        };

        const pageTitle = document.getElementById('page-title');
        if (pageTitle) {
            pageTitle.textContent = titles[sectionName] || 'Dashboard';
        }

        // Add active class to current nav link
        const activeLink = document.querySelector(`[onclick="showSection('${sectionName}')"]`);
        if (activeLink) {
            activeLink.classList.add('active', 'bg-aptiv-orange-50', 'text-aptiv-orange-600');
        }

        this.currentSection = sectionName;

        // Load section-specific data
        switch (sectionName) {
            case 'processes':
                this.loadProcesses();
                break;
            case 'categories':
                this.loadCategories();
                break;
            case 'questions':
                if (window.initQuestionsSection) {
                    window.initQuestionsSection();
                }
                break;
            case 'formateurs':
                this.loadFormateurs();
                break;
            case 'tests':
                this.loadTests();
                break;        }

        // Update URL hash for bookmarkable sections
        if (sectionName !== 'dashboard') {
            window.history.replaceState(null, null, `#${sectionName}`);
        } else {
            window.history.replaceState(null, null, window.location.pathname);
        }

        // Close mobile sidebar
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobile-menu-overlay');
        if (sidebar && overlay) {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        }
    }

    // Utility Functions
    showLoading() {
        const overlay = document.getElementById('loading-overlay');
        if (overlay) {
            overlay.classList.remove('hidden');
        }
    }

    hideLoading() {
        const overlay = document.getElementById('loading-overlay');
        if (overlay) {
            overlay.classList.add('hidden');
        }
    }    showMessage(message, type = 'success') {
        const container = document.getElementById('message-container');
        if (!container) return;

        const messageEl = document.createElement('div');
        messageEl.className = `p-4 rounded-lg mb-4 ${type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}`;
        messageEl.innerHTML = `
            <div class="flex items-center">
                <span>${message}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-auto">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;

        container.appendChild(messageEl);

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (messageEl.parentElement) {
                messageEl.remove();
            }
        }, 5000);
    }

    // Clear all error messages
    clearMessages() {
        const container = document.getElementById('message-container');
        if (container) {
            container.innerHTML = '';
        }
    }

    // Refresh current section data
    refreshCurrentSection() {
        switch (this.currentSection) {
            case 'processes':
                this.loadProcesses();
                break;
            case 'categories':
                this.loadCategories();
                break;
            case 'questions':
                if (window.initQuestionsSection) {
                    window.initQuestionsSection();
                }
                break;
            case 'formateurs':
                this.loadFormateurs();
                break;
            case 'tests':
                this.loadTests();
                break;
        }
    }

    // Check if there are active filters in questions section
    hasActiveFilters() {
        if (this.currentSection !== 'questions') return false;
        
        const searchInput = document.getElementById('question-search');
        const processFilter = document.getElementById('question-process-filter');
        const categoryFilter = document.getElementById('question-category-filter');
        
        return (searchInput?.value.trim() !== '') || 
               (processFilter?.value !== '') || 
               (categoryFilter?.value !== '');
    }

    // Profile Management
    async handleProfileUpdate(e) {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        
        try {
            this.showLoading();
            
            const response = await fetch('/admin/profile', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });

            const result = await response.json();

            if (result.success) {
                this.showMessage(result.message);
                // Clear password fields
                document.getElementById('current_password').value = '';
                document.getElementById('password').value = '';
                document.getElementById('password_confirmation').value = '';
            } else {
                this.showMessage(result.message, 'error');
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            this.hideLoading();
        }
    }

    // Process Management
    async loadProcesses() {
        const loadingEl = document.getElementById('processes-loading');
        const tableEl = document.getElementById('processes-table');
        const mobileEl = document.getElementById('processes-mobile');
        const emptyEl = document.getElementById('processes-empty');

        if (loadingEl) loadingEl.classList.remove('hidden');
        if (tableEl) tableEl.classList.add('hidden');
        if (mobileEl) mobileEl.classList.add('hidden');
        if (emptyEl) emptyEl.classList.add('hidden');

        try {
            const response = await fetch('/admin/api/processes');
            const result = await response.json();

            if (result.success) {
                this.renderProcesses(result.data);
            } else {
                this.showMessage('Erreur lors du chargement des processus', 'error');
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            if (loadingEl) loadingEl.classList.add('hidden');
        }
    }

    renderProcesses(processes) {
        const tbody = document.getElementById('processes-tbody');
        const mobileContainer = document.getElementById('processes-mobile');
        const tableEl = document.getElementById('processes-table');
        const mobileEl = document.getElementById('processes-mobile');
        const emptyEl = document.getElementById('processes-empty');

        if (processes.length === 0) {
            if (emptyEl) emptyEl.classList.remove('hidden');
            return;
        }

        // Desktop table view
        if (tbody) {
            tbody.innerHTML = processes.map(process => `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${process.title}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">${process.description}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            ${process.categories_count || 0} catégories
                        </span>
                    </td>                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${new Date(process.created_at || process.create_at).toLocaleDateString('fr-FR')}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">                        <button onclick="adminDashboard.editProcess(${process.id})" class="text-aptiv-orange-600 hover:text-aptiv-orange-900 mr-3">
                            Modifier
                        </button>
                        <button onclick="adminDashboard.deleteProcess(${process.id})" class="text-red-600 hover:text-red-900">
                            Supprimer
                        </button>
                    </td>
                </tr>
            `).join('');
            
            if (tableEl) tableEl.classList.remove('hidden');
        }        // Mobile card view
        if (mobileContainer) {
            mobileContainer.innerHTML = processes.map(process => `
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow duration-200 card-hover">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-semibold text-gray-900 text-base leading-tight">${process.title}</h3>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-aptiv-orange-100 text-aptiv-orange-800 ml-2 flex-shrink-0">
                            ${process.categories_count || 0} cat.
                        </span>
                    </div>
                    <p class="text-sm text-gray-600 mb-4 leading-relaxed line-clamp-2">${process.description}</p>
                    <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                        <span class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-md">${new Date(process.created_at || process.create_at).toLocaleDateString('fr-FR')}</span>
                        <div class="flex space-x-3">
                            <button onclick="adminDashboard.editProcess(${process.id})" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 text-sm font-medium transition-colors btn-touch">
                                Modifier
                            </button>
                            <button onclick="adminDashboard.deleteProcess(${process.id})" class="text-red-600 hover:text-red-700 text-sm font-medium transition-colors btn-touch">
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
            
            if (mobileEl) mobileEl.classList.remove('hidden');
        }
    }

    openProcessModal(processId = null) {
        const modal = document.getElementById('process-modal');
        const title = document.getElementById('process-modal-title');
        const form = document.getElementById('process-form');
        
        if (processId) {
            // Edit mode
            title.textContent = 'Modifier le processus';
            this.loadProcessForEdit(processId);
        } else {
            // Add mode
            title.textContent = 'Ajouter un processus';
            form.reset();
            document.getElementById('process-id').value = '';
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    closeProcessModal() {
        const modal = document.getElementById('process-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    async handleProcessSubmit(e) {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        const processId = document.getElementById('process-id').value;
        const isEdit = !!processId;
        
        const url = isEdit ? `/admin/api/processes/${processId}` : '/admin/api/processes';
        const method = isEdit ? 'PUT' : 'POST';
        
        try {
            this.showLoading();
            
            const response = await fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });            const result = await response.json();

            if (result.success) {
                this.showMessage(result.message);
                this.closeProcessModal();
                this.loadProcesses();
            } else {
                if (result.errors) {
                    // Handle validation errors
                    const errorMessages = Object.values(result.errors).flat().join('<br>');
                    this.showMessage(errorMessages, 'error');
                } else {
                    this.showMessage(result.message, 'error');
                }
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            this.hideLoading();
        }
    }

    async loadProcessForEdit(processId) {
        try {
            const response = await fetch(`/admin/api/processes`);
            const result = await response.json();
            
            if (result.success) {
                const process = result.data.find(p => p.id == processId);
                if (process) {
                    document.getElementById('process-id').value = process.id;
                    document.getElementById('process-title').value = process.title;
                    document.getElementById('process-description').value = process.description;
                }
            }
        } catch (error) {
            console.error('Error loading process:', error);
        }
    }

    async deleteProcess(processId) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer ce processus ?')) {
            return;
        }

        try {
            this.showLoading();
            
            const response = await fetch(`/admin/api/processes/${processId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            });

            const result = await response.json();

            if (result.success) {
                this.showMessage(result.message);
                this.loadProcesses();
            } else {
                this.showMessage(result.message, 'error');
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            this.hideLoading();        }
    }

    editProcess(processId) {
        this.openProcessModal(processId);
    }

    filterProcesses() {
        const searchTerm = document.getElementById('process-search').value.toLowerCase();
        const tableRows = document.querySelectorAll('#processes-tbody tr');
        const mobileCards = document.querySelectorAll('#processes-mobile > div');

        // Filter table rows
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });

        // Filter mobile cards
        mobileCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            card.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    }    // Placeholder methods for other sections
    async loadCategories() {
        const loadingEl = document.getElementById('categories-loading');
        const tableEl = document.getElementById('categories-table');
        const mobileEl = document.getElementById('categories-mobile');
        const emptyEl = document.getElementById('categories-empty');

        if (loadingEl) loadingEl.classList.remove('hidden');
        if (tableEl) tableEl.classList.add('hidden');
        if (mobileEl) mobileEl.classList.add('hidden');
        if (emptyEl) emptyEl.classList.add('hidden');

        try {
            const response = await fetch('/admin/api/categories');
            const result = await response.json();            if (result.success) {
                this.renderCategories(result.data);
                await this.loadProcessesForFilter();
            } else {
                this.showMessage('Erreur lors du chargement des catégories', 'error');
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            if (loadingEl) loadingEl.classList.add('hidden');
        }
    }

    renderCategories(categories) {
        const tbody = document.getElementById('categories-tbody');
        const mobileContainer = document.getElementById('categories-mobile');
        const tableEl = document.getElementById('categories-table');
        const mobileEl = document.getElementById('categories-mobile');
        const emptyEl = document.getElementById('categories-empty');

        if (categories.length === 0) {
            if (emptyEl) emptyEl.classList.remove('hidden');
            return;
        }

        // Desktop table view
        if (tbody) {
            tbody.innerHTML = categories.map(category => `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${category.title}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            ${category.process ? category.process.title : 'N/A'}
                        </span>
                    </td>                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${new Date(category.created_at || category.create_at).toLocaleDateString('fr-FR')}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="adminDashboard.editCategory(${category.id})" class="text-aptiv-orange-600 hover:text-aptiv-orange-900 mr-3">
                            Modifier
                        </button>
                        <button onclick="adminDashboard.deleteCategory(${category.id})" class="text-red-600 hover:text-red-900">
                            Supprimer
                        </button>
                    </td>
                </tr>
            `).join('');
            
            if (tableEl) tableEl.classList.remove('hidden');
        }        // Mobile card view
        if (mobileContainer) {
            mobileContainer.innerHTML = categories.map(category => `
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow duration-200 card-hover">
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="font-semibold text-gray-900 text-base leading-tight">${category.title}</h3>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 ml-2 flex-shrink-0">
                            ${category.process ? category.process.title : 'N/A'}
                        </span>
                    </div>
                    <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                        <span class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-md">${new Date(category.created_at || category.create_at).toLocaleDateString('fr-FR')}</span>
                        <div class="flex space-x-3">
                            <button onclick="adminDashboard.editCategory(${category.id})" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 text-sm font-medium transition-colors btn-touch">
                                Modifier
                            </button>
                            <button onclick="adminDashboard.deleteCategory(${category.id})" class="text-red-600 hover:text-red-700 text-sm font-medium transition-colors btn-touch">
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
            
            if (mobileEl) mobileEl.classList.remove('hidden');
        }
    }

    async loadFormateurs() {
        const loadingEl = document.getElementById('formateurs-loading');
        const tableEl = document.getElementById('formateurs-table');
        const mobileEl = document.getElementById('formateurs-mobile');
        const emptyEl = document.getElementById('formateurs-empty');

        if (loadingEl) loadingEl.classList.remove('hidden');
        if (tableEl) tableEl.classList.add('hidden');
        if (mobileEl) mobileEl.classList.add('hidden');
        if (emptyEl) emptyEl.classList.add('hidden');

        try {
            const response = await fetch('/admin/api/formateurs');
            const result = await response.json();            if (result.success) {
                // Sort formateurs by identification in ascending order
                const sortedFormateurs = result.data.sort((a, b) => a.identification - b.identification);
                this.renderFormateurs(sortedFormateurs);
            } else {
                this.showMessage('Erreur lors du chargement des formateurs', 'error');
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            if (loadingEl) loadingEl.classList.add('hidden');
        }
    }

    renderFormateurs(formateurs) {
        const tbody = document.getElementById('formateurs-tbody');
        const mobileContainer = document.getElementById('formateurs-mobile');
        const tableEl = document.getElementById('formateurs-table');
        const mobileEl = document.getElementById('formateurs-mobile');
        const emptyEl = document.getElementById('formateurs-empty');

        if (formateurs.length === 0) {
            if (emptyEl) emptyEl.classList.remove('hidden');
            return;
        }

        // Desktop table view
        if (tbody) {
            tbody.innerHTML = formateurs.map(formateur => `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${formateur.last_name}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${formateur.name}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${formateur.identification}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${new Date(formateur.created_at).toLocaleDateString('fr-FR')}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="adminDashboard.editFormateur(${formateur.id})" class="text-aptiv-orange-600 hover:text-aptiv-orange-900 mr-3">
                            Modifier
                        </button>
                        <button onclick="adminDashboard.deleteFormateur(${formateur.id})" class="text-red-600 hover:text-red-900">
                            Supprimer
                        </button>
                    </td>
                </tr>
            `).join('');
            
            if (tableEl) tableEl.classList.remove('hidden');
        }        // Mobile card view
        if (mobileContainer) {
            mobileContainer.innerHTML = formateurs.map(formateur => `
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow duration-200 card-hover">
                    <div class="flex justify-between items-start mb-3">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 text-base leading-tight">${formateur.name} ${formateur.last_name}</h3>
                            <p class="text-sm text-gray-600 mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V4a2 2 0 114 0v2m-4 0a2 2 0 104 0m-4 0v2m0 0l2 2 4-4"></path>
                                </svg>
                                ID: ${formateur.identification}
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                        <span class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-md">${new Date(formateur.created_at).toLocaleDateString('fr-FR')}</span>
                        <div class="flex space-x-3">
                            <button onclick="adminDashboard.editFormateur(${formateur.id})" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 text-sm font-medium transition-colors btn-touch">
                                Modifier
                            </button>
                            <button onclick="adminDashboard.deleteFormateur(${formateur.id})" class="text-red-600 hover:text-red-700 text-sm font-medium transition-colors btn-touch">
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
            
            if (mobileEl) mobileEl.classList.remove('hidden');
        }
    }

    async loadTests() {
        const loadingEl = document.getElementById('tests-loading');
        const tableEl = document.getElementById('tests-table');
        const mobileEl = document.getElementById('tests-mobile');
        const emptyEl = document.getElementById('tests-empty');

        if (loadingEl) loadingEl.classList.remove('hidden');
        if (tableEl) tableEl.classList.add('hidden');
        if (mobileEl) mobileEl.classList.add('hidden');
        if (emptyEl) emptyEl.classList.add('hidden');

        try {
            const response = await fetch('/admin/api/tests');
            const result = await response.json();

            if (result.success) {
                this.renderTests(result.data);
                await this.loadUsersAndFormateursForTest();
            } else {
                this.showMessage('Erreur lors du chargement des tests', 'error');
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            if (loadingEl) loadingEl.classList.add('hidden');
        }
    }

    renderTests(tests) {
        const tbody = document.getElementById('tests-tbody');
        const mobileContainer = document.getElementById('tests-mobile');
        const tableEl = document.getElementById('tests-table');
        const mobileEl = document.getElementById('tests-mobile');
        const emptyEl = document.getElementById('tests-empty');

        if (tests.length === 0) {
            if (emptyEl) emptyEl.classList.remove('hidden');
            return;
        }

        // Desktop table view
        if (tbody) {
            tbody.innerHTML = tests.map(test => `
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            ${test.user ? `${test.user.name} ${test.user.last_name}` : 'N/A'}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            ${test.formateur ? `${test.formateur.name} ${test.formateur.last_name}` : 'N/A'}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">${test.description || 'N/A'}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${test.resultat >= 70 ? 'bg-green-100 text-green-800' : test.resultat >= 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800'}">
                            ${test.resultat}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">${test.pourcentage}%</div>
                    </td>                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${new Date(test.created_at || test.create_at).toLocaleDateString('fr-FR')}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button onclick="adminDashboard.editTest(${test.id})" class="text-aptiv-orange-600 hover:text-aptiv-orange-900 mr-3">
                            Modifier
                        </button>
                        <button onclick="adminDashboard.deleteTest(${test.id})" class="text-red-600 hover:text-red-900">
                            Supprimer
                        </button>
                    </td>
                </tr>
            `).join('');
            
            if (tableEl) tableEl.classList.remove('hidden');
        }        // Mobile card view
        if (mobileContainer) {
            mobileContainer.innerHTML = tests.map(test => `
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow duration-200 card-hover">
                    <div class="flex justify-between items-start mb-3">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 text-base leading-tight">
                                ${test.user ? `${test.user.name} ${test.user.last_name}` : 'N/A'}
                            </h3>
                            <p class="text-sm text-gray-600 mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Formateur: ${test.formateur ? `${test.formateur.name} ${test.formateur.last_name}` : 'N/A'}
                            </p>
                        </div>
                        <div class="text-right flex-shrink-0 ml-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium ${test.resultat >= 70 ? 'bg-green-100 text-green-800' : test.resultat >= 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800'}">
                                ${test.resultat}
                            </span>
                            <div class="text-xs text-gray-600 mt-1 font-medium">${test.pourcentage}%</div>
                        </div>
                    </div>
                    ${test.description ? `<p class="text-sm text-gray-600 mb-3 leading-relaxed bg-gray-50 p-2 rounded-md">${test.description}</p>` : ''}
                    <div class="flex justify-between items-center pt-3 border-t border-gray-100">
                        <span class="text-xs text-gray-500 bg-gray-50 px-2 py-1 rounded-md">${new Date(test.created_at || test.create_at).toLocaleDateString('fr-FR')}</span>
                        <div class="flex space-x-3">
                            <button onclick="adminDashboard.editTest(${test.id})" class="text-aptiv-orange-600 hover:text-aptiv-orange-700 text-sm font-medium transition-colors btn-touch">
                                Modifier
                            </button>
                            <button onclick="adminDashboard.deleteTest(${test.id})" class="text-red-600 hover:text-red-700 text-sm font-medium transition-colors btn-touch">
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
            
            if (mobileEl) mobileEl.classList.remove('hidden');
        }    }

    // Categories Management
    openCategoryModal(categoryId = null) {
        const modal = document.getElementById('category-modal');
        const title = document.getElementById('category-modal-title');
        const form = document.getElementById('category-form');
        
        if (categoryId) {
            // Edit mode
            title.textContent = 'Modifier la catégorie';
            this.loadCategoryForEdit(categoryId);
        } else {
            // Add mode
            title.textContent = 'Ajouter une catégorie';
            form.reset();
            document.getElementById('category-id').value = '';
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    closeCategoryModal() {
        const modal = document.getElementById('category-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    async handleCategorySubmit(e) {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        const categoryId = document.getElementById('category-id').value;
        const isEdit = !!categoryId;
        
        const url = isEdit ? `/admin/api/categories/${categoryId}` : '/admin/api/categories';
        const method = isEdit ? 'PUT' : 'POST';
        
        try {
            this.showLoading();
            
            const response = await fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });

            const result = await response.json();            if (result.success) {
                this.showMessage(result.message);
                this.closeCategoryModal();
                this.loadCategories();
            } else {
                if (result.errors) {
                    // Handle validation errors
                    const errorMessages = Object.values(result.errors).flat().join('<br>');
                    this.showMessage(errorMessages, 'error');
                } else {
                    this.showMessage(result.message, 'error');
                }
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            this.hideLoading();
        }
    }

    async loadCategoryForEdit(categoryId) {
        try {
            const response = await fetch(`/admin/api/categories`);
            const result = await response.json();
            
            if (result.success) {
                const category = result.data.find(c => c.id == categoryId);                if (category) {
                    document.getElementById('category-id').value = category.id;
                    document.getElementById('category-title').value = category.title;
                    document.getElementById('category-process').value = category.process_id;
                }
            }
        } catch (error) {
            console.error('Error loading category:', error);
        }
    }

    async deleteCategory(categoryId) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')) {
            return;
        }

        try {
            this.showLoading();
            
            const response = await fetch(`/admin/api/categories/${categoryId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            });

            const result = await response.json();

            if (result.success) {
                this.showMessage(result.message);
                this.loadCategories();
            } else {
                this.showMessage(result.message, 'error');
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            this.hideLoading();
        }
    }

    editCategory(categoryId) {
        this.openCategoryModal(categoryId);
    }    async loadProcessesForFilter() {
        try {
            const response = await fetch('/admin/api/processes');
            const result = await response.json();
              if (result.success) {
                // Populate the category modal dropdown
                const select = document.getElementById('category-process');
                if (select) {
                    select.innerHTML = '<option value="">Sélectionner un processus</option>' +
                        result.data.map(process => `<option value="${process.id}">${process.title}</option>`).join('');
                }
                  // Populate the filter dropdown
                const filterSelect = document.getElementById('process-filter');
                if (filterSelect) {
                    filterSelect.innerHTML = '<option value="">Tous les processus</option>' +
                        result.data.map(process => `<option value="${process.id}">${process.title}</option>`).join('');
                }
            }
        } catch (error) {
            console.error('Error loading processes:', error);
        }
    }

    // Formateurs Management
    openFormateurModal(formateurId = null) {
        const modal = document.getElementById('formateur-modal');
        const title = document.getElementById('formateur-modal-title');
        const form = document.getElementById('formateur-form');
        
        if (formateurId) {
            // Edit mode
            title.textContent = 'Modifier le formateur';
            this.loadFormateurForEdit(formateurId);
        } else {
            // Add mode
            title.textContent = 'Ajouter un formateur';
            form.reset();
            document.getElementById('formateur-id').value = '';
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    closeFormateurModal() {
        const modal = document.getElementById('formateur-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    async handleFormateurSubmit(e) {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        const formateurId = document.getElementById('formateur-id').value;
        const isEdit = !!formateurId;
        
        const url = isEdit ? `/admin/api/formateurs/${formateurId}` : '/admin/api/formateurs';
        const method = isEdit ? 'PUT' : 'POST';
        
        try {
            this.showLoading();
            
            const response = await fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });

            const result = await response.json();            if (result.success) {
                this.showMessage(result.message);
                this.closeFormateurModal();
                this.loadFormateurs();
            } else {
                if (result.errors) {
                    // Handle validation errors
                    const errorMessages = Object.values(result.errors).flat().join('<br>');
                    this.showMessage(errorMessages, 'error');
                } else {
                    this.showMessage(result.message, 'error');
                }
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            this.hideLoading();
        }
    }

    async loadFormateurForEdit(formateurId) {
        try {
            const response = await fetch(`/admin/api/formateurs`);
            const result = await response.json();
            
            if (result.success) {
                const formateur = result.data.find(f => f.id == formateurId);
                if (formateur) {
                    document.getElementById('formateur-id').value = formateur.id;
                    document.getElementById('formateur-name').value = formateur.name;
                    document.getElementById('formateur-last-name').value = formateur.last_name;
                    document.getElementById('formateur-identification').value = formateur.identification;
                }
            }
        } catch (error) {
            console.error('Error loading formateur:', error);
        }
    }

    async deleteFormateur(formateurId) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer ce formateur ?')) {
            return;
        }

        try {
            this.showLoading();
            
            const response = await fetch(`/admin/api/formateurs/${formateurId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            });

            const result = await response.json();

            if (result.success) {
                this.showMessage(result.message);
                this.loadFormateurs();
            } else {
                this.showMessage(result.message, 'error');
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            this.hideLoading();
        }
    }

    editFormateur(formateurId) {
        this.openFormateurModal(formateurId);
    }

    // Tests Management
    openTestModal(testId = null) {
        const modal = document.getElementById('test-modal');
        const title = document.getElementById('test-modal-title');
        const form = document.getElementById('test-form');
        
        if (testId) {
            // Edit mode
            title.textContent = 'Modifier le test';
            this.loadTestForEdit(testId);
        } else {
            // Add mode
            title.textContent = 'Ajouter un test';
            form.reset();
            document.getElementById('test-id').value = '';
        }
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    closeTestModal() {
        const modal = document.getElementById('test-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    async handleTestSubmit(e) {
        e.preventDefault();
        
        const formData = new FormData(e.target);
        const testId = document.getElementById('test-id').value;
        const isEdit = !!testId;
        
        const url = isEdit ? `/admin/api/tests/${testId}` : '/admin/api/tests';
        const method = isEdit ? 'PUT' : 'POST';
        
        try {
            this.showLoading();
            
            const response = await fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });

            const result = await response.json();            if (result.success) {
                this.showMessage(result.message);
                this.closeTestModal();
                this.loadTests();
            } else {
                if (result.errors) {
                    // Handle validation errors
                    const errorMessages = Object.values(result.errors).flat().join('<br>');
                    this.showMessage(errorMessages, 'error');
                } else {
                    this.showMessage(result.message, 'error');
                }
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            this.hideLoading();
        }
    }

    async loadTestForEdit(testId) {
        try {
            const response = await fetch(`/admin/api/tests`);
            const result = await response.json();
            
            if (result.success) {
                const test = result.data.find(t => t.id == testId);                if (test) {
                    document.getElementById('test-id').value = test.id;
                    document.getElementById('test-user').value = test.user_id;
                    document.getElementById('test-formateur').value = test.formateur_id;
                    document.getElementById('test-description').value = test.description || '';
                    document.getElementById('test-resultat').value = test.resultat;
                    document.getElementById('test-pourcentage').value = test.pourcentage;
                }
            }
        } catch (error) {
            console.error('Error loading test:', error);
        }
    }

    async deleteTest(testId) {
        if (!confirm('Êtes-vous sûr de vouloir supprimer ce test ?')) {
            return;
        }

        try {
            this.showLoading();
            
            const response = await fetch(`/admin/api/tests/${testId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            });

            const result = await response.json();

            if (result.success) {
                this.showMessage(result.message);
                this.loadTests();
            } else {
                this.showMessage(result.message, 'error');
            }
        } catch (error) {
            this.showMessage('Une erreur est survenue', 'error');
            console.error('Error:', error);
        } finally {
            this.hideLoading();
        }
    }

    editTest(testId) {
        this.openTestModal(testId);
    }

    async loadUsersAndFormateursForTest() {
        try {
            // Load users
            const usersResponse = await fetch('/admin/api/users');
            const usersResult = await usersResponse.json();
              if (usersResult.success) {
                const userSelect = document.getElementById('test-user');
                if (userSelect) {
                    userSelect.innerHTML = '<option value="">Sélectionner un utilisateur</option>' +
                        usersResult.data.map(user => `<option value="${user.id}">${user.name} ${user.last_name}</option>`).join('');
                }
            }

            // Load formateurs
            const formateursResponse = await fetch('/admin/api/formateurs');
            const formateursResult = await formateursResponse.json();
            
            if (formateursResult.success) {
                const formateurSelect = document.getElementById('test-formateur');
                if (formateurSelect) {
                    formateurSelect.innerHTML = '<option value="">Sélectionner un formateur</option>' +
                        formateursResult.data.map(formateur => `<option value="${formateur.id}">${formateur.name} ${formateur.last_name}</option>`).join('');
                }
            }
        } catch (error) {
            console.error('Error loading users and formateurs:', error);
        }
    }    // Search and Filter Functions
    filterCategories() {
        const searchTerm = document.getElementById('category-search')?.value.toLowerCase() || '';
        const processFilter = document.getElementById('process-filter')?.value || '';
        const tableRows = document.querySelectorAll('#categories-tbody tr');
        const mobileCards = document.querySelectorAll('#categories-mobile > div');

        // Filter table rows
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const processMatch = !processFilter || row.querySelector('span')?.textContent.includes(document.querySelector(`#process-filter option[value="${processFilter}"]`)?.textContent || '');
            const searchMatch = text.includes(searchTerm);
            row.style.display = (searchMatch && processMatch) ? '' : 'none';
        });

        // Filter mobile cards
        mobileCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            const processMatch = !processFilter || card.querySelector('span')?.textContent.includes(document.querySelector(`#process-filter option[value="${processFilter}"]`)?.textContent || '');
            const searchMatch = text.includes(searchTerm);
            card.style.display = (searchMatch && processMatch) ? '' : 'none';
        });
    }

    filterFormateurs() {
        const searchTerm = document.getElementById('formateur-search')?.value.toLowerCase() || '';
        const tableRows = document.querySelectorAll('#formateurs-tbody tr');
        const mobileCards = document.querySelectorAll('#formateurs-mobile > div');

        // Filter table rows
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });

        // Filter mobile cards
        mobileCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            card.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    }

    filterTests() {
        const searchTerm = document.getElementById('test-search')?.value.toLowerCase() || '';
        const tableRows = document.querySelectorAll('#tests-tbody tr');
        const mobileCards = document.querySelectorAll('#tests-mobile > div');

        // Filter table rows
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });

        // Filter mobile cards
        mobileCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            card.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    }
}

// Initialize dashboard when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    window.adminDashboard = new AdminDashboard();
});

// Global functions for onclick handlers
function showSection(sectionName) {
    if (window.adminDashboard) {
        window.adminDashboard.showSection(sectionName);
    }
}

// Process functions
function openProcessModal(processId = null) {
    if (window.adminDashboard) {
        window.adminDashboard.openProcessModal(processId);
    }
}

function closeProcessModal() {
    if (window.adminDashboard) {
        window.adminDashboard.closeProcessModal();
    }
}

function loadProcesses() {
    if (window.adminDashboard) {
        window.adminDashboard.loadProcesses();
    }
}

// Category functions
function openCategoryModal(categoryId = null) {
    if (window.adminDashboard) {
        window.adminDashboard.openCategoryModal(categoryId);
    }
}

function closeCategoryModal() {
    if (window.adminDashboard) {
        window.adminDashboard.closeCategoryModal();
    }
}

function loadCategories() {
    if (window.adminDashboard) {
        window.adminDashboard.loadCategories();
    }
}

// Formateur functions
function openFormateurModal(formateurId = null) {
    if (window.adminDashboard) {
        window.adminDashboard.openFormateurModal(formateurId);
    }
}

function closeFormateurModal() {
    if (window.adminDashboard) {
        window.adminDashboard.closeFormateurModal();
    }
}

function loadFormateurs() {
    if (window.adminDashboard) {
        window.adminDashboard.loadFormateurs();
    }
}

// Test functions
function openTestModal(testId = null) {
    if (window.adminDashboard) {
        window.adminDashboard.openTestModal(testId);
    }
}

function closeTestModal() {
    if (window.adminDashboard) {
        window.adminDashboard.closeTestModal();
    }
}

function loadTests() {
    if (window.adminDashboard) {
        window.adminDashboard.loadTests();
    }
}
