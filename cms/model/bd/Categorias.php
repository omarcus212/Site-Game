<?php

require_once('conexaoMysql.php');



function insertCategorias($categorias)
{

    $resposta = (bool)false;

    $conexaosql = abrirConexaoMyslq();

    $sql = "insert into tblCategorias

(categoria)

value

('" . $categorias['Categoria'] . "');";


    if (mysqli_query($conexaosql, $sql)) {

        if (mysqli_affected_rows($conexaosql)) {
            $resposta = true;
        }

        fecharConexaoMyslq($conexaosql);
        return $resposta;
    }
}


function selectAllCategorias()
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


function deletarCategorias($id){

    $status = (boolean)false;

    $conexao = abrirConexaoMyslq();

    $sql = " delete from tblcategorias where idcategorias = ".$id;

     if(mysqli_query($conexao,$sql)){
         if(mysqli_affected_rows($conexao)){
            $status = true;
          
         }
         fecharConexaoMyslq($conexao);
         return $status;
     }



}

function selectbyIdCategorias($id){
 
    $conexao = abrirConexaoMyslq();



}