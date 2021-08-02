
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="../CSS/Estilo_FIX.css">
        <link rel="stylesheet" href="../CSS/Estilo_Mensagens.css">
        <link rel="stylesheet" href="../CSS/Estilo_Forms.css">
        <link rel="stylesheet" href="../CSS/Estilo.Checkbox.css">

        <script src="../JS/jquery-3.3.1.min.js"></script>
        <script src="../JS/velocity.min.js"></script>
        <script src="../JS/velocity.ui.js"></script>
        <script src="../JS/Animacoes.js"></script>
        <script src="../JS/Form.js"></script>
        <script src="../JS/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
        <script src="../JS/Form_Mascaras.js"></script>
        <script src="../JS/Animacoes_Forms.js"></script>
        <script src="../JS/Animacoes_Inicio.js"></script>

        <script>
            $(document).ready(function () {
                $('.valor').mask("#.##0,00", {reverse: true});
            })

        </script>

    </head>
    <body>

        <?php
        include '../DAO/ContratarDAO.php';
        include '../DTO/ClasseServico.php';

        if (!empty($_GET['alterar'])) {
            $id = $_GET['alterar'];
            $listarcontratarDAO = new ContratarDAO();
            $listarcontratar = $listarcontratarDAO->listarONE($id);
            ?>


            <div class="escala-2 fullSize transitionENTRADA displaynone">
                <form method="POST" action="controladorModulosAlterar.php?modulo=contratar" onsubmit="return ValidaCadastroModulo();" class="cadastrofull formularioCadastro displaynone transitionENTRADA" id="formularioCadastro" name="formularioCadastro">

                    <input class="input-black titulo transitionENTRADA displaynone" style="font-size: 40px;font-weight: 700;background: none;border: none;margin: 20px;" type="text" id="titulo" name="titulo" value="<?php echo $listarcontratar['titulo']; ?>" placeholder="Título Contratar">

                    <div class="cadastrofull-imagem transitionENTRADA displaynone" style="top: 0">
                        <div class="backimagem"
                             style="
                             background: url('../Imagens/Icones/icone-contrateWHITE.png')center no-repeat; 
                             background-size: 70% auto;
                             border: none;
                             "
                             >
                        </div>
                    </div>

                    <div class="nopadding cadastrofull-groups transitionENTRADA displaynone">
                        <div class="cadastrofull-group1">
                            <label class="colorTEXT">Dados Contratar</label>

                            <input style="display: none" type="text" name="idcontratar" value="<?php echo $id; ?>">

                            <select class="input-black select-white categoria" name="categoria" id="categoria" onclick="limpar('servico')">
                                <option value="<?php echo $listarcontratar['categoria']; ?>"><?php echo $listarcontratar['categoria']; ?></option>
                                <option value="Casa e serviços gerais">Casa e serviços gerais</option>
                                <option value="Construção e reformas">Construção e reformas</option>
                                <option value="Festas e eventos">Festas e eventos</option>
                                <option value="Serviços domésticos">Serviços domesticos</option>
                                <option value="Informática">Informatica</option>
                            </select>


                            <select class="input-black select-white servico2" name="servico" id="servico"  onmouseenter="servicos('categoria')" onfocus="servicos('categoria')">
                                <option value="<?php echo $listarcontratar['servico']; ?>"><?php echo $listarcontratar['servico']; ?></option>
                                <option value="Desentupidor" class="servico casaeservicos displaynone">Desentupidor</option>
                                <option value="Jardineiro" class="servico casaeservicos displaynone">Jardineiro</option>
                                <option value="Chaveiro" class="servico casaeservicos displaynone">Chaveiro</option>

                                <option value="Pintor" class="servico construcaoreformas displaynone">Pintor</option>
                                <option value="Pedreiro" class="servico construcaoreformas displaynone">Pedreiro</option>
                                <option value="Encanador" class="servico construcaoreformas displaynone">Encanador</option>

                                <option value="Cozinheiro" class="servico festaseventos displaynone">Cozinheiro</option>
                                <option value="Garçom" class="servico festaseventos displaynone">Garçom</option>
                                <option value="Churrasqueiro" class="servico festaseventos displaynone">Churrasqueiro</option>

                                <option value="Diarista" class="servico servicosdomesticos displaynone">Diarista</option>
                                <option value="Lavadeira" class="servico servicosdomesticos displaynone">Lavadeira</option>
                                <option value="Passadeira" class="servico servicosdomesticos displaynone">Passadeira</option>

                                <option value="Manutenção de celulares" class="servico Informatica displaynone">Manutenção de celulares</option>
                                <option value="Manutenção de computadores" class="servico Informatica displaynone">Manutenção de computadores</option>
                                <option value="Redes" class="servico Informatica displaynone">Redes</option>
                            </select>


                            <label class="colorTEXT">Modo e valor</label>
                            <select class="input-black select-white modoservico" name="modocontratar" id="modoservico">
                                <option value="<?php echo $listarcontratar['modocontratar']; ?>"><?php echo $listarcontratar['modocontratar']; ?></option>
                                <option value="Diaria">Diaria</option>
                                <option value="Serviço">Serviço</option>
                            </select>

                            <input class="input-black valor" type="text" placeholder="Valor" name="valor" id="valor" value="0" style="display: none">

                        </div>

                        <div class="cadastrofull-group1">

                            <label class="colorTEXT">Disponibilidade</label>
                            <div class="nopadding csscheckbox-caixa colorTEXT" style="text-align: center;margin-bottom: 20px">

                                <?php
                                $dias = explode(",", $listarcontratar['diasdisponiveis']);
                                ?>

                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Domingo", $dias)) { ?> checked <?php } ?> value="Domingo"><span><p>Dom</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Segunda", $dias)) { ?> checked <?php } ?> value="Segunda"><span><p>Seg</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Terça", $dias)) { ?> checked <?php } ?> value="Terça"><span><p>Ter</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Quarta", $dias)) { ?> checked <?php } ?> value="Quarta"><span><p>Qua</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Quinta", $dias)) { ?> checked <?php } ?> value="Quinta"><span><p>Qui</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Sexta", $dias)) { ?> checked <?php } ?> value="Sexta"><span><p>Sex</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Sabado", $dias)) { ?> checked <?php } ?> value="Sabado"><span><p>Sab</p></span></label>
                            </div>

                            <label class="colorTEXT">Descrição</label>
                            <textarea class="input-black descricao mark" name="descricao" id="descricao"><?php echo $listarcontratar['descricao']; ?></textarea>


                            <input type="submit" class="input-submit" value="Finalizar" style="margin-left: 10px;">
                            <input type="button" class="input-submit input-button" value="Cancelar" onclick="redirection('../View/QuadroC.php')">
                        </div>

                    </div>



                </form>
            </div>


            <?php
        } else {
            ?>

            <div class="escala-2 fullSize nopadding"style="overflow: hidden">
                <div class="mensagem">
                    <div class="display-table">
                        <div class="centralizar">

                            <header class="Titulos mensagem_aguarde displaynone" style="color: white;margin: 0">
                                Aguarde...
                            </header>

                            <?php
                            $idusuario = $_POST["idUsuario"];
                            $servico = $_POST["servico"];
                            $categoria = $_POST["categoria"];
                            $titulo = $_POST["titulo"];
                            $modoservico = $_POST["modocontratar"];
                            $datacadastrocontratar = date('y-m-d');
                            $dias = $_POST["diasdisponiveis"];
                            $diasdisponiveis = implode(',', $dias);

                            if (empty($_POST["descricao"])) {
                                $descricao = 'Não há nenhuma descrição';
                            } else {
                                $descricao = $_POST["descricao"];
                            }


                            $cadastrarContratar = new ClasseServico();
                            $cadastrarContratar->setIdusuario($idusuario);
                            $cadastrarContratar->setServico($servico);
                            $cadastrarContratar->setCategoria($categoria);
                            $cadastrarContratar->setTitulo($titulo);
                            $cadastrarContratar->setModoservico($modoservico);
                            $cadastrarContratar->setDiasdisponiveis($diasdisponiveis);
                            $cadastrarContratar->setDescricao($descricao);
                            $cadastrarContratar->setDatacadastroservico($datacadastrocontratar);

                            $cadastrarContratarDAO = new ContratarDAO();
                            $cadastrar = $cadastrarContratarDAO->cadastrarContratar($cadastrarContratar);

                            if ($cadastrar) {
                                ?>

                                <div class="Titulos mensagem_cadastro displaynone" style="color: white;margin: 0">
                                    Cadastro realizado com sucesso
                                </div>

                                <div class="Titulos mensagem_redirecionando displaynone" style="color: white;margin: 0">
                                    Publicando...
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        setTimeout(function () {
                                            window.location = '../View/QuadroC.php';
                                        }, 9000);
                                    });
                                </script>

                                <?php
                            } else {
                                ?>

                                <div class="Titulos mensagem_cadastro displaynone" style="color: white;margin: 0">
                                    Cadastro não realizado
                                </div>

                                <div class="Titulos mensagem_redirecionando displaynone" style="color: white;margin: 0">
                                    Redirecionando à pagina inicial...
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        setTimeout(function () {
                                            window.location = '../View/QuadroC.php';
                                        }, 9000);
                                    });
                                </script>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </body>
</html>
