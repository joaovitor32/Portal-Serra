<?php
	class Projeto{

		private $idProjeto;
		private $titulo;
		private $descricao;
		private $foto;

		//	Gets
		public function getIdProjeto(){
			return $this->idProjeto;
		}
		public function getTitulo(){
			return $this->titulo;
		}
		public function getDescricao(){
			return $this->descricao;
		}
		public function getFoto(){
			return $this->foto;
		}


		//	Sets
		public function setIdProjeto($idProjeto){
			$this->idProjeto=$idProjeto;
		}
		public function setTitulo($titulo){
			$this->titulo=$titulo;
		}
		public function setDescricao($descricao){
			$this->descricao=$descricao;
		}
		public function setFoto($foto){
			$this->foto=$foto;
		}


		public function lista(){
			try{
				include('../../database.class.php');

				$db = new Database();
				$conexao=$db->conect_database();

				$sqlLista="SELECT titulo,descricao,foto FROM projeto";
				$conexao->exec("SET NAMES utf8");
				$stmtLista=$conexao->prepare($sqlLista);
				$stmtLista->execute();

				$projetos=$stmtLista->fetchALL(PDO::FETCH_ASSOC);
				echo json_encode($projetos);
				
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

				$sqlCreate="INSERT INTO projeto(titulo,descricao,foto) VALUES (?,?,?)";
				$conexao->exec("SET NAMES utf8");
				$stmtCreate=$conexao->prepare($sqlCreate);
				$stmtCreate->bindParam(1,$this->titulo);
				$stmtCreate->bindParam(2,$this->descricao);
				$stmtCreate->bindParam(3,$this->foto);
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

				$sqlRead="SELECT titulo,descricao,foto FROM projeto WHERE idProjeto=?";
				$conexao->exec("SET NAMES utf8");

				$stmtRead=$conexao->prepare($sqlRead);
				$stmtRead->bindParam(1,$this->idProjeto);
				$stmtRead->execute();

				$projeto=$stmtRead->fetch(PDO::FETCH_ASSOC);
				echo json_encode($projeto);

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

				$sqlUpdate="UPDATE projeto SET titulo=?,descricao=?,foto=? WHERE idProjeto=?";
				$conexao->exec("SET NAMES utf8");
				$stmtUpdate=$conexao->prepare($sqlUpdate);
				$stmtUpdate->bindParam(1,$this->titulo);
				$stmtUpdate->bindParam(2,$this->descricao);
				$stmtUpdate->bindParam(3,$this->foto);

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

				$sqlDelete="DELETE FROM projeto WHERE idProjeto=?";
				$conexao->exec("SET NAMES utf8");

				$stmtDelete=$conexao->prepare($sqlDelete);
				$stmtDelete->bindParam(1,$this->idProjeto);
				$result=$stmtDelete->execute();
				
				if($result){
					http_response_code(204);
				}else{
					http_response_code(400);
					echo json_encode("Error","Não foi possível excluir projeto");
				}
			}catch(PDOException $e){
				http_response_code(500);
				echo json_encode("Error",$e->getMessage());
			}
		}
	}
?>