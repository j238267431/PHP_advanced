<?php 
   $value = 'добавить';
   $action = 'add';
   $path = '../public/';
      if ($_GET['id']) {
         $value = 'изменить';
         $action = 'change';
         $path = '../../public/';
   }
?>

<form action="<?=$path?>?c=good&a=<?= $action?>&id=<?= $_GET['id']?>" method="POST">
   <input type = text placeholder ="name" name="name"><br>
   <input type = text placeholder ="price" name="price"><br>
   <textarea type = text placeholder ="info" name="info"></textarea><br>
   <input type = text placeholder ="image" name="image"><br>

   <input type = submit value=<?= $value ?>>

</form>