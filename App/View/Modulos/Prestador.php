<?php
session_start();
$id = $_SESSION['idUsuarioLogado'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="../../CSS/Estilo_FIX.css">
        <link rel="stylesheet" href="../../CSS/Estilo_Menus.css">
        <link rel="stylesheet" href="../../CSS/Estilo_Effects.css">
        <link rel="stylesheet" href="../../CSS/Estilo_Forms.css">
        <link rel="stylesheet" href="../../CSS/Estilo.Checkbox.css">


        <script src="../../JS/jquery-3.3.1.min.js"></script>
        <script src="../../JS/velocity.min.js"></script>
        <script src="../../JS/velocity.ui.js"></script>
        <script src="../../JS/Form.js"></script>
        <script src="../../JS/Animacoes_Forms.js"></script>
        <script src="../../JS/Animacoes_Inicio.js"></script>
        <script src="../../JS/Animacoes.js"></script>
        <script src="../../JS/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

        <script>
            $(document).ready(function () {
                $('.valor').mask("#.##0,00", {reverse: true});
            })

        </script>

    </head>

    <body>

        <div class="escala-1 fullSize">
            <div class="display-table">
                <div class="centralizar">

                    <header class="colorTEXT transitionENTRADA displaynone" style="text-align: center">Modo selecionado</header> 

                    <div class="minhasopcoes nopadding  transitionENTRADA displaynone" style="overflow: hidden">
                        <div class="display-table">
                            <div class="centralizar">

                                <div class="conteiner" style="background: none;margin-bottom: 20px">

                                    <div class="opcoes">
                                        <div class="display-table">
                                            <div class="centralizar">
                                                <img src="../../Imagens/Icones/icone-trabalheWHITE.png">
                                                <p class="Subtitulos" style="margin-top: 20px;">Prestador</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="opcoes">
                                        <div class="display-table">
                                            <div class="centralizar">
                                                <p class="conteudo-icone-text" style="text-align: left;margin: 0;font-weight: 300">
                                                    <b class="Subtitulos" style="fon">Modo selecionado para prestar serviços.</b><br><br>
                                                    Preencha o formulario de cadastro seguinte e comece sua experiencia com a Onservices
                                                </p>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="nopadding">
                                    <input type="button" id="buttonformIN" class="input-button input-submit" value="Continuar" onclick="InFormCompact('transitionENTRADA', 'transitioncadastro')">
                                    <input style="margin-right: 10px" type="button" id="buttonformIN" class="input-button input-submit" value="Voltar" onclick="redirection('../Navegacao.php')">
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div>
        </div>

        <div class="escala-2 fullSize transitioncadastro displaynone">
            <form method="POST" action="../../Controladores/controladorModulos.php" onsubmit="return ValidaCadastroModulo();" class="cadastrofull formularioCadastro displaynone transitioncadastro" id="formularioCadastro" name="formularioCadastro">

                <input class="input-black titulo displaynone transitioncadastro" style="font-size: 40px;font-weight: 700;background: none;border: none;margin: 20px;" type="text" id="titulo" name="titulo" placeholder="Título serviço">

                <div class="cadastrofull-imagem displaynone transitioncadastro" style="top: 0">
                    <div class="backimagem"
                         style="
                         background: url('../../Imagens/Icones/icone-trabalheWHITE.png')center no-repeat; 
                         background-size: 70% auto;
                         border: none;
                         "
                         >
                    </div>
                </div>

                <div class="nopadding cadastrofull-groups displaynone transitioncadastro">
                    <div class="cadastrofull-group1">
                        <label class="colorTEXT">Dados serviço</label>

                        <input style="display: none" type="text" name="idUsuario" value="<?php echo $id; ?>">

                        <select class="input-black select-white categoria" name="categoria" id="categoria" onclick="limpar('servico')">
                            <option value="">Selecionar categoria</option>
                            <option value="Casa e serviços gerais">Casa e serviços gerais</option>
                            <option value="Construção e reformas">Construção e reformas</option>
                            <option value="Festas e eventos">Festas e eventos</option>
                            <option value="Serviços domésticos">Serviços domesticos</option>
                            <option value="Informática">Informatica</option>
                        </select>


                        <select class="input-black select-white servico2" name="servico" id="servico"  onmouseenter="servicos('categoria')" onfocus="servicos('categoria')">
                            <option value="">Selecionar serviço</option>
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
                        <select class="input-black select-white modoservico" name="modoservico" id="modoservico">
                            <option value="">Selecione o modo</option>
                            <option value="Diaria">Diaria</option>
                            <option value="Serviço">Serviço</option>
                        </select>

                        <input class="input-black valor" type="text" placeholder="Valor" name="valor" id="valor">

                    </div>

                    <div class="cadastrofull-group1">

                        <label class="colorTEXT">Disponibilidade</label>
                        <div class="nopadding csscheckbox-caixa" style="text-align: center;margin-bottom: 20px">
                            <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" value="Domingo"><span><p>Dom</p></span></label>
                            <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" value="Segunda"><span><p>Seg</p></span></label>
                            <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" value="Terça"><span><p>Ter</p></span></label>
                            <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" value="Quarta"><span><p>Qua</p></span></label>
                            <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" value="Quinta"><span><p>Qui</p></span></label>
                            <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" value="Sexta"><span><p>Sex</p></span></label>
                            <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" value="Sabado"><span><p>Sab</p></span></label>
                        </div>

                        <label class="colorTEXT">Descrição</label>
                        <textarea class="input-black descricao mark" name="descricao" id="descricao"></textarea>


                        <input type="submit" class="input-submit" value="Finalizar" style="margin-left: 10px;">
                        <input type="button" class="input-submit input-button" value="Cancelar" onclick="redirection('../Navegacao.php')">
                    </div>

                </div>



            </form>
        </div>


    </body>
</html>
