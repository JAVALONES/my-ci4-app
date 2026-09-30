<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 1000px; margin: 40px auto; padding: 0 20px; }
        nav { margin: 20px 0; padding: 10px; background: #f4f4f4; }
        nav a { margin-right: 15px; text-decoration: none; color: #0066cc; }
        nav a:hover { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #006633; color: white; }
        .total { font-size: 18px; font-weight: bold; color: #2e7d32; }
        .record-btn { display: inline-block; margin: 15px 0; padding: 10px 20px; background: #e65100; color: white; text-decoration: none; border-radius: 6px; font-weight: bold; }
        .record-btn:hover { background: #b84100; }
    </style>
</head>
<body>
    <h1><?= esc($heading) ?></h1>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('products') ?>">Products</a>
        <a href="<?= base_url('sales') ?>">Sales History</a>
        <a href="<?= base_url('record-sale') ?>">Record Sale</a>
        <?php if (session()->get('isLoggedIn')): ?>
            | <a href="<?= base_url('logout') ?>">Logout (<?= esc(session()->get('username')) ?>)</a>
        <?php else: ?>
            | <a href="<?= base_url('login') ?>">Login</a>
        <?php endif; ?>
    </nav>

    <?php if (session()->get('success')): ?>
        <p style="color:green; font-weight:bold;"><?= esc(session()->get('success')) ?></p>
    <?php endif; ?>

    <p style="margin-top:10px;"><a href="<?= base_url('record-sale') ?>" class="record-btn">+ Record a New Sale</a></p>

    <?php if (!empty($sales)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Customer</th>
                    <th>Sold By</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $s): ?>
                    <tr>
                        <td><?= esc($s['id']) ?></td>
                        <td><?= esc($s['product_name']) ?></td>
                        <td><?= esc($s['customer_name']) ?></td>
                        <td><?= esc($s['sold_by']) ?></td>
                        <td><?= esc($s['quantity']) ?></td>
                        <td>$<?= number_format($s['unit_price'], 2) ?></td>
                        <td>$<?= number_format($s['total_price'], 2) ?></td>
                        <td><?= esc($s['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="total" style="margin-top:15px;">Total Revenue: $<?= number_format($totalRevenue, 2) ?></p>
    <?php else: ?>
        <p>No sales recorded yet.</p>
    <?php endif; ?>

    <hr style="margin:40px 0; border:0; border-top:1px solid #eee;">
    <p style="color:#999; font-size:12px;">CI4 • Midterm POS • Joseph Victor A. Valones • FEU Alabang</p>
</body>
</html>
