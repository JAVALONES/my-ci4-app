<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 60px auto; padding: 0 20px; text-align: center; }
        .toggle-btn { display: inline-block; margin: 15px; padding: 24px 40px; font-size: 20px; font-weight: bold; border-radius: 12px; text-decoration: none; border: 2px solid; transition: transform 0.2s, box-shadow 0.2s; }
        .toggle-btn:hover { transform: translateY(-3px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        .btn-tfa { background: #e8f5e9; color: #2e7d32; border-color: #2e7d32; }
        .btn-tsa { background: #e3f2fd; color: #1565c0; border-color: #1565c0; }
        .btn-mid { background: #fff3e0; color: #e65100; border-color: #e65100; }
        .subtitle { color: #666; margin-bottom: 30px; font-size: 14px; }
        .footer { margin-top: 40px; color: #999; font-size: 12px; }
    </style>
</head>
<body>
    <h1><?= esc($heading) ?></h1>
    <p class="subtitle">Select a module to begin</p>

    <a href="<?= base_url('customers') ?>" class="toggle-btn btn-tfa">TFA<br><small>Tasks for All — Customers & Users</small></a>
    <a href="<?= base_url('tasks') ?>" class="toggle-btn btn-tsa">TSA<br><small>Tasks for Today — Task Dashboard</small></a>
    <a href="<?= base_url('products') ?>" class="toggle-btn btn-mid">Midterm<br><small>Complete POS — Products & Sales</small></a>

    <hr style="margin: 40px 0; border: 0; border-top: 1px solid #eee;">
    <nav style="margin: 10px 0;">
        <a href="<?= base_url('about') ?>">About</a>
    </nav>
    <div class="footer">CI4 • Joseph Victor A. Valones • FEU Alabang</div>
</body>
</html>
