<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada          //
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas//
///////////////////////////////////////////////////////////////////////
require_once '../model/CrudModel.php';

session_start();
//instanciamos los objetos del pedido:
$crudModel = new CrudModel();

//recibimos la opcion desde la vista:
$opcion = $_REQUEST['opcion'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);
unset($_SESSION['mensaje1']);
unset($_SESSION['mensaje2']);

switch ($opcion) {
    //    -------------------LISTAR---------------------
    // obtiene los datos de los clientes de la base de datos
    case "listar_facturas":
        //obtenemos la lista de los clientes:
        $listaFacturas = $crudModel->getFacturas();
        //y los guardamos en sesion:
        $_SESSION['listaFacturas'] = serialize($listaFacturas);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/facturas.php');
        break;
    // obtiene los datos de los empleados de la base de datos
    case "listar_Detalle":
        //obtenemos la lista de empleados:
        $listaDetalle = $crudModel->getDetalles();
        //y los guardamos en sesion:
        $_SESSION['listaFacturas'] = serialize($listaDetalle);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/facturas_1.php');
        break;
    
//    -------------------CREAR---------------------
    // crea un nuevo cliente
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
    //    ---------------DIRECCIONAR-------------------
    case "loginI":
        header('Location: ../view/logins.php');
        break;
    case "productoI":
        header('Location: ../view/productos.php');
        break;
    case "usuarioI":
        header('Location: ../view/usuarios.php');
        break;
    
    //    -------------------LISTAR---------------------
    // obtiene los datos de los login de la base de datos
    case "listar_logins":
        //obtenemos la lista de los logins:
        $listaLogins = $crudModel->getLogins();
        //y los guardamos en sesion:
        $_SESSION['listaLogins'] = serialize($listaLogins);
        //redireccionamos a una nueva pagina para visualizar:
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
    // obtiene los datos de los usuarios de la base de datos
    case "listar_usuarios":
        //obtenemos la lista de usuarios:
        $listaUsuarios = $crudModel->getUsuarios();
        //y los guardamos en sesion:
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/tabla.php');
        break;
//    -------------------CREAR---------------------
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
    //crea un nuevo producto
    case "crear_producto":
        //obtenemos los parametros del formulario producto:
        $idproducto = $_REQUEST['idproducto'];
        $nombreproducto = $_REQUEST['nombreproducto'];
        $pvpproducto = $_REQUEST['pvpproducto'];
        $ivaproducto = $_REQUEST['ivaproducto'];
        //creamos el nuevo registro:
        $crudModel->insertarProducto($idproducto, $nombreproducto, $pvpproducto, $ivaproducto);
        //actualizamos el listado:
        $listaProductos = $crudModel->getProductos();
        //y los guardamos en sesion:
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/productos.php');
        break;
    //crea un nuevo usuario
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
        header('Location: ../view/crearusuario.php');
        break;

    //------------------------------ELIMINAR-----------------------
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
        $listaProductos= $crudModel->getProductos();
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/productos.php');
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
        header('Location: ../view/usuarios.php');
        break;
    //---------------------------EDTTA----------------------------
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
    //edita los datos de un producto especifico
    case "editar_producto":
        //obtenemos los parametros del formulario producto:
        $idproducto = $_REQUEST['idproducto'];
        //Buscamos los datos
        $listaProductos = $crudModel->getProducto($idproducto);
        //guardamos en sesion para edicion posterior:
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redirigimos la navegación al formulario de edicion producto:
        header('Location: ../view/editarProducto.php');
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
        header('Location: ../view/editarUsuario.php');
        break;
//----------------------ACTUALIZA------------------
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
    //actualiza los datos de un producto especifico
    case "actualizar_producto":
        //obtenemos los parametros del formulario producto:
        $idproducto = $_REQUEST['idproducto'];
        $nombreproducto = $_REQUEST['nombreproducto'];
        $pvpproducto = $_REQUEST['pvpproducto'];
        $ivaproducto = $_REQUEST['ivaproducto'];

        //actualizamos los datos del producto:
        $crudModel->actualizarProducto($idproducto, $nombreproducto, $pvpproducto, $ivaproducto);
        //actualizamos lista de producto:
        $listaProductos = $crudModel->getProductos();
        $_SESSION['listaProductos'] = serialize($listaProductos);
        //redireccionamos a una nueva pagina para visualizar el cambio:
        header('Location: ../view/editarProducto.php');
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
        $direccionusuario = $_REQUEST['idusuario'];
        $telefonousuario = $_REQUEST['telefonousuario'];
        $emailusuario = $_REQUEST['emailusuario'];
        $estadousuario = $_REQUEST['estadousuario'];
        
        //actualizamos los datos del usuario:
        $crudModel->actualizarUsuario($idusuario, $tipoidusuario, $rolusuario, $nombreusuario, $fecnacusuario, $ciunacusuario, $direccionusuario, $telefonousuario, $emailusuario, $estadousuario);
        //actualizamos lista de usuario:
        $listaUsuarios = $crudModel->getUsuarios();
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        //redireccionamos a una nueva pagina para visualizar el cambio:
        header('Location: ../view/usuarios.php');
        break;
    ///proveedor
        //    -------------------LISTAR---------------------
    // obtiene los datos de los proveedores de la base de datos
    case "listar_proveedores":
        //obtenemos la lista de empleados:
        $listaProveedores = $crudModel->getProveedores();
        //y los guardamos en sesion:
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/proveedores.php');
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
        $crudModel->insertarProveedor($idproveedor, $tipoidproveedor, $nombreproveedor,$fecnacproveedor, $ciudnacproveedor, 
                $tipoproveedor, $direccionproveedor, $telefonoproveedor,$emailproveedor,$estadoproveedor);
        //actualizamos el listado:
        $listaProveedores = $crudModel->getProveedores();
        //y los guardamos en sesion:
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/proveedor.php');
        break;
    
     //elimina un empleado especifico
    case "eliminar_proveedor":
        //obtenemos el codigo del empleado a eliminar:
        $idproveedor = $_REQUEST['idproveedor'];
        //eliminamos del formulario:
         try{
            $crudModel->eliminarProveedor($idproveedor);
        }catch(Exception $e){
            //colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje1']=$e->getMessage();
        }
        //actualizamos la lista de empleados para grabar en sesion:
        $listaProveedores = $crudModel->getProveedores();
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/proveedor.php');
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
    case "nuevo_pedido":
       //guardamos obtenemos los datos de la base
        $listaUsuarios = $crudModel->getUsuarios();
        $listaProveedores = $crudModel->getProveedores();
        $listaProductos = $crudModel->getProductos();
        
        //y los guardamos en sesion:
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        $_SESSION['listaProductos'] = serialize($listaProductos);
        
        header('Location: ../view/crearFactura.php');
        break;
    case "reporte":
        //obtenemos los parametros del formulario: 
        $idfactura = $_REQUEST['idfactura'];
        $idproveedor= $_REQUEST['idproveedor'];
        $idusuario = $_REQUEST['idusuario'];
        $valorfactura = $_REQUEST['valorfactura'];
        $fechafactura = $_REQUEST['fechafactura'];
        $ivafactura = $_REQUEST['ivafactura'];
        
        $iddetalle = $_REQUEST['iddetalle'];
        $idproducto = $_REQUEST['idproducto'];
        $cantidadproducto =$_REQUEST['cantidadproducto'];
        $unidades = $_REQUEST['unidades'];
        $descuento =$_REQUEST['descuento'];
        $cantdescuento =$_REQUEST['cantdescuento'];
        
        //guardamos en session
        $_SESSION['idfactura'] = serialize($idfactura);
        $_SESSION['idproveedor'] = serialize($idproveedor);
        $_SESSION['idusuario'] = serialize($idusuario);
        $_SESSION['valorfactura'] = serialize($valorfactura);
        $_SESSION['fechafactura'] = serialize($fechafactura);
        $_SESSION['ivafactura'] = serialize($ivafactura);
        
        $_SESSION['iddetalle'] = serialize($iddetalle);
        $_SESSION['idproducto'] = serialize($idproducto);
        $_SESSION['cantidadproducto'] = serialize($cantidadproducto);
        $_SESSION['unidades'] = serialize($unidades);
        $_SESSION['descuento'] = serialize($descuento);
        $_SESSION['cantdescuento'] = serialize($cantdescuento);
        header('Location: ../view/factura_reporte.php');
        break;
    
    
    
    
    
    //actualiza los datos de un empleados especifico
     case "actualizar_pedido":
        //obtenemos los parametros del formulario:
        $IDPedido = $_REQUEST['IDPedido'];
        $IDCliente = $_REQUEST['IDCliente'];
        $IDEmpleado = $_REQUEST['IDEmpleado'];
        $fechaPedido = $_REQUEST['fechaPedido'];
        $fechaEntrega = $_REQUEST['fechaEntrega'];
        $fechaEnvio = $_REQUEST['fechaEnvio'];
        $IDBus = $_REQUEST['IDBus'];
        $productoDestinatario = $_REQUEST['productoDestinatario'];
        $nombreDestinatario = $_REQUEST['nombreDestinatario'];
        $apellidoDestinatario = $_REQUEST['apellidoDestinatario'];
        $direccionDestino = $_REQUEST['direccionDestino'];
        $ciudadDestino = $_REQUEST['ciudadDestino'];
        //actualizamos el pedido:
        $crudModel->actualizarPedido($IDPedido, $IDCliente, $IDEmpleado, $fechaPedido, $fechaEntrega, $fechaEnvio, $IDBus, $productoDestinatario, $nombreDestinatario, $apellidoDestinatario, $direccionDestino, $ciudadDestino);
        //actualizamos lista de pedidos:
        $listaPedidos = $crudModel->getPedidos();
        $_SESSION['listaPedidos'] = serialize($listaPedidos);
        header('Location: ../view/crearPedido.php');
        break;
    //------------------------------------------------------------------------
    case "nuevo_pedido":
       //guardamos obtenemos los datos de la base
        $listaUsuarios = $crudModel->getUsuarios();
        $listaProveedores = $crudModel->getProveedores();
        $listaProductos = $crudModel->getProductos();
        
        //y los guardamos en sesion:
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        $_SESSION['listaProveedores'] = serialize($listaProveedores);
        $_SESSION['listaProductos'] = serialize($listaProductos);
        
        header('Location: ../view/crearFactura.php');
        break;
 
    //------------------------------------------------------------------------
    case "listar_pedidos":
//      
        $listaPedidos = $crudModel->getPedidos();
        //y los guardamos en sesion:
        $_SESSION['listaPedidos'] = serialize($listaPedidos);
        header('Location: ../view/pedidos.php');
        break;
//---------------------------------------------------------------------------->
    
    case "cancelar":
        //redireccionamos a otra pagina para editar los datos del pedido
        header('Location: ../view/crearPedido_1.php');
        break;
    
    case "insertar_pedido":
        
        //obtenemos los parametros del formulario:
       $IDCliente= unserialize($_SESSION['IDCliente']);
        $IDEmpleado=  unserialize($_SESSION['IDEmpleado']);
        $fechaPedido=  unserialize($_SESSION['fechaPedido']);
        $fechaEntrega= unserialize($_SESSION['fechaEntrega']);
        $fechaEnvio=  unserialize($_SESSION['fechaEnvio']);
        $IDBus=  unserialize($_SESSION['IDBus']);
        $productoDestinatario= unserialize($_SESSION['productoDestinatario']);
        $nombreDestinatario=  unserialize($_SESSION['nombreDestinatario']);
        $apellidoDestinatario=  unserialize($_SESSION['apellidoDestinatario']);
        $direccionDestino=  unserialize( $_SESSION['direccionDestino']);
        $ciudadDestino=  unserialize($_SESSION['ciudadDestino']);
        //creamos el nuevo pedido:
        $crudModel->insertarPedido( $IDCliente, $IDEmpleado, $fechaPedido, $fechaEntrega, $fechaEnvio, $IDBus,$productoDestinatario, $nombreDestinatario, $apellidoDestinatario, $direccionDestino, $ciudadDestino);
        //actualizamos el listado:
        $listaPedidos = $crudModel->getPedidos();
        //y los guardamos en sesion:
        $_SESSION['listaPedidos'] = serialize($listaPedidos);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/pedidos.php');
        break;

    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
}

