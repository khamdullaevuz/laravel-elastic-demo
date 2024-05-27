<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel elastic demo
## Installation
### Clone the repository 
### Install dependencies
```bash
composer install
```
### Create environment file
```bash
cp .env.example .env
```
### Generate application key
```bash
php artisan key:generate
```
### Set up your database in the `.env` file
### Run migrations and seeders
```bash
php artisan migrate --seed
```
### Run elasticsearch and kibana
```bash
docker-compose up -d
```
### Create index with scout
```bash
php artisan scout:index posts
```
### Import data to index
```bash
php artisan scout:import "App\Models\Post"
```
### Application is ready to use
```bash
php artisan serve
```
### Open the browser and navigate to
http://localhost:8000
### Search for posts
http://localhost:8000/api/posts?q=lorem
### Open kibana
http://localhost:5601
