<?php

require_once('model/bd/produtocategoria.php');
require_once('./modulo/config.php');



function inserirCategoria($dados)
{

    if (!empty($dados)){

    

        if (!empty($dados['txtCategoria'])) {

            $arreydads = array(

                "Categoria" => $dados['txtCategoria']

            );



            if (insertCategorias($arreydads)) {

                return true;
            } else {

                return array(ERRO_INSERIR_DADOS);
            }
        } else {

            return array(ERRO_CAMPOS_VAZIOS);
        }
    }
}


function listarCategoria()
{


    require_once('./model/bd/produtocategoria.php');

    $dados = selectAllCategorias();

    if (!empty($dados))

        return $dados;

    else

        return false;
}


function excluirprodutocategoria($id)
{

    if ($id != 0 && !empty($id) && is_numeric($id)) {


        if (deletarCategorias($id)) {
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

        $dadosCategoria = selectbyIdCategorias($id);
        if (!empty($dadosCategoria)) {
            return $dadosCategoria;

        } else {
            return false;
        }
    } else {
        return array(ID_INVALIDO);
    }
}




function atualizarprodutocategoria($dadosCte, $id)
{
 if(!empty($dadosCte)){
    
    if(!empty($dadosCte['txtCategoria'])){

        if(!empty($id) && $id != 0 && is_numeric($id)){
              
            $arreydads = array(
             
                "id" => $id,
                "Categorianome" => $dadosCte['txtCategoria']
              
            );

         


              if(uptadecategoria($arreydads)){
                  return true;
              }else{
           
                return array('idErro ' => 1, 
                'message' => 'nao foi possivel atualizar os dados' );
               
              }



        }else{                 // else de fechamento do estrura de deciçao do $id;
            return array('idErro ' => 4, 
            'message' => 'nao foi possivel atualizar os dados' );     
        }

    }else {

                return array(ERRO_CAMPOS_VAZIOS);

                }

     
 }


}




?>