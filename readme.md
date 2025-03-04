# Laravel Coding Exercises

I asked ChatGPT to give a checklist of Laravel coding challenges I could use to practice and get up to speed on Laravel updates since I last worked full time with the framework.

## Project Overview
This project is a collection of Laravel coding challenges designed to test and improve proficiency in Laravel development. The exercises cover authentication, API development, database optimization, caching, testing, event-driven programming, and more. The project is built using the latest Laravel version and follows best practices for modern Laravel applications.

## Setup Instructions
To set up this project locally using Laravel Sail:

1. **Clone the repository:**
   ```sh
   git clone https://github.com/kdunlap/laravel-playground.git
   cd laravel-playground
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Copy the environment file and set up environment variables:**
   ```sh
   cp .env.example .env
   ```
   Update the `.env` file as needed.

4. **Start Laravel Sail:**
   ```sh
   ./vendor/bin/sail up -d
   ```

5. **Run database migrations and seeders:**
   ```sh
   ./vendor/bin/sail artisan migrate --seed
   ```

6. **Access the application:**
   - API: `http://localhost`
   - Sail shell: `./vendor/bin/sail shell`

## Coding Challenges Checklist

Below is the list of coding exercises included in this project. Each challenge is implemented as a separate feature branch or module.

1. User Authentication & Role-Based Access
  - [x] Implement user authentication using Laravel's built-in starter kits.
  - [ ] Add role-based access control (RBAC) where only users with the "admin" role can access certain routes.
  - [x] Implement email verification for new users.
2. Eloquent Relationships & Query Optimization
  - [ ] Set up models for User, Post, and Comment with proper relationships (hasMany, belongsTo).
  - [ ] Write an optimized query to fetch a user's posts along with the latest three comments per post using eager loading.
3. Custom Middleware for Request Validation
  - [ ] Create a middleware that ensures API requests contain a valid API key in the headers.
  - [ ] The middleware should log unauthorized attempts and throttle requests exceeding a limit.
4. API Development with Laravel Sanctum & Rate Limiting
  - [ ] Develop a REST API for a task management system (tasks CRUD operations).
  - [ ] Secure the API using Laravel Sanctum.
  - [ ] Implement rate limiting to prevent abuse.
5. Queue and Job Handling for Background Processing
  - [ ] Create a queued job that sends a reminder email to users who haven’t logged in for 30 days.
  - [ ] Use Laravel's queue system with a Redis or database queue driver.
  - [ ] Implement automatic retry and logging for failed jobs.
6. Caching for Performance with Database Events
  - [ ] Implement caching for retrieving a list of products, using Redis.
  - [ ] Automatically invalidate the cache when a product is updated or deleted by utilizing Laravel's model event listeners.
7. Custom Artisan Command for Automated User Management
  - [ ] Create an Artisan command that deactivates users who haven’t logged in for over a year.
  - [ ] Schedule the command to run daily.
  - [ ] Log the results of the execution to a database table.
8. Comprehensive Testing with PHPUnit & Pest
  - [ ] Write unit tests for a simple CRUD API, covering validation and authentication.
  - [ ] Write feature tests to check API response structure.
  - [ ] Use mocking for external API calls.
9. Event-Driven Architecture for Notifications
  - [ ] Create an event that triggers when a user updates their profile.
  - [ ] Implement listeners to log the changes and send an email notification.
  - [ ] Use Laravel Notifications to send updates via email and database notifications.
10. Multi-Tenancy with Database Scoping
  - [ ] Implement a basic multi-tenant system where users belong to different organizations.
  - [ ] Ensure users can only access data related to their organization using query scoping.
  - [ ] Implement middleware to automatically detect the tenant based on the logged-in user.


## Running Tests
To execute the test suite, use:
```sh
./vendor/bin/sail artisan test
```

## Contribution Guidelines
If you’d like to contribute, follow these steps:
1. Fork the repository.
2. Create a feature branch for a specific exercise.
3. Implement the solution and add tests.
4. Submit a pull request for review.

---
This project is designed to help Laravel developers sharpen their skills and prepare for technical interviews or real-world development challenges.