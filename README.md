# Collection Project

This project is a web application for managing collections, allowing users to create, view, and contribute to various collections. The application is built using PHP, Laravel, and Tailwind CSS.

## Prerequisites

- PHP \>= 7.3
- Composer
- Node.js and npm

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/yourusername/collection-project.git
    cd collection-project
    ```

2. Install PHP dependencies:
    ```sh
    composer install
    ```

3. Install JavaScript dependencies:
    ```sh
    npm install
    ```

4. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```sh
    cp .env.example .env
    ```

5. Generate the application key:
    ```sh
    php artisan key:generate
    ```

6. Run the database migrations and seeders:
    ```sh
    php artisan migrate --seed
    ```

## Usage

### Running the Application

To start the development server, run:
```sh
php artisan serve
```
### Assigning Points

To assign points to a user, use the assign:points command. The command takes two arguments: the user ID and the number of points to assign.

```sh
php artisan assign:points 1 100
```

or 1 argument to assign points to all users

```sh
php artisan assign:points 1000
```

### Seeders

Seeders are used to populate the database with initial data. The project includes seeders for creating default users and collections.
For example, to seed the users table, run:
```sh
php artisan db:seed --class=UsersTableSeeder  
```

To seed the collections table for random user, run:

```sh
php artisan db:seed --class=CollectionSeeder
```  

