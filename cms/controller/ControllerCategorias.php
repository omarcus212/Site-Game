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

function inserirCategoria($categoria)
{

    if (!empty($categoria)) {

        if (!empty($categoria['txtCategoria'])) {

            $arreyCategoria = array(

                "Categoria" => $categoria['txtCategoria']

            );

            require_once('./model/bd/Categorias.php');

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


function listarCategoria(){


 require_once('model/bd/Categorias.php');

 $dados = selectAllCategorias();

 if(!empty($dados))

 return $dados;

 else

 return false;
     



}