<?php

/*******
 * objetivo : arquivo responsavel pela manipulacao de dados de Categorias 
 * 
 * autor : Marcus
 * 
 * Data : 14/04/22
 * 
 * versao : 1.0
 */
require_once('./model/bd/Categorias.php');
require_once('./modulo/config.php');

function inserirCategoria($categoria)
{

    if (!empty($categoria)) {

        if (!empty($categoria['txtCategoria'])) {

            $arreyCategoria = array(

                "Categoria" => $categoria['txtCategoria']

            );



            if (insertCategorias($arreyCategoria)) {

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


    require_once('./model/bd/Categorias.php');

    $dados = selectAllCategorias();

    if (!empty($dados))
     
    
        return $dados;

    else

        return false;
}


function excluirCategorias($id)
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

function buscarCategorias($id)
{

    if ($id != 0 && !empty($id) && is_numeric($id)) {

        require_once('model/bd/Categorias.php');

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

function atualizarContatos($dadosCte, $id)
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
