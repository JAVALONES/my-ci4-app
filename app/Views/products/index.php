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
        .product-grid { display: grid; grid-template-columns: repeat(auto-fill, repeat(3, 1fr)); gap: 20px; }
        .product-card { border: 1px solid #ddd; border-radius: 8px; padding: 15px; text-align: center; }
        .product-img { max-width: 120px; max-height: 120px; object-fit: cover; border-radius: 4px; }
        .no-img { width: 120px; height: 120px; background: #eee; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #999; margin: 0 auto; }
        .price { font-size: 18px; font-weight: bold; color: #2e7d32; }
        .stock { font-size: 12px; color: #666; }
        .stock-low { color: orange; }
        .stock-out { color: red; }
        .actions { margin-top: 10px; }
        .new-btn { display: inline-block; margin: 10px 0; padding: 8px 16px; background: #006633; color: white; text-decoration: none; border-radius: 4px; }
        .new-btn:hover { background: #004d26; }
    </style>
</head>
<body>
    <h1><?= esc($heading) ?></h1>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('tasks') ?>">Tasks (TSA)</a>
        <a href="<?= base_url('customers') ?>">Customers (TFA)</a>
        <a href="<?= base_url('products') ?>">Products (Midterm)</a>
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

    <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('products/new') ?>" class="new-btn">Add New Product</a>
    <?php endif; ?>

    <?php if (!empty($products)): ?>
        <div class="product-grid">
            <?php foreach ($products as $p): ?>
                <div class="product-card">
                    <?php if ($p['image']): ?>
                        <?php if (strpos($p['image'], 'http') === 0): ?>
                            <img src="<?= esc($p['image']) ?>" alt="<?= esc($p['name']) ?>" class="product-img">
                        <?php elseif (file_exists(FCPATH . 'uploads/' . $p['image'])): ?>
                            <img src="<?= base_url('uploads/' . $p['image']) ?>" alt="<?= esc($p['name']) ?>" class="product-img">
                        <?php else: ?>
                            <div class="no-img">No Image</div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="no-img">No Image</div>
                    <?php endif; ?>
                    <h3><?= esc($p['name']) ?></h3>
                    <p class="price">₱<?= number_format($p['price'], 2) ?></p>
                    <p class="stock <?= $p['stock_quantity'] <= 0 ? 'stock-out' : ($p['stock_quantity'] <= 5 ? 'stock-low' : '') ?>">
                        Stock: <?= esc($p['stock_quantity']) ?>
                    </p>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <div class="actions">
                            <a href="<?= base_url('products/edit/' . $p['id']) ?>">Edit</a> |
                            <a href="<?= base_url('products/delete/' . $p['id']) ?>" onclick="return confirm('Delete this product?')" style="color:red;">Delete</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No products available.</p>
    <?php endif; ?>

    <hr style="margin:40px 0; border:0; border-top:1px solid #eee;">
    <p style="color:#999; font-size:12px;">CI4 • Midterm POS • Joseph Victor A. Valones • FEU Alabang</p>
</body>
</html>
