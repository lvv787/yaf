<?php
//ini_set("yaf.use_namespace",1);//没有作用是因为其设置范围只能在php.ini里

ini_set("display_errors", 1);
error_reporting(E_ALL);

define('APPLICATION_PATH', dirname(__FILE__));

$application = new Yaf\Application(APPLICATION_PATH . "/conf/application.ini");



$application->bootstrap()->run();
