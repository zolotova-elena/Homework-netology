<?php 
	session_start();
	function getDB (){
		$pdo = new PDO("mysql:host=localhost;dbname=diplom-php;charset=utf8", "root", "", [
		  	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true
		]);
		return $pdo;
	}

	function checkUser ($log, $pass){
		$pdo = getDB ();

		$sql = $pdo->prepare("SELECT * FROM users");
		$sql->execute();
		$allUsers = $sql-> fetchAll();

		for ($i = 0; $i < count($allUsers); $i++){
			$user = $allUsers[$i];
			if ( $log == $user['login'] and md5($pass) == $user['password'] ) {
				return $user['id'];
			}
		}

		return null;
	}
