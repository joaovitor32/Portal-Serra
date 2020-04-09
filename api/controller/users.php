<?php
    $requestBody=json_decode(file_get_contents("php://input"));
    $requestHeaders=getallheaders();

    if(!empty($requestHeaders)&&!empty($requestHeaders)){

        switch($data->action){
            case "CADASTRO_USUARIO":
                include '../Models/users';
                $user=new User();
                $user->setFull_Name($data->full_name);
                $user->setCargo($data->cargo);
                $user->setSenha(md5($data->senha));
                $user->setEntrada($data->entrada);
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
                $user->setCodUser($data->codUser);
                $user->read();
                return;
            break;
            case "UPDATE_USER":
                include '../Models/users';
                $user=new User();
                $user->setCodUser($data->codUser);
                $user->setSenha(md5($data->senha));
                $user->setFull_Name($data->full_name);
                $user->setCargo($data->cargo);
                $user->setEntrada($data->entrada);
                $user->update();
                return;
            break;
            case "DELETE_USER":
                include '../Models/users';
                $user=new User();
                $user->setCodUser($data->codUser);
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