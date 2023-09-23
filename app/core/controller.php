<?php
    class Controller{

       public function view($viewname,$data=[])
        {  
           extract($data);

           if(file_exists("../app/views/".$viewname.".php")){
               require ("../app/views/".$viewname.".php");
           }else{
            return file_get_contents("../app/views/main/404view.php");
           } }
    }

?>