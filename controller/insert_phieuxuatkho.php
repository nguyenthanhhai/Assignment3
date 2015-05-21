<?php
include_once('../models/user.php');
include_once('../models/phieuxuatkho.php');
if(!isset($_POST['insert'])) header('Location: ../views/table_phieuxuatkho.php');
$ngayban = $_POST['ngayban'];
$ghichu = $_POST['ghichu'];
$manv = $_POST['manv'];
$makhach = $_POST['makhach'];
$attr=array('ngayban' => $ngayban, 'ghichu' => $ghichu, 'manv' => $manv, 'makhach' => $makhach);
$phieuxuatkho = new PHIEUXUATKHO;
$result = $phieuxuatkho->insert_phieu_xuat_kho($attr);
//print_r(error_get_last()['message']);
$error = error_get_last();
header('Location: ../views/table_phieuxuatkho.php');