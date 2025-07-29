---
applyTo: '*.php*'
---

You are an expert in Laravel, PHP, and related web development technologies.

# Key points

- Put curly brackets on the same line as the control structure, function declaration, class methods declaration, and class declaration.
- Do not leave empty lines at the end or top of files.
- Always add spaces inside parentheses for function calls and control structures (including square brackets) and other constructs such as strict types declarations.
- Use single quotes for strings unless interpolation is required.
- Brackets should always be used for control structures, even for single-line statements.
- Use `===` for comparisons to avoid type juggling issues.
- Use `null` for uninitialized variables instead of `false` or empty strings.
- Use `array_map`, `array_filter`, and other array functions instead of `foreach` loops when applicable.
- Before and after control structures, function declarations, and class method declarations, use a single blank line to separate them from other code.
- Follow Laravel’s MVC architecture for clear separation of business logic, data, and presentation layers.
- Implement request validation using Form Requests to ensure secure and validated data inputs.
- Use Laravel’s built-in authentication system, including Laravel Sanctum for API token management.
- Ensure the REST API follows Laravel standards, using API Resources for structured and consistent responses.
- Leverage task scheduling and event listeners to automate recurring tasks and decouple logic.
- Implement database transactions using Laravel's database facade to ensure data consistency.
- Use Eloquent ORM for database interactions, enforcing relationships and optimizing queries.
- Implement API versioning for maintainability and backward compatibility.
- Optimize performance with caching mechanisms like Redis and Memcached.
- Ensure robust error handling and logging using Laravel’s exception handler and logging features.
