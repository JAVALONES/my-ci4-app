<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        nav { margin: 20px 0; padding: 10px; background: #f4f4f4; }
        nav a { margin-right: 15px; text-decoration: none; color: #0066cc; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        label { display: block; margin: 10px 0 5px; font-weight: bold; }
        select, input[type="number"] { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .error { color: red; font-size: 12px; margin: 5px 0 10px; }
        .submit-btn { background: #e65100; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .submit-btn:hover { background: #b84100; }
        .cancel-btn { background: #666; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-left: 10px; }
        .price-info { background: #e8f5e9; padding: 10px; border-radius: 4px; margin: 10px 0; font-weight: bold; }
    </style>
</head>
<body>
    <h1><?= esc($heading) ?></h1>
    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('products') ?>">Products</a>
        <a href="<?= base_url('sales') ?>">Sales History</a>
        <?php if (session()->get('isLoggedIn')): ?>
            | <a href="<?= base_url('logout') ?>">Logout (<?= esc(session()->get('username')) ?>)</a>
        <?php else: ?>
            | <a href="<?= base_url('login') ?>">Login</a>
        <?php endif; ?>
    </nav>

    <?php if (session()->get('error')): ?>
        <p style="color:red; font-weight:bold;"><?= esc(session()->get('error')) ?></p>
    <?php endif; ?>

    <?php if (isset($validation)): ?>
        <?php if ($validation->getErrors()): ?>
            <div style="color:red; margin-bottom:10px;">
                <?php foreach ($validation->getErrors() as $error): ?>
                    <div><?= esc($error) ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <form method="post" action="<?= base_url('record-sale/process') ?>">
        <?= csrf_field() ?>

        <label for="product_id">Product</label>
        <select id="product_id" name="product_id" required>
            <option value="">-- Select a product --</option>
            <?php foreach ($products as $p): ?>
                <option value="<?= esc($p['id']) ?>" data-price="<?= esc($p['price']) ?>" data-stock="<?= esc($p['stock_quantity']) ?>">
                    <?= esc($p['name']) ?> — $<?= number_format($p['price'], 2) ?> (Stock: <?= esc($p['stock_quantity']) ?>)
                </option>
            <?php endforeach; ?>
        </select>

        <div class="price-info" id="price-info" style="display:none;"></div>

        <label for="customer_id">Customer</label>
        <select id="customer_id" name="customer_id" required>
            <option value="">-- Select a customer --</option>
            <?php foreach ($customers as $c): ?>
                <option value="<?= esc($c['id']) ?>"><?= esc($c['full_name']) ?> (<?= esc($c['email']) ?>)</option>
            <?php endforeach; ?>
        </select>

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1" required>

        <div class="price-info" id="total-info">Total will appear here after selecting a product and quantity</div>

        <div style="margin-top:20px;">
            <button type="submit" class="submit-btn">Record Sale</button>
            <a href="<?= base_url('sales') ?>" class="cancel-btn">Cancel</a>
        </div>
    </form>

    <script>
        const productSelect = document.getElementById('product_id');
        const quantityInput = document.getElementById('quantity');
        const priceInfo = document.getElementById('price-info');
        const totalInfo = document.getElementById('total-info');

        function updateInfo() {
            const selected = productSelect.options[productSelect.selectedIndex];
            const price = parseFloat(selected.dataset.price) || 0;
            const stock = parseInt(selected.dataset.stock) || 0;
            const qty = parseInt(quantityInput.value) || 0;

            if (price > 0 && selected.value) {
                priceInfo.style.display = 'block';
                priceInfo.textContent = `Unit Price: ₱${price.toFixed(2)} | Available Stock: ${stock}`;
                if (qty > 0) {
                    totalInfo.innerHTML = `<strong>Total: ₱${(price * qty).toFixed(2)}</strong>`;
                    if (qty > stock) {
                        totalInfo.innerHTML += ' <span style="color:red;">(Insufficient stock!)</span>';
                    }
                }
            } else {
                priceInfo.style.display = 'none';
            }
        }

        productSelect.addEventListener('change', updateInfo);
        quantityInput.addEventListener('input', updateInfo);
    </script>
</body>
</html>
