<?php
function count_alumnos($conn){
	// Get the total number of results
	$result = pg_query($conn, "SELECT count(*) FROM alumno_tbl"); 
	return (int)pg_fetch_result($result, 0, 0);

}
function count_comprobantes_alumno($conn,$id){
	// Get the total number of results
	$result = pg_query($conn, "SELECT count(*) FROM comprobante_tbl WHERE id=".$id); 
	return (int)pg_fetch_result($result, 0, 0);

}
function get_alumnos_paging($conn,$page,$count_per_page) {
	$offset = ($page - 1) * $count_per_page;

	$sql = "SELECT * from alumno_tbl ORDER  BY lastname LIMIT  $count_per_page offset $offset";
	
	$result = pg_query($conn,$sql);
	if (!$result) {
	    echo "Ha ocurrido un error.\n";
	    exit;
	}
	$alumnos = pg_fetch_all($result);
	
	return $alumnos;

}

function get_alumnos($conn) {
	$result = pg_query($conn, "SELECT * FROM alumno_tbl");
	if (!$result) {
	    echo "Ha ocurrido un error.\n";
	    exit;
	}
	$alumnos = pg_fetch_all($result);
	
	return $alumnos;

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

function ver_comprobantes_alumno($conn,$id) {
	$result = pg_query($conn, "SELECT * FROM comprobante_tbl WHERE id_alumno=".$id." ORDER BY id DESC");
	if (!$result) {
	    echo "Ha ocurrido un error.\n";
	    exit;
	}
	$comprobantes = pg_fetch_all($result);
	
	return $comprobantes;

}

function del_alumno($conn,$where){
	
	//$where = array("id" => $id);
	$res = pg_delete($conn, 'alumno_tbl', $where);	
	if ($res) {
	  //echo "Deleted successfully.";
	  $is_deleted = true;
	} else {
	  //echo "Error in input..";
	  $is_deleted = false;
	}	
	return $is_deleted ;
}

function update_alumno($conn,$data,$where_condition){
	//$where_condition = array('name'=>'Soeng');
	//$data = array("name" => "Kanel");

	$res = pg_update($conn, 'alumno_tbl', $data, $where_condition);

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

function qdel_alumno($conn){
	$sql = "delete from alumno_tbl where id = 3";

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
function insert_alumno($conn, $alumnos){
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
	foreach ($alumnos as $key => $alumno) {
		//var_dump($alumno);
	    $res = pg_insert($conn, 'alumno_tbl' , $alumno);

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
function buscar_alumno($conn,$data){
	$where_condition = $data['buscar'];
	//$data = array("name" => "Kanel");
	$sql = "SELECT * from alumno_tbl where afiliado = '".intval($where_condition)."' OR LOWER(name) LIKE LOWER('%".$where_condition."%') OR LOWER(lastname) LIKE LOWER('%".$where_condition."%')";

	$result = pg_query($conn, $sql);

	if (!$result) {
	    echo "Ha ocurrido un error.\n".$sql;
	    exit;
	}
	$alumnos = pg_fetch_all($result);
	
	return $alumnos;
}
?>
