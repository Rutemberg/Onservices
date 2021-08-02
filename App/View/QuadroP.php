
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="../CSS/Estilo_FIX.css">
        <link rel="stylesheet" href="../CSS/Estilo_Forms.css">
        <link rel="stylesheet" href="../CSS/Estilo_Effects.css">
        <link rel="stylesheet" href="../CSS/Estilo.Checkbox.css">


        <script src="../JS/jquery-3.3.1.min.js"></script>
        <script src="../JS/velocity.min.js"></script>
        <script src="../JS/velocity.ui.js"></script>
        <script src="../JS/Animacoes.js"></script>
        <script src="../JS/Animacoes_Inicio.js"></script>

    </head>
    <body>
        <?php
        session_start();

        require '../DTO/funcoesAux.php';
        require '../DAO/ServicoDAO.php';
        require '../DAO/UsuarioDAO.php';

//        $id = $_GET['idusuario'];
        $id = $_SESSION['idUsuarioLogado'];

        if (!empty($_GET['idusuario'])) {
            $id = $_GET['idusuario'];
        }


        if (!empty($_GET['excluir'])) {
            $idservico = $_GET['excluir'];
            $ExcluirDAO = new ServicoDAO();
            $Excluir = $ExcluirDAO->excluir($idservico);

            if ($Excluir) {
                
            }
        }




        $listarservicosDAO = new ServicoDAO();
        $listarusuarioDAO = new UsuarioDAO();

        $usuario = $listarusuarioDAO->listarPorID($id);
        $listarservicos = $listarservicosDAO->listarFULL($id);
        $countservicos = count($listarservicos);
//        var_dump($listarservicos);

        if ($countservicos == 0) {
            header('Location: Navegacao.php');
        }
        ?>

        <div class="escala-1 fullSize">

            <header class=" colorTEXT textoverflow">
                <div class="nopadding"
                     style="float: left;height: 50px;width: 50px;margin-right: 30px;overflow: hidden;border-radius: 50%;
                     background: url('../Imagens/UserIMG/<?php echo $usuario['imagem']; ?>') center no-repeat;
                     background-size: cover;
                     ">

                </div>

                <?php
                if (!empty($_GET['idusuario'])) {
                    echo $usuario['nome'] . ' - ';
                } else {
                    echo 'Meus ';
                }
                ?>
                Serviços ativos <?php echo $countservicos; ?>
                <?php if ($id == $_SESSION['idUsuarioLogado']) { ?>
                    <img src="../Imagens/Icones/ADDservico.png" style="float: right;height: 50px" onclick="redirection('Modulos/Prestador.php')">
                    <?php }
                ?>
            </header>

            <div class="conteiner" style="background: none;height: 95%">

                <div class="conteudo box-blocos nopadding" style="text-align: center;overflow: hidden">

                    <?php
                    foreach ($listarservicos as $servicos) {
                        ?>

                        <div class="bloco nopadding transitionENTRADA displaynone">
                            <div class="bloco-container nopadding bordereffect " onclick="redirection('Visualizar.php?modulo=prestador&idusuario=<?php echo $usuario['idusuario']; ?>&idservico=<?php echo $servicos['idservico']; ?>')">

                                <div class="bloco-img">
                                    <div class="display-table">
                                        <div class="centralizar" style="text-align: center">
                                            <img class="" src="../Imagens/Icones/icone-trabalheWHITE.png">
                                        </div>
                                    </div>
                                </div>

                                <div class=" bloco-conteudo " style="text-align: left">
                                    <p class=" colorTEXT" style="text-align: right;width: 100%;margin: 0;font-size: 15px">
                                        <?php
                                        $dataatual = date('y-m-d');
                                        echo calculardata($servicos['datacadastroservicos'], $dataatual)
                                        ?>
                                    </p>

                                    <p class=" colorTEXT" style="margin: 0;text-align: left;">
                                        <?php
                                        echo $servicos['nome']
                                        ?>
                                    </p>

                                    <header class="Subtitulos colorTEXT textoverflow" style="width: 100%;margin-bottom: 10px;">
                                        <?php
                                        echo $servicos['titulo'];
                                        ?>                                  
                                    </header>

                                    <small class=" colorTEXT" style="font-weight: 500">
                                        <?php
                                        echo $servicos['categoria'] . ' - ';
                                        ?>
                                    </small>
                                    <small class=" colorTEXT">
                                        <?php
                                        echo $servicos['servico'];
                                        ?>
                                    </small>
                                    <div class=" subtexto colorTEXT nopadding" style="text-align: left;height: 70px;margin-top: 40px;font-size: 20px">
                                        <?php
                                        $valor = number_format($servicos['valor'], 2, ",", ".");
                                        echo "Valor <b>{$servicos['modoservico']}</b> <b>R$ $valor</b>";
                                        ?>  
                                    </div>
                                    <div class="nopadding csscheckbox-caixa colorTEXT textoverflow" style="text-align: center;margin-bottom: 20px;pointer-events: none;">

                                        <?php
                                        $dias = explode(",", $servicos['diasdisponiveis']);
                                        ?>

                                        <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Domingo", $dias)) { ?> checked <?php } ?> value="Domingo"><span><p>Dom</p></span></label>
                                        <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Segunda", $dias)) { ?> checked <?php } ?> value="Segunda"><span><p>Seg</p></span></label>
                                        <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Terça", $dias)) { ?> checked <?php } ?> value="Terça"><span><p>Ter</p></span></label>
                                        <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Quarta", $dias)) { ?> checked <?php } ?> value="Quarta"><span><p>Qua</p></span></label>
                                        <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Quinta", $dias)) { ?> checked <?php } ?> value="Quinta"><span><p>Qui</p></span></label>
                                        <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Sexta", $dias)) { ?> checked <?php } ?> value="Sexta"><span><p>Sex</p></span></label>
                                        <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Sabado", $dias)) { ?> checked <?php } ?> value="Sabado"><span><p>Sab</p></span></label>
                                    </div>


                                </div>

                            </div>
                            <?php
                            if ($id == $_SESSION['idUsuarioLogado']) {
                                ?>
                                <input type="button" class="input-submit input-button"  value="Editar" style="margin-left: 10px;background: black" onclick="redirection('../Controladores/controladorModulos.php?alterar=<?php echo $servicos['idservico']; ?>')">
                                <input type="button" class="input-submit input-button" value="Excluir" onclick="redirection('QuadroP.php?excluir=<?php echo $servicos['idservico']; ?>')">

                                <?php
                            } else {
                                ?>
                                <input type="button" class="input-submit input-button"  value="Ver" style="margin-left: 10px;background: black" onclick="redirection('Visualizar.php?modulo=prestador&idusuario=<?php echo $usuario['idusuario']; ?>&idservico=<?php echo $servicos['idservico']; ?>')">
                                <?php
                            }
                            ?>
                        </div>

                        <?php
                    }
                    ?>
                </div>

            </div>



        </div>

    </body>
</html>
