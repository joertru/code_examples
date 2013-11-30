<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prueba</title>
<script type='text/javascript' src='js/jquery.min.js'></script>
<script type='text/javascript' src='js/jquery.validate.js'></script>
	    <script>
		jQuery(function(){
			
		jQuery('#delete').validate({
		      rules: {
			   id: {
				required: true,
				number: true
			   },
			   accion:"required",
		     },
		     messages: {
			   id: {
				required: "El campo es requerido",
				number: "Debe ser numero"
			   },
                           accion:"El campo es requerido"
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

<h1> Formulario busqueda o Eliminación de usuario</h1>
<form id="delete" method="post" action="delete.php" class="form-horizontal">
<fieldset>


    <div id="row" class="control-group">
       <label for="nombre" class="control-label">ID:</label>
       <div class="controls">
         <input type="text" id="id" name="id" value="" /> 
      </div>
    </div>

    <div id="row" class="control-group">
       <label for="nombre" class="control-label">Accion:</label>
       <div class="controls">
       <select name="accion" id="accion">
         <option value="">Seleccione la accion</option>
         <option value="buscar">Buscar</option>
         <option value="eliminar">Eliminar</option>    
      </select>
      </div>
    </div>

   <div id="row" class="control-group">
       <div class="controls">
         <input type="submit" id="enviar" value="Enviar" class="btn btn-large btn-primary"/>
      </div>
    </div>
</fieldset>
</form>
</div>
</body>
</html>
