<!DOCTYPE html>
<!--Formulario de actualización de un login existente.-->
<?php
require_once '../model/Producto.php';

session_start();
?>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <title>EDITAR LOS DATOS DEL PRODUCTO</title>
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
                <br><a class="btn btn-primary" href="../view/index.php">Inicio</br></a>
                <br></br>

            </div>
            <?php
            $listaProductos = unserialize($_SESSION['listaProductos']);
            ?>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="actualizar_producto">
                <div class="panel panel-info">
                    <div class="panel-heading"> <b>EDITAR LOS DATOS DEL PRODUCTO</b></div>
                    <div class="panel-body">
                        <table>
                            <tr>
                                <td>ID:</td>
                                <td>
                                    <?php echo $listaProductos->getIdproducto();
                                    ?>
                                    <input type="hidden" name="idproducto" value="<?php echo $listaProductos->getIdproducto(); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>Nombre:</td>
                                <td>
                                    <input value="<?php echo $listaProductos->getNombreproducto(); ?>" type="text" name="nombreproducto"  required="true">

                                </td>
                            </tr>
                            
                            <tr>
                                <td>PVP:</td>
                                <td>
                                    <input value="<?php echo $listaProductos->getPvpproducto(); ?>" type="text" name="pvpproducto"  required="true">

                                </td>
                            </tr>
                            <tr>
                                <td>IVA:</td>
                                <td>
                                    <input value="<?php echo $listaProductos->getIvaproducto(); ?>" type="text" name="ivaproducto"  required="true">
                                </td>
                            </tr>
                            <tr>
                                <td><br><input type="submit" value="ACTUALIZAR EMPLEADO" class="btn btn-info"></br></td>
                            </tr>
                        </table>
                        </form>
                    </div>
                    </body>
                    </html>
