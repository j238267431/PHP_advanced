<?php
use App\engine\App;
session_start();

require_once dirname(__DIR__) . '/vendor/autoload.php';
$config = require_once dirname(__DIR__) . '/engine/config.php';
echo App::call()->run($config);


