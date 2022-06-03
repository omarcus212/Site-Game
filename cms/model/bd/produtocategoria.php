<?php

require_once('conexaoMysql.php');



function inseritProdutoCategorias($dados)
{


    $resposta = (bool)false;

    $conexaosql = abrirConexaoMyslq();

    $sql = "insert into tblproduto_categoria

  (idCategoria,idprodutos)

  value

  ('" . $dados['Categoria'] . "','" . $dados['Produto'] . "');";

 
    if (mysqli_query($conexaosql, $sql)) {
    
        if (mysqli_affected_rows($conexaosql)) {
            $resposta = true;
        }

           
        fecharConexaoMyslq($conexaosql);
        return $resposta;
        
    }
}
/*feito*/

function selectAllProdutoCategoria()
{

    $conexao = abrirConexaoMyslq();

    $sql = "select * from tblproduto_categoria order by id desc";

    $resultbanco = mysqli_query($conexao, $sql);

    if ($resultbanco) {
        $cont = 0;
        while ($rsdados = mysqli_fetch_assoc($resultbanco)) {

            $arreydados[$cont] = array(
                "id"   => $rsdados['id'],
                "CategoriaC"  => $rsdados['idCategoria'],
                "produtoC" => $rsdados['idprodutos']
            );
            $cont++;
        }
    }

    if(!empty($arreydados)){
        return $arreydados;
        fecharConexaoMyslq($conexao);
    }else{
        return null;
    }
   
}
/*feito*/

function deletarProdutoCategorias($id)
{

    $status = (bool)false;

    $conexao = abrirConexaoMyslq();

    $sql = " delete from tblproduto_categoria where id = " . $id;

    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao)) {
            $status = true;
        }
        fecharConexaoMyslq($conexao);
        return $status;
    }
}
/*feito*/

function selectbyIdProdutoCategorias($id)
{

    $conexao = abrirConexaoMyslq();

    $slq = "select * from tblproduto_categoria where id=".$id ;

    $result = mysqli_query($conexao,$slq);
    if($result){
       
          if($rsdados = mysqli_fetch_assoc($result)){
                  
           $arreydados = array(
              "id"   => $rsdados['id'],
              "idcategoria"  =>$rsdados['idCategoria'],
              "idproduto"  =>$rsdados['idprodutos'],
             
           );
           
        } 
       
        if(!empty($arreydados)){
            return $arreydados;
            fecharConexaoMyslq($conexao);
        }else{
            return null;
        }
        
    } 
}



function uptadeProdutoCategorias($dados)
{
    $resposta = (bool)false;


    $conexaosql = abrirConexaoMyslq();

    $sql = "update tblproduto_categoria set 
            idCategoria =  '".$dados{'idCategoria'}."',
            idprodutos =  '".$dados{'idProduto'}."'
            where id=".$dados['id'];
        

    if (mysqli_query($conexaosql, $sql)) {

        if (mysqli_affected_rows($conexaosql)) {
            $resposta = true;
        }
        
        fecharConexaoMyslq($conexaosql);
        return $resposta;
        
    }
}