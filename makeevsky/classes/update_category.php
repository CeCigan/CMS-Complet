<?php
class update_category extends ACore_Admin {
	
	protected function obr() {
		
		$id = $_POST['id'];
		$title = $_POST['title'];
		
		if(empty($title) || empty($id)) {
			exit("Не заполнены обязательные поля");
		}
		
		$query = "UPDATE category SET name_category='$title' WHERE id_category='$id'";
		if(!mysqli_query($this->db,$query)) {
			exit(mysqli_connect_error());
		}
		else {
			$_SESSION['res'] = "Изменения сохранены";
			header("Location:?option=edit_category");
			exit;
		}			
	}
	
	public function get_content() {
	
		if($_GET['id_text']) {
			$id_cat= (int)$_GET['id_text'];
		}
		else {
			exit('Не удалось получить идентификатор текста');
		}
		
		$category = $this->get_text_category($id_cat);
		echo "<div id='main'>";
		if($_SESSION['res']) {
			echo $_SESSION['res'];
			unset($_SESSION['res']);
		}
		$cat = $this->get_categories();
		print <<<HEREDOC
		<form action='' method='POST'>
		<p>Заголовок меню:<br />
		<input type='text' name='title' style='width:420px;' value='$category[name_category]'>
		<input type='hidden' name='id' style='width:420px;' value='$category[id_category]'>
		</p>
		<p><input type='submit' name='button' value='Сохранить'></p></form></div></div>
		HEREDOC;
	}
}
?>