# Midterm Project — Foundation Files

This folder contains **duplicated TFA/TSA files** used as the foundation for the Midterm Project (Complete POS System). No new Midterm-specific files are added here yet — they are staged into the working `app/` directory.

## Structure
```
midterm/
  ├── controllers/   # Customers, Users, Auth, Tasks, Pages, Profile (from TFA+SA)
  ├── models/        # CustomerModel, UserModel, TaskModel
  ├── views/         # customers/, users/, tasks/, auth/, pages/
  ├── filters/       # AuthFilter (TFA4)
  ├── config/        # Routes.php, Filters.php
  ├── database/      # midterm_database.sqlite (full SQLite export)
  └── README.md      # This file
```

## What's reused from earlier activities
| Activity | Component | Path (in app/) |
|---|---|---|
| TFA1 | — | (static arrays, replaced by TFA2) |
| TFA2 | Customer/User management | `app/Controllers/Customers.php`, `Users.php`, `CustomerModel`, `UserModel` |
| TFA3 | Forms + validation + avatar upload | `customers/form.php`, `users/form.php`, validation rules |
| TFA4 | Auth: login/logout + AuthFilter | `app/Controllers/Auth.php`, `app/Filters/AuthFilter.php` |
| TSA1 | Task dashboard (homepage, /tasks, /profile) | `app/Controllers/Pages.php`, `Tasks.php`, `Profile.php` |
| TSA2 | Full task CRUD + soft delete | `Tasks.php` (new/edit/delete), `tasks/form.php`, `is_archived` column |

## What remains to be added for Midterm
| Requirement | File needed |
|---|---|
| Product management (CRUD + image upload) | `app/Controllers/Products.php` + `app/Models/ProductModel.php` + `app/Views/products/*.php` |
| Sales workflow (+ stock reduction) | `app/Controllers/Sales.php` + `app/Models/SaleModel.php` + `app/Views/sales/*.php` |
| Record Sale page | `/record-sale` route (AuthFilter-protected) |
| Sales History page | `/sales` route (AuthFilter-protected) |
| Database tables | `products` + `sales` tables (extend `midterm_database.sqlite`) |

## Homepage selector
The main `/` route now shows 3 toggle buttons (TFA / TSA / Midterm). Clicking one renders that section's sub-homepage:
- **TFA** → `/customers` (Customer Accounts)
- **TSA** → `/tasks` (Task List)
- **Midterm** → `/products` (Product Catalog — to be added)
