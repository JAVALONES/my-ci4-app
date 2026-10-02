<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        label { display: block; margin: 10px 0 5px; font-weight: bold; }
        input[type="text"], input[type="number"], input[type="file"], select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .error { color: red; font-size: 12px; margin: 5px 0 10px; }
        .submit-btn { background: #006633; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .submit-btn:hover { background: #004d26; }
        .cancel-btn { background: #666; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-left: 10px; }
        .cancel-btn:hover { background: #555; }
        .img-preview { max-width: 120px; max-height: 120px; margin-top: 10px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1><?= esc($heading) ?></h1>
    <form method="post" action="<?= base_url($product ? 'products/update/' . $product['id'] : 'products') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" value="<?= esc(service('request')->getOldInput('name', $product['name'] ?? '')) ?>" required>
        <?php if (isset($validation)): ?>
            <div class="error"><?= esc($validation->getError('name')) ?></div>
        <?php endif; ?>

        <label for="price">Price (₱)</label>
        <input type="number" step="0.01" id="price" name="price" value="<?= esc(service('request')->getOldInput('price', $product['price'] ?? '')) ?>" required>
        <?php if (isset($validation)): ?>
            <div class="error"><?= esc($validation->getError('price')) ?></div>
        <?php endif; ?>

        <label for="stock_quantity">Stock Quantity</label>
        <input type="number" id="stock_quantity" name="stock_quantity" value="<?= esc(service('request')->getOldInput('stock_quantity', $product['stock_quantity'] ?? '')) ?>" required>
        <?php if (isset($validation)): ?>
            <div class="error"><?= esc($validation->getError('stock_quantity')) ?></div>
        <?php endif; ?>

        <label for="image">Product Image</label>
        <input type="file" id="image" name="image" accept="image/*">
        <?php if (isset($validation)): ?>
            <div class="error"><?= esc($validation->getError('image')) ?></div>
        <?php endif; ?>
        <?php if ($product && $product['image'] && file_exists(FCPATH . 'uploads/' . $product['image'])): ?>
            <img src="<?= base_url('uploads/' . $product['image']) ?>" alt="Current image" class="img-preview">
            <p style="font-size:12px; color:#999;">Current image (change to replace)</p>
        <?php endif; ?>

        <div style="margin-top:20px;">
            <button type="submit" class="submit-btn"><?= $product ? 'Update' : 'Create' ?> Product</button>
            <a href="<?= base_url('products') ?>" class="cancel-btn">Cancel</a>
        </div>
    </form>
</body>
</html>
