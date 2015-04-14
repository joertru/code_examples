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
    <script type="text/javascript">
<!-- Original:  Ronnie T. Moore -->
<!-- Begin
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else 
countfield.value = maxlimit - field.value.length;
}
// End -->
</script>
  </head>
  <body>
    <div>
      <h2>TL <?php echo "($remain/$limit)$hits"; ?> </h2>

      <p><?php include ("menu.inc"); ?></p>

      <hr />
<form name="trinar" action="trinar.php">
  <font size="2" face="arial, helvetica, sans-serif"><p>( El límite es de 160 caracteres. )<br>
  <textarea name="trino" wrap="physical" cols="40" rows="4"
  onKeyDown="textCounter(this.form.trino,this.form.remLen,160);"
  onKeyUp="textCounter(this.form.trino,this.form.remLen,160);"></textarea> <br>
  <input readonly type="text" name="remLen" size="3" maxlength="3" value="160"> caracteres disponibles</font>&nbsp;&nbsp;&nbsp;<input type="image" name="boton" src="images/tweet-button.png" align="middle"> </p>
  <input type="hidden" name="f" value="1"> 
</form>
      <?php if (isset($menu)) { ?>
        <?php echo $menu; ?>
      <?php } ?>
    </div>
        <?php if (isset($status_text)) { ?>
      <?php echo '<h3>'.$status_text.'</h3>'; ?>
    <?php } ?>
    <pre>
    <?php
      if (strcmp(gettype($content),"string")==0)
        print_r($content); 
      else
      {
        $registro=array();
        $claves=array("id","text","source","in_reply_to_status_id","in_reply_to_screen_name","created_at","retweeted_id","retweeted_user","retweeted_screen_name","mentions");
        echo "<table border='1'>";
        for ($i=0;$i<count($content);$i++)
        {
          $trino=$content[$i];
          for ($t=0;$t<6;$t++)
            $registro[$claves[$t]]=$trino->$claves[$t]; 
          $registro[$claves[6]]=$trino->retweeted_status->id;
          $registro[$claves[7]]=$trino->retweeted_status->user->id;
          $registro[$claves[8]]=$trino->retweeted_status->user->screen_name;
          $registro[$claves[9]]=count($trino->entities->user_mentions);
          inserta_registro($registro,$link); 
        }
        echo "</table>";
      }
      ?>
      </pre>
  </body>
</html>