<?php 
    class add_statii extends ACore_Admin {

        protected function obr(){
            if(!empty($_FILES['img_src']['tmp_name'])){
                if(!move_uploaded_file($_FILES['img_src']['tmp_name'], 'image/' . $_FILES['img_src']['name'])){
                    exit('Не удалось загрузить изображения');
                }
                $img_src =  'image/' . $_FILES['img_src']['name']; #!!!
            } 
            else{
                exit('Необходимо загрузить изображение');
            }

            $cat = $_POST['cat'];
            $title = $_POST['title'];
            $date = date('y-m-d', time());
            $description = $_POST['description'];
            $text = $_POST['text'];
            
            //echo('title = ' . $title . " date = " .  $date . "desription =" .  $description . ' text = ' . $text . ' Cat = ' . $cat . "<br>");

            if(empty($title) || empty($text) || empty($description)){
                exit('He все заполнены обязательные поля');
            }
            $query = "INSERT INTO statii
                            (title, description, text, date, img_src, cat)
                        VALUES('".$title."', '".$description."', '".$text."', '".$date."', '".$img_src."', '".$cat."')";

            if(!mysqli_query($this->db, $query)){
                exit(mysqli_connect_error());
            }
            else {
                $_SESSION['res'] = "Изменения сохранены";
                header('Location:?option=add_statii');
                exit();
                #$result = mysqli_query($this->db, $query);
            }
        }

        public function get_content(){
            if($_SESSION['res']){
                echo($_SESSION['res']);
                unset($_SESSION['res']);
            }

            //Форма создания статии
            echo "<div id = 'main' style = 'margin-top: 0vh;'>";
            $cat = $this->get_categories();
            require_once("form.html");
            foreach($cat as $item){
                echo "<option value='" . $item['id_category'] . "'>" .$item['name_category'] . "</option>"; 
            }
            echo "</select><p><input type='submit' name='button' value='Сохранить'></p></form></div></div>";
        }
    }
?>