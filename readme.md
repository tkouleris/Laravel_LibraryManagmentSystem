<h1>Library Managment System</h1>

<p>
This is a Library Mangment System developed in <b>Laravel 5.8</b> PHP Framework.
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

The project was developed with the porpose to learn Laravel 5.8

### Installation
1. Run `git clone https://github.com/darkheart101/Laravel_LibraryManagmentSystem.git`
2. Run `composer install` (install composer beforehand)
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file
5. Run `php artisan key:generate`
6. Run `php artisan migrate`

### Seed - Only User
1. Run `php artisan db:seed`

### Seed - Everything
1. Run `vi database/seeds/DatabaseSeeder.php`
2. Uncomment lines in run method
3. Run `php artisan db:seed`

### Seeded Credentials
-------------
* User: admin
* Pass: admin


## To do
* Easier way to select book author
* Search fields for books, authors and borrowers lists
* Book picture

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
