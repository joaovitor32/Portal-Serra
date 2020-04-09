<?php
    class Noticia{

        private $idNoticia;
        private $title;
        private $texto;
        private $data;

        //Gets
        public function getIdNoticia(){
            return $this->idNoticia;
        }
        public function getTitle(){
            return $this->texto;
        }
        public function getTexto(){
            return $this->texto;
        }
        public function getData(){
            return $this->data;
        }

        //Sets
        public function setIdNoticia($idNoticia){
            $this->idNoticia=$idNoticia;
        }
        public function setTitle($title){
            $this->title=$title;
        }
        public function setTexto($texto){
            $this->texto=$texto;
        }
        public function setData($data){
            $this->data=$data;
        }


        public function lista(){
            try{
                
                include('../database.class.php');

                $db=new Database();
                $conexao=$db->conect_database();

                $sqlLista="SELECT title,texto,`data` FROM noticia";
                $conexao->exec("SET NAME utf8");
                $stmtLista=$conexao->prepare($sqlLista);
                $stmtLista->execute();

                $noticias=$stmtLista->fetchALL(PDO::FETCH_ASSOC);
                return json_encode($noticias);

            }catch(PDOExcetpion $e){
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }
        }

        public function create(){

            try{

                include('../database.class.php');

                $db=new Database();
                $conexao=$db->conect_database();

                $sqlCreate="INSERT INTO noticia(?,?,?)";
                $conexao->exec("SET NAME utf8");
                $stmtCreate->bindParam(1,$this->title);
                $stmtCreate->bindParam(2,$this->texto);
                $stmtCreate->bindParam(3,$this->data);
                $result=$stmtCreate->execute();

                if($result){
                    http_response_code(201);
                }else{
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

                include("../database.class.php");
                $db=new Database();

                $conexao=$db->conect_database();

                $sqlRead="SELECT title,texto,`data` FROM Noticia WHERE idNoticia=?";
                $conexao->exec("SET NAME utf8");

                $stmtRead=$conexao->prepare($sqlRead);
                $stmtRead->bindParam(1,$this->idNoticia);
                $stmtRead->execute();

                $noticia=$stmtRead->fetch(PDO::FETCH_ASSOC);
                echo json_encode($noticia);

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

                $sqlUpdate="UPDATE noticia SET title=?,texto=?,`data`=?";
                $conexao->exec("SET NAME utf8");
                $stmtUpdate=$conexao->prepare($sqlUpdate);
                $stmtUpdate->bindParam(1,$this->title);
                $stmtUpdate->bindParam(2,$this->texto);
                $stmtUpdate->bindParam(3,$this->data);

                $result=$stmtUpdate->execute();

                if($result){
                    http_response_code(200);
                    $this->read();
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

                include("../database.class.php");

                $db=new Database();
                $conexao=$db->conect_database();

                $sqlDelete="DELETE FROM noticia WHERE idNoticia=?";
                $conexao->exec("SET NAME utf8");

                $stmtDelete=$conexao->prepare($sqlDelete);
                $stmtDelete->bindParam(1,$this->idNoticia);
                $result=$stmtDelete->execute();
                
                if($result){
                    http_response_code(204);
                }else{
                    http_response_code(400);
                    echo json_encode("Error","Não foi possível excluir notícia");
                }

            }catch(PDOException $e){
                http_response_code(500);
                echo json_encode("Error",$e->getMessage());
            }
        }

    }
?>