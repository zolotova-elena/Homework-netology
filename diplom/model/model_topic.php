<?php 
	class Model_topic{
		private $pdo;

		function __construct($pdo) {
			$this->pdo = $pdo;
		}

		public function getTopics(){
			$sql = $this->pdo->prepare("SELECT topic.id, topic_name, COUNT(question) AS allCountQues, COUNT(status='wait') AS allQuesWait, COUNT(answer IS null) AS allQuesWA FROM topic,questions WHERE topic.id=questions.id_topic");
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
	}

	//SELECT topic_name, COUNT(question), COUNT(status='wait'), COUNT(answer IS null) FROM topic,questions WHERE topic.id=questions.id_topic