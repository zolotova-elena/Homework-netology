<?php
	var_dump($_GET['action']);
	if (!empty($_GET['action'])) {
		if ( $_GET['action'] == 'admins' ){
			include '../model/admins.php';
			$dataAdmins = new Admins();
			$dataArrayAdmins = $dataAdmins -> getAllAdmins();
			include '../view/view_admins.php';
			//header("Location: ../model/admins.php");
		} else if ( $_GET['action'] == 'topic' ) {
			header("Location: ../model/topics.php");
		} else if ( $_GET['action'] == 'questions' ) {
			include '../model/model_questions.php';
			$dataQuestions = new Questions();
			$dataArrayQuestions = $dataQuestions -> getAllQuestions();
			include '../view/view_questions.php';
			//header("Location: ../model/questions.php");
		} 
	}