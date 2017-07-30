<?php
require_once '../model/Facturas.php';
require_once '../model/DetalleFactura.php';
require_once '../model/Usuario.php';
require_once '../model/Proveedor.php';
require_once '../model/Producto.php';

session_start();
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
                        <div class="blog-title">
                            <h1>FACTURAS</h1>
                        </div>
                        
                        <form action="../controller/controller.php">
                            <input type="hidden" name="opcion" value="reporte">
                            <div >
                                <div class="price-title"> <h3>DATOS DEL PRODUCTO</h3></div>
                                <div class="panel-primary">
                                    <table >
                                        <table class="table-hover">
                                            <tr>
                                                <td>USUARIO</td>
                                                <td>
                                                    <select name="idusuario">
                                                        <?php
                                                        if (isset($_SESSION['listaUsuarios'])) {
                                                            $listaUsuarios = unserialize($_SESSION['listaUsuarios']);
                                                            foreach ($listaUsuarios as $cliente) {
                                                                echo "<option value='" . $cliente->getIdusuario() . "'>" . $cliente->getNombreusuario() . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><br>PROVEEDOR</br></td>
                                                <td>
                                                    <select name="idproveedor">
                                                        <?php
                                                        if (isset($_SESSION['listaProveedores'])) {
                                                            $listaProveedores = unserialize($_SESSION['listaProveedores']);
                                                            foreach ($listaProveedores as $empleado) {
                                                                echo "<option value='" . $empleado->getIdproveedor() . "'>" . $empleado->getNombreproveedor() . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><br>PRODUCTO</br></td>
                                                <td>
                                                    <select name="idproducto">
                                                        <?php
                                                        if (isset($_SESSION['listaProductos'])) {
                                                            $listaProveedores = unserialize($_SESSION['listaProductos']);
                                                            foreach ($listaProveedores as $empleado) {
                                                                echo "<option value='" . $empleado->getIdproducto() . "'>" . $empleado->getNombreproducto() . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>

                                        <button type="button" class="btn btn-default"><a href="../view/usuariosPop.php" target="_blank" onclick="window.open(this.href,this.target,'width=900,height=370,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;">Ejemplo</a> </button>
                                        <a href="../view/pop.php" target="_blank" onclick="window.open(this.href,this.target,'width=900,height=370,top=200,left=200,toolbar=no,location=no,status=no,menubar=no');return false;">hahah</a> 
                                        <!--BOTONES RAPIDOS-->
                                        <div class="col-md-12">
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
                                                    <span class="glyphicon glyphicon-plus"></span> Nuevo producto
                                                </button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
                                                    <span class="glyphicon glyphicon-user"></span> Nuevo cliente
                                                </button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                                                    <span class="glyphicon glyphicon-search"></span> Agregar productos
                                                </button>
                                                <button type="submit" class="btn btn-default">
                                                    <span class="glyphicon glyphicon-print"></span> Imprimir
                                                </button>
                                            </div>	
                                        </div>
                                        <tr>
                                        
                                            <table >
                                                <tr>
                                                    <td><br>CODIGO</td>
                                                    <td><br>PRODUCTO</td>
                                                    <td><br>CANTIDAD</td>
                                                    <td><br>PRECIO</td>
                                                    <td><br>DESCUENTO</td>
                                                    <td><br>CANT. DESCUENTO</td>
                                                    <td><br>IVA</td>
                                                    <td><br>TOTAL</td>
                                                </tr>
                                            </table>
                                        
                                        
                                        </tr>

                                        <tr>
                                            <td colspan="2"><br><input type="submit" value="Insertar nuevo Pedido" class="btn btn-primary"></br></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                        
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