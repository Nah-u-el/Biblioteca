<?php
include ('conexion.php');

$Nro=$_POST['Nro'];
$Titulo=$_POST['Titulo'];
$Responsable=$_POST['Responsable'];
$Coleccion=$_POST['Coleccion'];
$Duracion=$_POST['Duracion'];
$MatCompl=$_POST['MatCompl'];
$Idioma=$_POST['Idioma'];
$AnoEd=$_POST['AnoEd'];
$Soporte=$_POST['Soporte'];
$FechaIng=$_POST['FechaIng'];
$Procedencia=$_POST['Procedencia'];
$Observaciones=$_POST['Observaciones'];

$sql="INSERT INTO multimedia(`Nro`, `Titulo`, `Responsable`, `Coleccion`, `Duracion`, `MatCompl`, `Idioma`, `AnoEd`, `Soporte`, `FechaIng`, `Procedencia`, `Observaciones`)
VALUES ('$Nro','$Titulo','$Responsable','$Coleccion','$Duracion','$MatCompl','$Idioma','$AnoEd', '$Soporte','$FechaIng','$Procedencia','$Observaciones')";

$verificar=mysqli_query($conex, "SELECT * FROM multimedia WHERE Nro='$Nro'");

if (mysqli_num_rows($verificar) > 0){
    echo '
    <script>
    alert("Video existente");
    document.location.href="listadoVideo.php?"
    </script>
    ';
    exit();
}

$result=mysqli_query($conex,$sql);

if ($result){
    echo '
    <script>
    document.location.href="listadoVideo.php?";
    alert("AGREGADO EXITOSAMENTE")
    </script>
    ';
} else{?>

<script>
    alert("Error");
    document.location.href="listadoVideo.php?"
</script>

<?php
}
?>

