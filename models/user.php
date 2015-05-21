<?php
require_once('../config.php');
class User{
	function conn_admin($username=__ADMIN__,$password=__PASSWORD__,$sid="localhost/orcl"){
		//Connect database
		$conn = oci_connect("$username", "$password", "$sid");
		if (!$conn) {
		    $e = oci_error();
		    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}

		return $conn;
	}

	

	function conn($username,$password,$sid="localhost/orcl"){
		//Connect database
		$conn = oci_connect("$username", "$password", "$sid");
		if (!$conn) {
		    $e = oci_error();
		    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}

		return $conn;	
	}

	function get_user_ass3($where=array()){
		$conn = $this->conn_admin();
		if(sizeof($where) > 0){
			foreach($where as $field => $value)
				$stid = oci_parse($conn, "SELECT * FROM USER_ASS3 WHERE $field = '$value'");
		}else{
			$stid = oci_parse($conn, "SELECT * FROM USER_ASS3");
		}
		
		oci_execute($stid);
		$nrows = oci_fetch_all($stid, $res);
		return $res;
	}
}