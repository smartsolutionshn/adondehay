<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
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
    <script src="js/holder.js"></script>
    
</head>
<body>
	<?php include 'php/menu.php';?>
	<div class="container">
		<form method="POST" id="feditorcompania" name="feditorcompania" action="editor_compania.php">
			<div class="jumbotron">				
  				<h1>Editor de Compa&ntilde;ia</h1>
  			</div>
  			
			
  			<div class="list-group">
  				<div class="form-group">	
  					<div class="row">
  						<div class="col-md-4"> 
							<div class="form-group">
					  			<select class="form-control" id="pais" name="pais">
								  <option>Honduras</option>				  
								</select>
							</div>						
						</div>
						<div class="col-md-4">
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
						
						<div class="col-md-4">
							<div class="form-group">			    								
								<input type="text" class="form-control" id="compania" name="compania">								
							</div>
						</div>
					</div>
				</div>  				    		          	          			  	  					  				  				  	
				
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">			    
							<label>Direcci&oacute;n</label>							
							<textarea class="form-control" id="direccion" name="direccion" rows="2">
							</textarea>
						</div>
						
						<div class="row">
							<div class="col-md-8">							      				     
								<div class="form-group">			    
									<label>Descripci&oacute;n</label>
									<textarea class="form-control" id="descripcion" name="descripcion" rows="6">
									</textarea>
								</div>	
							</div>
							
							<div class="col-md-2">
								<div class="form-group">									  			  					    			
					  				<label>Logo</label>
					  				<div style="height: 100px;">
					  					<img id="logo" name="logo" style="max-height: 100%; max-width: 100%" data-src="holder.js/200x100" alt="...">
					  				</div>	  		  				    							    	
							    </div>
							    <div class="form-group">
							    	<input type="file" name="archivoImg" id="archivoImg">
							    </div>
					    	</div>
					    
					    </div>				
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label>Telefono</label>
			  				<input type="text" class="form-control" id="telefono" name="telefono" >
			  			</div>
	  				
			  			<div class="form-group">  			  					    			
			  				<label>Correo</label>	  		  				    
					    	<input type="text" class="form-control" id="correo" name="correo" >
					    </div>	
			    	
					    <div class="form-group">  			  					    			
			  				<label>Sitio Web</label>	  		  				    
					    	<input type="text" class="form-control" id="sitioweb" name="sitioweb" >
					    </div>					    					    
			    	</div>
				</div>															      			      			      
		      	
		      	<div class="form-group">
		      		<button type="submit" class="btn btn-primary">Guardar</button>
		      		<a href="editor_perfil.php" class="btn btn-danger">
			               Cancelar
			          </a>
		      	</div>
		      	          			      		      
		      	<div id="respuesta" style="display: none;"></div>
		      	
		      	<br>		      	
		      	<div class="form-group">
      				<a href="http://office.microsoft.com/es-es/excel-help/guardar-un-libro-con-otro-formato-de-archivo-HA102840050.aspx" target="_blank">*El formato del archivo debe ser delimitado por tab y debe contener la descripcion del producto en la primer columna.</a>		      						      				
		      		<input type="file" name="archivo" id="archivo">			      		
		      	</div>
		      	
		      	<div id="respuestaArchivo" style="display: none;"></div>	
		      	
		      	<!--  
		      	<div class="row">
		      		<div class="col-md-6">	
		      			<div class="form-group">
				    		<table style="width: 100%">
				      			<tr>				      				
				      				<td><input type="text" class="form-control" id="nuevo" name="nuevo" placeholder="Agregar nuevo producto"></td>
				      				<td><button type="button" class="btn btn-default" onclick=nuevo()><span class="glyphicon glyphicon-ok"></span></button></td>
				      			</tr>
				      		</table>	
      			    	</div>	      			      			      			      					      		
				    </div>
				    
				    <div class="col-md-6">
				    	
				    </div>				    		      		      						      		      			    		   		
      			    
      			 </div>
      			 -->
      			 
		      		<div class="form-group">
		      			<div style="height: 370px">		      		
				      		<table id="dataTable" class="table table-striped table-condensed">
				      			<thead>
				      				<tr>
				      					<th style="width:16px"/>
				      					<th>Descripcion del Producto</th>
				      				</tr>
				      			</thead>
				      		</table>		      			
		      			</div>
		      		<div class="row">
		      		<div class="col-md-3">
		      			<table>
			      			<tr>
			      				<td><button type="button" class="btn btn-default" onclick=primera(this)><span class="glyphicon glyphicon-fast-backward"></span></button></td>
			      				<td><button type="button" class="btn btn-default" onclick=anterior(this)><span class="glyphicon glyphicon-step-backward"></span></button></td>
			      				<td style="width :64px"><input type="text" class="form-control" id="indice" name="indice" value="1"></td>		      					
			      				<td><button type="button" class="btn btn-default" onclick=siguiente(this)><span class="glyphicon glyphicon-step-forward"></span></button></td>
			      				<td><button type="button" class="btn btn-default" onclick=ultima(this)><span class="glyphicon glyphicon-fast-forward"></span></button></td>
			      			</tr>
			      		</table>
		      		</div>
      				<div class="col-md-6">
				      	<div class="form-group">
				      		<div class="input-group">
				      			<input type="text" class="form-control" id="filtro" name="filtro" placeholder="Escriba el producto">
				      			<span class="input-group-btn">
				      				<button type="button" class="btn btn-primary" onclick=filtrar()><span class="glyphicon glyphicon-search"></span></button>
				      			</span>
				      		</div>				      				      				      		
				      	</div>
			      	</div>			 
		      	</div>  	      		
		      	</div>			      		      
  			</div>
		</form>
	</div>
	
	<script type="text/javascript">
	
		var totalProductos = 0;
				
		function filtrar(){
			primera();
		}
		
		function primera(e){
			$('#indice').val(1);
			
			mostrarProductos();
		}
		
		function ultima(e){
			$('#indice').val(Math.ceil(totalProductos / 10));
			
			mostrarProductos();
		}
		
		function anterior(e){
			if($('#indice').val() > 1){
				
				var indice = parseInt($('#indice').val()) - 1;
							
				$('#indice').val(indice);
				
				mostrarProductos();
			}
		}
		
		function siguiente(e){
			var indice = parseInt($('#indice').val()) + 1;
			
			if(indice > Math.ceil(totalProductos / 10)){
				indice = Math.ceil(totalProductos / 10);
			}
			
			$('#indice').val(indice);
			
			mostrarProductos();
		}

		function getAbsolutePath() {
		    var loc = window.location;
		    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
		    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
		}
		
  		$(function() {    	  			  		      		      		    
  			$.ajax({
				  type: 'POST',
				  url: 'php/getCompania.php' + location.search,
				  data: $(this).serialize(),
			  }).done(function(data){	
				  var j = jQuery.parseJSON(data)[0];					  				 
				  
				  $('#pais').val(j.Pais);
				  $('#ciudad').val(j.Ciudad);
				  $('#compania').val(j.Compania);
				  $('#direccion').val(j.Direccion);
				  $('#descripcion').val(j.Descripcion);
				  $('#telefono').val(j.Telefono);
				  $('#correo').val(j.Correo);
				  $('#sitioweb').val(j.SitioWeb);
				  $('#logo').attr("src", getAbsolutePath() + j.Logo);
			  	}
			  );  			  		      		  		  
  			});
  		
  			mostrarProductos();  			
  		  		
  			function mostrarProductos()
  			{  				
  				$.ajax({
					  type: 'POST',
					  url: 'php/getProductos.php' + location.search + '&Indice=' + $('#indice').val() + '&Filtro=' + $('#filtro').val()					  
				  }).done(function(data){							  					  
					  //alert(data);
					  $('#dataTable > tbody').html("");
					  					  
					var j = jQuery.parseJSON(data);
					
					totalProductos = j.Registros;
					  
					  var tr;
				        for (var i = 0; i < j.Data.length; i++) {
				            tr = $('<tr/>');
				            tr.append('<td><button type="button" style="color: Red" class="btn btn-default btn-xs" onclick=eliminarProducto(this,"' + j.Data[i].Descripcion + '")><span class="glyphicon glyphicon-remove"></span></button></td>')				            
				            tr.append("<td>" + j.Data[i].Descripcion + "</td>");			            			            
				            $('#dataTable').append(tr);
				        }
				  	}
				  );  			  		      		  		  

  			}
	  		
	  		function eliminarProducto(btn, a)
	  		{	  				  				  			
	  			if(confirm('Esta seguro que desea eliminar "' + a + '"')){	  					  				
	  				$.ajax({
	  				  type: 'POST',
	  				  url: 'php/eliminarProducto.php' + location.search + '&Producto=' + a,
	  				  data: $(this).serialize(),
	  			  }).done(function(data){	
	  				  				  
	  				  if(data == 'Ok')
	  				  {	
	  					mostrarProductos();	  					
	  				  }	  				  
	  			  	}
	  			  );	  					  					
	  			}	  				  							  			      		  		
	  		}
	  		
  	// Variable to store your files
  		var files;
  		 
  		// Add events
  		$('#archivo').on('change', prepareUpload);
  		 
  		// Grab the files and set them to our variable
  		function prepareUpload(event)
  		{
  		  files = event.target.files;  		
  			
  			var data = new FormData();
  			$.each(files, function(key, value)
  			{
  				data.append(key, value);  				
  			});  
  			
  			
  			$.ajax({
				  type: 'POST',
				  url: 'php/subirProductos.php' + location.search,
				  data: data,
				  cache: false,			        
			        processData: false, // Don't process the files
			        contentType: false // Set content type to false as jQuery will tell the server its a query string request
			  }).done(function(data){	
				  				  
				  if(data == 'Ok')
				  {			
					  mostrarProductos();
					  
					  $("#respuestaArchivo").slideDown();
					  $("#respuestaArchivo").html('<div class="alert alert-info">Archivo guardado satisfactoriamente.</div>'); 
				  }
				  else{					  
					  $("#respuestaArchivo").html('<div class="alert alert-danger">' + data + '</div>');
				  }
			  	}
			  );
  			
  		 	}

  		$('#archivoImg').on('change', prepareImgUpload);
 		 
  		// Grab the files and set them to our variable
  		function prepareImgUpload(event)
  		{
  		  files = event.target.files;  		
  			
  			var data = new FormData();
  			$.each(files, function(key, value)
  			{
  				data.append(key, value);  				
  			});  
  			
  			
  			$.ajax({
				  type: 'POST',
				  url: 'php/subirLogo.php' + location.search,
				  data: data,
				  cache: false,			        
			        processData: false, // Don't process the files
			        contentType: false // Set content type to false as jQuery will tell the server its a query string request
			  }).done(function(data){	
				  				  
				  if(data == 'Ok')
				  {			
					  window.location.href = "editor_compania.php" + location.search;
				  }				  
			  	}
			  );
  			
  		 	}
  		 
  		$(document).ready(function() {
  		  $('form').submit(function ( event ){			  
  			  	var isvalidate=$('form').valid();
  		        if(isvalidate)
  		        {			  
  				  event.preventDefault();
  					
  				  $.ajax({
  					  type: 'POST',
  					  url: 'php/updateCompania.php' + location.search,
  					  data: $(this).serialize(),
  				  }).done(function(data){					  
  					  if(data == 'Ok')
  					  {						  
  						window.location.href = "editor_compania.php?Pais=" + $('#pais').val() + "&Ciudad=" + $('#ciudad').val() + 
  													"&Compania=" + $('#compania').val(); 
  						  $("#respuesta").slideDown();
  						  $("#respuesta").html('<div class="alert alert-info">Transaccion exitosa.</div>'); 
  					  }
  					  else{
  						  $("#respuesta").slideDown();
  						  $("#respuesta").html('<div class="alert alert-danger">' + data + '</div>');
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