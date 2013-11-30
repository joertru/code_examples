<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prueba</title>
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/jquery.validate.js'></script>
	    <script>
		jQuery(function(){
			
		jQuery('#register').validate({
		      rules: {
			   nombre: "required",
			   apellido: "required",
	         	   email: {
				required: true,
				email: true
			   },
			   telefono: {
				required: true,
				number: true,
				minlength: 6
			   },
		     },
		     messages: {
		       nombre: "El campo es requerido",
			   apellido: "El campo es requerido",
			   contrasena: {
				 required: "El campo es requerido",
				 minlength: "Debe tener más de 6 caracteres"
			   },
			   email: {
				required: "El campo es requerido",
				email: "Debe ser un email valido micorreo@suservidor.com"
			   },
			   telefono: {
				required: "El campo es requerido",
				number: "Debe ser numero",
				minlength: "Debe tener más de 6 números"
			   }

		    }
		 });
		});
	</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Webservice JET</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Inicio</a></li>
              <li><a href="frmuser.php">Insertar</a></li>
              <li><a href="frmuserdel.php">Buscar y Eliminar</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
   <div class="container"><br/><br/><br/><br/>
   <h1>Jorge Erickson Trujillo Florez</h1>
   <p>Test de conocimiento de webservice</p>
</div> <!-- /container -->
</body>
</html>
