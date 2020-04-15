<?php

$requestHeaders = getallheaders();
$requestBody=json_decode(file_get_contents('php://input'));

try{
    include('../../controller/users.php');
    execute_action("GET_USER", $requestHeaders, $requestBody);
}catch(PDOException $e) {
    http_response_code(400);
    echo json_encode("error",$e->getMessage());
}

?>