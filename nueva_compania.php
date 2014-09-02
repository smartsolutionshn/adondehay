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
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
	<?php include 'php/menu.php';?>
	<div class="ibody">
		<form method="POST" name="fnuevacompania" id="fnuevacompania" action="nueva_compania.php">	  				
	  			<div class="jumbotron">				
	  				Nueva Compa&ntilde;ia
	  			</div>
	  			<div class="form-group">
		  			<select class="form-control" id="pais" name="pais">
					  <option>Honduras</option>				  
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" id="ciudad" name="ciudad">
		          		<option>Choloma</option>
		          		<option>La Ceiba</option>
					  	<option>San Pedro Sula</option>				  
					  	<option>Tegucigalpa</option>
					  	<option>Villanueva</option>
					</select>
				</div>
				<div class="form-group">
	  				<input type="text" class="form-control" id="compania" name="compania" placeholder="Compa&ntilde;ia">
	  			</div>
	  			<div class="form-group">			    					
					<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direcci&oacute;n">
				</div>
	  			<div class="form-group">
	  				<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
	  			</div>
	  			<div class="form-group">  			  					    				  		  				    
			    	<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico">
			    </div>		    		   
			    				              				  
	  			<button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
	  			<a href="editor_perfil.php" class="btn btn-danger">Cancelar</a>
	  			  
	  			<br/>
			    <br/>
			    <div id="respuesta" style="display: none;"></div>					  				  				  		 	     
	  	</form>
  	</div>
  	<script type="text/javascript">
	$(document).ready(function() {
	  $('form').validate(
	  {
	    rules: {
    	compania: {	        
	        required: true
	      },
	      correo: {	        
	        required: true,
	        email: true	        	      
	      },
	      telefono: {
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
					  url: 'php/enviarNuevaCompania.php',
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