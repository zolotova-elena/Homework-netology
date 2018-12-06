<?php 
	namespace Model;
	//require_once  '../vendor/autoload.php';
	class ModelQuestions 
	{
		private $pdo;

		function __construct($pdo) {
			$this->pdo = $pdo;
		}

		public 	function getAllTopicNames () {
					//$pdo = getDB ();
					$sql = $this->pdo->prepare("SELECT topic_name, id FROM topic");
					$sql->execute();
					$allUsers = $sql-> fetchAll();

					return $allUsers;
		}

		public	function getAllQues ($topics){
				//$pdo = getDB ();
				$result = [];
				
				for ($i = 0; $i < count($topics); $i++){
					$questions = Array();
					$sql = $this->pdo->prepare("SELECT * FROM questions WHERE id_topic=".$topics[$i]['id']." AND 	status = 'show'");
					$sql->execute();
					$questions = $sql-> fetchAll();
					if (count($questions) > 0){
						//array_push($result, array( $topNames[$i]['topic_name'] ->  $questions) );
						$result[ $topics[$i]['topic_name'] ] = $questions;
					}
					
					
				}
				return $result;
		}

		public function getAllQuesForShowInAdminPanel ($topics){
			$result = array();
			for ($i = 0; $i < count($topics); $i++){
				$questions = Array();
				$sql = $this->pdo->prepare("SELECT * FROM questions WHERE id_topic=".$topics[$i]['id']);
				$sql->execute();
				$questions = $sql-> fetchAll();
				$array = array(
						"id" => $topics[$i]['id'],
						"topic_name" => $topics[$i]['name'],
						"allCount" => $topics[$i]['allCount'],
						"allWait" => $topics[$i]['allWait'],
						"allShow" => $topics[$i]['allShow'],
						"questions" =>$questions
					);
				array_push($result, $array);
				/*
				if (count($questions) > 0){
					//array_push($result, array( $topNames[$i]['topic_name'] ->  $questions) );
					$result[ $topics[$i]['topic_name'] ] = $questions;
				}	*/
			}
			return $result;
		}

		public function getAllQuesWAnth() {
			$sql = $this->pdo->prepare("SELECT * FROM questions WHERE answer = '' ORDER BY question_dateCreate DESC" );// ASC  DESC
			$sql->execute();
			$dataQuestions = $sql-> fetchAll();
			return $dataQuestions;
		}

		public function insertQues ($authorName, $authorEmail, $quesTopic, $textQues){
			$sql = $this->pdo->prepare("INSERT INTO questions (question, status, question_authorName, question_authorEmail, id_topic) VALUES ('".$textQues."', 'wait', '".$authorName."', '".$authorEmail."', ".$quesTopic.")");  
			$sql->execute();
		}

		public function updQues ($quesId, $newQues){
			$sql = $this->pdo->prepare("UPDATE questions SET question ='".$newQues."' WHERE id =".$quesId);
			$sql->execute();
		}

		public function updAuthor ($quesId, $newAuthor){
			$sql = $this->pdo->prepare("UPDATE questions SET question_authorName ='".$newAuthor."' WHERE id =".$quesId);
			$sql->execute();
		}

		public function updTopic ($quesId, $newTopic){
			$sql = $this->pdo->prepare("UPDATE questions SET id_topic='".$newTopic."' WHERE id =".$quesId);
			$sql->execute();
		}

		public function updAnswer ($quesId, $newAns){
			$sql = $this->pdo->prepare("UPDATE questions SET answer='".$newAns."' WHERE id =".$quesId);
			$sql->execute();
		}

		public function updStatus ($quesId, $status){
			$sql = $this->pdo->prepare("UPDATE questions SET status='".$status."' WHERE id =".$quesId);
			$sql->execute();
		}

		public function deleteQuesWithTopic ($topicId){
			$sql = $this->pdo->prepare("DELETE FROM questions WHERE id_topic =".$topicId);
			$sql->execute();
		}

		public function delQues ($quesId){
			$sql = $this->pdo->prepare("DELETE FROM questions WHERE id =".$quesId);
			$sql->execute();
		}

	}
