<?php
    /** @var \App\models\Good $good */
?>

<h1>Добавление товара</h1>
<form action="?c=good&a=add&id=<?=$good->id?>" method="post">
    <input type="text" name="name" placeholder="name" value="<?=$good->name?>">
    <input type="text" name="price" placeholder="price" value="<?=$good->price?>">
    <input type="text" name="info" placeholder="info" value="<?=$good->info?>">
    <input type="submit">
</form>