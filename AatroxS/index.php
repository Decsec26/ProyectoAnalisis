<?php
    session_start();
    include('conexion.php');
        

        //PARA EL PRODUCTO EN GRANDE
        $sugerencia = rand(1,10);

        $query2 = "SELECT tex_nombre FROM Imagenes WHERE id_producto = ".$sugerencia." ORDER BY tex_nombre";
        $result2 = mysqli_query($connection,$query2);

        $query3 = "SELECT pro.tex_nombre AS 'nombre', pro.tex_descripcion AS 'descripcion', 
                          pro.sma_precio AS 'precio', cat.tex_nombre AS 'categoria'
                    FROM
                        Producto AS pro
                    JOIN
                        Categoria AS cat ON pro.id_Categoria_fk = cat.id
                    WHERE 
                        pro.id = ".$sugerencia."
                  ";
        
        $Producto = mysqli_query($connection,$query3);

       $filaProducto = mysqli_fetch_row($Producto);

       //PRIMER PRODUCTO MAS VENDIDOS
       $sugerencia = rand(1,12);

        $query4 = "SELECT tex_nombre FROM Imagenes WHERE id_producto = ".$sugerencia." ORDER BY tex_nombre";
        $result3 = mysqli_query($connection,$query4);

        $query5 = "SELECT pro.tex_nombre AS 'nombre', pro.tex_descripcion AS 'descripcion', 
                          pro.sma_precio AS 'precio', cat.tex_nombre AS 'categoria'
                    FROM
                        Producto AS pro
                    JOIN
                        Categoria AS cat ON pro.id_Categoria_fk = cat.id
                    WHERE 
                        pro.id = ".$sugerencia."
                  ";
        
        $Producto1 = mysqli_query($connection,$query5);

       $filaProducto1 = mysqli_fetch_row($Producto1);

       //SEGUNDO PRODUCTO MAS VENDIDOS
       $sugerencia = rand(1,12);

        $query5 = "SELECT tex_nombre FROM Imagenes WHERE id_producto = ".$sugerencia." ORDER BY tex_nombre";
        $result4 = mysqli_query($connection,$query5);

        $query6 = "SELECT pro.tex_nombre AS 'nombre', pro.tex_descripcion AS 'descripcion', 
                          pro.sma_precio AS 'precio', cat.tex_nombre AS 'categoria'
                    FROM
                        Producto AS pro
                    JOIN
                        Categoria AS cat ON pro.id_Categoria_fk = cat.id
                    WHERE 
                        pro.id = ".$sugerencia."
                  ";
        
        $Producto2 = mysqli_query($connection,$query6);

       $filaProducto2 = mysqli_fetch_row($Producto2);

       //TERCER PRODUCTO MAS VENDIDOS
       $sugerencia = rand(1,12);

        $query6 = "SELECT tex_nombre FROM Imagenes WHERE id_producto = ".$sugerencia." ORDER BY tex_nombre";
        $result5 = mysqli_query($connection,$query6);

        $query7 = "SELECT pro.tex_nombre AS 'nombre', pro.tex_descripcion AS 'descripcion', 
                          pro.sma_precio AS 'precio', cat.tex_nombre AS 'categoria'
                    FROM
                        Producto AS pro
                    JOIN
                        Categoria AS cat ON pro.id_Categoria_fk = cat.id
                    WHERE 
                        pro.id = ".$sugerencia."
                  ";
        
        $Producto3 = mysqli_query($connection,$query7);

       $filaProducto3 = mysqli_fetch_row($Producto3);

       //CUARTO PRODUCTO MAS VENDIDOS
       $sugerencia = rand(1,12);

        $query7 = "SELECT tex_nombre FROM Imagenes WHERE id_producto = ".$sugerencia." ORDER BY tex_nombre";
        $result6 = mysqli_query($connection,$query7);

        $query8 = "SELECT pro.tex_nombre AS 'nombre', pro.tex_descripcion AS 'descripcion', 
                          pro.sma_precio AS 'precio', cat.tex_nombre AS 'categoria'
                    FROM
                        Producto AS pro
                    JOIN
                        Categoria AS cat ON pro.id_Categoria_fk = cat.id
                    WHERE 
                        pro.id = ".$sugerencia."
                  ";
        
        $Producto4 = mysqli_query($connection,$query8);

       $filaProducto4 = mysqli_fetch_row($Producto4);
?>



<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aatrox Store</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

  </head>
  <body>
    <!-- INICIO BOTONES DE ARRIBA -->
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul> <!-- Opciones para el cliente -->
                            <li><a href="Login.php"><i class="fa fa-user"></i> Mi Cuenta</a></li>
                            <li><a href="Login.php"><i class="fa fa-user"></i>Carro de Compras</a></li>
                            <li><a href="checkout.php"><i class="fa fa-user"></i> Pagar</a></li>
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
                <!-- Cuadro de carrito con el dinero -->
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <!-- Sirve para aplicar estilo al texto o agrupar elementos en línea. Sus etiquetas son: <span> y </span> -->
                        <!-- Logo carrito es <i> -->
                        <a href="cart.html">Carro - <span class="cart-amunt">0 LPS.</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">0</span></a>

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <!-- Barra de MENU-->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class='load'>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Tienda</a></li>
                        <li><a href="cartNR.php">Carro de compras</a></li>
                        <li><a href="checkout.php">Pagar</a></li>
                        <li><a href="categoria.php">Categoria</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <!-- FRANJA AZUL CON NOMBRE EN GRANDE-->
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>INICIO</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--Buscador lado izquierdo-->
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Buscar Producto</h2>
                        <form action="">
                            <input type="text" placeholder="Buscar Producto...">
                            <input type="submit" value="Buscar">
                        </form>
                    </div>
    <!-- FIN DEL BUSCADOR -->                
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Productos Mas vendidos</h2>
                        <!-- PRODUCTO 1 -->
                        <div class="thubmnail-recent">
                            <?php $fila1 = mysqli_fetch_row($result3);?>
                            <img src="img/web/<?php echo $fila1[0];?>" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?variable1=<?php echo $filaProducto1[0];?>"><?php echo $filaProducto1[0];?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $filaProducto1[2];?> LPS.</ins> 
                            </div>                             
                        </div>
                        <!-- PRODUCTO 2 -->
                        <div class="thubmnail-recent">
                            <?php $fila2 = mysqli_fetch_row($result4);?>
                            <img src="img/web/<?php echo $fila2[0];?>" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?variable1=<?php echo $filaProducto2[0];?>"><?php echo $filaProducto2[0];?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $filaProducto2[2];?>LPS.</ins>
                            </div>                             
                        </div>
                        <!-- PRODUCTO 3 -->
                        <div class="thubmnail-recent">
                            <?php $fila3 = mysqli_fetch_row($result5);?>
                            <img src="img/web/<?php echo $fila3[0];?>" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?variable1=<?php echo $filaProducto3[0];?>"><?php echo $filaProducto3[0];?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $filaProducto3[2];?>LPS.</ins>
                            </div>                             
                        </div>
                        <!-- PRODUCTO 4 -->
                        <div class="thubmnail-recent">
                            <?php $fila4 = mysqli_fetch_row($result6);?>
                            <img src="img/web/<?php echo $fila4[0];?>" class="recent-thumb" alt="">
                            <h2><a href="single-product.php?variable1=<?php echo $filaProducto4[0];?>"><?php echo $filaProducto4[0];?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $filaProducto4[2];?>LPS.</ins>
                            </div>                             
                        </div> 
                    </div>          
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Nuevos productos</h2>
                        <ul><?php
                                $sugerencia = rand(1,10);

                                $query9 = "SELECT tex_nombre FROM Producto WHERE id = ".$sugerencia."";
                                $result7 = mysqli_query($connection,$query9);
                                $fila5 = mysqli_fetch_row($result7);
                            ?>
                            <li><a href="single-product.php?variable1=<?php echo $fila5[0];?>"><?php echo $fila5[0];?></a></li>
                            <?php
                                $sugerencia = rand(1,10);

                                $query10 = "SELECT tex_nombre FROM Producto WHERE id = ".$sugerencia."";
                                $result8 = mysqli_query($connection,$query10);
                                $fila6 = mysqli_fetch_row($result8);
                            ?>
                            <li><a href="single-product.php?variable1=<?php echo $fila6[0];?>"><?php echo $fila6[0];?></a></li>
                            <?php
                                $sugerencia = rand(1,10);

                                $query11 = "SELECT tex_nombre FROM Producto WHERE id = ".$sugerencia."";
                                $result9 = mysqli_query($connection,$query11);
                                $fila7 = mysqli_fetch_row($result9);
                            ?>
                            <li><a href="single-product.php?variable1=<?php echo $fila7[0];?>"><?php echo $fila7[0];?></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <h2 class="sidebar-title">Sugerencia para ti</h2>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <?php $fila = mysqli_fetch_row($result2);?>
                                        <img src="img/web/<?php echo $fila[0];?>" alt="">
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <?php $fila = mysqli_fetch_row($result2);?>
                                        <img src="img/web/<?php echo $fila[0];?>" alt="">
                                        <?php $fila = mysqli_fetch_row($result2);?>
                                        <img src="img/web/<?php echo $fila[0];?>" alt="">
                                        <?php $fila = mysqli_fetch_row($result2);?>
                                        <img src="img/web/<?php echo $fila[0];?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <!-- DATOS DE LA SUGERENCIA -->
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $filaProducto[0];?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo $filaProducto[2];?> LPS.</ins>
                                    </div>    
                                    <!-- cantidad -->
                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Añadir al carrito</button> <!-- Bton de sugerencia-->
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Categoria: <a href="ResultadoCategoria.php?variable1=<?php echo $filaProducto[3];?>"><?php echo $filaProducto[3];?></a>.
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descripción</a></li>
                                            
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Descripcion de producto</h2>  
                                                <p><b>Acerca de este artículo</b><br>
                                                <?php echo $filaProducto[1];?>

                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- TERMINA ARE DE COMENTARIO Y DESCRIPCION DEL PRODUCTO SUGERIDO-->
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <!-- PIE de PAGINA-->
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Aatrox<span> Store</span></h2>
                        <p>Somo una empresa que vende los mejores electronicos al mejor precio, nuestra prioridad es la comodidad del cliente con nuestros servicios, contamos con tiendas fisicas donde puede visitarnos y ver con mejor detalle nuestros productos. <br> 
                        Siganos en nuestras redes sociales.</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Menu de Usuario</h2>
                        <ul>
                            <li><a href="">Mi Cuenta</a></li>
                            <li><a href="">Historial de compras</a></li>
                            <li><a href="">Contacto de Empresas de envio</a></li>
                            <li><a href="">Inicio</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categorias</h2>
                        <ul>
                            <li><a href="">Celulares</a></li>
                            <li><a href="">Computadoras</a></li>
                            <li><a href="">Impresoras</a></li>
                            <li><a href="">TV</a></li>
                            <li><a href="">Accesorios</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Boletin Informativo</h2>
                        <p>Suscríbase a nuestro boletín y obtenga ofertas exclusivas que no encontrará en ningún otro lugar directamente en su bandeja de entrada.</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Escriba su correo">
                            <input type="submit" value="Suscribirse">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                       <p>&copy; Grupo Analisis y diseño. All Rights Reserved.</p>
                    </div>
                </div>
                
                <!-- Imagen de pagos-->
                <div class="col-md-4">
                    <div class="footer-card-icon">
                      
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>