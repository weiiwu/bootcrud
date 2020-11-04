<?php

    class Util {
        // Method of input value sanitization
        public function testInput($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strip_tages($data);

            return $data;
        }


        // Method for displaying messages
        public function showMessage($type, $message){
            return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
            <strong>'.$message.'</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
?>