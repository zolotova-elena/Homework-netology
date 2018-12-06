<?php
	//namespace DiplomAutoload\Controller;
	require_once __DIR__.' /vendor/autoload.php';
	session_start();
	//header("Location: Controller/ControllerQuestions.php");
	
	//include 'controller/controller_questions.php';
	//echo $_GET;
	//var_dump( $_GET);
	
	if (!empty($_GET)){
		if ($_GET['contr'] == 'ques'){ //nav=exit
			$question = new ControllerQuestions();
			$question -> checkQustions ();
		} else if ($_GET['contr'] == 'adm'){
			$admin = new ControllerAdmin();
			$admin -> checkInfoAndShow ();
		}
	} else {
		$question = new ControllerQuestions();
		$question -> checkQustions ();
	}
	
	

	