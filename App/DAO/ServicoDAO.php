<?php

include_once 'conexao.php';

class ServicoDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function cadastrarServico(ClasseServico $cadastrarServico) {
        try {
            $sql = "SELECT idusuario FROM usuario WHERE idusuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarServico->getIdusuario());
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $idusuario = $usuario['idusuario'];

            $sql = "INSERT INTO modservico(titulo,categoria,servico,modoservico,valor,diasdisponiveis,descricao,datacadastroservicos,modservico_fk_idusuario) "
                    . "VALUES(?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarServico->getTitulo());
            $stmt->bindValue(2, $cadastrarServico->getCategoria());
            $stmt->bindValue(3, $cadastrarServico->getServico());
            $stmt->bindValue(4, $cadastrarServico->getModoservico());
            $stmt->bindValue(5, $cadastrarServico->getValor());
            $stmt->bindValue(6, $cadastrarServico->getDiasdisponiveis());
            $stmt->bindValue(7, $cadastrarServico->getDescricao());
            $stmt->bindValue(8, $cadastrarServico->getDatacadastroservico());
            $stmt->bindValue(9, $idusuario);

            $stmt->execute();

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterarServico(ClasseServico $alterarServico) {
        try {
            $sql = "UPDATE modservico SET "
                    . "titulo =?,"
                    . "categoria = ?,"
                    . "servico = ?,"
                    . "modoservico =?, "
                    . "valor =?, "
                    . "diasdisponiveis =?, "
                    . "descricao =? "
                    . "WHERE idservico = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $alterarServico->getTitulo());
            $stmt->bindValue(2, $alterarServico->getCategoria());
            $stmt->bindValue(3, $alterarServico->getServico());
            $stmt->bindValue(4, $alterarServico->getModoservico());
            $stmt->bindValue(5, $alterarServico->getValor());
            $stmt->bindValue(6, $alterarServico->getDiasdisponiveis());
            $stmt->bindValue(7, $alterarServico->getDescricao());
            $stmt->bindValue(8, $alterarServico->getIdservico());

            $stmt->execute();
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarFULL($id) {
        try {

            $sql = "SELECT * FROM usuario "
                    . "INNER JOIN modservico ON usuario.idusuario = $id AND modservico.modservico_fk_idusuario = usuario.idusuario ORDER BY modservico.idservico DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $Service = $stmt->fetchAll();
            return $Service;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarONE($idservico) {
        try {

            $sql = "SELECT * FROM modservico "
                    . "WHERE idservico = $idservico";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $Servico = $stmt->fetch(PDO::FETCH_ASSOC);
            return $Servico;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function listarPorServico($servico) {
        try {

            $sql = "SELECT * FROM modservico "
                    . "WHERE servico = '$servico'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $Service = $stmt->fetchAll();
            return $Service;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }
    public function Buscar($busca) {
        try {

            $sql = "SELECT * FROM modservico "
                    . "WHERE servico LIKE '$busca%' OR categoria LIKE '$busca%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $Service = $stmt->fetchAll();
            return $Service;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function excluir($idservico) {
        try {

            $sql = "DELETE FROM modservico "
                    . "WHERE idservico = $idservico";
            $stmt = $this->pdo->prepare($sql);
            $Service = $stmt->execute();
            return $Service;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
