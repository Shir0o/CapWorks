<?php

ob_start();

require_once('function.php');
require_once('db_function.php');
require_once('credential.php');
require_once('FirePHP.class.php');

foreach(glob('class/*.class.php') as $file) {
  require_once($file);
}

$database = db_connect();
Caps::set_database($database);

 ?>
