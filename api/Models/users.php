<?php

require __DIR__ . '../../vendor/autoload.php';
use Firebase\JWT\JWT;

class User{

    private $codUser;
    private $full_name;
    private $entrada;
    private $cargo;
    private $senha;
    private $idResposta;
    private $key;

    public function getCodUser()
    {
        return $this->codUser;
    }
    public function getFull_Name()
    {
        return $this->full_name;
    }
    public function getEntrada()
    {
        return $this->entrada;
    }
    public function getCargo()
    {
        return $this->cargo;
    }

    public function getKey(){
        return $this->key;
    }

    public function setCodUser($codUser)
    {
        $this->codUser = $codUser;
    }

    public function  setFull_Name($fullName)
    {
        $this->full_name = $fullName;
    }
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function setEntrada($entrada){
        $this->entrada=$entrada;
    }
    public function setIdResposta($idResposta)
    {
        $this->idResposta = $idResposta;
    }

    public function setKey($key){
        $this->key=$key;
    }

    public function  lista()
    {

        try {

            include("../../database.class.php");

            $db = new Database();
            $conexao = $db->conect_database();

            $sqlLista = "SELECT codUser, full_name, entrada, cargo FROM users";
            $conexao->exec("SET NAMES utf8");
            $stmtLista = $conexao->prepare($sqlLista);
            $stmtLista->execute();

            $users = $stmtLista->fetchALL(PDO::FETCH_ASSOC);
            echo json_encode($users);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode("Erro", $e->getMessage());
        }
    }

    public function create()
    {

        try {

            include('../../database.class.php');

            $db = new Database();
            $conexao =$db->conect_database();
            $conexao->beginTransaction();

            $sqlCreate = "INSERT INTO users(full_name,entrada,cargo,senha) VALUES (?,?,?,?)";
            $conexao->exec('SET NAMES utf8');
            $stmtCreate=$conexao->prepare($sqlCreate);
            $stmtCreate->bindParam(1, $this->full_name);
            $stmtCreate->bindParam(2, $this->entrada);
            $stmtCreate->bindParam(3, $this->cargo);
            $stmtCreate->bindParam(4, $this->senha);
            $result = $stmtCreate->execute();

            if ($result) {
                $conexao->commit();
                http_response_code(201);
                json_encode($result);
            } else {
                $conexao->rollBack();
                http_response_code(400);
                echo json_encode(["error","Algo de errado aconteceu na hora do cadastro do usuário"]);
            }
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['Error', $e->getMessage()]);
        }
    }

    public function read()
    {

        try {

            include("../../database.class.php");
            $db = new Database();

            $conexao = $db->conect_database();

            $sqlRead = "SELECT full_name, entrada, cargo FROM users WHERE codUser=?";
            $conexao->exec("SET NAMES utf8");

            $stmtRead = $conexao->prepare($sqlRead);
            $stmtRead->bindParam(1, $this->codUser);
            $stmtRead->execute();

            $user = $stmtRead->fetch(PDO::FETCH_ASSOC);
            echo json_encode($user);
        } catch (PDOException $e) {

            http_response_code(500);
            echo json_encode("Error", $e->getMessage());
        }
    }

    public function update()
    {

        try {

            include('../../database.class.php');

            $db = new Database();
            $conexao =$db->conect_database();

            $sqlUpdate = "UPDATE users SET full_name=?, entrada=?, cargo=?,senha=? WHERE codUser=?";
            $conexao->exec("SET NAMES utf8");
            $stmtUpdate = $conexao->prepare($sqlUpdate);
            $stmtUpdate->bindParam(1, $this->full_name);
            $stmtUpdate->bindParam(2, $this->entrada);
            $stmtUpdate->bindParam(3, $this->cargo);
            $stmtUpdate->bindParam(4, $this->senha);
            $stmtUpdate->bindParam(5, $this->codUser);
            
            $result = $stmtUpdate->execute();
            if ($result) {
                http_response_code(200);
                json_encode($result);
            } else {
                http_response_code(400);
                echo json_encode(["error",'Algo deu errado!']);
            }
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode("Error", $e->getMessage());
        }
    }

    public function delete()
    {

        try {

            include("../../database.class.php");
            $db = new Database();
            $conexao = $db->conect_database();
        
            $sqlDelete = "DELETE FROM users WHERE codUser=?";
            $conexao->exec("SET NAMES utf8");
            $stmtDelete = $conexao->prepare($sqlDelete);
            $stmtDelete->bindParam(1, $this->codUser);
            $result = $stmtDelete->execute();

            if ($result) {

                http_response_code(204);
            } else {
                http_response_code(400);
                echo json_encode("Error", "Não foi possível excluir usuário");
            }
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode("Error", $e->getMessage());
        }
    }

    public function grantAcess(){

        try{

            include('../../database.class.php');
            $db=new Database();
            $conexao=$db->conect_database();

            $sqlLogin="SELECT codUser,full_name FROM users WHERE full_name=? AND senha=?";
            $conexao->exec('SET NAMES utf8');
            $stmtAcesso=$conexao($sqlLogin);
            $stmtAcesso->bindParam(1,$this->full_name);
            $stmtAcesso->bindParam(2,$this->senha);
            $stmtAcesso->execute();
            $dado=$stmtAcesso->fetch(PDO::FETCH_ASSOC);
            if($dado!=0){
                $this->createJWToken($dado);
            }else{

            }

        }catch(PDOException $e){
            http_response_code(500);
            echo json_encode("error",$e->getMessage());
        }

    }
    public function createJWToken($dado){

        try{
            $login=$dado['full_name'];
            $codUser=$dado['codUser'];

            $token=array(
                "iss"=>"localhost",
                "login"=>$login,
                "codUser"=>$codUser,
                "espires"=>3600
            );

            $jwt=JWT::encode($token,$this->key);
            echo json_encode($jwt);

        }catch(PDOException $e){
            
            http_response_code(500);
            echo json_encode('error',$e->getMessage());
        
        }

    }
    public function destroyJWT(){
        try{
            $this->tokenDecoded->destroy();
        }catch(PDOException $e){
            http_response_code(500);
            echo json_encode("erro",$e->getMessage());
        }

    }

}

?>