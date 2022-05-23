<?php

require_once('model/bd/contato.php');
require_once('./modulo/config.php');

function listarcontatos(){
    

    $dados = selectAllContatos();

    if(!empty($dados)){
     return $dados;
    }else{
        return false;
    }

}


function excluirContato($id){

    if($id !=0 && !empty($id) && is_numeric($id)){
   
       if(deletarContato($id)){

            return true;

       }else{
         return array(ERRO_AO_EXCLUIR);
       }
         
    }else{
        return array(ID_INVALIDO);
    }


}














?>