<?php
    // configuration
    require("./includes/config.php");
    
    //if user load page via GET, render login form from login_form.php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("login_form.php", ["title" => "Log In"]);
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
        
        $rows = CS50::query("SELECT * FROM users WHERE name = ?", $_POST["username"]);
        
        if(count($rows) == 1)
        {
            if(password_verify($_POST["password"], $rows[0]["hash"]))
            {
                //remember user
                $_SESSION["id"] = $rows[0]["id"];
                //redirect to main page
                redirect("/");
            }
        }
        
        //sent error message
        apologize("You input wrong password or username or both of them");
    }
    

?>