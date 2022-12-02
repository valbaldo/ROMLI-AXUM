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
        

    <title> Carga de telefonos de usuarios </title>

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
        <div class="container" style="padding: 0px; float: left; width: 25%;">
            <div id="login" style="padding-bottom: 15px">
                <h1>Ingrese numero de telefono del usuario</h1>
            
                
                <p>
                    <label for="numtele"> <b> Telefono:</b>
                    <input type="number" name="numtele" id="numtele" class="input" value=""style="width: 62%"/></label>
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
