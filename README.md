This project is in Laravel 8 with argon dashboard and added vue 3 and bootstrap 5

Need to develop patient E-Data record system for patients for doctors for data analysis.

run the following command in terminal

composer install
npm install
npm run dev or npm run watch

Also run composer dump-autoload
Run php artisan migrate --seed to create basic users table

user: admin@argon.com
pass: secret

I have set up Vue 3 js and bootstrap 5.
It is ready to start.

user types: 0 (default) => patients, 1 => doctors, 2 => Admin, 3=> super admin

doctors can add/edit the patients of the particular hospital he is appointed to update his profile.
Admin can add/edit patient, add/edit doctors, add/edit hospital and update his profile,
Super admin can add/edit/delete patient, doector and users/admin too.
