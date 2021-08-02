
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../CSS/Estilo_FIX.css">
        <link rel="stylesheet" href="../CSS/Estilo_Forms.css">
        <link rel="stylesheet" href="../CSS/Estilo.Checkbox.css">
        <link rel="stylesheet" href="../CSS/Estilo_Effects.css">


        <script src="../JS/jquery-3.3.1.min.js"></script>
        <script src="../JS/velocity.min.js"></script>
        <script src="../JS/velocity.ui.js"></script>
        <script src="../JS/Animacoes_Inicio.js"></script>
        <script src="../JS/Animacoes.js"></script>

        <style>
            .noneWHITE{
                background: none;
                border: none;
                color: white;
                pointer-events: none
            }
        </style>

    </head>
    <body style="overflow: auto">

        <div class="escala-2 fullSize" >
            <?php
            session_start();

            include '../DAO/UsuarioDAO.php';
            include '../DAO/ServicoDAO.php';
            include '../DAO/ContratarDAO.php';
            include '../DTO/funcoesAux.php';

            $listarusuarioDAO = new UsuarioDAO();
            $listarservicoDAO = new ServicoDAO();
            $listarcontratarDAO = new ContratarDAO();

            $idservico = $_GET['idservico'];
            $idusuario = $_GET['idusuario'];
            $modulo = $_GET['modulo'];

//            $idservico = 29;
//            $idusuario = 27;

            $idsessao = $_SESSION['idUsuarioLogado'];


            $usuariosessao = $listarusuarioDAO->listarPorID($idsessao);
            $startendereco = $usuariosessao['cep'];
            $startendereco = $usuariosessao['rua'] . ', ' . $usuariosessao['cidade'] . ' - ' . $usuariosessao['estado'];

            $usuario = $listarusuarioDAO->listarPorID($idusuario);
            $endendereco = $usuario['cep'];
            $endendereco = $usuario['rua'] . ', ' . $usuario['cidade'] . ' - ' . $usuario['estado'];



            if (isset($_GET['modulo']) && $_GET['modulo'] == 'prestador') {
                $listarservico = $listarservicoDAO->listarONE($idservico);
            }
            if (isset($_GET['modulo']) && $_GET['modulo'] == 'contratador') {
                $listarservico = $listarcontratarDAO->listarONE($idservico);
            }
            ?>


            <div id="floating-panel" class="transitionENTRADA displaynone">
                <input id="start" class="displaynone" value="<?php echo $startendereco; ?>">
                <input id="end" class="displaynone" value="<?php echo $endendereco; ?>">


                <b class="colorTEXT">Modo: </b>
                <select id="mode" class="input-black select-white" style="width: max-content;margin: 0">
                    <option value="DRIVING">Carro</option>
                    <option value="WALKING">A pé</option>
                    <option value="BICYCLING">Bicicleta</option>
                    <option value="TRANSIT">Onibus</option>
                </select>


            </div>

            <header id="map" class="transitionENTRADA displaynone" style="height: 400px">
            </header>


            <div class="conteiner transitionENTRADA displaynone" style="overflow: visible;height: 750px;background: black">

                <form class="cadastrofull transitioncadastro formularioCadastro" id="formularioCadastro" name="formularioCadastro">
                    <p class="colorTEXT transitionENTRADA displaynone" style="padding: 20px;font-size: 15px;text-align: right;">
                        Criado <b><?php
                            if (isset($_GET['modulo']) && $_GET['modulo'] == 'contratador') {
                                $data = $listarservico['datacadastrocontratar'];
                            } else {
                                $data = $listarservico['datacadastroservicos'];
                            }

                            $dataatual = date('y-m-d');
                            $datacadastro = calculardata($data, $dataatual);
                            echo $datacadastro;
                            ?> </b>
                    </p>
                    <header class="fixed transitioncadastro colorTEXT transitionENTRADA displaynone" style="width: 100%;background: black;padding: 20px;box-sizing: border-box;z-index: 2;">
                        <?php echo $listarservico['titulo']; ?>
                    </header>

                    <div class="mark transitionENTRADA displaynone" style="height: 80px;">
                        <ul class="menu mark" style="height: 100%;padding: 0;text-align: right">
                            <li class="menu-item icone mark colorTEXT Objecthover" style="padding: 5px;display: inline-block;margin: 0 10px;" onclick="indados('dados', 'dadosservico')">
                                <img class="icone-img" src="../Imagens/Icones/icone-trabalheWHITE.png">
                                Dados do serviço
                            </li>
                            <li class="menu-item icone mark colorTEXT Objecthover" style="padding: 5px;display: inline-block;margin: 0 10px;" onclick="indados('dados', 'dadosusuario')">
                                <img class="icone-img" src="../Imagens/Icones/Profile.png">
                                Perfil do usuario
                            </li>
                            <li class="menu-item icone mark colorTEXT Objecthover" style="padding: 5px;display: inline-block;margin: 0 10px;" >
                                <img class="icone-img" src="../Imagens/Icones/Estrela.png">
                                Avalicações e comentarios
                            </li>

                        </ul>
                    </div>
                    <div class="cadastrofull-imagem transitionENTRADA displaynone">
                        <div class="backimagem"
                             style="background: url('../Imagens/UserIMG/<?php echo $usuario['imagem']; ?>') center no-repeat;
                             background-size: cover;border: 10px solid black;
                             "
                             >
                        </div>
                        <p class="Subtitulos textoverflow noneWHITE" style="width: 100%;text-align: center;font-size: 30px;margin-top: 20px"><?php echo $usuario['nome']; ?></p>
                    </div>




                    <div class="nopadding cadastrofull-groups transitionENTRADA displaynone dados dadosservico" style="overflow: hidden;height: auto">

                        <div class="cadastrofull-group1 noneWHITE">

                            <label>Categoria</label>
                            <input class="Subtitulos noneWHITE" value="<?php echo $listarservico['categoria']; ?>">
                            <label>Serviço</label>
                            <input class="Subtitulos noneWHITE" value="<?php echo $listarservico['servico']; ?>">
                            <label>Modo</label>
                            <input class="Subtitulos noneWHITE" value="<?php
                            if (isset($_GET['modulo']) && $_GET['modulo'] == 'contratador') {
                                echo $listarservico['modocontratar'];
                            } else {
                                echo $listarservico['modoservico'];
                            }
                            ?>">
                                   <?php if (isset($_GET['modulo']) && $_GET['modulo'] == 'prestador') { ?>
                                <label>Valor</label>
                                <input value="<?php
                                $valor = number_format($listarservico['valor'], 2, ",", ".");
                                echo "R$ $valor";
                                ?>" class="Subtitulos noneWHITE" >
                                   <?php } ?>
                        </div>

                        <div class="cadastrofull-group1 colorTEXT">

                            <label>Disponibilidade</label>
                            <div class="nopadding csscheckbox-caixa colorTEXT textoverflow" style="text-align: center;margin-bottom: 20px;pointer-events: none;">

                                <?php
                                $dias = explode(",", $listarservico['diasdisponiveis']);
                                ?>

                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Domingo", $dias)) { ?> checked <?php } ?> value="Domingo"><span><p>Dom</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Segunda", $dias)) { ?> checked <?php } ?> value="Segunda"><span><p>Seg</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Terça", $dias)) { ?> checked <?php } ?> value="Terça"><span><p>Ter</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Quarta", $dias)) { ?> checked <?php } ?> value="Quarta"><span><p>Qua</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Quinta", $dias)) { ?> checked <?php } ?> value="Quinta"><span><p>Qui</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Sexta", $dias)) { ?> checked <?php } ?> value="Sexta"><span><p>Sex</p></span></label>
                                <label class="csscheckbox csscheckbox-default"><input type="checkbox" name="diasdisponiveis[]" class="diasdisponiveis" id="diasdisponiveis" <?php if (in_array("Sabado", $dias)) { ?> checked <?php } ?> value="Sabado"><span><p>Sab</p></span></label>
                            </div>
                            <label>Descricão</label>
                            <div style="overflow: auto;font-size: 20px;height: 250px;padding: 15px;box-sizing: border-box"><?php echo $listarservico['descricao']; ?></div>


                        </div>
                    </div>




                    <div class="nopadding cadastrofull-groups mark dados displaynone dadosusuario " style="overflow: hidden;height: auto">

                        <div class="cadastrofull-group1 noneWHITE">

                            <label>Nome</label>
                            <input class="Subtitulos noneWHITE" value="<?php echo $usuario['nome']; ?>">
                            <label>Email</label>
                            <input class="Subtitulos noneWHITE" value="<?php echo $usuario['email']; ?>">
                            <label>Telefone - contato</label>
                            <input class="Subtitulos noneWHITE" value="<?php echo $usuario['telefone']; ?>">
                            <label>Sexo</label>
                            <input class="Subtitulos noneWHITE" value="<?php echo $usuario['sexo']; ?>">

                        </div>

                        <div class="cadastrofull-group1 noneWHITE">

                            <label>Cep</label>
                            <input class="Subtitulos noneWHITE" value="<?php echo $usuario['cep']; ?>">
                            <label>Endereço</label>
                            <input class="Subtitulos noneWHITE" value="<?php echo $usuario['rua'] . ' ' . $usuario['numero']; ?>">
                            <input class="Subtitulos noneWHITE" value="<?php echo $usuario['bairro']; ?>">

                        </div>
                    </div>

                </form>
                
                <input style="margin-top: 20px;" type="button" class="input-submit input-button" value="Solicitar serviço">



            </div>






























            <script>
                function initMap() {
                    var directionsDisplay = new google.maps.DirectionsRenderer;
                    var directionsService = new google.maps.DirectionsService;
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 14,
                        center: {lat: -15.7797200, lng: -47.9297200}
                    });
                    directionsDisplay.setMap(map);

                    calculateAndDisplayRoute(directionsService, directionsDisplay);
                    document.getElementById('mode').addEventListener('change', function () {
                        calculateAndDisplayRoute(directionsService, directionsDisplay);
                    });
                }

                function calculateAndDisplayRoute(directionsService, directionsDisplay) {
                    var selectedMode = document.getElementById('mode').value;
                    directionsService.route({
                        origin: document.getElementById('start').value,
                        destination: document.getElementById('end').value,
                        travelMode: google.maps.TravelMode[selectedMode]
                    }, function (response, status) {
                        if (status == 'OK') {
                            directionsDisplay.setDirections(response);
                        } else {
                            window.alert('Directions request failed due to ' + status);
                        }
                    });
                }
            </script>

            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL34B_xQ413FR1mGcQKFkiOZnm3i3gqsY&callback&callback=initMap">
            </script>








        </div>

    </body>
</html>
