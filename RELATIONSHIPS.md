# Laravel Project Relationships Documentation

## Database Schema Overview

This document outlines all the relationships between the models in the Laravel application.

## Models and Their Relationships

### 1. User Model
**Table:** `users`
**Fields:** id, name, identification, role_id, remember_token, timestamps

**Relationships:**
- `belongsTo` **Role** (role_id → roles.id)
- `hasMany` **Test** (users.id ← tests.user_id)

**Usage:**
```php
$user = User::find(1);
$userRole = $user->role;
$userTests = $user->tests;
```

### 2. Roles Model
**Table:** `roles`
**Fields:** id, name, timestamps

**Relationships:**
- `hasMany` **User** (roles.id ← users.role_id)

**Usage:**
```php
$role = roles::find(1);
$roleUsers = $role->users;
```

### 3. Formateur Model
**Table:** `formateurs`
**Fields:** id, name, identification, timestamps

**Relationships:**
- `hasMany` **Test** (formateurs.id ← tests.formateur_id)

**Usage:**
```php
$formateur = formateur::find(1);
$formateurTests = $formateur->tests;
```

### 4. Process Model
**Table:** `processes`
**Fields:** id, title, create_at, timestamps

**Relationships:**
- `hasMany` **Categories** (processes.id ← categories.process_id)

**Usage:**
```php
$process = process::find(1);
$processCategories = $process->categories;
```

### 5. Categories Model
**Table:** `categories`
**Fields:** id, title, process_id, create_at, timestamps

**Relationships:**
- `belongsTo` **Process** (process_id → processes.id)
- `hasMany` **Quz** (categories.id ← quzs.categories_id)

**Usage:**
```php
$category = categories::find(1);
$categoryProcess = $category->process;
$categoryQuzs = $category->quzs;
```

### 6. Quz Model
**Table:** `quzs`
**Fields:** id, description, categories_id, create_at, timestamps

**Relationships:**
- `belongsTo` **Categories** (categories_id → categories.id)
- `hasMany` **Repo** (quzs.id ← repos.quz_id)
- `belongsToMany` **Test** (through pivot table `test_quz`)

**Usage:**
```php
$quz = quz::find(1);
$quzCategory = $quz->category;
$quzRepos = $quz->repos;
$quzTests = $quz->tests;
```

### 7. Repo Model
**Table:** `repos`
**Fields:** id, description, quz_id, status, create_at, timestamps

**Relationships:**
- `belongsTo` **Quz** (quz_id → quzs.id)

**Usage:**
```php
$repo = repo::find(1);
$repoQuz = $repo->quz;
```

### 8. Test Model
**Table:** `tests`
**Fields:** id, user_id, description, formateur_id, resultat, pourcentage, create_at, timestamps

**Relationships:**
- `belongsTo` **User** (user_id → users.id)
- `belongsTo` **Formateur** (formateur_id → formateurs.id)
- `belongsToMany` **Quz** (through pivot table `test_quz`)

**Usage:**
```php
$test = test::find(1);
$testUser = $test->user;
$testFormateur = $test->formateur;
$testQuzs = $test->quzs;
```

## Relationship Hierarchy

```
roles (1) -----> (many) users (1) -----> (many) tests (many) <-----> (many) quzs
                                                    |                         |
                                                    |                         |
                                               formateurs (1) -----> (many)  |
                                                                              |
                                                                              |
                                              categories (1) -----> (many) ---
                                                    |
                                                    |
                                              processes (1) -----> (many)

repos (many) -----> (1) quzs
```

## Pivot Tables

### test_quz
**Purpose:** Many-to-many relationship between tests and quzs
**Fields:** id, test_id, quz_id, timestamps
**Foreign Keys:**
- test_id → tests.id
- quz_id → quzs.id
- Unique constraint on (test_id, quz_id)

## Database Migration Order

Based on foreign key dependencies, migrations should run in this order:
1. `roles` (no dependencies)
2. `users` (depends on roles)
3. `formateurs` (no dependencies)
4. `processes` (no dependencies)
5. `categories` (depends on processes)
6. `quzs` (depends on categories)
7. `repos` (depends on quzs)
8. `tests` (depends on users and formateurs)
9. `test_quz` (depends on tests and quzs)

## Example Queries

### Get all tests for a specific user with their quzs
```php
$user = User::with(['tests.quzs'])->find(1);
foreach ($user->tests as $test) {
    foreach ($test->quzs as $quz) {
        echo $quz->description;
    }
}
```

### Get all categories with their process and quzs
```php
$categories = categories::with(['process', 'quzs.repos'])->get();
```

### Get all formateurs with their tests and users
```php
$formateurs = formateur::with(['tests.user'])->get();
```

### Get a complete hierarchy from process to repos
```php
$process = process::with([
    'categories.quzs.repos',
    'categories.quzs.tests.user'
])->find(1);
```