<?php
function traducir($cadena, $code){
  $num = explode(" ", $code);
  $str = "";

  foreach($num as $cod){
   $str.= substr($cadena, $cod-1,1);
  }

  return $str;
}

$cad="osSE5Gu0Vi8WRq93UvkYZCjaOKeNJfTyH6tzDQbxFm4M1ndXIPh27wBA rLclpg";
$des="3 35 27 62 51 27 46 57 26 10 46 63 57 45 15 43 53";
echo traducir($cad, $des)."<br/>";

$cad="3Kucdq9bfCEgZGF2nwx8UpzQJyHiOm0hoaYP6ST1WM7Nks5XjrR4IltBeDLV vA";
$des="2 26 33 55 34 50 33 61 44 28 46 32 28 30 3 50 34 61 40 7 1 31";
echo traducir($cad, $des);

?>