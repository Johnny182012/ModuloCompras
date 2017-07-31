<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada          //
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas//
///////////////////////////////////////////////////////////////////////
require_once '../model/CrudModel.php';
require_once '../model/FacturaModel.php';

session_start();
//instanciamos los objetos del pedido:
$crudModel = new CrudModel();
$facturaModel = new FacturaModel();

//recibimos la opcion desde la vista:
$opcion = $_REQUEST['opcion'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);
unset($_SESSION['mensaje1']);
unset($_SESSION['mensaje2']);

switch ($opcion) {

    // obtiene los datos de los usuarios de la base de datos
    case "listar_usuarios":
        //obtenemos la lista de usuarios:
        $listaUsuarios = $crudModel->getUsuarios();
        //y los guardamos en sesion:
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/gg.php');
        break;

    case "crear_usuario":
        //obtenemos los parametros del formulario usuario
        $idusuario = $_REQUEST['idusuario'];
        $tipoidusuario = $_REQUEST['tipoidusuario'];
        $rolusuario = $_REQUEST['rolusuario'];
        $nombreusuario = $_REQUEST['nombreusuario'];
        $fecnacusuario = $_REQUEST['fecnacusuario'];
        $ciunacusuario = $_REQUEST['ciunacusuario'];
        $direccionusuario = $_REQUEST['direccionusuario'];
        $telefonousuario = $_REQUEST['telefonousuario'];
        $emailusuario = $_REQUEST['emailusuario'];
        $estadousuario = $_REQUEST['estadousuario'];
        //creamos el nuevo listado
        $crudModel->insertarUsuario($idusuario, $tipoidusuario, $rolusuario, $nombreusuario, $fecnacusuario, $ciunacusuario, $direccionusuario, $telefonousuario, $emailusuario, $estadousuario);
        //actualizamos el lsitado
        $listaUsuarios = $crudModel->getUsuarios();
        //y los guardamos en session
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        //redireccionamos a una nueva pagina para visualizar
        header('Location: ../view/gg.php');
        break;

    //elimina un usuario especifico
    case "eliminar_usuario":
        //obtenemos el codigo del usuario a eliminar:
        $idusuario = $_REQUEST['idusuario'];
        //eliminamos del formulario:
        try {
            $crudModel->eliminarUsuario($idusuario);
        } catch (Exception $e) {
            //colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje2'] = $e->getMessage();
        }
        //actualizamos la lista de usuario para grabar en sesion:
        $listaUsuarios = $crudModel->getUsuarios();
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/gg.php');
        break;
    //edita los datos de un usuario especifico
    case "editar_usuario":
        //obtenemos los parametros del formulario usuario:
        $idusuario = $_REQUEST['idusuario'];
        //Buscamos los datos
        $listaUsuarios = $crudModel->getUsuario($idusuario);
        //guardamos en sesion para edicion posterior:
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        //redirigimos la navegación al formulario de edicion usuario:
        header('Location: ../view/ggeditarusuario.php');
        break;
    //actualiza los datos de un usuario especifico
    case "actualizar_usuario":
        //obtenemos los parametros del formulario usuario:
        $idusuario = $_REQUEST['idusuario'];
        $tipoidusuario = $_REQUEST['tipoidusuario'];
        $rolusuario = $_REQUEST['rolusuario'];
        $nombreusuario = $_REQUEST['nombreusuario'];
        $fecnacusuario = $_REQUEST['fecnacusuario'];
        $ciunacusuario = $_REQUEST['ciunacusuario'];
        $direccionusuario = $_REQUEST['direccionusuario'];
        $telefonousuario = $_REQUEST['telefonousuario'];
        $emailusuario = $_REQUEST['emailusuario'];
        $estadousuario = $_REQUEST['estadousuario'];

        //actualizamos los datos del usuario:
        $crudModel->actualizarUsuario($idusuario, $tipoidusuario, $rolusuario, $nombreusuario, $fecnacusuario, $ciunacusuario, $direccionusuario, $telefonousuario, $emailusuario, $estadousuario);
        //actualizamos lista de usuario:
        $listaUsuarios = $crudModel->getUsuarios();
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        //redireccionamos a una nueva pagina para visualizar el cambio:
        header('Location: ../view/gg.php');
        break;

    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/indexLogin.php');


    //    -------------------LISTAR---------------------
    // obtiene los datos de los proveedores de la base de datos
    case "listar_proveedores":
        //obtenemos la lista de empleados:
        $listaProveedores = $crudModel->getProveedores();
        //y los guardamos en sesion:
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/crearproveedor.php');
        break;

    //crea un nuevo proveedor
    case "crear_proveedor":
        //obtenemos los parametros del formulario proveedor:
        $idproveedor = $_REQUEST['idproveedor'];
        $tipoidproveedor = $_REQUEST['tipoidproveedor'];
        $nombreproveedor = $_REQUEST['nombreproveedor'];
        $fecnacproveedor = $_REQUEST['fecnacproveedor'];
        $ciudnacproveedor = $_REQUEST['ciudnacproveedor'];
        $tipoproveedor = $_REQUEST['tipoproveedor'];
        $direccionproveedor = $_REQUEST['direccionproveedor'];
        $telefonoproveedor = $_REQUEST['telefonoproveedor'];
        $emailproveedor = $_REQUEST['emailproveedor'];
        $estadoproveedor = $_REQUEST['estadoproveedor'];

        //creamos el nuevo registro:
        $crudModel->insertarProveedor($idproveedor, $tipoidproveedor, $nombreproveedor, $fecnacproveedor, $ciudnacproveedor, $tipoproveedor, $direccionproveedor, $telefonoproveedor, $emailproveedor, $estadoproveedor);
        //actualizamos el listado:
        $listaProveedores = $crudModel->getProveedores();
        //y los guardamos en sesion:
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/proveedor.php');
        break;
    case "actualizar_proveedor":
        //obtenemos los parametros del formulario proveedor:
        $idproveedor = $_REQUEST['idproveedor'];
        $tipoidproveedor = $_REQUEST['tipoidproveedor'];
        $nombreproveedor = $_REQUEST['nombreproveedor'];
        $fecnacproveedor = $_REQUEST['fecnacproveedor'];
        $ciudnacproveedor = $_REQUEST['ciudnacproveedor'];
        $tipoproveedor = $_REQUEST['tipoproveedor'];
        $direccionproveedor = $_REQUEST['direccionproveedor'];
        $telefonoproveedor = $_REQUEST['telefonoproveedor'];
        $emailproveedor = $_REQUEST['emailproveedor'];
        $estadoproveedor = $_REQUEST['estadoproveedor'];
        //creamos el nuevo registro:
        $crudModel->actualizarProveedor($idproveedor, $tipoidproveedor, $nombreproveedor, $fecnacproveedor, $ciudnacproveedor, $tipoproveedor, $direccionproveedor, $telefonoproveedor, $emailproveedor, $estadoproveedor);
        //actualizamos el listado:
        $listaProveedores = $crudModel->getProveedores();
        //y los guardamos en sesion:
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/crearproveedor.php');
        break;
    //elimina un empleado especifico
    case "eliminar_proveedor":
        //obtenemos el codigo del empleado a eliminar:
        $idproveedor = $_REQUEST['idproveedor'];
        //eliminamos del formulario:
        try {
            $crudModel->eliminarProveedor($idproveedor);
        } catch (Exception $e) {
            //colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje1'] = $e->getMessage();
        }
        //actualizamos la lista de empleados para grabar en sesion:
        $listaProveedores = $crudModel->getProveedores();
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/crearproveedor.php');
        break;

    //edita los datos de un empleado especifico
    case "editar_proveedor":
        //obtenemos los parametros del formulario:
        $idproveedor = $_REQUEST['idproveedor'];
        //Buscamos los datos
        $listaProveedores = $crudModel->getProveedor($idproveedor);
        //guardamos en sesion para edicion posterior:
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        //redirigimos la navegación al formulario de edicion profeedor:
        header('Location: ../view/editarProveedor.php');
        break;

    case "guardar_proveedor":
        //obtenemos los parametros del formulario:
        $idproveedor = $_REQUEST['idproveedor'];
        if (isset($_SESSION['listaProveedores'])) {
            $listaProveedores = unserialize($_SESSION['listaProveedores']);
            try {
                $listaProveedores = $crudModel->guardarProveedor($listaProveedores, $idproveedor);
                $_SESSION['listaProveedores'] = $listaProveedores;
                header('Location: ../view/proveedor_reporte.php');
                break;
            } catch (Exception $e) {
                $mensajeError = $e->getMessage();
                $_SESSION['mensajeError'] = $mensajeError;
            }
        }
        //actualizamos lista de facturas:
        //$listado = $gastosModel->getFacturas();
        //$_SESSION['listado'] = serialize($listado);
        header('Location: ../view/proveedor.php');
        break;
//        PAGINAS DE LA FACTURA
//        //    -------------------LISTAR---------------------
    // obtiene los datos de los empleados de la base de datos
    case "listar_Detalle":
        //obtenemos la lista de empleados:
        $listaDetalle = $crudModel->getDetalles();
        //y los guardamos en sesion:
        $_SESSION['listaFacturas'] = serialize($listaDetalle);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/facturas_1.php');
        break;

    // crea un nuevo factura
    case "crear_facturas":
        //obtenemos los parametros del formulario cliente:
        $idfactura = $_REQUEST['idfactura'];
        $idproveedor = $_REQUEST['idproveedor'];
        $idusuario = $_REQUEST['idusuario'];
        $valorfactura = $_REQUEST['valorfactura'];
        $fechafactura = $_REQUEST['fechafactura'];
        $ivafactura = $_REQUEST['ivafactura'];
        //creamos el nuevo registro:
        $crudModel->insertarFacturas($idfactura, $idproveedor, $idusuario, $valorfactura, $fechafactura, $ivafactura);
        //actualizamos el listado:
        $listaFacturas = $crudModel->getFacturas();
        //y los guardamos en sesion:
        $_SESSION['listaFacturas'] = serialize($listaFacturas);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/facturas.php');
        break;
    //crea un nuevo empleado
    case "crear_detalle":
        //obtenemos los parametros del formulario empleado:
        $iddetalle = $_REQUEST['iddetalle'];
        $idproducto = $_REQUEST['idproducto'];
        $idfactura = $_REQUEST['idfactura'];
        $cantidadproducto = $_REQUEST['cantidadproducto'];
        $unidades = $_REQUEST['unidades'];
        $descuento = $_REQUEST['descuento'];
        $cantdescuento = $_REQUEST['cantdescuento'];
        //creamos el nuevo registro:
        $crudModel->insertarDetalle($iddetalle, $idproducto, $idfactura, $cantidadproducto, $unidades, $descuento, $cantdescuento);
        //actualizamos el listado:
        $listaDetalle = $crudModel->getDetalles();
        //y los guardamos en sesion:
        $_SESSION['listaDetalles'] = serialize($listaDetalle);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/facturas_1.php');
        break;

    //---------------------------EDTTA----------------------------
    //edita los datos de un cliente especifico
    case "editar_facturas":
        //obtenemos los parametros del formulario cliente:
        $idfactura = $_REQUEST['idfactura'];
        //Buscamos los datos
        $listaFacturas = $crudModel->getFactura($idfactura);
        //guardamos en sesion para edicion posterior:
        $_SESSION['listaFacturas'] = serialize($listaFacturas);
        //redirigimos la navegación al formulario de edicion cliente:
        header('Location: ../view/editarFactura.php');
        break;
    //edita los datos de un empleado especifico
    case "editar_detalle":
        //obtenemos los parametros del formulario:
        $iddetalle = $_REQUEST['iddetalle'];
        //Buscamos los datos
        $listaDetalle = $crudModel->getDetalle($iddetalle);
        //guardamos en sesion para edicion posterior:
        $_SESSION['listaDetalles'] = serialize($listaDetalle);
        //redirigimos la navegación al formulario de edicion empleado:
        header('Location: ../view/editarDetalle.php');
        break;

//----------------------ACTUALIZA------------------
    //actualiza los datos de un cliente especifico
    case "actualizar_facturas":
        //obtenemos los parametros del formulario :
        $idfactura = $_REQUEST['idfactura'];
        $idproveedor = $_REQUEST['idproveedor'];
        $idusuario = $_REQUEST['idusuario'];
        $valorfactura = $_REQUEST['valorfactura'];
        $fechafactura = $_REQUEST['fechafactura'];
        $ivafactura = $_REQUEST['ivafactura'];

        //actualizamos los datos del cliente:
        $crudModel->actualizarFcaturas($idfactura, $idproveedor, $idusuario, $valorfactura, $fechafactura, $ivafactura);
        //actualizamos lista de cliente:
        $listaFacturas = $crudModel->getFacturas();
        $_SESSION['listaFacturas'] = serialize($listaFacturas);
        //redireccionamos a una nueva pagina para visualizar el cambio:
        header('Location: ../view/facturas.php');
        break;
    //actualiza los datos de un empleados especifico
    case "actualizar_detalle":
        //obtenemos los parametros del formulario:
        $iddetalle = $_REQUEST['iddetalle'];
        $idproducto = $_REQUEST['idproducto'];
        $idfactura = $_REQUEST['idfactura'];
        $cantidadproducto = $_REQUEST['cantidadproducto'];
        $unidades = $_REQUEST['unidades'];
        $descuento = $_REQUEST['descuento'];
        $cantdescuento = $_REQUEST['cantdescuento'];

        //actualizamos los datos del empleado:
        $crudModel->actualizarDetalle($iddetalle, $idproducto, $idfactura, $cantidadproducto, $unidades, $descuento, $cantdescuento);
        //actualizamos lista de empleados:
        $listaDetalle = $crudModel->getDetalles();
        $_SESSION['listaDetalles'] = serialize($listaDetalle);
        //redireccionamos a una nueva pagina para visualizar el cambio:
        header('Location: ../view/facturas_1.php');
        break;

    case "listar_facturas":
        //obtenemos la lista de facturas y subimos a sesion:
        $_SESSION['listaFacturas'] = serialize($crudModel->getFacturas());
        $vec = $crudModel->getFacturas();
        $crudModel->getws();
                header('Location: ../view/COnsumoWS.php');

        break;

    // obtiene los datos de los login de la base de datos
    case "listar_logins":
        //obtenemos la lista de los logins:
        $listaLogins = $crudModel->getLogins();
        //y los guardamos en sesion:
        $_SESSION['listaLogins'] = serialize($listaLogins);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/logins.php');
        break;
    // crea un nuevo login
    case "crear_login":
        //obtenemos los parametros del formulario login:
        $idusuario = $_REQUEST['idusuario'];
        $passwordlogin = $_REQUEST['passwordlogin'];
        //creamos el nuevo registro:
        $crudModel->insertarLogin($idusuario, $passwordlogin);
        //actualizamos el listado:
        $listaLogins = $crudModel->getLogins();
        //y los guardamos en sesion:
        $_SESSION['listaLogins'] = serialize($listaLogins);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/logins.php');
        break;
    //elimina un login especifico
    case "eliminar_login":
        //obtenemos el codigo del login a eliminar:
        $idlogin = $_REQUEST['idlogin'];
        //eliminamos del formulario:
        try {
            $crudModel->eliminarLogin($idlogin);
        } catch (Exception $e) {
            //colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje'] = $e->getMessage();
        }
        //actualizamos la lista de logins para grabar en sesion:
        $listaLogins = $crudModel->getLogins();
        $_SESSION['listaLogins'] = serialize($listaLogins);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/logins.php');
        break;
    //edita los datos de un login especifico
    case "editar_login":
        //obtenemos los parametros del formulario login:
        $idlogin = $_REQUEST['idlogin'];
        //Buscamos los datos
        $listaLogins = $crudModel->getLogin($idlogin);
        //guardamos en sesion para edicion posterior:
        $_SESSION['listaLogins'] = serialize($listaLogins);
        //redirigimos la navegación al formulario de edicion login:
        header('Location: ../view/editarLogin.php');
        break;
    //actualiza los datos de un login especifico
    case "actualizar_login":
        //obtenemos los parametros del formulario login:
        $idusuario = $_REQUEST['idusuario'];
        $passwordlogin = $_REQUEST['passwordlogin'];
        $idlogin = $_REQUEST['idlogin'];

        //actualizamos los datos del login:
        $crudModel->actualizarLogin($idusuario, $passwordlogin, $idlogin);
        //actualizamos lista de login:
        $listaLogins = $crudModel->getLogins();
        $_SESSION['listaLogins'] = serialize($listaLogins);
        //redireccionamos a una nueva pagina para visualizar el cambio:
        header('Location: ../view/logins.php');
        break;

    // obtiene los datos de los productos de la base de datos
    case "listar_productos":
        //obtenemos la lista de productos:
        $listaProductos = $crudModel->getProductos();
        //y los guardamos en sesion:
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/productos.php');
        break;
    //crea un nuevo producto
    case "crear_producto":
        //obtenemos los parametros del formulario producto:
        $idproducto = $_REQUEST['idproducto'];
        $nombreproducto = $_REQUEST['nombreproducto'];
        $ivaproducto = $_REQUEST['ivaproducto'];
        $pvpproducto = $_REQUEST['pvpproducto'];
        //creamos el nuevo registro:
        $crudModel->insertarProducto($idproducto, $nombreproducto, $ivaproducto, $pvpproducto);
        //actualizamos el listado:
        $listaProductos = $crudModel->getProductos();
        //y los guardamos en sesion:
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/productos.php');
        break;
    //elimina un producto especifico
    case "eliminar_producto":
        //obtenemos el codigo del producto a eliminar:
        $idproducto = $_REQUEST['idproducto'];
        //eliminamos del formulario:
        try {
            $crudModel->eliminarProducto($idproducto);
        } catch (Exception $e) {
            //colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje1'] = $e->getMessage();
        }
        //actualizamos la lista de producto para grabar en sesion:
        $listaProductos = $crudModel->getProductos();
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/productos.php');
        break;
    //edita los datos de un producto especifico
    case "editar_producto":
        //obtenemos los parametros del formulario producto:
        $idproducto = $_REQUEST['idproducto'];
        //Buscamos los datos
        $listaProductos = $crudModel->getProducto($idproducto);
        //guardamos en sesion para edicion posterior:
        $_SESSION['listaProductos'] = serialize($listaProductos);
        echo $listaProductos->getNombreproducto();
        //redirigimos la navegación al formulario de edicion producto:
        header('Location: ../view/editarProducto.php');
        break;
    case "actualizar_producto":
        //obtenemos los parametros del formulario producto:
        $idproducto = $_REQUEST['idproducto'];
        $nombreproducto = $_REQUEST['nombreproducto'];
        $ivaproducto = $_REQUEST['ivaproducto'];
        $pvpproducto = $_REQUEST['pvpproducto'];

        //actualizamos los datos del producto:
        $crudModel->actualizarProducto($idproducto, $nombreproducto, $ivaproducto, $pvpproducto);
        //actualizamos lista de producto:
        $listaProductos = $crudModel->getProductos();
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar el cambio:
        header('Location: ../view/productos.php');
        break;

    case "primerReporte":
        header('Location: ../view/primerReporte.php');
        break;
    case "primerReporteListar":
        //obtenemos la lista de productos:
        $listaPR = $crudModel->getCajeros();
        //y los guardamos en sesion:
        $_SESSION['listaPR'] = serialize($listaPR);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/primerReporte.php');
        break;

    case "segundoReporte":
        header('Location: ../view/segundoReporte.php');
        break;
    case "segundoReporteListar":
        //obtenemos la lista de productos:
        $listaSR = $crudModel->getProveedoresCredito();
        //y los guardamos en sesion:
        $_SESSION['listaSR'] = serialize($listaSR);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/segundoReporte.php');
        break;

    case "tercerReporte":
        header('Location: ../view/tercerReporte.php');
        break;
    case "tercerReporteListar":
        //obtenemos la lista de productos:
        $fechainicio = $_REQUEST['fechainicio'];
        $fechafin = $_REQUEST['fechafin'];
        $listaTR = $crudModel->getFacturasFecha($fechainicio, $fechafin);
        //y los guardamos en sesion:
        $_SESSION['listaTR'] = serialize($listaTR);
        //redireccionamos a una nueva pagina para visualizar:
        
        header('Location: ../view/tercerReporte.php');
        break;

    case "adicionar_detalle":
        //obtenemos los parametros del formulario:
        $idProducto=$_REQUEST['idProducto'];
        $cantidad=$_REQUEST['cantidad'];
        if(!isset($_SESSION['listaFacturaDet'])){
            $listaFacturaDet=array();
        }else{
            $listaFacturaDet=unserialize($_SESSION['listaFacturaDet']);
        }
        try{
            $listaFacturaDet=$facturaModel->adicionarDetalle($listaFacturaDet, $idProducto, $cantidad);
            $_SESSION['listaFacturaDet']=serialize($listaFacturaDet);
        }catch(Exception $e){
            $mensajeError=$e->getMessage();
            $_SESSION['mensajeError']=$mensajeError;
        }
       // header('Location: ../view/Facturas.php');
        break;
    
//    default:
//        //si no existe la opcion recibida por el controlador, siempre
//        //redirigimos la navegacion a la pagina index:
//        header('Location: ../view/index.php');
//        break;
}