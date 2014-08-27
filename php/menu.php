<?php
session_start();
$usuario = "";

if(isset($_SESSION['usuarioId'])){
	$usuario = $_SESSION['usuarioId'];
}
	


$menu = '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
        			</button>
					<a class="navbar-brand" href=".">&iquest;Adonde Hay?</a>
				</div>
	
        			<!-- Collect the nav links, forms, and other content for toggling -->
        			<div class="collapse navbar-collapse navbar-ex1-collapse">
				          <ul class="nav navbar-nav">
				         	 <!--<li><a href="#about">About</a></li>
				          	 <li><a href="#services">Services</a></li>
				             -->'.
				             ($usuario == "" ?
				             '<li><a href="iniciar_sesion.php">Iniciar sesi&oacute;n</a></li>' :
				             '<li><a href="editor_perfil.php">'.$usuario.'</a></li>
				              <li><a href="index.php?CerrarSesion=1">Cerrar sesi&oacute;n</a></li>')
				            .'<li><a href="registrarme.php">Registrarme Gratis</a></li>
				              <li><a href="contacto.php">Cont&aacute;ctenos</a></li>
				           </ul>
            		</div><!-- /.navbar-collapse -->
            	</div>
        	</div>
		</nav>';

echo $menu;