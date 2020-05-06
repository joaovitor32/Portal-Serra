<?php
function execute_action($acao,$requestBody,$requestHeader){

		if(!empty($acao)&&!empty($requestHeader)&&!empty($requestBody)){

			switch($acao){
				case "GET_PROJETOS":
					include '../../Models/projeto.php';
					$projeto=new Projeto();
					$projeto->lista();
					return;
				break;
				case "CREATE_PROJETO":
					include '../../Models/projeto.php';
					$projeto=new Projeto();
					$projeto->setTitulo($requestBody->titulo);
					$projeto->setDescricao($requestBody->descricao);
					$projeto->setFoto($requestBody->foto);
					$projeto->create();
					return;
				break;
				case "READ_PROJETO":
					include '../../Models/projeto.php';
					$projeto=new Projeto();
					$projeto->setIdProjeto($requestBody->idProjeto);
					$projeto->read();
					return;
				break;
				case "UPDATE_PROJETO":
					include '../../Models/projeto.php';
					$projeto=new Projeto();
					$projeto->setIdProjeto($requestBody->idProjeto);
					$projeto->setTitulo($requestBody->titulo);
					$projeto->setDescricao($requestBody->descricao);
					$projeto->setFoto($requestBody->foto);
					$projeto->update();
					return;
				break;
				case "DELETE_PROJETO":
					include '../../Models/projeto.php';
					$projeto=new Projeto();
					$projeto->setIdProjeto($requestBody->idProjeto);
					$projeto->delete();
					return;
				break;
				default:
					http_response_code(400);
					echo "Operação inválida";
					return;
			}

	}
}
?>