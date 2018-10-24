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
                 <h2>Editar informacion de afiliado</h2>
		<hr>
		
		<?php if (isset($msg)){ ?>
		<div <?php echo $class_stat;?> role="alert"><?php echo $msg; ?><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
	<?php } ?>
		<form role="form" action="index.php?controller=alumnos&edit=<?php echo $_GET['edit'];?>" method="POST">

  					
		<div class="form-group">
    		<label for="name">Nombre</label>
	    		<input readonly type="text" class="form-control" name ="name" id="name" placeholder="Nombre de Afiliado" required value="<?php echo $alumno['name'];?>">
  		</div>
      <div class="form-group">
        <label for="lastname">Apellido</label>
          <input readonly type="text" class="form-control" name ="lastname" id="lastname" placeholder="Apellido de Afiliado" required value="<?php echo $alumno['lastname'];?>">
      </div>
      <div class="form-group">
          <label for="kids">DNI</label>
          <input readonly type="number"  required  class="form-control" name="dni" id="dni" placeholder="Ingresar DNI" value="<?php echo $alumno['dni']; ?>">
      </div>

      <div class="form-group">
        <label for="lastname">Domicilio</label>
          <input type="text" class="form-control" name ="domicilio" id="domicilio" placeholder="Domicilio" value="<?php echo $alumno['domicilio'];?>">
      </div>

      <div class="form-group">
          <label for="kids">N° de telefono</label>
          <input type="number"  class="form-control" name="telefono" id="telefono" placeholder="Ingresar N° telefono" value="<?php echo $alumno['telefono']; ?>">
      </div>

      <div class="form-group">
          <label for="kids">N° de celular</label>
          <input type="number"  class="form-control" name="celular" id="celular" placeholder="Ingresar N° celular" value="<?php echo $alumno['celular']; ?>">
      </div>      
  		
      <div class="form-group">
          <label for="kids">Estado Civil</label>
          <input type="text"  class="form-control" name="estadocivil" id="estadocivil" placeholder="Ingresar Estado Civil" value="<?php echo $alumno['estadocivil']; ?>">
      </div>

      <div class="form-group">
          <label for="kids">Cantidad Grupo Familiar</label>
          <input type="number"  class="form-control" name="grupofliar" id="grupofliar" placeholder="Ingresar cantidad grupo familiar" value="<?php echo $alumno['grupofliar']; ?>">
      </div>

      <div class="form-group">
          <label for="kids">Estudios</label>
          <input type="text" class="form-control" name="estudios" id="estudios" placeholder="Ingresar estudios" value="<?php echo $alumno['estudios']; ?>">
      </div>

      <div class="form-group">
          <label for="kids">Area a la que pertenece</label>
          <input type="text"  class="form-control" name="area" id="area" placeholder="Ingresar area a la que pertenece" value="<?php echo $alumno['area']; ?>">
      </div>

      <div class="form-group">
          <label for="kids">Funcion</label>
          <input type="text"  class="form-control" name="funcion" id="funcion" placeholder="Ingresar Funcion" value="<?php echo $alumno['funcion']; ?>">
      </div>

      <div class="form-group">
          <label for="kids">Categoria</label>
          <input type="text"  class="form-control" name="categoria" id="categoria" placeholder="Ingresar Categoria" value="<?php echo $alumno['categoria']; ?>">
      </div>      

      <div class="form-group">
          <label for="kids">Agrupamiento</label>
          <input type="text"  class="form-control" name="agrupamiento" id="agrupamiento" placeholder="Ingresar Agrupamiento" value="<?php echo $alumno['agrupamiento']; ?>">
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
