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

		$concept = $_POST['concept'];
		$concepto = implode(", ", $_POST['concept']);;

		$_POST['concept'] = $concepto;
//		var_dump($_POST);
		$alumno = get_alumno($conn,$_GET['add']);


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
				$msg = "Comprobante ".$is_inserted[1]." generado.";
				$class_stat = 'class="alert alert-info"';
				 
				$cuerpo = "<html>
				<style type='text/css'>
				body{
					font-family: Calibri;
				}
				table {
				  border-collapse: collapse;
				  width: 100%;
				}
				table td, table th {
				  border: 1px solid black;
				}
				table tr {
					text-align: center;
				}
				table td {
					text-align: center;
				}
				</style>
				<body>
									
				<div style='height: 120px; float: left; width: 50%; margin-left: -25px;'>
				
				<div style='width: 450px;'>
								
				<p style='text-align: center;'><span style='font-family: Arial Black; font-size: 14px; font-weight: bold;'>ASOCIACION DE alumnos ESCUELA MUNICIPAL<br><span style='font-size: 15px;'>OCTAVIO MUEDRA TASQUER</span><br></span> 
				<span style='text-align: center; font-size:12px;'>San Martin 2330 - Tel. (03865) 423560 <br>Concepcion - Tucuman <br> E-mail: esmuni@hotmail.com</span>

				</div>

				</div>

				<div style='height: 120px; float: right; width: 50%;'>
				
				<div style='height: 30px; margin-left: 180px;'>
				<p style='font-size: 11px;'>ID/Nro de comprobante: ".$is_inserted[1]."</p>
				</div>

				<table style='font-size: 25px; margin-left: 450px; width: 225px;'>
				<thead>
				<tr style='width: 75px;'>
				<th>Dia</th>
				<th>Mes</th>
				<th>Anio</th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td style='text-align: center; height: 70px;'>".date('d')."</td>
				<td style='text-align: center;'>".date('m')."</td>  
				<td style='text-align: center;'>".date('y')."</td>                      
				</tr>
				</tbody>
				</table>

				</div>

				<div>

				<div style='width: 100%;'>

				<p style='text-align: center; font-family: Arial Black'><span style='font-size: 28px; font-weight: bold;'><br><br><br>BONO CONTRIBUCION</span><br><span style='font-size: 16px; font-weight: bold;'>PARA MANTENIMIENTO ESCOLAR</span></p>

				<br>
				<br>

				<p style='font-family: Calibri; font-weight: bold;'>Numero de legajo: <span style='font-weight: lighter;'>".$data[0]['legajo']." </span>....................................... 
				<br>Alumno: <span style='font-weight: lighter;'>".$alumno['name']." ".$alumno['lastname']."</span>.............................................................</p>
				</div>

				<table>
				<thead>
				<tr>
				<th>Orden</th>
				<th>Periodo</th>
				<th>Concepto</th>
				<th>Importe</th>
				</tr>
				</thead>
				<tbody>
				<tr>
				<td>1</td>
				<td>".$data[0]['concept']."</td>  
				<td>Cuota</td>
				<td>$ ".$data[0]['unit_amount']."</td>                      
				</tr>
				<tr>
				<td style='height: 19px;'></td>
				<td></td>  
				<td></td>
				<td></td>                      
				</tr>
				<tr>
				<td style='height: 19px;'></td>
				<td></td>  
				<td></td>
				<td></td>                      
				</tr>
				<tr>
				<td style='height: 19px;'></td>
				<td></td>  
				<td></td>
				<td></td>                      
				</tr>
				<tr>
				<td> </td>
				<td> </td>
				<td style='font-weight: bold;'>TOTAL $</td>
				<td>".$data[0]['total_amount']."</td>                      
				</tr>
				</tbody>
				</table>
				</div>

				</body>
				</html>";

				 
				include("mpdf/mpdf.php");
				$mpdf=new mPDF();
				$mpdf->WriteHTML($cuerpo);
				$mpdf->SetJS('this.print();');
				$mpdf->Output();
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
