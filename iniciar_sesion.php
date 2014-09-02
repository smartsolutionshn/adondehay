<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Adonde Hay" content="">
    <meta name="Smart Solutions" content="">
    <meta name="google-site-verification" content="SEh_QWKDR8M_ehpSkH2beQvp6ptmV4DksN3w-QjHFFo" />    
        
        <script type="text/javascript">

		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-17460127-1']);
		_gaq.push(['_trackPageview']);

		(function () {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		
	</script>
        
    <title>Adonde Hay</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->    
    <link href="css/style.css" rel="stylesheet">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>   
    <script src="js/bootstrap.js"></script>
</head>
<body>	
	<?php include 'php/menu.php';?>	
	<div class="ibody">
		<form method="POST" name="finiciarsesion" id="finiciarsesion" action="iniciar_sesion.php">
			<div class="jumbotron">				
  				<h1>Iniciar Sesion</h1>
  			</div>
  			<div class="list-group">
  				<div class="row">		
		          	   <div class="col-md-6">       		          
				          <div class="form-group">			    
						    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario o Correo">
						  </div>
					  </div>
					  <div class="col-md-6">
						  <div class="form-group">			    
						    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contrase&ntilde;a">
						  </div>
					  </div>
				  </div>
				  
				  <div class="row">
				  	<div class="col-md-6">
					  <div class="form-group">	
				      	<button type="submit" name="iniciarsesion" class="btn btn-primary">Iniciar Sesion</button>
				      </div>
				    </div>
				    <div class="col-md-6">
				    	<a href="recuperar_contrasena.php">&iquest;Olvido su contrase&ntilde;a?</a>
				    </div>
			      </div>
			      
			      <!--
			      <div class="form-group">	
			      	<label>
			      	<input type="checkbox" name="recordarme" id="recordarme"/> Recordarme
			      	</label>
			      </div>
			      
			        <br/> -->		      
			      <div id="respuesta" style="display: none;"></div>	
  			</div>
		</form>
	</div>
	
	<script type="text/javascript">
	$(document).ready(function() {
	  $('form').validate(
	  {		  
	    rules: {
    	usuario: {	        
	        required: true
	      },
	      contrasena: {	        
	        required: true	        	        
	      }
	    }
	  ,
      highlight: function (element) {
          $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
      },
      unhighlight: function (element) {
          $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
      }
	  });
	});

	$(document).ready(function() {
		  $('form').submit(function ( event ){			  
			  	var isvalidate=$('form').valid();
		        if(isvalidate)
		        {			  
				  event.preventDefault();
					
				  $.ajax({
					  type: 'POST',
					  url: 'php/iniciarSesion.php',
					  data: $(this).serialize()
				  }).done(function(data){					  
					  if(data == 'Ok')
					  {						  
						  window.location.href = "editor_perfil.php"; 
					  }
					  else{
						  $("#respuesta").slideDown();
						  $("#respuesta").html(data);
					  }
				  	}
				  );
	
				  return false;
		        }		        
		});
	});
	</script>
</body>
</html>