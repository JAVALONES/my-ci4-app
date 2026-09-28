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
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #006633; color: white; }
        .status-pending { color: orange; font-weight: bold; }
        .status-in-progress { color: blue; font-weight: bold; }
        .status-completed { color: green; font-weight: bold; }
        .empty-msg { color: #999; font-style: italic; margin: 15px 0; }
    </style>
</head>
<body>
    <h1><?= esc($heading) ?></h1>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('tasks') ?>">Task List</a>
        <a href="<?= base_url('profile') ?>">Profile</a>
        <a href="<?= base_url('about') ?>">About</a>
        <span style="margin-left:10px; font-weight:bold; color:#cc6600;">| TFA ↔ TSA Toggle</span>
        <a href="<?= base_url('customers') ?>" style="margin-left:10px; font-weight:bold; color:#009900;">Customers (TFA)</a>
        <a href="<?= base_url('tasks') ?>" style="font-weight:bold; color:#0066cc;">Tasks (TSA)</a>
    </nav>

    <div style="background:#fff8e1;padding:12px;border-left:4px solid #cc6600;margin:15px 0;border-radius:4px;">
        <strong>Switch Mode:</strong> Click <strong style="color:#009900;">Customers (TFA)</strong> to view customer accounts (TFA2 database), or <strong style="color:#0066cc;">Tasks (TSA)</strong> for today's task list (TSA1). This site runs both activities.
    </div>

    <?php if (!empty($tasks)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['id']) ?></td>
                        <td><?= esc($task['title']) ?></td>
                        <td class="status-<?= esc($task['status']) ?>"><?= esc(ucfirst(str_replace('-', ' ', $task['status']))) ?></td>
                        <td><?= esc($task['task_date']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="empty-msg">No tasks for today.</p>
    <?php endif; ?>
</body>
</html>
