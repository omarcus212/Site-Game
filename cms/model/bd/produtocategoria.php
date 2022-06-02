<?php

require_once('conexaoMysql.php');



function inserirProdutoCategorias($dados)
{

    $resposta = (bool)false;

    $conexaosql = abrirConexaoMyslq();

    $sql = "insert into tblproduto_categoria

  (idproduto,idcategoria)

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


function selectAllProdutoCategoria()
{

    $conexao = abrirConexaoMyslq();

    $sql = "select * from tblcategorias order by idcategorias desc";

    $resultbanco = mysqli_query($conexao, $sql);

    if ($resultbanco) {
        $cont = 0;
        while ($rsdados = mysqli_fetch_assoc($resultbanco)) {

            $arreydados[$cont] = array(
                "id"   => $rsdados['idcategorias'],
                "Categoria"  => $rsdados['categoria']
            );
            $cont++;
        }
    }
    return $arreydados;
    fecharConexaoMyslq($conexao);
}


function deletarCategorias($id)
{

    $status = (bool)false;

    $conexao = abrirConexaoMyslq();

    $sql = " delete from tblcategorias where idcategorias = " . $id;

    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao)) {
            $status = true;
        }
        fecharConexaoMyslq($conexao);
        return $status;
    }
}

function selectbyIdCategorias($id)
{

    $conexao = abrirConexaoMyslq();

    $slq = "select * from tblcategorias where idcategorias =".$id ;

    $result = mysqli_query($conexao,$slq);
    if($result){
       
          if($rsdados = mysqli_fetch_assoc($result)){
                  
           $arreydados = array(
              "id"   => $rsdados['idcategorias'],
              "Nomecategoria"  =>$rsdados['categoria']
             
           );
           
        } 
       
        
        fecharConexaoMyslq($conexao);
        return $arreydados;
        
    } 
}



function uptadecategoria($dadoCategoria)
{
    $resposta = (bool)false;


    $conexaosql = abrirConexaoMyslq();

    $sql = "update tblcategorias set 

 categoria =  '" . $dadoCategoria{'Categorianome'} . "'

        where idcategorias =" . $dadoCategoria['id'];

         

    if (mysqli_query($conexaosql, $sql)) {

        if (mysqli_affected_rows($conexaosql)) {
            $resposta = true;
        }

        fecharConexaoMyslq($conexaosql);
        return $resposta;
    }
}