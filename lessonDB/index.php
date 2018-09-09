<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Библиотека успешного человека</h1>
        <form  method="POST">
            <input type="text" name="isbn" placeholder="isbn" value="<?php echo (isset($_POST['isbn']))?$_POST['isbn']:'';?>">
            <input type="text" name="name" placeholder="Название" value="<?php echo (isset($_POST['name']))?$_POST['name']:'';?>"> 
            <input type="text" name="author" placeholder="Автор" value="<?php echo (isset($_POST['author']))?$_POST['author']:'';?>">
            <input type="submit" value="Найти">  
        </form>

        <?php 
        
            $connection = mysqli_connect('127.0.0.1', 'root', '', '4.1'); 

            if ($connection == false)
            {
                echo "Не удалось подключиться к БД! </br>";
                echo mysqli_connect_error();
                exit();
            } 
            
            if(!empty($_POST)) {
                $isbn = $_POST['isbn'];
                $name = $_POST['name'];
                $author = $_POST['author'];
                //echo $isbn." ".$name." ".$author;
                $result = mysqli_query($connection, 'SELECT * FROM `books` WHERE LOCATE("'.$isbn.'", isbn) AND LOCATE("'.$name.'", name) AND LOCATE("'.$author.'", author)');
            } else{

                $result = mysqli_query($connection, 'select * from `books`');
            }
            
            echo '<table border="1">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>id</th>';
            echo '<th>Название</th>';
            echo '<th>Автор</th>';
            echo '<th>Год</th>';
            echo '<th>isbn</th>';
            echo '<th>Жанр</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while (($record = mysqli_fetch_assoc($result)))
            { 

                echo '<tr>';
                echo '<td>' . $record['id'] . '</td>';
                echo '<td>' . $record['name'] . '</td>';
                echo '<td>' . $record['author'] . '</td>';
                echo '<td>' . $record['year'] . '</td>';
                echo '<td>' . $record['isbn'] . '</td>';
                echo '<td>' . $record['genre'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';

            mysqli_close($connection);
        ?>
    </body>
</html>
