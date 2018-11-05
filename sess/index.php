<?php
    require_once'functions.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (login($_POST['login'], $_POST['pass'])){
            header('Location: list.php');
            die;
            }
        if (!empty($_POST['name'])) {
            $_SESSION['name'] = $_POST['name'];
            header('Location: list.php');
            die;
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
        <h2>Если вы гость - введите Ваше имя</h2>

        <input name="name" id="name" placeholder="Ваше имя"> 
        <br>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      </form>
    </div> 
  </body>
</html>