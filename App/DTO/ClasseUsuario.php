<?php

include 'ClasseEndereco.php';

class ClasseUsuario extends ClasseEndereco {

    private $nome;
    private $email;
    private $cpf;
    private $telefone;
    private $sexo;
    private $senha;
    private $datanascimento;
    private $datacadastro;
    private $imagem;

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getSenha() {
        return $this->senha;
    }

    function getDatanascimento() {
        return $this->datanascimento;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setDatanascimento($datanascimento) {
        $this->datanascimento = $datanascimento;
    }

    function getDatacadastro() {
        return $this->datacadastro;
    }

    function setDatacadastro($datacadastro) {
        $this->datacadastro = $datacadastro;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

}
