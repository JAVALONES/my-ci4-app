<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; }
        nav { margin: 20px 0; padding: 10px; background: #f4f4f4; }
        nav a { margin-right: 15px; text-decoration: none; color: #006633; }
        nav a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #006633; color: white; }
        .status-pending { color: orange; font-weight: bold; }
        .status-in-progress { color: blue; font-weight: bold; }
        .status-completed { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Task List</h1>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('tasks') ?>">Task List</a>
        <a href="<?= base_url('profile') ?>">Profile</a>
        <a href="<?= base_url('about') ?>">About</a>
        <?php if (session()->get('isLoggedIn')): ?>
            | <a href="<?= base_url('tasks/new') ?>">New Task</a>
            <a href="<?= base_url('logout') ?>">Logout (<?= esc(session()->get('username')) ?>)</a>
        <?php else: ?>
            | <a href="<?= base_url('login') ?>">Login</a>
        <?php endif; ?>
        | <span style="font-weight:bold; color:#cc6600;">| TFA ↔ TSA ↔ Midterm</span>
        <a href="<?= base_url('customers') ?>" style="font-weight:bold; color:#009900;">Customers (TFA)</a>
        <a href="<?= base_url('tasks') ?>" style="font-weight:bold; color:#0066cc;">Tasks (TSA)</a>
        <a href="<?= base_url('products') ?>" style="font-weight:bold; color:#e65100;">Products (Midterm)</a>
    </nav>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Status</th>
                <th>Date</th>
                <?php if (session()->get('isLoggedIn')): ?><th>Actions</th><?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['id']) ?></td>
                    <td><?= esc($task['title']) ?></td>
                    <td class="status-<?= esc($task['status']) ?>"><?= esc(ucfirst(str_replace('-', ' ', $task['status']))) ?></td>
                    <td><?= esc($task['task_date']) ?></td>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <td>
                            <a href="<?= base_url('tasks/edit/'.$task['id']) ?>">Edit</a> |
                            <a href="<?= base_url('tasks/delete/'.$task['id']) ?>" onclick="return confirm('Archive this task?')"><font color="red">Delete</font></a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
