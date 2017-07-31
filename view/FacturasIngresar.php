<?php
session_start();
require_once '../model/Facturas.php';
require_once '../model/DetalleFactura.php';
require_once '../model/Producto.php';
        require_once '../model/CrudModel.php';
        require_once '../model/FacturaModel.php';
           $crudModel = new CrudModel();
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
                        <li class="current"><a href="../index.html">Inicio</a></li>
                        <li><a href="../controller/controller.php?opcion=listar_proveedores">Proveedores</a>
                            <ul>
                                <li><a href="../controller/controller.php?opcion=segundoReporte">Reporte Proveedores</a></li>
                            </ul>
                        </li>                        
                        <li><a href="../controller/controller.php?opcion=listar_usuarios">Usuarios</a>
                            <ul>
                                <li><a href="../controller/controller.php?opcion=primerReporte">Reporte Cajeros</a></li>
                            </ul>
                        </li>
                        <li><a href="../controller/controller.php?opcion=listar_facturas">Facturas</a>
                            <ul>
                                <li><a href="../controller/controller.php?opcion=tercerReporte">Reporte Facturas</a></li>
                            </ul>
                        </li>
                        <li><a href="../controller/controller.php?opcion=listar_logins">Inicios de Sesión</a></li>
                      
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
                                        

                                       
                        
                    </div>     <!-- End col-lg-12 -->
                </div>	    <!-- End row -->
            </div>       <!-- End container -->
        </section>    <!-- End Section -->
          <form action="../controller/controller.php" style=" width: 100%;">
                                                      
                                                <input type="hidden" name="opcion" value="guardar_factura">
                                                            
                                                            Proveedor:
                                                            <select name="idproveedor">                                        
                                                                    <?php
                                                                    $listaProveedores = $crudModel->getProveedores();
//                                                                    echo $listaProveedores;
                                                                    foreach ($listaProveedores as $proveedor) {
                                                                        echo "<option value='" . $proveedor->getIdproveedor() . "'>" . $proveedor->getNombreproveedor() . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            Fecha:
                                                            
                                                                <input type="date" name="fecha" required="true" autocomplete="off" required="" value="<?php echo getdate(); ?>">
                                                                
                                                            
                                                        
                                                         <center><input style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;" type="submit" value="Guardar" class="btn btn-sm" ></center>
                                                        </form>
                                                        
                                                            <form action="../controller/controller.php">
                                                                <input type="hidden" name="opcion" value="adicionar_detalle">
                                                            Producto:
                                                        
                                                            <select name="idProducto">                                        
                                                                <?php
                                                             
                                                                $listaProductos = $crudModel->getProductos();
//                                                                    echo $listaProductos;
                                                                foreach ($listaProductos as $producto) {
                                                                    echo "<option value='" . $producto->getIdproducto() . "'>" . $producto->getNombreproducto() . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        Cantidad:
                                                        <input style="" type="text" name="cantidad" title="Se necesita un nombre" placeholder="Ej: 12" maxlength="100" required="true" pattern="[0-9 ]+">
                                                            
                                                    </table>
                                                    
                                                    </tr>
                                                    <tr>
                                                        <center><input style="background-color: #006633; font-size: medium;border-radius: 0 50% / 0 100%;" type="submit" value="Adicionar" class="btn btn-sm" ></center>

                                                                                                        </form>

                                                
                                                 </p>

                                          <table data-toggle="table">
        <thead>
            <tr>
                <th>ID PRODUCTO</th>
                <th>NOMBRE</th>
                <th>CANTIDAD</th>
                <th>IVA</th>
                <th>SUBTOTAL</th>
                <th>OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //verificamos si existe en sesion el listado de clientes:
            if (isset($_SESSION['listaFacturaDet'])) {
                $listado = unserialize($_SESSION['listaFacturaDet']);
                foreach ($listado as $facturaDet) {
                    echo "<tr>";
                    echo "<td>" . $facturaDet->getIdproductoss() . "</td>";
                    echo "<td>" . $facturaDet->getNombreProductosss() . "</td>";
                        echo "<td>" . $facturaDet->getCantidadproducto() . "</td>";
                    echo "<td>" . $facturaDet->getPorcentajeIva() . "</td>";
                    echo "<td>" . $facturaDet->getSubtotal() . "</td>";
                    echo "<td><a href='../controller/controller.php?opcion=eliminar_detalle&idProducto=" . $facturaDet->getIdProductoss() . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
               echo "<tr>";
                echo "<td> </td>";
                echo "<td>BASE IMPONIBLE</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                 echo "<td>" . $facturaModel->calcularTotal($listado) . "</td>";
                
            } else {
                echo "No se han cargado datos.";
            }
            ?>
        </tbody>
    </table>


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