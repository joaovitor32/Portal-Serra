<?php
    class Resposta{

        private $idResposta;
        private $questao1;
        private $questao2;
        private $observacao;
        private $data;
        private $codUser;

        //Gets
        public function getIdResposta(){
            return $this->idResposta;
        }
        public function getQuestao1(){
            return $this->questao1;
        }
        public function getQuestao2(){
            return $this->questao2;
        }
        public function getObservacao(){
            return $this->observacao;
        }
        public function getData(){
            return $this->data;
        }

        public function getCodUser(){
            return $this->codUser;
        }

        //Sets
        public function setIdResposta($idResposta){
            $this->idResposta=$idResposta;
        }
        public function setQuestao1($questao1){
            $this->questao1=$questao1;
        }
        public function setQuestao2($questao2){
            $this->questao2=$questao2;
        }
        public function setObservacao($observacao){
            $this->observacao=$observacao;
        }
        public function setData($data){
            $this->data=$data;
        }

        public function setCoduser($codUser){
            $this->codUser=$codUser;
        }


        public function lista(){
            try{
                
                include('../../database.class.php');

                $db=new Database();
                $conexao=$db->conect_database();

                $sqlLista="SELECT questao1,questao2,observacao,`data` FROM resposta";
                $conexao->exec("SET NAMES utf8");
                $stmtLista=$conexao->prepare($sqlLista);
                $stmtLista->execute();

                $respostas=$stmtLista->fetchALL(PDO::FETCH_ASSOC);
                echo json_encode($respostas);

            }catch(PDOException $e){
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
                $sqlCreate="INSERT INTO resposta(questao1,questao2,observacao,`data`,codUser) VALUES (?,?,?,?,?)";
                $conexao->exec("SET NAMES utf8");
                
                $stmtCreate=$conexao->prepare($sqlCreate);
                $stmtCreate->bindParam(1,$this->questao1);
                $stmtCreate->bindParam(2,$this->questao2);
                $stmtCreate->bindParam(3,$this->observacao);
                $stmtCreate->bindParam(4,$this->data);
                $stmtCreate->bindParam(5,$this->codUser);
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

                $sqlRead="SELECT questao1,questao2,observacao,`data` FROM resposta WHERE idResposta=?";
                $conexao->exec("SET NAMES utf8");

                $stmtRead=$conexao->prepare($sqlRead);
                $stmtRead->bindParam(1,$this->idResposta);
                $stmtRead->execute();

                $resposta=$stmtRead->fetch(PDO::FETCH_ASSOC);
                echo json_encode($resposta);

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

                $sqlUpdate="UPDATE resposta SET questao1=?,questao2=?,observacao=?,`data`=? WHERE idResposta=?";
                $conexao->exec("SET NAMES utf8");
                $stmtUpdate=$conexao->prepare($sqlUpdate);
                $stmtUpdate->bindParam(1,$this->questao1);
                $stmtUpdate->bindParam(2,$this->questao2);
                $stmtUpdate->bindParam(3,$this->observacao);
                $stmtUpdate->bindParam(4,$this->data);
                $stmtUpdate->bindParam(5,$this->idResposta);

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

                $sqlDelete="DELETE FROM resposta WHERE idResposta=?";
                $conexao->exec("SET NAMES utf8");

                $stmtDelete=$conexao->prepare($sqlDelete);
                $stmtDelete->bindParam(1,$this->idResposta);
                $result=$stmtDelete->execute();
                
                if($result){
                    http_response_code(204);
                }else{
                    http_response_code(400);
                    echo json_encode("Error","Não foi possível excluir usuario");
                }

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }
        }

    }
?>