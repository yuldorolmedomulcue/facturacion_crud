<?php

//conectar a mysql | mysqli_connect() ya no se usa
$conn = mysqli_connect('localhost', 'root', '', 'facturacion_crud');
//Probar conexion
if(mysqli_connect_errno()){
    echo "Fallo la conexion a mysqli".mysqli_connect_errno();
} //else {
//     echo "Conectado correctamente";
// }

?>