<?php
    //header('Content-Type: text/html; charset= utf-8'); 
    error_reporting(E_ALL);
    ini_set("display_error", true);
    ini_set("error_reporting", E_ALL);

    session_start();
    function getPDO(){
        //$pdo = new PDO("mysql:host=localhost;dbname=ezolotova;charset=utf8", "ezolotova", "neto1812", [
        $pdo = new PDO("mysql:host=localhost;dbname=TBL;charset=utf8", "root", "", [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true
        ]);
        /*$sql = "CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `assigned_user_id` int(11) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $pdo->exec($sql);
    $sql = " CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";*/
    //$pdo->exec($sql);
        //$pdo->set_charset('utf8');
        return $pdo;
    }
        if ($_SERVER['REQUEST_METHOD'] == 'POST'  ) {
            if ( !empty($_POST['login']) && !empty($_POST['pass']) ){
                $login = $_POST['login'];
                $password = $_POST['pass'];
                
                if ( login($login, $password) ){
                    header('Location: main.php'); 
                    die;
                }
            }
            if ( !empty($_POST['newLogin']) && !empty($_POST['newPass']) ) {
                  $login = $_POST['newLogin'];
                  $password = $_POST['newPass'];
                 
                  if( auth($login, $password) ){
                        header('Location: main.php'); 
                        die;
                  }
            }
        }

        function login($login, $password){
            $pdo = getPDO();
            //$hashed_password = crypt($password);
            $login = $pdo->quote($login);
            $password = $pdo->quote($password);

                $sql = 'SELECT id FROM user WHERE login='.$login.' AND password='.$password;
                //var_dump($sql);
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $empty = $statement->rowCount() === 0;
                //var_dump($statement->rowCount() );
                if(!$empty){
                    foreach ($statement as $row) {
                      $_SESSION['id'] = $row['id'];
                      return true;
                    }
                } else {
                echo "</br>Неверный пароль или логин!";
                return false;
            }

        }

        function auth($newLogin, $newPassword){
            $pdo = getPDO();
            //$newLogin = $pdo->quote($newLogin);
            //$newPassword = $pdo->quote($newPassword);
            $sql = "SELECT id FROM user WHERE login='".$newLogin."'";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $empty = $statement->rowCount() === 0;
            //var_dump("INSERT INTO user(`login`, `password`) VALUES ($newLogin, $newPassword)");
            if($empty){

                //$hashed_password = crypt($newPassword);
                //var_dump($hashed_password);

                $sql1 = "INSERT INTO user(`login`, `password`) VALUES ('".$newLogin."', '".$newPassword."')";
                //var_dump($sql1);
                    $statement1 = $pdo->prepare($sql1);
                    $statement1->execute();
                    //echo "Успех";
                    if ( login($newLogin, $newPassword)){
                        return true;
                    }
                    
                    
            } 
            else {
                echo "</br>Пользователь с таким логином уже существует!";
                return false;
            }
        }
        
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
    </head>

    <body>

        <div class="container">
            <form role="form" method="POST">
                <h2>Если вы пользователь - авторизуйстесь</h2>
                <input type="text" name="login" class="form-control" placeholder="login" >
                <br>
                <br>
                <input type="text" name="pass" class="form-control" placeholder="Password" >
                <br>
                <br>

                <h2>Или зарегистрируйтесь</h2>
                <input name="newLogin" placeholder="Новый логин"> 
                <br>
                <br>
                <input name="newPass"  placeholder="Новый пароль"> 
                <br>
                <br>
                <button type="submit">Вход/регистрация</button>
            </form>
        </div> 
    </body>
</html>