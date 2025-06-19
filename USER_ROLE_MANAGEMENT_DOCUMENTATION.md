# User Role Management Feature - Documentation

## Overview
This feature adds a comprehensive user role management system to the admin dashboard, allowing super administrators to manage user roles and permissions effectively.

## Access Control
- **Super Admin only**: Only users with `role_id = 1` (Super Admin) can access this feature
- The "Gestion Utilisateurs" menu item is only visible to super admins
- All API endpoints include role verification

## Features

### 1. User Management Dashboard
- **Location**: Admin Dashboard → Gestion Utilisateurs (only visible to super admins)
- **View all users**: Display all users with their current roles
- **Search functionality**: Search users by name, last name, or identification
- **Filter by role**: Filter users by Super Admin, Admin, or Employee roles
- **Responsive design**: Desktop table view and mobile card view

### 2. Role Management
- **Change user roles**: Promote or demote users between roles:
  - Super Admin (role_id = 1)
  - Admin (role_id = 2) 
  - Employee (role_id = 3)
- **Safety checks**: 
  - Super admins cannot demote themselves
  - Confirmation dialog with user information
  - Warning about permission changes

### 3. User Interface
- **Modern design**: Consistent with existing admin dashboard design
- **Role color coding**:
  - Super Admin: Purple badge
  - Admin: Blue badge  
  - Employee: Green badge
- **Touch-friendly**: Optimized for mobile devices
- **Loading states**: Proper loading indicators and error handling

## API Endpoints

### Get All Users (Super Admin only)
- **Endpoint**: `GET /admin/api/users/all`
- **Permission**: Super Admin only (role_id = 1)
- **Response**: List of all users with their roles

### Update User Role (Super Admin only)
- **Endpoint**: `PUT /admin/api/users/{user_id}/role`
- **Permission**: Super Admin only (role_id = 1)
- **Body**: `{ "role_id": 1|2|3 }`
- **Validation**: 
  - Role ID must exist in roles table
  - Cannot demote self if super admin

## Database Structure

### Users Table
- `id`: Primary key
- `name`: User first name
- `last_name`: User last name
- `identification`: Unique identifier
- `role_id`: Foreign key to roles table
- `created_at`: Registration timestamp

### Roles Table
- `id`: Primary key (1=Super Admin, 2=Admin, 3=Employee)
- `name`: Role name
- `created_at`, `updated_at`: Timestamps

## Security Features

1. **Role-based access control**: Only super admins can access user management
2. **Self-protection**: Super admins cannot demote themselves
3. **CSRF protection**: All forms include CSRF tokens
4. **Input validation**: Server-side validation for all requests
5. **Error handling**: Proper error messages and logging

## Usage Guide

### Accessing User Management
1. Login as Super Admin (role_id = 1)
2. Navigate to Admin Dashboard
3. Click "Gestion Utilisateurs" in the sidebar

### Changing User Roles
1. Go to User Management section
2. Find the user (use search/filter if needed)
3. Click "Modifier le rôle" button
4. Select new role from dropdown
5. Confirm the change
6. User role is updated immediately

### Searching and Filtering
- **Search**: Type in the search box to find users by name or ID
- **Filter by role**: Use the role dropdown to show only specific role types
- **Real-time filtering**: Results update as you type/select

## File Structure

### Controllers
- `app/Http/Controllers/AdminController.php` - Added user management methods

### Views  
- `resources/views/admin/enhanced-dashboard.blade.php` - Added users section
- `resources/views/admin/sections/users.blade.php` - User management interface

### Routes
- `routes/web.php` - Added user management API routes

### JavaScript
- `public/js/admin-dashboard.js` - Added user management functionality

### CSS
- Styles integrated into existing dashboard CSS (enhanced-dashboard.blade.php)

## Implementation Details

### Role Color Coding
```javascript
const roleColors = {
    'super admin': 'bg-purple-100 text-purple-800',
    'admin': 'bg-blue-100 text-blue-800', 
    'employee': 'bg-green-100 text-green-800'
};
```

### Permission Check
```php
// Check if user is super admin
if (Auth::user()->role_id != 1) {
    return response()->json([
        'success' => false,
        'message' => 'Accès non autorisé'
    ], 403);
}
```

### Self-Protection Logic
```php
// Prevent super admin from demoting themselves
if ($user->id === Auth::user()->id && $request->role_id != 1) {
    return response()->json([
        'success' => false,
        'message' => 'Vous ne pouvez pas modifier votre propre rôle'
    ], 400);
}
```

## Future Enhancements

Possible improvements:
1. **User creation**: Allow super admins to create new users
2. **User deletion**: Add ability to delete/deactivate users
3. **Bulk operations**: Select multiple users for bulk role changes
4. **Activity logging**: Track role change history
5. **Permission matrix**: More granular permission management
6. **User profiles**: Extended user information management
7. **Email notifications**: Notify users when their role changes

## Troubleshooting

### Common Issues
1. **Menu not visible**: Ensure user has role_id = 1 (Super Admin)
2. **Access denied**: Check user authentication and role permissions  
3. **JavaScript errors**: Check browser console for error messages
4. **API errors**: Check Laravel logs in `storage/logs/`

### Debugging
- Check user role: `SELECT role_id FROM users WHERE id = ?`
- Verify routes: `php artisan route:list | grep users`
- Check permissions: Review AdminMiddleware and controller methods
