# Provincial Legislative Records

A web application for searching and managing Provincial Ordinances and Resolutions. Submitted for the Computer Programmer I Practical Exam.

**Applicant:** Mark Cyril Tubera  
**Technologies:** PHP 8.3, Laravel 13, MySQL 8, Composer  

---

## Setup Instructions

1. **Install dependencies:**
   ```bash
   composer install
   ```

2. **Configure environment:**
   ```bash
   copy .env.example .env
   php artisan key:generate
   ```

   Update the database settings in `.env` to match your local MySQL configuration:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=legislative_records
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Set up the database:**
   Create the database in MySQL:
   ```sql
   CREATE DATABASE legislative_records;
   ```
   Run migrations and load the sample data:
   ```bash
   php artisan migrate --seed
   ```

4. **Run the application:**
   ```bash
   php artisan serve
   ```
   Access the application:
   - **Public Search:** http://localhost:8000
   - **Admin Login:** http://localhost:8000/login

---

## Default Login Credentials

- **Email:** `admin@example.com`
- **Password:** `password`

---

## Features Implemented

- **Public Search:** Homepage allows searching across both ordinances and resolutions by title keyword (supports partial matching, e.g. "agricultur" finds "Agriculture"). Includes type filtering and view-only record details.
- **Authentication:** Admin area is protected by authentication middleware. Unauthorized access redirects to the login page.
- **Ordinances Module (Admin):** Full CRUD (create, read, update, delete) with record-deletion confirmation. Includes search and filtering by ordinance number, title, and date passed.
- **Resolutions Module (Admin):** Full CRUD with deletion confirmation. Includes search and filtering by resolution number, title, and date passed.
- **Server-Side Validation:** Enforces unique numbers (ordinance and resolution), valid dates, and required fields with inline error messages.

---

## Limitations

- Single admin user; no user registration or role-based access control.
- Text-based records only (no file/PDF attachment uploads).
- Admin date filter matches an exact date rather than a date range.
