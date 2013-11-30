<?php
function fizzbuzz($njugadores){
 
for($i=1; $i<=$njugadores; $i++){
   if(($i % 3) == 0 ) { 
     echo "Fizz-";
   }
   elseif(($i % 5) == 0){ 
     echo "buzz-";
   }
   else{ 
     echo $i."-";
   } 
 }
}
?>
