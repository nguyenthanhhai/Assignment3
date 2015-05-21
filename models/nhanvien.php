<?php
class NHANVIEN{
	function get_nhan_vien($where=array()){
		$user = new User;
		$conn = $user->conn(__QUANLY__,__PASSWORD_QUANLY__);
		$admin = __ADMIN__;
		if(count($where) > 0){
			foreach($where as $field => $value)
				$query = "SELECT * FROM $admin.NHANVIEN WHERE $field = $value";
		}else{
			$query = "SELECT MANV,HOLOT,TEN,DIACHI,NGAYSINH,NGOAINGU,EMAIL,SDTNOIBO,DIDONG,NGAYVAO,LUONG,VITRI FROM $admin.NHANVIEN";
		}
		$stid = oci_parse($conn,$query);
		oci_execute($stid);
		$nrows = oci_fetch_all($stid, $res);
		return $res;
	}

	function update_nhan_vien($attr=array()){
		$user = new User;
		$conn = $user->conn(__QUANLY__,__PASSWORD_QUANLY__);
		$admin = __ADMIN__;
		$manv = $attr['manv'];
		$holot = $attr['holot'];
		$ten = $attr['ten'];
		$diachi = $attr['diachi'];
		$ngaysinh = $attr['ngaysinh'];
		$ngoaingu = $attr['ngoaingu'];
		$email = $attr['email'];
		$sdtnoibo = $attr['sdtnoibo'];
		$didong = $attr['didong'];
		$bc_cc = $attr['bc_cc'];
		$ngayvao = $attr['ngayvao'];
		$luong = $attr['luong'];
		$vitri = $attr['vitri'];
		$result = FALSE;
		$query = "UPDATE $admin.NHANVIEN set 	holot = '$holot',
												ten = '$ten',
												diachi = '$diachi',
												ngoaingu = '$ngoaingu',
												email = '$email',
												sdtnoibo = '$sdtnoibo',
												didong = '$didong',
												bc_cc = '$bc_cc',
												luong = $luong,
												vitri = '$vitri',
												ngaysinh = '$ngaysinh',
												ngayvao = '$ngayvao'
											WHERE manv = $manv";
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

	function delete_nhan_vien($manv){
		$user = new User;
		$conn = $user->conn(__QUANLY__,__PASSWORD_QUANLY__);
		$admin = __ADMIN__;
		$result = FALSE;
		$query = "DELETE FROM $admin.NHANVIEN WHERE manv = $manv";
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

	function insert_nhan_vien($attr){
		$user = new User;
		$conn = $user->conn(__QUANLY__,__PASSWORD_QUANLY__);
		$admin = __ADMIN__;
		$result = FALSE;
		$holot = $attr['holot'];
		$ten = $attr['ten'];
		$diachi = $attr['diachi'];
		$ngaysinh = $attr['ngaysinh'];
		$ngoaingu = $attr['ngoaingu'];
		$email = $attr['email'];
		$sdtnoibo = $attr['sdtnoibo'];
		$didong = $attr['didong'];
		$bc_cc = $attr['bc_cc'];
		$ngayvao = $attr['ngayvao'];
		$luong = $attr['luong'];
		$vitri = $attr['vitri'];
		$query = "INSERT INTO $admin.NHANVIEN (holot,ten,diachi,ngaysinh,ngoaingu,email,sdtnoibo,didong,bc_cc,ngayvao,luong,vitri) 
					values ('$holot','$ten','$diachi',TO_DATE('$ngaysinh','yyyy/mm/dd'),'$ngoaingu','$email','$sdtnoibo','$didong','$bc_cc',TO_DATE('$ngayvao','yyyy/mm/dd'),$luong,'$vitri')";
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