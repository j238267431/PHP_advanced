<?php
/**
 * @var \App\services\PaginatorServices $paginator
 */
?>

<h1>Пользователи</h1>
<?php foreach ($paginator->getItems() as $user) :?>
    <p>
        <a href="/?c=user&a=one&id=<?= $user->id ?>">
            <?= $user->fio ?>
        </a>
        <a href="/?c=user&a=del&id=<?= $user->id ?>">
            delete
        </a>
    </p>
    <hr>
<?php endforeach;?>

<?php foreach ($paginator->getUrls() as $page=>$urls) :?>
    <a href="<?= $urls?>"><?= $page?></a>
<?php endforeach;?>