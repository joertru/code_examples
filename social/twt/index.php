<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('twitteroauth/twitteroauth.php'); 
require_once('config.php');
require_once('dbconn.php');

function inserta_registro($tl,$lk)
{
  echo "<tr>";
  foreach ($tl as $cl => $reg)
  {
    $campos.="$cl,";
    $valores.="'".($cl=='created_at'?date('Y-m-d H:i:s',strtotime($reg)):$reg)."',";
    echo "<td>$reg</td>";
  }
  echo "</tr>";
  $campos=rtrim($campos,",");
  $valores=rtrim($valores,",");
  $query = "insert into timeline ($campos) values ($valores)";
  $lk->query($query);
}

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a TwitterOauth object with consumer/user tokens. */
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

/* If method is set change API call made. Test is called by default. */
$content = $connection->get('application/rate_limit_status');

$limit=$connection->http_header['x_rate_limit_limit'];
$remain=$connection->http_header['x_rate_limit_remaining'];
$_SESSION['arroba']= strtolower($content->screen_name);

/* Some example calls */
$content=$connection->get('statuses/user_timeline',array('screen_name' => 'millosfcoficial', 'count' => 40));

//$connection->get('statuses/user_timeline');
//$connection->get('users/show', array('screen_name' => 'abraham'));
//$connection->post('statuses/update', array('status' => date(DATE_RFC822)));
//$connection->post('statuses/destroy', array('id' => 5437877770));
//$connection->post('friendships/create', array('id' => 9436992));
//$connection->post('friendships/destroy', array('id' => 9436992));

/* Include HTML to display on the page */
include('html.inc');