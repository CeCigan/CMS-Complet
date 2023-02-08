<?php 
    class edit_category extends ACore_Admin {
        public function get_content()
        {
            $query = "SELECT id_category, name_category FROM category";
            $result = mysqli_query($this->db, $query);
            if(!$result){
                exit(mysqli_connect_error());
            }

            echo "<div id= 'main' style = 'margin-top: 0vh;'>";
            echo "<a href= '?option=add_category' style ='color:red;'>Добавить новую категорию</a><hr>";
            if(@$_SESSION['res']){
                echo($_SESSION['res']);
                unset($_SESSION['res']);
            } 
            $row = array();
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                printf('<p style = "font-size: 14px">
                            <a href = "?option=update_category&id_text=%s" style = "color:#585858">%s</a>
                            <a href = "?option=delete_category&del=%s" style = "color:red">Удалить пункт категории</a>
                            </p>', $row['id_category'], $row['name_category'], $row['id_category']);
            }
            echo "</div></div>";
        }
    }
?>