<?php
/**
 * @var \App\models\User[] $users
 */
?>

<h1>Пользователи</h1>
<?php foreach ($users as $user) :?>
    <p>
        <a href="?c=user&a=one&id=<?= $user->id ?>">
            <?= $user->fio ?>
        </a>
    </p>
<?php endforeach;?>

<?php foreach ($pages as $page) : ?>
    <a href="?c=user&a=all&page=<?=$page?>"><?=$page?></a>
<?php endforeach; ?>
