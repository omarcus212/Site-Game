<?php


$form = (string)"router.php?componente=categorias&action=inserir";

if (session_status()) {
    if (!empty($_SESSION['dadoscategoria'])) {
        $id = $_SESSION['dadosCategoria']['id'];
        $nomecategoria = $_SESSION['dadosCategoria']['Nomecategoria'];


        $form = "router.php?componente=categorias&action=editar&id=" . $id;
        unset($_SESSION['dadosCategotias']);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=m, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/menuprt.css">
    <link rel="stylesheet" href="css/respostactt.css">
    <link rel="stylesheet" href="css/categorias.css">
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
                <a href="./admprodutos.php"><img src="./icons/novo-produto.png" alt="">
                    <p>Produtos</p>
                </a>

            </div>

            <div class="boxicons" id="ntxleft">
                <a href="./produtosCategoria.php"><img id="usericons" src="./icons/produtocategoria.png" alt="">
                    <p>Produtos/categoria</p>
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


        <section class="containerCategoria">

            <div class="categorias">
                <h1>CATEGORIAS</h1>
                <span class="digitCategotia">Digite sua Categoria :</span>
                <form action="<?= $form ?>" method="POST" name="frmCategorias">
                    <input type="text" id="campoCategotia" name="txtCategoria" value="<?= isset($nomecategoria) ? $nomecategoria : null ?>" placeholder="Digite a Categoria">
                    <input type="submit" class="btncategoria" value="Salvar">
                </form>
            </div>


        </section>



        <div id="consultaDeDados">
            <table id="tblConsulta">
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1>Categorias </h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque" id="caixaCategoria"> categoria </td>
                    <td class="tblColunas destaque" id="caixanada"> </td>


                </tr>

                <?php
                require_once('controller/ControllerCategorias.php');
                $listcategorias = listarCategoria();

                foreach ($listcategorias as $item) {


                ?>
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?= $item['Categoria'] ?></td>




                        <td class="tblColunas registros">
                            <a href="router.php?componente=categorias&action=buscar&id=<?= $item['id'] ?>">
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>


                            <a onclick="return confirm('Tem certeza que deseja excluir?')" href="router.php?componente=categorias&action=deletar&id=<?= $item['id'] ?>">
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