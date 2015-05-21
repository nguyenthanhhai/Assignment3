<?php
include_once('../models/phieuxuatkho.php');
include_once('../models/chitietpxk.php');
include_once('../models/nhanvien.php');
include_once('../models/user.php');
include_once('../models/thongke.php');
class CONTROLLER{

	//Only views/login.php use
	function is_login_validate($username,$password,$sid="localhost/orcl"){
		$user = new User;
		$res = $user->get_user_ass3();
		if(isset($res['IDUSER'])) $nrows = sizeof($res['IDUSER']);
		for($i=0;$i<$nrows;$i++){
			if(strcmp($res["USERNAME"][$i],$username) == 0 && strcmp($res["PASSWORD"][$i],$password) == 0){
				$_SESSION['username']=$username;
				$_SESSION['password']=$password;
				return true;
			}
		}
		return false;
	}

	function get_list_table_name(){
		if(!isset($_SESSION['username'])) return NULL;
		$username = $_SESSION['username'];
		$result = array();
		if(strcmp($username,'quanly') == 0){
			array_push($result,"NHANVIEN");
			array_push($result,"DOANHSO");
			array_push($result,"THONGKE");
		}else if(strcmp($username,'xuatkho') == 0){
			array_push($result,'PHIEUXUATKHO');
		}else{
		}
		return $result;
	}

	function get_phieu_xuat_kho($where=array()){
		$phieuxuatkho = new PHIEUXUATKHO;
		return $phieuxuatkho->get_phieu_xuat_kho($where);
	}

	function get_doanh_so($ngaybd,$ngaykt){
		$phieuxuatkho = new PHIEUXUATKHO;
		$res = $phieuxuatkho->get_doanh_so($ngaybd,$ngaykt);
		return $res;
	}

	function get_chi_tiet_pxk($maphieu){
		$chitietpxk = new CHITIETPXK;
		return $chitietpxk->get_chi_tiet_pxk($maphieu);
	}

	function get_filter_phieu_xuat_kho($mode,$value){
		$phieuxuatkho = new PHIEUXUATKHO;
		return $phieuxuatkho->get_filter_phieu_xuat_kho($mode,$value);
	}

	function get_nhan_vien($where=array()){
		$nhanvien = new NHANVIEN;
		return $nhanvien->get_nhan_vien($where);
	}

	function get_thong_ke($nam=2015){
		$thongke = new THONGKE;
		return $thongke->get_thong_ke($nam);
	}
}