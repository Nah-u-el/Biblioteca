<?php
include ('conexion.php');

$Nombre=$_POST['Nombre'];
$Cantidades=$_POST['Cantidades'];
$Observaciones=$_POST['Observaciones'];
$fecha_ingreso=$_POST['fecha_ingreso'];

$sql="INSERT INTO electronicos(Nombre, Cantidades, Observaciones, fecha_ingreso) VALUES ('$Nombre', '$Cantidades', '$Observaciones', '$fecha_ingreso')";

$verificar=mysqli_query($conex, "SELECT * FROM electronicos WHERE Nombre='$Nombre'");

if (mysqli_num_rows($verificar) > 0){
    echo '
    <script>
    alert("Electronico existente");
    document.location.href="listadoElectronico.php?"
    </script>
    ';
    exit();
}

$result=mysqli_query($conex,$sql);

if ($result){
    echo '
    <script>
    document.location.href="listadoElectronico.php?"
    alert("AGREGADO EXITOSAMENTE")
    </script>
    ';
} else{?>

<script>
    alert("Error");
    document.location.href="listadoElectronico.php?"
</script>

<?php
}
?>