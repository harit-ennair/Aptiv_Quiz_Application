<!-- Profile Management -->
<div class="bg-white rounded-lg shadow-sm lg:shadow">
    <div class="px-4 lg:px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Mon Profil</h2>
    </div>
    <div class="p-4 lg:p-6">
        <form id="profile-form" class="space-y-4 lg:space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                </div>
                
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                    <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                </div>
            </div>
            
            <div>
                <label for="identification" class="block text-sm font-medium text-gray-700 mb-2">Identification</label>
                <input type="number" name="identification" id="identification" value="{{ $user->identification }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
            </div>
            
            <div class="border-t border-gray-200 pt-4 lg:pt-6">
                <h3 class="text-sm font-medium text-gray-900 mb-4">Changer le mot de passe</h3>
                
                <div class="space-y-4">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Mot de passe actuel</label>
                        <input type="password" name="current_password" id="current_password" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Nouveau mot de passe</label>
                            <input type="password" name="password" id="password" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                        </div>
                        
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-aptiv-orange-500 text-sm lg:text-base">
                        </div>
                    </div>                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                <button type="submit" 
                        class="bg-aptiv-orange-600 hover:bg-aptiv-orange-700 text-white px-6 py-2 rounded-md transition-colors text-sm lg:text-base">
                    Mettre à jour le profil
                </button>
            </div>
        </form>
    </div>
</div>
