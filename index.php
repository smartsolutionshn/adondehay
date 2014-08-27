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
        <?php
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
                                    <button type="submit" name="buscar" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>				    

                        </div>  
                    </div>

                    <div class="col-md-4">          
                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <select id="ciudad" name="ciudad" class="form-control">
                                <option>Choloma</option>
                                <option>La Ceiba</option>
                                <option>San Pedro Sula</option>
                                <option>Tegucigalpa</option>
                                <option>Villanueva, Honduras</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pais">Pais</label>
                            <select id="pais" name="pais" class="form-control">
                                <option>Honduras</option>		        
                            </select>
                        </div>		            		            		          
                    </div>
                </div>

                <div id="resultado">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Smart Solutions</h3>
                                </div>
                                <div class="panel-body">
                                    <table >
                                        <tr >
                                            <td style="border: 0px ; width: 30%" rowspan="2">
                                                <div style="height: 85px;">
                                                    <img style="max-height: 100%; max-width: 100%" src="http://localhost:8080/adondehay/logos/wguerraoutlook.com/Honduras/San Pedro Sula/Smart Solutions/Mi Foto.jpg" alt="...">
                                                </div>
                                            </td>
                                            <td><p><strong>Direcci&oacute;n:</strong> Residencial Real del Puente, Casa F25 Etapa II, Villanueva, Cortes</p></td>
                                            <td style="width: 5px"></td>

                                        </tr>
                                        <tr >										
                                            <td><p><strong>Tel:</strong> 2670-1529</p></td>
                                            <td style="width: 5px"></td>
                                        </tr>
                                    </table>															
                                    <p><strong>Correo: </strong>lcontreras@smartsolutions.hn</p>								
                                    <p><strong>Sitio Web: </strong><a href="http://www.smartsolutions.hn">www.smartsolutions.hn</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script type="text/javascript">

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
                            }).done(function(data) {
                                $('#resultado').html(data);
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