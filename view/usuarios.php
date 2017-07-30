<!DOCTYPE html>

<!--Formulario que lista los usuarios ingresados en la base.-->
<?php
session_start();
require_once '../model/Usuario.php';


?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Control - Usuarios</title>
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
                <input type="hidden" name="opcion" value="crear_usuario">
                <div class="panel panel-info">
                    <div class="panel-heading"> <b>DATOS DEL USUARIO</b></div>
                    <div class="panel-body">

                        <center><table>                                
                                <tr>
                                    <td><br>Identificación:</br></td>
                                    <td><br><input type="text" name="idusuario" maxlength="13" required="true"></br></td>
                                </tr>
                                <tr>
                                    <td><br>Tipo:</br></td>
                                    <td>
                                        <select name="tipoidusuario">
                                            <option>CEDULA</option>
                                            <option>PASAPORTE</option>
                                            <option>R</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><br>Rol:</br></td>
                                    <td>
                                        <select name="tipoidusuario">
                                            <option>CAJERO</option>
                                            <option>ADMINISTRADOR</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><br>Nombre:</br></td>
                                    <td><br><input type="text" name="nombreusuario"  required="true"></br></td>
                                </tr>
                                <tr>
                                    <td><br>Fecha de Nacimiento:</br></td>
                                    <td><br><input type="date" name="fecnacusuario" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"></br></td>
                                    
                                </tr>
                                <tr>
                                    <td><br>Ciudad de Nacimiento:</br></td>
                                    <td><br><input type="text" name="ciunacusuario" maxlength="11" required="true"></br></td>
                                </tr>
                                <tr>
                                    <td><br>Dirección:</br></td>
                                    <td><br><input type="text" name="direccionusuario" maxlength="11" required="true"></br></td>
                                </tr>
                                <tr>
                                    <td><br>Teléfono:</br></td>
                                    <td><br><input type="text" name="telefonousuario" maxlength="11" required="true"></br></td>
                                </tr>
                                <tr>
                                    <td><br>Email:</br></td>
                                    <td><br><input type="email" name="emailusuario" maxlength="11" required="true"></br></td>
                                </tr>
                                <tr>
                                    <td><br>Estado:</br></td>
                                    <td>
                                        <table>
                                            <tr>
                                                <td><input type="radio" name="estadousuario" value='true'>Activo</td>
                                                <td width="20"></td>
                                                <td><input type="radio" name="estadousuario" value='false'>Inactivo</td>
                                            </tr>
                                        </table>
                                    </td>
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
                            <th>ID USUARIO</th>
                            <th>TIPO ID</th>
                            <th>ROL</th>
                            <th>NOMBRE</th>
                            <th>FECHA NAC.</th>
                            <th>CIUDAD NAC.</th>
                            <th>DIRECCIÓN</th>
                            <th>TELÉFONO</th>
                            <th>EMAIL</th>
                            <th>ESTADO</th>
                            <th>ELIMINAR</th>
                            <th>EDITAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //verificamos si existe en sesion el listado de login:
                        if (isset($_SESSION['listaUsuarios'])) {
                            $listado = unserialize($_SESSION['listaUsuarios']);
                            foreach ($listado as $usu) {
                                echo "<tr>";
                                echo "<td>" . $usu->getIdusuario() . "</td>";
                                echo "<td>" . $usu->getTipoidusuario() . "</td>";
                                echo "<td>" . $usu->getRolusuario() . "</td>";
                                echo "<td>" . $usu->getNombreusuario() . "</td>";
                                echo "<td>" . $usu->getFecnacusuario() . "</td>";
                                echo "<td>" . $usu->getCiunacusuario() . "</td>";
                                echo "<td>" . $usu->getDireccionusuario() . "</td>";
                                echo "<td>" . $usu->getTelefonousuario() . "</td>";
                                echo "<td>" . $usu->getEmailusuario() . "</td>";
                                echo "<td>" . $usu->getEstadousuario() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminar_usuario&idusuario=" . $usu->getIdusuario() . "'><span class='glyphicon glyphicon-pencil '> Eliminar </span></a></td>";
                                echo "<td><a href='../controller/controller.php?opcion=editar_usuario&idusuario=" . $usu->getIdusuario() . "'><span class='glyphicon glyphicon-pencil'> Editar </span></a></td>";
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
