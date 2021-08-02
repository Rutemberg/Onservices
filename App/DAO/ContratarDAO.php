<?php

include_once 'conexao.php';

class ContratarDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function cadastrarContratar(ClasseServico $cadastrarContratar) {
        try {
            $sql = "SELECT idusuario FROM usuario WHERE idusuario = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarContratar->getIdusuario());
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            $idusuario = $usuario['idusuario'];

            $sql = "INSERT INTO modcontratar(titulo,categoria,servico,modocontratar,diasdisponiveis,descricao,datacadastrocontratar,modcontratar_fk_idusuario) "
                    . "VALUES(?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $cadastrarContratar->getTitulo());
            $stmt->bindValue(2, $cadastrarContratar->getCategoria());
            $stmt->bindValue(3, $cadastrarContratar->getServico());
            $stmt->bindValue(4, $cadastrarContratar->getModoservico());
            $stmt->bindValue(5, $cadastrarContratar->getDiasdisponiveis());
            $stmt->bindValue(6, $cadastrarContratar->getDescricao());
            $stmt->bindValue(7, $cadastrarContratar->getDatacadastroservico());
            $stmt->bindValue(8, $idusuario);

            $stmt->execute();

            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function alterarContratar(ClasseServico $alterarContratar) {
        try {
            $sql = "UPDATE modcontratar SET "
                    . "titulo =?,"
                    . "categoria = ?,"
                    . "servico = ?,"
                    . "modocontratar =?, "
                    . "diasdisponiveis =?, "
                    . "descricao =? "
                    . "WHERE idcontratar = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $alterarContratar->getTitulo());
            $stmt->bindValue(2, $alterarContratar->getCategoria());
            $stmt->bindValue(3, $alterarContratar->getServico());
            $stmt->bindValue(4, $alterarContratar->getModoservico());
            $stmt->bindValue(5, $alterarContratar->getDiasdisponiveis());
            $stmt->bindValue(6, $alterarContratar->getDescricao());
            $stmt->bindValue(7, $alterarContratar->getIdservico());

            $stmt->execute();
            return $stmt;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarFULL($id) {
        try {

            $sql = "SELECT * FROM usuario "
                    . "INNER JOIN modcontratar ON usuario.idusuario = $id AND modcontratar.modcontratar_fk_idusuario = usuario.idusuario ORDER BY modcontratar.idcontratar DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $Contratar = $stmt->fetchAll();
            return $Contratar;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarPorServico($servico) {
        try {

            $sql = "SELECT * FROM modcontratar "
                    . "WHERE servico = '$servico'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $Service = $stmt->fetchAll();
            return $Service;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function listarONE($idcontratar) {
        try {

            $sql = "SELECT * FROM modcontratar "
                    . "WHERE idcontratar = $idcontratar";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $Contratar = $stmt->fetch(PDO::FETCH_ASSOC);
            return $Contratar;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function Buscar($busca) {
        try {

            $sql = "SELECT * FROM modcontratar "
                    . "WHERE servico LIKE '$busca%' OR categoria LIKE '$busca%'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $Service = $stmt->fetchAll();
            return $Service;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function excluir($idcontratar) {
        try {

            $sql = "DELETE FROM modcontratar "
                    . "WHERE idcontratar = $idcontratar";
            $stmt = $this->pdo->prepare($sql);
            $Contratar = $stmt->execute();
            return $Contratar;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
