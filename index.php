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
        <script src="js/holder.js"></script> 
        <script language="Javascript" src="http://www.codehelper.io/api/ips/?js"></script>
    </head>
    <body>

        <?php
        // Si se pasa el parametro de cerrar sesion, cerrar la sesion.
        if (isset($_GET["CerrarSesion"]) && $_GET["CerrarSesion"] == "1") {
            session_start();

            session_destroy();
        }
        ?>	
        <?php include 'php/menu.php'; ?>

        <div class="container">
            <form method="POST" name="fbuscar" id="fbuscar" action="index.php">
                <div class="row">
                    <div class="col-md-4">		          		          
                        <div class="form-group">
                            <label for="busqueda">Producto, Servicio, Compa&ntilde;ia</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="busqueda" name="busqueda"
                                       placeholder="Introduce tu busqueda">
                                <span class="input-group-btn">
                                    <button type="submit" name="buscar" id="buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>				    

                        </div>  
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pais">Pais</label>
                            <?php
                            $paises = array(
                                "Argentina",
                                "Bolivia",
                                "Brasil",
                                "Chile",
                                "Colombia",
                                "Costa Rica",
                                "Cuba",
                                "Curazao",
                                "Dominica",
                                "Ecuador",
                                "El Salvador",
                                "España",
                                "Guatemala",
                                "Guayana Francesa",
                                "Guyana",
                                "Haití",
                                "Honduras",
                                "Islas Malvinas",
                                "México",
                                "Panamá",
                                "Paraguay",
                                "Perú",
                                "Puerto Rico",
                                "República de Nicaragua",
                                "República Dominicana",
                                "San Martín",
                                "Surinam",
                                "Trinidad y Tobago",
                                "Uruguay",
                                "Venezuela"
                            );

                            $listPaises = '<select id="pais" name="pais" class="form-control" onchange="cambioPais();">';                            

                            foreach ($paises as $value) {
                                $listPaises = $listPaises
                                        . '<option value="' . htmlentities($value) . '">'
                                        . htmlentities($value)
                                        . '</option>';
                            }

                            $listPaises = $listPaises . '</select>';

                            echo $listPaises;
                            ?>
                        </div>		            		            		          
                    </div>

                    <div class="col-md-4">          
                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <select id="ciudad" name="ciudad" class="form-control">                                
                            </select>                            
                        </div>
                    </div>                    
                </div>

                <div id="resultado">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="jumbotron">	                                
                                <p>Empresario, registra tu compa&ntilde;ia totalmente <strong>gratis</strong> en la red de negocios del mundo.</p>
                                <a href="registrarme.php" class="btn btn-primary">
                                    Registrarme Gratis</a>                            
                            </div>
                        </div>
                    </div>
                </div>                

            </form>

            <script type="text/javascript">                                                             
                
                $('#pais').val(codehelper_ip.CountryName);
                
                cambioPais();
                
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
                    $('form').submit(function(event) {
                        var isvalidate = $('form').valid();
                        if (isvalidate)
                        {
                            event.preventDefault();

                            $.ajax({
                                type: 'POST',
                                url: 'php/Buscar.php',
                                data: $(this).serialize()
                            }).done(function(response) {                                
                                
                                var j = jQuery.parseJSON(response);

                                var resultado = '';
                                var fila = '<div class="row">';                                                                
                                
                                for (var i = 0; i < j.data.length; i++) {
                                    var panel = '<div class="col-md-4">';
                                        panel +=    '<div class="panel panel-default">';
                                        panel +=        '<div class="panel-heading">';
                                        panel +=            '<h3 class="panel-title">' + j.data[i].Compania + '</h3>';
                                        panel +=        '</div>';
                                        panel +=        '<div class="panel-body">';
                                        panel +=            '<table >';
                                        panel +=                '<tr >';
                                        panel +=                    '<td style="border: 0px ; width: 30%" rowspan="2">';
                                        panel +=                        '<div style="height: 85px;">';                                        
                                        
                                        //if(j.data[i].Logo != null){
                                            //panel +=                             '<img style="max-height: 100%; max-width: 100%" src="' + j.data[i].Logo + '" alt="...">';
                                        //}
                                        //else{                                            
                                            panel +=                             '<img style="max-height: 100%; max-width: 100%" src="logos/logo.png" alt="...">';
                                        //}
                                        
                                        panel +=                        '</div>';
                                        panel +=                    '</td>';
                                        panel +=                    '<td><p><strong>&nbsp;Direcci&oacute;n: </strong>' + j.data[i].Direccion + '</p></td>';
                                        panel +=                    '<td style="width: 5px"></td>';
                                        panel +=                 '</tr>';
                                        panel +=                 '<tr >';
                                        panel +=                    '<td><p><strong>&nbsp;Tel: </strong>' + j.data[i].Telefono + '</p></td>';
                                        panel +=                    '<td style="width: 5px"></td>';
                                        panel +=                 '</tr>';
                                        panel +=             '</table>';
                                        panel +=             '<p><strong>Correo: </strong>' + j.data[i].Correo + '</p>';
                                        panel +=             '<p><strong>Sitio Web: </strong><a href="' + (j.data[i].SitioWeb  || '') + '">' + (j.data[i].SitioWeb || '') + '</a></p>';
                                        panel +=         '</div>';
                                        panel +=       '</div>';
                                        panel +=     '</div>';
                                
                                fila += panel; 
                                
                                if((i + 1) % 3 == 0){
                                    fila += '</div>';
                                    resultado += fila;
                                    fila = '<div class="row">';
                                }
                               }                                                                                    
                               
                               if((j.data.length) % 3 != 0){
                                    fila += '</div>';
                                    resultado += fila;
                                }
                                    
                               $('#resultado').html(resultado);
                            }
                            );

                            return false;
                        }
                    });
                });

            </script>
        </div>
    </body>
</html>