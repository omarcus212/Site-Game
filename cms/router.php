<?php




$action = (string)null;
$componente = (string)null;


if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {

    $componente = strtoupper($_GET['componente']);
    $action = strtoupper($_GET['action']);

    
    switch ($componente) {

        case 'CONTATOS';

            require_once('controller/ControllerContatos.php');

            if ($action == 'DELETAR') {

                $idContatos = $_GET['id'];
                $respostadados = excluirContato($idContatos);

                if (is_bool($respostadados)) {
                    echo ("<script>
                      alert('REGISTRO EXCLUIDO COM SUCESSO');
                      window.location.href = 'desheborCCT.php';
                        </script>");
                } else if (is_array($respostadados)) {
                    echo ("<script>
                  alert('" . $resposta['message'] . "');
                  window.history.back();
                  </script>");
                }
            }
            break;




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
            } elseif ($action == 'DELETAR') {

                $idCategoria = $_GET['id'];
                $respostadeletcategorias = excluirCategorias($idCategoria);

                if (is_bool($respostadeletcategorias)) {

                    echo ("<script>
                        alert('REGISTRO EXCLUIDO COM SUCESSO');
                        window.location.href = 'admCategorias.php';
                        </script>");
                } else if (is_array($respostadeletcategorias)) {

                    echo ("<script>
                          alert('" . $respostadeletcategorias['message'] . "');
                          window.history.back();
                          </script>");
                }
            } else if ($action == 'BUSCAR') {

                $idCategoria = $_GET['id'];
                $resposta = buscarCategorias($idCategoria);

                session_start();
                $_SESSION['dadosCategoria'] = $resposta;

                require_once('admCategorias.php');
            } else if ($action == 'EDITAR') {

                $idCategoria = $_GET['id'];
                $respostaeiditar =  atualizarContatos($_POST, $idCategoria);


                if (is_bool($respostaeiditar)) {

                    echo ("<script>
                alert('REGISTRO ATUALIZADO COM SUCESSO');
                window.location.href = 'admCategorias.php';
                </script>");
                } elseif (is_array($respostaeiditar)) {

                    echo ("<script>
                  alert('" . $respostaeiditar['message'] . "');
                 window.history.back();
                  </script>");
                }
            }
            break;


       
        case 'USERADM';

           require_once('./controller/ControllerUserADM.php');

            if ( $action == 'INSERIR') {
                require_once('./controller/ControllerUserADM.php');
                $respostauseradm = inserirUserAdm($_POST);

                if (is_bool($respostauseradm)) {

                    echo ("<script>
                    alert('REGISTRO INSIRIDO COM SUCESSO');
                    window.location.href = 'UsuarioADM.php';
                    </script>");
                } elseif (is_array($respostauseradm)) {

                    echo ("<script>
                alert('" . $respostauseradm['message'] . "');
                window.history.back();
                </script>");
                }
            } else if ($action == 'DELETAR') {

                $iduser = $_GET['id'];
                $respostauseradm = excluiruserAdm($iduser);
                

                if (is_bool($respostauseradm)) {

                            echo ("<script>
                    alert('REGISTRO EXCLUIDO COM SUCESSO');
                    window.location.href = 'UsuarioADM.php';
                    </script>");

                 } elseif (is_array($respostauseradm)) {

                            echo ("<script>
                         alert('" . $respostauseradm['message'] . "');
                         window.history.back();
                          </script>");
                 }


            } else if ($action == 'BUSCAR') {

                $iduseradm = $_GET['id'];
                $respostaeditaruseradm = BuscarUserAdm($iduseradm);

                session_start();
                $_SESSION['dadosUserAdm'] = $respostaeditaruseradm;
                require_once('UsuarioADM.php');

            }else if($action == 'EDITAR'){
                
                $iduseradm = $_GET['id'];
            
                $respostauseradm = editarUserAdm($_POST,$iduseradm);
                

                if (is_bool($respostauseradm)) {

                    echo ("<script>
                alert('REGISTRO ATUALIZADO COM SUCESSO');
                window.location.href = 'UsuarioADM.php';
                </script>");
                }elseif (is_array($respostauseradm)) {

                    echo ("<script>
                  alert('" . $$respostauseradm['message'] . "');
                 window.history.back();
                  </script>");
                }
            }

        break;
         
        case 'PRODUTO';
        require_once('./controller/ControllerProduto.php');
               if($action == 'INSERIR'){
                  
                $respostaproduto = inserirProduto($_POST);

                
                
                if (is_bool($respostaproduto)) {

                    echo ("<script>
                    alert('REGISTRO INSIRIDO COM SUCESSO');
                    window.location.href = 'admprodutos.php';
                    </script>");

                } elseif (is_array($respostaproduto)) {
                    
                    echo ("<script>
                alert('" . $respostaproduto["'message'"] . "');
                window.history.back();
                </script>");
                
                }

            }
        break;

    }
}


