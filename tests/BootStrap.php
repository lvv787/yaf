<?php
define('APPLICATION_PATH', dirname(__DIR__), true);
$app = new \Yaf\Application(APPLICATION_PATH . '/conf/application.ini');
$app->bootstrap();
