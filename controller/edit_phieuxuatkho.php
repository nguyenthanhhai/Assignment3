<?php
require_once('../models/phieuxuatkho.php');
require_once('../models/user.php');
if(!isset($_POST['edit'])) header('Location: index.php');
$maphieu = $_POST['maphieu'];
$ngayban = $_POST['ngayban'];
$ghichu = $_POST['ghichu'];
$tongtien = $_POST['tongtien'];
$manv = $_POST['manv'];
$makhach = $_POST['makhach'];
$attr = array('maphieu' => $maphieu, 'ngayban' => $ngayban,'ghichu' => $ghichu,'tongtien' => $tongtien,'manv' => $manv,'makhach' => $makhach);
$phieuxuatkho = new PHIEUXUATKHO;
$res = $phieuxuatkho->update_phieu_xuat_kho($attr);
$error = error_get_last();
header('Location: ../views/table_phieuxuatkho.php');