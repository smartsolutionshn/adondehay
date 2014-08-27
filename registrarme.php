<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Adonde Hay" content="">
    <meta name="Smart Solutions" content="">

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
    <div class="ibody">
 	<form method="POST" name="fregistrarme" id="fregistrarme" action="registrarme.php">
			          	            	                      	          	          	          
	          <div class="jumbotron">				
  				<h1> Registrarme Gratis</h1>
  				</div>
	          <div class="list-group">	 
	          	<div class="row">
	          		<div class="col-md-6">        	         	          
			          <div class="form-group">
			          	<select class="form-control" id="pais" name="pais">
						  <option>Honduras</option>				  
						</select>
			          </div>
			        </div>
			        <div class="col-md-6">
			          <div class="form-group">
			          	<select class="form-control" id="ciudad" name="ciudad">
			          		<option>Choloma</option>
			          		<option>La Ceiba</option>
						  	<option>San Pedro Sula</option>				  
						  	<option>Tegucigalpa</option>
						  	<option>Villanueva</option>
						</select>
			          </div>
			        </div>
		          </div>
		          <div class="row">		
		          	   <div class="col-md-6">       		          
				          <div class="form-group">			    
						    <input type="text" class="form-control" id="compania" name="compania" placeholder="Compa&ntilde;ia">
						  </div>
					  </div>
					  <div class="col-md-6">
						  <div class="form-group">			    
						    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
						  </div>
					  </div>
				  </div>
				  <div class="form-group">			    
				    <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico">
				  </div>            
				  <div class="form-group">			    
				    <input type="text" class="form-control" id="confirmarcorreo" name="confirmarcorreo"
				           equalTo="#correo" placeholder="Confirmar correo electronico">
				  </div>
		          		
		          <div class="form-group">			    
				    <input type="password" class="form-control" id="contrasena" name="contrasena"
				           placeholder="Contrase&ntilde;a">
				  </div>            			  
		      		      		
			      <div class="form-group">	
			      	<button type="submit" name="registrarme" class="btn btn-primary">Registrarme</button>
			      </div>	
			      
		      	  <a href="iniciar_sesion.php">&iquest;Usuario existente?</a>
		      	  <br/>		      
			      <div id="respuesta" style="display: none;"></div>			      			      		          			    
	          </div>	                       
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
	      confirmarcorreo: {	        
	        required: true,
	        email: true
	      },
	      contrasena: {
	        required: true
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
					  url: 'php/enviarRegistro.php',
					  data: $(this).serialize(),
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
  