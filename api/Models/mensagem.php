<?php
    class Mensagem{

        private $idMensagem;
        private $mensagem;
        private $texto;
        private $data;

        //Gets
        public function getIdMensagem(){
            return $this->idMensagem;
        }
        public function getMensagem(){
            return $this->mensagem;
        }
        public function getTexto(){
            return $this->texto;
        }
        public function getData(){
            return $this->data;
        }

        //Sets
        public function setIdMensagem($idMensagem){
            $this->idMensagem=$idMensagem;
        }
        public function setMensagem($mensagem){
            $this->mensagem=$mensagem;
        }
        public function setTexto($texto){
            $this->texto=$texto;
        }
        public function setData($data){
            $this->data=$data;
        }


        public function lista(){
            try{
                
                include('../../database.class.php');

                $db=new Database();
                $conexao=$db->conect_database();

                $sqlLista="SELECT mensagem,texto,`data` FROM mensagem";
                $conexao->exec("SET NAMES utf8");
                $stmtLista=$conexao->prepare($sqlLista);
                $stmtLista->execute();

                $mensagens=$stmtLista->fetchALL(PDO::FETCH_ASSOC);
                echo json_encode($mensagens);

            }catch(PDOExcetpion $e){
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }
        }

        public function create(){

            try{

                include('../../database.class.php');

                $db=new Database();
                $conexao=$db->conect_database();
                $conexao->beginTransaction();
                $sqlCreate="INSERT INTO mensagem(mensagem,texto,`data`) VALUES (?,?,?)";
                $conexao->exec("SET NAMES utf8");
                
                $stmtCreate=$conexao->prepare($sqlCreate);
                $stmtCreate->bindParam(1,$this->mensagem);
                $stmtCreate->bindParam(2,$this->texto);
                $stmtCreate->bindParam(3,$this->data);
                $result=$stmtCreate->execute();

                if($result){
                    $conexao->commit();
                    http_response_code(201);
                }else{
                    $conexao->rollBack();
                    http_response_code(400);
                    echo json_encode("Error",$e->getMessage());
                }

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }

        }
        public function read(){
            try{

                include("../../database.class.php");
                $db=new Database();

                $conexao=$db->conect_database();

                $sqlRead="SELECT mensagem,texto,`data` FROM mensagem WHERE idMensagem=?";
                $conexao->exec("SET NAMES utf8");

                $stmtRead=$conexao->prepare($sqlRead);
                $stmtRead->bindParam(1,$this->idMensagem);
                $stmtRead->execute();

                $mensagem=$stmtRead->fetch(PDO::FETCH_ASSOC);
                echo json_encode($mensagem);

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }
        }

        public function update(){

            try{

                include('../../database.class.php');

                $db=new Database();
                $conexao=$db->conect_database();

                $sqlUpdate="UPDATE mensagem SET mensagem=?,texto=?,`data`=? WHERE = idMensagem=?";
                $conexao->exec("SET NAMES utf8");
                $stmtUpdate=$conexao->prepare($sqlUpdate);
                $stmtUpdate->bindParam(1,$this->mensagem);
                $stmtUpdate->bindParam(2,$this->texto);
                $stmtUpdate->bindParam(3,$this->data);
                $stmtUpdate->bindParam(4,$this->idMensagem);

                $result=$stmtUpdate->execute();

                if($result){
                    http_response_code(200);
                    //$this->read();
                }else{
                    http_response_code(500);
                    echo json_encode("Error",$e->getMessage());
                }

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }

        }
        public function delete(){
            try{

                include("../../database.class.php");

                $db=new Database();
                $conexao=$db->conect_database();

                $sqlDelete="DELETE FROM mensagem WHERE idMensagem=?";
                $conexao->exec("SET NAMES utf8");

                $stmtDelete=$conexao->prepare($sqlDelete);
                $stmtDelete->bindParam(1,$this->idMensagem);
                $result=$stmtDelete->execute();
                
                if($result){
                    http_response_code(204);
                }else{
                    http_response_code(400);
                    echo json_encode("Error","Não foi possível excluir mensagem");
                }

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }
        }

    }
?>