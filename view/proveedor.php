<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
require_once '../model/Proveedor.php';
session_start();
?>
<html>
    <head>
        
        <meta charset="UTF-8">
        <title>Control - Proveedores</title>
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
                <!--permite ingresar un nuevo proveedor-->
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_proveedor">
                <div class="panel panel-info">
                    <div class="panel-heading"> <b>DATOS DEL PROVEEDOR</b></div>
                    <div class="panel-body">
                        Identificación Proveedor:
                        <input type="text" name="idproveedor" maxlength="10" required="true">
                        Tipo Identificación
                        <select name="tipoidproveedor">
                            <option value="CEDULA">IDENTICACION CEDULA</option>
                            <option value="RUC">IDENTIFICACION RUC</option>
                            <option value="PASAPORTE">IDENTIFICACION PASAPORTE</option>

                        </select>                        
                        <br></br>
                        Nombres:
                        <input type="text" name="nombreproveedor" maxlength="30" required="true">                        
                        Fecha Nacimiento:
                        <input type="date" name="fecnacproveedor" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>">
                        Ciudad Nacimiento:
                        <input type="text" name="ciudnacproveedor" maxlength="200" required="true">                    
                        Tipo proveedor:
                        <select name="tipoproveedor">
                            <option value="CREDITO">CREDITO</option>
                            <option value="EFECTIVO">EFECTIVO</option>
                        </select>
                        <br></br>
                        Direccion:
                        <input type="text" name="direccionproveedor" maxlength="200" required="true">
                        Telefono:
                        <input type="text" name="telefonoproveedor" maxlength="200" required="true">
                        Email:
                        <input type="text" name="emailproveedor" maxlength="200" required="true">
                        Estado:
                        <input type="text" name="estadoproveedor" maxlength="200" required="true">
                        <br></br>
                        <input type="submit" value="Crear" class="btn btn-primary">
                    </div>
                </div>
            </form>
            </p>
            <!--busqueda de datos en la tabla proveedor-->
            
    </div>

        <div>
            <!--lista los proveedores ingresado (registrados)-->
            <table data-toggle="table"  id="example" class="uk-table uk-table-hover uk-table-striped" cellspacing="0" width="90%">
                <thead>
                    <tr>
                        <th>IDENTIFICACION</th>
                        <th>TIPO IDENTIFICACION</th>
                        <th>NOMBRES</th>
                        <th>FECHA NACIMIENTO</th>                        
                        <th>CIUDAD NACIMIENTO</th>
                        <th>TIPO PROVEEDOR</th>
                        <th>DIRECCION</th>
                        <th>TELEFONO</th>
                        <th>EMAIL</th>
                        <th>ESTADO</th>
                        <th>ELIMINAR</th>
                        <th>EDITAR</th>
                    </tr>
                </thead>
                <tbody >                    
                    <?php
                    //verificamos si existe en sesion el listado de proveedores:
                    if (isset($_SESSION['listaProveedores'])) {
                        $listado = unserialize($_SESSION['listaProveedores']);
                        foreach ($listado as $proveedor) {
                            echo "<tr>";
                            echo "<td>" . $proveedor->getIdproveedor() . "</td>";
                            echo "<td>" . $proveedor->getTipoidproveedor() . "</td>";
                            echo "<td>" . $proveedor->getNombreproveedor() . "</td>";
                            echo "<td>" . $proveedor->getFecnacproveedor() . "</td>";
                            echo "<td>" . $proveedor->getCiudnacproveedor() . "</td>";
                            echo "<td>" . $proveedor->getTipoproveedor() . "</td>";
                            echo "<td>" . $proveedor->getDireccionproveedor() . "</td>";
                            echo "<td>" . $proveedor->getTelefonoproveedor() . "</td>";
                            echo "<td>" . $proveedor->getEmailproveedor() . "</td>";
                            echo "<td>" . $proveedor->getEstadoproveedor() . "</td>";
//                            elimina un empleado especifico
                            echo "<td><a href='../controller/controller.php?opcion=eliminar_proveedor&idproveedor=" . $proveedor->getIdproveedor() . "'><span class='glyphicon glyphicon-pencil'> Eliminar </span></a></td>";
 //                            modifica un empleado especifico
                            echo "<td><a href='../controller/controller.php?opcion=editar_proveedor&idproveedor=" . $proveedor->getIdproveedor() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No se han cargado datos.";
                    }
                    ?>
                </tbody>
            </table>
            <script src="js/main.js"></script>
            <script src="js/jquery-1.12.4.js"></script>
            <script src="js/jquery.dataTables.min.js"></script>
        </div>
        <?php
        if (isset($_SESSION['mensaje1'])) {
            echo "<br>MENSAJE DEL SISTEMA: <font color='blue'>" . $_SESSION['mensaje1'] . "</font><br>";
        }
        ?>

    </body>
</html>
