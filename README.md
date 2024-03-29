# About the project

This project serves as the backbone for managing CRUD operations related to tasks in a Laravel-based application. Here's an overview of the key functionalities:
Create Task,Show Task,Update Task, and Delete Task.

Exception handling is thoughtfully implemented to gracefully manage validation errors and server-side issues, ensuring a reliable and consistent API for streamlined task management.Appropriate test cases have been written to assess the robustness of the task creation endpoint by validating both successful and unsuccessful scenarios, contributing to the overall reliability of the application's task management functionality.



# Steps to setup and run the code

I am using laravel 10 which requires PHP 8 and its dependencies.

Setup database credentials in .env file. In case .env file is not present, create a new .env file and copy context of .env.example into it.

Run composer
```bash
composer install

```

Setup database credentials
```bash
DB_DATABASE=todo
DB_USERNAME=root
DB_PASSWORD=password
```
Run Migration
```bash
php artisan migrate
```


Run the seeder to populate records in the categories table
```bash
php artisan db:seed --class=CategorySeeder
```

Generate encryption key for the project
```bash
php artisan key:generate
```

Run the serve command 
```bash
php artisan serve
```


The postman collection is located within the root directory of this project
https://github.com/SohebPatel96/ToDoApp/blob/master/ToDoList.postman_collection.json

There are 4 APIs to create, read, update and delete task with appropriate validations and responses.


# Any unit tests or similar that are associated with the code.

I have created a single feature test case to create task, the test case is located at `Tests\Feature\CreateTaskTest.php`

To run the test case, execute following command:
```http
php artisan test
```

# What is it about your solution that says 'quality' and makes you proud to have written it?

The code is designed with a focus on maintainability and flexibility, incorporating the repository pattern to delegate database logic to repository classes, and separating business logic into the service layer. Additionally, a dedicated validation class adhering to SOLID principles is used to handle validation logic.

This architecture promotes scalability, allowing for easy addition of new features without modifying existing code.





