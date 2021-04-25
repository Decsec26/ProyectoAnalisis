<?php
    session_start();

    define('USER', 'root');
    define('PASSWORD', 'Alexaramos.26');
    define('HOST', 'localhost');
    define('DATABASE', 'AatroxStore');
     
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    } 
    

    if (isset($_POST['enviado'])){
            
        $nombre     =   $_POST['nombre'];
        $contraseña =   $_POST['contraseña'];

        $query = $connection->prepare("SELECT * FROM usuario WHERE tex_UsuarioNombre = '".$nombre."'");
        $query->execute();
        
        $result = $query->fetch(PDO::FETCH_ASSOC);
       


        if (!$result){
            echo '<p class="error"> Usuario/contraseña invalidos </p>';
        }else{
            if ($contraseña == $result['tex_Contraseña']){
                $_SESSION['user_id'] = $result['id'];

                header("Location: indexRegistrado.php?id=".$result['id']."");
            }else{
                echo '<script>alert("Usuario/Contraseña incorrectas")</script>';
            }
        }
   
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio de sesión</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="css/styleLogin.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
  
 
    <link rel="stylesheet" href="style.css">
    

</head>


<body class="BodyLogin">
    <?php require 'header.php' ?>
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
     


    <div class="login-form">
        <h2>Inicio de sesión</h2>
        <form class="form-group" action="" method="POST">

            <div>
                <label>Nombre de usuario o correo electronico:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-controlLogin" placeholder="Usuario" required="required" name="nombre" />
                </div>
            </div>
            <div class="form-group">
                <label>Contraseña:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" class="form-controlLogin" placeholder="Contraseña" required="required" name="contraseña"/>
                </div>
            </div>
            <div class="forgot">
                <a class="perdioContra" href="#">¿Perdió su contraseña?</a>
                <p><input type="checkbox">Recuérdame</p>
            </div>
            <button name="enviado" type="submit">Iniciar Sesión</button>
        </form>
        <p class=" register-p">¿No esta registrado?<a href="registro.php" class="register"> Registro</a></p>
    </div>

</body>

</html>

