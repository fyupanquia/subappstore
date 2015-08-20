<?php
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

require 'app/libs/connect.php';
require 'app/servicio/login.php';
include 'app/servicio/api.php';

$app->run();