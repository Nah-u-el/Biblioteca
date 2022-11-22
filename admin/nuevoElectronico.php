<?php
session_start();
if ($_SESSION['s_usuario']!=""){
$_SESSION['s_usuario'];
}else{
 header('location: ../login/index.php');
}
?>

<?php
include ('conexion.php');
$libros="SELECT id FROM libros ORDER BY id";
$cLibros=mysqli_query($conex,$libros);
$rowLibros=mysqli_num_rows($cLibros);

$multimedia="SELECT id FROM multimedia ORDER BY id";
$cMultimedia=mysqli_query($conex,$multimedia);
$rowMultimedia=mysqli_num_rows($cMultimedia);

$juego="SELECT id FROM juegos ORDER BY id";
$cJuego=mysqli_query($conex,$juego);
$rowJuego=mysqli_num_rows($cJuego);

$electro="SELECT id FROM electronicos ORDER BY id";
$cElectro=mysqli_query($conex,$electro);
$rowElectro=mysqli_num_rows($cElectro);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="estilo.css" />
    <title>Biblioteca 2022</title>
    <link rel="shortcut icon" href="img/loguitoKawai.png" type="image/x-icon">
</head>

<script type="text/javascript">
	function sololetras(e){
	  key = e.keyCode || e.which;
	  tecla = String.fromCharCode(key).toString();
	  letras ="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZÁáÉéÍíÓóÚú /()1234567890-+";
	  especiales = [8,13];
	  tecla_especial= false;
	  for (var i in especiales){
		if (key == especiales[i]){
		  tecla_especial = true;
		  break;
		}
	  }
  
	  if(letras.indexOf(tecla) == -1 && !tecla_especial){
		alert('Ingresar solo letras');
		return false;
	  }
	}
</script>

<script type="text/javascript">
	function solonumeros(e){
	  key = e.keyCode || e.which;
	  tecla = String.fromCharCode(key).toString();
	  letras ="1234567890";
	  especiales = [8,13];
	  tecla_especial= false;
	  for (var i in especiales){
		if (key == especiales[i]){
		  tecla_especial = true;
		  break;
		}
	  }
  
	  if(letras.indexOf(tecla) == -1 && !tecla_especial){
		alert('Ingresar solo numeros');
		return false;
	  }
	}
</script>

<body>
<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <img src="img/loguitoKawai.png"></img>Biblioteca</div>
            <div class="list-group list-group-flush my-3">
                <a href="listadolibro.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-book-open me-2"></i>Libreria</a>

                <a href="listadoVideo.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-photo-video me-2"></i>Multimedia</a>

                <a href="listadoJuego.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-gamepad me-2"></i>Juegos</a>

                <a href="listadoElectronico.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-bolt me-2"></i>Electronicos</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="bg-dark" id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 primary-text">Electronicos</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form name="form1" action="buscarElectronico.php" method="post">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link second-text fw-bold">
                                        <input type="text" name="Nombre" id="Nombre" class="form-control form-control-lg" type="search" placeholder="Busca un Nombre..." aria-label="Search">
                                    </a>
                                <li class="nav-item dropdown">
                                    <a class="nav-link second-text fw-bold">
                                        <input name="botonBuscar" value="Buscar" class="btn btn-lg btn-outline-success" type="submit"></input>
                                    </a>
                                </li>
                            </ul>
                    </form>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-danger fw-bold" href="../login/bd/logout.php">
                                    <i class="fas fa-power-off me-1"></i>Salir</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <a href="listadolibro.php">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded border border-success">
                            <div>
                                <h3 class="fs-2"><?php echo $rowLibros ?></h3>
                                <p class="fs-5">Total Libros</p>
                            </div>
                            <i class="fas fa-book-open fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="listadovideo.php">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded border border-success">
                            <div>
                                <h3 class="fs-2"><?php echo $rowMultimedia ?></h3>
                                <p class="fs-5">Total Multimedia</p>
                            </div>
                            <i
                                class="fas fa-photo-video fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="listadoJuego.php">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded border border-success">
                            <div>
                                <h3 class="fs-2"><?php echo $rowJuego ?></h3>
                                <p class="fs-5">Total Juegos</p>
                            </div>
                            <i class="fas fa-gamepad fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="listadoElectronico.php">
                        <div class="p-3 bg-white shadow-lg d-flex justify-content-around align-items-center rounded border border-success">
                            <div>
                                <h3 class="fs-2"><?php echo $rowElectro ?></h3>
                                <p class="fs-5">Total Electronicos</p>
                            </div>
                            <i class="fas fa-bolt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                        </a>
                    </div>
                </div>

                <div class="row my-5">
                <h3 class="fs-4 mb-3">Listado
                    <a href="listadoElectronico.php" class="btn btn-info btn-md my-2 my-sm-0 ml-3 derecha">Volver</a> 
                </h3>                   
                    <div class="col" id="ancho">
                    <form action="guardarElectronico.php" method="POST">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                <th scope="col" width="50">#ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidades</th>
                                    <th scope="col">Fecha de Ingreso</th>
                                    <th scope="col">Observaciones</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row"><input class="form-control me-2" type="number" name="id" value="<?php echo $fila['id']; ?>" readonly /></th>
                                    <td scope="row"><input class="form-control me-2" type="varchar" onkeypress="return sololetras(event)" onpaste="return false" name="Nombre" placeholder="Ingrese Nombre" required/></td>
                                    <td scope="row"><input class="form-control me-2" type="varchar" onkeypress="return solonumeros(event)" onpaste="return false" name="Cantidades" placeholder="Ingrese Cantidades" required/></td>
                                    <td scope="row"><input class="form-control me-2" type="date" name="fecha_ingreso" placeholder="Ingrese Fecha" required/></td>
                                    <td scope="row"><input class="form-control me-2" type="varchar" name="Observaciones" placeholder="Ingrese Observaciones" required/></td>
                                    
                                   
                                    
                                    <td class="acciones">
                                    <input type="submit" name="botonAceptar" value="Aceptar" class="btn btn-success btn-md my-2 my-sm-0 ml-3"></input>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>