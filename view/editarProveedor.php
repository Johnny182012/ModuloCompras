<?php
session_start();
require_once '../model/Proveedor.php';
?>
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--___________________-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Proveedores</title>

        <meta name="description" content="description">

        <!-- Mobile Specific Meta
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />

        <!-- CSS
        ================================================== -->
        <!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- bootstrap.min css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Animate.css -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css">		
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
        <!--
        Start Preloader
        ==================================== -->
        <div id="loading-mask">
            <div class="loading-img">
                <img alt="Meghna Preloader" src="img/preloader.gif"  />
            </div>
        </div>
        <!--
        End Preloader
        ==================================== -->

        <!-- 
        Fixed Navigation
        ==================================== -->
        <header class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <h1 id="logo">
                            <img src="img/logo-meghna.png" alt="Meghna" />
                        </h1>
                    </a>
                </div>

                <nav class="collapse navbar-collapse navbar-right" role="Navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li class="current"><a href="#body">Inicio</a></li>
                        <li><a href="#about">Acerca de Nosotros</a></li>
                        <li><a href="#services">Servicios</a></li>
                        <li><a href="#our-team">Equipo de trabajo</a></li>
                        <li><a href="controller/controller.php?opcion=listar_proveedores">Proveedores</a></li>
                        <li><a href="controller/controller.php?opcion=listar_usuarios">Usuarios</a></li>
                        <li><a href="controller/controller.php?opcion=listar_facturas">Facturas</a></li>
                        <li><a href="controller/controller.php?opcion=listar_logins">Inicios de Sesión</a></li>
                        <li><a href="controller/controller.php?opcion=primerReporte">Ver Cajeros</a></li>
                        <li><a href="controller/controller.php?opcion=segundoReporte">Ver Proveedores</a></li>
                        <li><a href="controller/controller.php?opcion=tercerReporte">Ver Facturas</a></li>
                        <li><a href="#blog">Blog</a></li>
                        <li><a href="#contact-us">Contactos</a></li>
                    </ul>
                </nav><!-- /.navbar-collapse -->
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->


        <!-- Start Blog Banner
        ==================================== -->
        <section id="blog-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">

                        <div class="blog-icon">
                            <i class="fa fa-book fa-4x"></i>
                        </div>
                        <div class="title text-center">
                            <h2>Editar <span class="color">Proveedores</span></h2>
                            <div class="border"></div>
                        </div>
                        <div class="container" style="color: pink">
                            <!-- Modal -->
                            <?php
                            $listaProveedores = unserialize($_SESSION['listaProveedores']);
                            ?>
                            <form action="../controller/controller.php">
                                <input type="hidden" name="opcion" value="actualizar_proveedor">
                                <div class="panel panel-info">

                                    <div class="panel-body">
                                        <style>
                                            table {
                                                border-collapse: collapse;
                                                width: 100%;

                                            }

                                            th, td {
                                                text-align: left;
                                                padding: 8px;
                                                color: black;

                                            }

                                            tr:nth-child(even){background-color: #cccccc}
                                            tr:nth-child(odd){background-color: whitesmoke}

                                            th {
                                                background-color: #4CAF50;
                                                color: white;
                                            }
                                        </style>

                                        <table>
                                            <tr>
                                                <td>Identificador:</td>
                                                <td>
                                                    <?php echo $listaProveedores->getIdproveedor();
                                                    ?>
                                                    <input maxlength="13" type="hidden" name="idproveedor" value="<?php echo $listaProveedores->getIdproveedor(); ?>" />
                                                </td>
                                                <td>Tipo de identificación:</td>
                                                <td>
                                                    <select name="tipoidproveedor">
                                                        <option value="C">IDENTICACION CEDULA</option>
                                                        <option value="R">IDENTIFICACION RUC</option>
                                                        <option value="P">IDENTIFICACION PASAPORTE</option>
                                                    </select> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nombres:</td>
                                                <td>
                                                    <input value="<?php echo $listaProveedores->getNombreproveedor(); ?>" type="text" name="nombreproveedor"  required="true" title="Se necesita un nombre" placeholder="Ej: Luis" pattern="[A-Za-z ]+" maxlength="100" >
                                                </td>
                                                <td>DOB:</td>
                                                <td>
                                                    <input value="<?php echo $listaProveedores->getFecnacproveedor(); ?>" type="date" name="fecnacproveedor"  required="true" max="today" min="01-01-1800" >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ciudad de nacimiento:</td>
                                                <td>
                                                    <input  placeholder="Ej: Quito" pattern="[A-Za-z ]+" value="<?php echo $listaProveedores->getCiudnacproveedor(); ?>" type="text" name="ciudnacproveedor"  maxlength="50" required="true">
                                                </td>
                                                <td>Tipo de proveedor</td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td><input type="radio" name="tipoproveedor" value='true' required="true">Credito</td>
                                                            <td width="20"></td>
                                                            <td><input type="radio" name="tipoproveedor" value='false' required="true">Efectivo</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dirección:</td>
                                                <td>
                                                    <input value="<?php echo $listaProveedores->getDireccionproveedor(); ?>" placeholder="Ej: Quito y Via. Amazonas" pattern="[0-9A-Za-z- ]+" type="text" name="direccionproveedor" maxlength="100" required="true">
                                                </td>
                                                <td>Teléfono:</td>
                                                <td>
                                                    <input value="<?php echo $listaProveedores->getTelefonoproveedor(); ?>" placeholder="Ej: 0909785967" pattern="[0-9]+" type="tel" name="telefonoproveedor" maxlength="10" required="true">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td>
                                                    <input autocomplete="on" placeholder="Ej: luis@gmail.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" value="<?php echo $listaProveedores->getEmailproveedor(); ?>" type="email" name="emailproveedor" maxlength="50" required="true">
                                                </td>
                                                <td>Estado</td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td><input type="radio" name="estadoproveedor" value='true' required="true">Activo</td>
                                                            <td width="20"></td>
                                                            <td><input type="radio" name="estadoproveedor" value='false' required="true">Inactivo</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><center><input 
                                                    style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;"
                                                    type="submit" value="Actualizar Proveedor" class="btn btn-sm" ></center></td>
                                            <td colspan="2"><center><input  
                                                    style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;"
                                                    type="submit" value="Cancelar" class="btn btn-sm" ><a href="controller/controller.php?opcion=listar_proveedores"></a></center></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>     <!-- End col-lg-12 -->
                </div>	    <!-- End row -->
            </div>       <!-- End container -->
        </section>    <!-- End Section -->

        <!-- Start Blog Post Section
        ==================================== -->
        <section id="blog-page">
            <div class="container">
                <div class="row">

                    <div id="blog-posts" class="col-md-8 col-sm-8">
                        <div class="post-item">




                        </div>
                    </div>

                </div>	    <!-- End row -->
            </div>       <!-- End container -->
        </section>    <!-- End Section -->


        <!-- Start Footer Section
        ========================================== -->
        <footer id="footer" class="bg-one">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="500ms">
                    <div class="col-lg-12">

                        <!-- Footer Social Links -->
                        <div class="social-icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <!--/. End Footer Social Links -->

                        <!-- copyright -->
                        <div class="copyright text-center">
                            <img src="img/logo-meghna.png" alt="Meghna" /> <br />
                            <p>Copyright &copy; 2014. All Rights Reserved.</p>
                        </div>
                        <!-- /copyright -->

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
        <script src="js/jquery-1.11.0.min.js"></script>
        <!-- Bootstrap 3.1 -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Back to Top -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/classie.js"></script>
        <!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Custom Scrollbar -->
        <script src="js/jquery.nicescroll.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing-1.3.pack.js"></script>
        <!-- wow.min Script -->
        <script src="js/wow.min.js"></script>
        <!-- For video responsive -->
        <script src="js/jquery.fitvids.js"></script>
        <!-- Custom js -->
        <script src="js/custom.js"></script>

    </body>
</html>