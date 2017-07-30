<!DOCTYPE html>
<!--Formulario de actualización de un login existente.-->
<?php

require_once '../model/Login.php';

session_start();
?>
<html>
    <head>
    <head>
        <meta charset="UTF-8">
        <title>EDITAR LOS DATOS DEL LOGIN</title>
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
        $listaLogins = unserialize($_SESSION['$listaLogins']);

        ?>
        <form action="../controller/controller.php">
            <input type="hidden" name="opcion" value="actualizar_login">
                <div class="panel panel-info">
                <div class="panel-heading"> <b>EDITAR LOS DATOS DEL LOGIN</b></div>
                <div class="panel-body">
            <table>
                <tr>
                    <td>ID:</td>
                    <td>
                        <?php echo $listaLogins->getIdlogin(); 
                        ?>
                        <input type="hidden" name="idlogin" value="<?php echo $listaLogins->getIdlogin(); ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Usuario:</td>
                    <td>
                        <input value="<?php echo $listaLogins->getIdusuario(); ?>" type="text" name="idusuario"  required="true">

                    </td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td>
                        <input value="<?php echo $listaLogins->getPasswordlogin(); ?>" type="text" name="getPasswordlogin"  required="true">

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
