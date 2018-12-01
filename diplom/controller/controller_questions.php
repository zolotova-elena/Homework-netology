<?php
	if (empty($_POST)){
		$actions = 'mainShow';
		include 'model/model_questions.php';
		$dataQuestions = new Model_questions();
		$allQues = $dataQuestions -> getAllQues();
		include 'mainIndex.php';
	} else {

	}
