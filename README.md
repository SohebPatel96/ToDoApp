
# Steps to setup and run the code

Setup database credentials in .env file. For example:

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


# Any unit tests or similar that are associated with the code.

I have created a single feature test case to create task, the test case is located at `Tests\Feature\CreateTaskTest.php`

To run the test case, execute following command:
```http
php artisan test
```

# What is it about your solution that says 'quality' and makes you proud to have written it?

The code is designed with a focus on maintainability and flexibility, incorporating the repository pattern to delegate database logic to repository classes, and separating business logic into the service layer. Additionally, a dedicated validation class adhering to SOLID principles is used to handle validation logic.

This architecture promotes scalability, allowing for easy addition of new features without modifying existing code.





