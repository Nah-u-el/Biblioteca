<?php
include ('conexion.php');

$Nro=$_POST['Nro'];
$Nombre=$_POST['Nombre'];
$Marca=$_POST['Marca'];
$Edad=$_POST['Edad'];
$FechIng=$_POST['FechIng'];
$Observaciones=$_POST['Observaciones'];

$sql="INSERT INTO juegos(Nro, Nombre, Marca, Edad, FechIng, Observaciones) VALUES ('$Nro','$Nombre', '$Marca', '$Edad', '$FechIng', '$Observaciones')";

$verificar=mysqli_query($conex, "SELECT * FROM juegos WHERE Nro='$Nro'");

if (mysqli_num_rows($verificar) > 0){
    echo '
    <script>
    alert("Juego existente");
    document.location.href="listadoJuego.php?"
    </script>
    ';
    exit();
}

$result=mysqli_query($conex,$sql);

if ($result){
    echo '
    <script>
    document.location.href="listadoJuego.php?"
    alert("AGREGADO EXITOSAMENTE")
    </script>
    ';
} else{?>

<script>
    alert("Error");
    document.location.href="listadoJuego.php?"
</script>

<?php
}
?>