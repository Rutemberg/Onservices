
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="../CSS/Estilo_FIX.css">
        <link rel="stylesheet" href="../CSS/Estilo_Mensagens.css">

        <script src="../JS/jquery-3.3.1.min.js"></script>
        <script src="../JS/velocity.min.js"></script>
        <script src="../JS/velocity.ui.js"></script>
        <script src="../JS/Animacoes.js"></script>
        <script src="../JS/Animacoes_Inicio.js"></script>
        <script src="../JS/Animacoes_Forms.js"></script>

    </head>
    <body>
        <div class="escala-5 fullSize nopadding"style="overflow: hidden">
            <div class="mensagem">
                <div class="display-table nopadding">
                    <div class="centralizar nopadding">
                        <?php
                        include '../DAO/ServicoDAO.php';
                        include '../DAO/ContratarDAO.php';
                        include '../DTO/ClasseServico.php';

                        if (!empty($_GET['modulo'])) {

                            if ($_GET['modulo'] == 'servico') {

                                $idservico = $_POST["idservico"];
                                $servico = $_POST["servico"];
                                $categoria = $_POST["categoria"];
                                $titulo = $_POST["titulo"];
                                $modoservico = $_POST["modoservico"];
                                $valor = $_POST["valor"];
                                $dias = $_POST["diasdisponiveis"];
                                $diasdisponiveis = implode(',', $dias);

                                if (empty($_POST["descricao"])) {
                                    $descricao = 'Não há nenhuma descrição';
                                } else {
                                    $descricao = $_POST["descricao"];
                                }

                                $alterarServico = new ClasseServico();
                                $alterarServico->setIdservico($idservico);
                                $alterarServico->setServico($servico);
                                $alterarServico->setCategoria($categoria);
                                $alterarServico->setTitulo($titulo);
                                $alterarServico->setModoservico($modoservico);
                                $alterarServico->setValor($valor);
                                $alterarServico->setDiasdisponiveis($diasdisponiveis);
                                $alterarServico->setDescricao($descricao);

                                $alterarServicoDAO = new ServicoDAO();
                                $alterar = $alterarServicoDAO->alterarServico($alterarServico);

                                if ($alterar) {
                                    ?>
                                    <div class="Titulos mensagem_cadastro nopadding displaynone" style="color: white;margin: 0">
                                        Alteração realizada com sucesso
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            setTimeout(function () {
                                                window.location = '../View/QuadroP.php';
                                            }, 5000);
                                        });
                                    </script>

                                <?php } else { ?>

                                    <div class="Titulos mensagem_cadastro displaynone" style="color: white;margin: 0">
                                        Alteração não realizada
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            setTimeout(function () {
                                                window.location = '../View/QuadroP.php';
                                            }, 5000);
                                        });
                                    </script>

                                    <?php
                                }
                            }


                            if ($_GET['modulo'] == 'contratar') {

                                $idcontratar = $_POST["idcontratar"];
                                $servico = $_POST["servico"];
                                $categoria = $_POST["categoria"];
                                $titulo = $_POST["titulo"];
                                $modoservico = $_POST["modocontratar"];
                                $dias = $_POST["diasdisponiveis"];
                                $diasdisponiveis = implode(',', $dias);

                                if (empty($_POST["descricao"])) {
                                    $descricao = 'Não há nenhuma descrição';
                                } else {
                                    $descricao = $_POST["descricao"];
                                }

                                $alterarContratar = new ClasseServico();
                                $alterarContratar->setIdservico($idcontratar);
                                $alterarContratar->setServico($servico);
                                $alterarContratar->setCategoria($categoria);
                                $alterarContratar->setTitulo($titulo);
                                $alterarContratar->setModoservico($modoservico);
                                $alterarContratar->setDiasdisponiveis($diasdisponiveis);
                                $alterarContratar->setDescricao($descricao);

                                $alterarContratarDAO = new ContratarDAO();
                                $alterar = $alterarContratarDAO->alterarContratar($alterarContratar);

                                if ($alterar) {
                                    ?>
                                    <div class="Titulos mensagem_cadastro nopadding displaynone" style="color: white;margin: 0">
                                        Alteração realizada com sucesso
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            setTimeout(function () {
                                                window.location = '../View/QuadroC.php';
                                            }, 5000);
                                        });
                                    </script>

                                <?php } else { ?>

                                    <div class="Titulos mensagem_cadastro displaynone" style="color: white;margin: 0">
                                        Alteração não realizada
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            setTimeout(function () {
                                                window.location = '../View/QuadroC.php';
                                            }, 5000);
                                        });
                                    </script>

                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
