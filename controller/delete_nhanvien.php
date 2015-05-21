<?php
include_once('../models/user.php');
include_once('../models/nhanvien.php');
if(!isset($_GET['manv'])) header('Location: ../views/table_nhanvien.php');
$manv = $_GET['manv'];
$nhanvien = new NHANVIEN;
$result = $nhanvien->delete_nhan_vien($manv);
$error = error_get_last();
header('Location: ../views/table_nhanvien.php');