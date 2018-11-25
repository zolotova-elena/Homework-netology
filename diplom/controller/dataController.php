<?php
	
	if (!empty($_GET['action']){
		if ( $_GET['action'] == 'admins' ){
			include '../model/admins.php';
			$dataAdmins = new Admins();
			$dataArrayAdmins = $dataAdmins -> getAllAdmins();
			include '../view/admin.php';
			//header("Location: ../model/admins.php");
		} else if ( $_GET['action'] == 'topic' ) {
			header("Location: ../model/topics.php");
		} else if ( $_GET['action'] == 'questions' ) {
			header("Location: ../model/questions.php");
		} 
	}