<?php

function execute_action($acao, $requestBody, $requestHeaders)
{
    if (!empty($acao)) {
        include "../../Models/token.php";
        $token = new Token();
        $token->setToken($requestHeaders);
        switch ($acao) {
            case "CADASTRO_USUARIO":
                if ($token->VerificaJWT()) {
                    include '../../Models/users.php';
                    $user = new User();
                    $user->setFull_Name($requestBody->full_name);
                    $user->setCargo($requestBody->cargo);
                    $user->setSenha(md5($requestBody->senha));
                    $user->setEntrada($requestBody->entrada);
                    $user->setTelefone($requestBody->telefone);
                    $user->setEmail($requestBody->email);
                    $user->create();
                    return;
                }
                break;
            case "GET_USERS":
                if ($token->VerificaJWT()) {
                    include "../../Models/users.php";
                    $user = new User();
                    $user->lista();
                    return;
                }
                break;
            case "GET_USER":
                if ($token->VerificaJWT()) {
                    include '../../Models/users.php';
                    $user = new User();
                    $user->setCodUser($token->getCodUser());
                    $user->read();
                    return;
                }
                break;
            case "UPDATE_USER":
                if ($token->VerificaJWT()) {
                    include '../../Models/users.php';
                    $user = new User();
                    $user->setCodUser($token->getCodUser());
                    $user->setSenha(md5($requestBody->senha));
                    $user->setFull_Name($requestBody->full_name);
                    $user->setCargo($requestBody->cargo);
                    $user->setEntrada($requestBody->entrada);
                    $user->setTelefone($requestBody->telefone);
                    $user->setEmail($requestBody->email);
                    $user->update();
                    return;
                }
                break;
            case "GRANT_ACCESS":
                include '../../Models/users.php';
                $user = new User();
                $user->setSenha(md5($requestBody->senha));
                $user->setFull_Name($requestBody->full_name);
                $user->grantAcess();
                return;
            case "DELETE_USER":
                if ($token->VerificaJWT()) {
                    include '../../Models/users.php';
                    $user = new User();
                    $user->setCodUser($requestBody->codUser);
                    $user->delete();
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
