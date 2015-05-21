<?php
class THONGKE{
	function get_thong_ke($nam=2015){
		$user = new User;
		$conn = $user->conn(__QUANLY__,__PASSWORD_QUANLY__);
		$admin = __ADMIN__;
		$query = "SELECT malsp,ten FROM $admin.LOAISANPHAM";
		$stid = oci_parse($conn,$query);
		oci_execute($stid);
		$nrows = oci_fetch_all($stid, $res);
		$result = array('MALSP' => array(),'TEN' => array(),'MIN_AGE' => array(),'MAX_AGE' => array(),'AVG_AGE' => array());
		for($i=0;$i<$nrows;$i++){
			$data = $this->get_result_from_P2_II_2($res['MALSP'][$i],$nam);
			array_push($result['MALSP'], $res['MALSP'][$i]);
			array_push($result['TEN'], $res['TEN'][$i]);
			array_push($result['MIN_AGE'], $data['MIN_AGE']);
			array_push($result['MAX_AGE'], $data['MAX_AGE']);
			array_push($result['AVG_AGE'], $data['AVG_AGE']);
		}
		return $result;
	}

	function get_result_from_P2_II_2($malsp,$nam){
		$user = new User;
		$conn = $user->conn(__ADMIN__,__PASSWORD__);
		$admin = __ADMIN__;
		$sql = 'BEGIN P2_II_2(:malsp, :nam, :avg_age, :min_age, :max_age); END;';
		$stmt = oci_parse($conn,$sql);
		// Bind the input parameter
		oci_bind_by_name($stmt,":malsp",$malsp);
		oci_bind_by_name($stmt,":nam",$nam);
		
		// Bind the output parameter
		oci_bind_by_name($stmt,":avg_age",$avg_age,40);
		oci_bind_by_name($stmt,":min_age",$min_age,40);
		oci_bind_by_name($stmt,":max_age",$max_age,40);
		oci_execute($stmt,OCI_DEFAULT);
		$res = array('AVG_AGE' => $avg_age, 'MIN_AGE' => $min_age, 'MAX_AGE' => $max_age);
		return $res;
	}
}