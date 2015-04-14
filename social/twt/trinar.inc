<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>TL MillosFCOficial</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
  </head>
  <body>
    <div>
      <h2>TL (<?php echo "$remain/$limit"; ?>)</h2>

      <p><?php include ("menu.inc"); ?></p>

      <hr />
      <?php if (isset($menu)) { ?>
        <?php echo $menu; ?>
      <?php } ?>
    </div>
        <?php if (isset($status_text)) { ?>
      <?php echo '<h3>'.$status_text.'</h3>'; ?>
    <?php } ?>
    <pre>
    <?php
      $f=$_REQUEST['f'];
      if (!(isset($f)))
        $f=0;
      else
        $status=urlencode($_REQUEST['trino']);
      if (strcmp(gettype($content),"string")==0)
        print_r($content); 
      else
      if ($f==1)
      {
              foreach ($cuentas as $arroba)
              {
                  $code=file_get_contents("http://www.parcehost.com/twt/send/index.php?t=".$status."&u=$arroba");
                  echo $status;
                  if (is_numeric($code))
                    if ($code==200)
                      echo "$id [OK] -> <a href='http://www.twitter.com/$arroba'>".$arroba."<a/><br />";
                    else
                      echo "$id [ERROR: $code] -> ".$arroba."<br />";
                  else
                    echo "$id [ERROR: desconocido] -> ".$arroba."<br />";
              }
      }
      else
      {
        $query="select * from timeline t where t.mentions=0 order by created_at asc";// limit 0,100";
        //echo "$query<br />";
        if ($result = $link->query($query)) 
        {
          while ($fila = $result->fetch_row())
            if ((strlen($fila[3])==0)&&(strlen($fila[5]==0))) 
            {
              $status=$fila[1];
              $id=$fila[0];
              foreach ($cuentas as $arroba)
              {
                $query="select count(*) from trinado where id='$id' and arroba='$arroba'";
                $r=$link->query($query);
                $f=$r->fetch_row();
                $contador=$f[0];
                if ($contador==0)
                {
                  if (strcmp($arroba,"miliosfcoficiai")==0)
                  {
                    $tw=$connection->post('statuses/update', array('status' => $status));
                    $code=$connection->http_code;
                  }
                  else
                    $code=file_get_contents("http://www.parcehost.com/twt/send/index.php?t=".urlencode($status)."&u=$arroba");
                  if (is_numeric($code))
                    if ($code==200)
                      inserta_registro($arroba,$id,$link);
                    else
                      echo "$id [ERROR: $code] -> ".$arroba."<br />";
                  else
                  {
                    echo "$id [ERROR: Tweet repetido] -> ".$arroba."<br />";
                    inserta_registro($arroba,$id,$link,1);
                  }
                }
              }
            }
          $result->close();
        }

      }
                echo "FIN";
      ?>
      </pre>
  </body>
</html>