<?php
    // configuration
    require("./includes/config.php");

    // If you need recount allmoney for each company, just uncomment code below and load main-page in browser
    //
    // $allmaincompany = CS50::query("SELECT * FROM  company WHERE parent_id = 0");
    // for($i = 0; $i < count($allmaincompany); $i++)
    // {
    //     updatemoney($allmaincompany[$i]["id"]);
    // }



    $result = CS50::query("SELECT * FROM  company");
    //check db and build list struct, if no data send apologize
    if (count($result) > 0)
    {
        //build datastruct {parent company id} -> array(child company), main company parent_id = 0
        $companysortarray = [];
        foreach($result as $row)
        {
            $companysortarray[$row['parent_id']][$row['id']] =  $row;
        }
        //build html tree
        $tree = buildtree($companysortarray, 0);
    }
    else
    {
        apologize("Well, DB doesn't have data yet");
    }
    //render main-page.php
    render("main-page.php", ["title" => "All Companies", "tree" => $tree]);


?> 