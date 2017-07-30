<!DOCTYPE html>
<!--Formulario que permite el ingreso de un nuevo pedido.-->
<?php
require_once '../model/Facturas.php';
require_once '../model/DetalleFactura.php';
require_once '../model/Usuario.php';
require_once '../model/Proveedor.php';
require_once '../model/Producto.php';

session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CREAR FACTURA</title>
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
            </div>
            <table>
                <tr>
                    <td>
                        <p>
                            <!--ingresamos los datos del nuevo pedido tomando en cuanta los datos de las tablas que tenian clave foranea-->
                        <form action="../controller/controller.php">
                            <input type="hidden" name="opcion" value="reporte">
                            <div class="panel panel-info">
                                <div class="panel-heading"> <b>DATOS DEL PRODUCTO</b></div>
                                <div class="panel-body">
                                    <table >
                                        
                                        <table>
                                            <tr>
                                                <td>USUARIO</td>
                                                <td>
                                                    <select name="idusuario">
                                                        <?php
                                                        if (isset($_SESSION['listaUsuarios'])) {
                                                            $listaUsuarios = unserialize($_SESSION['listaUsuarios']);
                                                            foreach ($listaUsuarios as $cliente) {
                                                                echo "<option value='" . $cliente->getIdusuario() . "'>" . $cliente->getNombreusuario() . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><br>PROVEEDOR</br></td>
                                                <td>
                                                    <select name="idproveedor">
                                                        <?php
                                                        if (isset($_SESSION['listaProveedores'])) {
                                                            $listaProveedores = unserialize($_SESSION['listaProveedores']);
                                                            foreach ($listaProveedores as $empleado) {
                                                                echo "<option value='" . $empleado->getIdproveedor() . "'>" . $empleado->getNombreproveedor() . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><br>PRODUCTO</br></td>
                                                <td>
                                                    <select name="idproducto">
                                                        <?php
                                                        if (isset($_SESSION['listaProductos'])) {
                                                            $listaProveedores = unserialize($_SESSION['listaProductos']);
                                                            foreach ($listaProveedores as $empleado) {
                                                                echo "<option value='" . $empleado->getIdproducto() . "'>" . $empleado->getNombreproducto() . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>

                                        <button type="button" class="btn btn-default"><a href="../view/usuariosPop.php" target="_blank" onclick="window.open(this.href,this.target,'width=900,height=370,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;">Ejemplo</a> </button>
                                        <a href="../view/pop.php" target="_blank" onclick="window.open(this.href,this.target,'width=900,height=370,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;">hahah</a> 
                                        <!--BOTONES RAPIDOS-->
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
                                                    <span class="glyphicon glyphicon-plus"></span> Nuevo producto
                                                </button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
                                                    <span class="glyphicon glyphicon-user"></span> Nuevo cliente
                                                </button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                                                    <span class="glyphicon glyphicon-search"></span> Agregar productos
                                                </button>
                                                <button type="submit" class="btn btn-default">
                                                    <span class="glyphicon glyphicon-print"></span> Imprimir
                                                </button>
                                            </div>	
                                        </div>
                                        <tr>
                                        
                                            <table >
                                                <tr>
                                                    <td><br>CODIGO</td>
                                                    <td><br>PRODUCTO</td>
                                                    <td><br>CANTIDAD</td>
                                                    <td><br>PRECIO</td>
                                                    <td><br>DESCUENTO</td>
                                                    <td><br>CANT. DESCUENTO</td>
                                                    <td><br>IVA</td>
                                                    <td><br>TOTAL</td>
                                                </tr>
                                            </table>
                                        
                                        
                                        </tr>

                                        <tr>
                                            <td colspan="2"><br><input type="submit" value="Insertar nuevo Pedido" class="btn btn-primary"></br></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
