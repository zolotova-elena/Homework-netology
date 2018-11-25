<?php
	function getDB (){
		$pdo = new PDO("mysql:host=localhost;dbname=diplom-php;charset=utf8", "root", "", [
		  	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true
		]);
		return $pdo;
	}
	
	function getAllTopicNames (){
		$pdo = getDB ();
		$sql = $pdo->prepare("SELECT topic_name, id_topic FROM tem");
		$sql->execute();
		$allUsers = $sql-> fetchAll();
		return $allUsers;
	}

	function getAllQues (){
		$pdo = getDB ();
		$result;
		$topNames = getAllTopicNames ();
		for ($i = 0; $i < count($topNames); $i++){
			$questions = Array();
			$sql = $pdo->prepare("SELECT * FROM questions WHERE id_topic=".$topNames[$i]['id_topic']);
			$sql->execute();
			$questions = $sql-> fetchAll();
			$result[ $topNames[$i]['topic_name'] ] = $questions;
			
		}
		return $result;
	}
	$pdo = getDB ();
	$allQues = getAllQues ();
	include 'mainIndex.php';
	
