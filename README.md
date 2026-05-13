# 🍞 Bakery Store - SilverStripe Theme

A modern, clean, and fully responsive **Bakery Store** theme built for SilverStripe CMS.  
Perfect for bakeries, pastry shops, cafes, and wholesale bakery businesses.

---

## 📦 Features
- Built on **SilverStripe CMS 5+**
- Responsive design (Bootstrap 5)
- Hero banner with dynamic title & lead text
- Product listing & detail pages
- Wholesale registration page
- Contact page with Info Items (dynamic GridField)
- Integrated Leaflet map for store location
- Easy customization via CMS fields
- SEO friendly structure

---

## 🚀 Installation

### Requirements
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- SilverStripe CMS 5.x
- Web server (Apache/Nginx)

### Steps
1. Create new SilverStripe project:
   ```bash
   composer create-project silverstripe/installer bakery-store

2. Update .env file:
    SS_ENVIRONMENT_TYPE="dev"
    SS_DATABASE_CLASS="MySQLDatabase"
    SS_DATABASE_SERVER="localhost"
    SS_DATABASE_USERNAME="root"
    SS_DATABASE_PASSWORD="yourpassword"
    SS_DATABASE_NAME="silverstripe"
    SS_DEFAULT_ADMIN_USERNAME="admin"
    SS_DEFAULT_ADMIN_PASSWORD="admin123"

### 3. Run dev/build
    Default (Linux/Mac):
    vendor/bin/sake dev/build flush=all

    Alternative options:
    - Windows: php vendor/bin/sake.php dev/build flush=all
    - Browser: http://localhost/bakery-store/dev/build?flush=all
    - Jika flush error: php vendor/bin/sake.php dev/build lalu buka http://localhost/bakery-store?flush=all
    - Composer refresh: composer dump-autoload && php vendor/bin/sake.php dev/build flush=all


# 📂 Project Structure - Bakery Store Theme

This SilverStripe project follows a standard structure. Below is an overview of the main folders and files:

---

## Root Directory
- `.env` → Environment configuration (database, admin login, etc.)
- `.env.example` → Example environment file
- `.gitignore` → Git ignore rules
- `.editorconfig` → Editor configuration
- `.htaccess` → Apache rewrite rules
- `composer.json` → Project dependencies
- `composer.lock` → Dependency lock file
- `README.md` → Documentation

---

## Folders
- **app/**
  - `src/` → Custom PHP classes (Page models, Controllers, DataObjects)
  - Example: `ContactPage.php`, `WholeSalePage.php`, `InfoItem.php`

- **themes/**

- **public/**
  - Entry point for web server
  - Contains `index.php` and public assets

- **vendor/**
  - Composer dependencies (SilverStripe core + modules)
  - ⚠️ Not included in ThemeForest package (install via Composer)

---

## Optional Folders
- `.git/` → Git repository data
- `.graphql-generated/` → Auto-generated GraphQL files (if using GraphQL module)

---

## 📌 Notes
- **Theme files** must be placed in `themes`.
- **Custom logic** (Page types, DataObjects) goes in `app/src/`.
- **Do not upload `vendor/`** to ThemeForest; buyers will install dependencies via Composer.
- **Public assets** should be managed inside `themes/`, not directly in `public/`.

---

## 🛠 Quick Setup
1. Update `.env` with database and admin credentials.
2. Run:
   ```bash
   php vendor/bin/sake.php dev/build flush=all


