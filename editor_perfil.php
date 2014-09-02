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
	<div class="container">
		<div class="jumbotron">				
			<h1>Editor de Perfil</h1>
		</div>  
		<label>Wilson Roberto Guerra</label>
		<br>
		<br>					
		<a href="nueva_compania.php" class="btn btn-primary">
               Nueva Compa&ntilde;ia
          </a> 
        <br>
        <br>
        <table id="dataTable" class="table table-striped table-condensed">
        	<thead>
	        	<tr>
	        		<th>Pais</th>
	        		<th>Ciudad</th>
	        		<th>Compa&ntilde;a</th>
	        		<th>Correo</th>
	        		<th>Telefono</th>	        		
	        	</tr>
        	</thead>
        </table>
	</div> 	
	
	<script type="text/javascript">
		function getAbsolutePath() {
		    var loc = window.location;
		    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
		    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
		}
		
  		$(function() {    	
  			$.ajax({
				  type: 'POST',
				  url: 'php/listarcompaniasperfil.php',
				  data: $(this).serialize(),
			  }).done(function(data){	
				  var j = jQuery.parseJSON(data);
				  
				  var tr;
			        for (var i = 0; i < j.length; i++) {
			            tr = $('<tr/>');
			            tr.append("<td>" + j[i].Pais + "</td>");
			            tr.append("<td>" + j[i].Ciudad + "</td>");
			            var cia = '<a href="' + getAbsolutePath() + 'editor_compania.php?Pais=' + j[i].Pais + '&Ciudad=' + j[i].Ciudad + '&Compania=' + j[i].Compania + '">' + j[i].Compania + '</a>';
			            tr.append("<td>" + cia + "</td>");
			            tr.append("<td>" + j[i].Correo + "</td>");
			            tr.append("<td>" + j[i].Telefono + "</td>");			            
			            $('#dataTable').append(tr);
			        }
			  	}
			  );  			  		      		  		  
  			});
  		
  	</script>			
</body>
</html>