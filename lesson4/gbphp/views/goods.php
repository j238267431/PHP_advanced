<?php
/**
 * @var \App\models\Good[] $goods
 */
?>

<h1>Товары</h1>

<?php foreach ($goods as $good) :?>
    <p>
        <a href="?c=good&a=one&id=<?= $good->id ?>">
            <?= $good->name ?>
        </a>
        <a href="?c=good&a=delete&id=<?= $good->id ?>">
             удалить
        </a>
    </p>

<?php endforeach;?>



<?php foreach ($pages as $page) : ?>
    <a href="?c=good&a=all&page=<?=$page?>"><?=$page?></a>
<?php endforeach; ?>