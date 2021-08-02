<?php
session_start();

require '../DTO/funcoesAux.php';
require '../DAO/UsuarioDAO.php';
require '../DAO/ServicoDAO.php';
require '../DAO/ContratarDAO.php';

//        $id = $_GET['idusuario'];
$id = $_SESSION['idUsuarioLogado'];

$listarusuarioDAO = new UsuarioDAO();
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

        <script src="../JS/jquery-3.3.1.min.js"></script>
        <script src="../JS/velocity.min.js"></script>
        <script src="../JS/velocity.ui.js"></script>
        <script src="../JS/Animacoes.js"></script>
        <script src="../JS/Animacoes_Inicio.js"></script>
    </head>
    <body style="overflow: auto">


        <div class="escala-1 fullSize">

            <div class="minhasopcoes nopadding" style="overflow: hidden">

                <header class="colorTEXT displaynone transitionENTRADA" style="margin-bottom: 50px">
                    Inicio rápido
                </header>
                <div class="conteiner displaynone transitionENTRADA" style="background: none">

                    <div class="opcoes bordereffect" onclick="redirection('../Controladores/controladorAlterar.php')">
                        <div class="display-table">
                            <div class="centralizar">
                                <img src="../Imagens/Icones/Profile.png">
                                <p class="Subtitulos" style="margin-top: 20px;">Meu perfil</p>
                            </div>
                        </div>
                    </div>


                    <?php
                    if ($countservicos > 0) {
                        ?>
                        <div class="opcoes bordereffect" onclick="redirection('QuadroP.php')">
                            <div class="display-table">
                                <div class="centralizar">
                                    <img src="../Imagens/Icones/icone-maletas.png">
                                    <p class="Subtitulos" style="margin-top: 20px;">Meus serviços</p>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="opcoes bordereffect" onclick="redirection('Modulos/Prestador.php')">
                            <div class="display-table">
                                <div class="centralizar">
                                    <img src="../Imagens/Icones/icone-trabalheWHITE.png">
                                    <p class="Subtitulos" style="margin-top: 20px;">Prestar serviços</p>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>

                    <?php
                    if ($countcontratar > 0) {
                        ?>
                        <div class="opcoes bordereffect" onclick="redirection('QuadroC.php')">
                            <div class="display-table">
                                <div class="centralizar">
                                    <img src="../Imagens/Icones/icone-contrates.png" >
                                    <p class="Subtitulos" style="margin-top: 20px">Contratações ativas</p>
                                </div>
                            </div>
                        </div>  
                    <?php } else {
                        ?>

                        <div class="opcoes bordereffect" onclick="redirection('Modulos/Contratador.php')">
                            <div class="display-table">
                                <div class="centralizar">
                                    <img src="../Imagens/Icones/icone-contrateWHITE.png" >
                                    <p class="Subtitulos" style="margin-top: 20px">Contratar</p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="opcoes bordereffect" onclick="redirection('../Controladores/controladorLogin.php?logout=1')">
                        <div class="display-table">
                            <div class="centralizar">
                                <img src="../Imagens/Icones/Logout.png">
                                <p class="Subtitulos" style="margin-top: 20px;">Sair</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <?php
            if ($countcontratar > 0) {

                foreach ($listarcontratar as $contratar) {
                    $servico = $contratar['servico'];

                    $listarPorCategoriaServico = $listarservicosDAO->listarPorServico($servico);

                    if (count($listarPorCategoriaServico) > 0) {
                        ?>
                        <div class="" style="margin-top: 20px;overflow: hidden">

                            <small class="Subtitulos colorTEXT displaynone transitionENTRADA" style="font-weight: 300;margin: 0">Para você que está contratando</small>
                            <header class=" colorTEXT displaynone transitionENTRADA" style="text-align: left">Profissionais em <b><?php echo $contratar['servico']; ?></b></header>


                            <div class="conteudo colorTEXT" style="overflow: auto">
                                <div class="nopadding" style="width: max-content;overflow-y: hidden">
                                    <?php
                                    foreach ($listarPorCategoriaServico as $Servico) {
                                        $usuario = $listarusuarioDAO->listarPorID($Servico['modservico_fk_idusuario']);


                                        $valor = number_format($Servico['valor'], 2, ",", ".");
                                        ?>

                                        <div class=" nopadding cards bordereffect displaynone transitionENTRADA" onclick="redirection('QuadroP.php?idusuario=<?php echo $usuario['idusuario']; ?>')" style="text-align: left;background: black">

                                            <div class=" nopadding colorTEXT" style="height: 50px;overflow: hidden">

                                                <?php
                                                $usuariosessao = $listarusuarioDAO->listarPorID($id);

                                                $origins = $usuariosessao['cep'];
                                                $destinations = $usuario['cep'];
                                                $mode = 'CAR';
                                                $language = 'PT';
                                                $sensor = 'false';

                                                $add = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/xml?origins=''{$origins}'|&destinations='{$destinations}'|&mode='{$mode}'|&language='{$language}'|&sensor='{$sensor}'");

                                                $add2 = explode(',', $add);

                                                $add3 = explode('    ', $add2[6]);

                                                if (count($add3) >= 1) {

                                                    $minutos = $add3[2];
                                                    $distancia = $add3[4];
                                                } else {
                                                    $minutos = "?????";
                                                    $distancia = "?????";
                                                }
                                                ?>

                                                <ul class=" menu" style="height: 40px;float: right;margin: 10px 20px;font-size: 14px;">
                                                    <li class="menu-item" style="padding: 0;margin: 0 10px;line-height: 40px"><img height="25px" src="../Imagens/Icones/distancia.png"></li>
                                                    <li class="menu-item" style="padding: 0;margin: 0 0px;line-height: 40px"><?php echo $distancia; ?></li>
                                                    <li class="menu-item" style="padding: 0;margin: 0 10px;line-height: 40px"><img height="25px" src="../Imagens/Icones/tempo.png"></li>
                                                    <li class="menu-item" style="padding: 0;margin: 0 0px;line-height: 40px"><?php echo $minutos; ?></li>
                                                </ul>

                                            </div>


                                            <div class="cards-imagem"style="
                                                 border: 10px solid black;
                                                 background: url('../Imagens/UserIMG/<?php echo $usuario['imagem']; ?>')center no-repeat; 
                                                 background-size: cover;
                                                 margin-bottom: 10px;
                                                 ">
                                            </div>

                                            <div>
                                                <small style="margin: 0;"><?php echo $usuario['nome']; ?></small>
                                                <p class="Subtitulos  textoverflow" style="margin: 0;width: 100%"><?php echo $Servico['titulo']; ?></p>
                                                <p class=" textoverflow" style="margin: 0;font-size: 15px"><?php echo "<b>{$Servico['categoria']} - {$Servico['servico']} </b>"; ?></p>

                                                <p class=" textoverflow" style="margin-top: 20px;font-size: 20px"><?php echo "Valor: <b>R$ {$valor}</b>"; ?></p>
                                            </div>
                                        </div>


                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        
                    }
                }
            }
            ?>


            <?php
            if ($countservicos > 0) {

                foreach ($listarservicos as $Trabalhar) {
                    $servico = $Trabalhar['servico'];

                    $listarPorCategoriaServico = $listarcontratarDAO->listarPorServico($servico);

                    if (count($listarPorCategoriaServico) > 0) {
                        ?>
                        <div class="" style="margin-top: 20px;overflow: hidden">

                            <small class="Subtitulos colorTEXT displaynone transitionENTRADA" style="font-weight: 300;margin: 0">Para você que está a procura de</small>
                            <header class=" colorTEXT displaynone transitionENTRADA" style="text-align: left">Contratantes em <b><?php echo $Trabalhar['servico']; ?></b></header>


                            <div class=" conteudo colorTEXT" style="overflow: auto">
                                <div class="nopadding" style="width: max-content;overflow: hidden">
                                    <?php
                                    foreach ($listarPorCategoriaServico as $Servico) {
                                        $usuario = $listarusuarioDAO->listarPorID($Servico['modcontratar_fk_idusuario']);
                                        ?>

                                        <div class=" nopadding cards bordereffect displaynone transitionENTRADA" onclick="redirection('QuadroC.php?idusuario=<?php echo $usuario['idusuario']; ?>')" style="text-align: left;background: black">

                                            <div class=" nopadding colorTEXT" style="height: 50px;overflow: hidden">

                                                <?php
                                                $usuariosessao = $listarusuarioDAO->listarPorID($id);

                                                $origins = $usuariosessao['cep'];
                                                $destinations = $usuario['cep'];
                                                $mode = 'CAR';
                                                $language = 'PT';
                                                $sensor = 'false';

                                                $add = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/xml?origins=''{$origins}'|&destinations='{$destinations}'|&mode='{$mode}'|&language='{$language}'|&sensor='{$sensor}'");

                                                $add2 = explode(',', $add);

                                                $add3 = explode('    ', $add2[6]);

                                                if (count($add3) >= 1) {

                                                    $minutos = $add3[2];
                                                    $distancia = $add3[4];
                                                } else {
                                                    $minutos = "?????";
                                                    $distancia = "?????";
                                                }
                                                ?>

                                                <ul class=" menu" style="height: 40px;float: right;margin: 10px 20px;font-size: 14px;">
                                                    <li class="menu-item" style="padding: 0;margin: 0 10px;line-height: 40px"><img height="25px" src="../Imagens/Icones/distancia.png"></li>
                                                    <li class="menu-item" style="padding: 0;margin: 0 0px;line-height: 40px"><?php echo $distancia; ?></li>
                                                    <li class="menu-item" style="padding: 0;margin: 0 10px;line-height: 40px"><img height="25px" src="../Imagens/Icones/tempo.png"></li>
                                                    <li class="menu-item" style="padding: 0;margin: 0 0px;line-height: 40px"><?php echo $minutos; ?></li>
                                                </ul>

                                            </div>

                                            <div class="cards-imagem"style="
                                                 border: 10px solid black;
                                                 background: url('../Imagens/UserIMG/<?php echo $usuario['imagem']; ?>')center no-repeat; 
                                                 background-size: cover;
                                                 margin-bottom: 10px;
                                                 ">
                                            </div>

                                            <div>
                                                <small style="margin: 0;"><?php echo $usuario['nome']; ?></small>
                                                <p class="Subtitulos  textoverflow" style="margin: 0;width: 100%"><?php echo $Servico['titulo']; ?></p>
                                                <p class=" textoverflow" style="margin: 0;font-size: 15px"><?php echo "<b>{$Servico['categoria']} - {$Servico['servico']} </b>"; ?></p>

                                            </div>
                                        </div>


                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        
                    }
                }
            }
            ?>




        </div>



    </body>
</html>
