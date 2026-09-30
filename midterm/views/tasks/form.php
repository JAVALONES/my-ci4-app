<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title><?= esc($title) ?></title></head>
<body>
<h1><?= esc($heading) ?></h1>
<nav>
    <a href="<?= base_url('/') ?>">Home</a> | <a href="<?= base_url('tasks') ?>">Task List</a> | <a href="<?= base_url('logout') ?>">Logout</a>
</nav>
<hr>
<?php if (isset($errors) && $errors): ?>
<div style="color:red;">
    <?php if (is_object($errors)): ?>
        <?= $errors->listErrors() ?>
    <?php elseif (is_string($errors)): ?>
        <?= esc($errors) ?>
    <?php endif; ?>
</div>
<?php endif; ?>
<?php if (session()->getFlashdata('message')): ?>
<div style="color:green;"><?= esc(session()->getFlashdata('message')) ?></div>
<?php endif; ?>
<form method="post" action="<?= $task ? base_url('tasks/update/'.$task['id']) : base_url('tasks') ?>">
    <label>Title (required)<br><input type="text" name="title" value="<?= esc(old('title', $old['title'] ?? ($task['title'] ?? ''))) ?>"></label><br><br>
    <label>Task Date (required, YYYY-MM-DD)<br><input type="date" name="task_date" value="<?= esc(old('task_date', $old['task_date'] ?? ($task['task_date'] ?? ''))) ?>"></label><br><br>
    <label>Status
        <select name="status">
            <option value="pending" <?= (old('status', $old['status'] ?? ($task['status'] ?? '')) == 'pending') ? 'selected' : '' ?>>Pending</option>
            <option value="in-progress" <?= (old('status', $old['status'] ?? ($task['status'] ?? '')) == 'in-progress') ? 'selected' : '' ?>>In Progress</option>
            <option value="completed" <?= (old('status', $old['status'] ?? ($task['status'] ?? '')) == 'completed') ? 'selected' : '' ?>>Completed</option>
        </select>
    </label><br><br>
    <button type="submit"><?= $task ? 'Update' : 'Create' ?></button>
</form>
<p><a href="<?= base_url('tasks') ?>">Back to Task List</a></p>
</body>
</html>
