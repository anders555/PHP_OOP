<?php
include_once __DIR__."/vendor/autoload.php";
use \App\DBLogger;
use \App\FileLogger;
$new = new DBLogger();
$new->readFromLog();
$log = new FileLogger();
$log->writeToLog();
?>