<?php
include_once 'Database.php';
include_once 'Facturas.php';
include_once 'Producto.php';
include_once 'CrudModel.php';
/**
 * Clase que implementa la logica de facturacion.
 *
 * @author mrea
 */
class FacturaModel {
    /**
     * Funcion que adiciona un nuevo producto en los detalles de una factura. La lista
     * de detalles se encuentra en memoria.
     * @param type $listaFacturaDet Lista de detalles de factura.
     * @param type $idProducto Codigo del producto.
     * @param type $cantidad La cantidad de compra.
     * @throws Exception
     * @return array
     */
    public function adicionarDetalle($listaFacturaDet,$idProducto,$cantidad){
        if($cantidad<=0){
            throw new Exception ("La cantidad debe ser mayor a cero.");
        }
        //buscamos el producto:
        $crudModel=new CrudModel();
        $producto=$crudModel->getProducto($idProducto);
        //creamos un nuevo detalle FacturaDet:
        $facturaDet=new DetalleFactura();
        $facturaDet->setIdProducto($producto->getIdProducto());
        $facturaDet->setNombreProducto($producto->getNombre());
        $facturaDet->setcantidadproducto($cantidad);
        $facturaDet->setPrecio($producto->getPvpproducto());
        $facturaDet->setPorcentajeIva($producto->getPorcentajeIva());
        $facturaDet->setSubtotal($cantidad * $producto->getPrecio());
        //adicionamos el nuevo detalle al array en memoria:
        if(!isset($listaFacturaDet)){
            $listaFacturaDet=array();
        }
        array_push($listaFacturaDet,$facturaDet);
        return $listaFacturaDet;
    }
    
    public function eliminarDetalle($listaFacturaDet,$idProducto){
        //buscamos el producto:
        $cont=0;
        foreach ($listaFacturaDet as $det) {
            if($det->getIdProducto()==$idProducto){
                unset($listaFacturaDet[$cont]);
                //reindexamos el array para eliminar el lugar vacio:
                $listaFacturaDet=  array_values($listaFacturaDet);
                break;
            }
            $cont++;
        }
        return $listaFacturaDet;
    }
    
    public function calcularBaseImponible($listaFacturaDet){
        if(!isset($listaFacturaDet)){
            return 0;
        }
        $baseImponible=0;
        foreach ($listaFacturaDet as $facturaDet) {
            if($facturaDet->getPorcentajeIva()>0){
                $baseImponible+=$facturaDet->getSubtotal();
            }
        }
        return $baseImponible;
    }
    
    public function calcularBaseNoImponible($listaFacturaDet){
        if(!isset($listaFacturaDet)){
            return 0;
        }
        $baseNoImponible=0;
        foreach ($listaFacturaDet as $facturaDet) {
            if($facturaDet->getPorcentajeIva()==0){
                $baseNoImponible+=$facturaDet->getSubtotal();
            }
        }
        return $baseNoImponible;
    }
    
    public function calcularIva($listaFacturaDet){
        if(!isset($listaFacturaDet)){
            return 0;
        }
        $iva=0;
        foreach ($listaFacturaDet as $facturaDet) {
            if($facturaDet->getPorcentajeIva()>0){
                $iva+=$facturaDet->getSubtotal()*$facturaDet->getPorcentajeIva()/100;
            }
        }
        return round($iva,2);
    }
    
    public function calcularTotal($listaFacturaDet){
        if(!isset($listaFacturaDet)){
            return 0;
        }
        $total= $this->calcularBaseImponible($listaFacturaDet) +
                $this->calcularBaseNoImponible($listaFacturaDet) +
                $this->calcularIva($listaFacturaDet);
        return $total;
    }
    
    public function ultimoNumeroFactura(){
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();
        $sql = "select max(idfactura) numero from facturas";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();
        //obtenemos el registro especifico:
        $res=$consulta->fetch(PDO::FETCH_ASSOC);
        $numero=$res['idfactura'];
        Database::disconnect();
        //retornamos el numero encontrado:
        if(!isset($numero))
            return 0;
        return $numero;
    }
    
    public function guardarFactura($listaFacturaDet,$idprov,$idusuario){
        if(!isset($listaFacturaDet)){
            throw new Exception("Debe por lo menos registrar un producto.");
        }
        if(count($listaFacturaDet)==0){
            throw new Exception("Debe por lo menos registrar un producto.");
        }
        if(!isset($idprov)){
            throw new Exception("Debe seleccionar el proveedor.");
        }
                if(!isset($idusuario)){
            throw new Exception("Debe seleccionar el usuario.");
        }

        //obtenemos los datos completos del cliente:
        $crudModel=new CrudModel();
        $cliente=$crudModel->getCliente($cedula);
        //creamos la nueva factura:
        $facturaCab = new Facturas();
        $facturaCab->setIdproveedor($idprov);
        $facturaCab->setIdusuario($idusuario);
        $facturaCab->setFecha(date('Y-m-d'));
        $facturaCab->setBaseImponible($this->calcularBaseImponible($listaFacturaDet));
        $facturaCab->setBaseNoImponible($this->calcularBaseNoImponible($listaFacturaDet));
        $facturaCab->setIvafactura($this->calcularIva($listaFacturaDet));
        $facturaCab->setValorfactura($this->calcularTotal($listaFacturaDet));
        //obtenemos el siguiente numero de factura:
        $facturaCab->setIdFacturaCab($this->ultimoNumeroFactura()+1);
        //guardar la cabecera:
        $pdo = Database::connect();
        $sql = "insert into factura(idfactura,fechafactura,idproveedor,idusuario,valorfactura,ivafactura) values(?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($facturaCab->getIdFactura(),
                                     $facturaCab->getFechafactura(),
                                     $facturaCab->getIdproveedor(),
                                     $facturaCab->getIdusuario(),
                                     $facturaCab->getValorfactura(),
                                     $facturaCab->getIvafactura()));
            //guardamos los detalles:
            foreach ($listaFacturaDet as $det){
                $sql = "insert into detallefacturacion(idproducto,idfactura,cantidadproducto,unidades,descuento,cantdescuento) values(?,?,?,?,?,?)";
                $consulta = $pdo->prepare($sql);
                //en cada detalle asignamos el numero de factura padre:
                $consulta->execute(array($det->getIdProducto(),
                    $facturaCab->getIdFactura(),
                                     $det->getPrecio(),
                                     $det->getCantidad(),
                                     $det->getPorcentajeIva(),
                                     $det->getSubtotal()));
            }
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
        return $facturaCab;
    }
    
}
