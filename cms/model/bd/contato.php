<?php

include('conexaoMysql.php');

function selectAllContatos(){

   $conection = abrirConexaoMyslq();

   $sql = "select * from tblcontatos order by idcontato desc";

   $resultado = mysqli_query($conection,$sql);

   if($resultado){
       $cont = 0 ;

       while($rsdados = mysqli_fetch_assoc($resultado)){

       $arreydados[$cont] = array(
 
        "id"   => $rsdados['idcontato'],
        "Nome"  =>$rsdados['nome'],
        "Email"  =>$rsdados['email'],
        "Obs" => $rsdados['obs']

       );
   
          
         $cont++;
       }
   }

   fecharConexaoMyslq($conection);
   return $arreydados;


    


}



function deletarContato($id)
{

   $status = (boolean)  false;

   $conexao = abrirConexaoMyslq();

   $sql  = " delete from tblcontatos where idcontato = ".$id;


   if(mysqli_query($conexao,$sql)){
      if(mysqli_affected_rows($conexao)){
            
         $status = true;
      } 
      
      
      fecharConexaoMyslq($conexao);
      return $status;
   }

   return $status;


}



?>