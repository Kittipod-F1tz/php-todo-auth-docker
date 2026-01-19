<?php
require '../auth/auth.php';
require '../config/db.php';

$stmt = $pdo->prepare(
    "SELECT * FROM tasks WHERE user_id = ?"
);
$stmt->execute([$_SESSION['user_id']]);
$todos = $stmt->fetchAll();
?>

<h1>My To-Do</h1>

<form method="POST" action="/todo/create.php">
    <input name="title" required>
    <button>Add</button>
</form>

<ul>
<?php foreach ($todos as $todo): ?>
    <li>
    <?= htmlspecialchars($todo['title']) ?>
    <a href="/todo/edit.php?id=<?= $todo['id'] ?>">✏️ Edit</a>
    <a href="/todo/delete.php?id=<?= $todo['id'] ?>">❌</a>
</li>
<?php endforeach ?>
</ul>
