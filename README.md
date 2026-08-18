# Desa Wisata LSP
Tourism Management System

## Overview
Desa Wisata LSP is a comprehensive Laravel 11 application that provides an integrated management system for tourist destinations. Built with clean architecture principles, it features tour package reservations, homestay management, news, discounts, and payments, optimized for performance and user experience.

## Quick Links
- **Production**: https://desawisata.example.com
- **Staging**: https://stg.desawisata.example.com
- **Technical Documentation**: [TECHNICAL_DOCUMENTATION.md](#)
- **API Documentation**: [docs/API.md](#)

## Table of Contents
- [Features](#features)
- [Getting Started](#getting-started)
- [Environment Configuration](#environment-configuration)
- [Development](#development)
- [Building & Deployment](#building--deployment)
- [Architecture](#architecture)
- [Testing](#testing)
- [Troubleshooting](#troubleshooting)

## Features
- **Integrated Reservation System**: Comprehensive booking for tour packages and homestays.
- **Role-based Access Control**: Specific dashboards for Admin, Treasurer, Homestay Owners, and Customers.
- **Content Management**: Built-in news and article system.
- **Payment & Discounts**: Flexible payment methods with voucher and discount support.
- **PDF Generation**: Automated invoice and receipt generation via DomPDF.

## Environment Configuration
This project supports different configurations for development and production environments.

### Quick Start
For Local Development (Backend + Frontend)
```bash
npm run dev

php artisan serve

npm run dev
```

### Environment Files
- `.env` - Default/fallback configuration (used for local development)
- `.env.example` - Template for environment variables

## Available Scripts

### Development
```bash
php artisan serve         # Run development server
npm run dev               # Run Vite development server for frontend assets
php artisan queue:listen  # Run queue listener for background jobs
```

### Production
```bash
npm run build             # Build frontend assets for production
```

## Architecture
The application follows the MVC (Model-View-Controller) Architecture with clear separation of concerns using Laravel 11:

```
desa_wisata_lsp/
├── app/
│   ├── Http/
│   │   ├── Controllers/  # Route handlers and business logic
│   │   └── Middleware/   # Request middleware (Authentication, Role checks)
│   ├── Models/           # Database models (User, Reservation, Homestay, etc.)
│   └── Providers/        # Service providers for application bootstrapping
├── config/               # Configuration files
├── database/             # Migrations, Seeders, and Factories
├── public/               # Public entry point (index.php) and compiled assets
├── resources/            # Views (Blade templates), CSS, and JS
├── routes/               # Web and Console route definitions
└── tests/                # Feature and Unit tests
```

## Getting Started

### Prerequisites
- PHP 8.2 or higher
- Composer (PHP package manager)
- Node.js 16+ and npm
- MySQL/MariaDB 5.7+
- Modern browser

### Installation

```bash
# 1. Clone the repository
git clone <repository-url> desa_wisata_lsp
cd desa_wisata_lsp

# 2. Install PHP dependencies
composer install

# 3. Install Frontend dependencies
npm install

# 4. Setup Environment
cp .env.example .env
php artisan key:generate

# 5. Configure Database
# Edit your .env file to match your database credentials
# DB_DATABASE=desa_wisata_lsp
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Run Migrations and Seeders
php artisan migrate --seed

# 7. Build frontend assets
npm run build

# 8. Start development server
php artisan serve
```

## Core Features

### Customer Experience
- **Home & Information**: Browse tourism destinations, news, and packages.
- **Booking System**: Seamless reservation for tours and accommodations.
- **Payment Processing**: Multiple payment methods supported securely.
- **History Tracking**: Track previous and current reservations.

### Administrative Control
- **User Management**: Manage staff, owners, and customers.
- **Catalog Management**: Manage tourism objects, packages, and categories.
- **Financial Dashboard**: Treasurer tools for financial reporting and tracking.
- **Property Management**: Homestay owners can manage availability and tracking.

## 🛠️ Technical Stack

### Core Technologies
- **Laravel 11** - PHP Web Framework for backend operations
- **PHP 8.2+** - Advanced server-side language
- **MySQL/MariaDB** - Relational Database Management System
- **Vite 6+** - Next-generation build tool and dev server

### Frontend Technologies
- **Tailwind CSS 3** - Utility-first CSS framework for rapid UI development
- **Bootstrap 5** - Standard UI components
- **Axios** - HTTP client for API requests
- **Blade Templating** - Laravel's powerful server-side templating engine

### Development Tools
- **Laravel Pint** - Opinionated PHP code style fixer
- **PHPUnit 11** - Robust testing framework
- **Laravel Sail** - Light-weight command-line interface for interacting with Docker
- **Laravel Pail** - Real-time log viewer

## Development Guidelines

### Code Style
- Follow PSR-12 coding standards.
- Use `php ./vendor/bin/pint` for automatic code styling.
- Keep controllers thin by moving complex business logic to Services or Models.

### Artisan Commands Reference
```bash
# Generate classes
php artisan make:controller ControllerName
php artisan make:model ModelName -m
php artisan make:seeder SeederName

# Cache management
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
```

## Deployment

### Production Deployment Steps
1. **Environment**: Update `.env` with production database and set `APP_ENV=production`, `APP_DEBUG=false`.
2. **Dependencies**: 
   ```bash
   composer install --optimize-autoloader --no-dev
   npm install
   ```
3. **Build Assets**:
   ```bash
   npm run build
   ```
4. **Cache Configurations**:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
5. **Database Migration**:
   ```bash
   php artisan migrate --force
   ```
6. **Permissions**: Ensure `storage` and `bootstrap/cache` are writable by the web server.
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

## Troubleshooting

### Port 8000 already in use
```bash
php artisan serve --port=8001
```

### Permission denied on storage (Linux/macOS)
```bash
chmod -R 775 storage bootstrap/cache
```

### Database connection error
- Verify MySQL is running locally or remotely.
- Check database credentials in `.env`.
- Ensure database exists: `CREATE DATABASE desa_wisata_lsp;`

### Frontend assets not updating
```bash
npm run dev      # Restart dev server
npm run build    # Rebuild assets for production
```

## Additional Resources
- **Routes**: See `routes/web.php` for all application endpoints.
- **Database Schema**: Check `database/migrations/` for table structures.
- **Controllers**: Located in `app/Http/Controllers/`.
- **Models**: Located in `app/Models/`.

## Latest Updates (August 2026)
### Recent Enhancements
- Upgraded to Laravel 11 for improved security and performance
- Implemented Vite 6 for faster frontend asset bundling
- Enhanced Role-based Access Control (RBAC) mechanisms
- Added comprehensive automated testing support with PHPUnit 11
- Improved database seeding with localized Faker data

For LSP Use
© 2026 Desa Wisata Development
