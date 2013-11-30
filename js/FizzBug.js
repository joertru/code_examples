function fizzbuzz(n){
  for(i=1; i<=n; i){
   if((i % 3) == 0 ) { 
     document.write("Fizz-");
   }
   elseif((i % 5) == 0){ 
     document.write("buzz-");
   }
   else{ 
     document.write(i + "-");
   } 
 }
}