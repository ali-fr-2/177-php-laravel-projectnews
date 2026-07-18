<?php

session_start();

define("BASE_PATH", __DIR__);

define("ERROR", true);

// define("DOMAIN",currentpath(),"projectnews");

define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DB_NAME", "projectnews");
 

// function redirect($url){
//     header("location:".$url);
//     exit();
// }
// redirect('main.php');

define("BASE_URL","http://localhost/177-projectnews/");

function redirect($url){
    header("location:".trim(BASE_URL,"/ ")."/".trim($url,"/ "));
    exit();
}
redirect('main.php');

