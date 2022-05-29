<?php

require_once('modulo/config.php');

$form = (string)"router.php?componente=produto&action=inserir";
$foto = (string)'semfoto.png';

if (session_status()) {
    if (!empty($_SESSION['dadosProduto'])) {

        $id = $_SESSION['dadosProduto']['id'];
        $nome = $_SESSION['dadosProduto']['Nome'];
        $preco = $_SESSION['dadosProduto']['Preco'];
        $percentual = $_SESSION['dadosProduto']['Percentual'];
        $detalhes = $_SESSION['dadosProduto']['Detalhes'];
        $foto    =  $_SESSION['dadosProduto']['Foto'];


        $form = "router.php?componente=produto&action=editar&id=" . $id . "&foto=" . $foto;;
        unset($_SESSION['dadosProduto']);
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/respostactt.css">
    <link rel="stylesheet" href="css/produtos.css">
    <link rel="stylesheet" href="css/menuprt.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <div class="cmsinto">

                <h1>C M S </h1>
                <h3> Seu-Gamer </h3>
                <p>Gerenciamento do site</p>

            </div>
            <div class="hellouname">
                <span>OLÁ:</span>
                <h2>marcus vinncius Rodrigues de souza</h2>
            </div>
        </nav>



        <div class="containericons">

            <div class="boxicons">
                <a href="./produtosCategoria.php"><img src="./icons/produtocategoria.png" alt="">
                    <p>Produtos/categoria</p>
                </a>

            </div>

            <div class="boxicons" id="ntxleft">
                <a href="./admCategorias.php"><img id="" src="./icons/categoria.png" alt="">
                    <p>Categorias </p>
                </a>

            </div>

            <div class="boxicons" id="ntxleft">
                <a href="./desheborCCT.php"><img id="usericons" src="./icons/contatos.png" alt="">
                    <p>Contatos</p>
                </a>
            </div>

            <div class="boxicons">
                <a href="./UsuarioADM.php"><img id="ctticons" src="./icons/usuarios.png" alt="">
                    <p>Usuários</p>
                </a>
            </div>


            <div class="boxicons">
                <a href="index.html"><img id="" src="./icons/logout.png" alt="">
                    <p>sair</p>
                </a>
            </div>

        </div>

    </header>

    <main>

        <div class="container">
            <form action="<?= $form ?>" method="POST" name="frmproduto" enctype="multipart/form-data">
                <!-- enctype = excepcional  para poder enviar arquivos que estao no sue formulario  -->
                <div class="nomeproduto">
                    <span>Nome:</span><input type="text" name="txtproduto" value="<?= isset($nome) ? $nome : null ?>">
                </div>


                <div class="imgproduto">
                    <div class="foto">
                        <label> Escolha um arquivo: </label> <input type="file" name="flefoto" accept=".jpg, .png, .jpeg, .gif">
                    </div>
                    <img src="<?= DIRETORIO_FILE_UPLOAD . $foto ?>" alt="">
                </div>


                <div class="sobreproduto">
                    <div>
                        <label>Preço:</label>
                        <input type="text" name="txtpreco" value="<?= isset($preco) ? $preco : null ?>">
                    </div>
                    <div>
                        <label>Destaque:</label>
                        <span>Sim</span>
                        <input type="checkbox" name="checkprodutos" value="1">


                    </div>
                    <div>
                        <label>Percentual:</label><input type="text" name="txtpercentual" value="<?= isset($percentual) ? $percentual : null ?>">
                    </div>
                </div>


                <div class="detalhes">
                    <span>Detalhes:</span> <textarea name="txtdetalhes" id="" cols="40" rows="10" class="areadetalhes" placeholder="digite aqui:"><?= isset($detalhes) ? $detalhes : null ?></textarea>
                </div>
                <input type="submit" id="enviar">
            </form>
        </div>


        <div id="consultaDeDados">
            <table id="tblConsulta">
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Dados</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque" id="caixanome"> Nome </td>
                    <td class="tblColunas destaque" id="caixaemail"> Preco </td>
                    <td class="tblColunas destaque" id="caixaobs"> Detalhes </td>
                    <td class="tblColunas destaque" id="caixanada"> Desconto</td>
                    <td class="tblColunas destaque" id="caixanada"> Destaque</td>
                    <td class="tblColunas destaque" id="caixanada"> Imagem</td>
                    <td class="tblColunas destaque" id="caixanada"> </td>


                </tr>

                <?php
                require_once('controller/ControllerProduto.php');
                $listprodutos = listarprodutos();

                foreach ($listprodutos as $item) {



                ?>

                    <tr id="tblLinhas">
                        <td class="tblColunas registros">
                            <?= $item['Nome'] ?>
                        </td>
                        <td class="tblColunas registros">
                            <?= $item['preco'] ?>
                        </td>
                        <td class="tblColunas registros">
                            <?= $item['Detalhes'] ?>
                        </td>
                        <td class="tblColunas registros">
                            <?= $item['Percentual'] ?>
                        </td>
                        <td class="tblColunas registros">
                            <?= $item['Destaque'] == '0' ? $item['Destaque'] : 'Sim' ?: 'Não' ?>
                        </td>

                        <td class="tblColunas registros">
                            <img src="<?= DIRETORIO_FILE_UPLOAD . $item['Foto'] ?>" alt="" class="fotoimg">
                        </td>



                        <td class="tblColunas registros">
                            <a href="router.php?componente=produto&action=buscar&id=<?= $item['id'] ?>">
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>


                            <a onclick="return confirm('Tem certeza que deseja excluir?')" href="router.php?componente=produto&action=deletar&id=<?= $item['id'] ?>&foto=<?= $foto ?>">
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>

                            <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                        </td>
                    </tr>


                <?php
                }
                ?>




            </table>
        </div>
    </main>
</body>

</html>