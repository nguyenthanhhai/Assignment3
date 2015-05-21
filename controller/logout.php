<?php
session_start();

if(isset($_SESSION['username'])) unset($_SESSION['username']);
if(isset($_SESSION['password'])) unset($_SESSION['password']);
if(isset($_SESSION['error'])) unset($_SESSION['error']);
header('Location: ../views/login.php');