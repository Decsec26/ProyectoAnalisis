<?php
    session_start();
    include('conexion.php');

    $id_cliente = $_GET['id'];
    $producto = $_GET['producto'];
    echo '<script>alert("Se Elimino Exitosamente")</script>';

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
                   DELETE FROM CarritoCompras WHERE id_cliente_FK = ".$id_cliente." AND int_Producto_ID = ".$IdProduc[0]."
                            ";
            $eliminarCart = mysqli_query($connection,$QueryAddCart);

    header("Location: cart.php?id=".$id_cliente."");

?>