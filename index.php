<?php

session_start();

define("BASE_PATH", __DIR__);

define("ERROR", true);

define("DOMAIN",currentDomain());

define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DB_NAME", "projectnews");
 
define("BASE_URL","http://localhost/177-projectnews/");

// function redirect($url){
//     header("location:".trim(BASE_URL,"/ ")."/".trim($url,"/ "));
//     exit();
// }
// redirect('main.php');

function protocol(){
    if(stripos($_SERVER['SERVER_NAME'],'https')===true){
        return 'https://';
    }else{
        return 'http://';
    }
}
// echo protocol();

function currentDomain(){
    return protocol().$_SERVER['HTTP_HOST'];
}
// echo currentDomain();

function asset($src){
    $domain=trim(currentDomain(),'/ ');
    $src=$domain.'/'.trim($src,'/');
    return $src;
}
echo asset("");
echo asset("template\admin");

//C:\xampp\htdocs\177-projectnews\template\admin