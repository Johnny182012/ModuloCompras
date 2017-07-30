<?php


/**
 * Description of Pedido
 *Clase que representa a la tabla “pedido”. También se los llama “objetos de dominio” o “entidades”.
 * @author Gaby
 */
class Pedido {
    private $IDPedido;
    private $IDCliente;
    private $IDEmpleado;
    private $fechaPedido;
    private $fechaEntrega;
    private $fechaEnvio;
    private $IDBus;
    private $productoDestinatario;
    private $nombreDestinatario;
    private $apellidoDestinatario;
    private $direccionDestino;
    private $ciudadDestino;
    
    function __construct($IDPedido, $IDCliente, $IDEmpleado, $fechaPedido, $fechaEntrega, $fechaEnvio, $IDBus, $productoDestinatario, $nombreDestinatario, $apellidoDestinatario, $direccionDestino, $ciudadDestino) {
        $this->IDPedido = $IDPedido;
        $this->IDCliente = $IDCliente;
        $this->IDEmpleado = $IDEmpleado;
        $this->fechaPedido = $fechaPedido;
        $this->fechaEntrega = $fechaEntrega;
        $this->fechaEnvio = $fechaEnvio;
        $this->IDBus = $IDBus;
        $this->productoDestinatario = $productoDestinatario;
        $this->nombreDestinatario = $nombreDestinatario;
        $this->apellidoDestinatario = $apellidoDestinatario;
        $this->direccionDestino = $direccionDestino;
        $this->ciudadDestino = $ciudadDestino;
    }
    
    function getIDPedido() {
        return $this->IDPedido;
    }

    function getIDCliente() {
        return $this->IDCliente;
    }

    function getIDEmpleado() {
        return $this->IDEmpleado;
    }

    function getFechaPedido() {
        return $this->fechaPedido;
    }

    function getFechaEntrega() {
        return $this->fechaEntrega;
    }

    function getFechaEnvio() {
        return $this->fechaEnvio;
    }

    function getIDBus() {
        return $this->IDBus;
    }

    function getProductoDestinatario() {
        return $this->productoDestinatario;
    }

    function getNombreDestinatario() {
        return $this->nombreDestinatario;
    }

    function getApellidoDestinatario() {
        return $this->apellidoDestinatario;
    }

    function getDireccionDestino() {
        return $this->direccionDestino;
    }

    function getCiudadDestino() {
        return $this->ciudadDestino;
    }

    function setIDPedido($IDPedido) {
        $this->IDPedido = $IDPedido;
    }

    function setIDCliente($IDCliente) {
        $this->IDCliente = $IDCliente;
    }

    function setIDEmpleado($IDEmpleado) {
        $this->IDEmpleado = $IDEmpleado;
    }

    function setFechaPedido($fechaPedido) {
        $this->fechaPedido = $fechaPedido;
    }

    function setFechaEntrega($fechaEntrega) {
        $this->fechaEntrega = $fechaEntrega;
    }

    function setFechaEnvio($fechaEnvio) {
        $this->fechaEnvio = $fechaEnvio;
    }

    function setIDBus($IDBus) {
        $this->IDBus = $IDBus;
    }

    function setProductoDestinatario($productoDestinatario) {
        $this->productoDestinatario = $productoDestinatario;
    }

    function setNombreDestinatario($nombreDestinatario) {
        $this->nombreDestinatario = $nombreDestinatario;
    }

    function setApellidoDestinatario($apellidoDestinatario) {
        $this->apellidoDestinatario = $apellidoDestinatario;
    }

    function setDireccionDestino($direccionDestino) {
        $this->direccionDestino = $direccionDestino;
    }

    function setCiudadDestino($ciudadDestino) {
        $this->ciudadDestino = $ciudadDestino;
    }



}
