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

## Installation

## 1. Cloning the Repository

First, clone the repository to your local machine:

```bash
git clone https://github.com/IslamAlsayed/multi_auth_system.git

cd multi_auth_system
```

## 2. Install Dependencies

```bash
composer update
```

## 3. Set Up Environment File

### Create a .env file and set up your database configuration

```bash
cp .env.example .env
```

### 4. Edit the .env file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## 5. Migrate Tables and Seed Data

### Run the following command to migrate the database tables and seed the initial data

```bash
php artisan migrate
```

## 6. Generate JWT Secret Key

### Generate the JWT secret key

```bash
php artisan jwt:secret
```

## 7. Generate Application Key

### Generate the application key:

```bash
php artisan key:generate
```

## 8. Running the Application

### To start the application, use the built-in PHP server with the following command:

```bash
php artisan serve
```

## 9. Accessing the Application

### The API should now be running and accessible at http://localhost:8000

### Start the application using the built-in PHP server with this command:

```bash
php artisan serve
```

## Dependencies

- Laravel 10.x
- Laravel-modules 8.x
- PHP 8.4.2
- Sql
- MySQL

## Configuration

Ensure you have the following configurations in your .env file:

## Contributing

If you wish to contribute to this project, please fork the repository and create a pull request. Ensure your code follows the project's coding standards and includes appropriate tests.

## Contact me

### If you have any questions or need further assistance, you can reach out to me:

### Email: eslamalsayed8133@gmail.com

### LinkedIn: [IslamAlsayed](https://www.linkedin.com/in/islam-alsayed7)
