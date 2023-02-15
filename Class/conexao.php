<?php

class Conexao
{
	private $server = "localhost";
	private $bd = "QuizEmpresaX";
	private $user = "root";
	private $password = "";
	private $cone = "";

	public function __construct()
	{
        try{

          $this->cone = new PDO("mysql:host={$this->server};dbname={$this->bd};charset=utf8;",$this->user,$this->password);

        }catch(PDOException $msg){

        	echo "Não foi possível conectar ao servidor: ".$msg->getMessage();

        }
	}

	public function executeQuery($comando){

		try{

          $sql = $this->cone->prepare($comando);
          $sql->execute();
          if($sql->rowCount() > 0){

          	return $sql;

          }else{

          	return $sql->errorInfo();

          }

        }catch(PDOException $msg){

        	echo "Não foi possível executar o comando".$sql->errorInfo();

        }
	}

	public function executeSelect($comando){

		try{

          $sql = $this->cone->prepare($comando);
          $sql->execute();
          if($sql->rowCount() > 0){

          	return $sql->fetchALL(PDO::FETCH_CLASS);

          }else{

          	return $sql->errorInfo();

          }

        }catch(PDOException $msg){

        	echo "Não foi possível executar o comando select".$sql->errorInfo();

        }

	}

}

?>