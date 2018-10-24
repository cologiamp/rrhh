<?php 
include_once('head.php');
include_once('navbar.php');
?>
<script>
  function calcular(){
    var unit_amount = document.getElementById("unit_amount").value;
    var concept = 0;
    for(var i=1;i<=10;i++){
      if(document.getElementById(i).checked){
        concept = concept + 1;
      }
    }
    //console.log(concept);
    var total_amount = unit_amount*concept;
    document.getElementById("total_amount").value = total_amount;
  }
</script>
 <!-- edit Section -->
<section id="page_add" class="page_add">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                 <h2>Generar Novedad <?php if(isset($alumno)){ echo "para: ".$alumno['name']." ".$alumno['lastname']; } ?></h2>
		<hr>
		
		<?php if (isset($msg)){ ?>
		<div <?php echo $class_stat;?> role="alert"><?php echo $msg; ?><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
	<?php } ?>
		<form role="form" action="index.php?controller=comprobantes&add=<?php echo $alumno['id']; ?>" method="POST">

            <div class="form-group">
              <label for="novedad">Novedades:</label>
              <textarea class="form-control" rows="5" name="novedad" id="novedad"></textarea>
            </div>
  					
  					<button type="submit" class="btn btn-primary" id="submit">Ingresar</button>
  					<a href="index.php?controller=comprobantes"><button type="button" class="btn btn-success">Atras</button></a>
				</form>
                </div>
            </div>
        </div>
</section>
<br/>
<?php 
include_once('footer.php');
?>
