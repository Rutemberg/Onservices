<?php
session_start();

include '../DAO/LoginDAO.php';

$fazerLoginDAO = new LoginDAO();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="../CSS/Estilo_FIX.css">
        <link rel="stylesheet" href="../CSS/Estilo_Forms.css">
        <link rel="stylesheet" href="../CSS/Estilo_Mensagens.css">

        <script src="../JS/jquery-3.3.1.min.js"></script>
        <script src="../JS/velocity.min.js"></script>
        <script src="../JS/velocity.ui.js"></script>
        <script src="../JS/Animacoes.js"></script>
        <script src="../JS/Animacoes_Forms.js"></script>

    </head>
    <body>
<!--        <div class="escala-1 fullSize backfiltro backgroundFADE"></div>-->

        <div class="escala-0 fullSize backfiltroblack"></div>


        <div class="escala-2 fullSize">
            <div class="display-table">
                <div class="centralizar">

                    <?php
                    if ((!empty($_SESSION['cadastroRealizado']) && count($_POST) <= 0) || count($_POST) <= 0) {
                        ?>

                        <header class="Titulos displaynone login_titulo_fadeIN" style="margin: 0 auto;color: white;text-align: center">
                            Login
                        </header>

                        <form class="login displaynone login_titulo_fadeIN" method="POST" action="#">
                            <div class="login-img login-img-usuariocadastrado" style="padding: 0">
                                <div style="
                                     width: 100%;
                                     height: 100%;
                                     background: url('../Imagens/UserIMG/<?php
                                     if (!empty($_SESSION['cadastroRealizado'])) {
                                         echo $_SESSION['imagemUsuario'];
                                     } else {
                                         echo "UserloginWHITE.png";
                                     }
                                     ?>') center no-repeat;
                                     background-size: cover;
                                     ">
                                </div>
                            </div>
                            <input class="login-input email login-email" name="email" type="text" placeholder="Email" onclick="escalaBACKGROUND('centralizar')" value="<?php
                            if (!empty($_SESSION['cadastroRealizado'])) {
                                echo $_SESSION['emailUsuario'];
                            }
                            ?>" style="background: none;color: white;border: none">
                            <input class="login-input senha" name="senha" type="password" placeholder="Senha" onclick="escalaBACKGROUND('centralizar')">
                            <input class="form-back Objecthover" onclick="redirection('../../index.php')" type="button" value="Voltar" style="color: white">
                            <input class="input-submit" type="submit" value="Entrar" style="float: none">
                        </form>


                        <?php
                    }
                    if (count($_POST) > 0) {

                        if (count($_POST) >= 2) {

                            $email = $_POST['email'];
                            $senha = $_POST['senha'];


                            $fazerLogin = $fazerLoginDAO->fazerLogin($email, $senha);


                            if ($fazerLogin) {
                                ?>
                                <div style="width: 50%;margin: 0 auto">
                                    <div class="Titulos mensagem_cadastro displaynone" style="color: white;margin:0">
                                        Login efetuado com sucesso
                                    </div>

                                    <div class="Titulos mensagem_redirecionando displaynone" style="color: white;margin: 0">
                                        Inicializando...
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            setTimeout(function () {
                                                window.location = '../View/Inicio.php';
                                            }, 7000);
                                        });
                                    </script>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div style="width: 50%;margin: 0 auto">
                                    <div class="Titulos mensagem_cadastro displaynone" style="color: white;margin:0">
                                        Usuario ou senha incorretos
                                    </div>

                                    <div class="Titulos mensagem_redirecionando displaynone" style="color: white;margin:0">
                                        Tente novamente...
                                    </div>

                                    <script>
                                        $(document).ready(function () {
                                            setTimeout(function () {
                                                window.location = 'controladorLogin.php';
                                            }, 7000);
                                        });
                                    </script>
                                </div>
                                <?php
                            }
                        }
                    }
                    if (!empty($_GET['logout']) && $_GET['logout'] == 1) {

                        $fazerLogout = $fazerLoginDAO->fazerLogout();
                    }
                    ?>

                </div>
            </div>
        </div>

    </body>
</html>
