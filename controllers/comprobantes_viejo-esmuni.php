elseif(isset($_GET['add']) && is_numeric($_GET['add'])){

	//if form is submitted.
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$_POST['id_alumno'] = $_GET['add'];

		$concept = $_POST['concept'];
		

		//calculando que mes se paga
		$cuotas = Array();
		
		for($i=0;$i<count($concept);$i++){
			if($concept[$i]=="Marzo"){
				array_push($cuotas,"01");
			}else if($concept[$i]=="Abril"){
				array_push($cuotas,"02");
			}else if($concept[$i]=="Mayo"){
				array_push($cuotas,"03");
			}else if($concept[$i]=="Junio"){
				array_push($cuotas,"04");
			}else if($concept[$i]=="Julio"){
				array_push($cuotas,"05");
			}else if($concept[$i]=="Agosto"){
				array_push($cuotas,"06");
			}else if($concept[$i]=="Septiembre"){
				array_push($cuotas,"07");
			}else if($concept[$i]=="Octubre"){
				array_push($cuotas,"08");
			}else if($concept[$i]=="Noviembre"){
				array_push($cuotas,"09");
			}else if($concept[$i]=="Diciembre"){
				array_push($cuotas,"10");
			}
		}
		$cuotas = implode(", ", $cuotas);
		
		$concepto = implode(", ", $_POST['concept']);;

		$_POST['concept'] = $concepto;
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
				$fecha = date('Y-m-d');
				$fechahoy = date("d-m-Y", strtotime($fecha));
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
					height: 45px;
					text-align: center;
				}
				</style>
				<body>
									

				<table>
				<tr>
					<td>
						<p style='font-weight: bold;'>ESCUELA MUNICIPAL <br><span style='font-size: 17px;'>OCTAVIO MUEDRA TASQUER</span></p>
						<p>CAJA DE AHORRO CTA. N° ".$config['cuenta']."</p>
					</td>
				</tr>
				<tr>
					<td>
					<p style='font-weight: bold;'>Comprobante de pago n° ".$is_inserted[1]."</p>
					</td>
				</tr>
				<tr>
					<td>
					<p>
					<span style='font-weight: bold;'>DNI: </span>".$data[0]['legajo']."
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span style=''font-weight: bold;>Nombre: </span>".$alumno['name']." ".$alumno['lastname']."
					<p>
					</td>
				</tr>
				<tr>
					<td>
					<p>
					<br>
					<span style='font-weight: bold;'>Concepto: </span>Cuota 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</p>
					<br>
					<p><span style='font-weight: bold;'>Periodo: </span>".date('Y')." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight: bold;'>Cuota n°: </span>".$cuotas." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight: bold;'>IMPORTE: </span>$".$data[0]['total_amount']."
					<br>
					&nbsp;
					</p>
					</td>
				</tr>
				<tr>
					<td>
					<p>
					<span style='font-weight: bold;'>Fecha de emision: </span>".$fechahoy."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span style='border: 2px solid; font-weight: bold;'>&nbsp;&nbsp;&nbsp;&nbsp; ALUMNO &nbsp;&nbsp;&nbsp;&nbsp;</span>
					</p>
					</td>
				</tr>                     
				</table>

				<br>
				<hr style='border-top: dotted 1px;' />
				<br>
				<br>

				<table>
				<tr>
					<td>
						<p style='font-weight: bold;'>ESCUELA MUNICIPAL <br><span style='font-size: 17px;'>OCTAVIO MUEDRA TASQUER</span></p>
						<p>CAJA DE AHORRO CTA. N° ".$config['cuenta']."</p>
					</td>
				</tr>
				<tr>
					<td>
					<p style='font-weight: bold;'>Comprobante de pago n° ".$is_inserted[1]."</p>
					</td>
				</tr>
				<tr>
					<td>
					<p>
					<span style='font-weight: bold;'>DNI: </span>".$data[0]['legajo']."
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span style=''font-weight: bold;>Nombre: </span>".$alumno['name']." ".$alumno['lastname']."
					<p>
					</td>
				</tr>
				<tr>
					<td>
					<p>
					<br>
					<span style='font-weight: bold;'>Concepto: </span>Cuota 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</p>
					<br>
					<p><span style='font-weight: bold;'>Periodo: </span>".date('Y')." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight: bold;'>Cuota n°: </span>".$cuotas." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight: bold;'>IMPORTE: </span>$".$data[0]['total_amount']."
					<br>
					&nbsp;
					</p>
					</td>
				</tr>
				<tr>
					<td>
					<p>
					<span style='font-weight: bold;'>Fecha de emision: </span>".$fechahoy."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span style='border: 2px solid; font-weight: bold;'>&nbsp;&nbsp;&nbsp;&nbsp; ESCUELA &nbsp;&nbsp;&nbsp;&nbsp;</span>
					</p>
					</td>
				</tr>                     
				</table>
				
				<br>
				<hr style='border-top: dotted 1px;' />
				<br>
				<br>
				
				<table>
				<tr>
					<td>
						<p style='font-weight: bold;'>ESCUELA MUNICIPAL <br><span style='font-size: 17px;'>OCTAVIO MUEDRA TASQUER</span></p>
						<p>CAJA DE AHORRO CTA. N° ".$config['cuenta']."</p>
					</td>
				</tr>
				<tr>
					<td>
					<p style='font-weight: bold;'>Comprobante de pago n° ".$is_inserted[1]."</p>
					</td>
				</tr>
				<tr>
					<td>
					<p>
					<span style='font-weight: bold;'>DNI: </span>".$data[0]['legajo']."
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span style=''font-weight: bold;>Nombre: </span>".$alumno['name']." ".$alumno['lastname']."
					<p>
					</td>
				</tr>
				<tr>
					<td>
					<p>
					<br>
					<span style='font-weight: bold;'>Concepto: </span>Cuota 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</p>
					<br>
					<p><span style='font-weight: bold;'>Periodo: </span>".date('Y')." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight: bold;'>Cuota n°: </span>".$cuotas." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight: bold;'>IMPORTE: </span>$".$data[0]['total_amount']."
					<br>
					&nbsp;
					</p>
					</td>
				</tr>
				<tr>
					<td>
					<p>
					<span style='font-weight: bold;'>Fecha de emision: </span>".$fechahoy."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span style='border: 2px solid; font-weight: bold;'>&nbsp;&nbsp;&nbsp;&nbsp; CAJA &nbsp;&nbsp;&nbsp;&nbsp;</span>
					</p>
					</td>
				</tr>                     
				</table>

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