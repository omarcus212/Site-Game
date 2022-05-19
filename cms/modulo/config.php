<?php
/*******
 * objetivo : arquivo responsavel por reunir e padronizar todas a variaveis utilizadas no projeto
 * 
 * autor : Marcus
 * 
 * Data : 14/04/22
 * 
 * versao : 1.0
 */


const ERRO_INSERIR_DADOS = "idErro  => 1, message => nao foi possivel inserir os dados" ;
const ERRO_CAMPOS_VAZIOS = "'idErro ' => 2,  'message' => 'existem campos obrigatorios que nao foram preenchidos'";
const ID_INVALIDO = "'idErro' => 4,'message' => 'nao é possivel excluir o registro sem um id valido'";
const ERRO_AO_EXCLUIR = "'idErro' => 3,'message' => 'o banco de dados nao pode excluir o regristo'";




// * Data : 16/04/22

//foto upload//
//LIMITACAO DE 5MB PARA UPLOAD DE IMGS;  
const MAX_FILE_UPLOAD = 5120;
const EXT_FILE_UPLOAD = array("image/jpg", "image/png", "image/jpeg", "image/gif");
const DIRETORIO_FILE_UPLOAD = "arquivos/";

?>

