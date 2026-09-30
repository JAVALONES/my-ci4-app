<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; }
        nav { margin: 20px 0; padding: 10px; background: #f4f4f4; }
        nav a { margin-right: 15px; text-decoration: none; color: #006633; }
        nav a:hover { text-decoration: underline; }
        .profile-card { background: #f9f9f9; padding: 20px; border-radius: 8px; border: 1px solid #ddd; }
        .profile-card table { width: 100%; border-collapse: collapse; }
        .profile-card th { text-align: left; padding: 8px; color: #555; width: 30%; }
        .profile-card td { padding: 8px; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>
    <h1>User Profile</h1>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('tasks') ?>">Task List</a>
        <a href="<?= base_url('profile') ?>">Profile</a>
        <a href="<?= base_url('about') ?>">About</a>
    </nav>

    <?php if (!empty($user)): ?>
        <div class="profile-card">
            <table>
                <tr><th>Username</th><td><?= esc($user['username']) ?></td></tr>
                <tr><th>Full Name</th><td><?= esc($user['full_name']) ?></td></tr>
                <tr><th>Email</th><td><?= esc($user['email']) ?></td></tr>
                <tr><th>Member Since</th><td><?= esc($user['created_at']) ?></td></tr>
            </table>
        </div>
    <?php else: ?>
        <p>No user data available.</p>
    <?php endif; ?>
</body>
</html>
