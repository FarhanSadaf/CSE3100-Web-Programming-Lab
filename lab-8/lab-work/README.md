<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Controller and Middleware
In this lab, we will learn about Laravel [Controllers](https://laravel.com/docs/10.x/controllers) and [Middlewares](https://laravel.com/docs/10.x/middleware).

## Task 1: Basic GET, POST route with form validation
Routes: 
- VIEW `/task1/form1` -> GET `/task1/form/submitted`
- VIEW `/task1/form2` -> POST `/task1/form/submitted`

## Task 2: Solving [the lab test problem](https://github.com/FarhanSadaf/CSE3100-Web-Programming-Lab/blob/main/lab-8/lab-work/public/Lab%207%20(Lab%20Test)/Lab%20Test%20A.pdf) with Middlewares
Routes:
- GET `/task2` 
- IF EMAIL IS SUBMITTED {
    - GET `/task2/bank-account` -> POST `/task2/bank-account`
    - GET `/task2/logout` 
    }

## Useful Links
- https://fkrihnif.medium.com/understanding-the-mvc-architecture-in-laravel-a-comprehensive-guide-8f620cc139b6
- https://tutorialdrive.org/laravel/laravel-request-life-cycle/
- https://medium.com/@ankitatejani84/laravel-request-lifecycle-7c2145aa1257
- https://blog.debugeverything.com/laravel-request-lifecycle/
- https://www.imperva.com/learn/application-security/csrf-cross-site-request-forgery/
- https://spanning.com/blog/cross-site-forgery-web-based-application-security-part-2/

## Quickstart the project
1. Clone the project and change the directory
```
git clone https://github.com/FarhanSadaf/CSE3100-Web-Programming-Lab.git lab-8/weather-app

cd lab-8/weather-app
```
2. Install the dependencies
```
composer install
```
3. Copy `.env.example` to `.env`
```
cp .env.example .env
```
4. Generate application key 
```
php artisan key:generate
```
5. Start the web server
```
php artisan serve
```