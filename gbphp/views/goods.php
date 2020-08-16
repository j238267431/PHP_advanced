<?php
/**
 * @var \App\models\Good[] $goods
 */
?>

<h1>Товары</h1>
<?php foreach ($goods as $good) :?>
    <p>
        <a href="/?c=good&a=one&id=<?= $good->id ?>">
            <?= $good->name ?>
        </a>
    </p>
<?php endforeach;?>
