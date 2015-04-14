<?php

require_once('./TwitterOAuth.php');
include_once('credenciales.inc');

  function getConnectionWithAccessToken($c,$cs,$t,$ts)
  { 
	$conn = new TwitterOAuth($c, $cs, $t, $ts);
 	return $conn;
  }

$user=$_REQUEST['u'];
if (!isset($user))
{
  echo "ERROR! Usuario vacío";
  exit;
}
$twt=urldecode($_REQUEST['t']);
if (!isset($twt))
{
  echo "ERROR! Texto vacío";
  exit;
}
if (strlen($twt)>160)
{
  echo "160";
  exit;
}

$consumer=$key[$user]["consumer"];
$consumer_secret=$key[$user]["consumer_secret"];
$token=$key[$user]["token"];
$token_secret=$key[$user]["token_secret"];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = getConnectionWithAccessToken($consumer, $consumer_secret, $token, $token_secret);

$twitter=$connection->post('statuses/update', array('status' => $twt));

$code=$connection->http_code;

echo $code;
