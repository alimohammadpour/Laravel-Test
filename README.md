# Laravel-Test

A coding challenge project.

## Dependencies

Ensure the following are installed on your machine:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)
- [Git](https://git-scm.com/)

## Getting Started

To set up the project locally, follow these steps:

### 1. Clone the Repository

```
git clone https://github.com/alimohammadpour/Laravel-Test.git
cd Laravel-Test
```

### 2. Environment Variables
Copy the example environment files for both the main application and the MySQL service:

```
cp .env.example .env
cp mysql/.env.example mysql/.env
```

### 3. Start the applications and Database
```
docker-compose up -d
```

### 4. Setup
Access the PHP container
```
docker-compose exec php bash 
```
Generate the key and migrate main and test databases:
```
php artisan key:generate
php artisan migrate --seed
php artisan migrate --env=testing
```
### 4. Request
send your request to this API (an example of search parameters):
```
http://localhost:8000/api/products?category=boots&priceLessThan=10000
```

### 5. Testing
```
docker-compose exec php vendor/bin/phpunit
```

### Clarification
The discount feature should be implemented by creating a table and relationship with the products table to handle any type of discount dynamically. 
For the purpose of this task, I just applied dictated discounts.
