<!DOCTYPE html>
<!--Formulario para ingresar un nuevo cliente, lista los clientes ingresados, elimina y modifica los datos de cada cliente.-->
    <?php
require_once '../model/Cliente.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control - clientes</title>
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
            <p>
        <!--permite crear un nuevo cliente a realizar un pedido-->
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_cliente">
                <div class="panel panel-info">
                    <div class="panel-heading"> <b>DATOS DEL CLIENTE</b></div>
                    <div class="panel-body">
             
                        <center><table>                                
                            <tr>
                                <td><br>Cédula:</br> </td>
                                <td><br><input type="text" name="IDCliente" maxlength="10" required="true"></br></td>
                            </tr><tr>
                                <td><br>Nombres:</br></td>
                                <td><br><input type="text" name="nombreCliente" maxlength="30" required="true"></br></td>
                            </tr>
                            <tr>
                                <td><br>Apellidos:</br></td>
                                <td><br><input type="text" name="apellidoCliente" maxlength="30" required="true"></br></td>
                            </tr>
                            
                               <tr> 
                            <td><br>Teléfono:</br></td>
                            <td><br><input type="text" name="telefonoCliente" maxlength="11" required="true"></br></td>
                            </tr>
                            <tr>
                            <td><br>Direccion:</br></td>
                            <td><br><input type="text" name="direccionCliente" maxlength="150"></br></td>
                            </tr>
                            <tr>
                            <td><br>Ciudad:</br></td>
                            <td><br><input type="text" name="ciudadCliente" maxlength="80" required="true"></br></td></tr>
                            <td><input type="submit" value="Crear" class="btn btn-primary"></td>
                        </table></center>
                    </div>
                </div>
            </form>

        </p>
        <!--lista los clientes ingresados-->
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>CEDULA</th>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>TELEFONO</th>
                    <th>DIRECCION</th>
                    <th>CIUDAD</th>
                    <th>ELIMINAR</th>
                    <th>EDITAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //verificamos si existe en sesion el listado de clientes:
                if (isset($_SESSION['listaClientes'])) {
                    $listado = unserialize($_SESSION['listaClientes']);
                    foreach ($listado as $cliente) {
                        echo "<tr>";
                        echo "<td>" . $cliente->getIDCliente() . "</td>";
                        echo "<td>" . $cliente->getNombreCliente() . "</td>";
                        echo "<td>" . $cliente->getApellidoCliente() . "</td>";
                        echo "<td>" . $cliente->getTelefonoCliente() . "</td>";
                        echo "<td>" . $cliente->getDireccionCliente() . "</td>";
                        echo "<td>" . $cliente->getCiudadCliente() . "</td>";
                        echo "<td><a href='../controller/controller.php?opcion=eliminar_cliente&IDCliente=" . $cliente->getIDCliente() . "'><span class='glyphicon glyphicon-pencil '> Eliminar </span></a></td>";
                        echo "<td><a href='../controller/controller.php?opcion=editar_cliente&IDCliente=" . $cliente->getIDCliente() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No se han cargado datos.";
                }
                ?>
            </tbody>
        </table>
    </div>
                <?php
        if (isset($_SESSION['mensaje'])) {
            echo "<br>MENSAJE DEL SISTEMA: <font color='blue'>" . $_SESSION['mensaje'] . "</font><br>";
        }
        ?>
</body>
</html>
