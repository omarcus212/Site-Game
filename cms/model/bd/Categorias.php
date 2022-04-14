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

    $sql = "select * from tblcontatos order by idcontato desc";

    $resultbanco = mysqli_query($conexao, $sql);

    if ($resultbanco) {
        $cont = 0;
        while ($rsdados = mysqli_fetch_assoc($resultbanco)) {

            $arreydados[$cont] = array(
                "id"   => $rsdados['idcontato'],
                "Categoria"  => $rsdados['categoria']
            );
            $cont++;
        }
    }

    fecharConexaoMyslq($conexao);
    return $arreydados;
}
