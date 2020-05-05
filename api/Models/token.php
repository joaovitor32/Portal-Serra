<?php
    require __DIR__ . '../../vendor/autoload.php';
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

        public function setToken($token){
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
                
                $token=explode(" ",$this->token["authorization"]);
                $this->tokenDecoded=JWT::decode($token[1],key,array('HS256'));
                if($this->tokenDecoded){
                    $this->setLogin($this->tokenDecoded->login);
                    $this->setCodUser($this->tokenDecoded->codUser);
                    return true;
                }else{
                    return false;
                    http_response_code(401);
                }
                
            }catch(PDOException $e){
                http_response_code(500);
                echo "Erro: ".$e->getMessage();
            }

        }


    }

?>
