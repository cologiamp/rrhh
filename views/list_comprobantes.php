<?php 
include_once('head.php');
include_once('navbar.php');
?>
<div class="container">
		<div class="row">

    		<h2>Novedades </h2>
        <hr>
  			<div class="tab-pane active" id="list">
  				<br/>
                    
        <form class="form-inline" action="index.php">
          <input type="hidden" name="controller" value="comprobantes">
          <input style="width: 220px;" name="buscar" id="buscar" type="number" class="form-control" placeholder="Buscar novedades por id">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>         
        </form>
        <br/>

  				<div class="table-responsive">
  					<table class="table table-hover">
    						<thead>
    							<tr>
    								<th>ID</th>
                    <th style="width: 15%;">Afiliado</th>
                    <th>Novedad</th>
                    <th style="width: 10%;">Fecha creacion</th>
                    <?php if($_SESSION['type']=='admin'){ ?>
    								<th>Opcion</th>
                    <?php } ?>
    							</tr>
    						</thead>
    						<tbody>
						<?php foreach($comprobantes as $comprobante) { ?>
    							<tr>
    								<td><?php echo $comprobante['id']; ?></td>
                    <td><?php echo $comprobante['alumno']['name']." ".$comprobante['alumno']['lastname']; ?></td>
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
    

<?php 
include_once('footer.php');
?>
