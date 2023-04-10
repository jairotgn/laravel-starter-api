# laravel-starter-api

This is a REST API for authentication. <br />
Built with laravel.

## Available routes

<ul>
<li>localhost/api/public/login </li>
<li>localhost/api/public/loginCheck </li>
<li>localhost/api/public/register </li>
<li>localhost/api/private/users  </li>
</ul>

## Demo credentials

Email: admin@gmail.com   <br />
Password: password

## Installation
<ol>
<li>npm install </li>
<li>php artisan migrate</li>
<li>php artisan db:seed --class=UserSeeder</li>
</ol>

## Usage

php artisan serve
