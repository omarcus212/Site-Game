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
require_once('modulo/config.php');

function inserirProduto($produtos,$file){
  $resultfoto = null;
  $checkbox = (String) "0" ;
  $preco = (String) "0";
  $percentual = (string)"0";

  if(!empty($produtos['checkprodutos'])){

    $checkbox = $produtos['checkprodutos'];

  }else{
    $checkbox;
  }
   
  if(!empty($produtos['txtpreco'])){
    $preco = $produtos['txtpreco'];
    
   }else{
    $preco;

  }  


  if(!empty($produtos['txtpercentual'])){
    $percentual = $produtos['txtpercentual'];
  }else{
  
    $percentual;

  }  

  
 if(!empty($produtos)){
  if(!empty($produtos['txtproduto']) && $preco >= '0' && $checkbox >= '0' &&  $percentual >='0' && !empty($produtos['txtdetalhes'])){


    if($file['flefoto']['name'] != null){
      require_once('modulo/upload.php');      
      $resultfoto = uploand($file['flefoto']);

      if(is_array($resultfoto)){
          require_once('modulo/config.php'); 
         
          return $resultfoto;
      }
    }

  $arreydados = array(
    
    "Nomeproduto" => $produtos['txtproduto'],
    "Preco" => $preco,
    "Destaque" => $checkbox,
    "Percentual" => $percentual,
    "foto" => $resultfoto,
    "Detalhes" => $produtos['txtdetalhes']
  );



    if(insertProduto($arreydados)){
        
        return true;

    }else{
        return array('idErro' =>1,'message'=> 'NÃO FOI POSSÍVEL INSERIR OS DADOS NO BANCO DE DADOS');
    }

  }else{
    return array('idErro' =>2,'message' => 'EXISTEM CAMPOS OBRIGATÓRIOS NÃO PREENCHIDOS/CARACTER INVALIDO.');
  }
 }
}


function listarprodutos(){

  $dados = selectAllProdutos();

  if(!empty($dados)){ 
    return $dados;
  }else{
      return false;
  }
}


function Buscaridproduto($id){
  if(($id)!= 0 & !empty($id) & is_numeric($id)){
             
    $dados = selectbyIdproduto($id);   
        if(!empty($dados)){
          return $dados;
        }else{
           return false;
        }
 }else{
        return array(ID_INVALIDO);
 }

}


function excluirProduto($arreydados){
 $idproduto = $arreydados['id'];
 $foto = $arreydados['fotoname'];

  if(!empty($idproduto) & $idproduto != 0 & is_numeric($idproduto)){

    if(deletarProduto($idproduto)){
      
      if($foto != null ){

        unlink(DIRETORIO_FILE_UPLOAD.$foto);
          
        return true;

    }else{
     
        return true;
    }

    }else{
       return array('message' => 'nao foi possivel excluir os dados');
    }
 }else{
 return array('message' => 'id invalido');
 }
}


function editarProduto($dados,$arreydados){

    $statusfoto = (boolean)false;  
        
    $id = $arreydados['id'];
    $namefoto = $arreydados['foto'];
    $file = $arreydados['file'];

    if(!empty($dados['checkproduto'])){

      $checkbox = $dados['checkproduto'];
    }else{
      
      $checkbox ='0';
    }
    
    if(!empty($dados['txtpreco'])){
      $preco = $dados['txtpreco'];
      
    }else{
      $preco ='0';

    }  


    if(!empty($dados['txtpercentual'])){
      $percentual = $dados['txtpercentual'];
    }else{

      $percentual ='0';

    }  


    if(!empty($dados)){
    if(!empty($dados['txtproduto']) && $preco >= '0' && $checkbox >= '0' &&  $percentual >='0' && !empty($dados['txtdetalhes'])){
      if($id != 0 & !empty($id) & is_numeric($id)){

        if($file['flefoto']['name'] != null){
          require_once('modulo/upload.php');      
          $novafoto = uploand($file['flefoto']); 
          $statusfoto = true;
      }else{
          $novafoto = $namefoto;                 //se nova foto tiver null peranence as msm foto que esta no bd;
      }


    $arreydados = array(
      
      "id" => $id,
      "Nome" => $dados['txtproduto'],
      "Preco" => $preco,
      "Destaque" => $checkbox,
      "Percentual" => $percentual,
      "Foto" => $novafoto,
      "Detalhes" => $dados['txtdetalhes']
    );


      if(updateProdutos($arreydados)){
        if($resultfoto){

          unlink(DIRETORIO_FILE_UPLOAD.$foto);
      }
          return true;

      }else{
          return array('idErro ' => 1, 
          'message' => 'nao foi possivel atualizar os dados' );
      }

    }else{
      return array('idErro' =>2,'message' => 'dados invalido');
     }

    }else{
      
      return array(ERRO_INSERIR_DADOS);
    }
    
    }

}
?>