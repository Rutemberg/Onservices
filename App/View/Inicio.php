<?php
session_start();

if (empty($_SESSION['usuarioLogado'])) {
    header('Location: ../../index.php');
}

require '../DTO/funcoesAux.php';
require '../DAO/ServicoDAO.php';
require '../DAO/ContratarDAO.php';

//        $id = $_GET['idusuario'];
$id = $_SESSION['idUsuarioLogado'];

$listarservicosDAO = new ServicoDAO();
$listarcontratarDAO = new ContratarDAO();
$listarservicos = $listarservicosDAO->listarFULL($id);
$listarcontratar = $listarcontratarDAO->listarFULL($id);

$countservicos = count($listarservicos);
$countcontratar = count($listarcontratar);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="../CSS/Estilo_FIX.css">
        <link rel="stylesheet" href="../CSS/Estilo_Menus.css">
        <link rel="stylesheet" href="../CSS/Estilo_Effects.css">
        <link rel="stylesheet" href="../CSS/Estilo_Forms.css">

        <script src="../JS/jquery-3.3.1.min.js"></script>
        <script src="../JS/velocity.min.js"></script>
        <script src="../JS/velocity.ui.js"></script>
        <script src="../JS/Animacoes.js"></script>
        <script src="../JS/Animacoes_Forms.js"></script>
        <script src="../JS/Animacoes_Inicio.js"></script>


    </head>
    <body>


        <div class="escala-0 fullSize backfiltroblack back-escala"></div>


        <div class="escala-3 Topo displaynone inicioEFEITO displaynone" style="background: transparent;box-shadow: inset 0 0 0 3000px rgba(0,0,0,0.6);">

            <img class="Logo" src="../Imagens/Icones/LogoOnservicesWHITE.png" onclick="abrirEmIframe('iframeInicio', 'Navegacao.php')">
            <ul class="menu">

                <li class="menu-item">
                    <div class="display-table">
                        <div class="centralizar">
                            <input type="search" placeholder="Procure por serviço ou categoria" onkeyup="abrirEmIframe('iframeInicio', '../Controladores/controladorBuscar.php?busca=' + this.value)">
                        </div>
                    </div>
                </li>
                <li class="menu-item" onclick="InSession('sessaousuario', 'backusuariosessao')">
                    <div class="display-table">
                        <div class="centralizar">
                            <div class="menu-item-icone" src="App/Imagens/Icones/Userlogin.png"
                                 style="width: 50px;
                                 height: 50px;
                                 overflow: hidden;
                                 border-radius: 50%;
                                 background: url('../Imagens/UserIMG/<?php echo $_SESSION['imagemUsuariologado']; ?>') no-repeat center;
                                 background-size: cover;
                                 "></div>
                        </div>
                    </div>
                </li>
            </ul>

        </div>



        <div class="escala-4 fullSize displaynone backusuariosessao"></div>

        <div class="escala-5 sessaousuario">
            <header class="Subtitulos colorTEXT">
                Sessão
            </header>

            <div class="conteudo nopadding">

                <div class="sessaousuario-img"
                     style="background: url('../Imagens/UserIMG/<?php echo $_SESSION['imagemUsuariologado']; ?>') no-repeat center;
                     background-size: cover;">
                </div>
<!--                <p class="subtexto colorTEXT"><?php echo $_SESSION['emailUsuarioLogado']; ?></p>-->

                <ul style="margin-top: 30px">
                    <li class="menulateral-item Objecthover" onmousedown="OutSession('sessaousuario', 'backusuariosessao')" onclick="abrirEmIframe('iframeInicio', '../Controladores/controladorAlterar.php')"><img class="menulateral-item-icone" src="../Imagens/Icones/Profile.png">Meu perfil</li>
                </ul>
            </div>

            <footer>
                <ul>
                    <li class="menulateral-item Objecthover" style="padding-right: 10px;margin-bottom: 20px" onclick="redirection('../Controladores/controladorLogin.php?logout=1')"><img class="menulateral-item-icone" src="../Imagens/Icones/Logout.png">Sair</li>
                </ul>  
            </footer>
        </div>


        <div class="escala-2 fullSize paddingcorpo paddingcorpo3  inicioEFEITO displaynone">

            <div class="conteiner fullSize inicioEFEITO displaynone" style="background: transparent;box-shadow: inset 0 0 0 3000px rgba(0,0,0,0.6);overflow: hidden">

                <div class="fullSize nopadding inicioEFEITOConteiner displaynone" style="margin: 0;overflow: hidden">
                    <iframe class="iframe-inicio" id="iframeInicio" marginwidth="0" marginheight='0' src="Navegacao.php"></iframe>
                </div>

            </div>

            <div class="escala-2 menulateral nopadding" onmouseup="InMenu('paddingcorpo3', 'menulateral')" onmousedown="OutMenu('paddingcorpo3', 'menulateral')">
                <div class="nopadding inicioEFEITO displaynone" style="box-shadow: inset 0 0 0 3000px rgba(23,23,23,0.5);">
                    <div class="display-table"> 
                        <div class="centralizar"> 
                            <ul>
                                <li class="menulateral-item Objecthover inicioEFEITO displaynone"><img class="menulateral-item-icone" src="../Imagens/Icones/menuicon.png">Menu-Categorias</li>
                                <li class="menulateral-item Objecthover inicioEFEITO displaynone" onclick="abrirEmIframe('iframeInicio', '../Controladores/controladorAlterar.php')"><img class="menulateral-item-icone" src="../Imagens/Icones/Profile.png" >Meu perfil</li>
                                <?php
                                if ($countservicos > 0) {
                                    ?>
                                    <li class="menulateral-item Objecthover inicioEFEITO displaynone"  onclick="abrirEmIframe('iframeInicio', 'QuadroP.php')"><img class="menulateral-item-icone" src="../Imagens/Icones/icone-trabalheWHITE.png">Meus serviços</li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="menulateral-item Objecthover inicioEFEITO displaynone" onclick="abrirEmIframe('iframeInicio', 'Modulos/Prestador.php')"><img class="menulateral-item-icone" src="../Imagens/Icones/icone-trabalheWHITE.png" >Prestar serviço</li>
                                    <?php
                                }
                                ?>
                                <?php
                                if ($countcontratar > 0) {
                                    ?>
                                    <li class="menulateral-item Objecthover inicioEFEITO displaynone" onclick="abrirEmIframe('iframeInicio', 'QuadroC.php')"><img class="menulateral-item-icone" src="../Imagens/Icones/icone-contrateWHITE.png">Contratações ativas</li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="menulateral-item Objecthover inicioEFEITO displaynone" onclick="abrirEmIframe('iframeInicio', 'Modulos/Contratador.php')"><img class="menulateral-item-icone" src="../Imagens/Icones/icone-contrateWHITE.png">Contratar</li>
                                    <?php
                                }
                                ?>
                                    <li style="margin-top: 50px;" class="menulateral-item Objecthover inicioEFEITO displaynone" onclick="abrirEmIframe('iframeInicio', '../Controladores/controladorLogin.php?logout=1')"><img class="menulateral-item-icone" src="../Imagens/Icones/Logout.png" >Sair</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>














        <?php
        if (isset($_SESSION['usuariocount'])) {
            ?>
            <div class="mensagem fullSize escala-5 mensagem_aguarde displaynone">
                <div class="display-table">
                    <div class="centralizar">

                        <header class="Titulos mensagem_aguarde displaynone" style="margin: 0 auto;color: white">
                            Bem vindo <?php echo $_SESSION['nomeUsuarioLogado']; ?>
                        </header>

                    </div>
                </div>
            </div>


            <?php
            unset($_SESSION['usuariocount']);
        } else {
            ?>
            <div class="mensagem fullSize escala-5 mensagem_aguarde displaynone">
                <div class="display-table">
                    <div class="centralizar" style="text-align: center">

                        <img style="width: 200px;height: auto" src="../Imagens/Icones/LogoOnservicesWHITE.png">

                    </div>
                </div>
            </div>

        <?php }
        ?>



    </body>
</html>
