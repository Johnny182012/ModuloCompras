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

    // obtiene los datos de los usuarios de la base de datos
    case "listar_usuarios":
        //obtenemos la lista de usuarios:
        $listaUsuarios = $crudModel->getUsuarios();
        //y los guardamos en sesion:
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        //redireccionamos a una nueva pagina para visualizar:
        header('Location: ../view/usuarios.php');
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
        header('Location: ../view/usuarios.php');
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
        header('Location: ../view/usuarios.php');
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
        header('Location: ../view/proveedor.php');
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
        $crudModel->insertarProveedor($idproveedor, $tipoidproveedor, $nombreproveedor,$fecnacproveedor, $ciudnacproveedor, $tipoproveedor, $direccionproveedor, $telefonoproveedor,$emailproveedor,$estadoproveedor);
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
    
    case "guardar_proveedor":
        //obtenemos los parametros del formulario:
        $idproveedor=$_REQUEST['idproveedor'];
        if(isset($_SESSION['listaProveedores'])){
            $listaProveedores=unserialize($_SESSION['listaProveedores']);
            try {
                $listaProveedores=$crudModel->guardarProveedor($listaProveedores, $idproveedor);
                $_SESSION['listaProveedores']=$listaProveedores;
                header('Location: ../view/proveedor_reporte.php');
                break;
            } catch (Exception $e) {
                $mensajeError=$e->getMessage();
                $_SESSION['mensajeError']=$mensajeError;
            }
        }
        //actualizamos lista de facturas:
        //$listado = $gastosModel->getFacturas();
        //$_SESSION['listado'] = serialize($listado);
        header('Location: ../view/proveedor.php');
        break;
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
}