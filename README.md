🚀 Internship Management System
🔥 Secure • Modular • Backend-Driven • Production-Style

A powerful PHP + MySQL Admin Dashboard built to manage internship programs, structured tasks, and review workflows with real-world security practices.

✨ Overview

This project is not just a CRUD demo.
It is a structured backend management system designed with scalability, security, and modularity in mind.

It allows administrators to:

📦 Manage Internship Programs

📅 Track Monthly Tasks

📆 Track Weekly Tasks

📝 Handle Review Submissions

🔐 Access a Secure Admin Dashboard

⚡ Load Content Dynamically using AJAX

Built with clean architecture principles and secure coding standards.

🧠 Core Technologies
<p align="center">

<strong>PHP</strong> •
<strong>MySQL</strong> •
<strong>MySQLi</strong> •
<strong>HTML5</strong> •
<strong>CSS3</strong> •
<strong>JavaScript (Fetch API)</strong>

</p>
🗄 Database Structure

The system uses the following core tables:

internships
monthly_detail
monthly_tasks
programs
reviews
weekly_detail
weekly_tasks
🔐 Security Architecture

This system implements real-world backend protection:

🛡 SQL Injection Prevention via Prepared Statements

🔒 XSS Protection using htmlspecialchars()

👤 Session-Based Admin Authentication

📡 Secure JSON API Responses

🚫 Sensitive Config File Protected using .gitignore

Security is treated as a foundation — not an afterthought.

🏗 System Flow
Admin Dashboard
        │
        ▼
   AJAX Requests
        │
        ▼
  Modular PHP Handlers
        │
        ▼
    MySQL Database

Each component is separated for clarity, maintainability, and future scalability.

📂 Project Modules
admin_page.php
db_programs.php
db_reviews.php
add_monthly_task.php
add_weekly_task.php
db_ReviewADD.php
config.php (excluded from repository)
🚀 Local Setup

Clone the repository

Create the MySQL database

Create your own config.php file

Run using XAMPP / WAMP

Open in browser:

http://localhost/project-folder/admin_page.php
💎 Why This Project Stands Out

✔ Clean modular backend structure
✔ Production-style security practices
✔ Dynamic dashboard workflow
✔ Real-world admin management design
✔ Portfolio-ready backend implementation

This reflects serious backend development, not just academic experimentation.

👩‍💻 Developer
Trupti Jangid

Backend-Focused Developer
PHP • MySQL • Secure Systems
