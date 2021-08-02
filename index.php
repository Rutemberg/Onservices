<?php
session_start();

if (!empty($_SESSION['usuarioLogado'])) {
    header('Location: App/View/Inicio.php');
}
?>

<html>
    <head>
        <meta charset = "UTF-8" name = "viewport" content = "width=device-width, initial-scale=1.0">

        <script src = "App/JS/jquery-3.3.1.min.js"></script>
        <script src="App/JS/velocity.min.js"></script>
        <script src="App/JS/velocity.ui.js"></script>
        <script src="App/JS/Animacoes.js"></script>
        <script src="App/JS/Form.js"></script>
        <script src="App/JS/buscaCEP.js"></script>
        <script src="App/JS/Animacoes_Forms.js"></script>
        <script src="App/JS/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

        <link rel="shortcut icon" href="App/Imagens/Icones/LogoOnservices.ico" type="image/x-icon">
        <link rel="icon" href="App/Imagens/Icones/LogoOnservices.ico" type="image/x-icon">
        
        <script>
            $(document).ready(function () {
                $('.cep').mask('00000-000');
                $('.cepDigitado').mask('00000-000');
                $('.cpf').mask('000.000.000-00', {reverse: true});
                $('.telefone').mask('(00) 00000-0000');
            })

            if (parent !== self) {
                parent.location = location;
            }
        </script>



        <link rel="stylesheet" href="App/CSS/Estilo_FIX.css">
        <link rel="stylesheet" href="App/CSS/Estilo_Effects.css">
        <link rel="stylesheet" href="App/CSS/Estilo_Forms.css">
        <link rel="stylesheet" href="App/CSS/Estilo_Menus.css">

        <title>Onservices</title>
    </head>
    <body>

        <div class="escala-1 fullSize backfiltro"></div>

        <div class="escala-3 Topo">

            <img class="Logo" src="App/Imagens/Icones/LogoOnservices.png">
            <ul class="menu">
                <li class="menu-item Objecthover">Home</li>
                <li class="menu-item Objecthover">Sobre</li>
                <li class="menu-item Objecthover" id="item-cadastrar" onclick="InForm('paddingcorpo1', 'transition', 'transitioncadastro')">Cadastrar</li>
                <li class="menu-item Objecthover" id="item-entrar" onclick="AnimationTranslateBottomOUT('translate', 'login', 'translatecadastro')">Entrar</li>
                <li class="menu-item">
                    <div class="display-table">
                        <div class="centralizar">
                            <img class="menu-item-icone" src="App/Imagens/Icones/Userlogin.png">
                        </div>
                    </div>
                </li>
            </ul>

        </div>


        <div class="escala-2 fullSize paddingcorpo">
            <div class="display-table">
                <div class="centralizar">


                    <form class="login displaynone" action="App/Controladores/controladorLogin.php" method="POST">
                        <img class="login-img" src="App/Imagens/Icones/Userlogin.png">
                        <input class="login-input email" type="text" name="email" placeholder="Email" onclick="escalaBACKGROUND('login')">
                        <input class="login-input senha" name="senha" type="password" placeholder="Senha" onclick="escalaBACKGROUND('login')">
                        <input class="form-back Objecthover" onclick="AnimationTranslateBottomIN('translate', 'login', 'translatecadastro')" type="button" value="Voltar">
                        <input class="input-submit" type="submit" value="Entrar">
                    </form>

                </div>
            </div>
        </div>



        <div class="escala-2 fullSize paddingcorpo paddingcorpo1 translate">
            <div class="conteiner fullSize">

                <article class="conteiner-conteudo transition">
                    <header class="conteudo-cabecalho">
                        O jeito mais esperto de contratar ou trabalhar
                    </header>
                    <div class="conteudo">
                        O Onservice é um serviço para prestação e contratação
                        de serviços autônomos que revolucionará o modo como isso é realizado no Brasil
                        Se você é um prestador de serviços,faça seu cadastro inicial
                    </div>
                    <div class="conteudo">
                        <div class="display-table">
                            <div class="centralizar" style="text-align: center">
                                <div class="conteudo-icone">
                                    <img class="conteudo-icone-img" src="App/Imagens/Icones/icone-contrate.png">
                                    <p class="conteudo-icone-text">Contrate</p>
                                </div>
                                <div class="conteudo-icone">
                                    <img class="conteudo-icone-img" src="App/Imagens/Icones/icone-trabalhe.png">
                                    <p class="conteudo-icone-text">Trabalhe</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>



                <div class="escala-2 container-cadastro transition">

                    <form class="cadastro shadow-5">

                        <script>
                            $(document).ready(function () {
                                document.getElementById('buttonformIN').focus();
                            })
                        </script>
                        <header> 
                            Cadastro
                        </header>
                        <label>Nome</label>
                        <input type="text" id="nomeDigitado" onchange="digitarcamposAUTO(nome, nomeDigitado)">

                        <label>Email</label>
                        <input type="text" id="emailDigitado" onchange="digitarcamposAUTO(email, emailDigitado)">

                        <label>Cep</label>
                        <input type="text" id="cepDigitado" name="cepDigitado" class="cepDigitado" onchange="digitarcamposAUTO(cep, cepDigitado)" onblur="pesquisacep(this.value);">
                        <input type="button" id="buttonformIN" class="input-button input-submit mark" value="Continuar" onclick="InForm('paddingcorpo1', 'transition', 'transitioncadastro')">
                    </form>

                </div>



            </div>
        </div>

        <div class="escala-2 fullSize paddingcorpo2 transitioncadastro translatecadastro displaynone">

            <form method="POST" enctype="multipart/form-data" action="App/Controladores/controladorCadastro.php" onsubmit="return ValidaCadastro();" class="cadastrofull transitioncadastro formularioCadastro displaynone" id="formularioCadastro" name="formularioCadastro">
                <header class="fixed transitioncadastro" style="background: #f5f5f3;width: 100%">
                    Cadastro
                </header>

                <div class="cadastrofull-imagem transitioncadastro displaynone">
                    <div class="backimagem">
                        <div class="display-table">
                            <div class="centralizar">
                                <img class="imagem" id="imagem">
                            </div>
                        </div>
                    </div>
                    <label for="fileimagem" class="input-button file">
                        <input type="file" id="fileimagem" name="fileimagem" class="input-button" value="Carregar" style="display: none" onchange="readURL(this);">Carregar</label>
                </div>

                <div class="nopadding cadastrofull-groups transitioncadastro displaynone">

                    <div class="cadastrofull-group1">

                        <label>Dados</label>
                        <input class="placeholder nome" type="text" id="nome" name="nome" placeholder="Nome">
                        <input class="placeholder email" autocomplete="on" type="text" id="email" name="emailoff" placeholder="Email">
                        <input class="placeholder cpf" type="text" id="cpf" name="cpf" placeholder="Cpf">
                        <input class="placeholder telefone" type="text" id="telefone" name="telefone" placeholder="Telefone">
                        <input class="placeholder datanascimento" type="text" id="datanascimento" name="datanascimento" placeholder="Data nascimento" onfocus="(this.type = 'date')">
                        <select class="placeholder select sexo" name="sexo" id="sexo">
                            <option value="">Selecione o sexo</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                        <label>Segurança</label>
                        <input class="placeholder senha" type="password" id="senha" name="senha" placeholder="Senha">
                        <input class="placeholder comfirmarsenha" type="password" id="comfirmarsenha" name="comfirmarsenha" placeholder="Confirmar senha">

                    </div>

                    <div class="cadastrofull-group1">

                        <label>Endereço</label>
                        <input class="placeholder cep" type="text" id="cep" name="cep" placeholder="Cep" onblur="pesquisacep(this.value);">
                        <input class="placeholder rua" type="text" id="rua" name="rua" placeholder="Rua">
                        <input class="placeholder bairro" type="text" id="bairro" name="bairro" placeholder="Bairro">
                        <input class="placeholder cidade" type="text" id="cidade" name="cidade" placeholder="Cidade">
                        <input class="placeholder uf" type="text" id="uf" name="uf" placeholder="Estado">
                        <input class="placeholder numero" type="text" id="numero" name="numero" placeholder="Numero">
                        <input type="submit" class="input-submit" value="Finalizar">

                    </div>
                </div>

                <div class="cadastrofull-icones">
                    <ul class="menu" style="height: 100%;padding: 0">
                        <li class="menu-item icone Objecthover" style="margin: 0" onclick="limparCampos()">
                            <img class="icone-img" src="App/Imagens/Icones/icone-limpar.png">
                            Limpar
                        </li>
                        <li class="menu-item icone Objecthover" style="margin: 0" onclick="OutForm('paddingcorpo1', 'transition', 'transitioncadastro')">
                            <img class="icone-img" src="App/Imagens/Icones/icone-back.png">
                            Voltar
                        </li>

                    </ul>
                </div>

            </form>

        </div>


    </body>
</html>
