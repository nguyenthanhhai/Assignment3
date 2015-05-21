<?php
include_once('../models/user.php');
include_once('../models/chitietpxk.php');
if(!isset($_POST['insert'])) header('Location: ../views/table_phieuxuatkho.php');
$maphieu = $_POST['maphieu'];
$ma = $_POST['ma'];
$giaban = $_POST['giaban'];
$soluong = $_POST['soluong'];
$attr=array('maphieu' => $maphieu, 'ma' => $ma, 'giaban' => $giaban, 'soluong' => $soluong);
$chitietpxk = new CHITIETPXK;
$result = $chitietpxk->insert_chi_tiet_pxk($attr);
//print_r(error_get_last()['message']);
$error = error_get_last();
header('Location: ../views/table_phieuxuatkho.php');