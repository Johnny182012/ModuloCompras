<?php

include_once 'Database.php';

include_once 'Pedido.php';
include_once 'Producto.php';
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
    //////////////////////////
    //CRUD FCATURAS:        //
    //////////////////////////

    /**
     * Retorna la lista de clientes de la bdd.
     * @return array
     */
    public function getFacturas() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from facturas ";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $facturas = new Facturas($res['idfactura'], $res['idproveedor'], $res['idusuario'], $res['valorfactura'], $res['fechafactura'], $res['ivafactura']);
            array_push($listado, $facturas);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    /**
     * Busca la informacion de un cliente especifico.
     * @param type $IDCliente El numero de $IDCliente del cliente.
     * @return type
     */
    public function getFactura($idfactura) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from facturas where idfactura=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idfactura));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $facturas = new Facturas($res['idfactura'], $res['idproveedor'], $res['idusuario'], $res['valorfactura'], $res['fechafactura'], $res['ivafactura']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $facturas;
    }

    /**
     * Inserta un nuevo cliente en la bdd.
     * 
     */
    public function insertarFacturas($idfactura, $idproveedor, $idusuario, $valorfactura, $fechafactura, $ivafactura) {
        $pdo = Database::connect();
        $sql = "insert into facturas(idfactura,idproveedor,idusuario,valorfactura,fechafactura,ivafactura) values(?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idfactura, $idproveedor, $idusuario, $valorfactura, $fechafactura, $ivafactura));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    /**
     * Actualiza un cliente existente.
     * 
     */
    public function actualizarFcaturas($idfactura, $idproveedor, $idusuario, $valorfactura, $fechafactura, $ivafactura) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update facturas set idproveedor=?,idusuario=?,valorfactura=?,fechafactura=?,ivafactura=?  where idfactura=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idproveedor, $idusuario, $valorfactura, $fechafactura, $ivafactura, $idfactura));
        Database::disconnect();
    }

    //////////////////////////
    // CRUD DETALLE FACTURAS:      //
    //////////////////////////
    /**
     * Retorna la lista de empleados de la bdd.
     * @return array
     */
    public function getDetalles() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from detallefacturacion ";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $detalle = new DetalleFactura($res['iddetalle'], $res['idproducto'], $res['idfactura'], $res['cantidadproducto'], $res['unidades'], $res['descuento'], $res['cantdescuento']);
            array_push($listado, $detalle);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    /**
     * Busca la informacion de un empleado especifico.
     * @param type $IDEmpleado El numero de $IDEmpleado del cliente.
     * @return type
     */
    public function getDetalle($iddetalle) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from detallefacturacion where iddetalle=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($iddetalle));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $detalle = new DetalleFactura($res['iddetalle'], $res['idproducto'], $res['idfactura'], $res['cantidadproducto'], $res['unidades'], $res['descuento'], $res['cantdescuento']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $detalle;
    }

    /**
     * Inserta un nuevo empleado en la bdd.
     * 
     */
    public function insertarDetalle($iddetalle, $idproducto, $idfactura, $cantidadproducto, $unidades, $descuento, $cantdescuento) {
        $pdo = Database::connect();
        $sql = "insert into detallefacturacion(iddetalle,idproducto,idfactura,cantidadproducto,unidades,descuento,cantdescuento) values(?,?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($iddetalle, $idproducto, $idfactura, $cantidadproducto, $unidades, $descuento, $cantdescuento));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    /**
     * Actualiza un empleado existente.

     */
    public function actualizarDetalle($iddetalle, $idproducto, $idfactura, $cantidadproducto, $unidades, $descuento, $cantdescuento) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update detallefacturacion set idproducto=?,idfactura=?,cantidadproducto=?,unidades=?,descuento=?,cantdescuento=?  where iddetalle=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idproducto, $idfactura, $cantidadproducto, $unidades, $descuento, $cantdescuento, $iddetalle));
        Database::disconnect();
    }

    //////////////////////////
    //CRUD: LOGIN          //
    /////////////////////////

    /**
     * Retorna la lista de login de la bdd.
     * @return array
     */
    public function getLogins() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from login";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $login = new Login($res['idusuario'], $res['idlogin'], $res['passwordlogin']);
            array_push($listado, $login);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    /**
     * Busca la informacion de un login en especifico.
     * @param type $idlogin El numero de $idlogin del login.
     * @return type
     */
    public function getLogin($idlogin) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from login where idlogin=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idlogin));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $login = new Login($res['idusuario'], $res['idlogin'], $res['passwordlogin']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $login;
    }

    /**
     * Inserta un nuevo login en la bdd.
     * 
     */
    public function insertarLogin($idusuario, $passwordlogin) {
        $pdo = Database::connect();
        $sql = "insert into login(idusuario,passwordlogin) values(?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idusuario, $passwordlogin));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    /**
     * Actualiza un login existente.
     * 
     */
    public function actualizarLogin($idusuario, $idlogin, $passwordlogin) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update login set idusuario=?,passwordlogin=? where idlogin=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($idusuario, $passwordlogin, $idlogin));
        Database::disconnect();
    }

    /**
     * Elimina un login especifico de la bdd.
     * @param type $idlogin
     */
    public function eliminarLogin($idlogin) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from login where idlogin=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
            $consulta->execute(array($idlogin));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    //////////////////////////
    //CRUD: PRODUCTOS      //
    /////////////////////////

    /**
     * Retorna la lista de productos de la bdd.
     * @return array
     */
    public function getProductos() {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from productos";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos:
        $listado = array();
        foreach ($resultado as $res) {
            $producto = new Producto($res['idproducto'], $res['nombreproducto'], $res['pvpproducto'], $res['ivaproducto']);
            array_push($listado, $producto);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }

    /**
     * Busca la informacion de un login en especifico.
     * @param type $idproducto El numero de $idproducto del productos.
     * @return type
     */
    public function getProducto($idproducto) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from productos where idproducto=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idproducto));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $producto = new Producto($res['idproducto'], $res['nombreproducto'], $res['pvpproducto'], $res['ivaproducto']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $producto;
    }

    /**
     * Inserta un nuevo producto en la bdd.
     * 
     */
    public function insertarProducto($idproducto, $nombreproducto, $pvpproducto, $ivaproducto) {
        $pdo = Database::connect();
        $sql = "insert into productos(idproducto,nombreproducto,pvpproducto, ivaproducto) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($idproducto, $nombreproducto, $pvpproducto, $ivaproducto));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    /**
     * Actualiza un producto existente.
     * 
     */
    public function actualizarProducto($idproducto, $nombreproducto, $pvpproducto, $ivaproducto) {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update productos set nombreproducto=?,pvpproducto=?,ivaproducto=? where idproducto=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($nombreproducto, $pvpproducto, $ivaproducto, $idproducto));
        Database::disconnect();
    }

    /**
     * Elimina un producto especifico de la bdd.
     * @param type $idproducto
     */
    public function eliminarProducto($idproducto) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from productos where idproducto=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
            $consulta->execute(array($idproducto));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
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
            $usuario = new Usuario($res['idusuario'], $res['tipoidusuario'], $res['rolusuario'], $res['nombreusuario'], $res['fecnacusuario'], $res['ciunacusuario'], $res['direccionusuario'], $res['telefonousuario'], $res['emailusuario'], $res['estadousuario']);
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
        $usuario = new Usuario($res['idusuario'], $res['tipoidusuario'], $res['rolusuario'], $res['nombreusuario'], $res['fecnacusuario'], $res['ciunacusuario'], $res['direccionusuario'], $res['telefonousuario'], $res['emailusuario'], $res['estadousuario']);
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
        $sql = "insert into usuario(idusuario, tipoidusuario, rolusuario, nombreusuario, fecnacusuario, ciunacusuario, direccionusuario, telefonousuario, emailusuario, estadousuario) values(?,?,?,?,?,?,?,??,?)";
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
        $consulta->execute(array($tipoidusuario, $rolusuario, $nombreusuario, $fecnacusuario, $ciunacusuario, $direccionusuario, $telefonousuario, $emailusuario, $estadousuario, $idusuario));
        Database::disconnect();
    }

    /**
     * Elimina un usuario especifico de la bdd.
     * @param type $idusuario
     */
    public function eliminarUsuario($idusuario) {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from usuario where idusuario=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        try {
            $consulta->execute(array($idusuario));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

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

    ////////////// datos para el producto

    public function getLoginU($idusuario) {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select * from login where idusuario=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($idusuario));
        //obtenemos el registro especifico:
        $res = $consulta->fetch(PDO::FETCH_ASSOC);
        $login = new Login($res['idusuario'], $res['idlogin'], $res['passwordlogin']);
        Database::disconnect();
        //retornamos el objeto encontrado:
        return $login;
    }

}
