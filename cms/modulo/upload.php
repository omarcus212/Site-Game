<?php
/**********************************************************************************
 * Objetivo: Arquivo para fazer upload de img;
 * Autor: Marcus
 * Data: 25/04/2022
 * Versão: 1.0
 ***********************************************************************************/

function uploand($arrayfile){
    
     require_once('modulo/config.php');

    $arquivo = $arrayfile;
    $sizefile = (int)0;
    $typefile = (string)null;
    $namefile = (string)null;
    $tempfile = (string)null;


    if( $arquivo['size'] > 0 && $arquivo['type'] != ""){
            //chega atraves do html obj
           $sizefile = $arquivo['size']/1024;  /// recupera o tamanha do arquivo que é em bytes e converte pata kbytes (/1024)
           $typefile = $arquivo['type'];
           $namefile = $arquivo['name'];
           $tempfile = $arquivo['tmp_name'];  // recupera o caminho de diretorio temporario que esta o arquivo
           
           if($sizefile <= MAX_FILE_UPLOAD){  //VALIDACAO DO TAMANHA DO ARQUIVO
               if(in_array($typefile,EXT_FILE_UPLOAD)){   //VALIDACAO Das exteceos DO ARQUIVO

                $name = pathinfo($namefile,PATHINFO_FILENAME);  //sepera a extencao do arquivo com o nome;  
                $ext = pathinfo($namefile,PATHINFO_EXTENSION);  // separa a extencao dio arquivo sem  o nome;
                
                //existem diversos algoritmos para criptografio de dados, hast,shal1,md5;
                     
                $namecript = md5($name.uniqid(time())); //md5 = gerando uma criptografia de daddos // uniquid = retorna um identificador unico prefixado baseado no tempo atual em milionésimos de segundo   // time = pega hora,minuto,segundo que esta sendo feito o upload
                 
                $foto = $namecript.".".$ext;  //juntamos o nome do arquivo criptografado com a extencao já.

                if(move_uploaded_file($tempfile,DIRETORIO_FILE_UPLOAD.$foto)){  // move o arquivo da dc(directory) temporario da apache para o dc que nos criamos;
                    return $foto;
                }else{
                    return  array(
                        'iderro' => 13,
                    'message' => 'Não foi possivel mover o arquivo '
                   );
                }

               }else{
                return  array(
                    'iderro' => 12,
                'message' => 'A extenção do arquivo selecionado não é permitida'
               );
               }
                
           }else{
                return  array(
                    'iderro' => 10,
                'message' => ' tamanho do arquivo invalido para upload' 
               );
           }

    }else{
        return  array(
            'iderro' => 11,
        'message' => 'nao é possivel realizar o upload sem um arquivo selecionado'  
       );
    }



}


?>