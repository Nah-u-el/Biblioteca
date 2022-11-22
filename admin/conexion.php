<?php
$conex=mysqli_connect("localhost","root","","completo");
If  (!$conex){
echo "Error: No se pudo conectar a la base de datos ";
exit;
}
mysqli_set_charset($conex, 'utf8');
?>
