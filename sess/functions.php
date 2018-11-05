<?php
	session_start();

	function login($login, $password){
		$user = getUser($login);
		//var_dump($user);

		if($user && $user['pass'] == $password){
			$_SESSION['user'] = $user;
			return true;
		}
		return false;
	}

	function getUsers(){

		$userData = file_get_contents('admin.json');
		$users = json_decode($userData, true);
		//var_dump($users);
		if (empty($users)){
			return [];
		}
		return $users;
	}

	function getUser($login){
		$filename = $login.'.json';

		if (file_exists($filename)) {
			$userData = file_get_contents($filename);
			$user = json_decode($userData, true);
			//var_dump($login == $user[0]['login']);
			if ($login == $user[0]['login']){
				return $user[0];
			} 
			
		} else {
		    return null;
		}
	}

	function isAuthrized(){
		return  checkAuthriz() !== null;
	}

	function checkAuthriz()
	{
	    if (empty($_SESSION)) {
	        return null;
	    }
	    return $_SESSION;
	}


	function getAuthrizedUser(){
		//var_dump($_SESSION['user']);
		return $_SESSION['user'];
	}

	function logout(){
		session_destroy();
	}

	function getParam($name){
    	return filter_input(INPUT_POST, $name);
	}

	function location($path)
	{
	    header("Location: $path.php");
	    die;
	}

?>