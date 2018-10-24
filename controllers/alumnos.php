<?php
locked();
include_once('models/alumnos.php');

//show users list
if ( !isset($_GET['edit']) && !isset($_GET['del'])&& !isset($_GET['add']) && !isset($_GET['ver']) && !isset($_GET['buscar']) ){
	$countPerPage = 10;
	$totalResultCount  = count_alumnos($conn);

	// The ceil function will round floats up.
	$numberOfPages = ceil($totalResultCount / $countPerPage);

	// Check if we have a page number in the _GET parameters
	if(!empty($_GET) && isset($_GET['page'])){
	    $page = (int)$_GET['page'];
	}else{
	    $page = 1;
	}

	// Check that the page is within our bounds
	if($page < 0){
	    $page = 1;
	}elseif($page > $numberOfPages){
	    $page = $numberOfPages;
	}

	$alumnos = get_alumnos_paging($conn,$page,$countPerPage);
	include('views/list_alumnos.php');
} 
//deleted action
elseif (isset($_GET['del'])){
	$where = array("id" => $_GET['del']);
	del_alumno($conn,$where);	
	header("Location: index.php?controller=alumnos"); 
	exit();
}

//edit action
elseif (isset($_GET['edit']) && is_numeric($_GET['edit'])){
	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$where_condition = array("id" => $_GET['edit']);		
    		$msg = "";
		$class_stat = 'class="alert alert-info"';

		$data = $_POST;		
		$is_updated = update_alumno($conn,$data,$where_condition);
		if($is_updated){
			$msg = "Afiliado actualizado.";
			$class_stat = 'class="alert alert-info"';
		}else{
			$msg = "Error al actualizar.";
			$class_stat = 'class="alert alert-warning"';
		}
		
	}
	// get user record informaation.
	$alumno = get_alumno($conn,$_GET['edit']);
	include('views/edit_alumno.php');
	
}
elseif(isset($_GET['add'])){
	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
    		$msg = "";
		$class_stat = 'class="alert alert-info"';
			//$_POST['password'] = md5($_POST['password']);
			//unset($_POST['confirm_password']);
			$data[] = $_POST;
			//print_r($data);exit;		
			$is_inserted = insert_alumno($conn,$data);
			//echo $is_inserted;
			//exit;
			if($is_inserted){
				$msg = "Afiliado ingresado.";
				$class_stat = 'class="alert alert-info"';
			}else{
				$msg = "Error en ingreso.";
				$class_stat = 'class="alert alert-warning"';
			}
				
	        //redirect to user list
		//header("Location: index.php?controller=users"); 
		//exit();
		
	}

	include('views/add_alumno.php');

}
elseif (isset($_GET['ver']) && is_numeric($_GET['ver'])){
	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$where_condition = array("id" => $_GET['edit']);		
    		$msg = "";
		$class_stat = 'class="alert alert-info"';
		if(trim($_POST['password']) != trim($_POST['confirm_password'])){
			$msg = "Your password does not match your confirmed password.";
			$class_stat = 'class="alert alert-warning"';
		}else{
			$_POST['password'] = md5($_POST['password']);
			unset($_POST['confirm_password']);
			$data = $_POST;		
			$is_updated = update_alumno($conn,$data,$where_condition);
			if($is_updated){
				$msg = "Data is updated.";
				$class_stat = 'class="alert alert-info"';
			}else{
				$msg = "Error input.";
				$class_stat = 'class="alert alert-warning"';
			}
		}
		
	}
	$countPerPage = 10;
	$totalResultCount  = count_comprobantes_alumno($conn, $_GET['ver']);

	// The ceil function will round floats up.
	$numberOfPages = ceil($totalResultCount / $countPerPage);

	// Check if we have a page number in the _GET parameters
	if(!empty($_GET) && isset($_GET['page'])){
	    $page = (int)$_GET['page'];
	}else{
	    $page = 1;
	}

	// Check that the page is within our bounds
	if($page < 0){
	    $page = 1;
	}elseif($page > $numberOfPages){
	    $page = $numberOfPages;
	}
	// get user record informaation.
	$comprobantes = ver_comprobantes_alumno($conn,$_GET['ver']);
	$alumno = get_alumno($conn,$_GET['ver']);
	include('views/ver_alumno.php');
	
}
elseif (isset($_GET['buscar'])){
	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
    	$msg = "";
		$data = $_GET;		
		$alumnos = buscar_alumno($conn,$data);
		
		if($alumnos){
			$msg = "Data is updated.";
			$class_stat = 'class="alert alert-info"';
		}else{
			$msg = "Error input.";
			$class_stat = 'class="alert alert-warning"';
		}
		
		
	}
	$countPerPage = 10;
	$totalResultCount  = count($alumnos);

	// The ceil function will round floats up.
	$numberOfPages = ceil($totalResultCount / $countPerPage);

	// Check if we have a page number in the _GET parameters
	if(!empty($_GET) && isset($_GET['page'])){
	    $page = (int)$_GET['page'];
	}else{
	    $page = 1;
	}

	// Check that the page is within our bounds
	if($page < 0){
	    $page = 1;
	}elseif($page > $numberOfPages){
	    $page = $numberOfPages;
	}
	// get user record informaation.
	$alumnosEncontrados = $alumnos;
	include('views/list_alumnos.php');
	
}

?>
