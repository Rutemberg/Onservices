<?php

class ClasseServico {

    private $titulo;
    private $idusuario;
    private $idservico;
    private $categoria;
    private $servico;
    private $modoservico;
    private $valor;
    private $diasdisponiveis;
    private $descricao;
    private $datacadastroservico;

    function getTitulo() {
        return $this->titulo;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getIdservico() {
        return $this->idservico;
    }

    function setIdservico($idservico) {
        $this->idservico = $idservico;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getServico() {
        return $this->servico;
    }

    function getModoservico() {
        return $this->modoservico;
    }

    function getValor() {
        return $this->valor;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setServico($servico) {
        $this->servico = $servico;
    }

    function setModoservico($modoservico) {
        $this->modoservico = $modoservico;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function getDiasdisponiveis() {
        return $this->diasdisponiveis;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setDiasdisponiveis($diasdisponiveis) {
        $this->diasdisponiveis = $diasdisponiveis;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function getDatacadastroservico() {
        return $this->datacadastroservico;
    }

    function setDatacadastroservico($datacadastroservico) {
        $this->datacadastroservico = $datacadastroservico;
    }

}
