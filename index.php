<?php
session_start();
$firstname = $_SESSION['firstname'] ?? '';
$lastname = $_SESSION['lastname'] ?? '';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Книги</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .user-bar {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 16px;
            font-weight: 500;
        }

        .user-bar a {
            background-color: #6495ed;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .user-bar a:hover {
            background-color: #4169e1;
        }
    </style>
</head>
<body>

<div class="user-bar">
    <?php if ($firstname): ?>
        Ви увійшли як: <b><?= htmlspecialchars($firstname . " " . $lastname) ?></b>
        <a href="logout.php">Вийти</a>
    <?php else: ?>
        <a href="login.php">Увійти</a>
    <?php endif; ?>
</div>

<h2>Введіть свої дані:</h2>
<form action="reestr.php" method="POST">
   
::contentReference[oaicite:0]{index=0}
 
