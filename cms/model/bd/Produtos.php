<?php

/*******
 * objetivo : arquivo responsavel pela manipulacao de dados dos produtos
 * 
 * autor : Marcus
 * 
 * Data : 07/05/22
 * 
 * versao : 1.0
 */

require_once('conexaoMysql.php');

function insertProduto($dados)
{


     $conexao = abrirConexaoMyslq();

     $sql = "insert into tblproduto (nome,preco,detalhes,destaques,percentual,foto) 
    value 
    ('" . $dados["Nomeproduto"] . "','" . $dados["Preco"] . "','" . $dados["Detalhes"] . "','" . $dados["Destaque"] . "','" . $dados["Percentual"] . "','" . $dados["foto"] . "');";


     if (mysqli_query($conexao, $sql)) {

          if (mysqli_affected_rows($conexao)) {
               $reposta = true;
          }
          return $reposta;
          fecharConexaoMyslq($conexao);
     }
}

function selectAllProdutos()
{


     $conexao = abrirConexaoMyslq();

     $sql = "select * from tblproduto order by idproduto desc";

     $result = mysqli_query($conexao, $sql);

     if ($result) {

          for ($cont = 0; $dados = mysqli_fetch_assoc($result); $cont++) {

               $arreydados[$cont] = array(

                    "id" => $dados['idproduto'],
                    "Nome" => $dados['nome'],
                    "preco" => $dados['preco'],
                    "Detalhes" => $dados['detalhes'],
                    "Destaque" => $dados['destaques'],
                    "Percentual" => $dados['percentual'],
                    "Foto"   => $dados['foto']

               );
          }
       

          fecharConexaoMyslq($conexao);
          
          if(isset($arreydados)){
               return $arreydados;
            }else{
               return false;
            }
         
     }
}

function deletarProduto($id)
{
     $status = false;

     $conexao = abrirConexaoMyslq();

     $sql = "delete from tblproduto where idproduto =" . $id;

     if (mysqli_query($conexao, $sql)) {
          if (mysqli_affected_rows($conexao)) {
               $status = true;
          }

          fecharConexaoMyslq($conexao);
          return $status;
     }

     return $status;
}

function selectbyIdproduto($id)
{
     $conexao = abrirConexaoMyslq();

     $sql = "select * from tblproduto where idproduto  =" . $id;

     $result = mysqli_query($conexao, $sql);

     if ($result) {

          if ($dados = mysqli_fetch_assoc($result)) {

               $arreydados = array(

                    "id" => $dados['idproduto'],
                    "Nome" => $dados['nome'],
                    "Preco" => $dados['preco'],
                    "Detalhes" => $dados['detalhes'],
                    "Foto"  =>$dados['foto'],
                    "Percentual" => $dados['percentual']

               );
          }
          fecharConexaoMyslq($conexao);

          if(isset($arreydados)){
               return $arreydados;
            }else{
               return false;
            }
         
     }
}

function updateProdutos($dados)
{
    

     $conexao = abrirConexaoMyslq();
     $sql = "update tblproduto set   
      nome       =  '".$dados['nome']."',
      preco      =  '" .$dados['preco']."',
      detalhes   =  '".$dados['detalhes']."',
      destaques  =  '".$dados['destaque']."',
      percentual =  '".$dados['percentual']."',
      foto       =  '".$dados['foto']."'
      where idproduto =". $dados['id'];
    
       
     if (mysqli_query($conexao, $sql)) {
          if (mysqli_affected_rows($conexao)) {
               fecharConexaoMyslq($conexao);
                return true;
              
          }else{
            
              fecharConexaoMyslq($conexao);
               return false;
           }           
         
     }else{
          fecharConexaoMyslq($conexao);
          return false;
     }
}
