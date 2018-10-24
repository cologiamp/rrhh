<?php
function get_config($conn,$id) {
	$result = pg_query($conn, "SELECT * FROM config_tbl where id=1");
	if (!$result) {
	    echo "Ha ocurrido un error 3.\n";
	    exit;
	}
	$config = pg_fetch_array($result);
	
	return $config;

}
function get_alumno($conn,$id) {
	$result = pg_query($conn, "SELECT * FROM alumno_tbl where id=".$id);
	if (!$result) {
	    echo "Ha ocurrido un error.\n";
	    exit;
	}
	$alumno = pg_fetch_array($result);
	
	return $alumno;

}
function count_comprobantes($conn){
	// Get the total number of results
	$result = pg_query($conn, "SELECT count(*) FROM comprobante_tbl"); 
	return (int)pg_fetch_result($result, 0, 0);

}
function get_comprobantes_paging($conn,$page,$count_per_page) {
	$offset = ($page - 1) * $count_per_page;

	$sql = "SELECT * from comprobante_tbl ORDER BY id DESC LIMIT $count_per_page offset $offset";
	
	$result = pg_query($conn,$sql);
	if (!$result) {
	    echo "Ha ocurrido un error.\n";
	    exit;
	}
	$comprobantes = pg_fetch_all($result);
	
	return $comprobantes;

}

function get_comprobantes($conn) {
	$result = pg_query($conn, "SELECT * FROM comprobante_tbl ORDER BY id DESC");
	if (!$result) {
	    echo "Ha ocurrido un error.\n";
	    exit;
	}
	$comprobantes = pg_fetch_all($result);
	
	return $comprobantes;

}

function get_comprobante($conn,$id) {
	$result = pg_query($conn, "SELECT * FROM comprobante_tbl where id=".$id);
	if (!$result) {
	    echo "Ha ocurrido un error.\n";
	    exit;
	}
	$comprobante = pg_fetch_array($result);
	
	return $comprobante;

}

function del_comprobante($conn,$where){
	
	//$where = array("id" => $id);
	$res = pg_delete($conn, 'comprobante_tbl', $where);	
	if ($res) {
	  //echo "Deleted successfully.";
	  $is_deleted = true;
	} else {
	  //echo "Error in input..";
	  $is_deleted = false;
	}	
	return $is_deleted ;
}

function update_comprobante($conn,$data,$where_condition){
	//$where_condition = array('name'=>'Soeng');
	//$data = array("name" => "Kanel");

	$res = pg_update($conn, 'comprobante_tbl', $data, $where_condition);
	if ($res) {
	  	//echo "Data is updated: $res";
		$is_updated = true;
	} else {
		 //echo "error in input.. <br />";
		 //echo pg_last_error($conn);
		$is_updated = false;
	}
	return $is_updated;
}

function qdel_comprobante($conn){
	$sql = "delete from comprobante_tbl where id = 3";

	 $result = pg_query($conn, $sql);
	if(!$result){
	  //echo pg_last_error($conn);
	  $is_deleted = true;
	} else {
	  //echo "Deleted successfully\n";
	  $is_deleted = false;
	}
	return is_deleted;
}
function insert_comprobante2($conn, $comprobantes){
	/* 
	Test case
	$user1 = array(
		'name' => "Sok", 
		'age' => "24", 
		'country' => "CAMBODIA" 
		);

	$user2 = array(
		'name' => "VONGSA", 
		'age' => 30, 
		'country' => "Thailand" 
		);

	$user3 = array(
		'name' => "DUC", 
		'age' => 28, 
		'country' => "Vietname"
		);

	$users = array(
		$user1,
		$user2,
		$user3
		);

	*/
	// Insert one by one
	foreach ($comprobantes as $key => $comprobante) {
	    $res = pg_insert($conn, 'comprobante_tbl' , $comprobante);
	    if ($res) {
	      //echo "Inserted user: ".$user['name']." <br />";
	      $is_inserted = true;
		
	    } else {
	      echo pg_last_error($conn) . " <br />";
	      $is_inserted = false;	
	    }
	}
	return $is_inserted;


}

function insert_comprobante3($conn, $comprobantes){
	/* 
	Test case
	$user1 = array(
		'name' => "Sok", 
		'age' => "24", 
		'country' => "CAMBODIA" 
		);

	$user2 = array(
		'name' => "VONGSA", 
		'age' => 30, 
		'country' => "Thailand" 
		);

	$user3 = array(
		'name' => "DUC", 
		'age' => 28, 
		'country' => "Vietname"
		);

	$users = array(
		$user1,
		$user2,
		$user3
		);

	*/
	// Insert one by one
	foreach ($comprobantes as $key => $comprobante) {

		$sql = "INSERT INTO comprobante_tbl (legajo, concept, kids, unit_amount, total_amount, id_alumno) VALUES ('".$comprobante['legajo']."', '".$comprobante['concept']."', '".$comprobante['kids']."', '".$comprobante['unit_amount']."', '".$comprobante['total_amount']."', '".$comprobante['id_alumno']."') RETURNING id";
		//execute query
		$result = pg_query($conn, $sql);
	    $row = pg_fetch_row($result);

	    //$error = pg_last_error($conn);

	    return $row;
	}

	    /*
	    //$res = pg_insert($conn, 'comprobante_tbl' , $comprobante);
	    if ($result) {
	      //echo "Inserted user: ".$user['name']." <br />";
	      $is_inserted = true;
		
	    } else {
	      echo pg_last_error($conn) . " <br />";
	      $is_inserted = false;	
	    }
	}
	
	return $is_inserted;
*/

}
function insert_comprobante($conn, $comprobantes){
	/* 
	Test case
	$user1 = array(
		'name' => "Sok", 
		'age' => "24", 
		'country' => "CAMBODIA" 
		);

	$user2 = array(
		'name' => "VONGSA", 
		'age' => 30, 
		'country' => "Thailand" 
		);

	$user3 = array(
		'name' => "DUC", 
		'age' => 28, 
		'country' => "Vietname"
		);

	$users = array(
		$user1,
		$user2,
		$user3
		);

	*/
	// Insert one by one
	foreach ($comprobantes as $key => $comprobante) {


	    //$res = pg_insert($conn, 'comprobante_tbl' , $comprobante);
	    $sql = "INSERT INTO comprobante_tbl (legajo, concept, unit_amount, total_amount, id_alumno, dateadded, novedad) VALUES ('0', 'M', 1, 1, '".$comprobante['id_alumno']."', '".date('Y-m-d')."', '".$comprobante['novedad']."') RETURNING id";
		//execute query
		$result = pg_query($conn, $sql);
	    $row = pg_fetch_row($result);

	    if ($result) {
	      //echo "Inserted user: ".$user['name']." <br />";
	      $is_inserted = array(true, $row[0]);
		
	    } else {
	      echo pg_last_error($conn) . " <br />";
	      $is_inserted = array(false, $row[0]);
	    }
	}
	return $is_inserted;


}
function buscar_comprobante($conn,$data){
	$where_condition = $data['buscar'];
	//$data = array("name" => "Kanel");
	$sql = "SELECT * from comprobante_tbl where id = ".$where_condition;

	$result = pg_query($conn, $sql);

	if (!$result) {
	    //echo "Ha ocurrido un error.\n";
	    //exit;
	    $comprobantes = array();
	}else{
		$comprobantes = pg_fetch_all($result);
	}
	
	return $comprobantes;
}

?>
