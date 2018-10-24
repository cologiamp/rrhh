<?php
locked();
include_once('models/comprobantes.php');

//show users list
if ( !isset($_GET['edit']) && !isset($_GET['del']) && !isset($_GET['add']) && !isset($_GET['pay']) && !isset($_GET['pend']) && !isset($_GET['buscar']) ){
	$countPerPage = 10;
	$totalResultCount  = count_comprobantes($conn);

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


	$comprobantes = get_comprobantes_paging($conn,$page,$countPerPage);

	for($i=0;$i<count($comprobantes);$i++){
		$comprobantes[$i]['alumno'] = get_alumno($conn,$comprobantes[$i]['id_alumno']);
	}
	

	//var_dump($comprobantes);

	include('views/list_comprobantes.php');
} 
//pay action
elseif (isset($_GET['pay']) && is_numeric($_GET['pay'])){
	$where_condition = array("id" => $_GET['pay']);
	$data['estado'] = 1;
	$data['datepayed'] = date('Y-m-d');
	$is_updated = update_comprobante($conn,$data,$where_condition);
	if($is_updated){
		$msg = "Comprobante actualizado.";
		$class_stat = 'class="alert alert-info"';
	}else{
		$msg = "Error al actualizar.";
		$class_stat = 'class="alert alert-warning"';
	}
	//estado_comprobante($conn,$where);	
	//header("Location: index.php?controller=comprobantes"); 
	//header("Refresh:0");
	//include('views/list_comprobantes.php');
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
//pendiente action
elseif (isset($_GET['pend']) && is_numeric($_GET['pend'])){
	$where_condition = array("id" => $_GET['pend']);
	$data['estado'] = 0;
	$data['datepayed'] = NULL;
	$is_updated = update_comprobante($conn,$data,$where_condition);
	if($is_updated){
		$msg = "Comprobante actualizado.";
		$class_stat = 'class="alert alert-info"';
	}else{
		$msg = "Error al actualizar.";
		$class_stat = 'class="alert alert-warning"';
	}
	//estado_comprobante($conn,$where);	
	//header("Location: index.php?controller=comprobantes"); 
	//exit();
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
//deleted action
elseif (isset($_GET['del'])){
	$where = array("id" => $_GET['del']);
	del_comprobante($conn,$where);	
	header("Location: index.php?controller=comprobantes"); 
	exit();
}

//edit action
elseif (isset($_GET['edit']) && is_numeric($_GET['edit'])){
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
			$is_updated = update_comprobante($conn,$data,$where_condition);
			if($is_updated){
				$msg = "Comprobante actualizado.";
				$class_stat = 'class="alert alert-info"';
			}else{
				$msg = "Error al actualizar.";
				$class_stat = 'class="alert alert-warning"';
			}
		}
		
	}
	// get user record informaation.
	$comprobante = get_comprobante($conn,$_GET['edit']);
	include('views/edit_comprobante.php');
	
}
elseif(isset($_GET['add']) && is_numeric($_GET['add'])){

	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$_POST['id_alumno'] = $_GET['add'];

//		var_dump($_POST);
		$alumno = get_alumno($conn,$_GET['add']);
		$config = get_config($conn,1);
		//var_dump($config);
		//exit;

    	$msg = "";
		$class_stat = 'class="alert alert-info"';

			//$_POST['password'] = md5($_POST['password']);
			//unset($_POST['confirm_password']);
			$data[] = $_POST;
			//print_r($data);
			//exit;		
			$is_inserted = insert_comprobante($conn,$data);

			//var_dump($alumno);
			//exit;
			//echo $is_inserted[0];
			
			if($is_inserted[0]){

				$msg = "Novedad N°: ".$is_inserted[1]." generada.";
				$class_stat = 'class="alert alert-info"';
				 
				//$mpdf->Output();
				//$mpdf->Output('r.pdf', 'D');
				//$mpdf->Output(t($c->getCollectionHandle().".pdf"), "I");
				//$mpdf->Output('filename.pdf', \Mpdf\Output\Destination::FILE);

			}else{
				$msg = "Error en ingreso de comprobante ".$is_inserted[1].".";
				$class_stat = 'class="alert alert-warning"';
			}
			
		
		
	        //redirect to user list
		
		//header("Location: index.php?controller=comprobantes&view="); 
		//exit();
		
	}
	$config = get_config($conn,1);
	$alumno = get_alumno($conn,$_GET['add']);
	include('views/add_comprobante.php');

}
elseif (isset($_GET['buscar'])){
	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
    	$msg = "";
		$data = $_GET;		
		$comprobantes = buscar_comprobante($conn,$data);
		
		if($comprobantes){
			$msg = "Data is updated.";
			$class_stat = 'class="alert alert-info"';
		}else{
			$msg = "Error input.";
			$class_stat = 'class="alert alert-warning"';
		}
		
		
	}
	$countPerPage = 10;
	$totalResultCount  = count($comprobantes);

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
	if(!empty($comprobantes)){
	$comprobantesEncontrados = $comprobantes;
	$comprobantes[0]['alumno'] = get_alumno($conn,$comprobantes[0]['id_alumno']);
	}

	include('views/list_comprobantes.php');
	
}

?>
