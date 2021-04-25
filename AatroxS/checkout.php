<?php 
    session_start();
    include('conexion.php');

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
                            <li><a href="Login.php"><i class="fa fa-user"></i> Mi Cuenta</a></li>
                            <li><a href="cartNR.php"><i class="fa fa-user"></i>Carro de Compras</a></li>
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
                        <a href="cartNR.php">Carro - <span class="cart-amunt">100 LPS.</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">1</span></a>

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
                        <li><a href="shop.php">Tienda</a></li>
                        <li><a href="cartNR.php">Carro de compras</a></li>
                        <li class="active"><a href="checkout.php">Pagar</a></li>
                        <li><a href="categoria.php">Categoria</a></li>
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
                
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <div class="woocommerce-info">¿ya tienes una cuenta? <a class="showlogin" data-toggle="collapse" href="#login-form-wrap" aria-expanded="false" aria-controls="login-form-wrap">Haga clic aqui para iniciar sesión</a>
                            </div>

                            <form id="login-form-wrap" class="login collapse" method="post">


                                <p>Si ha comprado con nosotros antes, introduzca sus datos en las siguientes cajas. Si usted es un nuevo cliente, por favor proceda a la sección facturación y envío.</p>

                                <p class="form-row form-row-first">
                                    <label for="username">Nombre de usuario o correo electronico<span class="required">*</span>
                                    </label>
                                    <input type="text" id="username" name="username" class="input-text">
                                </p>
                                <p class="form-row form-row-last">
                                    <label for="password">Contraseña <span class="required">*</span>
                                    </label>
                                    <input type="password" id="password" name="password" class="input-text">
                                </p>
                                <div class="clear"></div>


                                <p class="form-row">
                                    <input type="submit" value="Login" name="login" class="button">
                                    <label class="inline" for="rememberme"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Recuérdame </label>
                                </p>
                                <p class="lost_password">
                                    <a href="#">¿Perdió su contraseña?</a>
                                </p>

                                <div class="clear"></div>
                            </form>

                            

                            <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-1">
                                        <div class="woocommerce-billing-fields">
                                            <h3>DETALLES DE FACTURACIÓN</h3>
                                            <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                <label class="" for="billing_country">País <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select class="country_to_state country_select" id="billing_country" name="billing_country">
                                                    <option value="Honduras">Honduras</option>
                                                    
                                                </select>
                                            </p>

                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Nombre <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_first_name" name="billing_first_name" class="input-text ">
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Apellido <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_last_name" name="billing_last_name" class="input-text ">
                                            </p>
                                            <div class="clear"></div>

                                             <p id="billing_company_field" class="form-row form-row-wide">
                                                <label class="" for="billing_company">DNI <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_company" name="billing_company" class="input-text ">
                                            </p>

                                            <p id="billing_company_field" class="form-row form-row-wide">
                                                <label class="" for="billing_company">Usuario <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_company" name="billing_company" class="input-text ">
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

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Correo Electrónico <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_email" name="billing_email" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Teléfono <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="" id="billing_phone" name="billing_phone" class="input-text ">
                                            </p>
                                            <div class="clear"></div>


                                            <div class="create-account">
                                                <p>Cree una cuenta introduciendo la siguiente información. Si usted es un cliente que regresa por favor inicie sesión en la parte superior de la página.</p>
                                                <p id="account_password_field" class="form-row validate-required">
                                                    <label class="" for="account_password">Contraseña de la cuenta <abbr title="required" class="required">*</abbr>
                                                    </label>
                                                    <input type="password" value="" placeholder="Contraseña" id="account_password" name="account_password" class="input-text">
                                                </p>
                                                <div class="clear"></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="woocommerce-shipping-fields">
                                            <h3 id="ship-to-different-address">
                        <label class="checkbox" for="ship-to-different-address-checkbox">¿ENVIAR A UNA DIRECCIÓN DIFERENTE?</label>
                        <input type="checkbox" value="" name="ship_to_different_address" class="input-checkbox" id="ship-to-different-address-checkbox">
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
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    Nombres productos <strong class="product-quantity">× cantidad</strong> </td>
                                                <td class="product-total">
                                                    <span class="amount">subtotal_producto</span> </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>SUBTOTAL DEL PEDIDO</th>
                                                <td><span class="amount">£15.00</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>COSTO DE ENVIO</th>
                                                <td>

                                                    costo
                                                    <input type="hidden" class="shipping_method" value="" id="shipping_method_0" name="shipping_method[0]">
                                                </td>
                                            </tr>


                                            <tr class="order-total">
                                                <th>TOTAL PEDIDO</th>
                                                <td><strong><span class="amount">£15.00</span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            
                                            <li class="payment_method_cheque">
                                                <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                <label for="payment_method_ccredito">Creditos del cliente </label>
                                                <div style="display:none;" class="payment_box payment_method_ccredito">
                                                    <p>Se verificara si cuenta con contrato especial para clientes con credito</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_tarjeta">
                                                <input type="radio" data-order_button_text="" value="tarjeta" name="payment_method" class="input-radio" id="payment_method_tarjeta">
                                                <label for="showpay">Tarjeta debito/credito <img src="img/visa.jpg" alt="visa" class="visa" /></label> 
                 
                                                <form id="pay-form-wrap" method="post">
                                                     
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
                                                            
                                                </form>              
                                                                
                                            </li>
                                        </ul>

                                        <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="Hacer pedido" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


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