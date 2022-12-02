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
        

    <title> Carga de telefonos de usuarios </title>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
        <link rel="stylesheet" type="text/css" href="flatpickr.css">
        
    </head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <body style="background-color: #2b1d42;">
    <div style="padding: 0px; float: left; width: 100%;">
        <br>
    </div>
    <?php
    if(!isset($_POST['a']))
    {
        if(isset($_POST['usuario']))
        {
            $numtele = $_SESSION["numtele"];
            $usuario = $_POST['usuario'];
            
            if ($numtele < 99999999999)
            {
                $buscar = "INSERT INTO telefono_usuarios (usuario, numtele) values ('$usuario', '$numtele')";
                $x = $conn -> query($buscar);
                if($x === true)
                {
                    $mensaje = "Telefono ingresado correctamente";
                }
                else
                {
                    $mensaje = "Telefono ingresado incorrectamente";
                }
            }
            else
            {
                $mensaje = "Código Postal ingresado de manera erronea";
            }
            echo $mensaje;
            $_POST['usuario'] = null;
        }
        if(isset($_POST['numtele']))
        {
            $usuario = $_POST["usuario"];
          
            $numtele = $_POST['numtele'];
            $no = "SELECT usuario FROM telefono_usuarios WHERE numtele = '$_SESSION[numtele]' ";
            $tas = $conn -> query($no);
            $sinotas = $tas ->fetch_array();
            if(empty($usuario) == true)
            {
                $numtele = $_SESSION["numtele"];
            }
            
            if(empty($usuario) == true)
            {
                $usuario = $sinotas[1];
            }
            
            if ($numtele < 1000000 )
            {
                $actua = "UPDATE telefono_usuarios set usuario = '$usuario', numtele = '$numtele' where numtele = $sinotas[3]";
                $lizacion = $conn -> query($actua);
                if($lizacion === true)
                {
                    $mensaje = "Telefono modificado correctamente";
                }
                else
                {
                    $mensaje = "Telefono modificado incorrectamente";
                }
            }
            else
            {
                $mensaje = "Numero de telefono ingresado de manera erronea";
            }
            echo $mensaje;
            $_POST['numtele'] = null;
        }
        ?>
    <h1 class="titulo"> <center> ~ Carga de telefonos de usuarios ~ </center></h1>
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

    <form name="formulario" id="formulario" method="post" action = "formulario-telefono-usuarios.php">
        <div style="padding: 0px; float: left; width: 1%;">
            <label for="nada"><b> &nbsp </b><br />
        </div>
        <?php
        if(isset($_POST['usuario']))
        {
        echo $mensaje;
        }
        ?>
        <div class="container">
            <div id="login" class="datos">
                <h1>Ingrese numero de telefono del usuario</h1>
                <p>
                    <div class="form-floating mb-3">
                        <input type="number" name="numtele" id="usuario" class="input form-control" value="" size="20" placeholder="name@example.com"/>
                        <label for="numtele">Telefono</label>
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
    $numtele = $_POST['numtele'];
    
    $buscar= "SELECT count(*) FROM telefono_usuarios WHERE numtele = '$numtele'";
    $x = $conn -> query($buscar);
    $var = $x -> fetch_array();
    switch($opcion)
    {
        case "Agregar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT usuario, numtele FROM telefono_usuarios WHERE numtele = '$numtele'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    echo "Telefono ya ingresado.";
                    
                    echo "usuario: $sinotas[usuario]";
                   
                    ?>
                    <li><a href = "formulario-telefono-usuarios.php">Ingresar otro telefono</a>
                    <?php
                    }
                    else
                    {
                        $_SESSION["numtele"] = $numtele;
                      
                        ?>
                        <form name="registerform" id="ingreso" action="formulario-telefono-usuarios.php" method="post">
                                    <label for="usuario"> <b> Usuario:</b>
                                    <input type="text" name="usuario" id="usuario" class="input" value=""/></label>
                                    <button type="submit" >Ingresar telefono</button>
                    </form>
                    <?php
                }

                break;
            }
        case "Buscar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT usuario FROM telefono_usuarios WHERE numtele = '$numtele'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    echo "usuario: $sinotas[usuario]";
                    
                }
                else
                {
                    echo "Telefono no existente en el sistema";
                }
                ?>
                    <li><a href = "formulario-telefono-usuarios.php">Ingresar otro telefono</a>
                    <?php
                break;
            }
            case "Eliminar":
                {
                    if(empty($var[0]) == false)
                    {
                        $no = "DELETE FROM telefono_usuarios WHERE numtele = '$numtele'";
                        $tas = $conn -> query($no);
                        echo "Telefono eliminado";
                    }
                    else
                    {
                        echo "Telefono no existente en el sistema";
                    }
                    ?>
                    <li><a href = "formulario-telefono-usuarios.php">Ingresar otro telefono</a>
                    <?php
                    break;
                }
        case "Modificar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT usuario FROM telefono_usuarios WHERE numtele = '$numtele'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    $_SESSION["numtele"] = $numtele;
                   
                    ?>
                    <form name="registerform" id="ingreso" action="formulario-telefono-usuarios.php" method="post">
                    <label for="numtele"> <b> Numero de telefono</b>
                    <input type="number" name="numtele" id="numtele" placeholder = "<?php echo $numtele?>" class="input" value=""/></label>
                    <label for="usuario"> <b> usuario telefono:</b>
                    <input type="text" name="usuario" id="usuario" placeholder = "<?php echo $sinotas[1]?>" class="input" value=""/></label>
                    <button type="submit" >Ingresar telefono</button>
                    </form>
                    <?php
                }
                else
                {
                    echo "Telefono no existente en el sistema";
                }
                ?>
                    <li><a href = "formulario-telefono-usuarios.php">Ingresar otro telefono</a>
                <?php
                break;
            }
    }
}
