<!DOCTYPE html>
<!--Formulario que permite modificar los datos del pedido después de haber ingresado el pedido.-->
<?php
require_once '../model/Cliente.php';

require_once '../model/Pedido.php';
require_once '../model/Empleado.php';
require_once '../model/Bus.php';
session_start();

 $IDCliente= unserialize($_SESSION['IDCliente']);
        $IDEmpleado=  unserialize($_SESSION['IDEmpleado']);
        $fechaPedido=  unserialize($_SESSION['fechaPedido']);
       $fechaEntrega= unserialize($_SESSION['fechaEntrega']);
        $fechaEnvio=  unserialize($_SESSION['fechaEnvio']);
        $IDBus=  unserialize($_SESSION['IDBus']);
        $productoDestinatario= unserialize($_SESSION['productoDestinatario']);
        $nombreDestinatario=  unserialize($_SESSION['nombreDestinatario']);
        $apellidoDestinatario=  unserialize($_SESSION['apellidoDestinatario']);
       $direccionDestino=  unserialize( $_SESSION['direccionDestino']);
        $ciudadDestino=  unserialize($_SESSION['ciudadDestino']);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CREAR PEDIDO</title>
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
            <!--modifica los datos de los campos la ingresados con anterioridad-->        
            <table >
                        <tr>
                            <td>
                                <p>
                                <form action="../controller/controller.php">
                                    <input type="hidden" name="opcion" value="reporte">
                                    <div class="panel panel-info">
                                        <div class="panel-heading"> <b>DATOS DEL PRODUCTO</b></div>
                                        <div class="panel-body">
                                            <table >
                                                <tr>
                                                    <td>ID CLIENTE</td>
                                                    <td>
                                                        <select name="IDCliente">
                                                            <?php
                                                            if (isset($_SESSION['listaClientes'])) {
                                                                $listaClientes = unserialize($_SESSION['listaClientes']);
                                                                foreach ($listaClientes as $cliente) {
                                                                    if($cliente->getIDCliente()==$IDCliente){
                                                                        echo "<option selected = true value='" . $cliente->getIDCliente() . "'>" . $cliente->getNombreCliente() . " " . $cliente->getApellidoCliente() . "</option>";
                                                                    }else{
                                                                    echo "<option value='" . $cliente->getIDCliente() . "'>" . $cliente->getNombreCliente() . " " . $cliente->getApellidoCliente() . "</option>";
                                                                    }
                                                                    
                                                                    }
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><br>ID EMPLEADO</br></td>
                                                    <td>
                                                        <select name="IDEmpleado">
                                                            <?php
                                                            if (isset($_SESSION['listaEmpleados'])) {
                                                                $listaEmpleados = unserialize($_SESSION['listaEmpleados']);
                                                                foreach ($listaEmpleados as $empleado) {
                                                                    if($empleado->getIDEmpleado()==$IDEmpleado){
                                                                        echo "<option selected =true value='" . $empleado->getIDEmpleado() . "'>" . $empleado->getNombreEmpleado() . " " . $empleado->getApellidoEmpleado() . "</option>";
                                                                    }else{
                                                                    echo "<option value='" . $empleado->getIDEmpleado() . "'>" . $empleado->getNombreEmpleado() . " " . $empleado->getApellidoEmpleado() . "</option>";
                                                                }
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><br>FECHA PEDIDO</br></td>
                                                    <td> <input type="date" name="fechaPedido" required="true" autocomplete="off" required="" value="<?php echo $fechaPedido; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><br>FECHA ENTREGA</br></td>
                                                    <td> <input type="date" name="fechaEntrega" required="true" autocomplete="off" required="" value="<?php echo $fechaEntrega; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><br>FECHA ENVIO</br></td>
                                                    <td> <input type="date" name="fechaEnvio" required="true" autocomplete="off" required="" value="<?php echo $fechaEnvio; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><br>FORMA ENVIO</br></td>
                                                    <td>
                                                        <select name="IDBus">
                                                            <?php
                                                            if (isset($_SESSION['listaBuses'])) {
                                                                $listaBuses = unserialize($_SESSION['listaBuses']);
                                                                foreach ($listaBuses as $bus) {
                                                                    if($bus->getIDBus()==$IDBus){
                                                                        echo "<option selected=true value='" . $bus->getIDBus() . "'>" . $bus->getNombreBus() . "</option>";
                                                                    }else{
                                                                    echo "<option value='" . $bus->getIDBus() . "'>" . $bus->getNombreBus() . "</option>";
                                                                }
                                                            }
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><br>PRODUCTOS A ENVIAR</br></td>
                                                    <td><input  title="Se necesita PRODUCTOS"  type="text" name="productoDestinatario" required value="<?php echo $productoDestinatario; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><br>NOMBRE DEL DESTINATARIO</br></td>
                                                    <td><input  title="Se necesita un NOMBRE"  type="text" name="nombreDestinatario" required value="<?php echo $nombreDestinatario; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><br>APELLIDO DEL DESTINATARIO</br></td>
                                                    <td><input  title="Se necesita un APELLIDO"  type="text" name="apellidoDestinatario" required value="<?php echo $apellidoDestinatario; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><br>DIRECCIÓN DEL DESTINO</br></td>
                                                    <td><input  title="Se necesita un DIRECCION"  type="text" name="direccionDestino" required value="<?php echo $direccionDestino; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td><br>CIUDAD DEL DESTINO</br></td>
                                                    <td><input  title="Se necesita un CIUDAD"  type="text" name="ciudadDestino" required value="<?php echo $ciudadDestino; ?>"></td>
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
