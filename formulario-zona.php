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
        
        <link href="css/style.css" media="screen" rel="stylesheet">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

            
        
    </head> 

    </html>
        

    <title> Carga de Zonas </title>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
        <link rel="stylesheet" type="text/css" href="flatpickr.css">
        
    </head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
    <body style="background-color: #c4d4e9;">
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
        <div class="container" style="padding: 0px; float: left; width: 25%;">
            <div id="login" style="padding-bottom: 15px">
                <h1>Ingrese Código Postal</h1>
            
                
                <p>
                    <label for="codigopostal"> <b> Código Postal:</b>
                    <input type="number" name="codigopostal" id="codigopostal" class="input" value=""style="width: 62%"/></label>
                </p>
                
                
        <div style="float: left; width: 80%;">     </div> 
        <div style="padding: 60px; float: left; width: 5%;">
            <p class="submit">
            <input type="submit" name="a" id="search" class="button" value="Agregar" />   
            </p>
            <p class="submit">
                <input type="submit" name="a" id="search" class="button" value="Buscar" />
            </p>
            <p class="submit">
            <input type="submit" name="a" id="search" class="button" value="Eliminar" />
            </p>
            <p class="submit">
                <input type="submit" name="a" id="update" class="button" value="Modificar" />
            </p>
        </div>
    </form>
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
