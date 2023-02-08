<?php 
    class login extends ACore {

        protected function obr(){
            $login = strip_tags(mysqli_real_escape_string($this->db, $_POST['login']));
            $password = strip_tags(mysqli_real_escape_string($this->db, $_POST['password']));

            if(!empty($login) and !empty($password)){
                $password = md5($password);

                $query = "SELECT id FROM Users WHERE login = '$login' And password = '$password'";
                $result = mysqli_query($this->db, $query);

                if(!$result){
                    exit(mysqli_connect_error($result));
                }

                if(mysqli_num_rows($result) == 1){
                    $_SESSION['user'] = true;
                    header("Location:?option=admin");
                    exit();
                } else {
                    exit('Вход выполнен успешно  НЕ выполнен');
                }
            } else {
                exit('Заполните обязательные поля');
            }
        }
        public function get_content(){
            echo '<div id = "main">';
            echo("<form enctype='multipart/form-data' action='' method='POST'>
            <p>Логин:<br />
            <input type='text' name='login' style='width:420px;'>
            </p>
            <p>Пароль:<br />
            <input type='password' name='password' style='width:420px;'>
            </p>
            </select><p><input type='submit' name='button' value='Сохранить'></p></form>");
            echo "</div></div>";
        }
    }
?>