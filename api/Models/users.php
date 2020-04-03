<?php

    class Users{

        private $codUser;
        private $full_name;
        private $entrada;
        private $cargo;
        private $senha;
        private $idResposta;

        public function getCodUser(){
            return $this->codUser;
        }
        public function getFull_Name(){
            return $this->full_name;
        }
        public function getEntrada(){
            return $this->entrada;
        }
        public function getCargo(){
            return $this->cargo;
        }

        public function setCodUser($codUser){
            $this->codUser=$codUser;
        }
        
        public function  setFull_Name($fullName){
            $this->$full_name=$fullName;
        }
        public function setCargo($cargo){
            $this->cargo=$cargo;
        }
        public function setSenha($senha){
            $this->senha=$senha;
        }
        public function setIdResposta($idResposta){
            $this->idResposta=$idResposta;
        }

        public function  lista(){

            try{

                include("../database.class.php");

                $db= new Database();
                $conexao= conect_database();

                $sqlLista="SELECT codUser, full_name, entrada, cargo FROM users";
                $conexao->exec("SET NAMES utf8");
                $stmtLista=$conexao->prepare($sqlLista);
                $stmtLista->execute();

                $users=$stmtLista->fetchALL(PDO::FETCH_ASSOC);
                return json_encode($users);

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode("Erro",$e->getMessage());
            }

        }
        
        public function create(){

            try{

                include('../database.class.php');

                $db=new Database();
                $conexao=$db->conect_database();

                $sqlCreate="INSERT INTO users(full_name,entrada,cargo,senha)";
                $conexao->exec('SET NAMES utf8');
                $stmtCreate->bindParam(1,$this->full_name);
                $stmtCreate->bindParam(2,$this->entrada);
                $stmtCreate->bindParam(3,$this->cargo);
                $stmtCreate->bindParam(4,$this->senha);
                $result=$stmtCreate->execute();

                if($result){
                    http_response_code(201);
                }else{
                    http_response_code(400);
                    echo json_encode("Error:","Algo de errado aconteceu na hora de cadastro o usuário");
                }

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode('Error',$e->getMessage());
            }

        }

        public function read(){

            try{

                include("../database.class.php");
                $db=new Database();
                
                $conexao=$db->conect_database();

                $sqlRead="SELECT full_name, entrada, cargo FROM users WHERE codUser=?";
                $conexao->exec("SET NAMES utf8");

                $stmtRead=$conexao->prepare($sqlRead);
                $stmtRead->bindParam(1,$this->codUser);
                $stmtRead->execute();

                $user=$stmtRead->fetch(PDO::FETCH_ASSOC);
                echo json_encode($user);

            }catch(PDOException $e){

                http_response_code(500);
                echo json_encode("Error",$e->getMessage());

            }

        }

        public function update(){

            try{

                include('../database.class.php');

                $db=new Database();

                $conexao=$db->conect_database();

                $sqlUpdate="UPDATE users SET full_name=?, entrada=?, cargo=?,senha=?";
                $conexao->exec("SET NAME utf8");
                $stmtUpdate=$conexao->prepare($sqlUpdate);
                $stmtUpdate->bindParam(1,$this->full_name);
                $stmtUpdate->bindParam(2,$this->entrada);
                $stmtUpdate->bindParam(3,$this->cargo);
                $stmtUpdate->bindParam(4,$this->senha);
                $result=$stmtUpdate->execute();

                if($result){
                    http_response_code(200);
                    $this->read();
                }else{

                }


            }catch(PDOException $e){    
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }

        }

        public function delete(){

            try{

                include("../database.class.php");
                $db=new Database();
                $conexao=$db->conect_database();

                $sqlDelete="DELETE FROM users WHERE codUser=?";
                $conexao->exec("SET NAMES utf8");
                $stmtDelete=$conexao->prepare($sqlDelete);
                $stmtDelete->bindParam(1,$this->codUser);
                $result=$stmtDelete->execute();

                if($result){

                    http_response_code(204);

                }else{
                    http_response_code(400);
                    echo json_encode("Error","Não foi possível excluir usuário");
                }

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }

        }

    }

?>