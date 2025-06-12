# Infinity Web Application

Infinity is a web application built with PHP using the CodeIgniter framework, designed to assist with organizational or community management, such as event tracking, meetings, attendance, announcements, and member data management.

## Features

- Cache management (supports APC, file, memcached, redis, etc.)
- Database backup (MySQL/Interbase/Firebird)
- Email sending (PHPMailer)
- Excel export/import (PHPExcel)
- MIME types configuration
- Logging and error handling

## Installation

1. Clone this repository
2. Copy the `.env.example` file to `.env` (if available)
3. Configure the database in `application/config/database.php`
4. Make sure the `application/cache/` and `application/logs/` folders are writable
5. Run the application on a web server that supports PHP

---
**Note:**  
A dummy database is available in the `infinity.sql` file.  
All data inside is dummy and does not use real usernames or passwords.