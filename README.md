# CodeIgniter POS Project

In compliance with the subject "Web System Technologies"

## Required Pages

| Route | Controller | Method | Description |
|-------|-----------|--------|-------------|
| `/` | Pages | `index()` | Landing page |
| `/about` | Pages | `about()` | About page |
|| `/customers` | Customers | `index()` | Customer Accounts — 5 records from SQLite (`customers` table via `CustomerModel`) |
|| `/users` | Users | `index()` | User Accounts — 5 records from SQLite (`users` table via `UserModel`) |

## Project Structure

```
my-ci4-app/
├── app/
│   ├── Config/
│   │   ├── App.php       (indexPage = '', baseURL configured)
│   │   └── Routes.php    (4 routes registered)
│   ├── Controllers/
│   │   ├── Pages.php     (Home + About)
│   │   ├── Customers.php (Customer list — static PHP array)
│   │   └── Users.php     (User list — static PHP array)
│   ├── Models/
│   │   └── ProductModel.php
│   ├── Views/
│   │   ├── pages/
│   │   │   ├── home.php
│   │   │   └── about.php
│   │   ├── customers/
│   │   │   └── index.php
│   │   └── users/
│   │       └── index.php
│   └── ...
├── public/
├── system/
├── .env           (configured with development mode + base URL)
├── .htaccess      (for clean URLs)
├── composer.json
├── spark
└── README.md
```

## Setup Instructions

### Prerequisites
- PHP 8.2 or newer
- Composer 2.0.14 or newer
- Apache with `mod_rewrite` enabled and `AllowOverride All`
- MySQL (optional — only for the Products module)

### Installation

1. Clone this repository:
```bash
git clone https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git my-ci4-app
cd my-ci4-app
```

2. Install Composer dependencies (if `vendor/` is not included):
```bash
composer install
```

3. Configure `.env` (already set up — verify these lines):
```
CI_ENVIRONMENT = development
app.baseURL = 'http://localhost/my-ci4-app/'
```

4. Start Apache and MySQL via XAMPP Control Panel.

5. Visit: `http://localhost/my-ci4-app/`

## Technical Notes

- This activity uses **static PHP arrays** as a temporary data source (no database for Customers and Users pages).
- The `esc()` helper is used for safe HTML output.
- Navigation links are present on all four pages.
- The `.env` file is included for lab submission purposes.
