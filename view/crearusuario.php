<?php
session_start();
require_once '../model/Usuario.php';
?>
<html class="no-js"> <!--<![endif]-->
    <head>
        

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CREAR USUARIOS</title>

        <meta name="description" content="description">

        <!-- Mobile Specific Meta
        ================================================== -->
        

        <!-- Favicon -->


        <!-- CSS
        ================================================== -->
        <!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- bootstrap.min css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Animate.css -->
        
        <!-- Owl Carousel -->
        
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="css/main.css">
        <!-- Media Queries -->
        <link rel="stylesheet" href="css/responsive.css">


        <!--
        Google Font
        =========================== -->                    

        <!-- Oswald / Title Font -->
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
        <!-- Ubuntu / Body Font -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,300' rel='stylesheet' type='text/css'>

        <!-- Modernizer Script for old Browsers -->
        <script src="js/modernizr-2.6.2.min.js"></script>

    </head>

    <body class="blog-page">
        
        <section id="blog-banner">
            <div class="container">
                <div class="row">
                    


                        <!-- section title -->
			<div class="title text-center">
			<h2>Datos de los <span class="color">Usuarios</span></h2>
			<div class="border"></div>
			</div>
						<!-- /section title -->
                        
                        <!--ESTILO DE LA TABLA-->
                        <style>
                            th, td {
                                text-align: left;
                                padding: 8px;
                                color: black; 
                            }
                            
                        </style>
                        <div style="overflow-x:auto;">
                        <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_usuario">
                <div class="panel panel-info">
                    
                    <div class="panel-body">

                        <center><table style="border-collapse: collapse;width: 100%; background-color: #d5d5d5">                                
                                <tr>
                                    <td><br>Identificación:</br></td>
                                    <td><br><input type="text" name="idusuario" maxlength="13" required="true"></br></td>
                                    <td><br>Tipo:</br></td>
                                    <td>
                                        <select name="tipoidusuario">
                                            <option>CEDULA</option>
                                            <option>PASAPORTE</option>
                                            <option>R</option>
                                        </select>
                                    </td>
                                
                                    <td><br>Rol:</br></td>
                                    <td>
                                        <select name="tipoidusuario">
                                            <option>CAJERO</option>
                                            <option>ADMINISTRADOR</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td ><br>Nombre:</br></td>
                                    <td><br><input type="text" name="nombreusuario"  required="true"></br></td>
                                
                                    <td><br>Fecha de Nacimiento:</br></td>
                                    <td><br><input type="date" name="fecnacusuario" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"></br></td>
                                    
                                </tr>
                                <tr>
                                    <td><br>Ciudad de Nacimiento:</br></td>
                                    <td><br><input type="text" name="ciunacusuario" maxlength="11" required="true"></br></td>
                                
                                    <td><br>Dirección:</br></td>
                                    <td><br><input type="text" name="direccionusuario" maxlength="11" required="true"></br></td>
                                </tr>
                                <tr>
                                    <td><br>Teléfono:</br></td>
                                    <td><br><input type="text" name="telefonousuario" maxlength="11" required="true"></br></td>
                                
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
                                
                                <td><input style="background-color: black" type="submit" value="Crear" class="btn btn-transparent "></td>
                                </tr>
                            </table></center>
                    </div>
                </div>
            </form>
                        

                    </div>     <!-- End col-lg-12 -->
                </div>	    <!-- End row -->
            </div>       <!-- End container -->
        </section>    <!-- End Section -->


        <footer id="footer" class="bg-one">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="500ms">
                    <div class="col-lg-12">


                    </div> <!-- end col lg 12 -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </footer> <!-- end footer -->

        <!-- Back to Top
        ============================== -->
        <a href="#" id="scrollUp"><i class="fa fa-angle-up fa-2x"></i></a>

        <!-- end Footer Area
        ========================================== -->

        <!-- 
        Essential Scripts
        =====================================-->

        <!-- Main jQuery -->
        
        <!-- Bootstrap 3.1 -->
        <script src="js/bootstrap.min.js"></script>
        
        
        
        
        

    </body>
</html>