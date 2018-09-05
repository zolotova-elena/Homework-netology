<?
	session_start();

	function login($login, $password){
		$user = getUser($login);

		if($user && $user['pass'] == $password){
			$_SESSION['user'] = $user;
			return true;
		}
		return false;
	}

	function getUsers(){
		$userData = file_get_contents('login.json');
		$users = json_decode($userData, true);
		//var_dump($users);
		if (empty($users)){
			return [];
		}
		return $users;
	}

	function getUser($login){
		$users = getUsers();
		foreach ($users as $user){
			if ($login == $user['login']){
				return $user;
			}
			return null;
		}
	}

	function isAuthrized(){
		return !empty($_SESSION['user']);
	}

	function getAuthrizedUser(){
		var_dump($_SESSION['user']);
		return $_SESSION['user'];
	}

	function logout(){
		session_destroy();
	}
?>