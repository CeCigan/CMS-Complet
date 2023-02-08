<?php 
    class main extends ACore {
        public function get_content(){
            $query = "SELECT id, title, description, date, img_src FROM statii ORDER BY date DESC";
            $result = mysqli_query($this->db, $query);
            if(!$result){
                exit(mysqli_connect_error());
            }

            $row = array();
            echo '<div id = "main">';
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                printf('<div style = "margin: 10px; border-bottom: 2px solid #c2c2c2"> 
                            <p style = "font-size: 18px">%s</p>
                            <p>%s</p>
                            <p><img src = "%s" style = "margin-right:5px" width= "150px" align = "left">%s</p>
                            <p style = "color:red"><a href = "?option=view&id_text=%s">Читать далее...</a></p>
                        </div><br>', $row['title'], $row['date'], $row['img_src'], $row['description'], $row['id']);
            }
            echo '</div> </div>';
        }
    }
?>