<?php
use App\services\Autoloader;
use App\services\DB;
use App\models\Good;
use App\models\User;

include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([(new Autoloader()), 'loadClass']);


$good = new Good();
var_dump($good->getOne(1));
var_dump($good->getAll());
$good->name = 'good1';
$good->price = 100;
$good->info = 'textgood1';
$good->save();

$user = new User();
$user->name = 'name!';
$user->login = 'login!';
$user->password = 'password!';
$user->save();

$user = new User();
$user->id = 1;
$user->name = 'name3';
$user->login = 'log';
$user->password = 'pass';
$user->is_admin = '1';

$user->save();



