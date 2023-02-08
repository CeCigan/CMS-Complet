<?php 
    class add_menu extends ACore_Admin {

        protected function obr(){
            $title = $_POST['title'];
            $text = $_POST['text'];
            
            //echo('title = ' . $title . " date = " .  $date . "desription =" .  $description . ' text = ' . $text . ' Cat = ' . $cat . "<br>");

            if(empty($title) || empty($text)){
                exit('He все заполнены обязательные поля');
            }
            $query = "INSERT INTO menu
                            (name_menu, text_menu)
                        VALUES('$title', '$text')";

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
            echo "<div id = 'main' style = 'margin-top: 0vh;'>";
            if($_SESSION['res']){
                echo($_SESSION['res']);
                unset($_SESSION['res']);
            }

            //Форма создания статии
            echo("<form action='' method='POST'>
                <p>Заголовок меню:<br /> 
                <input type='text' name='title' style='width:420px;'>
                </p>
                <p>Текст:<br />
                <textarea name='text' cols='50' rows='7'></textarea>
                </p>
                </select><p><input type='submit' name='button' value='Сохранить'></p></form></div></div>");
        }
    }
?>