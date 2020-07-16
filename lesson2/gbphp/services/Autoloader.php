<?php
namespace App\services;
class Autoloader
{

    public function loadClass($className)
    {
        $pattern = '/([a-zA_Z]+)\\\([a-zA_Z]+)\\\([a-zA_Z]+)/i';
        $replacement = '/$2/$3';
        $pathToClass = preg_replace($pattern, $replacement, $className);
        $file = dirname(__DIR__) . $pathToClass . '.php';
        include $file;
    }
}