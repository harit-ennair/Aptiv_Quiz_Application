# How to Run the Updated Seeders

I've added new question categories, questions, and answers to the existing seeder files. Follow these steps to run the seeders and add the new content to your database.

## Prerequisites

Ensure that your Laravel application is properly set up and connected to your database.

## Steps to Run the Seeders

1. **Run the Process Seeder (if not already done)**

   ```bash
   php artisan db:seed --class=ProcessSeeder
   ```

2. **Run the Categories Seeder (if not already done or to update with the capitalized 'Kabatec')**

   ```bash
   php artisan db:seed --class=CategoriesSeeder
   ```

3. **Run the Questions Seeder**

   This will add all the new questions for the added categories:

   ```bash
   php artisan db:seed --class=QuzSeeder
   ```

4. **Run the Answers Seeder**

   This will add all the answers for the new questions:

   ```bash
   php artisan db:seed --class=RepoSeeder
   ```

## Verification

To verify that the seeding was successful, you can check your database or use any verification scripts similar to the existing `verify_komax_seeding.php`.

## New Categories Added

The following categories have been added or updated:

1. **Sertissage** - 28 questions with multiple-choice answers
2. **Kabatec** - 14 questions with multiple-choice answers
3. **Beri.Co.Cut** - 13 questions with multiple-choice answers
4. **Beri.Co.Cut.V3** - 17 questions with multiple-choice answers
5. **BT 752/BT 722** - 22 questions with multiple-choice answers

Each question has been set up with appropriate answer options and one correct answer per question.
