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


$id = (int) strip_tags(trim($_REQUEST['id']));
$ac = strip_tags(trim($_REQUEST['accion']));

$client = new nusoap_client('http://projects.znetworksgroup.com/ztest-u/server.wsdl', 'wsdl');
$err = $client->getError();
if ($err) {
	echo '<h2>Error en el constructor</h2><pre>' . $err . '</pre>';
}

switch($ac){
   case 'eliminar':
    $result = $client->call('delUser', array('op1' => $id));
   break;
   case 'buscar':
    $result = $client->call('searchUser', array('op1' => $id));
   break;
   default:
    echo '<h2>Opcion no valida</h2><pre>';
   break;
}

if ($client->fault) {
	echo '<h2>Fallos</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {

	$err = $client->getError();
	if ($err) {

		echo '<h2>Errores</h2><pre>' . $err . '</pre>';
	} else {

		echo '<h2>Resultados</h2><pre>';
		print_r($result);
		echo '</pre>';
	}
}

$xml = simplexml_load_string($result);

echo '<h2>Sacando resultados</h2><pre>';
print_r($xml);
echo '</pre>';
?>
</div> <!-- /container -->
</body>
</html>
