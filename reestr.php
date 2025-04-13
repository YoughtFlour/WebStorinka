<!DOCTYPE html>
<html>
<head>
    <title>На цю сторінку передається інформація</title>
    <meta charset="utf-8">
</head>
<body>
<?php
$name = $_POST["firstname"];
$surname = $_POST["lastname"];
$city= $_POST["city"];
echo 'Перевірте точність вказаної інформації:';
echo '<br/>-------------------------------------------------------------<br/>';
echo '<div>Вітаємо, <b>' .$name. ' ' . $surname. '.</b></div>';
echo '<p>Місто <b>' . $city. '</b> </p>';
?>
</body>
</html>
