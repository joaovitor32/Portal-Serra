<?php

    //  Criando uma classe para entidade mensagem
    class Mensagem{


        //  Criando variáveis para os atributos da tabela mensagem
        private $idMensagem;
        private $mensagem;
        private $texto;
        private $data;


        //  Funções de get
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


        //  Funções de sets
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
                
                //  Define em qual banco de dados está trabalhando
                include('../../database.class.php');


                //  Cria uma cópia/objeto da classe database, com nome de variável 'db'
                $db = new Database();


                //  Em conexao é armazenado o valor que $db->conect_database()
                $conexao=$db->conect_database();

                //  Variável string
                $sqlLista="SELECT mensagem,texto,`data` FROM mensagem";


                //  Usa função "exec" já definida no PHP
                $conexao->exec("SET NAMES utf8");


                //  Usa função "prepare" definida no PHP
                //  Prepara o banco de dados para trabalhar com a string SQl que em seguida será executada
                $stmtLista=$conexao->prepare($sqlLista);

                //  Usa função "execute" definida no PHP
                //  Executa o SQL e armazena as linhas retornadas em $stmtlista
                $stmtLista->execute();

                //  Otimiza a organização dos dados armazenados em $stmtLista e os armazena em $mensagens
                $mensagens=$stmtLista->fetchALL(PDO::FETCH_ASSOC);


                //  Coloca os dados de $mensagens em formato json (adaptável para JavaScript)
                echo json_encode($mensagens);
            
            
            //  Em caso de erro, retorna uma mensagem
            }catch(PDOExcetpion $e){
                http_response_code(500);
                echo json_encode("Error", $e->getMessage());
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