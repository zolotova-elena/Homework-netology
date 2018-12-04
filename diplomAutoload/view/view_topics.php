<!--<!DOCTYPE html>-->
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Панель администратора</title>
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
</head>
<body>
	<h3 id="adminTitle">Добро пожаловать в панель администратора!</h3>
	<table class="table">
	  	<thead>
	    	<tr >
		      	<th width=20%>Навигация</th>
		      	<th width=80%></th>
	    	</tr>
	  	</thead>
	  	<tbody>
	    <tr>
	      	<td> <a href="?nav=admins">Администраторы</a> </td>
	      	<td rowspan="3" id="navResult">

	      		<div style="margin-bottom: 10px;">
	      		<form method='POST' action='controller_admin.php?nav=topic'>
	      			<input type='text' name='action' hidden value='createTopic' >
					<input type='text' name='newTopicName' value='' placeholder="Название темы">
					<input type='submit' value='Создать тему'>
				</form>
	      		</div>


	      			<?php 
	      				for ($i = 0; $i < count($topics); $i++ ){
	      					$thisTopic = $topics[$i]['id'];
	      					echo '<div style="border: 1px solid red; margin-bottom: 10px;">
	      						<table class="table">
							  	<thead>
							    	<tr >
								      	<th width=20%>Название</th>
								      	<th width=20%>Всего вопросов</th>
								      	<th width=20%>Опубликовано</th>
								      	<th width=20%>Без ответа</th>
								      	<th width=20%>Удалить</th>
							    	</tr>
							  	</thead>
							  	<tbody>';
	      					echo '<tr>
	      							  <td>'.$topics[$i]['topic_name'].'</td>
	      							  <td>'.$topics[$i]['allCount'].'</td>
	      							  <td>'.$topics[$i]['allShow'].'</td>
	      							  <td>'.$topics[$i]['allWait'].'</td>
	      							  <td>'.
	      							  	"<form method='POST' action='controller_admin.php?nav=topic'>
	      									<input type='text' name='topicId' hidden value='".$topics[$i]['id']."'>
	      									<input type='text' name='action' hidden value='deleteTopic'>
											<input type='submit'value='Удалить тему'>
    									</form>".'</td>
	      						  </tr>';
	      						echo '</tbody>
							</table>';
	      					$questionsByTopic = $topics[$i]['questions'];
	      					$selectTopic ='<select name="thisTopic">';
	      					for ($k = 0; $k < count($topics); $k++){
	      						if ($thisTopic == $topics[$k]['id']){
	      							$selectTopic = $selectTopic.' <option selected="selected" value="'.$topics[$k]['id'].'">'.$topics[$k]['topic_name'].'</option>';
	      						} else {
	      							$selectTopic = $selectTopic.' <option value="'.$topics[$k]['id'].'">'.$topics[$k]['topic_name'].'</option>';
	      						}
	      					}	
	      					$selectTopic = $selectTopic.' </select>';  
	      					if (count($questionsByTopic) != 0)  {

	      						echo '<table class="table" style="border: 1px solid black;">
									  	<thead>
									    	<tr >
										      	<th width=12.5%>Вопрос</th>
										      	<th width=12.5%>Дата создания</th>
										      	<th width=12.5%>Изменить статус</th>
										      	<th width=12.5%>Автор</th>
										      	<th width=12.5%>Ответ</th>
										      	<th width=12.5%>Изменить тему</th>
										      	<th width=12.5%>Удалить</th>
									    	</tr>
									  	</thead>
									  	<tbody>';

	      						for ($j = 0; $j < count($questionsByTopic); $j++ ){
	      							$status = '';

	      							if ($questionsByTopic[$j]['status'] == 'wait'){
	      								$status = $questionsByTopic[$j]['status'];
	      							} else if ($questionsByTopic[$j]['status'] == 'block') {
	      								$status = "<form method='POST' action='controller_admin.php?nav=topic'>
		      							  			<input type='text' name='quesId' hidden value='".$questionsByTopic[$j]['id']."'> 
		      							  			<input type='text' name='action' hidden value='changeStatus'>  
		      							  			".'<select name="newStatus">
	      											<option selected="selected value="block">Скрыть</option>
	      											<option value="show">Показать</option>
	      										  </select>'."
		      							  			<input type='submit'value='Изменить статус'>
	      							  			</form>";
	      							} else if ($questionsByTopic[$j]['status'] == 'show'){
	      								$status = "<form method='POST' action='controller_admin.php?nav=topic'>
		      							  			<input type='text' name='quesId' hidden value='".$questionsByTopic[$j]['id']."'> 
		      							  			<input type='text' name='action' hidden value='changeStatus'>  
		      							  			".'<select name="newStatus">
	      											<option value="block">Скрыть</option>
	      											<option selected="selected value="show">Показать</option>
	      										  </select>'."
		      							  			<input type='submit'value='Изменить статус'>
	      							  			</form>";
	      							}

	      							echo   '<tr><td>'.
	      										"<form method='POST' action='controller_admin.php?nav=topic'>
		      							  			<input type='text' name='quesId' hidden value='".$questionsByTopic[$j]['id']."'> 
		      							  			<input type='text' name='action' hidden value='changQues'>  
		      							  			<textarea name='newQues'>".$questionsByTopic[$j]['question']."</textarea>
		      							  			<input type='submit'value='Обновить вопрос'>
	      							  			</form>"
	      								  .'</td>
	      									<td>'.$questionsByTopic[$j]['question_dateCreate'].'</td>
	      									<td>'.
	      										$status
	      									.'</td>
	      									<td>'.
	      										"<form method='POST' action='controller_admin.php?nav=topic'>
		      							  			<input type='text' name='quesId' hidden value='".$questionsByTopic[$j]['id']."'> 
		      							  			<input type='text' name='action' hidden value='changAuthor'>  
		      							  			<input type='text' name='newAuthor' value='".$questionsByTopic[$j]['question_authorName']."'> 
		      							  	
		      							  			<input type='submit'value='Изменить автора'>
	      							  			</form>"
	      									.'</td>
	      									<td>'.
	      										"<form method='POST' action='controller_admin.php?nav=topic'>
		      							  			<input type='text' name='quesId' hidden value='".$questionsByTopic[$j]['id']."'> 
		      							  			<input type='text' name='action' hidden value='changAnswer'>  
		      							  			<textarea name='newAns'>".$questionsByTopic[$j]['answer']."</textarea>
		      							  			<div>
		      							  				<label for='viewQues'>Опубликовать:</label>
		      							  				<input type='checkBox' name='viewQues' id='viewQues'>
		      							  			</div>
		      							  			<input type='submit'value='Изменить ответ'>
	      							  			</form>"
	      									.'</td>
	      									<td>'.
	      										"<form method='POST' action='controller_admin.php?nav=topic'>
	      										<input type='text' name='quesId' hidden value='".$questionsByTopic[$j]['id']."'>
	      										<input type='text' name='action' hidden value='changTopic'>".$selectTopic."
												<input type='submit'value='Изменить тему'>
    											</form>"
	      									.'</td>
	      									<td>'.
	      										"<form method='POST' action='controller_admin.php?nav=topic'>
	      										<input type='text' name='quesId' hidden value='".$questionsByTopic[$j]['id']."'>
	      										<input type='text' name='action' hidden value='deleteQues'>
												<input type='submit'value='Удалить вопрос'>
    											</form>"
	      									.'</td></tr>';
	      						}
	      						echo 	'</tbody>
									</table>';
	      					}
	      					echo '</div>';
	      				}
	      			?>
	

	      	</td>
	    </tr>
	    <tr>
	      	<td> <a href="?nav=topic">Темы</a> </td>
	    </tr>
	    <tr>
	      	<td> <a href="?nav=questions">Вопросы</a> </td>
	    </tr>

	  </tbody>
	</table>
	
	<div>
		<h3 style='text-align: center;'><?=$result?></h3>
	</div>

	<br>
	<div>
		<a href="?nav=exit">Выйти</a>
	</div>

</body>
</html>