<?php 
include_once('head.php');
include_once('navbar.php');
?>
<div class="container">
		<div class="row">

    		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
  			<li class="active"><a href="#list" role="tab" data-toggle="tab">List</a></li>
  			<li><a href="#edit" role="tab" data-toggle="tab">Add</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
  			<div class="tab-pane active" id="list">
  				<br/>
  				<p><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Data</button></p>
  				<br/>
  				<div class="table-responsive">
  					<table class="table table-hover">
    						<thead>
    							<tr>
    								<th>ID</th>
    								<th>Nombre de usuario</th>
    								<th>Email</th>
    								<th>Tipo</th>
    								<th>Opciones</th>
    							</tr>
    						</thead>
    						<tbody>
						<?php foreach($users as $user) { ?>
    							<tr>
    								<td><?php echo $user['id']; ?></td>
    								<td><?php echo $user['username']; ?></td>
    								<td><?php echo $user['email']; ?></td>
    								<td><?php echo $user['type']; ?></td>

    								<td>
   <a href="index.php?controller=users&edit=<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-edit"></span> edit</a>
   <a href="index.php?controller=users&del=<?php echo $user['id']; ?>"><span class="glyphicon glyphicon-trash"></span> del</a>
    								</td>
    							</tr>
    						
<?php } ?>
    						</tbody>
  					</table>
				</div>
				<ul class="pagination">
  					<li class="disabled"><a href="#">&laquo;</a></li>
  					<li class="active"><a href="#">1</a></li>
  					<li><a href="#">2</a></li>
  					<li><a href="#">3</a></li>
  					<li><a href="#">4</a></li>
  					<li><a href="#">5</a></li>
  					<li><a href="#">&raquo;</a></li>
				</ul>
  			</div>
  			<div class="tab-pane" id="edit">
  				<br/>
  				<div class="alert alert-success" role="alert">Berhasil <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
				<div class="alert alert-warning" role="alert">Ada sedikit masalah <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
				<div class="alert alert-danger" role="alert">Error, coba lagi <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button></div>
  				<br/>
  				<form role="form">
  					<div class="form-group">
    						<label for="exampleInputEmail1">Email address</label>
    						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  					</div>
  					<div class="form-group">
    						<label for="exampleInputPassword1">Password</label>
    						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  					</div>
  					<div class="form-group">
    						<label for="exampleInputtxt1">Text</label>
    						<input type="text" class="form-control" id="exampleInputtxt1" placeholder="Text">
  					</div>
  					<div class="form-group">
    						<label for="exampleInputurl1">Site</label>
    						<input type="url" class="form-control" id="exampleInputurl1" placeholder="http://">
  					</div>
  					<div class="form-group">
    						<label for="exampleInputFile">File input</label>
    						<input type="file" id="exampleInputFile">
    						<p class="help-block">Example block-level help text here.</p>
  					</div>
  					<div class="checkbox">
    						<label>
      						<input type="checkbox"> Check me out
    						</label>
  					</div>
  					<button type="submit" class="btn btn-primary">Submit</button>
  					<button type="button" class="btn btn-success">Back</button>
				</form>
				<br/>
  			</div>
		</div>
    </div>


<?php 
include_once('footer.php');
?>
