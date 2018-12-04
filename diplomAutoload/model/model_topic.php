<?php 
	class Model_topic{
		private $pdo;

		function __construct($pdo) {
			$this->pdo = $pdo;
		}

		public function getTopics (){
			$sql = $this->pdo->prepare("SELECT id, topic_name FROM topic");
			$sql->execute();
			$topics = $sql-> fetchAll();
			return $topics; 
		}

		public function getTopicsForShow(){
			$sql = $this->pdo->prepare("SELECT topic.id, topic_name, COUNT(question) AS allCountQues, COUNT(status='wait') AS allQuesWait, COUNT(answer IS null) AS allQuesWA FROM topic,questions WHERE topic.id = questions.id_topic");
			$sql->execute();
			$topics = $sql-> fetchAll();
			//r($topics);
			return $topics; 
		} 

		public function createTopic ($newTopicName){
			$sql = $this->pdo->prepare("INSERT INTO topic (topic_name) VALUES ('".$newTopicName."')");
			$sql->execute();
			return $sql; 
		}

		public function deleteTopic ($topicId){
			$sql = $this->pdo->prepare("DELETE FROM topic WHERE id =".$topicId);
			$sql->execute();
			return $sql; 
		}

		public function getCountTopics (){
			//$getAllCountQuesByTopic = 'getAllCountQuesByTopic';
			$allCount = $this->getAllCountQuesByTopic ();
			
			//$getAllWaitQuesByTopic = 'getAllWaitQuesByTopic';
			$allWait = $this->getAllWaitQuesByTopic ();

			$getAllShowByTopic = 'getAllShowByTopic';
			$allShow = $this->getAllShowByTopic ();

			$result;
			for ($i = 0; $i < count($allCount); $i++){
				$newStr = array (
					"id"       => $allCount[$i]['id'],
					"name"     => $allCount[$i]['topic_name'],
					"allCount" => $allCount[$i]['allCountQues'],
					"allWait"  => 0,
					"allShow"  => 0
 				);

 				for ($j = 0; $j < count($allWait); $j++){
 					if ($newStr['id'] == $allWait[$j]['id']){
 						$newStr["allWait"] = $allWait[$j]['allCountQues'];
 					}

 				}
 				for ($k = 0; $k < count($allShow); $k++){
 					if ($newStr['id'] == $allShow[$k]['id']){
 						$newStr["allShow"] = $allShow[$k]['allCountQues'];
 					}
 				}
 				
 				$result[$i] = $newStr;
			}
			return $result;
		}

		private function getAllCountQuesByTopic (){
			$sql = $this->pdo->prepare("SELECT topic.id, topic.topic_name, COUNT(questions.id) AS allCountQues FROM topic LEFT JOIN questions ON topic.id = questions.id_topic GROUP BY topic.id, topic.topic_name");
			$sql->execute();
			$counts = $sql-> fetchAll();
			return $counts;
		}

		private function getAllWaitQuesByTopic (){
			$sql = $this->pdo->prepare("SELECT topic.id, COUNT(questions.id) AS allCountQues FROM topic LEFT JOIN questions ON topic.id = questions.id_topic WHERE questions.status = 'wait' GROUP BY topic.id, topic.topic_name");
			$sql->execute();
			$counts = $sql-> fetchAll();
			return $counts;
		}

		private function getAllShowByTopic (){
			$sql = $this->pdo->prepare("SELECT topic.id, COUNT(questions.id) AS allCountQues FROM topic LEFT JOIN questions ON topic.id = questions.id_topic WHERE questions.status = 'show' GROUP BY topic.id, topic.topic_name");
			$sql->execute();
			$counts = $sql-> fetchAll();
			return $counts;
		}
	}

	//SELECT topic_name, COUNT(question), COUNT(status='wait'), COUNT(answer IS null) FROM topic,questions WHERE topic.id=questions.id_topic