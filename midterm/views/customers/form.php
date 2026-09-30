<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title><?= esc($title) ?></title></head>
<body>
<h1><?= esc($heading) ?></h1>
<nav><a href="<?= base_url('/') ?>">Home</a> | <a href="<?= base_url('tasks') ?>">Tasks</a> | <a href="<?= base_url('customers') ?>">Customers</a> | <a href="<?= base_url('users') ?>">Users</a></nav>
<hr>
<?php if (!empty($errors)): ?><div style="color:red;">Validation errors</div><?php endif; ?>
<form method="post" action="<?= $customer ? base_url('customers/update/'.$customer['id']) : base_url('customers') ?>">
    <label>Full Name <input type="text" name="full_name" value="<?= old('full_name', $old['full_name'] ?? ($customer['full_name'] ?? '')) ?>"></label><br>
    <label>Email <input type="email" name="email" value="<?= old('email', $old['email'] ?? ($customer['email'] ?? '')) ?>"></label><br>
    <label>Phone <input type="text" name="phone" value="<?= old('phone', $old['phone'] ?? ($customer['phone'] ?? '')) ?>"></label><br>
    <button type="submit"><?= $customer ? 'Update' : 'Create' ?></button>
</form>
<p><a href="<?= base_url('customers') ?>">Back to list</a></p>
</body>
</html>
