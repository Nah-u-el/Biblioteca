<?php
include ('conexion.php');

$id=$_POST['id'];
$Nombre=$_POST['Nombre'];
$Cantidades=$_POST['Cantidades'];
$Observaciones=$_POST['Observaciones'];
$fecha_ingreso=$_POST['fecha_ingreso'];

$sql="UPDATE electronicos SET Nombre='$Nombre', Cantidades='$Cantidades', Observaciones='$Observaciones', fecha_ingreso='$fecha_ingreso' WHERE id=$id";
$result=mysqli_query($conex,$sql);

if(mysqli_affected_rows($conex)==0){
    echo "No se pudo actualizar";}

?>
<script>
document.location.href="listadoElectronico.php?";
alert('ACTUALIZADO EXITOSAMENTE')
</script>
