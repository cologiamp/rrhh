<div class="navbar navbar-custom" rol="navigation">
		<div class="navbar-collapse collapse">
			<div class="container">
				<?php if(isset($_SESSION['username'])) { ?>
				<ul class="nav navbar-nav navbar-left">
				<li>
					<a href="index.php?controller=alumnos" class="data-toggle">
								Inicio
					</a>
				</li>
				<li>
					<a href="index.php?controller=alumnos" class="data-toggle">
								Afiliados
					</a>
				</li>
				<li>
					<a href="index.php?controller=comprobantes" class="data-toggle">
								Novedades
					</a>
				</li>
				<?php if($_SESSION['type']=='admin') { ?>
				<li>
					<a href="index.php?controller=users" class="data-toggle">
								Usuarios
					</a>
				</li>
				<li>
					<a href="index.php?controller=configs" class="data-toggle">
								Configuracion
					</a>
				</li>
				<?php } ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="data-toggle">
							<i class="glyphicon glyphicon-user"></i>
							
								Bienvenido: <?= $_SESSION['username'];?>
							
							</a>
					</li>
					<li><a href="index.php?controller=logout"><b class="glyphicon glyphicon-log-out"></b> Cerrar Sesion </a></li>
				</ul>
				<?php } ?>
			</div>
		</div>
</div>


