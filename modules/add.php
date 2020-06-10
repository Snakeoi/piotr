<?php
function add(){
  global $connect;
  global $_GET;
  global $_POST;
  $sql = "INSERT INTO opinie (restid, name, rate, opinion) VALUES ('{$_GET['id']}', '{$_POST['name']}', '{$_POST['rate']}', '{$_POST['opinion']}')";

  if ($connect->query($sql) === TRUE) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    echo "Error: " . $sql . "<br>" . $connect->error;
  }
}

add();
