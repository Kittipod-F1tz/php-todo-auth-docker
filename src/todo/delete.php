<?php
require '../auth/auth.php';
require '../config/db.php';

$stmt = $pdo->prepare(
    "DELETE FROM tasks WHERE id = ? AND user_id = ?"
);
$stmt->execute([
    $_GET['id'],
    $_SESSION['user_id']
]);

header("Location: /todo");
