<?php
   function execute_action($acao,$requestBody,$requestHeader){

        if(!empty($acao)&&!empty($requestHeader)&&!empty($requestBody)){

            switch($acao){
                case "GET_RESPOSTAS":
                    include '../Models/resposta.php';
                    $resposta=new  Resposta();
                    $resposta->lista();
                    return;
                break;
                case "CREATE_RESPOSTA":
                    include '../Models/resposta.php';
                    $resposta=new Resposta();
                    $resposta->setQuestao1($requestBody->questao1);
                    $resposta->setQuestao2($requestBody->questao2);
                    $resposta->setObservacao($requestBody->observacao);
                    $resposta->setData($requestBody->data);
                    $resposta->create();
                    return;
                break;
                case "READ_RESPOSTA":
                    include "../Models/resposta.php";
                    $resposta=new Resposta();
                    $resposta->setIdResposta($requestBody->idResposta);
                    $resposta->read();
                    return;
                break;
                case "UPDATE_RESPOSTA":
                    include "../Models/resposta.php";
                    $resposta=new Resposta();
                    $resposta->setIdResposta($requestBody->idResposta);
                    $resposta->setQuestao1($requestBody->questao1);
                    $resposta->setQuestao2($requestBody->questao2);
                    $resposta->setObservacao($requestBody->observacao);
                    $resposta->setData($requestBody->data);
                    $resposta->update();
                    return;
                break;
                case "DELETE_RESPOSTA":
                    include "../Models/resposta.php";
                    $resposta=new Resposta();
                    $resposta->setIdResposta($requestBody->idResposta);
                    $resposta->delete();
                    return;
                break;
                default:
                    http_response_code(400);
                    echo "Operação inválida";
                    return;
            }

    }
}
?>
