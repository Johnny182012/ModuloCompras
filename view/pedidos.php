<!DOCTYPE html>
<!--Formulario que lista los pedidos realizados, también se puede eliminar el pedido ingresado.-->
<?php
require_once '../model/Pedido.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Facturación - lista de Pedidos</title>
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

            </div>
            <div class="row">
                <br><a class="btn btn-primary" href="../view/index.php">Inicio</a></br>
                <br></br>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading"> <b>LISTA DE PEDIDOS</b></div>
                <div class="panel-body">
                    <!--lista los pedidos guardados-->
                    <table data-toggle="table" data-pagination="true">
                        <thead>
                            <tr>
                                <th>ID PEDIDO</th>
                                <th>ID CLIENTE</th>
                                <th>ID EMPLEADO</th>
                                <th>FECHA PEDIDO</th>
                                <th>FECHA ENTREGA</th>
                                <th>FECHA ENVIO</th>
                                <th>FORMA DE ENVIO</th>
                                <th>PRODUCTOS ENVIADOS</th>
                                <th>NOMBRE DESTINATARIO</th>
                                <th>APELLIDO DESTINATARIO</th>
                                <th>DIRECCION DEL DESTINO</th>
                                <th>CIUDAD DEL DESTINO</th>
                                <th>ELIMINAR</th>
                               
                                

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //verificamos si existe en sesion el listado de Pedidos:
                            if (isset($_SESSION['listaPedidos'])) {
                                $listaPedidos = unserialize($_SESSION['listaPedidos']);
                                foreach ($listaPedidos as $factura) {
                                    echo "<tr>";
                                    echo "<td>" . $factura->getIDPedido() . "</td>";
                                    echo "<td>" . $factura->getIDCliente() . "</td>";
                                    echo "<td>" . $factura->getIDEmpleado() . "</td>";
                                    echo "<td>" . $factura->getFechaPedido() . "</td>";
                                    echo "<td>" . $factura->getFechaEntrega() . "</td>";
                                    echo "<td>" . $factura->getFechaEnvio() . "</td>";
                                    echo "<td>" . $factura->getIDBus() . "</td>";
                                    echo "<td>" . $factura->getProductoDestinatario() . "</td>";
                                    echo "<td>" . $factura->getNombreDestinatario() . "</td>";
                                    echo "<td>" . $factura->getApellidoDestinatario() . "</td>";
                                    echo "<td>" . $factura->getDireccionDestino() . "</td>";
                                    echo "<td>" . $factura->getCiudadDestino() . "</td>";
                                    echo "<td align=center><a href='../controller/controller.php?opcion=eliminar_Pedido&IDPedido=" . $factura->getIDPedido() . "'>" . "<span class='glyphicon glyphicon-pencil'> Eliminar</a></td>";
                                    echo "</tr>";
                                    
                                }
                            } else {
                                echo "No se han cargado datos.";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
