<?php

/**
 * Método que contiene los datos de los campos de la tabla producto
 *
 * @author Jhonatan Dominguez
 */
class Producto {
    private $idproducto;//clave primaria de la tabla productos
    private $nombreproducto;//nombre del producto
    private $pvpproducto;//precio de venta publica sugerida del producto
    private $ivaproducto;//campo para saber si grava o no grava iva
    
    function __construct($idproducto, $nombreproducto, $pvpproducto, $ivaproducto) {
        $this->idproducto = $idproducto;
        $this->nombreproducto = $nombreproducto;
        $this->pvpproducto = $pvpproducto;
        $this->ivaproducto = $ivaproducto;
    }
    
    function getIdproducto() {
        return $this->idproducto;
    }

    function getNombreproducto() {
        return $this->nombreproducto;
    }

    function getPvpproducto() {
        return $this->pvpproducto;
    }

    function getIvaproducto() {
        return $this->ivaproducto;
    }

    function setIdproducto($idproducto) {
        $this->idproducto = $idproducto;
    }

    function setNombreproducto($nombreproducto) {
        $this->nombreproducto = $nombreproducto;
    }

    function setPvpproducto($pvpproducto) {
        $this->pvpproducto = $pvpproducto;
    }

    function setIvaproducto($ivaproducto) {
        $this->ivaproducto = $ivaproducto;
    }



}
