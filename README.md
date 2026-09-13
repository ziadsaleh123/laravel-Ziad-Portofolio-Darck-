# 🏠 Smart Student Housing System

A web-based **Student Housing Management System** designed to help manage and organize student accommodation operations through a centralized management platform.

The system provides a simple and structured way to manage **students, housing floors, payments, reports, authentication, and housing-related data**.

## 📌 Project Overview

**Smart Student Housing System (SSHS)** is a Laravel-based management system developed to simplify the daily operations of student housing.

The system helps administrators manage student information, accommodation data, payments, and reports from one centralized platform.

### Main Features

* 👨‍🎓 Student management
* 🏢 Housing floor management
* 💰 Payment management
* 📝 Reports and complaints management
* 🔐 User authentication
* 🌍 Arabic & English localization
* 📊 Dashboard and statistics
* 📥 Import student data
* 📤 Export student and payment data
* 🔎 Student search and filtering
* 🗄️ Database migrations and seeders
* 🧪 Automated testing support

---

## 🛠️ Technologies & Tools

### Backend

* **PHP 8.2+**
* **Laravel 12**
* **Laravel Sanctum** — API authentication support
* **Laravel Tinker** — Laravel command-line interaction
* **Spatie Laravel Permission** — Roles and permissions
* **Laravel Localization** — Multi-language support

### Database

* **MySQL** / compatible relational database
* **Laravel Eloquent ORM**
* **Laravel Migrations**
* **Laravel Seeders**

### Frontend

* **Blade Templates**
* **HTML5**
* **CSS3**
* **JavaScript**
* **Tailwind CSS 4**
* **Vite 7**
* **Axios**

### Data Import & Export

* **Maatwebsite Laravel Excel**
* **PhpSpreadsheet**

Used for importing and exporting structured data such as student and payment records.

### Testing & Development Tools

* **PHPUnit**
* **FakerPHP**
* **Mockery**
* **Laravel Pint**
* **Laravel Sail**
* **Laravel Pail**

### Development Utilities

* **Composer** — PHP dependency management
* **NPM** — Frontend dependency management
* **Git & GitHub** — Version control and source-code management

---

## 🏗️ Architecture

The project follows the **Laravel MVC (Model–View–Controller)** architecture.

```text
Smart Student Housing System
│
├── Laravel 12
│   ├── Models
│   ├── Controllers
│   ├── Middleware
│   ├── Requests
│   └── Routes
│
├── Blade
│   └── Views
│
├── MySQL
│   └── Database
│
├── Tailwind CSS
│   └── User Interface
│
└── Vite
    └── Frontend Asset Management
```

---

## 📦 Main Packages

| Package              | Purpose                       |
| -------------------- | ----------------------------- |
| Laravel Framework    | Backend application framework |
| Laravel Sanctum      | Authentication                |
| Spatie Permission    | Roles & permissions           |
| Laravel Localization | Multi-language support        |
| Laravel Excel        | Excel import/export           |
| PhpSpreadsheet       | Spreadsheet processing        |
| Tailwind CSS         | UI styling                    |
| Vite                 | Frontend build tool           |
| Axios                | HTTP requests                 |
| PHPUnit              | Automated testing             |
| FakerPHP             | Test data generation          |
| Mockery              | Mocking and testing           |

---

## 🚀 Installation

### Requirements

* PHP 8.2+
* Composer
* Node.js & NPM
* MySQL
* Git

### Setup

```bash
git clone https://github.com/ziadsaleh123/Smart-Student-Housing-System.git

cd Smart-Student-Housing-System

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

npm install

npm run build
```

Start the development server:

```bash
php artisan serve
```

For frontend development:

```bash
npm run dev
```

---

## 🧪 Testing

Run the Laravel test suite using:

```bash
php artisan test
```

Or:

```bash
composer test
```

---

## 👨‍💻 Author

**Ziad Saleh Yeslem Alhori**

Web Designer & Full-Stack Developer

GitHub: [@ziadsaleh123](https://github.com/ziadsaleh123)

---

## 📄 License

This project is currently provided without a dedicated project-level license.

---

⭐ **Smart Student Housing System — A Laravel-based solution for managing student housing operations.**
