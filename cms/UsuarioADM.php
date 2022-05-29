<?php


$form = (string)"router.php?componente=useradm&action=inserir";

if (session_status()) {
    if (!empty($_SESSION['dadosUserAdm'])) {

        $id = $_SESSION['dadosUserAdm']['id'];
        $nome = $_SESSION['dadosUserAdm']['Nome'];
        $email = $_SESSION['dadosUserAdm']['Email'];
        $senha = $_SESSION['dadosUserAdm']['Senha'];

        $form = "router.php?componente=useradm&action=editar&id=" . $id;
        unset($_SESSION['dadosUserAdm']);
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/respostactt.css">
    <link rel="stylesheet" href="css/usuarioAdm.css">
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
                <a href="./admprodutos.php"><img src="./icons/novo-produto.png" alt="">
                    <p>Produtos</p>
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

            <div class="boxicons" id="ntxleft">
                <a href="./produtosCategoria.php"><img id="usericons" src="./icons/produtocategoria.png" alt="">
                    <p>Produtos/categoria</p>
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

        <section class="containerUsuarioAdm">

            <div class="admUsuario">
                <h1>Criar Contato ADM</h1>
                <form action="<?= $form ?>" method="post">
                    <span class="txtspan">NOME:</span><input type="text" name="txtnomeadm" value="<?= isset($nome) ? $nome : null ?>">
                    <span class="txtspan">EMAIL:</span> <input type="email" name="txtemailadm" value="<?= isset($email) ? $email : null ?>">
                    <span class="txtspan">SENHA:</span> <input type="text" name="txtsenhaadm" value="<?= isset($senha) ? $senha : null ?>">
                    <input type="submit" class="btnenviar" value="Salvar">
                </form>

            </div>



        </section>

        <div id="consultaDeDados">
            <table id="tblConsulta">
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de ADM</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque" id="caixanome"> Nome </td>
                    <td class="tblColunas destaque" id="caixaemail"> Email </td>
                    <td class="tblColunas destaque" id="caixaobs"> senha </td>
                    <td class="tblColunas destaque" id="caixanada"> </td>


                </tr>
                <?php
                require_once('controller/ControllerUserADM.php');
                $listardados = listarUseradm();
                foreach ($listardados as $itemdados) {


                ?>

                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?= $itemdados['Nome'] ?></td>
                        <td class="tblColunas registros"><?= $itemdados['Email'] ?></td>
                        <td class="tblColunas registros"><?= $itemdados['Senha'] ?></td>


                        <td class="tblColunas registros">
                            <a href="router.php?componente=USERADM&action=editar&id=<?= $itemdados['id'] ?>">
                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>


                            <a onclick=" confirm('Tem certeza que deseja excluir?')" href="router.php?componente=useradm&action=deletar&id=<?= $itemdados['id'] ?>">
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                            </a>
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