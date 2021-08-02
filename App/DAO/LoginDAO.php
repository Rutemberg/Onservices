<?php

include 'conexao.php';

class LoginDAO {

    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function fazerLogin($email, $senha) {
        try {
            $sql = "SELECT idusuario,nome,email,imagem FROM usuario
                    WHERE email = ? AND senha = ?";
            $stmt = $this->pdo->prepare($sql); //PDO, comunicação com o BD relacional, padronização na comunicação.
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario != NULL) {

                $_SESSION['usuarioLogado'] = 1;
                $_SESSION['usuariocount'] = 1;
                $_SESSION['idUsuarioLogado'] = $usuario['idusuario'];
                $_SESSION['nomeUsuarioLogado'] = $usuario['nome'];
                $_SESSION['emailUsuarioLogado'] = $usuario['email'];
                $_SESSION['imagemUsuariologado'] = $usuario['imagem'];


                return $usuario;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function fazerLogout() {
        try {
            unset($_SESSION['usuarioLogado']);
            unset($_SESSION['usuariocount']);
            unset($_SESSION['idUsuarioLogado']);
            unset($_SESSION['nomeUsuarioLogado']);
            unset($_SESSION['emailUsuarioLogado']);
            unset($_SESSION['imagemUsuariologado']);
            unset($_SESSION['cep']);
            unset($_SESSION['rua']);
            unset($_SESSION['estado']);
            unset($_SESSION['cidade']);
            session_destroy();
            header("location:../../index.php");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
