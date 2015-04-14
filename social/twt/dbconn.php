<?php
$link = new mysqli("198.38.82.101","parceh_mfc","dianna98","parceh_mfc");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}