<?php
session_start();
include('controller.php');
if(class_exists('CONTROLLER')){
  $controller = new CONTROLLER;
}
//xử lý đăng nhập
if(isset($_POST['login'])){
  if($_POST['username'] == ""){
    $is_error="Chưa điền tên người dùng";
  }else if($_POST['password'] == ""){
    $is_error="Chưa điền mật khẩu";
  }
  else{
    //TODO: test...
    $isValid=$controller->is_login_validate($_POST['username'],$_POST['password']);
    if($isValid){
      header('Location: ../views/index.php');
    }else{
      $is_error="Tài khoản hoặc mật khẩu sai";
    }
  }
}
if(isset($is_error)){
  $_SESSION['error']=$is_error;
  header('Location: ../views/login.php');
}
?>