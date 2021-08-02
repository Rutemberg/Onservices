
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="../CSS/Estilo_FIX.css">
        <link rel="stylesheet" href="../CSS/Estilo_Mensagens.css">
        <link rel="stylesheet" href="../CSS/Estilo_Forms.css">

        <script src="../JS/jquery-3.3.1.min.js"></script>
        <script src="../JS/velocity.min.js"></script>
        <script src="../JS/velocity.ui.js"></script>
        <script src="../JS/Animacoes.js"></script>
        <script src="../JS/Animacoes_Inicio.js"></script>
        <script src="../JS/Animacoes_Forms.js"></script>
        <script src="../JS/Form.js"></script>
        <script src="../JS/buscaCEP.js"></script>
        <script src="../JS/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
        <script src="../JS/Form_Mascaras.js"></script>

    </head>
    <body>

        <?php
        session_start();
        $id = $_SESSION['idUsuarioLogado'];
        
        require '../DTO/ClasseUsuario.php';
        require '../DAO/UsuarioDAO.php';

        $dadosUsuarioDAO = new UsuarioDAO();
        $dadosUsuario = $dadosUsuarioDAO->listarPorID($id);

        if (!$_POST) {
            ?>

            <form method="POST" enctype="multipart/form-data" action="#" onsubmit="return ValidaCadastro();" class="cadastrofull transitioncadastro formularioCadastro" id="formularioCadastro" name="formularioCadastro">
                <header class="fixed colorTEXT transitionENTRADA displaynone" style="background: none;width: 100%;padding-left: 40px;">
                    <?php
                    echo $dadosUsuario['nome'];
                    ?>
                </header>

                <div class="cadastrofull-imagem transitionENTRADA displaynone" style="top: 0">
                    <div class="backimagem"
                         style="
                         border: 10px solid black;
                         background: url('../Imagens/UserIMG/<?php echo $dadosUsuario['imagem']; ?>')center no-repeat; 
                         background-size: cover;
                         "
                         >
                        <div class="nopadding displaynone backimagemAlterar" style="background: white;height: 100%;width: 100%">
                            <div class="display-table">
                                <div class="centralizar">
                                    <img class="imagem" id="imagem">

                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="fileimagem" class="input-button file" onclick="esconderIMG('backimagemAlterar')">
                        <input type="file" id="fileimagem" name="fileimagem" class="input-button" value="Trocar" style="display: none" onchange="readURL(this);">Trocar</label>
                </div>

                <div class="nopadding cadastrofull-groups transitionENTRADA displaynone">

                    <div class="cadastrofull-group1">

                        <label class="colorTEXT">Meus Dados</label>
                        <input style="display: none" type="text" name="Oldimagem" value="<?php echo $dadosUsuario['imagem']; ?>">
                        <input class="input-black nome" type="text" id="nome" name="nome" placeholder="Nome" value="<?php echo $dadosUsuario['nome']; ?>">
                        <input class="input-black email" autocomplete="on" type="text" id="email" name="emailoff" placeholder="Email" value="<?php echo $dadosUsuario['email']; ?>"> 
                        <input class="input-black cpf" type="text" id="cpf" name="cpf" placeholder="Cpf" value="<?php echo $dadosUsuario['cpf']; ?>">
                        <input class="input-black telefone" type="text" id="telefone" name="telefone" placeholder="Telefone" value="<?php echo $dadosUsuario['telefone']; ?>">
                        <input class="input-black datanascimento" type="date" id="datanascimento" name="datanascimento" placeholder="Data nascimento" value="<?php echo $dadosUsuario['datanascimento']; ?>">
                        <select class="input-black select-white mark sexo" name="sexo" id="sexo">
                            <option value="<?php echo $dadosUsuario['sexo']; ?>"><?php echo $dadosUsuario['sexo']; ?></option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                        <label class="colorTEXT">Segurança</label>
                        <input class="input-black senha" type="password" id="senha" name="senha" placeholder="Senha" value="<?php echo $dadosUsuario['senha']; ?>">
                        <input class="input-black comfirmarsenha" type="password" id="comfirmarsenha" name="comfirmarsenha" placeholder="Confirmar senha">

                    </div>

                    <div class="cadastrofull-group1">

                        <label class="colorTEXT">Endereço</label>
                        <input class="input-black cep" type="text" id="cep" name="cep" placeholder="Cep" onblur="pesquisacep(this.value);" value="<?php echo $dadosUsuario['cep']; ?>">
                        <input class="input-black rua" type="text" id="rua" name="rua" placeholder="Rua" value="<?php echo $dadosUsuario['rua']; ?>">
                        <input class="input-black bairro" type="text" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo $dadosUsuario['bairro']; ?>">
                        <input class="input-black cidade" type="text" id="cidade" name="cidade" placeholder="Cidade" value="<?php echo $dadosUsuario['cidade']; ?>">
                        <input class="input-black uf" type="text" id="uf" name="uf" placeholder="Estado" value="<?php echo $dadosUsuario['estado']; ?>">
                        <input class="input-black numero" type="text" id="numero" name="numero" placeholder="Numero" value="<?php echo $dadosUsuario['numero']; ?>">
                        <input type="submit" class="input-submit" value="Finalizar" style="margin-left: 10px;">
                        <input type="button" class="input-submit input-button" value="Voltar" onclick="redirection('../View/Navegacao.php')">

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

            <?php
        } else {
            ?>
            <div class="escala-5 fullSize nopadding"style="overflow: hidden">
                <div class="mensagem">
                    <div class="display-table nopadding">
                        <div class="centralizar nopadding">

                            <?php
                            $nome = $_POST['nome'];
                            $email = $_POST['emailoff'];
                            $cpf = $_POST['cpf'];
                            $telefone = $_POST['telefone'];
                            $datanascimento = $_POST['datanascimento'];
                            $sexo = $_POST['sexo'];
                            $senha = $_POST['senha'];
                            $Oldimagem = $_POST['Oldimagem'];

                            $nameimagem = $_FILES['fileimagem']['name'];

                            $cep = $_POST['cep'];
                            $rua = $_POST['rua'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $estado = $_POST['uf'];
                            $numero = $_POST['numero'];


                            $alterarUsuario = new ClasseUsuario();
                            $alterarUsuario->setNome($nome);
                            $alterarUsuario->setEmail($email);
                            $alterarUsuario->setCpf($cpf);
                            $alterarUsuario->setTelefone($telefone);
                            $alterarUsuario->setDatanascimento($datanascimento);
                            $alterarUsuario->setSexo($sexo);
                            $alterarUsuario->setSenha($senha);
                            $alterarUsuario->setCep($cep);
                            $alterarUsuario->setRua($rua);
                            $alterarUsuario->setBairro($bairro);
                            $alterarUsuario->setCidade($cidade);
                            $alterarUsuario->setEstado($estado);
                            $alterarUsuario->setNumero($numero);

                            if (isset($_FILES['fileimagem']['name']) && $_FILES['fileimagem']['error'] == 0) {

                                $arquivo_tmp = $_FILES['fileimagem']['tmp_name'];
                                $nomeimagem = $_FILES['fileimagem']['name'];

                                $extensao = pathinfo($nomeimagem, PATHINFO_EXTENSION);
                                $extensao = strtolower($extensao);

                                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                                    $novoNome = uniqid() . '.' . $extensao;
                                    $imagem = $novoNome;
                                    $destino = "../Imagens/UserIMG/$novoNome";

                                    // tenta mover o arquivo para o destino
                                    if (@move_uploaded_file($arquivo_tmp, $destino)) {
                                        unlink("../Imagens/UserIMG/$Oldimagem");
                                    } else
                                        echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
                                } else
                                    $imagem = $Oldimagem;
                            } else
                                $imagem = $Oldimagem;

                            $alterarUsuario->setImagem($imagem);

                            $alterar = $dadosUsuarioDAO->alterar($alterarUsuario, $id);

                            if ($alterar) {
                                ?>

                                <div class="Titulos mensagem_cadastro nopadding displaynone" style="color: white;margin: 0">
                                    Alteração realizada com sucesso
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        setTimeout(function () {
                                            window.location = 'controladorAlterar.php';
                                        }, 5000);
                                    });
                                </script>
                            <?php } else {
                                ?>
                                <div class="Titulos mensagem_cadastro displaynone" style="color: white;margin: 0">
                                    Alteração não realizada
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        setTimeout(function () {
                                            window.location = 'controladorAlterar.php';
                                        }, 5000);
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
