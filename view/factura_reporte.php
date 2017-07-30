<!DOCTYPE html>
<!--Formulario que muestra el pedido ingresado, en este puede cancelar
el pedido para editarlo, sino hay cambios puede guardar e imprimir.-->
<?php
require_once '../model/Facturas.php';
require_once '../model/DetalleFactura.php';
require_once '../model/Usuario.php';
require_once '../model/Proveedor.php';
require_once '../model/Producto.php';

session_start();

//deserializo los datos de del pedido ingresado
        $idfactura = unserialize($_SESSION['idfactura']);
        $idproveedor = unserialize($_SESSION['idproveedor']);
        $idusuario = unserialize($_SESSION['idusuario']);
        $valorfactura = unserialize($_SESSION['valorfactura']);
        $fechafactura = unserialize($_SESSION['fechafactura']);
        $ivafactura = unserialize($_SESSION['ivafactura']);
        
        $iddetalle = unserialize($_SESSION['iddetalle']);
        $idproducto = unserialize($_SESSION['idproducto']);
        $cantidadproducto = unserialize($_SESSION['cantidadproducto']);
        $unidades = unserialize($_SESSION['unidades']);
        $descuento = unserialize($_SESSION['descuento']);
        $cantdescuento = unserialize($_SESSION['cantdescuento']);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>REPORTE DE LA FACTURA</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="images/busesBanner.jpg"  width=1200 height=200 >
            <div class="row">
                <h3>Factura</h3>
            </div>
            <div class="row">
                <a class="btn btn-primary" href="../view/index.php">Inicio</a>
                <a class="btn btn-primary" href="../controller/controller.php?opcion=insertar_pedido" >Guardar</a>
                <a class="btn btn-primary" href="../controller/controller.php?opcion=cancelar">Cancelar</a>
                <a class="btn btn-primary" href="javascript:window.print()">Imprimir</a>
            </div>
            <p>
                  <div class="panel panel-info">
                    <div class="panel-heading"> <b>DATOS DEL PEDIDO</b></div>
                    <div class="panel-body">
                        <!--muestra los datos del pedido realizado recientemente-->
            <table data-toggle="table">
              
                <tr>
                    <td>CLIENTE:</td>
                    <td><?php echo $idusuario; ?></td>
                </tr>
                <tr>
                    <td>PROVEEDOR:</td>
                    <td><?php echo $idproveedor; ?></td>
                </tr>
                <tr>
                    <td>FECHA FACTURA:</td>
                    <td><?php echo $fechafactura; ?></td>
                </tr>
                <tr>
                    <td>CODIGO PRODUCTO:</td>
                    <td><?php echo $idproducto; ?></td>
                </tr>
                <tr>
                    <td>PRODUCTO:</td>
                    <td><?php echo $fechaEnvio; ?></td>
                </tr>
                <tr>
                    <td>CANTIDAD:</td>
                    <td><?php echo $IDBus; ?></td>
                </tr>
                     <tr>
                    <td>PRECIO:</td>
                    <td><?php echo $productoDestinatario; ?></td>
                </tr>
                 <tr>
                    <td>DESCUENTO:</td>
                    <td><?php echo $nombreDestinatario; ?></td>
                </tr>
                 <tr>
                    <td>CANTIDAD DESCUENTO:</td>
                    <td><?php echo $apellidoDestinatario; ?></td>
                </tr>
                <tr>
                    <td>IVA:</td>
                    <td><?php echo $direccionDestino; ?></td>
                </tr>
                <tr>
                    <td>TOTAL:</td>
                    <td><?php echo $ciudadDestino; ?></td>
                </tr>
                     
            </table>
                    </div></div>
    </p>

</div>
</body>
</html>
