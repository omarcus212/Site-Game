<?php
  

  $form = (string)"router.php?componente=produto&action=inserir";

  if(session_status()){
      if(!empty($_SESSION['dadosProduto'])){
          
        $id = $_SESSION['dadosProduto']['id'];
        $nome = $_SESSION['dadosProduto']['Nome'];
        $preco = $_SESSION['dadosProduto']['Preco'];
        $percentual = $_SESSION['dadosProduto']['Percentual'];
        $detalhes = $_SESSION['dadosProduto']['Detalhes'];

        $form = "router.php?componente=produto&action=editar&id=".$id;
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
    <link rel="stylesheet" href="css/deshebord.css">
    <link rel="stylesheet" href="css/respostactt.css">
    <link rel="stylesheet" href="css/produtos.css">
    <title>Document</title>
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
            <a href="./admCategorias.php"><img src="./icons/categoria.png" alt=""></a>
            <a href="./desheborCCT.php"><img src="./icons/contatos.png" alt=""></a>
            <a href="./UsuarioADM.php"><img id="usuarioimg" src="./icons/usuarios.png" alt=""></a>
            <a href="../index.html"><img src="./icons/logout.png" alt=""></a>
            <div id="opçoes-escolha">
                <p>Adm. de Produtos</p>
                <p>Adm. de Categorias</p>
                <p>Contatos</p>
                <p>Usuários</p>
            </div>
        </div>
    </header>
    <main>

        <div class="container">
            <form action="<?=$form?>" method="POST" name="frmproduto">
                <div class="nomeproduto">
                    <span>Nome:</span><input type="text" name="txtproduto" value="<?=isset($nome)?$nome:null?>">
                </div>

        
                <div class="imgproduto">
                    <div class="foto">
                        <label> Escolha um arquivo: </label> <input type="file" name="flefoto"
                            accept=".jpg, .png, .jpeg, .gif" >
                    </div>
                    <img src="../imgs/horizon.jpg" alt="">
                </div>


                <div class="sobreproduto">
                    <div>
                        <label>Preço:</label>
                        <input type="text" name="txtpreco" value="<?=isset($preco)?$preco:null?>">
                    </div>
                    <div>
                        <label>Destaque:</label>
                        <span>Sim</span>
                        <input type="checkbox" name="checkproduto" value="1">
                       
                    </div>
                    <div>
                        <label>Percentual:</label><input type="text" name="txtpercentual" value="<?=isset($percentual)?$percentual:null?>">
                    </div>
                </div>


                <div class="detalhes">
                    <span>Detalhes:</span> <textarea name="txtdetalhes" id="" cols="40" rows="10" class="areadetalhes"
                        placeholder="digite aqui:"><?=isset($detalhes)?$detalhes:null?></textarea>
                </div>
                <input type="submit" id="enviar" >
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
                    <td class="tblColunas destaque" id="caixaemail"> preco </td>
                    <td class="tblColunas destaque" id="caixaobs"> detalhes </td>
                    <td class="tblColunas destaque" id="caixanada"> imagem</td>
                    <td class="tblColunas destaque" id="caixanada"> desconto</td>
                    <td class="tblColunas destaque" id="caixanada"> </td>


                </tr>

                <?php
                      require_once('controller/ControllerProduto.php');
                      $listprodutos = listarprodutos();
        
                      foreach($listprodutos as $item){
        
                     
                   
                   ?>

                <tr id="tblLinhas">
                    <td class="tblColunas registros">
                       <?=$item['Nome']?> 
                    </td>
                    <td class="tblColunas registros">
                        <?=$item['preco']?> 
                    </td>
                    <td class="tblColunas registros">
                        <?=$item['Detalhes']?>
                    </td>
                    <td class="tblColunas registros">
                        <?=$item['Percentual']?>
                    </td>
                    <td class="tblColunas registros">
                        <?=$item['Destaque']?>
                    </td>
                    


                    <td class="tblColunas registros">
                        <a href="router.php?componente=produto&action=buscar&id=<?=$item['id']?>">
                        <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                        </a>
                        

                        <a onclick="return confirm('Tem certeza que deseja excluir?')"
                            href="router.php?componente=produto&action=deletar&id=<?=$item['id']?>">
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