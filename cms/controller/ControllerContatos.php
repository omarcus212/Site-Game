<?php

require_once('model/bd/contato.php');


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
         return array('idErro' => 3,
             'message' => 'o banco de dados nao pode excluir o regristo');
       }
         
    }else{
        return array('idErro' => 4,
                        'message' => 'nao é possivel excluir o registro sem um id valido');
    }


}











?>