<?php
function esprimo($n){
    if($n == 1)
        return "No es primo";
    elseif ($n == 2)
        return "Es primo";
    else{
        for($i=2; $i<=$n; $i++){
            if(($n % $i) == 0){
                $c++;
            }
        }
        if($c == 2 ){
           echo "true";
        } else {
           echo "false"; 
        }
    }
}
?>