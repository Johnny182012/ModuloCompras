<!DOCTYPE html>
<!--Formulario de actualización de un empleado existente.-->
<?php
require_once '../model/Empleado.php';

session_start();
?>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <title>EDITAR LOS DATOS DE LOS PROVEEDORES</title>
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
            $listaProveedores = unserialize($_SESSION['listaProveedores']);
            ?>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="actualizar_proveedor">
                <div class="panel panel-info">
                    <div class="panel-heading"> <b>EDITAR LOS DATOS DEL PROVEEDOR</b></div>
                    <div class="panel-body">

                        <table>
                            <tr>
                                <td>IDENTIFICACION PROVEEDOR</td>
                                <td>
                                    <?php echo $listaProveedores->getIdproveedor();
                                    ?>
                                 <!--   <input type="hidden" name="idproveedor" value="<?php echo $listaProveedores->getIdproveedor(); ?>" />-->
                                </td>
                            </tr>
                            <tr>
                                <td>TIPO IDENTIFICACION</td>
                                <td>
                                    <select name="tipoidproveedor">
                                        <option value="CEDULA">IDENTICACION CEDULA</option>
                                        <option value="RUC">IDENTIFICACION RUC</option>
                                        <option value="PASAPORTE">IDENTIFICACION PASAPORTE</option>

                                    </select> 

                                </td>
                            </tr>
                            <tr>
                                <td>NOMBRES</td>
                                <td>
                                    <input value="<?php echo $listaProveedores->getNombreproveedor(); ?>" type="text" name="nombreProveedor"  required="true">

                                </td>
                            </tr>

                            <tr>
                                <td>FECHA NACIMIENTO</td>
                                <td>
                                    <input value="<?php echo $listaProveedores->getFecnacproveedor(); ?>" type="date" name="fecnacproveedor"  required="true">

                                </td>
                            </tr>
                            <tr>
                                <td>CIUDAD NACIMIENTO</td>
                                <td>
                                    <input value="<?php echo $listaProveedores->getCiudnacproveedor(); ?>" type="text" name="ciudnacproveedor"  required="true">

                                </td>
                            </tr>
                            <tr>
                                <td>TIPO PROVEEDOR</td>
                                <td>
                                    <select name="tipoproveedor">
                                        <option value="CREDITO">CREDITO</option>
                                        <option value="EFECTIVO">EFECTIVO</option>
                                    </select> 
                                </td>
                            </tr>

                            <tr>
                                <td>DIRECCION</td>
                                <td>
                                    <input value="<?php echo $listaProveedores->getDireccionproveedor(); ?>" type="text" name="direccionproveedor"  required="true">

                                </td>
                            </tr>
                            <tr>
                                <td>TELEFONO</td>
                                <td>
                                    <input value="<?php echo $listaProveedores->getTelefonoproveedor(); ?>" type="text" name="telefonoproveedor"  required="true">

                                </td>
                            </tr>
                            <tr>
                                <td>EMAIL</td>
                                <td>
                                    <input value="<?php echo $listaProveedores->getEmailproveedor(); ?>" type="text" name="emailproveedor"  required="true">

                                </td>
                            </tr>
                            <tr>
                                <td>ESTADO</td>
                                <td>
                                    <input value="<?php echo $listaProveedores->getEstadoproveedor(); ?>" type="text" name="estadoproveedor"  required="true">

                                </td>
                            </tr>

                            <tr>
                                <td><br><input type="submit" value="ACTUALIZAR PROVEEDOR" class="btn btn-info"></br></td>
                            </tr>
                        </table>
                         </form>
         </div>
    </body>
</html>