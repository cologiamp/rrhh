<?php 
include_once('head.php');
include_once('navbar.php');
?>
<div class="container">

  <div class="row">

          <h2>Datos de <?php echo $alumno['name']." ".$alumno['lastname']; ?></h2>
          <hr>
          <div class="tab-pane active" id="list">
            <br/>
            <a style="width: auto; float: right;" class="btn btn-primary form-control" href="index.php?controller=alumnos&amp;edit=<?php echo $alumno['id']; ?>">Editar afiliado</a>
            <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th style="width: 15%;">ID</th>
                      <td><?php echo $alumno['id']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 15%;">Nombre</th>
                      <td><?php echo $alumno['name']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 15%;">Apellido</th>
                      <td><?php echo $alumno['lastname']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 15%;">DNI</th>
                      <td><?php echo $alumno['dni']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">N° Afiliado</th>
                      <td><?php echo $alumno['afiliado']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">Fecha de Alta</th>
                      <td><?php echo $alumno['dateadded']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">Número de Teléfono</th>
                      <td><?php echo $alumno['telefono']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">Número de Celular</th>
                      <td><?php echo $alumno['celular']; ?></td>
                    </tr> 
                    <tr>
                      <th style="width: 20%;">Estado Civil</th>
                      <td><?php echo $alumno['estadocivil']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">Grupo Familiar</th>
                      <td><?php echo $alumno['grupofliar']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">Estudios</th>
                      <td><?php echo $alumno['estudios']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">Área a la que pertenece</th>
                      <td><?php echo $alumno['area']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">Función</th>
                      <td><?php echo $alumno['funcion']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">Categoría</th>
                      <td><?php echo $alumno['categoria']; ?></td>
                    </tr>
                    <tr>
                      <th style="width: 20%;">Agrupamiento</th>
                      <td><?php echo $alumno['agrupamiento']; ?></td>
                    </tr>              
                  </thead>
                  <!--
                  <tbody>
                    <tr>
                      <td><?php echo $alumno['id']; ?></td>
                      <td><?php echo $alumno['name']; ?></td>
                      <td><?php echo $alumno['lastname']; ?></td>
                      <td><?php echo $alumno['dni']; ?></td>
                      <td><?php echo $alumno['afiliado']; ?></td>
                      <td><?php echo $alumno['dateadded']; ?></td>
                     </tr>
                  </tbody>
                  -->
              </table>
          </div>
          
    </div>
          
  </div>

		<div class="row">

    		<h2>Novedades de <?php echo $alumno['name']." ".$alumno['lastname']; ?></h2>
        <hr>
  			<div class="tab-pane active" id="list">
  				<br/>
  				<div class="table-responsive">
  					<table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Novedad</th>
                    <th style="width: 10%;">Fecha creacion</th>
                    <?php if($_SESSION['type']=='admin'){ ?>
                    <th>Opcion</th>
                    <?php } ?>
                  </tr>
                </thead>
    						<tbody>
						<?php 
            if($comprobantes){
            foreach($comprobantes as $comprobante) { 
            ?>
                  <tr>
                    <td><?php echo $comprobante['id']; ?></td>
                    <td title="<?php echo $comprobante['novedad']; ?>">
                    <?php echo $comprobante['novedad'];
                    //echo strlen($comprobante['novedad']);
                    //echo substr($comprobante['novedad'], 0, 10);
                    ?>
                    </td>

                    <td><?php if(!isset($comprobante['dateadded'])){
                                echo "Fecha";
                                }else{ 
                                $fecha = date("d-m-Y", strtotime($comprobante['dateadded'])); 
                                echo $fecha; 
                                } ?>                    
                    </td>
                    <?php if($_SESSION['type']=='admin'){ ?>
                    <td> 
                    <a href="index.php?controller=comprobantes&del=<?php echo $comprobante['id']; ?> " onclick="return confirm('Esta seguro?')"><span
                   class="glyphicon glyphicon-trash"></span>borrar</a>
                    </td>
                    <?php } ?>
                  </tr>
    						
<?php } }else{ ?>
      <div class="alert alert-info role="alert">No hay novedades/actividades<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
  <?php } ?>
    						</tbody>
  					</table>
				</div>
				<ul class="pagination">
  				<?php for ($i=1; $i<=$numberOfPages; $i++) { ?>  
				<?php $class_active = ($page==$i)?"class='active'":$class_active="";?>
		             	<li <?php echo $class_active; ?>><a href="index.php?controller=comprobantes&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php }; ?>
				</ul>
  			
  </div>
  			
</div>
    
</div>
<?php 
include_once('footer.php');
?>
