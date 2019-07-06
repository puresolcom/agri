# Mini Agriculture System Assessment

This system was created with lumen and on-top of it I have been using LUCID structure where every thing is decoupled into smaller pieces of code called jobs and grouped into what I call "Operations" when needed

## Tech Stack Keywords

 1. PHP7
 2. Lumen
 3. Lucid Structure
 4. Custom ACL
 5. MariaDB/MySQL
 6. JWT
 7. Eloquent AR/ORM

## File Structure

| Path | Description |
|--|--|
| bootstrap/app.php | Application bootstrap where services and middle-wares are registered |
|routes/web.php|this is where routes are defined|
|database/agrico.sql|this file should be imported into MySQL db|
|database/migrations|this is where all migration files are stored|
|app/data/models|this is where models are stored|
|app/domains/*|this is where domain-separated logic are stored|
|app/features|this is where all controller features are stored|
|app/operations|this is where operations are stored|
|app/http/controllers|All controllers used in routes are here|
|app/http/middleware|HTTP Middle-wares are stored here|
|.env|this is where env variables are stored and DB configuration needs to be defined here as well|

## Create files and folders

The file explorer is accessible using the button in left corner of the navigation bar. You can create a new file by clicking the **New file** button in the file explorer. You can also create folders by clicking the **New folder** button.


## How to install

 1. LAMP stack installed on any linux server
 2. Apache Virtual host to use "public" directory as its root path
 3. run `composer update` to install all dependencies
 4. Update `.env` file with your database credentials
 5. Import `database/agrico.sql` to any mysql database or (Optional) you may run `php artisan migrate` to install migration files directly into your database to create empty schema (is this later case you will have to assign users roles manually in DB in `user_role` table)
 6. Done, now you may try all the endpoints
 
## Test User/s

The following users were created in the sample db file

 1. user1@user.com
 2. user2@user.com
 3. user3@user.com
 4. administrator@administrator.com
 5. moderator@moderator.com
 
 Passwords for all of them are **"123456"**