<?php
class CHITIETPXK{
	function get_chi_tiet_pxk($maphieu=''){
		$user = new User;
		$conn = $user->conn(__XUATKHO__,__PASSWORD_XUATKHO__);
		$admin = __ADMIN__;
		$result = array();
		$query="
			Select pxk.maphieu as MaPhieu,pxktb.MaSPTB as MaSP,lsp.MaLSP as Ma,lsp.Ten as Ten,pxktb.GiaBan,1 as SOLUONG,ctkm.ten as TENKM
			From $admin.KHACH kh, $admin.PHIEUXUATKHO pxk, $admin.CHITIETPXKTB pxktb, $admin.SANPHAMTB sanphamtb, $admin.LOAISANPHAM lsp, $admin.PHIEUXUATKHO_KM pxk_km, $admin.CHUONGTRINHKM ctkm
			WHERE kh.MaKhach=pxk.MaKhach and pxk.MaPhieu=pxktb.MaPhieu and sanphamtb.MaSPTB=pxktb.MaSPTB and sanphamtb.MaLSP=lsp.MaLSP and pxk_km.maphieu=pxk.maphieu and ctkm.makm=pxk_km.makm
			UNION
			Select pxk.maphieu as MaPhieu,pxktb.MaSPTB as MaSP,lsp.MaLSP as Ma,lsp.Ten as Ten,pxktb.GiaBan,1 as SOLUONG,'Nothing' as TENKM
			From $admin.KHACH kh, $admin.PHIEUXUATKHO pxk, $admin.CHITIETPXKTB pxktb, $admin.SANPHAMTB sanphamtb, $admin.LOAISANPHAM lsp
			WHERE kh.MaKhach=pxk.MaKhach and pxk.MaPhieu=pxktb.MaPhieu and sanphamtb.MaSPTB=pxktb.MaSPTB and sanphamtb.MaLSP=lsp.MaLSP and pxk.maphieu not in (select maphieu from $admin.phieuxuatkho_km)
			UNION
			Select pxk.maphieu as MaPhieu,pxkpk.MaSPPK as MaSP,lsp.MaLSP as Ma,lsp.Ten as Ten,pxkpk.GiaBan,pxkpk.SoLuong as SOLUONG,ctkm.ten as TENKM
			From $admin.KHACH kh, $admin.PHIEUXUATKHO pxk, $admin.CHITIETPXKPK pxkpk, $admin.SANPHAMPK sanphampk, $admin.LOAISANPHAM lsp, $admin.PHIEUXUATKHO_KM pxk_km, $admin.CHUONGTRINHKM ctkm
			WHERE kh.MaKhach=pxk.MaKhach and pxk.MaPhieu=pxkpk.MaPhieu and sanphampk.MaSPPK=pxkpk.MaSPPK and sanphampk.MaLSP=lsp.MaLSP  and pxk_km.maphieu=pxk.maphieu and ctkm.makm=pxk_km.makm
			UNION
			Select pxk.maphieu as MaPhieu,pxkpk.MaSPPK as MaSP,lsp.MaLSP as Ma,lsp.Ten as Ten,pxkpk.GiaBan,pxkpk.SoLuong as SOLUONG,'Nothing' as TENKM
			From $admin.KHACH kh, $admin.PHIEUXUATKHO pxk, $admin.CHITIETPXKPK pxkpk, $admin.SANPHAMPK sanphampk, $admin.LOAISANPHAM lsp
			WHERE kh.MaKhach=pxk.MaKhach and pxk.MaPhieu=pxkpk.MaPhieu and sanphampk.MaSPPK=pxkpk.MaSPPK and sanphampk.MaLSP=lsp.MaLSP  and pxk.maphieu not in (select maphieu from $admin.phieuxuatkho_km)";
		if(strcmp($maphieu,'') == 0){
			$stid = oci_parse($conn, $query);
		}else{
			$stid = oci_parse($conn, "Select * From ($query) WHERE MaPhieu = $maphieu");
		}

		oci_execute($stid);
		$nrows = oci_fetch_all($stid, $res);
		return $res;
	}

	function update_chi_tiet_pxk($attr){
		$user = new User;
		$conn = $user->conn(__XUATKHO__,__PASSWORD_XUATKHO__);
		$admin = __ADMIN__;
		$maphieu = $attr['maphieu'];
		$masp = $attr['masp'];
		$ma = $attr['ma'];
		$ten = $attr['ten'];
		$giaban = $attr['giaban'];
		$soluong = $attr['soluong'];
		$tenkm = $attr['tenkm'];
		$result = FALSE;
		$pos = strpos($masp,'TB');
		if($pos === 0){
			echo "TB";
			$query = "UPDATE $admin.CHITIETPXKTB set giaban = $giaban WHERE maphieu = $maphieu and masptb = '$masp'";
		}else{
			echo "PK";
			$query = "UPDATE $admin.CHITIETPXKPK set giaban = $giaban,soluong = $soluong  WHERE maphieu = $maphieu and masppk = '$masp'";
		}
		//die($query);
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

	function delete_chi_tiet_pxk($maphieu,$masp){
		$user = new User;
		$conn = $user->conn(__XUATKHO__,__PASSWORD_XUATKHO__);
		$admin = __ADMIN__;
		$result = FALSE;
		echo $maphieu;
		$pos = strpos($masp,'TB');
		if($pos === 0){
			$query = "DELETE FROM $admin.CHITIETPXKTB WHERE maphieu = $maphieu and masptb = '$masp'";
		}else{
			$query = "DELETE FROM $admin.CHITIETPXKPK WHERE maphieu = $maphieu and masppk = '$masp'";
		}
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

	function insert_chi_tiet_pxk($attr){
		$user = new User;
		$conn = $user->conn(__XUATKHO__,__PASSWORD_XUATKHO__);
		$admin = __ADMIN__;
		$result = FALSE;
		$maphieu = $attr['maphieu'];
		$ma = $attr['ma'];
		$giaban = $attr['giaban'];
		$soluong = $attr['soluong'];
		$pos = strpos($ma,'P');
		if($pos === 0){
			$query = "SELECT * FROM $admin.SANPHAMPK WHERE MaLSP = '$ma'";
		}else{
			$query = "SELECT * FROM $admin.SANPHAMTB WHERE MaLSP = '$ma'";
		}
		$stid = oci_parse($conn, $query);
		oci_execute($stid);
		$nrows = oci_fetch_all($stid, $res);
		if($pos === 0){
			for($i=0;$i<$nrows;$i++){
				if($res['SLKHO'][$i]>0){
					$masp = $res['MASPPK'][$i];
					$query = "INSERT INTO $admin.CHITIETPXKPK values ($maphieu,'$masp',$giaban,$soluong)";
					break;
				}
			}
		}else{
			for($i=0;$i<$nrows;$i++){
				if(strcmp($res['DABAN'][$i],'N') == 0){
					$masp = $res['MASPTB'][$i];
					$query = "INSERT INTO $admin.CHITIETPXKTB values ($maphieu,'$masp',$giaban)";
					break;
				}
			}
		}
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