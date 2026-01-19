<?php
require '../auth/auth.php';
require '../config/db.php';

$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare(
    "SELECT * FROM tasks WHERE id = ? AND user_id = ?"
);
$stmt->execute([$id, $_SESSION['user_id']]);
$task = $stmt->fetch();

if (!$task) {
    die("Task not found");
}
?>

<h1>Edit To-Do</h1>

<form method="POST" action="/todo/update.php">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">
    <input name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
    <button>Update</button>
</form>

<a href="/todo">Back</a>

