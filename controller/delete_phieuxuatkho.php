<?php
include_once('../models/user.php');
include_once('../models/phieuxuatkho.php');
if(!isset($_GET['maphieu'])) header('Location: ../views/table_phieuxuatkho.php');
$maphieu = $_GET['maphieu'];
$phieuxuatkho = new PHIEUXUATKHO;
$result = $phieuxuatkho->delete_phieu_xuat_kho($maphieu);
$error = error_get_last();
header('Location: ../views/table_phieuxuatkho.php');