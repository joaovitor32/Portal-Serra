<?php

$requestHeaders = getallheaders();
$requestBody=json_decode(file_get_contents('php://input'));

try{
    include('../../controller/resposta.php');
    execute_action("UPDATE_RESPOSTA", $requestHeaders, $requestBody);
}catch(PDOException $e) {
    http_response_code(400);
    echo json_encode("error",$e->getMessage());
}

?>