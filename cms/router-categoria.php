<?php


$action = (string) null;
$componente = (string)null;


if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {

    $componente = strtoupper($_GET['componente']);
    $action = strtoupper($_GET['action']);


    switch ($componente) {

        case 'CATEGORIAS';

            require_once('./controller/ControllerCategorias.php');

            if ($action == 'INSERIR') {

                $resposta = inserirCategoria($_POST);

                if (is_bool($resposta)) {

                                    echo ("<script>
                    alert('REGISTRO INSIRIDO COM SUCESSO');
                    window.location.href = 'admCategorias.php';
                    </script>");

                } elseif (is_array($resposta)) {   
                                                      
                                    echo ("<script>
                        alert('" . $resposta['message'] . "');
                        window.history.back();
                        </script>");
                }
            }elseif($action == 'DELETAR'){
                   $idCategoria = $_GET['id'];
                 $respostadeletcategorias = excluirCategorias($idCategoria);

                             if (is_bool($respostadeletcategorias)) {
                                echo ("<script>
                                      alert('REGISTRO EXCLUIDO COM SUCESSO');
                                      window.location.href = 'admCategorias.php';
                                        </script>");
            
                      }else if(is_array($respostadeletcategorias)){
                                  echo ("<script>
                                  alert('" . $respostadeletcategorias['message'] . "');
                                  window.history.back();
                                  </script>");
            
                     }
            
            }
            break;
    }
}
