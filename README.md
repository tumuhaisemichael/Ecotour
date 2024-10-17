<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About the Project

**EcoTour Uganda** is a community-driven tourism platform designed to connect tourists with unique, eco-friendly experiences offered by rural communities in Uganda. The platform allows tourists to discover, book, and experience homestays, cultural tours, workshops, and nature-based activities directly from local hosts.

Our goal is to create an authentic experience for travelers while empowering local communities economically, fostering cultural exchange, and promoting sustainable tourism practices.

## Technologies and Frameworks

The system is developed using the following key technologies:

- **Laravel**: A modern PHP framework designed for building robust web applications with simplicity and elegance.
- **Livewire**: A full-stack framework for Laravel that makes building dynamic interfaces simple, without the need for JavaScript frameworks.
- **MySQL/PostgreSQL**: A relational database system for storing data related to users, bookings, and experiences.
- **Tailwind CSS**: A utility-first CSS framework for building clean and responsive UIs.

## Features

- **User Authentication and Profiles**: Secure user registration and login system for both tourists and hosts.
- **Listings Management**: Hosts can create, edit, and manage experiences (homestays, tours, etc.).
- **Search and Booking**: Tourists can search for experiences and make bookings directly on the platform.
- **Payments Integration**: Simple and secure payment gateway for processing bookings, with automatic commission deduction for the platform.
- **Reviews and Ratings**: Tourists can leave reviews and rate their experiences.
- **Admin Panel**: Manage users, listings, and monitor platform activity.

## Installation

To install and set up this project locally:

1. Clone the repository:
    ```bash
    git clone https://github.com/tumuhaisemichael/Ecotour
    ```

2. Navigate into the project directory:
    ```bash
    cd Ecotour
    ```

3. Install dependencies using Composer:
    ```bash
    composer install
    ```

4. Set up your `.env` file by copying the example file:
    ```bash
    cp .env.example .env
    ```

5. Generate the application key:
    ```bash
    php artisan key:generate
    ```

6. Configure the database settings in the `.env` file, and then run migrations to set up the database:
    ```bash
    php artisan migrate
    ```

7. Install frontend dependencies using npm (optional for CSS/JS):
    ```bash
    npm install && npm run dev
    ```

8. Start the development server:
    ```bash
    php artisan serve
    ```

## Route Setup

Sample setup of the routes after creating a livewire component

```php
use App\Livewire\ComponentName;


// Livewire route
Route::get('/sample', ComponentName::class);

```

## Contribution Guidelines

We welcome contributions from the open-source community to improve and enhance the platform. Please follow the steps below:

1. Fork the repository.
2. Create a new branch with a descriptive name (`git checkout -b feature-name`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature-name`).
5. Submit a pull request detailing your changes.

## License

This project is licensed under the MIT License.

## Contact

For any inquiries or support, please reach out to the project maintainers at your-email@example.com.
