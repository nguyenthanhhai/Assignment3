<?php
require_once('../models/nhanvien.php');
require_once('../models/user.php');
if(!isset($_POST['edit'])) header('Location: index.php');
$manv = $_POST['manv'];
$holot = $_POST['holot'];
$ten = $_POST['ten'];
$diachi = $_POST['diachi'];
$ngaysinh = $_POST['ngaysinh'];
$ngoaingu = $_POST['ngoaingu'];
$email = $_POST['email'];
$sdtnoibo = $_POST['sdtnoibo'];
$didong = $_POST['didong'];
$ngayvao = $_POST['ngayvao'];
$luong = $_POST['luong'];
$vitri = $_POST['vitri'];
$attr = array('manv' => $manv, 'holot' => $holot,'ten' => $ten,'diachi' => $diachi,'ngaysinh' => $ngaysinh,'ngoaingu' => $ngoaingu, 'email' => $email, 'sdtnoibo' => $sdtnoibo, 'didong' => $didong, 'bc_cc' => 'Nothing', 'ngayvao' => $ngayvao, 'luong' => $luong, 'vitri' => $vitri);
$nhanvien = new NHANVIEN;
$res = $nhanvien->update_nhan_vien($attr);
$error = error_get_last();
var_dump($error);
header('Location: ../views/table_nhanvien.php');