<?php 
    class delete_statii extends ACore_Admin{
        public function obr()
        {
            if($_GET['del']){
                $id_text=(int)$_GET['del'];
                $query = "DELETE FROM statii WHERE id='$id_text'";

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