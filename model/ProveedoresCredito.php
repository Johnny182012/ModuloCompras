<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProveedoresCredito
 *
 * @author SaCisneros
 */
class ProveedoresCredito {
    private $nombreproveedor;
    private $tipoproveedor;
    private $valorfactura;
    
    function __construct($nombreproveedor, $tipoproveedor, $valorfactura) {
        $this->nombreproveedor = $nombreproveedor;
        $this->tipoproveedor = $tipoproveedor;
        $this->valorfactura = $valorfactura;
    }

    function getNombreproveedor() {
        return $this->nombreproveedor;
    }

    function getTipoproveedor() {
        return $this->tipoproveedor;
    }

    function getValorfactura() {
        return $this->valorfactura;
    }

    function setNombreproveedor($nombreproveedor) {
        $this->nombreproveedor = $nombreproveedor;
    }

    function setTipoproveedor($tipoproveedor) {
        $this->tipoproveedor = $tipoproveedor;
    }

    function setValorfactura($valorfactura) {
        $this->valorfactura = $valorfactura;
    }

}
