# Laravel Project

This is a Laravel 11 application with role-based access control for two primary roles: **Admin** and **Author**. Admins can access all routes. Authors can only access post routes of those they have created.

## Features

- **Role-Based Access Control:**Admin dashboard with proper handling or role based.
- **Admin Role:**
  - Manage users (create, edit, delete).
  - Manage all posts.
- **Author Capabilities:**
  - Manage their own posts (create, edit, delete).
- **MongoDB Integration:** Database setup using MongoDB.
- **Laravel UI:** Bootstrap integrated for frontend UI components.

## Installation

### 1. Clone the repository

```bash
git https://github.com/nibesh-une/myblog
cd myblog
