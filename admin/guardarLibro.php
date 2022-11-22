<?php
include ('conexion.php');

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

$sql="INSERT INTO libros(`Nro`, `Autor`, `Titulo`, `NroED`, `Editorial`, `Origen`, `AnoEd`, `FechaIng`, `Procedencia`, `Observaciones`) VALUES ('$Nro','$Autor', '$Titulo', '$NroED', '$Editorial', '$AnoEd', '$Origen', '$FechaIng', '$Procedencia', '$Observaciones')";

$verificar=mysqli_query($conex, "SELECT * FROM libros WHERE Nro='$Nro'");

if (mysqli_num_rows($verificar) > 0){
    echo '
    <script>
    alert("Libro existente");
    document.location.href="listadoLibro.php?"
    </script>
    ';
    exit();
}

$result=mysqli_query($conex,$sql);

if ($result){
    echo '
    <script>
    document.location.href="listadoLibro.php?"
    alert("AGREGADO EXITOSAMENTE")
    </script>
    ';
} else{?>

<script>
    alert("Error");
    document.location.href="listadoLibro.php?"
</script>

<?php
}
?>
