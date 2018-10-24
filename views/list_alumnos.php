<?php 
include_once('head.php');
include_once('navbar.php');
?>
<div class="container">
		<div class="row">

    		<h2>Afiliados </h2>
        <hr>
  			<div class="tab-pane active" id="list">
  				
          <br/>
          <!--
          <form role="form" class="form-inline" action="index.php" method="GET">
            <div class="input-group">
            <input type="hidden" name="controller" value="alumnos">
              <input name="buscar" id="buscar" type="text" class="form-control" placeholder="Buscar alumno">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
            <a class="btn btn-default form-control" href="index.php?controller=alumnos&add">+ Agregar alumno</a>
          </form>
          
          -->
          <form class="form-inline" action="index.php">
          <input type="hidden" name="controller" value="alumnos">
          <input name="buscar" id="buscar" type="text" class="form-control" placeholder="Buscar afiliado">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>         
          <a class="btn btn-default form-control" href="index.php?controller=alumnos&add">+ Agregar afiliado</a>
        </form>

  				<br/>
  				<div class="table-responsive">
  					<table class="table table-hover">
    						<thead>
    							<tr>
    								<th>ID</th>
    								<th>Nombre</th>
    								<th>Apellido</th>
    								<th>DNI</th>
                    <th>N° Afiliado</th>
                    <th>Fecha de Alta</th>
                    <th>Actividad/Novedades</th>
    								<th>Opcion</th>
    							</tr>
    						</thead>
    						<tbody>
						<?php foreach($alumnos as $alumno) { ?>
    							<tr>
    								<td><?php echo $alumno['id']; ?></td>
    								<td><?php echo $alumno['name']; ?></td>
    								<td><?php echo $alumno['lastname']; ?></td>
    								<td><?php echo $alumno['dni']; ?></td>
                    <td><?php echo $alumno['afiliado']; ?></td>
                    <td><?php echo $alumno['dateadded']; ?></td>
                    <td>
                      <a class="btn btn-default" href="index.php?controller=alumnos&ver=<?php echo $alumno['id']; ?> ">Ver</a>
                      <a class="btn btn-default" href="index.php?controller=comprobantes&add=<?php echo $alumno['id']; ?> ">Generar novedad</a>  
                    </td>
    								<td>
   <a href="index.php?controller=alumnos&edit=<?php echo $alumno['id']; ?> "><span class="glyphicon glyphicon-edit"></span> editar</a>
   <a href="index.php?controller=alumnos&del=<?php echo $alumno['id']; ?> " onclick="return confirm('Esta seguro?')"><span
 class="glyphicon glyphicon-trash"></span>borrar</a>
    								</td>
    							</tr>
    						
<?php } ?>
    						</tbody>
  					</table>
				</div>
				<ul class="pagination">
  				<?php for ($i=1; $i<=$numberOfPages; $i++) { ?>  
				<?php $class_active = ($page==$i)?"class='active'":$class_active="";?>
		             	<li <?php echo $class_active; ?>><a href="index.php?controller=alumnos&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
				<?php }; ?>
				</ul>
  			
  </div>
  			
</div>
    

<?php 
include_once('footer.php');
?>
