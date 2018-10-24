<?php
locked();
include_once('models/configs.php');

//show configs list
if ( !isset($_GET['edit']) && !isset($_GET['del'])&& !isset($_GET['add']) ){
	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$where_condition = array("id" => $_GET['edit']);		
    		$msg = "";
		$class_stat = 'class="alert alert-info"';
		if(trim($_POST['password']) != trim($_POST['confirm_password'])){
			$msg = "Su contraseña no coincide.";
			$class_stat = 'class="alert alert-warning"';
		}else{
			$_POST['password'] = md5($_POST['password']);
			unset($_POST['confirm_password']);
			$data = $_POST;		
			$is_updated = update_config($conn,$data,$where_condition);
			if($is_updated){
				$msg = "Usuario actualizado.";
				$class_stat = 'class="alert alert-info"';
			}else{
				$msg = "Error al actualizar.";
				$class_stat = 'class="alert alert-warning"';
			}
		}
		
	}
	// get config record informaation.
	$config = get_config($conn,1);
//	var_dump($config);
	include('views/edit_config.php');
	
} 
//deleted action

//edit action
elseif (isset($_GET['edit']) && is_numeric($_GET['edit'])){
	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$where_condition = array("id" => $_GET['edit']);		
    		$msg = "";
		$class_stat = 'class="alert alert-info"';
			
		$data = $_POST;		
		$is_updated = update_config($conn,$data,$where_condition);
		if($is_updated){
			$msg = "Configuracion actualizada.";
			$class_stat = 'class="alert alert-info"';
		}else{
			$msg = "Error al actualizar.";
			$class_stat = 'class="alert alert-warning"';
		}
		
	}
	// get config record informaation.
	$config = get_config($conn,$_GET['edit']);
	include('views/edit_config.php');
	
}
elseif(isset($_GET['add'])){
	header("Location: index.php?controller=configs");
	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
    		$msg = "";
		$class_stat = 'class="alert alert-info"';
		if(trim($_POST['password']) != trim($_POST['confirm_password'])){
			$msg = "Su contraseña no coincide.";
			$class_stat = 'class="alert alert-warning"';
		}else{
			$_POST['password'] = md5($_POST['password']);
			unset($_POST['confirm_password']);
			$data[] = $_POST;
			//print_r($data);exit;		
			$is_inserted = insert_config($conn,$data);
			if($is_inserted){
				$msg = "Usuario creado.";
				$class_stat = 'class="alert alert-info"';
			}else{
				$msg = "Error al crear usuario.";
				$class_stat = 'class="alert alert-warning"';
			}
		}
		
	        //redirect to config list
		//header("Location: index.php?controller=configs"); 
		//exit();
		
	}

	include('views/add_config.php');

}

?>
