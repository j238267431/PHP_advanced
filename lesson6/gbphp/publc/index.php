<?php
use App\services\Autoloader;
use App\services\NewException;
use App\services\RendererTmplServices;
session_start();
// session_destroy();
//include dirname(__DIR__) . '/services/Autoloader.php'; //удалить
//spl_autoload_register([(new Autoloader()), 'loadClass']);//удалить
require_once dirname(__DIR__) . '/vendor/autoload.php';
$request = new \App\services\Request();

$controllerName = $request->getControllerName();
if (class_exists($controllerName)) {
    /** @var \App\controllers\Controller $realController */
    $realController = new $controllerName(
        new \App\services\TwigRendererServices(),
        $request
    );
    $content = $realController->run($request->getActionName());
    if (!empty($content)) {
        echo $content;
    }
}



