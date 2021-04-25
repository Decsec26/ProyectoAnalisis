<?php
 session_start();

 if(isset($_SESSION['id'])){
        header("Location: Login.php");
    } 

    define('USER', 'root');
    define('PASSWORD', 'Alexaramos.26');
    define('HOST', 'localhost');
    define('DATABASE', 'AatroxStore');
     
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    } 


 
if (isset($_POST['BT-registro'])) {
 
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $username = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['contraseña'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $region = $_POST['tienda_cercana'];
    $ciudadEntrega = $_POST['select-ciudad-entrega'];
    $direccion1 = $_POST['direccion-1'];
    $direccion2 =$_POST['direccion-2'];
    $telefono = $_POST['telefono'];
    $_SESSION['user_id'] = $username;

    $direccion = $direccion1."/".$direccion2;
 
    $query = $connection->prepare("SELECT * FROM cliente WHERE tex_email =:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<script>alert("El correo Electrónico ya existe")</script>';
    }
 
    if ($query->rowCount() == 0) {
        
        $query = $connection->prepare("INSERT INTO usuario(tex_UsuarioNombre,tex_Contraseña) VALUES (:username,:password_hash)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password, PDO::PARAM_STR);
        $result1 = $query->execute();

        $query = $connection->prepare("SELECT * FROM usuario WHERE tex_UsuarioNombre =:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();

        $result2 = $query->fetch(PDO::FETCH_ASSOC);
        $idFK = $result2['id'];

        $query = $connection->prepare("INSERT INTO cliente(id_usuario_fk,tex_nombre,tex_apellido,tex_email,tex_direccion,tex_telefono,tex_region,tex_dni,tex_CiudadEntrega) VALUES (:id_fk,:nombre,:apellido,:email,:direccion,:telefono,:region,:dni,:ciudadEntrega)");
        $query->bindParam("id_fk", $idFK, PDO::PARAM_STR);
        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
        $query->bindParam("apellido", $apellido, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("direccion", $direccion, PDO::PARAM_STR);
        $query->bindParam("telefono", $telefono, PDO::PARAM_STR);
        $query->bindParam("region", $region, PDO::PARAM_STR);
        $query->bindParam("dni", $dni, PDO::PARAM_STR);
        $query->bindParam("ciudadEntrega", $ciudadEntrega, PDO::PARAM_STR);
        
        $result3 = $query->execute();

 
        if ($result3) {
            $_SESSION['user_id'] = $result2['id'];
                header("Location: Login.php");
        } else {
            echo '<script>alert("Registro incompleto")</script>';
        }
    }
}
 
?> 

<html lang="en">
      <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Registro</title>
            
            <!-- Bootstrap -->
            <link rel="stylesheet" href="css/bootstrap.min.css">
            
            <!-- Font Awesome -->
            <link rel="stylesheet" href="css/font-awesome.min.css">
            
            <!-- Custom CSS -->
            <link rel="stylesheet" href="css/owl.carousel.css">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="css/styleRegistro.css">
            <link rel="stylesheet" href="css/responsive.css">
            
      </head>
<body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul> <!-- Opciones para el cliente -->
                            <li><a href="#"><i class="fa fa-user"></i> Mi Cuenta</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i>Carro de Compras</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Pagar</a></li>
                            <li><a href="Login.php"><i class="fa fa-user"></i> Iniciar Sesión</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                             <!-- Opciones de Moneda, lista desplegable -->
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Moneda :</span><span class="value">LPS </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">LPS</a></li>
                                </ul>
                            </li>
                            <!--  Opciones de Lenguaje-->
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Idioma :</span><span class="value">Español </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Español</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Final Botones de arriba -->
    
    <!-- Parte entre el encabezado de opciones y la lsta de categorias -->
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo"> <!-- LOGO -->
                        <h1><a href="index.php"><img src="img/Aatrox.png"></a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Registro a la plataforma</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form  action="#" class="registro" method="post" name="registro">
       
            <label class="lb-select-pais" for="select_pais">País <abbr title="required" class="required">*</abbr></label><br>
                <select class="select_pais" id="select_pais" name="select_pais">
                    <option value="HN">Honduras</option>                                        
                </select>

            <label class="lb-nombres" for="nombres">Nombre <abbr title="required" class="required">*</abbr></label><br>
                <input type="text" value="" placeholder="Nombres" id="nombres" name="nombres" class="nombres">

            <label class="lb-dni" for="dni">DNI <abbr title="required" class="required">*</abbr></label>
                <input type="text" value="" placeholder="Identidad" id="dni" name="dni" class="dni">

            <label class="lb-apellido" for="apellido">Apellido <abbr title="required" class="required">*</abbr></label>
                <input type="text" value="" placeholder="Apellidos" id="apellido" name="apellido" class="apellido">

            <label class="lb-user" for="user">Usuario <abbr title="required" class="required">*</abbr></label>
                <input type="text" value="" placeholder="Username" id="user" name="user" class="user">

            <label class="lb-contra" for="contraseña">Contraseña<abbr title="required" class="required">*</abbr></label>
                <input type="password" value="" placeholder="Contraseña" id="contraseña" name="contraseña" class="contraseña">  

            <label class="lb-tienda" for="tienda_cercana">Ciudad mas cercana a mi ubicación <abbr title="required" class="required">*</abbr></label>
                <select class="tienda_cercana" id="tienda_cercana" name="tienda_cercana">
                      <option value="TG">Tegucigalpa</option>         
                      <option value="LC">Juticalpa</option>
                      <option value="SPS">San Pedro Sula</option>                                      
                </select> 

            <label class="lb-ciudad-entrega" for="select-ciudad-entrega">Departamento-Ciudad de Entrega <abbr title="required" class="required">*</abbr></label>
                <select class="select-ciudad-entrega" id="select-ciudad-entrega" name="select-ciudad-entrega">
                    <option value="">Seleccione una ciudad</option>
                    <option value="CHCH">Choluteca-Cholutea</option>
                    <option value="CHSM">Choluteca-San Marcos de Colón</option>
                    <option value="CYCY">Comayagua-Comayagua</option>
                    <option value="CYSG">Comayagua-Siguatepeque</option>
                    <option value="EPDN">El Paraíso-Danlí</option>
                    <option value="EPEP">El Paraíso-El Paraíso</option>
                    <option value="FMDC">Francisco Morazán-Distrito Central</option>
                    <option value="FMGM">Francisco Morazán-Guaimaca</option>
                    <option value="FMOJ">Francisco Morazán-Ojojona</option>
                    <option value="FMSG">Francisco Morazán-Sabanagrande</option>
                    <option value="FMSB">Francisco Morazán-San Buena Ventura</option>
                    <option value="FMSA">Francisco Morazán-Santa Ana</option>
                    <option value="FMSL">Francisco Morazán-Santa Lucía</option>
                    <option value="FMTL">Francisco Morazán-Talanga</option>
                    <option value="FMVA">Francisco Morazán-Valle de Angeles</option>
                    <option value="ITIT">Intibucá-Intibucá</option>
                    <option value="ITLE">Intibucá-La Esperanza</option>
                    <option value="OLCM">Olancho-Campamento</option>
                    <option value="OLJT">Olancho-Juticalpa</option>
                    <option value="VLNC">Valle-Nacaome</option>
                    <option value="VLSL">Valle-San Lorenzo</option>
                                                    
                </select>

            <label class="lb-direccion" for="direccion-1">Dirección <abbr title="required" class="required">*</abbr></label>
                
                <input type="text" value="" placeholder="Dirección lineal 1 *" id="direccion-1" name="direccion-1" class="direccion-1">

                <input type="text" value="" placeholder="Dirección lineal 2" id="direccion-2" name="direccion-2" class="direccion-2">

            <label class="lb-email" for="email">Correo Electrónico <abbr title="required" class="required">*</abbr></label>
                
                <input type="email" value="" placeholder="Email" id="email" name="email" class="email">

            <label class="lb-telefono" for="telefono">Teléfono <abbr title="required" class="required">*</abbr></label>
                
                <input type="text" value="" placeholder="Numero de teléfono" id="telefono" name="telefono" class="telefono">

            <input type="submit" data-value="Registro" value="Registrarse" id="BT-registro" name="BT-registro" class="BT-registro">

    </form>




</body>
</html>