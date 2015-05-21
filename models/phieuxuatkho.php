<?php
class PHIEUXUATKHO{
	function get_phieu_xuat_kho($where=array()){
		$user = new User;
		$conn = $user->conn(__XUATKHO__,__PASSWORD_XUATKHO__);
		$admin = __ADMIN__;
		if(count($where) > 0){
			foreach($where as $field => $value)
				$stid = oci_parse($conn, "SELECT pxk.*,nv.HOLOT||' '||nv.Ten as HOTENNV,kh.HOLOT||' '||kh.Ten as HOTENKH FROM $admin.PHIEUXUATKHO pxk,$admin.VIEW_NHANVIEN nv,$admin.KHACH kh WHERE $field = $value and pxk.manv = nv.manv and pxk.makhach = kh.makhach");
		}else{
			$stid = oci_parse($conn, "SELECT pxk.*,nv.HOLOT||' '||nv.Ten as HOTENNV,kh.HOLOT||' '||kh.Ten as HOTENKH FROM $admin.PHIEUXUATKHO pxk,$admin.VIEW_NHANVIEN nv,$admin.KHACH kh WHERE pxk.manv = nv.manv and pxk.makhach = kh.makhach");
		}
		oci_execute($stid);
		$nrows = oci_fetch_all($stid, $res);
		return $res;
	}

	function get_doanh_so($ngaybd,$ngaykt){
		$user = new User;
		$conn = $user->conn(__QUANLY__,__PASSWORD_QUANLY__);
		$admin = __ADMIN__;
		if(strcmp($ngaybd,'') == 0 || strcmp($ngaykt,'') == 0){
			$query = "SELECT NGAYBAN, sum(TONGTIEN) TONGTIEN FROM $admin.PHIEUXUATKHO GROUP BY NGAYBAN ORDER BY NGAYBAN ASC";
		}else{
			$query = "SELECT NGAYBAN, sum(TONGTIEN) TONGTIEN FROM $admin.PHIEUXUATKHO WHERE NGAYBAN > TO_DATE('$ngaybd','yyyy/mm/dd') and NGAYBAN < TO_DATE('$ngaykt','yyyy/mm/dd') GROUP BY NGAYBAN ORDER BY NGAYBAN ASC";
		}

		$stid = oci_parse($conn, $query);
		oci_execute($stid);
		$nrows = oci_fetch_all($stid, $res);
		return $res;	
	}

	function get_filter_phieu_xuat_kho($mode,$value){
		$user = new User;
		$conn = $user->conn(__XUATKHO__,__PASSWORD_XUATKHO__);
		$admin = __ADMIN__;
		if(strcmp($mode,'ngay') == 0){
			$query = "SELECT pxk.*,nv.HOLOT||' '||nv.Ten as HOTENNV,kh.HOLOT||' '||kh.Ten as HOTENKH FROM $admin.PHIEUXUATKHO pxk,$admin.VIEW_NHANVIEN nv,$admin.KHACH kh WHERE EXTRACT(day from pxk.NGAYBAN) = $value and pxk.manv = nv.manv and pxk.makhach = kh.makhach";
		}else if(strcmp($mode,'thang') == 0){
			$query = "SELECT pxk.*,nv.HOLOT||' '||nv.Ten as HOTENNV,kh.HOLOT||' '||kh.Ten as HOTENKH FROM $admin.PHIEUXUATKHO pxk,$admin.VIEW_NHANVIEN nv,$admin.KHACH kh WHERE EXTRACT(month from pxk.NGAYBAN) = $value and pxk.manv = nv.manv and pxk.makhach = kh.makhach";
		}else if(strcmp($mode,'tennv') == 0){
			$query = "SELECT pxk.*,nv.HOLOT||' '||nv.Ten as HOTENNV,kh.HOLOT||' '||kh.Ten as HOTENKH FROM $admin.PHIEUXUATKHO pxk,$admin.VIEW_NHANVIEN nv,$admin.KHACH kh WHERE nv.HOLOT||' '||nv.Ten = '$value' and pxk.manv = nv.manv and pxk.makhach = kh.makhach";
		}else if(strcmp($mode,'tenkh') == 0){
			$query = "SELECT pxk.*,nv.HOLOT||' '||nv.Ten as HOTENNV,kh.HOLOT||' '||kh.Ten as HOTENKH FROM $admin.PHIEUXUATKHO pxk,$admin.VIEW_NHANVIEN nv,$admin.KHACH kh WHERE kh.HOLOT||' '||kh.Ten = '$value' and pxk.manv = nv.manv and pxk.makhach = kh.makhach";
		}
		$stid = oci_parse($conn,$query);
		oci_execute($stid);
		$nrows = oci_fetch_all($stid, $res);
		return $res;
	}

	function update_phieu_xuat_kho($attr=array()){
		$user = new User;
		$conn = $user->conn(__XUATKHO__,__PASSWORD_XUATKHO__);
		$admin = __ADMIN__;
		$ghichu = $attr['ghichu'];
		$ngayban = $attr['ngayban'];
		$manv = $attr['manv'];
		$makhach = $attr['makhach'];
		$maphieu = $attr['maphieu'];
		$result = FALSE;
		$query = "UPDATE $admin.PHIEUXUATKHO set ngayban = TO_DATE('$ngayban','yyyy/mm/dd'),
												 ghichu = '$ghichu',
												 manv = $manv,
												 makhach = $makhach
											WHERE maphieu = $maphieu";
		
		$stid = oci_parse($conn,$query);
		$objExecute = oci_execute($stid, OCI_DEFAULT);
		if($stid){
			oci_commit($conn);
			$result = TRUE;
		}else{
			oci_rollback($conn);
			$result = FALSE;
		}
		oci_close($conn);
		return $result;
	}

	function delete_phieu_xuat_kho($maphieu){
		$user = new User;
		$conn = $user->conn(__XUATKHO__,__PASSWORD_XUATKHO__);
		$admin = __ADMIN__;
		$result = FALSE;
		$query = "DELETE FROM $admin.PHIEUXUATKHO WHERE maphieu = $maphieu";
		$stid = oci_parse($conn,$query);
		$objExecute = oci_execute($stid, OCI_DEFAULT);
		if($stid){
			oci_commit($conn);
			$result = TRUE;
		}else{
			oci_rollback($conn);
			$result = FALSE;
		}
		oci_close($conn);
		return $result;
	}

	function insert_phieu_xuat_kho($attr){
		$user = new User;
		$conn = $user->conn(__XUATKHO__,__PASSWORD_XUATKHO__);
		$admin = __ADMIN__;
		$result = FALSE;
		$ngayban = $attr['ngayban'];
		$ghichu = $attr['ghichu'];
		$manv = $attr['manv'];
		$makhach = $attr['makhach'];
		$query = "INSERT INTO $admin.PHIEUXUATKHO (ngayban,ghichu,manv,makhach) values (TO_DATE('$ngayban','yyyy/mm/dd'),'$ghichu',$manv,$makhach)";
		$stid = oci_parse($conn,$query);
		$objExecute = oci_execute($stid, OCI_DEFAULT);
		if($stid){
			oci_commit($conn);
			$result = TRUE;
		}else{
			oci_rollback($conn);
			$result = FALSE;
		}
		oci_close($conn);
		return $result;	
	}
}