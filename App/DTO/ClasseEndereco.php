<?php
abstract class ClasseEndereco {
    
    private $cep;
    private $rua;
    private $bairro;
    private $cidade;
    private $estado;
    private $numero;
    
    function getCep() {
        return $this->cep;
    }

    function getRua() {
        return $this->rua;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getNumero() {
        return $this->numero;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setRua($rua) {
        $this->rua = $rua;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }


    
}
