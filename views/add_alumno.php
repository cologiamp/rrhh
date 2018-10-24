<?php 
include_once('head.php');
include_once('navbar.php');
?>
<script>
$(document).ready(function(){
  
});


</script>
 <!-- edit Section -->
<section id="page_add" class="page_add">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                 <h2>Agregar Afiliado</h2>
		<hr>
		
		<?php if (isset($msg)){ ?>
		<div <?php echo $class_stat;?> role="alert"><?php echo $msg; ?><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
	<?php } ?>
		<form role="form" action="index.php?controller=alumnos&add" method="POST">

  					
		<div class="form-group">
    		<label for="name">Nombre</label>
	    		<input type="text" class="form-control" name ="name" id="name" placeholder="Nombre de afiliado" required value="<?php if(isset($memory)){ echo $memory[0]['name']; } ?>">
  		</div>
    <div class="form-group">
        <label for="lastname">Apellido</label>
          <input type="text" class="form-control" name ="lastname" id="lastname" placeholder="Apellido de afiliado" required value="<?php if(isset($memory)){ echo $memory[0]['lastname']; } ?>">
      </div>

  					<div class="form-group">
    						<label for="dni">DNI</label>
    						<input type="number"  required 	class="form-control" name="dni" id="dni" placeholder="Ingresar n° de documento" value="<?php if(isset($memory)){ echo $memory[0]['dni']; } ?>">
  					</div>

            <div class="form-group">
                <label for="dni">N° de Afiliado</label>
                <input type="number"  required  class="form-control" name="afiliado" id="afiliado" placeholder="Ingresar n° de afiliado" value="<?php if(isset($memory)){ echo $memory[0]['afiliado']; } ?>">
            </div>

            <input type="hidden" value="<?php echo date('Y-m-d'); ?>" name="dateadded" id="dateadded">
  					
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
