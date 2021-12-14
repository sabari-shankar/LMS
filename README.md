# LMS
Library Management System
## Requirements
System Task: Library management system



   1) The application will have two types of users such as Admin and end-users

   2) Admin can 

      - Create and manage books

      - Bulk upload of books with basic error handling

      - View user books subscription details

      - Dashboard: Books count, Subscription count

   3) User can 

      - Register/Login

      - View all available books

      - Subscribe to any books 

  4) Requirements:

      - Framework: Laravel

      - DB query pattern: Eloquent (ORM)

      - At least one middleware

      - Use package for bulk uploading

      - Implement laravel default Auth

      - Migrations

      - Unit test cases for few APIs


## Set Up
#### Create your environment file:

```bash
cp .env.example .env
```
#### Update these settings in the .env file:

-   DB_DATABASE (your local database, i.e. "lms")
-   DB_USERNAME (your local db username, i.e. "root")
-   DB_PASSWORD (your local db password, i.e. "")

#### Generate an app key:

```bash
php artisan key:generate
```

#### Run the database migrations:

```bash
php artisan migrate
```

#### Install Javascript dependencies:

```bash
npm install
```

#### Run an initial build:

```bash
npm run development
```

#### Database Seeding

If you need sample data to work with, you can seed the database:

```
php artisan migrate:refresh --seed --force

#### Seeded User

After seeding the database, you can log in with these credentials:
## ADMIN
Email: `admin@gmail.com`
Password: `LMSadmin@123`

## User
Email: `usera@gmail.com`
Password: `userA@123`

## Unit Test Cases
Verify the Admin/User is able to Register to the application with valid details
Verify the Admin/User is able to Login to the system with valid crendentials
Verify the Admin/User is able to view the dashboard in home page
Verify the Admin is able to create the books in the system
Verify the Admin is able to view the created books in the listing page
Verify the Admin is able to edit the created books in the system
Verify the Admin is able to delete the created books in the system
Verify the Admin is able to delete the created books, only if there is no subscription for that book
Verify the Admin is able to search the books in the listing page
Verify the Admin is able to view the list of subscribers in subscribers menu
Verify the User is able to view the list of books in the system
Verify the User is able to subscribe the book in the system
Verify the User is able to unsubscribe the subscribed book in the system
Verify the User is unable to subscribe the book which count was 0 in the system
