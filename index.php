<?php
include('db/connect.php');

if(array_key_exists('v', $_GET)) {
  $module = $_GET['v'];
} else {
  $module = 'welcome';
}

$moduleDir = 'modules/' . $module . '.php';

if(file_exists($moduleDir)) {
  ob_start();
  include($moduleDir);
  $content = ob_get_contents();
  ob_end_clean();
  include('modules/main.php');
} else {
  header("HTTP/1.1 404 Not Found");
  $moduleDir = 'modules/404.php';
  ob_start();
  include($moduleDir);
  $content = ob_get_contents();
  ob_end_clean();
  include('modules/main.php');
}
