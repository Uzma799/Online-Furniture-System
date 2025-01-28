<?php

$con=mysqli_connect("localhost","root","","website");

if(mysqli_connect_error()){
    echo"Cannot connect to database";
    exit();
}
else{
    //echo"connected";
}

  define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/website/uploads/");

  define("FETCH_SRC","http://localhost/website/uploads/")
?>