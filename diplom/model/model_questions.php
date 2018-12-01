<?php 
	class Model_questions {
		public 	function getAllTopicNames () {
					$pdo = getDB ();
					$sql = $pdo->prepare("SELECT topic_name, id FROM topic");
					$sql->execute();
					$allUsers = $sql-> fetchAll();

					return $allUsers;
		}

		public	function getAllQues (){
				$pdo = getDB ();
				$result;
				$name = 'getAllTopicNames';
				$topNames = $this->$name();//getAllTopicNames ();
				
				for ($i = 0; $i < count($topNames); $i++){
					$questions = Array();
					$sql = $pdo->prepare("SELECT * FROM questions WHERE id_topic=".$topNames[$i]['id']);
					//r($sql);
					$sql->execute();
					$questions = $sql-> fetchAll();
					$result[ $topNames[$i]['topic_name'] ] = $questions;
					
				}
				return $result;
		}

		public function getAllQuestions() {
			$sql = $pdo->prepare("SELECT * FROM questions");
			$sql->execute();
			$dataQuestions = $sql-> fetchAll();
			return $dataQuestions;
		}
	}
