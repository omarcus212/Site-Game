<?php


$action = (string) null;
$componente = (string)null;


if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {

    $componente = strtoupper($_GET['componente']);
    $action = strtoupper($_GET['action']);


    switch ($componente) {

        case 'CONTATOS';

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
            }elseif($action == 'BUSCAR'){
                            
            }
            break;
    }
}
