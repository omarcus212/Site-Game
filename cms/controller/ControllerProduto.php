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
require_once('model/bd/Produtos.php');
require_once('model/bd/config.php');
function inserirProduto($produtos){

if(!empty($produtos)){

  if(!empty($produtos['txtproduto']) && !empty($produtos['txtpreco']) && !empty($produtos['rdoproduto']) && !empty($produtos['txtpercentual']) && !empty($produtos['detalhes']) ){

  $arreydados = array(
    
    "Nomeproduto" => $produtos['txtproduto'],
    "Preco" => $produtos['txtpreco'],
    "Destaque" => $produtos['rdoproduto'],
    "Percentual" => $produtos['txtpercentual'],
    "Detalhes" => $produtos['detalhes']
  );
   

    if(insertProduto($arreydados)){
        
        return true;

    }else{
        return array(ERRO_INSERIR_DADOS);
    }

  }else{
    return array(ERRO_CAMPOS_VAZIOS);
  }
}


}


?>