<?php
include ('conexion.php');
$id=$_GET['id'];
$sql="DELETE FROM juegos WHERE id='$id'";
mysqli_query($conex,$sql);

if(mysqli_affected_rows($conex)==0){
    echo "<h2>ERROR! No se pudo eliminar</h2>";
} 
?>

<script>
document.location.href="listadoJuego.php?";
</script>