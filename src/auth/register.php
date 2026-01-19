<?php
require "../config/db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (!$name || !$email || !$password) {
        $error = "All fields are required";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare(
                "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
            );
            $stmt->execute([$name, $email, $hash]);

            header("Location: login.php");
            exit;
        } catch (PDOException $e) {
            $error = "Email already exists";
        }
    }
}
?>

<h2>Register</h2>

<?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="POST">
    <input name="name" placeholder="Name"><br>
    <input name="email" type="email" placeholder="Email"><br>
    <input name="password" type="password" placeholder="Password"><br>
    <button type="submit">Register</button>
</form>

<a href="login.php">Login</a>
