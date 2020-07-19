<?php
/** @var \App\models\User $user */
?>

<h1>Пользователь</h1>
<p>
    Имя:<?= $user->fio ?> <br>
    Логин:<?= $user->login ?>
</p>

<user :user="<?= $user ?>"></user>
