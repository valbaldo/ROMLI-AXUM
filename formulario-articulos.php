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
        

    <title> Carga de Artículos </title>

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
        if(isset($_POST['descripcion2']))
        {
            $id_articulo = $_SESSION["id_articulo"];
            $descripcion = $_POST['descripcion2'];
            $costo = $_POST['costo'];
            $precio_produce = $_POST['precio_produce'];
            $idalmacen = $_POST['idalmacen'];
            $id_proveedor = $_POST['id_proveedor'];
            $stock = $_POST['stock'];
            $rubro = $_POST['rubro'];
            $subrubro = $_POST['subrubro'];
            $stock_seguridad = $_POST['stock_seguridad'];
            if ($id_articulo> 999)
            {
                $buscar = "INSERT INTO articulos (descripcion, costo, precio_produce, idalmacen, id_proveedor, stock, rubro, subrubro, id_articulo, stock_seguridad) values ('$descripcion', '$costo', '$precio_produce', '$idalmacen', '$id_proveedor', '$stock', '$rubro', '$subrubro', '$id_articulo', '$stock_seguridad')";
                $x = $conn -> query($buscar);
                if($x === true)
                {
                    $mensaje = "Artículo ingresado correctamente";
                }
                else
                {
                    $mensaje = "Artículo ingresado incorrectamente";
                }
            }
            else
            {
                $mensaje = "ID del Artículo ingresado de manera erronea";
            }
            echo $mensaje;
            $_POST['descripcion'] = null;
        }
        if(isset($_POST['id_articulo']))
        {
            $id_articulo = $_POST["id_articulo"];
            $descripcion = $_POST['descripcion'];
            $costo = $_POST['costo'];
            $precio_produce = $_POST['precio_produce'];
            $idalmacen = $_POST['idalmacen'];
            $id_proveedor = $_POST['id_proveedor'];
            $stock = $_POST['stock'];
            $rubro = $_POST['rubro'];
            $subrubro = $_POST['subrubro'];
            $stock_seguridad = $_POST['stock_seguridad'];
            $no = "SELECT descripcion, costo, precio_produce, idalmacen, id_proveedor, stock, rubro, subrubro, stock_seguridad, id_articulo FROM articulos WHERE id_articulo = '$_SESSION[id_articulo]'";
            $tas = $conn -> query($no);
            $sinotas = $tas ->fetch_array();
            if(empty($id_articulo) == true)
            {
                $id_articulo = $sinotas[9];
            }
            
            if(empty($descripcion) == true)
            {
                $descripcion = $sinotas[0];
            }
            if(empty($costo) == true)
            {
                $costo = $sinotas[1];
            }
            if(empty($precio_produce) == true)
            {
                $precio_produce = $sinotas[2];
            }
            if(empty($idalmacen) == true)
            {
                $idalmacen = $sinotas[3];
            }
            if(empty($id_proveedor) == true)
            {
                $id_proveedor = $sinotas[4];
            }
            if(empty($stock) == true)
            {
                $stock = $sinotas[5];
            }
            if(empty($rubro) == true)
            {
                $rubro = $sinotas[6];
            }
            if(empty($subrubro) == true)
            {
                $subrubro = $sinotas[7];
            }
            if(empty($stock_seguridad) == true)
            {
                $stock_seguridad = $sinotas[8];
            }

            if ($id_articulo>999)
            {
                $actua = "UPDATE articulos set descripcion = '$descripcion', costo = '$costo', precio_produce = '$precio_produce', idalmacen = '$idalmacen', id_proveedor = '$id_proveedor', stock = '$stock', rubro = '$rubro', subrubro = '$subrubro', stock_seguridad = '$stock_seguridad' where id_articulo = $sinotas[9]";
                $lizacion = $conn -> query($actua);
                if($lizacion === true)
                {
                    $mensaje = "Artículo modificado correctamente";
                }
                else
                {
                    $mensaje = "Artículo modificado incorrectamente";
                }
            }
            else
            {
                $mensaje = "ID del Artículo ingresado de manera erronea";
            }
            echo $mensaje;
            $_POST['descripcion'] = null;
        }
        ?>
    <h1 class="titulo"> <center> ~ Carga de Artículos ~ </center></h1>
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

    <form name="formulario" id="formulario" method="post" action = "formulario-articulos.php">
        <div style="padding: 0px; float: left; width: 1%;">
            <label for="nada"><b> &nbsp </b><br />
        </div>
        <?php
        if(isset($_POST['descripcion']))
        {
        echo $mensaje;
        }
        ?>
        <div class="container">
            <div id="login" class="datos">
                <h1>Datos del Artículo</h1>
            
                <p>
                    <div class="form-floating mb-3">
                        <input type="text" name="id_articulo" id="usuario" class="input form-control" value="" size="20" placeholder="name@example.com"/>
                        <label for="id_articulo">ID del Artículo</label>
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
    $id_articulo = $_POST['id_articulo'];
    $buscar= "SELECT count(*) FROM articulos WHERE id_articulo = '$id_articulo'";
    $x = $conn -> query($buscar);
    $var = $x -> fetch_array();
    switch($opcion)
    {
        case "Agregar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT descripcion, costo, precio_produce, idalmacen, id_proveedor, stock, rubro, subrubro, stock_seguridad, id_articulo FROM articulos WHERE id_articulo = '$id_articulo'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    echo "Artículo ya ingresado.";
                    echo "ID del Artículo  $sinotas[id_articulo]";
                    echo "Descripción: $sinotas[descripcion]";
                    echo "Precio: $sinotas[costo]";
                    echo "Precio de Producción: $sinotas[precio_produce]";
                    echo "ID del Almacén:  $sinotas[idalmacen]";
                    echo "ID del Proveedor: $sinotas[id_proveedor]";
                    echo "Stock: $sinotas[stock]";
                    echo "Rubro: $sinotas[rubro]";
                    echo "Subrubro: $sinotas[subrubro]";
                    echo "Stock de Seguridad: $sinotas[stock_seguridad]";
                    ?>
                    <li><a href = "formulario-articulos.php">Ingresar otro Artículo</a>
                    <?php
                    }
                    else
                    {
                        $_SESSION["id_articulo"] = $id_articulo;
                        ?>
                        <form name="registerform" id="ingreso" action="formulario-articulos.php" method="post">
                                    <label for="descripcion2"> <b> Descripción del Artículo:</b>
                                    <input type="text" name="descripcion2" id="descripcion2" class="input" value=""/></label>
                                    <label for="costo"> <b> Precio del Artículo:</b>
                                    <input type="number" name="costo" id="costo" class="input" value=""/></label>
                                    <label for="precio_produce"> <b> Precio de Producción:</b>
                                    <input type="number" name="precio_produce" id="precio_produce" class="input" value=""/></label>
                                    <label for="idalmacen"> <b> ID del Almacen:</b>
                                    <input type="number" name="idalmacen" id="idalmacen" class="input" value=""/></label>
                                    <label for="id_proveedor"> <b> ID del Proveedor:</b>
                                    <input type="number" name="id_proveedor" id="id_proveedor" class="input" value=""/></label>
                                    <label for="stock"> <b> Stock:</b>
                                    <input type="number" name="stock" id="stock" class="input" value=""/></label>
                                    <label for="rubro"> <b> Rubro:</b>
                                    <input type="text" name="rubro" id="rubro" class="input" value=""/></label>
                                    <label for="subrubro"> <b> Subrubro:</b>
                                    <input type="text" name="subrubro" id="subrubro" class="input" value=""/></label>
                                    <label for="stock_seguridad"> <b> Stock de Seguridad:</b>
                                    <input type="number" name="stock_seguridad" id="stock_seguridad" class="input" value=""/></label>
                                    <button type="submit" >Ingresar Artículo</button>
                    </form>
                    <?php
                }

                break;
            }
        case "Buscar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT descripcion, costo, precio_produce, idalmacen, id_proveedor, stock, rubro, subrubro, stock_seguridad, id_articulo FROM articulos WHERE id_articulo = '$id_articulo'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    echo "ID del Artículo  $sinotas[id_articulo]";
                    echo "Descripción: $sinotas[descripcion]";
                    echo "Precio: $sinotas[costo]";
                    echo "Precio de Producción: $sinotas[precio_produce]";
                    echo "ID del Almacén:  $sinotas[idalmacen]";
                    echo "ID del Proveedor: $sinotas[id_proveedor]";
                    echo "Stock: $sinotas[stock]";
                    echo "Rubro: $sinotas[rubro]";
                    echo "Subrubro: $sinotas[subrubro]";
                    echo "Stock de Seguridad: $sinotas[stock_seguridad]";
                }
                else
                {
                    echo "Artículo no existente en el sistema";
                }
                ?>
                    <li><a href = "formulario-articulos.php">Ingresar otro Artículo</a>
                    <?php
                break;
            }
            case "Eliminar":
                {
                    if(empty($var[0]) == false)
                    {
                        $no = "DELETE FROM articulos WHERE id_articulo = '$id_articulo'";
                        $tas = $conn -> query($no);
                        echo "Artículo eliminado";
                    }
                    else
                    {
                        echo "Artículo no existente en el sistema";
                    }
                    ?>
                    <li><a href = "formulario-articulos.php">Ingresar otro artículo</a>
                    <?php
                    break;
                }
        case "Modificar":
            {
                if(empty($var[0]) == false)
                {
                    $no = "SELECT descripcion, costo, precio_produce, idalmacen, id_proveedor, stock, rubro, subrubro, stock_seguridad, id_articulo FROM articulos WHERE id_articulo = '$id_articulo'";
                    $tas = $conn -> query($no);
                    $sinotas = $tas ->fetch_array();
                    $_SESSION["id_articulo"] = $id_articulo;
                    ?>
                    <form name="registerform" id="ingreso" action="formulario-articulos.php" method="post">
                    <label for="descripcion"> <b> Descripción:</b>
                    <input type="text" name="descripcion" id="descripcion" placeholder = "<?php echo $sinotas[0]?>"class="input" value=""/></label>
                    <label for="costo"> <b> Precio:</b>
                    <input type="number" name="costo" id="costo" placeholder = "<?php echo $sinotas[1]?>" class="input" value=""/></label>
                    <label for="precio_produce"> <b> Precio de Producción:</b>
                    <input type="number" name="precio_produce" id="precio_produce" placeholder = "<?php echo $sinotas[2]?>" class="input" value=""/></label>
                    <label for="idalmacen"> <b> ID Almacén:</b>
                    <input type="number" name="idalmacen" id="idalmacen" placeholder = "<?php echo $sinotas[3]?>"class="input" value=""/></label>
                    <label for="id_proveedor"> <b> ID Proveedor:</b>
                    <input type="number" name="id_proveedor" id="id_proveedor" placeholder = "<?php echo $sinotas[4]?>" class="input" value=""/></label>
                    <label for="stock"> <b> Stock:</b>
                    <input type="number" name="stock" id="stock" placeholder = "<?php echo $sinotas[5]?>" class="input" value=""/></label>
                    <label for="rubro"> <b> Rubro:</b>
                    <input type="text" name="rubro" id="rubro" placeholder = "<?php echo $sinotas[6]?>"class="input" value=""/></label>
                    <label for="subrubro"> <b> Subrubro:</b>
                    <input type="text" name="subrubro" id="subrubro" placeholder = "<?php echo $sinotas[7]?>" class="input" value=""/></label>
                    <label for="stock_seguridad"> <b> Stock de Seguridad:</b>
                    <input type="number" name="stock_seguridad" id="stock_seguridad" placeholder = "<?php echo $sinotas[8]?>" class="input" value=""/></label>
                    
                    <label for="id_articulo"> <b> ID del Artículo:</b>
                    <input type="text" name="id_articulo" id="id_articulo" placeholder = "<?php echo $id_articulo?>" class="input" value=""/></label>
                    
                    <button type="submit" >Ingresar Artículo</button>
                    </form>
                    <?php
                }
                else
                {
                    echo "Artículo no existente en el sistema";
                }
                ?>
                    <li><a href = "formulario-articulos.php">Ingresar otro Artículo</a>
                <?php
                break;
            }
    }
}
