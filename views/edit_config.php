<?php 
include_once('head.php');
include_once('navbar.php');
?>
<script>
$(document).ready(function(){
  
});


</script>
 <!-- edit Section -->
<section id="page_edit" class="page_edit">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                 <h2>Editar configuracion de aplicacion</h2>
		<hr>
		
		<?php if (isset($msg)){ ?>
		<div <?php echo $class_stat;?> role="alert"><?php echo $msg; ?><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
	<?php } ?>
		<form role="form" action="index.php?controller=configs&edit=1" method="POST">

  					
		<div class="form-group">
    		<label for="cuenta">Nro de cuenta</label>
	    		<input type="number" class="form-control" name ="cuenta" id="cuenta" placeholder="Numero de cuenta" required value="<?php if(isset($config['cuenta'])) { echo $config['cuenta']; }?>">
  		</div>
  		<div class="form-group">
    		<label for="valorcuota">Valor de cuota por defecto: </label>
			<input type="number" class="form-control" name="valorcuota" id="valorcuota" placeholder="Valor de cuota" required value="<?php if(isset($config['valorcuota'])) { echo $config['valorcuota']; }?>">
  		</div>
  					
  					<button type="submit" class="btn btn-primary" id="submit">Ingresar</button>
  					<a href="index.php?controller=alumnos"><button type="button" class="btn btn-success">Atras</button></a>
				</form>
                </div>
            </div>
        </div>
</section>
<br/>
<?php 
include_once('footer.php');
?>
