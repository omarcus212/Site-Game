<?php




$action = (string)null;
$componente = (string)null;


if($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET'){

    $componente = strtoupper($_GET['componente']);
    $action = strtoupper($_GET['action']);

 switch($componente){
      
    case 'CONTATOS';

     require_once('controller/ControllerContatos.php');

   
        if($action == 'DELETAR'){
            
            $idContatos = $_GET['id'];
            $respostadados = excluirContato($idContatos);

            if (is_bool($respostadados)) {
                echo ("<script>
                      alert('REGISTRO EXCLUIDO COM SUCESSO');
                      window.location.href = 'desheborCCT.php';
                        </script>");

            }else if(is_array($respostadados)){
                  echo ("<script>
                  alert('" . $resposta['message'] . "');
                  window.history.back();
                  </script>");

     }
        
        }

    break;

 }


}








?>