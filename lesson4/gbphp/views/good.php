<?php
/** @var \App\models\Good $user */
?>

<h1>Товар</h1>
<p>
    Название:<?= $good->name ?> <br>
    Стоимость:<?= $good->price ?>
</p>
<p><a href="../views/goodForm.php/?id=<?=$good->id?>">изменить</a></p>

<user :good="<?= $good->name ?>"></user>