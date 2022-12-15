# **How to run laravel project?**
```composer update```
```rename .env.example to .env```
```php artisan key:generate```
```php artisan migrate```
```php artisan serve```

# **The portal must support the capabilities of 3 types of users:**
**General description of the project**
All users of the system are divided into three groups:
> Guest
> Authorized User
> Administrator

Guest Features

> Login to your personal account by login and password
> Registration
> Viewing the main page

Authorized User Capabilities

> Registration, authorization, exit;
> Creating an application for solving a problem;
> View your applications;
> Deleting your application.

Admin Sections

> Changing the status of the application to "Resolved" or "Rejected".
> Managing categories of applications (for example, "road repairs", "garbage collection", etc.)
