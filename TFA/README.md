# TFA Activities

Files connected to **TFA1, TFA2, TFA3, TFA4** (Tasks for All — customer and user management with forms, validation, file upload, and authentication).

## Route Map (TFA)
| Route | Activity | Controller | File |
|---|---|---|---|
| `/customers` | TFA2 | `Customers::index` | `app/Controllers/Customers.php` |
| `/customers/new` | TFA3 | `Customers::new` | `app/Controllers/Customers.php` |
| `/customers/edit/{id}` | TFA3 | `Customers::edit` | `app/Controllers/Customers.php` |
| `/users` | TFA2 | `Users::index` | `app/Controllers/Users.php` |
| `/users/new` | TFA3 | `Users::new` | `app/Controllers/Users.php` |
| `/users/edit/{id}` | TFA3 | `Users::edit` | `app/Controllers/Users.php` |
| `/login` | TFA4 | `Auth::login` | `app/Controllers/Auth.php` |
| `/logout` | TFA4 | `Auth::logout` | `app/Controllers/Auth.php` |

**Auth is required** for all routes above (TFA4 `AuthFilter` in `app/Config/Filters.php`).

Login credentials: `admin/admin`, `juan/juan`, `maria/maria`, `pedro/pedro`, `sara/sara`

## TFA Breakdown
- **TFA1**: Static arrays + MySQL (original prototype — replaced by TFA2)
- **TFA2**: SQLite + Query Builder + MVC — `CustomerModel`, `UserModel`, `Customers`, `Users` controllers, `customers/index`, `users/index` views
- **TFA3**: HTML forms with validation + avatar file upload (JPG/PNG ≤2MB → `public/uploads/`)
- **TFA4**: `password_hash` column + `Auth::login/verify/logout`, `AuthFilter`

## File Inventory
```
TFA/
  ├── tfa2_database.sql     # Full TFA2 SQLite database export
  └── README.md             # This file
```

Source code files (live in `app/` per CI4 PSR-4):
```
app/Controllers/Customers.php  app/Views/customers/form.php  app/Views/customers/index.php
app/Controllers/Users.php      app/Views/users/form.php        app/Views/users/index.php
app/Controllers/Auth.php       app/Views/auth/login.php        app/Filters/AuthFilter.php
app/Models/CustomerModel.php   app/Models/UserModel.php
```

## Database Schema Additions (TFA3 + TFA4)
```sql
ALTER TABLE users ADD COLUMN avatar VARCHAR(255) DEFAULT NULL;
ALTER TABLE users ADD COLUMN password_hash VARCHAR(255) DEFAULT NULL;
```

## Login Instructions
1. Navigate to `/login`
2. Enter username + password (password = username for test accounts)
3. Redirects to `/customers` (protected TFA route)
4. Use `/logout` to end session
