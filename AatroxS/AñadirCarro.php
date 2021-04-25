<?php
    session_start();
    include('conexion.php');

    $cantidad = $_GET['cantidad'];
    $id_cliente = $_GET['id'];
    $producto = $_GET['producto'];
    echo '<script>alert("Se ha Añadido al carro de compras")</script>';

    $queryIdProduc = "
                    SELECT 
                        id
                    FROM 
                        Producto
                    WHERE
                        tex_nombre = '".$producto."'
                    ";

    $resultadoIdPro = mysqli_query($connection,$queryIdProduc);
    $IdProduc = mysqli_fetch_row($resultadoIdPro);

    $QueryAddCart = "
                    INSERT INTO CarritoCompras(id_cliente_FK,int_Producto_ID,sma_cantidad) VALUES 
                          (".$id_cliente.",".$IdProduc[0].",".$cantidad.")
                            ";
            $agregarCart = mysqli_query($connection,$QueryAddCart);

    header("Location: shopRegistrado.php?id=".$id_cliente."");

?>