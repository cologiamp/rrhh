<?php
function count_configs($conn){
	// Get the total number of results
//	$result = pg_query($conn, "SELECT count(*) FROM config_tbl where type<>'admin'"); 
	$result = pg_query($conn, "SELECT count(*) FROM config_tbl"); 
	return (int)pg_fetch_result($result, 0, 0);

}
function get_configs_paging($conn,$page,$count_per_page) {
	$offset = ($page - 1) * $count_per_page;

	$sql = "SELECT * from config_tbl ORDER  BY id LIMIT  $count_per_page offset $offset";
	
	$result = pg_query($conn,$sql);
	if (!$result) {
	    echo "Ha ocurrido un error 1.\n";
	    exit;
	}
	$configs = pg_fetch_all($result);
	
	return $configs;

}

function get_configs($conn) {
	$result = pg_query($conn, "SELECT * FROM config_tbl");
	if (!$result) {
	    echo "Ha ocurrido un error 2.\n";
	    exit;
	}
	$configs = pg_fetch_all($result);
	
	return $configs;

}

function get_config($conn,$id) {
	$result = pg_query($conn, "SELECT * FROM config_tbl where id=".$id);
	if (!$result) {
	    echo "Ha ocurrido un error 3.\n";
	    exit;
	}
	$config = pg_fetch_array($result);
	
	return $config;

}

function del_config($conn,$where){
	
	//$where = array("id" => $id);
	$res = pg_delete($conn, 'config_tbl', $where);	
	if ($res) {
	  //echo "Deleted successfully.";
	  $is_deleted = true;
	} else {
	  //echo "Error in input..";
	  $is_deleted = false;
	}	
	return $is_deleted ;
}

function update_config($conn,$data,$where_condition){
	//$where_condition = array('name'=>'Soeng');
	//$data = array("name" => "Kanel");

	$res = pg_update($conn, 'config_tbl', $data, $where_condition);
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

function qdel_config($conn){
	$sql = "delete from config_tbl where id = 3";

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
function insert_config($conn, $configs){
	/* 
	Test case
	$config1 = array(
		'name' => "Sok", 
		'age' => "24", 
		'country' => "CAMBODIA" 
		);

	$config2 = array(
		'name' => "VONGSA", 
		'age' => 30, 
		'country' => "Thailand" 
		);

	$config3 = array(
		'name' => "DUC", 
		'age' => 28, 
		'country' => "Vietname"
		);

	$configs = array(
		$config1,
		$config2,
		$config3
		);

	*/
	// Insert one by one
	foreach ($configs as $key => $config) {
	    $res = pg_insert($conn, 'config_tbl' , $config);
	    if ($res) {
	      //echo "Inserted config: ".$config['name']." <br />";
	      $is_inserted = true;
		
	    } else {
	      echo pg_last_error($conn) . " <br />";
	      $is_inserted = false;	
	    }
	}
	return $is_inserted;
}
?>
