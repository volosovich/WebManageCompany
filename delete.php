<?php
    // configuration
    require("./includes/config.php");
    
    //if user load page via GET, render delete form from file-view
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $list = CS50::query('SELECT `id`, `name`, `parent_id`, `cash` FROM `company`');
        
        render("delete_form.php", ["title" => "Delete company", "list" => $list]);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        //check and delete company
        if(empty($_POST["company"]))
        {
            apologize("You must select a company, which you need delete");
        }
        
        $result = deletetree($_POST["company"]);
        
        redirect("/");
            
        
    }
    

?>