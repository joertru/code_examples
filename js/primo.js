function esprimo(n){
    if(n == 1){
        alert("No es primo");
    }
    else if (n == 2){
        alert("Es primo");
    else{
        for(i=2; i<=n; i++){
            if((n % i) == 0){
                c++;
            }
        }
        if(c == 2 ){
           alert("true");
        } else {
           alert("false"); 
        }
    }
}