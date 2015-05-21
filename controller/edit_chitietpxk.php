<?php
require_once('../models/chitietpxk.php');
require_once('../models/user.php');
if(!isset($_POST['edit'])) header('Location: index.php');
$maphieu = $_POST['maphieu'];
$masp = $_POST['masp'];
$ma = $_POST['ma'];
$ten = $_POST['ten'];
$giaban = $_POST['giaban'];
$soluong = $_POST['soluong'];
$tenkm = $_POST['tenkm'];
$attr = array('maphieu' => $maphieu,'masp' =>$masp, 'ma' => $ma,'ten' => $ten,'giaban' => $giaban,'soluong' => $soluong,'tenkm' => $tenkm);
//die(var_dump($attr));
$chitietpxk = new CHITIETPXK;
$res = $chitietpxk->update_chi_tiet_pxk($attr);
$error = error_get_last();
header('Location: ../views/table_phieuxuatkho.php');