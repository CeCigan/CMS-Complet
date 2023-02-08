<?php 
    class add_category extends ACore_Admin {

        protected function obr(){
            $title = $_POST['title'];
            
            //echo('title = ' . $title . " date = " .  $date . "desription =" .  $description . ' text = ' . $text . ' Cat = ' . $cat . "<br>");

            if(empty($title)){
                exit('He все заполнены обязательные поля');
            }
            $query = "INSERT INTO category
                            (name_category)
                        VALUES('$title')";

            if(!mysqli_query($this->db, $query)){
                exit(mysqli_connect_error());
            }
            else {
                $_SESSION['res'] = "Изменения сохранены";
                header('Location:?option=add_category');
                exit();
                #$result = mysqli_query($this->db, $query);
            }
        }

        public function get_content(){
            echo "<div id = 'main' style = 'margin-top: 0vh;'>";
            if(@$_SESSION['res']){
                echo($_SESSION['res']);
                unset($_SESSION['res']);
            }

            //Форма создания статии
            print <<<HEREDOC
            <form action='' method='POST'>
                <p>Заголовок меню:<br /></p>
                <input type='text' name='title' style='width:420px;'>
                <input type='hidden' name='id' style='width:420px;'>
                
                <p><input type='submit' name='button' value='Сохранить'></p>
            </form></div></div>
            HEREDOC;
        }
    }
?>