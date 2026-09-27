<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; }
        nav { margin: 20px 0; padding: 10px; background: #f4f4f4; }
        nav a { margin-right: 15px; text-decoration: none; color: #006633; }
        nav a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>About Us</h1>

    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('tasks') ?>">Task List</a>
        <a href="<?= base_url('profile') ?>">Profile</a>
        <a href="<?= base_url('about') ?>">About</a>
    </nav>

    <p><?= esc($message) ?></p>

    <p><strong>Application:</strong> Tasks for Today Management System</p>
    <p><strong>Framework:</strong> CodeIgniter 4</p>
    <p><strong>Developer:</strong> Valon</p>
    <p><strong>Course:</strong> IT0049 - Web System Technologies</p>
    <p><strong>Institution:</strong> College of Computer Studies and Multimedia Arts, ICT-AA</p>
</body>
</html>
