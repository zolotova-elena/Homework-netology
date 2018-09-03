<?
	//класс машин
	class Car {
		private $model;
		private $year;
		private $color;
	    function __construct($model, $year, $color) {
			$this->model = $model;
			$this->year = $year;
			$this->color = $color;
		}
		public function carStart (){
			echo "Машина $this->model, поехала!";
		}
		public function carStop (){
			echo "Машина $this->model, остановилась!";
		}
		public function getCarDescription (){
			return "Модель: ".$this->model."; Год: ".$this->year."; Цвет: ".$this->color;
		}
	}
	
	//класс машин
	class TV {
		private $model;
		private $size;
		public function __construct($model, $size) {
			$this->model = $model;
			$this->size = $size;
		}
		public function getTvDescription (){
			echo "Телевизор: $this->model; Размер: $this->size!";
		}
		public function tvOn (){
			echo "Телевизор $this->model, включет!";
		}
		public function tvOff (){
			echo "Телевизор $this->model, выключен!";
		}
	}
	
	//класс шариковых ручек
	class Pen {
		private $model;
		private $color;
		public function __construct($model, $color) {
			$this->model = $model;
			$this->color = $color;
		}
		public function getPenDescription (){
			echo "Ручка: $this->model; Размер: $this->color!";
		}
	}
	
	//класс уток
	class Duck {
		private $name;
		private $year;
		private $gender;
		public function __construct($name, $year, $gender) {
			$this->name = $name;
			$this->year = $year;
			$this->gender = $gender;
		}
		public function getInfoAboutDuck (){
			return "Имя утки: $this->name; Возраст: $this->year; Пол: $this->gender!";
		}
		public function duckSey (){
			echo "Кря Кря!";
		}
	}
	//класс товаров
	class Product {
		private $name;
		private $type;
		private $cost;
		private $discount;
		public function __construct($name, $type, $cost, $discount) {
			$this->name = $name;
			$this->type = $type;
			$this->cost = $cost;
			$this->discount = $discount;
		}
		public function getCost (){
			$cst = $this->cost - ($this->discount*$this->cost)/100;
			return "Цена со скидкой: $cst";
		}
		public function getInfoAboutDuck (){
			return "Название товара: $this->name; Тип: $this->type;  Скидка составляет: $this->discount%!";
		}
	}
	
	
	$bmv = new Car("BMV 7", 2017, "Red");
	$d = $bmv->getCarDescription();
	echo $d."<br/>";
	$bmv->carStart();
	$bmv->carStop();
	echo "<br>";
	$teapot1 = new Product("BORK 745498", "чайник", 1000, 30);
	$d1 = $teapot1->getInfoAboutDuck();
	echo $d1."<br/>";
	$teapot1->getCost();
	
?>