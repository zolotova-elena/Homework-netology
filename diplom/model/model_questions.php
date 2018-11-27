<?php 
	class Questions {
		public function getAllQuestions() {
			$pdo = getDB ();
			$sql = $pdo->prepare("SELECT * FROM questions");
			$sql->execute();
			$dataQuestions = $sql-> fetchAll();
			return $dataQuestions;
		}
	}
	
	$dataQuestions = new Questions();
	$dataArrayQuestions = $dataQuestions -> getAllQuestions();
