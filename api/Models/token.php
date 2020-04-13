<?php
    require __DIR__ . '/vendor/autoload.php';
    use Firebase\JWT\JWT;
    require('key.php');

    class Token{

        private $codUser;
        private $token;
        private $login;
        private $tokenDecoded;

        public function getToken(){
            return $this->token;
        }

        public function getCodUser(){
            return $this->codUser;
        }

        public function getLogin(){
            return $this->login;
        }

        public function getTokenDecoded(){
            return $this->tokenDecoded;
        }

        private function setToken($token){
            $this->token=$token;
        }

        public function setCodUser($codUser){
            $this->codUser=$codUser;
        }

        private function setLogin($login){
            $this->login=$login;
        }

        private function setTokenDecoded($tokenDecoded){
            $this->tokenDecoded=$tokenDecoded;
        }

        public function VerificaJWT(){

            try{
                $this->setToken(explode(" ",$this->token['authorization']));
                $this->setTokenDecoded(JWT::Decode($this->token[1],key,array('HS256')));
                if($this->tokenDecoded){
                    $this->setLogin($this->tokenDecoded->login);
                    $this->setCodUser($this->tokenDecoded->codUser);
                    return true;
                }else{
                    http_response_code(401);
                    echo json_encode("erro","Chave de registro inválida");
                }

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode('error',$e->getMessage());

            }

        }


    }

?>
