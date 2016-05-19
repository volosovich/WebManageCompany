<?php
    // configuration
    require("./includes/config.php");
    
    //if user load page via GET, render login form from login_form.php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("register_form.php", ["title" => "Register In"]);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //check user
        if(empty($_POST["username"]))
        {
            apologize("Please input username!");
        }
        if(empty($_POST["password"]))
        {
            apologize("Please input password!");
        }
        if(empty($_POST["confirm"]))
        {
            apologize("Please confirm password!");
        }
        if($_POST["password"] != $_POST["confirm"])
        {
            apologize("Please input the same password in both form!");
        }
        
        //save user to db
        $register = CS50::query('INSERT IGNORE INTO users (name, hash) VALUES(?, ?)', $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
        
        
        //verify user and save him session
        $select = CS50::query("SELECT * FROM `users` WHERE `name` = ?", $_POST["username"]);
        if(count($select) == 1)
        {
            if(password_verify($_POST["password"], $select[0]["hash"]))
            {
                //remember user
                $_SESSION["id"] = $select[0]["id"];
                //redirect to main page
                redirect("/");
            }
        }
        
        //sent error message if user exists
        apologize("Your user exists, please try another username");
    }
    

?>