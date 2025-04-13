<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $city = trim($_POST['city']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Проверка, существует ли пользователь
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $error = 'Користувач з таким email вже існує.';
    } else {
        // Вставка нового пользователя
        $stmt = $pdo->prepare('INSERT INTO users (firstname, lastname, city, email, password) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$firstname, $lastname, $city, $email, $password]);
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Реєстрація</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <p>Ім’я: <input type="text" name="firstname" required></p>
        <p>Прізвище: <input type="text" name="lastname" required></p>
        <p>Місто: <input type="text" name="city" required></p>
        <p>Email: <input type="email" name="email" required></p>
        <p>Пароль: <input type="password" name="password" required></p>
        <input type="submit" value="Зареєструватися">
    </form>
    <p>Вже маєте акаунт? <a href="login.php">Увійти</a></p>
</body>
</html>
