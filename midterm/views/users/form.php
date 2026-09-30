<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title><?= esc($title) ?></title></head>
<body>
<h1><?= esc($heading) ?></h1>
<nav><a href="<?= base_url('/') ?>">Home</a> | <a href="<?= base_url('tasks') ?>">Tasks</a> | <a href="<?= base_url('customers') ?>">Customers</a> | <a href="<?= base_url('users') ?>">Users</a></nav>
<hr>
<?php if (!empty($errors)): ?><div style="color:red;">Validation errors</div><?php endif; ?>
<form method="post" action="<?= $user ? base_url('users/update/'.$user['id']) : base_url('users') ?>" enctype="multipart/form-data">
    <label>Username <input type="text" name="username" value="<?= old('username', $old['username'] ?? ($user['username'] ?? '')) ?>"></label><br>
    <label>Full Name <input type="text" name="full_name" value="<?= old('full_name', $old['full_name'] ?? ($user['full_name'] ?? '')) ?>"></label><br>
    <?php if ($user): ?><label>Avatar (JPG/PNG, max 2MB) <input type="file" name="avatar"></label><br><?php endif; ?>
    <button type="submit"><?= $user ? 'Update' : 'Create' ?></button>
</form>
<p><a href="<?= base_url('users') ?>">Back to list</a></p>
</body>
</html>
