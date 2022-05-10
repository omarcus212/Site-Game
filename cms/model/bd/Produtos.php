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

function insertProduto($dados){



    $conexao = abrirConexaoMyslq();

    $sql = "insert into tblproduto (nome,preco,detalhes,destaques,percentual) 
    value 
    ('".$dados["Nomeproduto"]."','".$dados["Preco"]."','".$dados["Detalhes"]."','".$dados["Destaque"]."','".$dados["Percentual"]."');";


    if(mysqli_query($conexao,$sql)){

        if(mysqli_affected_rows($conexao)){
             $reposta = true;
        }
             return $reposta;
            fecharConexaoMyslq($conexao);
        
      }
}



?>