<?php
include ('conexion.php');

$id=$_POST['id'];
$Nro=$_POST['Nro'];
$Autor=$_POST['Autor'];
$Titulo=$_POST['Titulo'];
$NroED=$_POST['NroED'];
$Editorial=$_POST['Editorial'];
$AnoEd=$_POST['AnoEd'];
$Origen=$_POST['Origen'];
$FechaIng=$_POST['FechaIng'];
$Procedencia=$_POST['Procedencia'];
$Observaciones=$_POST['Observaciones'];

$sql="UPDATE libros SET Nro='$Nro',Autor='$Autor', Titulo='$Titulo', NroED='$NroED', Editorial='$Editorial', AnoEd='$AnoEd', Origen='$Origen', FechaIng='$FechaIng', Procedencia='$Procedencia', Observaciones='$Observaciones' WHERE id=$id";
$result=mysqli_query($conex,$sql);

if(mysqli_affected_rows($conex)==0){
    echo "No se pudo actualizar";}

?>
<script>
document.location.href="listadoLibro.php?";
alert('ACTUALIZADO EXITOSAMENTE')
</script>
