<?php

require_once('conexaoMysql.php');

function insertUserAdm($dadosadm){
  // var_dump($dadosadm);
  // die;  
      $conexao = abrirConexaoMyslq();
      
      $reposta = (boolean) true;
        
       $sql = "insert into tbluseradm (nome,email,senha) value ('".$dadosadm{'Nome'}."','".$dadosadm{'Email'}."','".$dadosadm{'Senha'}."');";
           

      if(mysqli_query($conexao,$sql)){

        if(mysqli_affected_rows($conexao)){
             $reposta = true;
        }
             return $reposta;
            fecharConexaoMyslq($conexao);
        
      }

      

}

function deletarUser($id){

  $status = false;

  $conexao = abrirConexaoMyslq(); 
  
  $sql = "delete from tbluseradm where iduseradm =".$id;

    if(mysqli_query($conexao,$sql)){
           if(mysqli_affected_rows($conexao)){
                   $status = true;
           }

           fecharConexaoMyslq($conexao);
           return $status;
    }

    return $status;


}

function selectAllUserAdm(){

   $conexao = abrirConexaoMyslq();

   $sql = "select * from tbluseradm order by iduseradm desc";
       
 $result = mysqli_query($conexao,$sql);

   if($result){
        $cont = 0;

        while($dadosadm = mysqli_fetch_assoc($result)){
             
          $arraydados[$cont] = array(
              
               "id" => $dadosadm['iduseradm'],
               "Nome" => $dadosadm['nome'],
               "Email" => $dadosadm['email'],
               "Senha" => $dadosadm['senha']
                                      

          );
          $cont++;
       ;
        }
              fecharConexaoMyslq($conexao);
              return $arraydados;
      
   }


}

function selectbyIdUser($id){

    $conexao = abrirConexaoMyslq();
    $sql = "select * from tbluseradm where iduseradm  =".$id ;


    $result = mysqli_query($conexao,$sql);

   if($result){
      
        while($dadosadm = mysqli_fetch_assoc($result)){
             
          $arraydados = array(
              
               "id" => $dadosadm['iduseradm'],
               "Nome" => $dadosadm['nome'], 
               "email" => $dadosadm['email'],
               "senha" => $dadosadm['senha']                             
          );
       
        }
              fecharConexaoMyslq($conexao);
              return $arraydados;
      
   }


      

}

function updateUser($dadosuser){
  
  $reposta = false;

  $conexao = abrirConexaoMyslq();
  $sql = "update tblcategorias set
    
   nome = '".$dadosuser{'nome'}."',
   email = '".$dadosuser{'email'}."',
   senha = '".$dadosuser{'senha'}."'
   
     where iduseradm =" .$dadosuser['id'];

     

      if(mysqli_query($conexao,$sql)){
          if(mysqli_affected_rows($conexao)){
             return true;
          }

          fecharConexaoMyslq($conexao);
          return $reposta;
      }   
      
}
