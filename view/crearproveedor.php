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
        <style type="text/css">
            *{
                padding:0px;
                margin: 0px;
            }

            .nav li a:hover{
                background-color:#A4A4A4; 
            }

            .nav > li{
                float:left;
            }

            .nav li a {
                background-color: #585858;
                color:#fff;
                text-decoration: none;
                padding: 10px 15px;
                display: block;
            }

            .nav li ul {
                display:none;
                position:absolute; 
                min-width: 140px;
            }

            .nav li:hover > ul{
                display:block;
            }
        </style>
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
                        <li><a href="../controller/controller.php?opcion=listar_proveedores">Proveedores</a>
                            <ul>
                                <li><a href="../controller/controller.php?opcion=segundoReporte">Ver Proveedores</a></li>
                            </ul>
                        </li>                        
                        <li><a href="../controller/controller.php?opcion=listar_usuarios">Usuarios</a>
                            <ul>
                                <li><a href="../controller/controller.php?opcion=primerReporte">Ver Cajeros</a></li>
                            </ul>
                        </li>
                        <li><a href="../controller/controller.php?opcion=listar_facturas">Facturas</a>
                            <ul>
                                <li><a href="../controller/controller.php?opcion=tercerReporte">Ver Facturas</a></li>
                            </ul>
                        </li>
                        <li><a href="../controller/controller.php?opcion=listar_logins">Inicios de Sesión</a></li>
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
                            <h2>Nuestros <span class="color">Proveedores</span></h2>
                            <div class="border"></div>
                        </div>


                        <div class="container">

                            <!-- Trigger the modal with a button -->
                            <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Ingresar un usuario</button>-->
                            <div class="portfolio-filter clearfix">
                                <ul class="text-center">
                                    <li><a class="filter" data-toggle="modal" data-target="#myModal"><h3><span class='glyphicon glyphicon-folder-open'></span>&nbsp;&nbsp;&nbsp;INGRESAR PROVEEDOR</h3></a></li>

                                    <!--<li><a href="controller/controller.php?opcion=listar_usuarios" class="filter">LISTAR USUARIOS</a></li>-->
                                </ul></div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h2  style="background-color: #006633" class="modal-title" class="btn btn-primary">Ingresar  Proveedor</h2>
                                        </div>
                                        <div class="modal-body" >

                                            <!--permite ingresar un nuevo proveedor-->
                                            <form action="../controller/controller.php" style=" width: 100%;">
                                                <input type="hidden" name="opcion" value="crear_proveedor">
                                                <center><table style=" width: 100%;   border-collapse: collapse;width: 100%;">                                                                                    
                                                        <tr>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Identificación Proveedor:</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="idproveedor" maxlength="13" required="true"></br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Tipo Identificación</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><select name="tipoidproveedor">
                                                                    <option value="C">IDENTICACION CEDULA</option>
                                                                    <option value="R">IDENTIFICACION RUC</option>
                                                                    <option value="P">IDENTIFICACION PASAPORTE</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Nombres:</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br><input title="Se necesita un nombre" placeholder="Ej: Luis" pattern="[A-Za-z ]+"  type="text" name="nombreproveedor" maxlength="100" required="true">  </br></td>                      
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Fecha Nacimiento:</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br><input type="date" name="fecnacproveedor" required="true" autocomplete="off" required="true" max="today" min="01-01-1800"  value="<?php echo date('d-m-Y'); ?>"></br></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Ciudad Nacimiento:</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: Quito" pattern="[A-Za-z ]+" type="text" name="ciudnacproveedor" maxlength="50" required="true">                    </br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Tipo proveedor:</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;">
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
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Direccion:</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: Quito y Via. Amazonas" pattern="[0-9A-Za-z- ]+" type="text" name="direccionproveedor" maxlength="100" required="true"></br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Telefono:</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br><input placeholder="Ej: 0909785967" pattern="[0-9]+" type="tel" name="telefonoproveedor" maxlength="10" required="true"></br></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Email:</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br><input type="text" name="emailproveedor" maxlength="50" placeholder="Ej: luis@gmail.com" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  required="true"></br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;"><br>Estado:</br></td>
                                                            <td style="text-align: left;padding: 8px;color: black;">
                                                                <table>
                                                                    <tr>
                                                                        <td style="text-align: left;padding: 8px;color: black;"><input type="radio" name="estadoproveedor" value='true' required="true">Activo</td>
                                                                        <td width="20"></td>
                                                                        <td style="text-align: left;padding: 8px;color: black;"><input type="radio" name="estadoproveedor" value='false' required="true">Inactivo</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <td>
                                                        <td style="padding: 8px;color: black;" colspan="4"><center><input style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;" type="submit" value="Crear" class="btn btn-sm" ></center></td>
                                                        </td>
                                                    </table></center>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button  style="color: #000; font-size: medium;border-radius: 0 50% / 0 100%;" type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FIN DE LA VENTANA EMERGENTE DE CREAR USUARIO-->
                        <br>
                        <br>
                        <div style="overflow-x:auto;">
                            <div id="cuadro">
                                <center>
                                    <div class="derecha" id="buscar"><B><span class='glyphicon glyphicon-zoom-in'></span>&nbsp;&nbsp;&nbsp; BUSCAR</B>&nbsp;&nbsp;&nbsp; <input type="search" class="light-table-filter" style="color: black; width:500 " data-table="order-table" placeholder="Filtro" ></div><br>
                                </center>

                                <div class="datagrid">
                                    <table class="order-table table">   
                                        <tr class="titulo" style="font-size: 1em">
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
                                            echo "<td><center><a title='Eliminar dato' href='../controller/controller.php?opcion=eliminar_proveedor&idproveedor=" . $proveedor->getIdproveedor() . "'><span class='glyphicon glyphicon-trash' style='color: black;'> </span></a></center></td>";
                                            echo "<td><center><a title='Actualizar dato' href='../controller/controller.php?opcion=editar_proveedor&idproveedor=" . $proveedor->getIdproveedor() . "'><span class='glyphicon glyphicon-pencil' style='color: black;'>  </span></a></center></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "No se han cargado datos.";
                                    }
                                    ?>
                                </tbody >                    

                            </table >
                            <a class="btn btn-success" href="../view/pdfproveedor.php">IMPRIMIR</a>

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