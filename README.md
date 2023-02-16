<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<div>
    <h3 align="center">To-do List</h3>
        <p align="center">
            A website to list your tasks.
            <br />
        </p>
</div>

### Built With

- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Toastr](https://github.com/CodeSeven/toastr)

### Installation

1. Clone the repo

   ```sh
   git clone -b <branch> <remote_repo>

   example: git clone -b dev https://github.com/username/project.git
   ```

2. Install dependencies
   ```sh
   composer install
   ```
   
3. Generate .env file
   ```sh
   php artisan key:generate //Generate .env file and vendor files
   ```
   
4. Configure database configuration in `.env`
   ```php
   DB_CONNECTION=mysql
   DB_HOST=<host>
   DB_PORT=<port>         
   DB_DATABASE=<db> 
   DB_USERNAME=<username>     
   DB_PASSWORD=<password> 
   ```
   
5. Migrate schema to database
   ```sh
   php artisan migrate
   ```
   
6. Run server with artisan.
   ```sh
   php artisan serve
   ```
