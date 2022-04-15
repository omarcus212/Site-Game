<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=m, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/deshebord.css">
    <link rel="stylesheet" href="css/respostactt.css">
    <link rel="stylesheet" href="css/categorias.css">
</head>

<body>

    <header>
        <nav>
            <div id="div-menu">
                <div id="conteudo">
                    <h1>C M S </h1>
                    <h3> Seu-Gamer </h3>
                    <p>Gerenciamento do site</p>
                </div>
            </div>
        </nav>

        <div id="categorias-cms">
            <p id="hellou">Bem-vindo</p>
            <img src="./icons/novo-produto.png" alt="">
            <img src="./icons/categoria.png" alt="">
           <a href="./desheborCCT.php"><img src="./icons/contatos.png" alt=""></a> 
            <img id="usuarioimg" src="./icons/usuarios.png" alt="">
            <a href="../index.html"><img src="./icons/logout.png" alt="" ></a>  
            <div id="opçoes-escolha">
                <p>Adm. de Produtos</p>
                <p>Adm. de Categorias</p>
                <p>Contatos</p>
                <p>Usuários</p>

            </div>
        </div>
    </header>

    <main>


        <section class="containerCategoria">

            <div class="categorias">
                <h1>CATEGORIAS</h1>
                <span class="digitCategotia">Digite sua Categoria :</span>
                <form action="router-categoria.php?componente=categorias&action=inserir" method="POST" name="frmCategorias">
                    <input type="text" id="campoCategotia" name="txtCategoria" placeholder="Digite a Categoria">
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
                 
                foreach ($listcategorias as $item){
                  
                
            ?>
                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?=$item['Categoria']?></td>




                    <td class="tblColunas registros">
                        <img src="img/edit.png" alt="Editar" title="Editar" class="editar">

                        <a onclick="return confirm('Tem certeza que deseja excluir?')" href="router-categoria.php?componente=categorias&action=deletar&id=<?=$item['id'] ?>">
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