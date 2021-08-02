<?php

include_once 'conexao.php';

class UsuarioDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function cadastrar(ClasseUsuario $novoUsuario) {
        try {

            $sql = "INSERT INTO usuario(nome,email,cpf,telefone,sexo,senha,datanascimento,imagem,datacadastro) "
                    . "VALUES(?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $novoUsuario->getNome());
            $stmt->bindValue(2, $novoUsuario->getEmail());
            $stmt->bindValue(3, $novoUsuario->getCpf());
            $stmt->bindValue(4, $novoUsuario->getTelefone());
            $stmt->bindValue(5, $novoUsuario->getSexo());
            $stmt->bindValue(6, $novoUsuario->getSenha());
            $stmt->bindValue(7, $novoUsuario->getDatanascimento());
            $stmt->bindValue(8, $novoUsuario->getImagem());
            $stmt->bindValue(9, $novoUsuario->getDatacadastro());

            $stmt->execute();

            $idusuario = $this->pdo->lastInsertId();

            $sql = "INSERT INTO endereco(cep,rua,bairro,cidade,estado,numero,fk_idusuario)"
                    . " VALUES(?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $novoUsuario->getCep());
            $stmt->bindValue(2, $novoUsuario->getRua());
            $stmt->bindValue(3, $novoUsuario->getBairro());
            $stmt->bindValue(4, $novoUsuario->getCidade());
            $stmt->bindValue(5, $novoUsuario->getEstado());
            $stmt->bindValue(6, $novoUsuario->getNumero());
            $stmt->bindValue(7, $idusuario);
            $cadastro = $stmt->execute();

            if ($cadastro) {
                session_start();
                $_SESSION['cadastroRealizado'] = 1;
                $_SESSION['imagemUsuario'] = $novoUsuario->getImagem();
                $_SESSION['emailUsuario'] = $novoUsuario->getEmail();
            }

            return $cadastro;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterar(ClasseUsuario $alterarUsuario, $id) {
        try {
            $sql = "UPDATE usuario SET "
                    . "nome =?,"
                    . "email = ?,"
                    . "cpf = ?,"
                    . "telefone =?, "
                    . "sexo =?, "
                    . "senha =?, "
                    . "datanascimento =?, "
                    . "imagem =? "
                    . "WHERE idusuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $alterarUsuario->getNome());
            $stmt->bindValue(2, $alterarUsuario->getEmail());
            $stmt->bindValue(3, $alterarUsuario->getCpf());
            $stmt->bindValue(4, $alterarUsuario->getTelefone());
            $stmt->bindValue(5, $alterarUsuario->getSexo());
            $stmt->bindValue(6, $alterarUsuario->getSenha());
            $stmt->bindValue(7, $alterarUsuario->getDatanascimento());
            $stmt->bindValue(8, $alterarUsuario->getImagem());
            $stmt->bindValue(9, $id);

            $stmt->execute();


            $sql = "UPDATE endereco SET "
                    . "cep =?, "
                    . "rua = ?, "
                    . "bairro = ?, "
                    . "cidade =?, "
                    . "estado =?, "
                    . "numero =? "
                    . "WHERE fk_idusuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $alterarUsuario->getCep());
            $stmt->bindValue(2, $alterarUsuario->getRua());
            $stmt->bindValue(3, $alterarUsuario->getBairro());
            $stmt->bindValue(4, $alterarUsuario->getCidade());
            $stmt->bindValue(5, $alterarUsuario->getEstado());
            $stmt->bindValue(6, $alterarUsuario->getNumero());
            $stmt->bindValue(7, $id);
            $stmt->execute();

            if ($stmt) {
                $_SESSION['nomeUsuarioLogado'] = $alterarUsuario->getNome();
                $_SESSION['emailUsuarioLogado'] = $alterarUsuario->getEmail();
                $_SESSION['imagemUsuariologado'] = $alterarUsuario->getImagem();
            }

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarPorID($id) {
        try {

            $sql = "SELECT * FROM usuario "
                    . "INNER JOIN endereco ON usuario.idusuario = $id AND endereco.fk_idusuario = usuario.idusuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            return $usuario;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
