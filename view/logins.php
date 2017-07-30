<!DOCTYPE html>

<!--Formulario que lista los logins ingresados en la base.-->
<?php
require_once '../model/Login.php';
require_once '../model/CrudModel.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control - Login</title>
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
                <br> <a class="btn btn-primary" href="../view/index.php">Inicio</a></br>
            </div>
            <p>
        <!--permite crear un nuevo login-->
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_login">
                <div class="panel panel-info">
                    <div class="panel-heading"> <b>DATOS DEL LOGIN</b></div>
                    <div class="panel-body">
             
                        <center><table>                                
                            <tr>
                                <td><br>Usuario:</br></td>
                                <td><br><input type="text" name="idusuario" maxlength="80" required="true"></br></td>
                            </tr>
                            <tr>
                                <td><br>Contraseña:</br></td>
                                <td><br><input type="password" name="passwordlogin" maxlength="11" required="true"></br></td>
                            </tr>
                            <td><input type="submit" value="Crear" class="btn btn-primary"></td>
                        </table></center>
                    </div>
                </div>
            </form>

        </p>

            <div class="panel panel-info">
                <div class="panel-heading"> <b>LISTA DE LOGIN</b></div>
                <div class="panel-body">
                    <!--TABLA EN LA QUE LISTA LOS LOGIN INGRESADOS DESDE LA BASE-->
                    <table data-toggle="table">
                        <thead>
                            <tr>
                                <th>ID LOGIN</th>
                                <th>USUARIO</th>
                                <th>PASSWORD</th>
                                <th>ELIMINAR</th>
                                <th>EDITAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //verificamos si existe en sesion el listado de login:
                            if (isset($_SESSION['listaLogins'])) {
                                $listado = unserialize($_SESSION['listaLogins']);
                                foreach ($listado as $log) {
                                    echo "<tr>";
                                    echo "<td>" . $log->getIdlogin() . "</td>";
                                    echo "<td>" . $log->getIdusuario() . "</td>";
                                    echo "<td>" . $log->getPasswordlogin() . "</td>";
                                    echo "<td><a href='../controller/controller.php?opcion=eliminar_login&idlogin=" . $log->getIdlogin() . "'><span class='glyphicon glyphicon-pencil '> Eliminar </span></a></td>";
                                    echo "<td><a href='../controller/controller.php?opcion=editar_login&idlogin=" . $log->getIdlogin() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
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
         <?php
        if (isset($_SESSION['mensaje2'])) {
            echo "<br>MENSAJE DEL SISTEMA: <font color='blue'>" . $_SESSION['mensaje2'] . "</font><br>";
        }
        ?>
    </body>
</html>
