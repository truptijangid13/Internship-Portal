Internship Management System

A secure, modular PHP + MySQL admin dashboard built for managing internship programs, structured tasks, and reviews.

What This Project Is:

This is a fully functional backend-driven internship management system with:

 Program management

 Monthly task tracking

 Weekly task tracking

 Review submission system

 Secure admin dashboard

 AJAX-powered dynamic loading

Built using clean architecture principles and real-world security practices.

Built With:
PHP        → Backend Logic
MySQL      → Database
MySQLi     → Prepared Statements
HTML/CSS   → UI
JavaScript → AJAX / Fetch API
🗄 Database Tables

The system uses the following database tables:

internships
monthly_detail
monthly_tasks
programs
reviews
weekly_detail
weekly_tasks

Security Highlights:

This isn’t just a basic CRUD project.

It includes:

✔ SQL Injection Protection (Prepared Statements)

✔ XSS Prevention using htmlspecialchars()

✔ Session-Based Admin Authentication

✔ JSON API responses

✔ Sensitive config file excluded via .gitignore

Architecture:

The project follows a modular structure:

Admin Dashboard
    ↓
AJAX Requests
    ↓
PHP Backend Modules
    ↓
MySQL Database

Each data module is separated for clarity and maintainability.

Project Structure:
admin_page.php
db_programs.php
db_reviews.php
add_monthly_task.php
add_weekly_task.php
db_ReviewADD.php
config.php (ignored)

How To Run:

Clone the repo

Create the database

Add your own config.php

Run on XAMPP / WAMP

Open:

http://localhost/project-folder/admin_page.php

 Why This Project Stands Out:

Unlike basic CRUD demos, this project focuses on:

Secure backend handling

Clean admin UI

Structured database logic

Real-world implementation mindset

This reflects production-style development rather than beginner-level coding.

Future Upgrades:

Role-based access control

CSRF protection

REST API conversion

MVC architecture

Pagination & search filters

Developer

Trupti Jangid
Backend-Focused Developer
PHP | MySQL | Secure Systems
