<?php
/**
 * COnfigure App
 **/
 
    // display errors, change E_ALL if you don't want see all errors
    ini_set("display_errors", true); // use "true" only during development, in prodaction use false
    error_reporting(E_ALL);
    
    // requirement
    require("helpers.php");
    
    //CS50 Library
    require("./vendor/library50-php-5/CS50/CS50.php");
    CS50::init(__DIR__ . "/../config.json");
    
    //Enable session
    session_start();
    
    //require authentication for all pages except: 
    if(!in_array($_SERVER["PHP_SELF"], ["/login.php", "/logout.php", "/register.php"]))
    {
        if(empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
    }

?>