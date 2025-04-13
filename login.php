<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        header('Location: index.php');
        exit;
    } else {
        $error = 'Невірний email або пароль.';
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Вхід</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <p>Email: <input type="email" name="email" required></p>
        <p>Пароль: <input type="password" name="password" required></p>
        <input type="submit" value="Увійти">
    </form>
    <p>Немає акаунту? <a href="register.php">Зареєструватися</a></p>
</body>
</html>
