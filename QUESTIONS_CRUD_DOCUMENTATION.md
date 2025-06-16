# Questions and Answers CRUD System - Documentation

## Overview

This system provides a complete CRUD (Create, Read, Update, Delete) interface for managing categories, questions, and answers. It's integrated into the existing Laravel admin dashboard.

## Database Structure

### Tables
- **categories**: Contains categories linked to processes
- **quzs**: Contains questions linked to categories  
- **repos**: Contains answers linked to questions

### Relationships
- **Category** (1) → (many) **Questions**
- **Question** (1) → (many) **Answers**
- **Process** (1) → (many) **Categories**

## Features

### 1. Categories Management
- View all categories with their associated processes
- Create new categories
- Edit existing categories
- Delete categories
- Filter categories by process

### 2. Questions Management
- View all questions with category information
- Create new questions with multiple answers
- Edit existing questions and their answers
- Delete questions (cascades to delete answers)
- View detailed question information
- Filter questions by category
- Search questions by text

### 3. Answers Management
- Each question can have 2-6 answers
- Exactly one answer must be marked as correct
- Answers are managed within the question interface
- Visual indicators for correct answers

## Usage Guide

### Accessing the System
1. Login to the admin panel at `/admin/login`
2. Navigate to "Questions" from the sidebar
3. Use the interface to manage questions and answers

### Creating a Question
1. Click "Ajouter une question" button
2. Select a category from the dropdown
3. Enter the question text
4. Add 2-6 answer options
5. Mark exactly one answer as correct
6. Click "Enregistrer"

### Editing a Question
1. Click the edit icon (pencil) next to a question
2. Modify the question text, category, or answers
3. Ensure one answer remains marked as correct
4. Click "Enregistrer"

### Viewing Question Details
1. Click the view icon (eye) next to a question
2. See the complete question with all answers
3. Correct answer is highlighted in green

### Deleting a Question
1. Click the delete icon (trash) next to a question
2. Confirm the deletion
3. Question and all its answers are removed

## API Endpoints

### Questions
- `GET /admin/api/questions` - List all questions
- `POST /admin/api/questions` - Create new question
- `GET /admin/api/questions/{id}` - Get specific question
- `PUT /admin/api/questions/{id}` - Update question
- `DELETE /admin/api/questions/{id}` - Delete question

### Categories
- `GET /admin/api/categories` - List all categories
- `GET /admin/api/categories/{id}/questions` - Get questions by category

## Request/Response Format

### Creating a Question
```json
{
    "question_text": "What is the correct procedure?",
    "categories_id": 1,
    "answers": [
        {
            "answer_text": "First option",
            "is_correct": true
        },
        {
            "answer_text": "Second option", 
            "is_correct": false
        }
    ]
}
```

### Response Format
```json
{
    "success": true,
    "message": "Question créée avec succès",
    "data": {
        "id": 1,
        "question_text": "What is the correct procedure?",
        "categories_id": 1,
        "category": {
            "id": 1,
            "title": "Category Name",
            "process": {
                "title": "Process Name"
            }
        },
        "repos": [
            {
                "id": 1,
                "answer_text": "First option",
                "is_correct": true
            }
        ]
    }
}
```

## Validation Rules

### Questions
- `question_text`: Required, string, max 1000 characters
- `categories_id`: Required, must exist in categories table
- `answers`: Required array, min 2, max 6 items
- Exactly one answer must be marked as correct

### Answers
- `answer_text`: Required, string, max 500 characters
- `is_correct`: Boolean, exactly one must be true per question

## File Structure

### Controllers
- `app/Http/Controllers/QuzController.php` - Questions management
- `app/Http/Controllers/CategoriesController.php` - Categories management

### Models
- `app/Models/quz.php` - Questions model
- `app/Models/repo.php` - Answers model
- `app/Models/categories.php` - Categories model

### Views
- `resources/views/admin/sections/questions.blade.php` - Questions interface
- `resources/views/admin/sections/categories.blade.php` - Categories interface

### Routes
- `routes/web.php` - All admin API routes defined

### JavaScript
- `public/js/admin-dashboard.js` - Dashboard functionality
- Questions interface JavaScript embedded in questions.blade.php

## Responsive Design

The interface is fully responsive with:
- Desktop table view for larger screens
- Mobile card view for smaller screens
- Touch-friendly buttons on mobile
- Optimized forms for all screen sizes

## Security Features

- CSRF protection on all forms
- Authentication required for all operations
- Role-based access control (admin/super admin only)
- Input validation and sanitization
- SQL injection prevention through Eloquent ORM

## Browser Compatibility

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile browsers (iOS Safari, Chrome Mobile)
- Requires JavaScript enabled

## Sample Data

The system includes sample questions across different categories:
- 9 sample questions created across 3 categories
- Each question has 4 answer options
- Categories span different processes (Assembly, Cutting, LP)

## Troubleshooting

### Common Issues
1. **Questions not loading**: Check that the user has admin privileges
2. **Create button not working**: Ensure categories exist in the database
3. **API errors**: Check Laravel logs in `storage/logs/`
4. **JavaScript errors**: Check browser console for error messages

### Database Issues
- Run `php artisan migrate` to ensure latest database structure
- Run `php artisan db:seed` to populate categories if missing

## Future Enhancements

Possible improvements:
1. Question difficulty levels
2. Question categories with icons
3. Import/export functionality
4. Question statistics and analytics
5. Multi-language support
6. Question attachments (images, videos)
7. Question templates
8. Bulk operations

## Support

For technical support or feature requests, check:
1. Laravel logs in `storage/logs/`
2. Browser developer console
3. Database constraints and relationships
4. Server error logs
