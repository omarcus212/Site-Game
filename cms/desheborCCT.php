<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/deshebord.css">
    <link rel="stylesheet" href="css/respostactt.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>  
        <div id="div-menu">
            <div id="conteudo">
            <h1>C M S </h1> 
            <h3>  Seu-Gamer </h3>
            <p>Gerenciamento do site</p>
            </div>
        </div>
        </nav>
    
        <div id="categorias-cms">
         <p id="hellou">Bem-vindo</p>
         <img src="./icons/novo-produto.png" alt=""> 
         <a href="./admCategorias.php"><img src="./icons/categoria.png" alt=""></a>
         <img src="./icons/contatos.png" alt=""> 
         <a href="./UsuarioADM.php"><img id="usuarioimg" src="./icons/usuarios.png" alt=""></a> 
         <a href="../index.html"><img src="./icons/logout.png" alt="" ></a>  
         <div id="opçoes-escolha" >
        <p>Adm. de Produtos</p>
        <p>Adm. de Categorias</p>
        <p>Contatos</p>
        <p>Usuários</p>
       
        </div>
        </div>
    </header>
    
    <main>
     

     <div id="consultaDeDados">
        <table id="tblConsulta" >
            <tr>
                <td id="tblTitulo" colspan="6">
                    <h1> Consulta de Dados</h1>
                </td>
            </tr>
            <tr id="tblLinhas">
                <td class="tblColunas destaque" id="caixanome"> Nome </td>
                <td class="tblColunas destaque" id="caixaemail"> Email </td>
                <td class="tblColunas destaque" id="caixaobs"> obeservação </td>
                <td class="tblColunas destaque" id="caixanada">  </td>
                
                
            </tr>
             
           <?php
              require_once('controller/controllerContatos.php');
              $listcontatos = listarcontatos();

              foreach($listcontatos as $item){

             
           
           ?>
           
            <tr id="tblLinhas">
                <td class="tblColunas registros"><?=$item['Nome']?></td>
                <td class="tblColunas registros"><?=$item['Email']?></td>
                <td class="tblColunas registros"><?=$item['Obs']?></td>
                
               
                <td class="tblColunas registros">
                        <img src="img/edit.png" alt="Editar" title="Editar" class="editar">

                        <a onclick="return confirm('Tem certeza que deseja excluir?')" href="router.php?componente=contatos&action=deletar&id=<?=$item['id']?>">
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