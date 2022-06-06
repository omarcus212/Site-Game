<?php


$form = (string)"router.php?componente=PRODUTOCATEGORIA&action=inserir";
$idproduto=(string)null;
$idcategoria=(string)null;

if (session_status()) {
    if (!empty($_SESSION['dadosProdutoCategoria'])) {


        $id = $_SESSION['dadosProdutoCategoria']['id'];
        $idcategoria = $_SESSION['dadosProdutoCategoria']['idcategoria'];
        $idproduto= $_SESSION['dadosProdutoCategoria']['idproduto'];
    

        $form = "router.php?componente=PRODUTOCATEGORIA&action=editar&id=".$id;
        unset($_SESSION['dadosProdutoCategoria']);
    }
}

?>


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

            
            
            
            <form action="<?=$form?>" method="post">

              
           <span>Produto</span>   <select name="categoriaProdut" id="categoriaProdut"> <!-- Produto -->

                            <option value="">Selecione um item</option>

                            <?php
                              require_once('controller/ControllerProduto.php');
                              $listproduto = listarprodutos();
                            foreach ($listproduto as $itemproduto) {


                            ?>
                            <option <?=$idproduto==$itemproduto['id']?'selected':null?> value="<?=$itemproduto['id']?>" > <?=$itemproduto['id']?> <?=$itemproduto['Nome']?></option>
                            <?php
                            }
                            ?>


                </select>


                  
                                    <span>Categoria</span>  <select name="cateProduto" id="cateProduto"><!-- Categoria -->

                            <option value="">Selecione um item</option>

                            <?php
                            require_once('controller/ControllerCategorias.php');
                            $listcategorias = listarCategoria();


                            foreach ($listcategorias as $item) {
                                        
                            
                            ?>

                            <option  <?=$idcategoria==$item['id']?'selected':null?> value="<?=$item['id']?>"> <?=$item['id']?> <?=$item['Categoria']?> </option>

                            <?php
                            }
                            ?>
                 </select>

                <input type="submit" id="ctpd" value="salvar">
            
            
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
                    <td class="tblColunas destaque" id="caixaemail"> Categorias</td>
                    <td class="tblColunas destaque" id="caixanome"> produtos</td>
                    <td class="tblColunas destaque" id="caixanada"> </td>


                </tr>

                <?php
                
                require_once('controller/ControllerProdutCategoria.php');
                $listprodutocate = listarProdutoCategoria();

                foreach ($listprodutocate as $item) {


                ?>
                
                <tr id="tblLinhas">
    
                    <td class="tblColunas registros"><?=$item['CategoriaC']?> </td>
                    <td class="tblColunas registros"><?=$item['produtoC']?> </td>
                  


                    <td class="tblColunas registros">
                        <a href="router.php?componente=PRODUTOCATEGORIA&action=buscar&id=<?=$item['id'] ?>">
                            <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                        </a>


                        <a onclick="return confirm('Tem certeza que deseja excluir?')" href="router.php?componente=PRODUTOCATEGORIA&action=deletar&id=<?=$item['id']?>">
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