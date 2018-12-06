<?php
	namespace Controller;
	//require_once  '../vendor/autoload.php';
	

	//$admin = new ControllerAdmin();
	//$admin -> checkInfoAndShow ();

	class ControllerAdmin {

		private function getDB (){
			$pdo = new PDO("mysql:host=localhost;dbname=diplom-php1;charset=utf8", "root", "", [
			  	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true
			]);
			return $pdo;
		}

		private function checkUser ($admins, $log, $pass){
			for ($i = 0; $i < count($admins); $i++){
				$user = $admins[$i];
				if ( $log == $user['login'] and md5($pass) == $user['password'] ) {
					return $user['id'];
				}
			}

			return null;
		}

		public function checkInfoAndShow (){

			if (empty($_SESSION['u_id'])){

				if (!empty($_POST['username']) and !empty($_POST['password'])) {
					$log  = $_POST['username'];
					$pass = $_POST['password'];

					//include '../model/model_admins.php';

					$admin = new ModelAdmins($this->getDB ());
					$allAdmins = $admin -> getUsers();
					$isAdmin = $this->checkUser ($allAdmins, $log, $pass); //идентификатор пользователя

					if (!empty($isAdmin)){
						$_SESSION['u_id'] = $isAdmin; 
						include 'view/view_admins.php';
					} else {
						echo 'Ошибка авторизации';
					}
				}
			} else {
				//Пользователь активен
				//Часть для взаимодействия с таблицей users
				if ($_GET['nav'] == 'admins'){
					$result = '';
					//include '../model/model_admins.php';
					$admin = new ModelAdmins($this->getDB ());
					if (!empty($_POST['action'])){
						$action = $_POST['action'];
						if ($action == 'createAdmin'){
							if (!empty($_POST['newLog']) and !empty($_POST['newPass'])){
								$newAdmin = $admin -> createAdmin($_POST['newLog'], $_POST['newPass']);
								$result = 'Новый пользователь '.$_POST['newLog'];
							} else {
								$result = 'Не корректные данные';
							}

						} else if($action == 'changeAdminPass'){
							if (!empty($_POST['idAdmin']) and !empty($_POST['newPass'])){
								$updAdmin = $admin -> updateAdmin ($_POST['idAdmin'], $_POST['newPass']);
								$result = 'Пароль обновлен';
							} else {
								$result = 'Не корректные данные';
							}

						} else if($action == 'deleteAdmin'){
							if (!empty($_POST['idAdmin'])){
								$delAdmin = $admin -> deleteAdmin($_POST['idAdmin']);
								$result = 'Удалено';
							}
						}
					}

					$loginsAndIds = $admin -> getAllLoginsAndIds();
					include 'view/view_admins.php';

				} else if ($_GET['nav'] == 'topic'){
					$result = '';
					//include '../model/model_topic.php';
					$topic = new ModelTopic($this->getDB ()); //getTopics()
					//include '../model/model_questions.php';
					$questions = new ModelQuestions($this->getDB ());

					if (!empty($_POST['action'])){
						$action = $_POST['action'];
						if ($action == 'createTopic'){
							if (!empty($_POST['newTopicName'])){
								$newTopic = $topic -> createTopic($_POST['newTopicName']);
								$result = 'Новая тема создана';
							} else {
								$result = 'Название не было введено';
							}
						} else if ($action == 'deleteTopic'){
							if (!empty($_POST['topicId'])){
								//удалить еще и вопросы
								$delTopic = $topic -> deleteTopic($_POST['topicId']);
								$ques = $questions -> deleteQuesWithTopic ($_POST['topicId']);
								$result = 'Тема удалена';
							} else {
								$result = 'Ошибка удаления';
							}
						} else if ($action == 'changQues'){
							if (!empty($_POST['quesId']) and !empty($_POST['newQues']) ){
								$quesId = $_POST['quesId'];
								$newQues = $_POST['newQues'];
								$ques = $questions -> updQues ($quesId, $newQues);
								$result = 'Вопрос обновлен'; 
							}
						} else if($action =='changeStatus'){
							if (!empty($_POST['quesId']) and !empty($_POST['newStatus']) ){
								$quesId = $_POST['quesId'];
								$newStatus = $_POST['newStatus'];
								$ques = $questions -> updStatus ($quesId, $newStatus);
								$result = 'Статус обновлен'; 
							}

						} else if ($action =='changAuthor'){
							if (!empty($_POST['quesId']) and !empty($_POST['newAuthor']) ){
								$quesId = $_POST['quesId'];
								$newAuthor = $_POST['newAuthor'];
								$ques = $questions -> updAuthor ($quesId, $newAuthor);
								$result = 'Автор обновлен'; 
							}
						} else if($action =='changAnswer'){
							if (!empty($_POST['quesId']) and !empty($_POST['newAns']) ){
								$quesId = $_POST['quesId'];
								$newAns = $_POST['newAns'];
								$ques = $questions -> updAnswer ($quesId, $newAns);
								if ($_POST['viewQues'] == 'on'){
									$ques = $questions -> updStatus ($quesId, 'show');
								}
								$result = 'Ответ обновлен'; 
							}
						} else if($action =='changTopic'){
							if(!empty($_POST['quesId']) and !empty($_POST['thisTopic']) ){
								$quesId = $_POST['quesId'];
								$thisTopic = $_POST['thisTopic'];
								$ques = $questions -> updAnswer ($quesId, $thisTopic);
								$result = 'Тема изменена'; 
							}

						} else if ($action =='deleteQues'){
							if (!empty($_POST['quesId']) ){
								$quesId = $_POST['quesId'];
								$ques = $questions -> delQues ($quesId);
								$result = 'Вопрос удален'; 
							}
						}
					}

					$topics = $topic -> getCountTopics();
					$topics = $questions -> getAllQuesForShowInAdminPanel ($topics);
					include 'view/view_topics.php';

				} else if ($_GET['nav'] == 'questions'){
					//include '../model/model_questions.php';
					$questions = new ModelQuestions($this->getDB ());

					if (!empty($_POST['action'])){
						if ($_POST['action'] == 'updQues'){
							if(!empty($_POST['topicId']) and !empty($_POST['newQues'])){
								$quesId = $_POST['topicId'];
								$newQues = $_POST['newQues'];
								$upd = $questions -> updQues ($quesId, $newQues);
								$result = "Вопрос обновлен";
							}else {
								$result = 'Данные неккоректны';
							}
						} else if ($_POST['action'] == 'deleteQues'){
							if(!empty($_POST['topicId'])){
								$quesId = $_POST['topicId'];
								$del = $questions -> delQues ($quesId);
								$result = "Вопрос удален";
							}
						}
					}

					$allQues = $questions ->  getAllQuesWAnth();
					include 'view/view_questions.php';

				} else if ($_GET['nav'] == 'exit'){
						//r($_GET['nav'] );
						session_destroy(); 
						include 'index.php';

						//header("Location: ../index.php");
				} else {
					include 'view/view_adminsMenu.php';
					//header("Location: ../view/view_adminsMenu.php");
				}
			}

		}

	}



	


