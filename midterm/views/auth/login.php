<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title><?= esc($title) ?></title></head>
<body>
<h1><?= esc($heading) ?></h1>
<nav><a href="<?= base_url('/') ?>">Home</a> | <a href="<?= base_url('about') ?>">About</a></nav>
<hr>
<form method="post" action="<?= base_url('auth/verify') ?>">
    <label>Username <input type="text" name="username"></label><br>
    <label>Password <input type="password" name="password"></label><br>
    <button type="submit">Login</button>
</form>
<?php if (!empty($errors) && is_string($errors)): ?><div style="color:red;"><?= esc($errors) ?></div><?php endif; ?>
</body>
</html>
