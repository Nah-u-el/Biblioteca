<?php
include ('conexion.php');
$id=$_POST['id'];
$Nro=$_POST['Nro'];
$Titulo=$_POST['Titulo'];
$Responsable=$_POST['Responsable'];
$Coleccion=$_POST['Coleccion'];
$Duracion=$_POST['Duracion'];
$Color=$_POST['Color'];
$MatCompl=$_POST['MatCompl'];
$Idioma=$_POST['Idioma'];
$AnoEd=$_POST['AnoEd'];
$Soporte=$_POST['Soporte'];
$Origen=$_POST['Origen'];
$FechaIng=$_POST['FechaIng'];
$Procedencia=$_POST['Procedencia'];
$Observaciones=$_POST['Observaciones'];


$sql="UPDATE multimedia SET `Nro`='$Nro',`Titulo`='$Titulo', Responsable='$Responsable', Coleccion='$Coleccion',
Duracion='$Duracion', Color='$Color', MatCompl='$MatCompl', Idioma='$Idioma', AnoEd='$AnoEd', `Soporte`='$Soporte', Origen='$Origen', FechaIng='$FechaIng', Procedencia='$Procedencia', Observaciones='$Observaciones'  WHERE id='$id'";
$result=mysqli_query($conex,$sql);
if(mysqli_affected_rows($conex)==0){
  echo "No se puede actualizar";
}
 ?>
<script>
 document.location.href="listadoVideo.php?";
 alert('ACTUALIZADO EXITOSAMENTE')
 </script>
