<?php


const SERVE = 'localhost';
const USER = 'root';
const  PASSWORD = 'bcd127';
const DATABASE = 'dbcontatos';




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