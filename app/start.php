<?php

use Slim\App;

ini_set('display_errors', 'On');

define('INC_ROOT', dirname(__DIR__));

require INC_ROOT.'/vendor/autoload.php';

$config = require INC_ROOT . '/app/config/development.php';

$app = new App($config);

require  INC_ROOT. '/app/container.php';
require INC_ROOT . '/app/routes.php';

$app->run();