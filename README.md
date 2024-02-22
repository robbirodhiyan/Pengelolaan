# Laravel Contact Profiles CRUD

This is a simple Laravel application for managing contact profiles. It provides basic CRUD functionality (Create, Read, Update, Delete) for contact profiles.

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 7.3
- Composer installed
- Laravel installed (you can install it using `composer global require laravel/installer`)

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/robbirodhiyan/Pengelolaan.git
    ```

2. Navigate to the project's root directory:

    ```bash
    cd Pengelolaan
    ```

3. Install dependencies:

    ```bash
    composer install
    npm install
    ```

4. import database:

    ```bash
    contactprofiles.sql
    ```

5. Generate an application key:

    ```bash
    php artisan key:generate
    ```

6. Configure your database connection in the `.env` file.

7. Run the database migrations:

    ```bash
    php artisan migrate
    ```

8. Start the development server:

    ```bash
    php artisan serve
    ```

The application should now be accessible at `http://localhost:8000`.

## Usage

- Visit `http://localhost:8000/contact-profiles` to access the contact profiles.

## Contributing

Contributions are welcome! Feel free to open an issue or submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
