<?php
// echo phpinfo();
use App\models\Good;
use App\services\autoloader;
use App\services\DB;
use App\models\Comments;
use App\models\Order;

include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([(new Autoloader()), 'loadClass']);

$db = new DB();

$good = new Good($db);
echo $good->getOne(12);

$comment = new Comments($db);
echo $comment->getOne(1);

$order = new Order($db);
echo $order->getOne(2);