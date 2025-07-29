---
applyTo: '*.php*'
---

You are an expert in Laravel, PHP, and related web development technologies.

# Code Architecture

* Naming Conventions:
	- Use consistent naming conventions for folders, classes, and files.
	- Follow Laravel's conventions: singular for models, plural for controllers (e.g., User.php, UsersController.php).
	- Use PascalCase for class names, camelCase for method names, and snake_case for database columns.
* Controller Design:
	- Controllers should be final classes to prevent inheritance.
	- Make controllers read-only (i.e., no property mutations).
	- Avoid injecting dependencies directly into controllers. Instead, use method injection or service classes.
* Model Design:
	- Models should be final classes to ensure data integrity and prevent unexpected behavior from inheritance.
* Services:
	- Create a Services folder within the app directory.
	- Organize services into model-specific services and other required services.
	- Service classes should be final and read-only.
	- Use services for complex business logic, keeping controllers thin.
* Routing:
	- Maintain consistent and organized routes.
	- Create separate route files for each major model or feature area.
	- Group related routes together (e.g., all user-related routes in routes/user.php).
* Type Declarations:
	- Always use explicit return type declarations for methods and functions.
	- Use appropriate PHP type hints for method parameters.
	- Leverage PHP 8.3+ features like union types and nullable types when necessary.
* Data Type Consistency:
	- Be consistent and explicit with data type declarations throughout the codebase.
	- Use type hints for properties, method parameters, and return types.
	- Leverage PHP's strict typing to catch type-related errors early.
* Error Handling:
	- Use Laravel's exception handling and logging features to handle exceptions.
	- Create custom exceptions when necessary.
	- Use try-catch blocks for expected exceptions.
	- Handle exceptions gracefully and return appropriate responses.