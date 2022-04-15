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

                return array(
                    'idErro ' => 1,
                    'message' => 'nao foi possivel inserir os dados'
                );
            }
        } else {

            return array('idErro ' => 2,  'message' => 'existem campos obrigatorios que nao foram preenchidos');
        }
    }
}


function listarCategoria()
{


 require_once('./model/bd/Categorias.php');

 $dados = selectAllCategorias();

 if(!empty($dados))

 return $dados;

 else

 return false;
     



}


function excluirCategorias($id){

    if($id != 0 && !empty($id) && is_numeric($id)){
       
             
        if(deletarCategorias($id)){
            return true;
        }else{
            return array('idErro' => 3,
                'message' => 'o banco de dados nao pode excluir o regristo');
          }
    }else{
        return array('idErro' => 4,
                        'message' => 'nao é possivel excluir o registro sem um id valido');
    }

}