<?php
require __DIR__ . '/auth/auth.php';
?>

<h1>Dashboard</h1>
<h3>Welcome, <?= htmlspecialchars($_SESSION["name"]) ?></h3>
<a href="/todo">My To-Do</a>
<a href="/auth/logout.php">Logout</a>
