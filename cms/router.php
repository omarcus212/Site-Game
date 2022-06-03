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
                  

              
                 if(isset($_FILES) && !empty($_FILES)){
                
                    $respostaproduto = inserirProduto($_POST,$_FILES);
                 }else{
                 
                    $respostaproduto = inserirProduto($_POST,null);
                 }
         
            
                if (is_bool($respostaproduto)) {

                    echo ("<script>
                    alert('REGISTRO INSIRIDO COM SUCESSO');
                    window.location.href = 'admprodutos.php';
                    </script>");

                } elseif (is_array($respostaproduto)) {
                    
                    echo ("<script>
                alert('" . $respostaproduto['message'] . "');
                window.history.back();
                </script>");
                
                }



            }else if($action == 'BUSCAR'){

                $idproduto = $_GET['id'];
                $respostaproduto= Buscaridproduto($idproduto);

                session_start();
                $_SESSION['dadosProduto'] = $respostaproduto;
                require_once('admprodutos.php');

            }else if($action == 'DELETAR'){

                $idproduto = $_GET['id'];
                $foto = $_GET['foto'];
           
                $arraydados = array(
                           "id" => $idproduto,
                           "fotoname" => $foto        
                );

                $respostaP = excluirProduto($arraydados);
                

                if (is_bool($respostaP)){

                            echo ("<script>
                    alert('REGISTRO EXCLUIDO COM SUCESSO');
                    window.location.href = 'admprodutos.php';
                    </script>");

                 } elseif (is_array($respostaP)) {

                            echo ("<script>
                         alert('" . $respostaP['message'] . "');
                         window.history.back();
                          </script>");
                 }

            }else if($action == 'EDITAR'){

                $id = $_GET['id'];
                $foto = $_GET['foto'];
           
                $arraydados = array(
                           "id" => $id,
                           "fotoname" => $foto ,
                           "file" => $_FILES       
                );
                       
                $respostaproduto = editarProduto($_POST,$arraydados);
                
                if (is_bool($respostaproduto)) {
                             
                    echo ("<script>
                alert('REGISTRO ATUALIZADO COM SUCESSO');
                window.location.href = 'admprodutos.php';
                </script>");
                }elseif (is_array($respostaproduto)) {
                    
                    echo ("<script>
                  alert('" . $respostaproduto['message'] . "');
                 window.history.back();
                  </script>");
                }
            }

        break;

        case 'PRODUTOCATEGORIA';
        require_once('./controller/ControllerProdutCategoria.php');
              if($action == 'INSERIR'){
                 

                   $respostaprodutoCategoria = inserirProdutoCategoria($_POST);
             
                 
                         
               if (is_bool($respostaprodutoCategoria)) {

                   echo ("<script>
                   alert('REGISTRO INSIRIDO COM SUCESSO');
                   window.location.href = 'produtosCategoria.php';
                   </script>");

               } elseif (is_array($respostaprodutoCategoria)) {
                   
                   echo ("<script>
               alert('" . $respostaprodutoCategoria['message'] . "');
               window.history.back();
               </script>");
               
               }



           }else if($action == 'BUSCAR'){

               $idproduto = $_GET['id'];
               $respostaproduto= buscarprodutocategoria($idproduto);

               session_start();
               $_SESSION['dadosProdutoCategoria'] = $respostaproduto;
               require_once('produtosCategoria.php');

           }else if($action == 'DELETAR'){

               $idprodutoC = $_GET['id'];
            
               $respostaproduto = excluirprodutocategoria($idprodutoC);
               
               if (is_bool($respostaproduto)){

                           echo ("<script>
                   alert('REGISTRO EXCLUIDO COM SUCESSO');
                   window.location.href = 'produtosCategoria.php';
                   </script>");

                } elseif (is_array($respostaproduto)) {

                           echo ("<script>
                        alert('" . $respostaproduto['message'] . "');
                        window.history.back();
                         </script>");
                }

           }else if($action == 'EDITAR'){

            $id = $_GET['id'];
              
                        
               $respostaproduto = atualizarprodutocategoria($_POST,$id);
               
               if (is_bool($respostaproduto)) {
                            
                   echo ("<script>
               alert('REGISTRO ATUALIZADO COM SUCESSO');
               window.location.href = 'produtosCategoria.php';
               </script>");

               }elseif (is_array($respostaproduto)) {
                   
                   echo ("<script>
                 alert('".$respostaproduto['message'] . "');
                window.history.back();
                 </script>");
               }
           }


    }
}


