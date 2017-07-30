<?php
session_start();
require_once '../model/Facturas.php';
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
        <title>Usuarios</title>

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
                        <li class="current"><a href="../index.html">Inicio</a></li>
                        <li><a href="#about">Acerca de nosotros</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="../controller/controller.php?opcion=listar_proveedores">Proveedores</a></li>
                        <li><a href="../controller/controller.php?opcion=listar_usuarios">Usuarios</a></li>
                        <li><a href="../controller/controller.php?opcion=listar_facturas">Facturas</a></li>
                        <li><a href="#pricing">Pricing</a></li>
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
                            <h2>Nuestros <span class="color">Usuarios</span></h2>
                            <div class="border"></div>
                        </div>


                        <div class="container">

                            <!-- Trigger the modal with a button -->
                            <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ingresar un usuario</button>-->
                            <div class="portfolio-filter clearfix">
                                <ul class="text-center">
                                    <li><a class="filter" data-toggle="modal" data-target="#myModal">INGRESAR USUARIO</a></li>
                                    <!--<li><a href="controller/controller.php?opcion=listar_usuarios" class="filter">LISTAR USUARIOS</a></li>-->
                                </ul></div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2  style="background-color: #006633" class="modal-title" class="btn btn-primary">Ingresar  Usuarios</h2>
                                        </div>
                                        <div class="modal-body" >

                                            <form action="../controller/controller.php" style=" width: 100%;">
                                                <input type="hidden" name="opcion" value="crear_usuario">
                                                <center><table style=" width: 100%; background-color: #cccccc; display: block">                                                                                    
                                                        <tr>
                                                            <td style="#cccccc"><br>Proveedor:</br></td>
                                                            <td><br><input type="text" name="idusuario" maxlength="13" required="true"></br></td>
                                                            <td><br>Tipo:</br></td>
                                                            <td>
                                                                <select name="tipoidusuario">
                                                                    <option value="C">CEDULA</option>
                                                                    <option value="P">PASAPORTE</option>
                                                                    <option value="R">RUC</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><br>Rol:</br></td>
                                                            <td>
                                                                <select name="rolusuario">
                                                                    <option value="C">CAJERO</option>
                                                                    <option value="A">ADMINISTRADOR</option>
                                                                </select>
                                                            </td>
                                                            <td ><br>Nombre:</br></td>
                                                            <td><br><input style="" type="text" name="nombreusuario" title="Se necesita un nombre" placeholder="Ej: Luis" maxlength="100" required="true" pattern="[A-Za-z ]+"></br></td>
                                                        <tr>
                                                            <td><br>Fecha de Nacimiento:</br></td>
                                                            <td><br><input type="date" name="fecnacusuario" required="true" autocomplete="off" required="" max="today" min="01-01-1800" value="<?php echo date('d-m-Y'); ?>"></br></td>
                                                            <td><br>Ciudad de Nacimiento:</br></td>
                                                            <td><br><input type="text" name="ciunacusuario" maxlength="50" placeholder="Ej: Quito" required="true" pattern="[A-Za-z ]+"></br></td>
                                                        </tr>
                                                        <tr>
                                                            <td><br>Dirección:</br></td>
                                                            <td><br><input type="text" name="direccionusuario" maxlength="100" placeholder="Ej: Quito y Via. Amazonas" pattern="[0-9A-Za-z- ]+" required="true"></br></td>
                                                            <td><br>Teléfono:</br></td>
                                                            <td><br><input type="tel" name="telefonousuario" placeholder="Ej: 0909785967" maxlength="10" required="true" pattern="[0-9]+"></br></td>
                                                        </tr>
                                                        <tr>
                                                            <td><br>Email:</br></td>
                                                            <td><br><input type="email"  autocomplete="on" name="emailusuario" placeholder="Ej: luis@gmail.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" maxlength="50" required="true"></br></td>
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
                                                        <tr>
                                                            <td colspan="4"><center><input style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;" type="submit" value="Crear" class="btn btn-sm" ></center></td>
                                                        </tr>

                                                    </table></center>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button  style="color: #000; font-size: medium;border-radius: 0 50% / 0 100%;" type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN DE LA VENTANA EMERGENTE DE CREAR USUARIO-->
                        <br>
                        <br>
                        <div style="overflow-x:auto;">
                            <!--ESTILO DE LA TABLA-->
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
                            <table id="example">    
                                <tr>
                                    <th>NUMERO FACTURA</th>
                                    <th>PROVEEDOR</th>
                                    <th>USUARIO</th>
                                    <th>VALOR FACTURA</th>
                                    <th>FECHA FACTURA</th>
                                    <th>IVA FACTURA</th>
                                    <th>ELIMINAR</th>
                                    <th>EDITAR</th>
                                </tr>

                                <tbody >                    

                                    <?php
                                    //verificamos si existe en sesion el listado de login:
                                    if (isset($_SESSION['listaFacturas'])) {
                                        $listado = unserialize($_SESSION['listaFacturas']);
                                        foreach ($listado as $usu) {
                                            
                                            echo "<tr>";
                                            echo "<td>" . $usu->getIdfactura(). "</td>";
                                            echo "<td>" . $usu->getIdproveedor() . "</td>";
                                            echo "<td>" . $usu->getIdusuario() . "</td>";
                                            echo "<td>" . $usu->getValorfactura() . "</td>";
                                            echo "<td>" . $usu->getFechafactura() . "</td>";
                                            echo "<td>" . $usu->getIvafactura() . "</td>";
                                            echo "<td><a title='Eliminar dato' href='../controller/controller.php?opcion=eliminar_usuario&idusuario=" . $usu->getIdusuario() . "'><span class='glyphicon glyphicon-trash' style='color: black;'> </span></a></td>";
                                            echo "<td><a title='Eliminar dato' href='../controller/controller.php?opcion=editar_usuario&idusuario=" . $usu->getIdusuario() . "'><span class='glyphicon glyphicon-pencil' style='color: black;'>  </span></a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "No se han cargado datos.";
                                    }
                                    ?>
                                </tbody >                    

                            </table >

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