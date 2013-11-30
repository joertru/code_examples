<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insertando registro</title>
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
<?php
require_once('lib/nusoap.php');

$name = strip_tags(trim($_POST['nombre']));
$lastname = strip_tags(trim($_POST['apellido']));
$email= strip_tags(trim($_POST['email']));
$phone = strip_tags(trim($_POST['telefono']));

/*echo $name."<br/>";
echo $lastname."<br/>";
echo $email."<br/>";
echo $phone."<br/>";*/

$client = new nusoap_client('http://projects.znetworksgroup.com/ztest-u/server.wsdl', 'wsdl');
$err = $client->getError();
if ($err) {
	echo '<h2>Error en el constructor</h2><pre>' . $err . '</pre>';
}

$param = array(
  "op1" => 'JORGE ERICKSON TRUJILLO', 
  "op2"=> "$name",
  "op3"=> "$lastname",
  "op4"=> "$email",
  "op5"=> "$phone");

$result = $client->call('insertUser', $param);

if ($client->fault) {
	echo '<h2>Fault</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {

	$err = $client->getError();
	if ($err) {

		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {

		echo '<h2>Resultados</h2><pre>';
		print_r($result);
		echo '</pre>';
	}
}
?>
</div> <!-- /container -->
</body>
</html>
