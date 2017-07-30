<?php

include_once 'Database.php';

include_once 'Proveedor.php';
include_once 'Usuario.php';
include_once 'Facturas.php';
include_once 'DetalleFactura.php';

/**
 * Clase para el manejo CRUD de clientes,empleado,buses y pedidos
 *
 * @author Gaby
 */
class CrudModel {

    /**
     * Retorna la lista de clientes de la bdd.
     * @return array
     */

    
     //////////////////////////
    // CRUD PROVEEDORES:      //
    //////////////////////////
    /**
     * Retorna la lista de proveedores de la bdd.
     * @return array
     */
    public function getProveedores() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from proveedor order by nombreproveedor";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $proveedor = new Proveedor($res['idproveedor'], $res['tipoidproveedor'], $res['nombreproveedor'], $res['fecnacproveedor'], $res['ciudnacproveedor'], $res['tipoproveedor'], $res['direccionproveedor'], $res['telefonoproveedor'], $res['emailproveedor'], $res['estadoproveedor']);
            array_push($listado, $proveedor);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    /**
     * Busca la informacion de un cliente especifico.
     * @param type $idproveedor El numero de $idproveedor del proveedor.
     * @return type
     */
    public function getProveedor($idproveedor) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from proveedor where idproveedor=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idproveedor));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $proveedor = new Proveedor($res['idproveedor'], $res['tipoidproveedor'], $res['nombreproveedor'], $res['fecnacproveedor'], $res['ciudnacproveedor'], $res['tipoproveedor'], $res['direccionproveedor'], $res['telefonoproveedor'], $res['emailproveedor'], $res['estadoproveedor']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $proveedor;
    }

    /**
     * Inserta un nuevo proveedor en la bdd.
     * 
     */
    public function insertarProveedor($idproveedor, $tipoidproveedor, $nombreproveedor, $fecnacproveedor, $ciudnacproveedor, $tipoproveedor, $direccionproveedor, $telefonoproveedor, $emailproveedor, $estadoproveedor) {
        $pdo = Database::connect();
        $sql = "insert into proveedor(idproveedor,tipoidproveedor,nombreproveedor,fecnacproveedor, ciudnacproveedor, tipoproveedor, direccionproveedor,telefonoproveedor,emailproveedor,estadoproveedor) values(?,?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idproveedor, $tipoidproveedor, $nombreproveedor, $fecnacproveedor, $ciudnacproveedor, $tipoproveedor, $direccionproveedor, $telefonoproveedor, $emailproveedor, $estadoproveedor));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    /**
     * Elimina un proveedor especifico de la bdd.
     * @param type $idproveedor
     */
    public function eliminarProveedor($idproveedor) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from proveedor where idproveedor=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
            $consulta->execute(array($idproveedor));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    /**
     * Actualiza un proveedor existente.

     */
    public function actualizarProveedor($idproveedor, $tipoidproveedor, $nombreproveedor, $fecnacproveedor, $ciudnacproveedor, $tipoproveedor, $direccionproveedor, $telefonoproveedor, $emailproveedor, $estadoproveedor) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update proveedor set tipoidproveedor=?,nombreproveedor=?,fecnacproveedor=?,ciudnacproveedor=?,tipoproveedor=?,direccionproveedor=?,telefonoproveedor=?,emailproveedor=?,estadoproveedor=?  where idproveedor=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idproveedor, $tipoidproveedor, $nombreproveedor, $fecnacproveedor, $ciudnacproveedor, $tipoproveedor, $direccionproveedor, $telefonoproveedor, $emailproveedor, $estadoproveedor));
        Database::disconnect();
    }

    //////////////////////////
    //CRUD: USUARIOS       //
    /////////////////////////

    /**
     * Retorna la lista de usuarios de la bdd.
     * @return array
     */
    public function getUsuarios() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from usuario";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $usuario = new Usuario($res['idusuario'], $res['tipoidusuario'], $res['rolusuario'], $res['nombreusuario'],
                    $res['fecnacusuario'],$res['ciunacusuario'], $res['direccionusuario'], $res['telefonousuario'], 
                    $res['emailusuario'], $res['estadousuario']);
            array_push($listado, $usuario);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    /**
     * Busca la informacion de un usuario en especifico.
     * @param type $idusuario El numero de $idusuario del productos.
     * @return type
     */
    public function getUsuario($idusuario) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from usuario where idusuario=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idusuario));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $usuario = new Usuario($res['idusuario'], $res['tipoidusuario'], $res['rolusuario'], $res['nombreusuario'],
                    $res['fecnacusuario'],$res['ciunacusuario'], $res['direccionusuario'], $res['telefonousuario'], 
                    $res['emailusuario'], $res['estadousuario']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $usuario;
    }

    /**
     * Inserta un nuevo usuario en la bdd.
     * 
     */
    public function insertarUsuario($idusuario, $tipoidusuario, $rolusuario, $nombreusuario, $fecnacusuario, $ciunacusuario, $direccionusuario, $telefonousuario, $emailusuario, $estadousuario) {
        $pdo = Database::connect();
        $sql = "insert into usuario(idusuario, tipoidusuario, rolusuario, nombreusuario, fecnacusuario, ciunacusuario, direccionusuario, telefonousuario, emailusuario, estadousuario) values(?,?,?,?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idusuario, $tipoidusuario, $rolusuario, $nombreusuario, $fecnacusuario, $ciunacusuario, $direccionusuario, $telefonousuario, $emailusuario, $estadousuario));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    /**
     * Actualiza un usuario existente.
     * 
     */
    public function actualizarUsuario($idusuario, $tipoidusuario, $rolusuario, $nombreusuario, $fecnacusuario, $ciunacusuario, $direccionusuario, $telefonousuario, $emailusuario, $estadousuario) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update usuario set tipoidusuario=?,rolusuario=?,nombreusuario=?,fecnacusuario=?,ciunacusuario=?,direccionusuario=?,telefonousuario=?,emailusuario=?,estadousuario=? where idusuario=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($tipoidusuario, $rolusuario, $nombreusuario, $fecnacusuario, $ciunacusuario, $direccionusuario, $telefonousuario, $emailusuario, $estadousuario,$idusuario));
        Database::disconnect();
    }
    
    /**
     * Elimina un usuario especifico de la bdd.
     * @param type $idusuario
     */
    public function eliminarUsuario($idusuario){
        //Preparamos la conexion a la bdd:
        $pdo=Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="delete from usuario where idusuario=?";
        $consulta=$pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
                try{
            $consulta->execute(array($idusuario));
        }  catch (PDOException $e){
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    ///facturas lista
    public function getFacturas(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from facturas order by idfactura desc";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $factura = new Facturas();
            $factura->setIdfactura($res['idfactura']);
            $factura->setIdproveedor($res['idproveedor']);
            $factura->setIdusuario($res['idusuario']);
            $factura->setValorfactura($res['valorfactura']);
            $factura->setFechafactura($res['fechafactura']);
            $factura->setIvafactura($res['ivafactura']);
            
            array_push($listado, $factura);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
}
