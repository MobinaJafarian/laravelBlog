# Laravel Blog
Laravel Blog Application 


## Table of Contents
* [General Info](#general-information)
* [Technologies Used](#technologies-used)
* [Features](#features)
* [Screenshots](#screenshots)
* [Setup](#setup)
* [Project Status](#project-status)
* [Contact](#contact)



## General Information
Laravel Blog Application using Laravel Breeze in persian


## Technologies Used
- PHP 8.1.10
- Laravel 9.19
- Composer 2.4.3


## Features
- Admin panel
- User role : admin | author | user
- Categories
- Posts Managment
- Comments Managment 
- User information
- Search in posts
- Converted to solar date

## Screenshots
![laravel blog screenshot](./public/images/screenshots/Screenshot%202022-11-03%20at%2009-29-27%20%D9%88%D8%A8%D9%84%D8%A7%DA%AF%20-%20%D8%B5%D9%81%D8%AD%D9%87%20%D8%A7%D8%B5%D9%84%DB%8C.png)

![laravel blog js category screenshot](./public/images/screenshots/Screenshot%202022-11-03%20at%2009-30-40%20%D9%88%D8%A8%D9%84%D8%A7%DA%AF%20-%20%D8%B5%D9%81%D8%AD%D9%87%20%D8%A7%D8%B5%D9%84%DB%8C.png)

![login page screenshot](./public/images/screenshots/Screenshot%202022-11-03%20at%2009-30-56%20%D9%88%D8%A8%D9%84%D8%A7%DA%AF%20-%20%D8%B5%D9%81%D8%AD%D9%87%20%D9%88%D8%B1%D9%88%D8%AF.png)

![post page screenshot](./public/images/screenshots/Screenshot%202022-11-03%20at%2009-34-31%20Laravel%20CMS%20Panel%20-%20%D9%85%D8%AF%DB%8C%D8%B1%DB%8C%D8%AA%20%D9%85%D9%82%D8%A7%D9%84%D8%A7%D8%AA.png)

![profile page screenshot](./public/images/screenshots/Screenshot%202022-11-03%20at%2009-40-32%20Laravel%20CMS%20Panel%20-%20%D8%B5%D9%81%D8%AD%D9%87%20%D8%A7%D8%B7%D9%84%D8%A7%D8%B9%D8%A7%D8%AA%20%DA%A9%D8%A7%D8%B1%D8%A8%D8%B1%DB%8C.png)

## Setup

```
git clone https://github.com/MobinaJafarian/laravelBlog.git blog
cd blog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```
then

```
php artisan serve
```


## Project Status
Project is:  _complete_




## Contact
Created by [@MobinaJafarian](https://github.com/MobinaJafarian) - feel free to contact me!
