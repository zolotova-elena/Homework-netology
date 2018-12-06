<?php
	namespace Controller;
	//require_once  '../vendor/autoload.php';

	

	//$question = new ControllerQuestions();
	//$question -> checkQustions ();
	
	class ControllerQuestions {
		private function getDB (){
			$pdo = new PDO("mysql:host=localhost;dbname=diplom-php1;charset=utf8", "root", "", [
			  	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true
			]);
			return $pdo;
		}

		public function checkQustions (){

			if (!empty($_POST)){
				$result = '';
				if (!empty($_POST['authorName']) and !empty($_POST['authorEmail']) and !empty($_POST['quesTopic']) and !empty($_POST['textQues']) and !empty($_POST['isSend']) ){

					$authorName  = $_POST['authorName'];
					$authorEmail = $_POST['authorEmail'];
					$quesTopic   = $_POST['quesTopic'];
					$textQues    = $_POST['textQues'];

					//include '../model/model_questions.php';

					$dataQuestions = new ModelQuestions($this->getDB ());
					//r(date('d'));
					$saveQues = $dataQuestions -> insertQues($authorName, $authorEmail, $quesTopic, $textQues);
					$result = 'Вы успешно отправили вопрос';
					//include '../model/model_topic.php';
					$dataTopic = new ModelTopic($this->getDB ());
					$topics = $dataTopic -> getTopics();
					include 'view/view_quesForm.php';

				} else {
					$result = 'Ошибка в данных';
					//include '../model/model_topic.php';
					$dataTopic = new ModelTopic($this->getDB ());
					$topics = $dataTopic -> getTopics();
					include 'view/view_quesForm.php';
				}
			} else {

				if (!empty($_GET)){
					if ($_GET['act'] == 'showForm'){
						$result = '';
						//include '../model/model_topic.php';
						$dataTopic = new ModelTopic($this->getDB ());
						$topics = $dataTopic -> getTopics();
						include 'view/view_quesForm.php';
					}
				} else {
					//include 'model/model_topic.php';
					$dataTopic = new ModelTopic($this->getDB ());
					$topics = $dataTopic -> getTopics();
					//include 'model/model_questions.php';
					$dataQuestions = new ModelQuestions($this->getDB ());
					$allQues = $dataQuestions -> getAllQues($topics);
					include 'mainIndex.php';
				}
			}

		}
	}
	

	