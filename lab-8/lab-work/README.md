<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Controller and Middleware
In this lab, we will learn about Laravel [Controllers](https://laravel.com/docs/10.x/controllers) and [Middlewares](https://laravel.com/docs/10.x/middleware).

## Task 1: Basic GET, POST route with form validation
Routes: 
- VIEW `/task1/form1` -> GET `/task1/form/submitted`
- VIEW `/task1/form2` -> POST `/task1/form/submitted`

## Task 2: Solving the lab test problem with middlewares
![Lab test problem](./public/Lab 7 (Lab Test)/Lab Test A.pdf)
Routes:
- GET `/task2` 
- IF EMAIL IS SUBMITTED {
    - GET `/task2/bank-account` -> POST `/task2/bank-account`
    - GET `/task2/logout` 
    }