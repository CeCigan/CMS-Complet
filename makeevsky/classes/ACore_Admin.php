<?php 
    require_once('config.php');
    abstract class ACore_Admin {

        protected $db;
    
        public function __construct() {

            if(!$_SESSION['user']){
                header('Location: ?option=login');
            }

            $this->db = mysqli_connect(HOST,USER,PASSWORD,DB);
            if(!$this->db){
                exit("Ошибка соединения c  базой данных".mysqli_connect_error());
            }
            if(!mysqli_select_db($this->db,DB)){
                exit("Нет такой базы данных".mysqli_connect_error());
            }
            mysqli_query($this->db,"SET NAMES 'UTF8'");
        }
    
        protected function get_header() {
            include "header.php";
        }
    
        protected function get_left_bar(){

            echo '<div class="quick-bg">
            <div id="spacer">
                <div id="rc-bg">Раздел админки</div>
            </div>';
    
            echo("<div class='quick-links' style='margin-top: 15px;'>
            » <a href='?option=admin'>Статьи</a>
            </div>");

            echo("<div class='quick-links' style='margin-top: 15px;'>
            » <a href='?option=edit_menu&id_cat=%s'>Меню</a>
            </div>");

            echo("<div class='quick-links' style='margin-top: 15px;'>
            » <a href='?option=edit_category&id_cat=%s'>Категории</a>
            </div>");
    
            echo "</div>";
        }
    
        protected function get_menu(){
            echo '<div id="mainarea">
            <div class="heading"></div>';
            
        }
    
        protected function get_footer(){
            echo "<div id='bottom'>";
            echo '</div>
            <div class="copy"><span class="style1">Copyright 2010 Название сайта </span>
            </div>
            </div>
            </center></body></html>';
        }
    
        public function get_body() {

            if(@$_POST || @$_GET['del']){
                @$this->obr();
            }
            $this->get_header();
            $this->get_left_bar();
            $this->get_menu();
            $this->get_content();
            $this->get_footer();
        }
    
        abstract function get_content();

        protected function get_categories(){
            $query = "SELECT id_category, name_category FROM category";
            $result = mysqli_query($this->db, $query);

            if(!$result){
                exit(mysqli_connect_error());
            }

            $row = array();
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
            }

            return $row;
        }

        protected function get_text_statii($id){
            $query = "SELECT id, title, description, text, cat FROM statii WHERE id= '$id'";
            $result = mysqli_query($this->db, $query);

            if(!$result){
                exit(mysqli_connect_error());
            }

            $row = array();
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            return $row;
        }

        protected function get_text_category($id){
            $query = "SELECT id_category, name_category FROM category WHERE id_category= '$id'";
            $result = mysqli_query($this->db, $query);

            if(!$result){
                exit(mysqli_connect_error());
            }

            $row = array();
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            return $row;
        }

        protected function get_text_menu($id){
            $query = "SELECT id_menu, name_menu, text_menu FROM menu WHERE id_menu= '$id'";
            $result = mysqli_query($this->db, $query);

            if(!$result){
                exit(mysqli_connect_error());
            }

            $row = array();
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            return $row;
        }
    }
?>