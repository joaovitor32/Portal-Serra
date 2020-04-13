<?php
    $requestBody=json_decode(file_get_contents("php://input"));
    $requestHeaders=getallheaders();

    if(!empty($requestBody)&&!empty($requestHeaders)){

        switch($data->action){
            case "CADASTRO_USUARIO":
                include '../Models/users.php';
                $user=new User();
                $user->setFull_Name($requestBody->full_name);
                $user->setCargo($requestBody->cargo);
                $user->setSenha(md5($requestBody->senha));
                $user->setEntrada($requestBody->entrada);
                $user->create();
                return;
            break;
            case "GET_USERS":
                include "../Models/users";
                $user=new User();
                $user->lista();
                return;
            break;
            case "GET_USER":
                include '../Models/users';
                $user=new User();
                $user->setCodUser($requestBody->codUser);
                $user->read();
                return;
            break;
            case "UPDATE_USER":
                include '../Models/users';
                $user=new User();
                $user->setCodUser($requestBody->codUser);
                $user->setSenha(md5($requestBody->senha));
                $user->setFull_Name($requestBody->full_name);
                $user->setCargo($requestBody->cargo);
                $user->setEntrada($requestBody->entrada);
                $user->update();
                return;
            break;
            case "DELETE_USER":
                include '../Models/users';
                $user=new User();
                $user->setCodUser($requestBody->codUser);
                $user->delete();
                return;
            break;  
            default:
                http_response_code(400);
                echo "Operação inválida";
                return;
        }

    }

?>