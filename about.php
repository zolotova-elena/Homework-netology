<?php
$name = 'Елена';
$age = 21;
$email = 'prog@watchit.ru';
$city = 'Ростов-на-Дону';
$about = 'инженер-программист';
?>
<!DOCTYPE>
<html lang="ru">
    <head>
        <title><?= $name . ' – ' . $about ?></title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <style>
            body {
                font-family: 'Playfair Display', serif;  
            }
            td {
            	border: 1px solid black;
            	width: 220px;
            	font-size: 18px;
            }
        </style>
    </head>
    <body>
        <h1>Страница пользователя <u><?= $name ?></u></h1>
		<table>
			<tr>
				<td>Имя:</td>
				<td><?= $name ?></td>
			</tr>
			<tr>
				<td>Возраст:</td>
				<td><?= $age ?></td>
			</tr>
			<tr>
				<td>Адрес электронной почты:</td>
				<td><a href="mailto:<?= $email ?>"><?= $email ?></a></td>
			</tr>
			<tr>
				<td>Город:</td>
				<td><?= $city ?></td>
			</tr>
			<tr>
				<td>О себе:</td>
				<td><?= $about ?></td>
			</tr>
		</table>
    </body>
</html>