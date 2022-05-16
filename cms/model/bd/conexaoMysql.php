<?php


const SERVE = 'localhost';
const USER = 'root';
const  PASSWORD = 'Mvnfox258.';
const DATABASE = 'dbseugame';




function abrirConexaoMyslq(){

   $conexao = array();


   $conexao = mysqli_connect(SERVE,USER,PASSWORD,DATABASE);

   if($conexao){
      return $conexao;
   }else{
       return false;
   }

}



function fecharConexaoMyslq($conexao){
  
    mysqli_close($conexao);


}













?>