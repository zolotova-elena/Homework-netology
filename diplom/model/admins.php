<?php
	function getDB (){
		$pdo = new PDO("mysql:host=localhost;dbname=diplom-php;charset=utf8", "root", "", [
		  	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true
		]);
		return $pdo;
	}

	class Admins {
		//$dataAdmins;
		//public $pdo = getDB ();
		public function getAllAdmins() {
			$pdo = getDB ();
			$sql = $pdo->prepare("SELECT login, password FROM users");
			$sql->execute();
			$dataAdmins = $sql-> fetchAll();
			return $dataAdmins;
		}
	}

	$dataAdmins = new Admins();
	$dataArrayAdmins = $dataAdmins -> getAllAdmins();

	
