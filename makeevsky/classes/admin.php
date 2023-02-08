<?php 
    class admin extends ACore_Admin {
        public function get_content()
        {
            $query = "SELECT id, title FROM statii";
            $result = mysqli_query($this->db, $query);
            if(!$result){
                exit(mysqli_connect_error());
            }

            echo "<div id = 'main' style = 'margin-top: 0vh;'>";
            echo "<a href  = '?option=add_statii' style = 'color: red;'>Добавить новую статью</a><hr>";
            if($_SESSION['res']){
                echo($_SESSION['res']);
                unset($_SESSION['res']);
            } 
            $row = array();
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                printf('<p style = "font-size: 14px">
                            <a href = "?option=update_statii&id_text=%s" style = "color:#585858">%s</a>
                            <a href = "?option=delete_statii&del=%s" style = "color:red">Удалить статью</a>
                            </p>', $row['id'], $row['title'], $row['id']);
            }
            echo "</div></div>";
        }
    }
?>