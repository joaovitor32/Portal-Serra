<?php

    class Database{

        private $conexao;

        public function conect_database(){

            try{
                $this->conexao = new PDO("mysql:host=127.0.0.1;dbname=portalTransparencia","root","");
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            }catch(PDOException $e){
                http_response_code(500);
                echo $e->getMessage();
            }
            return $this->conexao;
        }

    }


?>