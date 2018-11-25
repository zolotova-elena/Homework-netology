<?php

	if (!empty($_GET['action']){
		if ( $_GET['action'] == 'admins' ){

		} else if ( $_GET['action'] == 'topic' ) {

		} else if ( $_GET['action'] == 'questions' ) {

		} 
	}





	class MainControl {
		$pdo = getDB ();

		public function showAdmin(){
			$sql = $pdo->prepare("SELECT * FROM users");
			$sql->execute();
			$allUsers = $sql-> fetchAll();
		}
	}
