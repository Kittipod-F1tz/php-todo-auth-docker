<?php
require '../auth/auth.php';
require '../config/db.php';

$stmt = $pdo->prepare(
    "INSERT INTO tasks (title, user_id) VALUES (?, ?)"
);
$stmt->execute([
    $_POST['title'],
    $_SESSION['user_id']
]);

header("Location: /todo");
