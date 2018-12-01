<?php
	require_once('ref/ref.php');

	function getDB (){
		$pdo = new PDO("mysql:host=localhost;dbname=diplom-php1;charset=utf8", "root", "", [
		  	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true
		]);
		return $pdo;
	}
	$pdo = getDB ();
	/**
	* 
	*/
	include 'controller/controller_questions.php';