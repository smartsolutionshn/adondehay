<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Adonde Hay" content="">
    <meta name="Smart Solutions" content="">

    <title>Adonde Hay</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="/js/bootstrap.js"></script>
	
    <!-- Add custom CSS here -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/jquery.validate.min.js"></script> 
                	
    <!--  JQUERY-UI (only sortable and datepicker is needed) -->
	<link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.min.css">
	<script type="text/javascript" src="jquery-ui/jquery-ui.min.js"></script>	
	  
	<!--  PAGINATION plugin -->
	<link rel="stylesheet" type="text/css" href="bs_pagination-master/jquery.bs_pagination.min.css">
	<script type="text/javascript" src="bs_pagination-master/jquery.bs_pagination.min.js"></script>
	<script type="text/javascript" src="bs_pagination-master/localization/en.min.js"></script>
	 
	<!--  FILTERS plugin --> 
	<link rel="stylesheet" type="text/css" href="jui_filter_rules-master/minified/jquery.jui_filter_rules.bs.min.css">
	<script type="text/javascript" src="jui_filter_rules-master/minified/jquery.jui_filter_rules.min.js"></script>
	<script type="text/javascript" src="jui_filter_rules-master/minified/localization/en.min.js"></script>
	<!--  required from filters plugin -->
	<script type="text/javascript" src="js/moment.min.js"></script>
	 
	<!--  DATAGRID plugin -->
	<link rel="stylesheet" type="text/css" href="bs_grid-master/minified/jquery.bs_grid.min.css">
	<script type="text/javascript" src="bs_grid-master/minified/jquery.bs_grid.min.js"></script>
	<script type="text/javascript" src="bs_grid-master/minified/localization/en.min.js"></script>
	    
  </head>

  <body>  	  
  	<form method="POST" name="fnuevacompania" id="fnuevacompania" action="nueva_compania.php">
  		<div class="iformulario">  			
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
  				<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
  			</div>
  			<div class="form-group">  			  					    				  		  				    
		    	<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico">
		    </div>
		    				              				  
  			<button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
  			<a href="editorperfil.php" class="btn btn-danger">Cancelar</a>
  			  
  			<br/>
		    <br/>
		    <div id="respuesta" style="display: none;"></div>					  				  			
  		</div>  	  	     	
  	</form>
  	
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
					  data: $(this).serialize(),
					  success: function(data){
						  $("#respuesta").slideDown();
						  $("#respuesta").html(data);
					  }
				  });
	
				  return false;
		        }
		        else
		        {
			        alert("invalid");
		        }
		});
	});
	</script>
  </body>
  </html>