<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
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
		<form method="POST" name="frecuperarcontrasena" id="frecuperarcontrasena" action="recuperar_contrasena.php">
			<div class="jumbotron">				
  				<h1>Recuperar Contrase&ntilde;a</h1>
  			</div>
  			<div class="list-group">  				    		          
	          
			  	  					  				  				  	
				<div class="form-group">			    
					<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo">
				</div>			      				      
		      		
		      	<div class="form-group">
		      		<button type="submit" name="recuperarcontrasena" class="btn btn-primary">Recuperar contrase&ntilde;a</button>
		      	</div>
		      	          			      		      
		      	<div id="respuesta" style="display: none;"></div>			      		      
  			</div>
		</form>
	</div>
	
	<script type="text/javascript">
	$(document).ready(function() {
	  $('form').validate(
	  {		  
	    rules: {
    	correo: {	        
	        required: true,
	        email: true
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
					  url: 'php/recuperarContrasena.php',
					  data: $(this).serialize(),
				  }).done(function(data){					  
					  if(data === 'Ok')
					  {						  
						  $("#respuesta").slideDown();
						  $("#respuesta").html('<div class="alert alert-info">Revise su correo para recuperar su contrase&ntilde;a.</div>'); 
					  }
					  else{
						  $("#respuesta").slideDown();
						  $("#respuesta").html('<div class="alert alert-danger">' + data + '</div>');
					  }
				  	}
				  );
	
				  return false;
		        }
		        else
		        {
			        
		        }
		});
	});
	</script>
</body>
</html>