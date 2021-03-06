<?php
    function execute_action($acao,$requestBody,$requestHeader){

    if(!empty($acao)&&!empty($requestHeader)&&!empty($requestBody)){

        switch($acao){
            case "GET_NOTICIAS":
                include '../../Models/noticia.php';
                $noticia=new  Noticia();
                $noticia->lista();
                return;
            break;
            case "CREATE_NOTICIA":
                include '../../Models/noticia.php';
                $noticia=new Noticia();
                $noticia->setTitle($requestBody->title);
                $noticia->setTexto($requestBody->texto);
                $noticia->setData($requestBody->data);
                $noticia->create();
                return;
            break;
            case "READ_NOTICIA":
                include "../../Models/noticia.php";
                $noticia=new Noticia();
                $noticia->setIdNoticia($requestBody->idNoticia);
                $noticia->read();
                return;
            break;
            case "UPDATE_NOTICIA":
                include "../../Models/noticia.php";
                $noticia=new Noticia();
                $noticia->setIdNoticia($requestBody->idNoticia);
                $noticia->setTitle($requestBody->title);
                $noticia->setTexto($requestBody->texto);
                $noticia->setData($requestBody->data);
                $noticia->update();
                return;
            break;
            case "DELETE_NOTICIA":
                include "../../Models/noticia.php";
                $noticia=new Noticia();
                $noticia->setIdNoticia($requestBody->idNoticia);
                $noticia->delete();
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