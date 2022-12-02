<?php
include("conexion.php");
if(!isset($_SESSION))
{
    session_start();
}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>


            
        
    </head> 

    </html>
        

    <title> Carga de Zonas </title>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
        <link rel="stylesheet" type="text/css" href="flatpickr.css">
        
    </head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <body style="background-color: #2b1d42;;">
    <div style="padding: 0px; float: left; width: 100%;">
        <br>
    </div>
    <?php
    if(!isset($_POST['a']))
    {
        if(isset($_POST['nombre']))
        {
            $codigopostal = $_SESSION["codigopostal"];
            $nombre = $_POST['nombre'];
            
            if ($codigopostal < 100000)
            {
                $buscar = "INSERT INTO zona (nombre, codigopostal) values ('$nombre', '$codigopostal')";
                $x = $conn -> query($buscar);
                if($x === true)
                {
                    $mensaje = "Zona ingresada correctamente";
                }
                else
                {
                    $mensaje = "Zona ingresada incorrectamente";
                }
            }
            else
            {
                $mensaje = "Código Postal ingresado de manera erronea";
            }
            echo $mensaje;
            $_POST['nombre'] = null;
        }
        if(isset($_POST['codigopostal']))
        {
            $nombre = $_POST["nombre"];
          
            $codigopostal = $_POST['codigopostal'];
            $no = "SELECT nombre FROM zona WHERE codigopostal = '$_SESSION[codigopostal]' ";
            $tas = $conn -> query($no);
            $sinotas = $tas ->fetch_array();
            if(empty($usuario) == true)
            {
                $codigopostal = $_SESSION["codigopostal"];
            }
            
            if(empty($nombre) == true)
            {
                $nombre = $sinotas[1];
            }
            
            if ($codigopostal < 1000000 )
            {
                $actua = "UPDATE zona set nombre = '$nombre', codigopostal = '$codigopostal' where codigopostal = $sinotas[3]";
                $lizacion = $conn -> query($actua);
                if($lizacion === true)
                {
                    $mensaje = "Zona modificada correctamente";
                }
                else
                {
                    $mensaje = "Zona modificada incorrectamente";
                }
            }
            else
            {
                $mensaje = "Codigo Postal ingresado de manera erronea";
            }
            echo $mensaje;
            $_POST['codigopostal'] = null;
        }
        ?>
    <h1 class="titulo"> <center> ~ Carga de Zonas ~ </center></h1>
    <header class="sticky-top">
			<nav class="navbar navbar-expand-lg navbar-light bg-nav" id="mainNav">
				<div class="container-fluid">
				    <a href="index.html">
						<img src="img/logo.svg" alt="logo de pagina" class="logo img-fluid">
					</a>
				    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				      <span class="navbar-toggler-icon"></span>
				    </button>
				    <div class="collapse navbar-collapse" id="navbarNav">
				      <ul class="navbar-nav ms-auto">
				        <li class="nav-item">
				          <a href="views/nosotros.html">Nosotros</a>
				        </li>
				        <li class="nav-item">
				          <a href="views/contacto.html">Contacto</a>
				        </li>
				      </ul>
				    </div>
				</div>
			</nav>
		</header>
    
    <div style="padding: 0px; float: left; width: 100%;">
        <br>
        
    </div>

    <form name="formulario" id="formulario" method="post" action = "formulario-zona.php">
        <div style="padding: 0px; float: left; width: 1%;">
            <label for="nada"><b> &nbsp </b><br />
        </div>
        <?php
        if(isset($_POST['nombre']))
        {
        echo $mensaje;
        }
        ?>
        <div class="container">
            <div id="login" class="datos">
                <h1>Ingrese Código Postal</h1>
            
                <p>
                    <div class="form-floating mb-3">
                        <input type="number" name="codigopostal" id="usuario" class="input form-control" value="" size="20" placeholder="name@example.com"/>
                        <label for="codigopostal">Codigo Postal</label>
                    </div>
                </p>
                
                
        <div style="float: left; width: 80%;">     </div> 
        <div class="contenedor">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col">
                    <p class="submit">
                    <input type="submit" name="a" id="bonton" class="btn btn-outline-primary" value="Agregar" />   
                    </p>
                    </div>
                    <div class="col">
                    <p class="submit">
                    <input type="submit" name="a" id="bonton" class="btn btn-outline-primary" value="Buscar" />
                    </p>
                    </div>
                    <div class="col">
                    <p class="submit">
                    <input type="submit" name="a" id="bonton" class="btn btn-outline-primary" value="Eliminar" />
                    </p>
                    </div>
                    <div class="col">
                    <p class="submit">
                    <input type="submit" name="a" id="bonton" class="btn btn-outline-primary" value="Modificar">
                    </p>
                    </div>
                </div>
            </div>  
            </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    <?php
}
else
{
    $opcion = $_POST['a'];
    $codigopostal = $_POST['codigopostal'];
    
    $buscar= "SELECT count(*) FROM zona WHERE codigopostal = '$codigopostal'";
    $x = $conn -> query($buscar);
    $var = $x -> fetch_array();
    switch($opcion)
    {
        case "Agregar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT nombre, codigopostal FROM zona WHERE codigopostal = '$codigopostal'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    echo "Zona ya ingresada.";
                    
                    echo "Nombre: $sinotas[nombre]";
                   
                    ?>
                    <li><a href = "formulario-zona.php">Ingresar otra zona</a>
                    <?php
                    }
                    else
                    {
                        $_SESSION["codigopostal"] = $codigopostal;
                      
                        ?>
                        <form name="registerform" id="ingreso" action="formulario-zona.php" method="post">
                                    <label for="nombre"> <b> Nombre:</b>
                                    <input type="text" name="nombre" id="nombre" class="input" value=""/></label>
                                    <button type="submit" >Ingresar Zona</button>
                    </form>
                    <?php
                }

                break;
            }
        case "Buscar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT nombre FROM zona WHERE codigopostal = '$codigopostal'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    echo "Nombre: $sinotas[nombre]";
                    
                }
                else
                {
                    echo "Zona no existente en el sistema";
                }
                ?>
                    <li><a href = "formulario-zona.php">Ingresar otra zona</a>
                    <?php
                break;
            }
            case "Eliminar":
                {
                    if(empty($var[0]) == false)
                    {
                        $no = "DELETE FROM zona WHERE codigopostal = '$codigopostal'";
                        $tas = $conn -> query($no);
                        echo "Zona eliminada";
                    }
                    else
                    {
                        echo "Zona no existente en el sistema";
                    }
                    ?>
                    <li><a href = "formulario-zona.php">Ingresar otra zona</a>
                    <?php
                    break;
                }
        case "Modificar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT nombre FROM zona WHERE codigopostal = '$codigopostal'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    $_SESSION["codigopostal"] = $codigopostal;
                   
                    ?>
                    <form name="registerform" id="ingreso" action="formulario-zona.php" method="post">
                    <label for="codigopostal"> <b> Código Postal:</b>
                    <input type="number" name="codigopostal" id="codigopostal" placeholder = "<?php echo $codigopostal?>" class="input" value=""/></label>
                    <label for="nombre"> <b> Nombre de zona:</b>
                    <input type="text" name="nombre" id="nombre" placeholder = "<?php echo $sinotas[1]?>" class="input" value=""/></label>
                    <button type="submit" >Ingresar Zona</button>
                    </form>
                    <?php
                }
                else
                {
                    echo "Zona no existente en el sistema";
                }
                ?>
                    <li><a href = "formulario-zona.php">Ingresar otra Zona</a>
                <?php
                break;
            }
    }
}
