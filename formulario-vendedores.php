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
        

    <title> Carga de Vendedores </title>

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
        if(isset($_POST['Nombre']))
        {
            $usuario = $_SESSION["usuario"];
            $contrasenia = $_SESSION["contrasenia"];
            $nombre = $_POST['Nombre'];
            $DNI = $_POST['DNI'];
            $antiguedad = $_POST['Antiguedad'];
            if ($DNI < 100000000 && $DNI > 999999)
            {
                $buscar = "INSERT INTO usuarios (Nombre, usuario, contrasenia, DNI, Antiguedad) values ('$nombre', '$usuario', '$contrasenia', $DNI, '$antiguedad')";
                $x = $conn -> query($buscar);
                if($x === true)
                {
                    $mensaje = "Vendedor ingresado correctamente";
                }
                else
                {
                    $mensaje = "Vendedor ingresado incorrectamente";
                }
            }
            else
            {
                $mensaje = "DNI ingresado de manera erronea";
            }
            echo $mensaje;
            $_POST['Nombre'] = null;
        }
        if(isset($_POST['dni']))
        {
            $usuario = $_POST["Usuario"];
            $contrasenia = $_POST["Contraseña"];
            $nombre = $_POST['nombre'];
            $DNI = $_POST['dni'];
            $no = "SELECT Nombre, Antiguedad, DNI, ID FROM usuarios WHERE usuario = '$_SESSION[usuario]' AND contrasenia = '$_SESSION[contrasenia]'";
            $tas = $conn -> query($no);
            $sinotas = $tas ->fetch_array();
            if(empty($usuario) == true)
            {
                $usuario = $_SESSION["usuario"];
            }
            if(empty($constrasenia) == true)
            {
                $contrasenia = $_SESSION["contrasenia"];
            }
            if(empty($nombre) == true)
            {
                $nombre = $sinotas[0];
            }
            if(empty($antiguedad) == true)
            {
                $antiguedad = $sinotas[1];
            }
            if(empty($DNI) == true)
            {
                $DNI = $sinotas[2];
            }
            if ($DNI < 100000000 && $DNI > 999999)
            {
                $actua = "UPDATE usuarios set Nombre = '$nombre', Antiguedad = '$antiguedad', DNI = $DNI, Usuario = '$usuario', Contrasenia = '$contrasenia' where ID = $sinotas[3]";
                $lizacion = $conn -> query($actua);
                if($lizacion === true)
                {
                    $mensaje = "Vendedor modificado correctamente";
                }
                else
                {
                    $mensaje = "Vendedor modificado incorrectamente";
                }
            }
            else
            {
                $mensaje = "DNI ingresado de manera erronea";
            }
            echo $mensaje;
            $_POST['dni'] = null;
        }
        ?>
    <h1 class="titulo"> <center> ~ Carga de Vendedores ~ </center></h1>
    
    <div style="padding: 0px; float: left; width: 100%;">
        <br>
        
    </div>

    <form name="formulario" id="formulario" method="post" action = "formulario.php">
        <div style="padding: 0px; float: left; width: 1%;">
            <label for="nada"><b> &nbsp </b><br />
        </div>
        <?php
        if(isset($_POST['Nombre']))
        {
        echo $mensaje;
        }
        ?>
        <div class="container" style="padding: 0px; float: left; width: 25%;">
            <div id="login" style="padding-bottom: 15px">
                <h1>Datos del Vendedor</h1>
            
                
                <p>
                    <label for="usuario"> <b> Usuario:</b>
                    <input type="text" name="usuario" id="usuario" class="input" value="" size="20" style="width: 62%"/></label>
                </p>
                <p>
                    <label for="contrasenia"><b>Contraseña: </b>
                    <input type="text" name="contrasenia" id="contrasenia" class="input" value="" size="20" style="width: 62%" /></label>
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
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $buscar= "SELECT count(*) FROM usuarios WHERE usuario = '$usuario' AND contrasenia= '$contrasenia'";
    $x = $conn -> query($buscar);
    $var = $x -> fetch_array();
    switch($opcion)
    {
        case "Agregar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT ID, Nombre, Antiguedad, DNI FROM usuarios WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    echo "Vendedor ya ingresado.";
                    echo "Vendedor  $sinotas[ID]";
                    echo "Nombre: $sinotas[Nombre]";
                    echo "DNI: $sinotas[DNI]";
                    echo "Antiguedad: $sinotas[Antiguedad]";
                    ?>
                    <li><a href = "formulario.php">Ingresar otro vendedor</a>
                    <?php
                    }
                    else
                    {
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["contrasenia"] = $contrasenia;
                        ?>
                        <form name="registerform" id="ingreso" action="formulario.php" method="post">
                                    <label for="Nombre"> <b> Nombre:</b>
                                    <input type="text" name="Nombre" id="Nombre" class="input" value=""/></label>
                                    <label for="DNI"> <b> DNI:</b>
                                    <input type="number" name="DNI" id="DNI" class="input" value=""/></label>
                                    <label for="Antiguedad"> <b> Antiguedad:</b>
                                    <input type="text" name="Antiguedad" id="Antiguedad" class="input" value=""/></label>
                                    <button type="submit" >Ingresar Vendedor</button>
                    </form>
                    <?php
                }

                break;
            }
        case "Buscar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT ID, Nombre, Antiguedad, DNI FROM usuarios WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    echo "Vendedor  $sinotas[ID]";
                    echo "Nombre: $sinotas[Nombre]";
                    echo "DNI: $sinotas[DNI]";
                    echo "Antiguedad: $sinotas[Antiguedad]";
                }
                else
                {
                    echo "Usuario no existente en el sistema";
                }
                ?>
                    <li><a href = "formulario.php">Ingresar otro vendedor</a>
                    <?php
                break;
            }
            case "Eliminar":
                {
                    if(empty($var[0]) == false)
                    {
                        $no = "DELETE FROM usuarios WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
                        $tas = $conn -> query($no);
                        echo "Vendedor eliminado";
                    }
                    else
                    {
                        echo "Usuario no existente en el sistema";
                    }
                    ?>
                    <li><a href = "formulario.php">Ingresar otro vendedor</a>
                    <?php
                    break;
                }
        case "Modificar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT ID, Nombre, Antiguedad, DNI FROM usuarios WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["contrasenia"] = $contrasenia;
                    ?>
                    <form name="registerform" id="ingreso" action="formulario.php" method="post">
                    <label for="Nombre"> <b> Nombre:</b>
                    <input type="text" name="nombre" id="Nombre" placeholder = "<?php echo $sinotas[1]?>"class="input" value=""/></label>
                    <label for="DNI"> <b> DNI:</b>
                    <input type="number" name="dni" id="DNI" placeholder = "<?php echo $sinotas[3]?>" class="input" value=""/></label>
                    <label for="Antiguedad"> <b> Antiguedad:</b>
                    <input type="text" name="Antiguedad" id="Antiguedad" placeholder = "<?php echo $sinotas[2]?>" class="input" value=""/></label>
                    <label for="Antiguedad"> <b> Usuario:</b>
                    <input type="text" name="Usuario" id="Usuario" placeholder = "<?php echo $usuario?>" class="input" value=""/></label>
                    <label for="Antiguedad"> <b> Contraseña:</b>
                    <input type="text" name="Contraseña" id="Contraseña" placeholder = "<?php echo $contrasenia?>" class="input" value=""/></label>
                    <button type="submit" >Ingresar Vendedor</button>
                    </form>
                    <?php
                }
                else
                {
                    echo "Usuario no existente en el sistema";
                }
                ?>
                    <li><a href = "formulario.php">Ingresar otro vendedor</a>
                <?php
                break;
            }
    }
}