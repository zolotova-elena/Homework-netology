<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
	<title>Вопросы</title>
</head>
<body>
<div style="vertical-align: top; text-align: right; cursor: pointer;"> 
	<a href="index.php?act=showForm&contr=ques"> <span class="glyphicon glyphicon-send"></span></a> 
	<a href="view/login.html"> <span class="glyphicon glyphicon-user"></span></a> 
</div>


<header>
	<h1>Вопросы</h1>
</header>
<section class="cd-faq">
	<ul class="cd-faq-categories">
		<?php
		$i = 0;
		foreach ($allQues as $tName => $ques) {  
			if ($i == 0){
				echo '<li><a class="selected" href="#'.$tName.'">'.$tName.'</a></li>';
			} else {
				echo '<li><a href="#'.$tName.'">'.$tName.'</a></li>';
			}
			
			$i++;
		}
		?>
	</ul> <!-- cd-faq-categories -->

	<div class="cd-faq-items">
		
		<?php
			//var_dump($allQues);
			
			foreach ($allQues as $tName => $ques) {  //$a as $k => $
				echo '<ul id="'.$tName.'" class="cd-faq-group">';
			
				echo "<li class='cd-faq-title'><h2>$tName</h2></li>";
				
				for ($j = 0; $j < count($ques); $j++){
					$q = $ques[$j];
					//var_dump($q['question']);
					
					echo "<li>
							<a class='cd-faq-trigger' href='#0'>".$q['question']."</a>
							<div class='cd-faq-content'>
								<p>".$q['answer']."</p>
							</div>
						</li>";
				}
				
			}
			echo '</ul> ';
		?>	
		
	</div> 
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>