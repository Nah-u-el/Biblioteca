<?php
include ('conexion.php');

$id=$_POST['id'];
$Nro=$_POST['Nro'];
$Nombre=$_POST['Nombre'];
$Marca=$_POST['Marca'];
$Edad=$_POST['Edad'];
$FechIng=$_POST['FechIng'];
$Observaciones=$_POST['Observaciones'];

$sql="UPDATE juegos SET Nro='$Nro',Nombre='$Nombre', Marca='$Marca', Edad='$Edad', FechIng='$FechIng', Observaciones='$Observaciones' WHERE id=$id";
$result=mysqli_query($conex,$sql);

if(mysqli_affected_rows($conex)==0){
    echo "No se pudo actualizar";}

?>
<script>
document.location.href="listadoJuego.php?";
alert('ACTUALIZADO EXITOSAMENTE')
</script>
