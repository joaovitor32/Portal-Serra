<?php

$requestHeaders = getallheaders();
$requestBody=json_decode(file_get_contents('php://input'));

try{
    include('../../controller/noticia.php');
    execute_action("DELETE_NOTICIA", $requestBody,$requestHeaders);
}catch(PDOException $e) {
    http_response_code(400);
    echo json_encode("error",$e->getMessage());
}

?>