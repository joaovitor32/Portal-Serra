<?php
function execute_action($acao, $requestBody, $requestHeaders)
{

    if (!empty($acao)) {
        include "../../Models/token.php";
        $token = new Token();
        $token->setToken($requestHeaders);
        switch ($acao) {
            case "GET_MENSAGENS":
                if ($token->VerificaJWT()) {
                    include '../../Models/mensagem.php';
                    $mensagem = new  Mensagem();
                    $mensagem->lista();
                    return;
                }
                break;
            case "CREATE_MENSAGEM":
                if ($token->VerificaJWT()) {
                    include '../../Models/mensagem.php';
                    $mensagem = new Mensagem();
                    $mensagem->setMensagem($requestBody->mensagem);
                    $mensagem->setTexto($requestBody->texto);
                    $mensagem->setData($requestBody->data);
                    $mensagem->create();
                    return;
                }
                break;
            case "READ_MENSAGEM":
                include "../../Models/mensagem.php";
                $mensagem = new Mensagem();
                $mensagem->setIdMensagem($requestBody->idMensagem);
                $mensagem->read();
                return;
                break;
            case "UPDATE_MENSAGEM":
                include "../../Models/mensagem.php";
                $mensagem = new Mensagem();
                $mensagem->setIdMensagem($requestBody->idMensagem);
                $mensagem->setMensagem($requestBody->mensagem);
                $mensagem->setTexto($requestBody->texto);
                $mensagem->setData($requestBody->data);
                $mensagem->update();
                return;
                break;
            case "DELETE_MENSAGEM":
                if ($token->VerificaJWT()) {
                    include "../../Models/mensagem.php";
                    $mensagem = new Mensagem();
                    $mensagem->setIdMensagem($requestBody->idMensagem);
                    $mensagem->delete();
                    return;
                }
                break;
            default:
                http_response_code(400);
                echo "Operação inválida";
                return;
        }
    }
}
