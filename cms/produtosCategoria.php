<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/prtcategoria.css">
    <link rel="stylesheet" href="css/respostactt.css">
    <link rel="stylesheet" href="css/menuprt.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <div class="tablecont">
            <span class="ttlite">
                <p>Categoria/produtos</p>
            </span>

            <?php
                    // conexão com o arq controllerContatos
                    require_once('controller/ControllerCategorias.php');
                    require_once('controller/ControllerProduto.php');
                    
                    
                    //chamando a fun listarcontatos
                   $listcategoria = listarCategoria(); 
                   $listprodutos = listarprodutos();                        
                        
                        //estrutura de repetição para retornar os dados do array printar na tela
                          foreach ($listcategoria as $item) { //for para exibir listas na tela
                            foreach ($listprodutos as $itemp) {
                          
                ?>
            
            <form action="inserir" method="post">
                <select name="categoriaProdut" id="categoriaProdut"><option value="<?=$item['Categoria']?'selectd':null?>"><?=$item['Categoria']?></option></select>
                <select name="categoriaPr" id="cateProduto"><option value="<?=$item['Nome']?'selectd':null?>"><?=$itemp['Nome']?></option></select>
                <input type="submit" id="ctpd" value="salvar">
            </form>
        </div>
         <?php
                            }
          }
         ?>
        <div id="consultaDeDados">
            <table id="tblConsulta">
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Dados</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque" id="caixanome"> produto</td>
                    <td class="tblColunas destaque" id="caixaemail"> Categoria </td>
                    <td class="tblColunas destaque" id="caixanada"> </td>


                </tr>


                <tr id="tblLinhas">
                    <td class="tblColunas registros"></td>
                    <td class="tblColunas registros"></td>
                  


                    <td class="tblColunas registros">
                        <a href="router.php?componente=contatos&action=buscar&id=<?= $item['id'] ?>">
                            <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                        </a>


                        <a onclick="return confirm('Tem certeza que deseja excluir?')" href="router.php?componente=contatos&action=deletar&id=<?= $item['id'] ?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>

                        <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                    </td>
                </tr>






            </table>
        </div>

    </main>
</body>

</html>