<?php 
include_once('head.php');
include_once('navbar.php');
?>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
.panel-heading {
    padding: 5px 15px;
}

.panel-footer {
	text-align: center;
	padding: 1px 15px;
	color: #A0A0A0;
}

.profile-img {
	width: 96px;
	height: 96px;
	margin: 0 auto 10px;
	display: block;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
}
</style>
    <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Bienvenido a Gestion de RRHH</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="" name="f1" method="post">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
											src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Nombre de usuario" id="username" name="username" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Contraseña" id="password" name="password" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<button type="button" class="btn btn-lg btn-primary btn-block" id="login">Iniciar Sesión</button>
										</div>
									</div>
									<div style="text-align: center;">
									<span id="message" class="badge badge-secondary"></span>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						Si no posee cuenta contacte al administrador
					</div>
                </div>
			</div>
		</div>
	</div>
						<br>
					<br>
					<br>
<?php 
include_once('footer.php');
?>