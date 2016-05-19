<?php
    // configuration
    require("./includes/config.php");
    
    //if user load page via GET, render login form from login_form.php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $list = CS50::query('SELECT `id`, `name` FROM `company`');
        render("add_form.php", ["title" => "Add company", "list" => $list]);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //check and insert company
        if(empty($_POST["companyname"]))
        {
            apologize("You must input company name");
        }
        
        $insertNewCompany = CS50::query("INSERT INTO `company`(`parent_id`, `name`, `cash`) VALUES (?, ?, ?)", $_POST["parentcompany"], $_POST["companyname"], $_POST["cash"]);
        
        if($insertNewCompany == 1)
        {
            //Update allmoney column adter add and redirect
            $update = CS50::query('SELECT `id` FROM `company` WHERE `name` = ?', $_POST["companyname"]);
            updatemoney(findmaincompany($update[0]["id"]));
            redirect("/");
        }
        else
        {
            apologize("Something went wrong!");
        }
    }
    

?>