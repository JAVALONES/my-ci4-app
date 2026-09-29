# TSA1 Activity

Files connected to **TSA1** (Tasks for Today — task management dashboard with today's task filtering).

## Route Map (TSA)
| Route | Description | Controller | File |
|---|---|---|---|
| `/` | Homepage: today's tasks + TFA↔TSA toggle | `Pages::index` | `app/Controllers/Pages.php` |
| `/tasks` | All tasks (full list) | `Tasks::index` | `app/Controllers/Tasks.php` |
| `/profile` | User profile (admin info) | `Profile::index` | `app/Controllers/Profile.php` |
| `/about` | About Us page | `Pages::about` | `app/Controllers/Pages.php` |

**No authentication required** for TSA routes (public dashboard).

## TSA1 Features
- Homepage shows tasks filtered by today's date (`task_date = today`)
- `/tasks` shows all 12 tasks from the SQLite database
- Tasks have status: `pending`, `in-progress`, `completed` (displayed with color styling)
- Profile page shows logged-in user name, username, email

## Date Distribution
| Date | Tasks | Description |
|---|---|---|
| Sep 26 | 5 | Historical (completed) — not shown on homepage |
| Sep 27 (today) | 5 | Shown on homepage — Tasks for Today |
| Sep 28 (tomorrow) | 2 | Deadline — not shown on homepage |

## File Inventory
```
TSA/
  ├── tsa1_database.sql   # Full TSA1 SQLite database export (customers, users, tasks)
  └── README.md           # This file
```

Source code files (live in `app/` per CI4 PSR-4):
```
app/Controllers/Pages.php     app/Views/pages/home.php   app/Views/pages/about.php
app/Controllers/Tasks.php     app/Views/tasks/index.php
app/Controllers/Profile.php   app/Views/profile/index.php
app/Models/TaskModel.php      app/Models/UserModel.php
```

## Task Schema
```sql
CREATE TABLE tasks (
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL,
    status TEXT DEFAULT 'pending',
    task_date DATE,
    created_at DATETIME
);
```
