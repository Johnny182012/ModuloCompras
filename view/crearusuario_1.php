<?php
session_start();
require_once '../model/Usuario.php';
?>
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Blog | Meghna - Responsive Multipurpose Parallax Theme</title>

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

                <nav class="collapse navbar-collapse navbar-right" >
                    <ul id="nav" class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="index.html#about">About Us</a></li>
                        <li><a href="index.html#services">Services</a></li>
                        <li><a href="index.html#our-team">Team</a></li>
                        <li><a href="index.html#pricing">Pricing</a></li>
                        <li><a href="index.html#showcase">Portfolio</a></li>
                        <li><a href="index.html#blog">Blog</a></li>
                        <li><a href="index.html#contact-us">Contact</a></li>
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