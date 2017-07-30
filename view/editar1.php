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
        <title>EDITAR LOS DATOS DE LOS EMPLEADOS</title>
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
        $listaEmpleados = unserialize($_SESSION['listaEmpleados']);

        ?>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizar_empleado">
                <div class="panel panel-info">
                <div class="panel-heading"> <b>EDITAR LOS DATOS DEL EMPLEADO</b></div>
                <div class="panel-body">
            <table>
                <tr>
                    <td>CEDULA EMPLEADO</td>
                    <td>
                        <?php echo $listaEmpleados->getIDEmpleado(); 
                        ?>
                        <input type="hidden" name="IDEmpleado" value="<?php echo $listaEmpleados->getIDEmpleado(); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>NOMBRES</td>
                    <td>
                        <input value="<?php echo $listaEmpleados->getNombreEmpleado(); ?>" type="text" name="nombreEmpleado"  required="true">

                    </td>
                </tr>
                <tr>
                    <td>APELLIDOS</td>
                    <td>
                        <input value="<?php echo $listaEmpleados->getApellidoEmpleado(); ?>" type="text" name="apellidoEmpleado"  required="true">

                    </td>
                </tr>
                  <tr>
                    <td>CARGO EMPLEADO</td>
                    <td>
                        <select name="cargoEmpleado">
                            <option value="SECRETARIA MANANA">SECRETARIA MAÑANA</option>
                            <option value="SECRETARIA TARDE">SECRETARIA TARDE</option>
                            <option value="SECRETARIA NOCHE">SECRETARIA NOCHE</option>
                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                            
                        </select>
                        
                        
                    </td>
                </tr>

                <tr>
                    <td>EDAD EMPLEADO</td>
                    <td>
                        <input value="<?php echo $listaEmpleados->getEdadEmpleado(); ?>" type="text" name="edadEmpleado"  required="true">

                    </td>
                </tr>
                  <tr>
                    <td>FECHA CONTRATO</td>
                    <td>
                        <input value="<?php echo $listaEmpleados->getFechaContratoEmpleado(); ?>" type="date" name="fechaContratoEmpleado"  required="true">
                        
                    </td>
                </tr>
                <tr>
                    <td>DIRECCION</td>
                    <td>
                        <input value="<?php echo $listaEmpleados->getDireccionEmpleado(); ?>" type="text" name="direccionEmpleado"  required="true">
                        
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
