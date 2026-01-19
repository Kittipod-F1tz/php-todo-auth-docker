<?php
require '../auth/auth.php';
require '../config/db.php';

$stmt = $pdo->prepare(
    "UPDATE tasks SET title = ? WHERE id = ? AND user_id = ?"
);
$stmt->execute([
    $_POST['title'],
    $_POST['id'],
    $_SESSION['user_id']
]);

header("Location: /todo");
