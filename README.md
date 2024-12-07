# Laravel Product API

## Prerequisites

Ensure you have the following installed: **PHP >= 8.3**, **Composer**, **Node.js and npm**, and a supported database (e.g., MySQL, SQLite).

## Getting Started

1. **Clone the Repository**:

    ```bash
    git clone https://github.com/MehmetFaahem/ecommerce-product-api-laravel.git
    cd ecommerce-product-api-laravel
    ```

2. **Install PHP Dependencies**:

    ```bash
    composer install
    ```

3. **Set Up Environment File**:

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key**:

    ```bash
    php artisan key:generate
    ```

5. **Configure Database**:
   Update the `.env` file with your database credentials. For SQLite (default):

    ```env
    DB_CONNECTION=sqlite
    ```

    Or for MySQL:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. **Run Migrations**:

    ```bash
    php artisan migrate
    ```

7. **Install Frontend Dependencies**:

    ```bash
    npm install
    ```

8. **Build Frontend Assets**:

    ```bash
    npm run build
    ```

9. **Serve the Application**:
    ```bash
    php artisan serve
    ```

The application will be available at http://127.0.0.1:8000
