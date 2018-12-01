<?php
	require_once('../ref/ref.php');
	session_start();

	function getDB (){
		$pdo = new PDO("mysql:host=localhost;dbname=diplom-php1;charset=utf8", "root", "", [
		  	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true
		]);
		return $pdo;
	}

	//$pdo = getDB ();

	function checkUser ($admins, $log, $pass){
		for ($i = 0; $i < count($admins); $i++){
			$user = $admins[$i];
			if ( $log == $user['login'] and md5($pass) == $user['password'] ) {
				return $user['id'];
			}
		}

		return null;
	}
	//r($_SESSION['u_id']);
	if (empty($_SESSION['u_id'])){

		if (!empty($_POST['username']) and !empty($_POST['password'])) {
			$log  = $_POST['username'];
			$pass = $_POST['password'];

			include '../model/model_admins.php';

			$admin = new Model_admins(getDB ());
			$allAdmins = $admin -> getUsers();
			//r($isAdmin);
			$isAdmin = checkUser ($allAdmins, $log, $pass); //идентификатор пользователя

			//r($isAdmin);

			if (!empty($isAdmin)){
				$_SESSION['u_id'] = $isAdmin; 
				header("Location: ../view/view_adminsMenu.php");
			} else {
				echo 'Ошибка авторизации';
			}
		}
	} else {
		
		//Пользователь активен
		r($_GET['nav']);
		//Часть для взаимодействия с таблицей users
		if ($_GET['nav'] == 'admins'){
			//r('gdrgrth');
			$result = '';
			include '../model/model_admins.php';
			$admin = new Model_admins(getDB ());
			//r($_POST['action']);
			if (!empty($_POST['action'])){
				//r($_POST['action']);
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
			include '../view/view_admins.php';

		} else if ($_GET['nav'] == 'topic'){
			//r('тут');
			$result = '';
			include '../model/model_topic.php';
			$topic = new Model_topic(getDB ()); //getTopics()

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
						$delTopic = $topic -> deleteTopic($_POST['topicId']);
						$result = 'Тема удалена';
					} else {
						$result = 'Ошибка удаления';
					}
				}
			}


			$topics = $topic -> getTopics();
			include '../view/view_topics.php';

		} else if ($_GET['nav'] == 'questions'){

		} else {
			header("Location: ../view/view_adminsMenu.php");
		}
	}


