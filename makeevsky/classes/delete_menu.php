<?php 
    class delete_menu extends ACore_Admin{
        public function obr()
        {
            if($_GET['del']){
                $id_menu=(int)$_GET['del'];
                $query = "DELETE FROM menu WHERE id_menu='$id_menu'";

                if(!mysqli_query($this->db, $query)){
                    $_SESSION['res'] = "Was deleted";
                    header('Location: ?option=admin');
                    exit();
                } else {
                    exit('Delete Error:');
                }
            } else {
                exit('Не верный данные для страницы');
            }
        }
        public function get_content(){
        } 
    }
?>