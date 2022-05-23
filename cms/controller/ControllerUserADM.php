<?php
/*******
 * objetivo : arquivo responsavel pela manipulacao de dados de Usuarios ADM
 * 
 * autor : Marcus
 * 
 * Data : 22/04/22
 * 
 * versao : 1.0
 */

 require_once('./model/bd/UserAdm.php');
 require_once('./modulo/config.php');

 function inserirUserAdm($useradm){

    if(!empty($useradm)){
        if(!empty($useradm['txtnomeadm']) && !empty($useradm['txtemailadm']) && !empty($useradm['txtsenhaadm'])){

             $arreyUseradm = array(
                  
                "Nome"  => $useradm['txtnomeadm'],
                "Email" => $useradm['txtemailadm'],
                'Senha' => $useradm['txtsenhaadm'],
                  
             );
      
             

              if(insertUserAdm($arreyUseradm)){
                  
                return true;

            } else {

                return array(ERRO_INSERIR_DADOS);
            }
              }else{
               return array(ERRO_CAMPOS_VAZIOS);
              }

        }
}

function listarUseradm(){

    $dados = selectAllUserAdm();
   

    if(!empty($dados)){
       return $dados;
    }else{
        return false;
    }

}

function excluiruserAdm($iduser){

   if(!empty($iduser) & $iduser != 0 & is_numeric($iduser)){

         if(deletarUser($iduser)){
              
            return true;

         }else{
            return array(ERRO_AO_EXCLUIR);
         }
   }else{
    return array(ID_INVALIDO);
   }
}

function BuscarUserAdm($iduser){

   if($iduser != 0 & !empty($iduser) & is_numeric($iduser)){
             
        $dadosuser = selectbyIdUser($iduser);   
            if(!empty($dadosuser)){
              return $dadosuser;
            }else{
               return false;
            }
   }else{
      return array(ID_INVALIDO);
   }

}

function editarUserAdm($dados,$id){

   if(!empty($dados)){
          if(!empty($dados['txtnomeadm']) & !empty($dados['txtemailadm']) & !empty($dados['txtsenhaadm'])){
            if($id != 0 & !empty($id) & is_numeric($id)){
               
                     $arraydados = array(

                            "id" => $id,
                            "nome" => $dados['txtnomeadm'],
                            "email" => $dados['txtemailadm'],
                            "senha" => $dados['txtsenhaadm']

                     );

                    
                     require_once('./model/bd/UserAdm.php');
                     if(updateUser($arraydados)){
                            return true;
                     }else{
                        return array('idErro ' => 1, 
                        'message' => 'nao foi possivel atualizar os dados' );
                     }
              }else{
               return array('idErro ' => 4, 
               'message' => 'nao foi possivel atualizar os dados' );     
              }
          }else{

            return array(ERRO_INSERIR_DADOS);

          }
   }  

}
















?>
