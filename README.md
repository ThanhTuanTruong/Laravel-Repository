## About Laravel Repository

Yes, indeed, there are many ways that laravel can interpret the CRUD functionality. But I personally suggest the service-repository design pattern because it’s clean and sustainable. The concept of repositories and services ensures that you write reusable code and helps to keep your controller as simple as possible making them more readable.

Repositories are usually a common wrapper for your model and the place where you would write different queries in your database. A service on the other hand is a layer for handling all your application’s logic. Based on experience, it’s really conducive to separate the logic and the wrapper of the model especially when you’re working on team or big projects.

## Install and Run
- Commands:
+ php artisan key:generate

+ php artisan migrate

+ php artisan serve

## CRUD with Postman
- Get
 
![image](https://github.com/ThanhTuanTruong/Laravel-Repository/assets/30792959/6e751607-cbc8-4285-86b7-5c225140b598)
