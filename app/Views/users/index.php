<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; }
        nav { margin: 20px 0; padding: 10px; background: #f4f4f4; }
        nav a { margin-right: 15px; text-decoration: none; color: #0066cc; }
        nav a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #006633; color: white; }
    </style>
</head>
<body>
    <h1><?= esc($heading) ?></h1>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('about') ?>">About</a>
        <a href="<?= base_url('customers') ?>">Customers</a>
        <a href="<?= base_url('users') ?>">Users</a>
    </nav>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['id']) ?></td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['fullName']) ?></td>
                    <td><?= esc($user['role']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
