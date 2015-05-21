<?php
include_once('../models/user.php');
include_once('../models/chitietpxk.php');
if(!isset($_GET['maphieu'])) header('Location: ../views/table_phieuxuatkho.php');
$maphieu = $_GET['maphieu'];
$masp = $_GET['masp'];
$chitietpxk = new CHITIETPXK;
$result = $chitietpxk->delete_chi_tiet_pxk($maphieu,$masp);
$error = error_get_last();
header('Location: ../views/table_phieuxuatkho.php');