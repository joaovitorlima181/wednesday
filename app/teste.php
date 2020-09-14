<?php 
    //random_bytes () function in PHP 
    $length = random_bytes('3'); 
      
    //Print the reult and convert by binaryhexa 
    var_dump(bin2hex($length));