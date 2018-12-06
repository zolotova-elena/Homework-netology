<?php
	//namespace Model;
	//require_once  '../vendor/autoload.php';
	class ModelAdmins 
	{
		private $pdo;

		function __construct($pdo) {
			$this->pdo = $pdo;
		}

		public 	function getUsers (){
			$sql = $this->pdo->prepare("SELECT * FROM users");
			$sql->execute();
			$allUsers = $sql-> fetchAll();
			return $allUsers; 
		}
	
		public function getAllLoginsAndIds(){
			$sql = $this->pdo->prepare("SELECT id, login FROM users");
			$sql->execute();
			$dataAdmins = $sql-> fetchAll();
			return $dataAdmins;
		}

		public function createAdmin ($newLog, $newPass){
			$sql = $this->pdo->prepare("INSERT INTO users (login, password) VALUES ('".$newLog."', '".md5($newPass)."')");
			$sql->execute();
			return $sql; 
		}

		public function updateAdmin ($admin_id, $newPass){
			$sql = $this->pdo->prepare("UPDATE users SET password ='".md5($newPass)."' WHERE id =".$admin_id);
			$sql->execute();
			return $sql; 
		}

		public  function deleteAdmin ($admin_id){
			$sql = $this->pdo->prepare("DELETE FROM users WHERE id =".$admin_id);
			$sql->execute();
			return $sql; 
		}
	}
