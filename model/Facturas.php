<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Facturas
 *
 * @author GABY
 */
class Facturas {
    
    private $idfactura;
    private $idproveedor;
    private $idusuario;
    private $valorfactura;
    private $fechafactura;
    private $ivafactura;
    
    function __construct($idfactura, $idproveedor, $idusuario, $valorfactura, $fechafactura, $ivafactura) {
        $this->idfactura = $idfactura;
        $this->idproveedor = $idproveedor;
        $this->idusuario = $idusuario;
        $this->valorfactura = $valorfactura;
        $this->fechafactura = $fechafactura;
        $this->ivafactura = $ivafactura;
    }
    
    function getIdfactura() {
        return $this->idfactura;
    }

    function getIdproveedor() {
        return $this->idproveedor;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getValorfactura() {
        return $this->valorfactura;
    }

    function getFechafactura() {
        return $this->fechafactura;
    }

    function getIvafactura() {
        return $this->ivafactura;
    }

    function setIdfactura($idfactura) {
        $this->idfactura = $idfactura;
    }

    function setIdproveedor($idproveedor) {
        $this->idproveedor = $idproveedor;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setValorfactura($valorfactura) {
        $this->valorfactura = $valorfactura;
    }

    function setFechafactura($fechafactura) {
        $this->fechafactura = $fechafactura;
    }

    function setIvafactura($ivafactura) {
        $this->ivafactura = $ivafactura;
    }



}