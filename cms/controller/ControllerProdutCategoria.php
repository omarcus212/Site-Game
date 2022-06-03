<?php
require_once('model/bd/Produtocategoria.php');
require_once('./modulo/config.php');



function inserirProdutoCategoria($dados)
{

    if (!empty($dados)){

    
        if (!empty($dados['categoriaProdut']) && !empty($dados['cateProduto'])) {

            $arreydads = array(

                "Categoria" => $dados['categoriaProdut'],
                "Produto"   =>  $dados['cateProduto']  

            );


            if ($NDAD=inseritProdutoCategorias($arreydads)) {
                return true;

            } else {
                    var_dump($NDAD);
                    die;
                return array(ERRO_INSERIR_DADOS);
            }
        } else {

            return array(ERRO_CAMPOS_VAZIOS);
        }
    }
}


function listarProdutoCategoria()
{


    require_once('./model/bd/produtocategoria.php');

    $dados = selectAllProdutoCategoria();

    if (!empty($dados))

        return $dados;

    else

        return false;
}


function excluirprodutocategoria($id)
{

    if ($id != 0 && !empty($id) && is_numeric($id)) {


        if (deletarProdutoCategorias($id)) {
            return true;
        } else {
            return array(ERRO_AO_EXCLUIR);
        }
    } else {
        return array(ID_INVALIDO);
    }
}

function buscarprodutocategoria($id)
{

    if ($id != 0 && !empty($id) && is_numeric($id)) {

        require_once('model/bd/produtocategoria.php');

        $dadosCategoria = selectbyIdProdutoCategorias($id);

        if (!empty($dadosCategoria)) {

            return $dadosCategoria;

        } else {
            return false;
        }
    } else {
        return array(ID_INVALIDO);
    }
}



function atualizarprodutocategoria($dados, $id)
{


 if(!empty($dados)){
    
    if(!empty($dados['cateProduto']) && !empty($dados['categoriaProdut'])){

        if(!empty($id) && $id != 0 && is_numeric($id)){
              
            $arreydads = array(
             
                "id" => $id,
                "idCategoria" => $dados['cateProduto'],
                "idProduto" => $dados['categoriaProdut']
              
            );        

              if(uptadeProdutoCategorias($arreydads)){
               
                  return true;

              }else{

         
                return array('idErro ' => 1, 
                'message' => 'nao foi possivel atualizar os dados' );
               
              }



        }else{                 // else de fechamento do estrura de deciçao do $id;
            return array('idErro ' => 4, 
            'message' => 'nao foi possivel atualizar os dados id invalido' );     
        }

    }else {

                return array(ERRO_CAMPOS_VAZIOS);

                }

     
 }


}




?>