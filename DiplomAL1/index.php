<?php
	//namespace DiplomAutoload\Controller;
	require_once __DIR__.' /vendor/autoload.php';
	session_start();
	//header("Location: Controller/ControllerQuestions.php");
	
	//include 'controller/controller_questions.php';
	//echo $_GET;
	//var_dump( $_GET);
	$question = new ControllerQuestions();
	$question -> checkQustions ();

	$admin = new ControllerAdmin();
	$admin -> checkInfoAndShow ();