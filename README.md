# Multi-factor authentication System

The project is a comprehensive management system designed to manage different user roles, including user, admin, and patient. The system leverages Laravel and Laravel-modules to ensure modular and efficient management of operations. Users can manage various types of information, appointments, and resources efficiently.

## Features

- User login and session management
- Admin dashboard for managing operations
- User portal for managing personal information and tasks
- Modular design using Laravel-modules
- Appointment scheduling and management
- Information records management
- Role-based access control

## Usage

1. Register a new user or login with an existing account.
2. Admin: Navigate to the admin dashboard to manage operations, including user management, appointments, and resources.
3. User: Log in to view personal information and manage their profile.
4. Patient: Log in to schedule appointments, view records, and manage personal information.

## Dependencies

- Laravel 10.x
- Laravel-modules 8.x
- PHP 8.4.2
- Sql
- MySQL

## Installation

1. Clone the repository (if the source code is shared).
2. Navigate to the project directory.
3. Run composer install to install PHP dependencies.
4. Configure your .env file with the necessary database and environment settings.
5. Run php artisan migrate to set up the database tables.
6. Run php artisan serve to start the development server.

## Configuration

Ensure you have the following configurations in your .env file:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Contributing

If you wish to contribute to this project, please fork the repository and create a pull request. Ensure your code follows the project's coding standards and includes appropriate tests.
