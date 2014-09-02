<html lang="en">
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
    <script language="Javascript" src="http://www.codehelper.io/api/ips/?js"></script>
  </head>

  <body>
      <?php include 'php/menu.php';?>
      
    <div class="ibody">
 	<form method="POST" name="fregistrarme" id="fregistrarme" action="registrarme.php">
			          	            	                      	          	          	          
	          <div class="jumbotron">				
  				<h1> Registrarme Gratis</h1>
  				</div>
	          <div class="list-group">	 
	          	<div class="row">
	          		<div class="col-md-6">        	         	          
			          <div class="form-group">
                                      <select class="form-control" id="pais" name="pais" onchange="cambioPais();">						  			  
					</select>
			          </div>
			        </div>
			        <div class="col-md-6">
			          <div class="form-group">
			          	<select class="form-control" id="ciudad" name="ciudad">			          		
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
      $.ajax({
                type: 'POST',
                url: 'php/getPaises.php',                                
            }).done(function(response) {                                                  
                var j = jQuery.parseJSON(response);                                

                $.each(j.data, function(i, val) {
                    $('#pais').append(new Option(val.pais, val.pais));
                 });                                
                 
                 $('#pais').val(codehelper_ip.CountryName);
                 
                 cambioPais();
            }
            );
        
      function cambioPais(){                                       
        var pais = $('#pais').val();
            
            $.ajax({
                    type: 'POST',
                    url: 'php/getCiudades.php?pais=' + pais,                                
                }).done(function(response) {                                  

                    $(ciudad).empty();

                    var j = jQuery.parseJSON(response);                                

                    $.each(j.data, function(i, val) {
                        $('#ciudad').append(new Option(val.ciudad, val.ciudad));
                     });                                
                     
                     $('#ciudad').val(codehelper_ip.CityName);
                }
                );
        }
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
  