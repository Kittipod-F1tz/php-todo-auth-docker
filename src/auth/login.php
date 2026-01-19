<?php
require "../config/db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["role"] = $user["role"];
        $_SESSION["name"] = $user["name"];

        header("Location: ../dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>

<h2>Login</h2>

<?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>

<form method="POST">
    <input name="email" type="email" placeholder="Email"><br>
    <input name="password" type="password" placeholder="Password"><br>
    <button type="submit">Login</button>
</form>

<a href="register.php">Register</a>
