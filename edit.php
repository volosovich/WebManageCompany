<?php
    // configuration
    require("./includes/config.php");
    
    //if user load page via GET, render edit form from file-view
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $list = CS50::query('SELECT `id`, `name`, `parent_id`, `cash` FROM `company`');
        
        render("edit_form.php", ["title" => "Edit company", "list" => $list]);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //check and edit company
        if($_POST["company"] == $_POST["parentcompany"])
        {
            apologize("Company cant be the parent and child at the same time");
        }
        
        if(empty($_POST["companyname"]))
        {
            $ieditCompany = CS50::query("UPDATE company SET cash = ?, parent_id = ? WHERE id = ?", $_POST["cash"], $_POST["parentcompany"], $_POST["company"]);
        }
        else
        {
            $ieditCompany = CS50::query("UPDATE company SET cash = ?, name = ?, parent_id = ? WHERE id = ?", $_POST["cash"], $_POST["companyname"], $_POST["parentcompany"], $_POST["company"]);
        }
        
        if($ieditCompany == 1)
        {
            updatemoney(findmaincompany($_POST["company"]));
            redirect("/");
        }
        else
        {
            apologize("Something went wrong!");
        }
    }
    

?>