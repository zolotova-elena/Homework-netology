<?php
  require_once'functions.php';


  $error = array();
  if(!empty($_POST)) {
    if (login($_POST['login'], $_POST['pass'])){
      header('Location: list.php');
        die;
    } else {
        $errors[] = 'Неверный логин или пароль'; 
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <ul>
        <? /*foreach ($errors as $error){ ?>
          <li> <?= $error;?> </li>
        <? }*/?> 
      </ul>
      <form class="form-signin" role="form" method="POST">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name="login" class="form-control" placeholder="login" >
        <br>
        <br>
        <input type="text" name="pass" class="form-control" placeholder="Password" >
        <br>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> 
  </body>
</html>