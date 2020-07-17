<?php
use App\models\Good;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="?c=user&a=all">Пользователи</a></li>
        <li><a href="?c=good&a=all">Товары</a></li>
        <li><a href="../views/goodForm.php">Добавить новый товар</a></li>
    </ul>
    <p style="color: red;"><?= $msg ?></p>
    <?= $content ?>
</body>
</html>