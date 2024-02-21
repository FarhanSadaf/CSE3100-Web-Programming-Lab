<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Expense Tracker
Your own daily and monthly expense tracker.

## ERD
![ERD](./public/images/erd.png)

# Follow the following steps
1. Create a new Laravel project.
    ```
    composer create-project laravel/laravel expense-tracker

    cd weather-app-api
    ```

2. Open in Visual Studio Code and run the project.

    ```
   php artisan serve
    ```

3. To create `users`, `monthly_expenses`, `categories`, and `expenses` tables, we will generate database migration files using the following commands
    
    ```
    php artisan make:migration create_users_table
    php artisan make:migration create_monthly_expenses_table
    php artisan make:migration create_categories_table 
    php artisan make:migration create_expenses_table
    ```
    and a new file under the `database/migrations` directory will be created. In this file, we will add necessary column fields according to our ERD. 
    
4. Turn on the `MYSQL` server on XAMPP. 
    Setup your database configurations on `.env` file. E.g. MYSQL port is 3306, and database name is `expense_tracker_db` in this case.
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=expense_tracker_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    Finally, run the migration by executing following command,
    ```
    php artisan migrate
    ```
    You can check the database on phpMyAdmin by running the Apache server and going to the admin panel.

    If you want to check how many migrations you have ran so far, run the following command
    ```
    php artisan migrate:status
    ```
