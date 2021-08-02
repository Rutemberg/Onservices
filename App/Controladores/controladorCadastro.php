
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
        <script src="../JS/Animacoes_Forms.js"></script>
    </head>
    <body>
        <div class="escala-1 fullSize backfiltro backgroundFADE"></div>
        <div class="escala-0 fullSize backfiltroblack"></div>

        <div class="escala-2 fullSize nopadding"style="overflow: hidden">

            <div class="mensagem">
                <div class="display-table">
                    <div class="centralizar">

                        <header class="Titulos mensagem_aguarde displaynone" style="color: white;margin: 0">
                            Aguarde...
                        </header>

                        <?php
                        if (count($_POST) >= 13) {
                            $nome = $_POST['nome'];
                            $email = $_POST['emailoff'];
                            $cpf = $_POST['cpf'];
                            $telefone = $_POST['telefone'];
                            $datanascimento = $_POST['datanascimento'];
                            $datacadastro = date('y-m-d');
                            $sexo = $_POST['sexo'];
                            $senha = $_POST['senha'];

                            $nameimagem = $_FILES['fileimagem']['name'];

                            $cep = $_POST['cep'];
                            $rua = $_POST['rua'];
                            $bairro = $_POST['bairro'];
                            $cidade = $_POST['cidade'];
                            $estado = $_POST['uf'];
                            $numero = $_POST['numero'];




                            include '../DAO/UsuarioDAO.php';
                            include '../DTO/ClasseUsuario.php';

                            $novoUsuario = new ClasseUsuario();
                            $novoUsuario->setNome($nome);
                            $novoUsuario->setEmail($email);
                            $novoUsuario->setCpf($cpf);
                            $novoUsuario->setTelefone($telefone);
                            $novoUsuario->setDatanascimento($datanascimento);
                            $novoUsuario->setDatacadastro($datacadastro);
                            $novoUsuario->setSexo($sexo);
                            $novoUsuario->setSenha($senha);
                            $novoUsuario->setCep($cep);
                            $novoUsuario->setRua($rua);
                            $novoUsuario->setBairro($bairro);
                            $novoUsuario->setCidade($cidade);
                            $novoUsuario->setEstado($estado);
                            $novoUsuario->setNumero($numero);



                            if (isset($_FILES['fileimagem']['name']) && $_FILES['fileimagem']['error'] == 0) {

                                $arquivo_tmp = $_FILES['fileimagem']['tmp_name'];
                                $nomeimagem = $_FILES['fileimagem']['name'];

                                $extensao = pathinfo($nomeimagem, PATHINFO_EXTENSION);
                                $extensao = strtolower($extensao);

                                if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                                    $novoNome = $novoUsuario->getNome() . uniqid() . '.' . $extensao;
                                    $imagem = $novoNome;
                                    $destino = "../Imagens/UserIMG/$novoNome";

                                    // tenta mover o arquivo para o destino
                                    if (@move_uploaded_file($arquivo_tmp, $destino)) {
                                        
                                    } else
                                        echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
                                } else
                                    $imagem = "UserloginWHITE.png";
                            } else
                                $imagem = "UserloginWHITE.png";


                            $novoUsuario->setImagem($imagem);

                            $novoUsuarioDAO = new UsuarioDAO();
                            $cadastrar = $novoUsuarioDAO->cadastrar($novoUsuario);

                            if ($cadastrar) {
                                ?>

                                <div class="Titulos mensagem_cadastro displaynone" style="color: white;margin: 0">
                                    Cadastro realizado com sucesso
                                </div>

                                <div class="Titulos mensagem_redirecionando displaynone" style="color: white;margin: 0">
                                    Redirecionando ao login...
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        setTimeout(function () {
                                            window.location = 'controladorLogin.php';
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
                                            window.location = '../../index.php';
                                        }, 9000);
                                    });
                                </script>

                                <?php
                            }
                        } else {
                            ?>
                                
                            <div class="Titulos mensagem_cadastro displaynone" style="color: white;margin: 0">
                                Alguns campos estão vazios
                            </div>

                            <div class="Titulos mensagem_redirecionando displaynone" style="color: white;margin: 0">
                                Redirecionando à pagina inicial...
                            </div>
                            <script>
                                $(document).ready(function () {
                                    setTimeout(function () {
                                        window.location = '../../index.php';
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
    </body>
</html>
