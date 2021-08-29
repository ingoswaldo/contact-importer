## Contact Importer

## Step 1: Clone repository

If it's Windows we highly recommend using [Laragon](https://laragon.org/) as a local development environment.

```
git clone https://github.com/ingoswaldo/contact-importer.git
```

## Step 2: Switch to the repo folder

```
cd contact-importer
```

## Step 3: Install all the dependencies using composer

```
composer install
```

## Step 4: Install NPM dependencies and compile assets
```
npm install && npm run dev
```

## Step 5: Create .env file

The .env file is generally not loaded, due to security issues. The easiest way to do this is to copy the .env.example file to .env, and modify the latter:

```
copy .env.example .env
```

## Step 6: Generate project key

Laravel requires an encryption key for each project.

```
php artisan key:generate
```

## Step 7: Create database

Laravel is configured to use mySQL by default, not only the driver, server, database, user and password must be changed, but also the port, mySQL uses 3306 and postgres 5432.

## Step 8: Migrate and seed the database

```
php artisan migrate --seed
```

By default, is created an user with the next creddentials

```
username: user@user.com
password: password
```

## Step 9: Start the local development server

```
php artisan serve
```

# Ready to go!

You can now access the server at http://localhost:8000.

Or http://contact-importer.test/ if you use [Valet](https://laravel.com/docs/7.x/valet) on Mac or [Laragon](https://laragon.org/) on Windows.

# Testing

There are a lot of feature test which you can check them using the console with the next command

```
php artisan test
```