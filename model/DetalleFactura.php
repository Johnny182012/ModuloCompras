<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetalleFcactura
 *
 * @author GABY
 */
class DetalleFactura {
    
    private $iddetalle;
    private $idproducto;
    private $idfactura;
    private $cantidadproducto;
    private $unidades;
    private $descuento;
    private $cantdescuento;
    
    function __construct($iddetalle, $idproducto, $idfactura, $cantidadproducto, $unidades, $descuento, $cantdescuento) {
        $this->iddetalle = $iddetalle;
        $this->idproducto = $idproducto;
        $this->idfactura = $idfactura;
        $this->cantidadproducto = $cantidadproducto;
        $this->unidades = $unidades;
        $this->descuento = $descuento;
        $this->cantdescuento = $cantdescuento;
    }
    
    function getIddetalle() {
        return $this->iddetalle;
    }

    function getIdproducto() {
        return $this->idproducto;
    }

    function getIdfactura() {
        return $this->idfactura;
    }

    function getCantidadproducto() {
        return $this->cantidadproducto;
    }

    function getUnidades() {
        return $this->unidades;
    }

    function getDescuento() {
        return $this->descuento;
    }

    function getCantdescuento() {
        return $this->cantdescuento;
    }

    function setIddetalle($iddetalle) {
        $this->iddetalle = $iddetalle;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function setIdfactura($idfactura) {
        $this->idfactura = $idfactura;
    }

    function setCantidadproducto($cantidadproducto) {
        $this->cantidadproducto = $cantidadproducto;
    }

    function setUnidades($unidades) {
        $this->unidades = $unidades;
    }

    function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    function setCantdescuento($cantdescuento) {
        $this->cantdescuento = $cantdescuento;
    }



}
