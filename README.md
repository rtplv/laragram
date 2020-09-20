<p align="center"><img src="https://i.imgur.com/tSA5Efs.png" width="200"></p>

## About Laragram

Yet another pet-project with Instagram-like app implementation. 

## Stack

- PHP 7.2
- Laravel 7.2
- Postgres 9.5
- Vue 2.5

## Startup guide

1. Install dependencies
```bash
composer install
npm install
```

2. Prepare app
```bash
php artisan key:generate
php artisan storage:link
```

3. Fill DB data
```bash
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
```

4. Set mail service to `.env`
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
```

5. Build frontend

- for development:  `npm run hot`
- for production: `npm run prod`

## Demo credentials

- email - **demo@demo.ru** 
- password - **demo**
