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
        <?php include 'php/menu.php'; ?>

        <div class="ibody">
            <form method="POST" name="fcontactenos" id="fcontactenos" action="contactenos.php">

                <div class="jumbotron">				
                    <h1>Cont&aacute;ctenos</h1>
                </div>
                <div class="list-group">	 
                    <div class="row">
                        <div class="col-md-6">        	         	          
                            <div class="form-group">
                                <label for="nombre">Tu nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="correo">Tu correo</label>
                                <input type="text" class="form-control" id="correo" name="correo">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">			    
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto">
                    </div>            
                    <div class="form-group">			    
                        <label for="mensaje">Tu mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5"></textarea>
                    </div>

                    <div class="form-group">	
                        <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                    </div>				      		      	  
                    <br/>		      
                    <div id="respuesta"></div>			      			      		          			    
                </div>	                       
            </form>
        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').validate(
                        {
                            rules: {
                                nombre: {
                                    required: true
                                },
                                correo: {
                                    required: true,
                                    email: true
                                },
                                asunto: {
                                    required: true
                                },
                                mensaje: {
                                    required: true
                                }
                            }
                            ,
                            highlight: function(element) {
                                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                            },
                            unhighlight: function(element) {
                                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                            }
                        });
            });

            $(document).ready(function() {
                $('form').submit(function(event) {
                    var isvalidate = $('form').valid();
                    if (isvalidate)
                    {
                        event.preventDefault();

                        $.ajax({
                            type: 'POST',
                            url: 'php/enviarCorreo.php',
                            data: $(this).serialize()
                        }).done(function(data) {

                            if (data === 'Ok')
                            {
                                $("#nombre").val("");
                                $("#correo").val("");
                                $("#asunto").val("");
                                $("#mensaje").val("");
                                
                                $("#respuesta").slideDown();
                                $("#respuesta").html('<div class="alert alert-info">Enviado.</div>');
                            }
                            else {
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