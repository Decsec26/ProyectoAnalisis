<?php
    session_start();
    include('conexion.php');
        
        $SesionIniciada = $_GET['id'];

        $queryUsu = "SELECT
                        tex_UsuarioNombre
                    FROM
                        Usuario
                    WHERE 
                        id = ".$SesionIniciada."

                    ";

        $resultadoUsu = mysqli_query($connection,$queryUsu);
        $nombreUsuario = mysqli_fetch_row($resultadoUsu);

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

 <?php 
                                           
if(isset($_POST['Hacer_pedido'])){
    if (isset($_POST['credito'])) {
        $queryvericredito = "
                        SELECT 
                            *
                        FROM 
                            Creditos   
                        WHERE
                            id_cliente_FK = ".$SesionIniciada."
                        ";
        $detallecre = mysqli_query($connection, $queryvericredito);
        $detalle = mysqli_fetch_row($detallecre);

        if(isset($detalle[0])){
            echo "A3";
            $queryVenta = "
                INSERT INTO Ventas(id_cliente_FK,id_tienda_FK) VALUES (".$SesionIniciada.",1)
                            ";
            $ejecutarVenta = mysqli_query($connection,$queryVenta);

            $queryObtenerIdVenta = "
                        SELECT id FROM Ventas WHERE id_cliente_FK = ".$SesionIniciada." ORDER BY id_cliente_FK DESC LIMIT 1
                                ";
            $ObtenerIDventa = mysqli_query($connection,$queryObtenerIdVenta);
            $IDventa = mysqli_fetch_row($ObtenerIDventa);

            $queryProCar = "
                        SELECT 
                            pro.tex_nombre AS 'Producto',
                            pro.sma_precio AS 'Precio',
                            car.sma_cantidad AS 'Cantidad'
                        FROM 
                            CarritoCompras AS car
                        JOIN
                            Producto AS pro ON car.int_producto_ID = pro.id
                        WHERE
                             car.id_cliente_FK = ".$SesionIniciada."
                        ";

            $resultproCart = mysqli_query($connection,$queryProCar);
            $detalles_venta = mysqli_fetch_row($resultproCart);

            while (isset($detalles_venta[0])){

                $queryIngresar = "
                        INSERT INTO Detalles_De_Pedido(id_venta,tex_ProductoNombre,sma_Canitdad,dou_CostoUnidad,dou_subTotal) VALUES 
                                (".$IDventa[0].",".$detalles_venta[0].",".$detalles_venta[2].",".$detalles_venta[1].",".($detalles_venta[1]*$detalles_venta[2]).")
                                ";

                $ejecutarQueryIngresar = mysqli_query($connection,$queryIngresar);

                $detalles_venta = mysqli_fetch_row($resultproCart);
            }

            if(isset($_POST['direccion_dif'])){
                echo "A4";
                $queryDireccionDif = "
                        INSERT INTO Envio(id_venta_fk,id_EmpresaEnvio_fk,tex_TipoEnvio,sma_CostoEnvio,,tex_direccion,tex_NotasPedido) VALUES 
                            (".$IDventa[0].",1,'normal',200,".$_POST['billing_Dcity'].",".$_POST['billing_address_1'].",".$_POST['order_comments'].")
                        ";

                $EjecutarEnvio = mysqli_query($connection,$queryDireccionDif);
            }

        }
    }

    if (isset($_POST['tarjeta'])) {
                                                        
    }
}
?>  

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagar cuenta</title>
    
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
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul> <!-- Opciones para el cliente -->
                            <li><a href="MiCuenta.php"><i class="fa fa-user"></i><?php echo $nombreUsuario[0] ?></a></li>
                            <li><a href="cart.php?id=<?php echo $SesionIniciada?>"><i class="fa fa-user"></i>Carro de Compras</a></li>
                            <li><a href="checkout.php?id=<?php echo $SesionIniciada?>"><i class="fa fa-user"></i> Pagar</a></li>
                            <li><a href="index.php"><i class="fa fa-user"></i> Cerrar Sesión</a></li>
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
                        <h1><a href="indexRegistrado.php?id=<?php echo $SesionIniciada?>"><img src="img/Aatrox.png"></a></h1>
                    </div>
                </div>
                <!-- Cuadro de carrito con el dinero -->
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <!-- Sirve para aplicar estilo al texto o agrupar elementos en línea. Sus etiquetas son: <span> y </span> -->
                        <!-- Logo carrito es <i> -->
                        <?php 
                        $queryCart = "SELECT
                                       COUNT(id_cliente_FK) AS 'Cantidad'
                                    FROM
                                        CarritoCompras
                                    WHERE 
                                        id_cliente_FK = ".$SesionIniciada."
                                    GROUP BY
                                        id_cliente_FK
                                    ";


                        $resultadoCart = mysqli_query($connection,$queryCart);
                        $productoCart = mysqli_fetch_row($resultadoCart);

                        $queryPrecios = "
                                    SELECT
                                       pro.sma_precio AS 'Precio',
                                       car.sma_cantidad AS 'Cantidad'
                                    FROM
                                        CarritoCompras AS car
                                    JOIN
                                        Producto AS pro ON car.int_Producto_ID = pro.id 
                                    WHERE 
                                        id_cliente_FK = ".$SesionIniciada."
                                        
                                    ";

                        $resultadoCartPrecio = mysqli_query($connection,$queryPrecios);
                        

                        function CalcularTotal($resultadoCartPrecio){
                            $Total = 0;
                            
                            $productoCartPrecio = mysqli_fetch_row($resultadoCartPrecio);
                            
                            while(isset($productoCartPrecio[0]) AND isset($productoCartPrecio[1])){
                                
                                $Total = $Total + ($productoCartPrecio[0]*$productoCartPrecio[1]);
                                $productoCartPrecio = mysqli_fetch_row($resultadoCartPrecio);
                            }
                           echo $Total;
                        }

                        function verificarCantidad($productoCart){
                            if(isset($productoCart[0])){
                                return $productoCart[0];
                            }else{
                                return '0';
                            }

                        }

                        ?>



                        <a href="cart.php?id=<?php echo $SesionIniciada?>">Carro - <span class="cart-amunt"><?php CalcularTotal($resultadoCartPrecio) ?> LPS.</span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo verificarCantidad($productoCart) ?></span></a>

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
                        <li ><a href="indexRegistrado.php?id=<?php echo $SesionIniciada?>">Home</a></li>
                        <li><a href="shopRegistrado.php?id=<?php echo $SesionIniciada?>">Tienda</a></li>
                        <li><a href="cart.php?id=<?php echo $SesionIniciada?>">Carro de compras</a></li>
                        <li class="active"><a href="checkoutRegistrado.php?id=<?php echo $SesionIniciada?>">Pagar</a></li>
                        <li><a href="CategoriaRegistrado.php?id=<?php echo $SesionIniciada?>">Categoria</a></li>
                        <li><a href="#">Contacto</a></li>
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
                        <h2>Datos de pago</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
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
                            <h2><a href="single-productRegistrado.php?id=<?php echo $SesionIniciada?>&variable1=<?php echo $filaProducto1[0];?>"><?php echo $filaProducto1[0];?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $filaProducto1[2];?> LPS.</ins> 
                            </div>                             
                        </div>
                        <!-- PRODUCTO 2 -->
                        <div class="thubmnail-recent">
                            <?php $fila2 = mysqli_fetch_row($result4);?>
                            <img src="img/web/<?php echo $fila2[0];?>" class="recent-thumb" alt="">
                            <h2><a href="single-productRegistrado.php?id=<?php echo $SesionIniciada?>&variable1=<?php echo $filaProducto2[0];?>"><?php echo $filaProducto2[0];?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $filaProducto2[2];?>LPS.</ins>
                            </div>                             
                        </div>
                        <!-- PRODUCTO 3 -->
                        <div class="thubmnail-recent">
                            <?php $fila3 = mysqli_fetch_row($result5);?>
                            <img src="img/web/<?php echo $fila3[0];?>" class="recent-thumb" alt="">
                            <h2><a href="single-productRegistrado.php?id=<?php echo $SesionIniciada?>&variable1=<?php echo $filaProducto3[0];?>"><?php echo $filaProducto3[0];?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $filaProducto3[2];?>LPS.</ins>
                            </div>                             
                        </div>
                        <!-- PRODUCTO 4 -->
                        <div class="thubmnail-recent">
                            <?php $fila4 = mysqli_fetch_row($result6);?>
                            <img src="img/web/<?php echo $fila4[0];?>" class="recent-thumb" alt="">
                            <h2><a href="single-productRegistrado.php?id=<?php echo $SesionIniciada?>&variable1=<?php echo $filaProducto4[0];?>"><?php echo $filaProducto4[0];?></a></h2>
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
                            <li><a href="single-productRegistrado.php?id=<?php echo $SesionIniciada?>&variable1=<?php echo $fila5[0];?>"><?php echo $fila5[0];?></a></li>
                            <?php
                                $sugerencia = rand(1,10);

                                $query10 = "SELECT tex_nombre FROM Producto WHERE id = ".$sugerencia."";
                                $result8 = mysqli_query($connection,$query10);
                                $fila6 = mysqli_fetch_row($result8);
                            ?>
                            <li><a href="single-productRegistrado.php?id=<?php echo $SesionIniciada?>&variable1=<?php echo $fila6[0];?>"><?php echo $fila6[0];?></a></li>
                            <?php
                                $sugerencia = rand(1,10);

                                $query11 = "SELECT tex_nombre FROM Producto WHERE id = ".$sugerencia."";
                                $result9 = mysqli_query($connection,$query11);
                                $fila7 = mysqli_fetch_row($result9);
                            ?>
                            <li><a href="single-productRegistrado.php?id=<?php echo $SesionIniciada?>&variable1=<?php echo $fila7[0];?>"><?php echo $fila7[0];?></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            
                            <form action="#" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    
                                    <div class="col-2">
                                        <div class="woocommerce-shipping-fields">
                                            <h3 id="ship-to-different-address">
                                                <label class="checkbox" for="ship-to-different-address-checkbox">¿ENVIAR A UNA DIRECCIÓN DIFERENTE?</label>
                                                <input type="checkbox" value="" name="direccion_dif" class="input-checkbox" id="ship-to-different-address-checkbox">
                                             </h3>
                                            <div class="shipping_address" style="display: block;">
                                                <p id="shipping_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                    <label class="" for="shipping_country">País <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <select class="country_to_state country_select" id="shipping_country" name="shipping_country">
                                                        <option value="Honduras">Honduras</option>
                                                    </select>
                                                </p>

                                              
                                                <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">Ciudad mas cercana a mi ubicación <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select class="City_Ubication" id="billing_city" name="billing_city">
                                                    <option value="TG">Tegucigalpa</option>
                                                    <option value="LC">Juticalpa</option>
                                                    <option value="SPS">San Pedro Sula</option>
                                                    
                                                </select>
                                            </p>

                                            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">Departamento-Ciudad de Entrega <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select class="billing_Dcity" id="billing_Dcity" name="billing_Dcity">
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
                                            </p>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Dirección <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Dirección lineal 1 *" id="billing_address_1" name="billing_address_1" class="input-text ">
                                            </p>

                                            <p id="billing_address_2_field" class="form-row form-row-wide address-field">
                                                <input type="text" value="" placeholder="Dirección lineal 2" id="billing_address_2" name="billing_address_2" class="input-text ">
                                            </p>

                                            
                                            <div class="clear"></div>


                                            </div>

                                            <p id="order_comments_field" class="form-row notes">
                                                <label class="" for="order_comments">Notas de pedido</label>
                                                <textarea cols="5" rows="2" placeholder="Ingrese el nombre de la persona a quien lo envia en caso de que no sea a usted y otros datos de su interes." id="order_comments" class="input-text " name="order_comments"></textarea>
                                            </p>


                                        </div>

                                    </div>

                                </div>

                                <h3 id="order_review_heading">SU PEDIDO</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Producto</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>

                                        <?php 
                                        $queryCartD = "
                                                    SELECT 
                                                        pro.tex_nombre AS 'Producto',
                                                        pro.sma_precio AS 'Precio',
                                                        car.sma_cantidad AS 'Cantidad'
                                                    FROM 
                                                        CarritoCompras AS car
                                                    JOIN
                                                        Producto AS pro ON car.int_producto_ID = pro.id
                                                    WHERE
                                                        car.id_cliente_FK = ".$SesionIniciada."
                                                    ";

                                        $resultCart = mysqli_query($connection,$queryCartD);
                                        $detallesCart = mysqli_fetch_row($resultCart);
                                        $TotalCarrito = 0;
                                        $Envio = 200;

                                        while(isset($detallesCart[0])){
                                         ?>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    <?php echo $detallesCart[0]?> <strong class="product-quantity">× <?php echo $detallesCart[2]?></strong> </td>
                                                <td class="product-total">
                                                    <?php $TotalCarrito = $TotalCarrito + ($detallesCart[1]*$detallesCart[2]) ?>
                                                    <span class="amount"><?php echo ($detallesCart[1]*$detallesCart[2])?> LPS.</span> </td>
                                            </tr>

                                             <?php $detallesCart = mysqli_fetch_row($resultCart);?>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>SUBTOTAL DEL PEDIDO</th>
                                                <td><span class="amount"><?php echo $TotalCarrito ?> LPS.</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>COSTO DE ENVIO</th>
                                                <td>
                                                    <?php echo $Envio?> LPS.
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>TOTAL PEDIDO</th>
                                                <td><strong><span class="amount"><?php echo ($TotalCarrito+$Envio)?> LPS.</span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            
                                            <li class="payment_method_cheque">
                                                <input type="checkbox" data-order_button_text="" value="cheque" name="credito" class="input-radio" id="payment_method_cheque">
                                                <label for="payment_method_ccredito">Creditos del cliente </label>
                                                <div style="display:none;" class="payment_box payment_method_ccredito">
                                                    <p>Se verificara si cuenta con contrato especial para clientes con credito</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_tarjeta">
                                                <input type="checkbox" data-order_button_text="" value="tarjeta" name="tarjeta" class="input-radio" id="payment_method_tarjeta">
                                                <label for="showpay">Tarjeta debito/credito <img src="img/visa.jpg" alt="visa" class="visa" /></label> 
                 
                                                
                                                     
                                                        <p class="form-row form-row-first">
                                                            <label for="nameT">Nombre <span class="required">*</span>
                                                            </label>
                                                            <input type="text" id="nameT" name="nameT" class="input-text-T">
                                                        </p>
                                                        <p class="form-row form-row-last">
                                                            <label for="numT">Numero de tarjeta <span class="required">*</span>
                                                            </label>
                                                            <input type="password" id="numT" name="numT" class="input-text-nt">
                                                        </p>

                                                         <label for="expiry-date">Expira</label>
                                                                <select id="expiry-date">
                                                                    <option>MM</option>
                                                                    <option value="1">01</option>
                                                                    <option value="2">02</option>
                                                                    <option value="3">03</option>
                                                                    <option value="4">04</option>
                                                                    <option value="5">05</option>
                                                                    <option value="6">06</option>
                                                                    <option value="7">07</option>
                                                                    <option value="8">08</option>
                                                                    <option value="9">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                </select>
                                                                <span>/</span>
                                                                 <select id="expiry-date">
                                                                    <option>YYYY</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2025">2025</option>
                                                                    <option value="2026">2026</option>
                                                                    <option value="2027">2027</option>
                                                                    <option value="2028">2028</option>
                                                                    <option value="2029">2029</option>
                                                                    <option value="2030">2030</option>
                                                                    <option value="2031">2016</option>
                                                                    <option value="2032">2017</option>
                                                                    <option value="2033">2018</option>
                                                                    <option value="2034">2019</option>
                                                                    <option value="2035">2020</option>
                                                                </select>

                                                                <label for="cvv">CVC/CVV</label>
                                                                <input type="text" maxlength="4" placeholder="123" class="CVC" />
                                                                

                                                        <div class="clear"></div>  
                                                            
                                                             
                                                                
                                            </li>
                                        </ul>

                                        <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="Hacer pedido" id="place_order" name="Hacer_pedido" class="button alt">
                                         

                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>                       
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
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
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