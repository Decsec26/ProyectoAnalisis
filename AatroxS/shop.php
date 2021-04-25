<?php
    session_start();
    include('conexion.php');
             
        $queryImag = "SELECT tex_nombre FROM Imagenes GROUP BY id_producto ORDER BY id_producto DESC LIMIT 12";
        $resultImag = mysqli_query($connection,$queryImag);

        $queryPro = "
                    SELECT  
                        pro.tex_nombre AS 'nombre', 
                        pro.tex_descripcion AS 'descripcion', 
                        pro.sma_precio AS 'precio', 
                        cat.tex_nombre AS 'categoria'
                    FROM
                        Producto AS pro
                    JOIN
                        Categoria AS cat ON pro.id_Categoria_fk = cat.id 
                    ORDER BY 
                        pro.id DESC
                    LIMIT 15";

        $resultProduc = mysqli_query($connection,$queryPro);

        $filaProductoTienda = mysqli_fetch_row($resultProduc);

?>

<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda</title>
    
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="miCuenta.php"><i class="fa fa-user"></i> Mi Cuenta</a></li>
                            <li><a href="cartNR.php"><i class="fa fa-user"></i>Carro de Compras</a></li>
                            <li><a href="checkout.php"><i class="fa fa-user"></i> Pagar</a></li>
                            <li><a href="Login.php"><i class="fa fa-user"></i> Iniciar Sesión</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">Moneda :</span><span class="value">LPS </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">LPS</a></li>
                                </ul>
                            </li>

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
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php"><img src="img/Aatrox.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cartNR.php">Carro - <span class="cart-amunt">0 LPS.</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">0</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
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
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="shop.php">Tienda</a></li>
                        <li><a href="cartNR.php">Carro de compras</a></li>
                        <li><a href="checkout.php">Pagar</a></li>
                        <li><a href="Categoria.php">Categoria</a></li>
                        <li><a href="informacion.php">Contacto</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>TIENDA</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                
               

                <!-- PRODUCTO 1 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img height="" src="img/web/<?php echo $filaImagTienda[0];?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2]?> LPS.</ins>                        
                        </div>  
                        <?php $filaProductoTienda[2]?>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0];?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins> 
                        </div>  
                        <!-- Opciones del producto "AÑADIR AL CARR0" -->
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0];?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins> 
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 4 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                       <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0]?>" alt="" >
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 5 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0]?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 6 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0]?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 7 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0]?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 8 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0]?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2]; ?> LPS.</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 9 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0]?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 10 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0]?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 11-->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0]?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>

                 <?php $filaProductoTienda = mysqli_fetch_row($resultProduc);?>
                <!-- PRODUCTO 12 -->
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <?php $filaImagTienda = mysqli_fetch_row($resultImag); ?>
                            <img src="img/web/<?php echo $filaImagTienda[0]?>" alt="">
                        </div>
                        <h2><a href="single-product.php?variable1=<?php echo $filaProductoTienda[0];?>"><?php echo $filaProductoTienda[0];?></a></h2>
                        <div class="product-carousel-price">
                            <ins><?php echo $filaProductoTienda[2];?> LPS.</ins>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Añadir al carro</a>
                        </div>                       
                    </div>
                </div>
            </div>
            <!-- FIN PRODUCTOS -->


            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>


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