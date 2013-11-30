<?php
$n1 = 1;
$n2 = 0;
function fibonnacci($n){
 for($i=1; $i<=$n; $i++){
  $op = $n1 + $n2;
  $n2 = $op;
  echo $op." "; 
 }
}
?>