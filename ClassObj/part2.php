<?
	/*Дополнительное задание*/
	class News {
		private $title;
		private $bodyOfNews;
		private $type;
		private $dataOfPost;
		public function __construct($title, $type, $bodyOfNews, $dataOfPost) {
			$this->title = $title;
			$this->type = $type;
			$this->bodyOfNews = $bodyOfNews;
			$this->dataOfPost = $dataOfPost;
		}
		public function getPost(){
			echo "<div style='border: 1px solid black; width: 500px;'>
				  <h3 style='text-align: center;'>$this->title</h3>
			      <p style='padding: 5px;'>$this->bodyOfNews<p>
				  <p style='color:blue;text-align: center;'>$this->dataOfPost /$this->type/<p></div><br>";
		}

	}
	
	
	$new1 = new News("Заголовок 1", "Спорт", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque 
	congue purus. Maecenas tincidunt elit at tellus laoreet, a dignissim nunc efficitur. Suspendisse blandit, tellus non 
	finibus rhoncus, mi elit dapibus mauris, sed pharetra nunc arcu id arcu. Integer purus orci, sagittis a pharetra id, 
	efficitur at libero. Maecenas congue arcu et ante posuere, at malesuada quam finibus. Nulla facilisi. Suspendisse 
	bibendum leo vitae dolor fringilla condimentum. Ut maximus massa quis tellus consectetur, sit amet mattis nisi tristique. 
	Mauris eget augue ut sem egestas vehicula. Suspendisse faucibus quam ac fermentum condimentum. Vestibulum pharetra elit 
	id nunc tincidunt semper. Nullam at auctor sem. Nullam interdum, dolor ut commodo dapibus, lorem leo vulputate lacus, 
	sit amet malesuada massa augue sed ipsum. Suspendisse nec orci eget massa finibus imperdiet et eu nibh. Quisque dolor 
	sapien, cursus id arcu nec, hendrerit auctor sapien. ", "3-09-2018");
	$pNew = $new1->getPost();
	$new2 = new News("Заголовок 2", "Природа", " Nulla nec varius orci. Nunc sem nulla, suscipit et gravida a, mollis id leo. 
	Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent vel urna sed dolor 
	volutpat accumsan. Etiam consectetur neque enim, eu dictum ligula pretium quis. Aliquam lacus elit, feugiat ut fermentum 
	et, porta a ligula. Mauris posuere lacus justo, quis mattis sapien eleifend eget. Vestibulum placerat faucibus lacus quis 
	ultricies. Morbi faucibus eros nulla, sed dapibus lorem pretium sed. Nullam euismod, ipsum dignissim vehicula ultricies, 
	lectus erat lobortis metus, a ultricies odio eros ac metus. Donec nulla lorem, viverra at nisl a, tempus malesuada lorem. 
	In dapibus eros vitae felis convallis pharetra. Ut elit turpis, commodo quis bibendum et, pellentesque eu dolor. Fusce 
	mattis felis vehicula ligula efficitur elementum. Nullam aliquam tortor sagittis magna venenatis, at viverra lectus 
	volutpat.\n
	Nullam id dapibus felis. Nam vulputate sem congue, suscipit est non, suscipit metus. Cras rutrum lorem consequat cursus 
	cursus. Fusce at nunc eu ex fermentum posuere. Aliquam a dictum nisi, nec rhoncus libero. Mauris metus mauris, malesuada 
	id massa ac, iaculis suscipit arcu. Suspendisse et vestibulum neque. ", "3-09-2018");
	$pNew = $new2->getPost();
?>