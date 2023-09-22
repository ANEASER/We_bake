<?php
    class Controller{

       public function view($viewname,$data=[])
          {extract($data);
           if(file_exists("../app/views/".$viewname.".php")){
               return file_get_contents("../app/views/".$viewname.".php");
           }else{
            return file_get_contents("../app/views/main/404view.php");
           } }
    }

?>