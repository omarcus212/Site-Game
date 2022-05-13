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

  $checkbox = (String) "0" ;
  $preco = (String) "00";
  $percentual = (string)"00";

  if(!empty($produtos['checkproduto'])){

    $checkbox = $produtos['checkproduto'];

  }else{
    
    $checkbox;
  }
  
  if($produtos['txtpreco'] == "" || $produtos['txtpreco'] == "0"){
     
    $preco;
 }




 if(!empty($produtos)){
  if(!empty($produtos['txtproduto']) && !empty($preco) && !empty($checkbox) && !empty($percentual) && !empty($produtos['txtdetalhes'])){


  $arreydados = array(
    
    "Nomeproduto" => $produtos['txtproduto'],
    "Preco" => $preco,
    "Destaque" => $checkbox,
    "Percentual" => $produtos['txtpercentual'],
    "Detalhes" => $produtos['txtdetalhes']
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