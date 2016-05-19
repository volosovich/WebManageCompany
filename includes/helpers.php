<?php

/**
 * Main function.
 *
 **/
    
    require_once("config.php");
    
    /**
     * render data
     */
     
    function render($view, $values = [])
    {
        if(file_exists("./views/{$view}"))
        {
            // extract our values into local space
            extract($values);
            
            //render
            require("./views/header.php"); //change when make file
            require("./views/{$view}");
            require("./views/footer.php"); //change when make file
            exit;
        }
        
        //if did not find file, send error
        else
        {
            trigger_error("Script did not find {$view} file", E_USER_ERROR);
        }
    }
    
    /**
     * redirect to another link
     */
    function redirect($location)
    {
        if(headers_sent($file, $line))
        {
            trigger_error("HTTP headers sent at {$file} {$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
    
    /**
     * destroy session
     */
    function logout()
    {
        //http://php.net/manual/en/function.session-destroy.php
        // Unset all of the session variables.
        $_SESSION = array();
        
        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies"))
        {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000);
        }
        
        // Finally, destroy the session.
        session_destroy();
    }
    
    //Send error message to user
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
    }
    
        
    function buildtree($cats, $parent_id, $only_parent = false)
    {
        if(is_array($cats) and isset($cats[$parent_id]))
        {
        $tree = '<ul>';
            if($only_parent==false){
                foreach($cats[$parent_id] as $cat)
                {
                    $tree .= '<li>'. $cat['name'] . ' Cash $' . $cat["cash"] . ' All Cash $' . $cat["allcash"];
                    $tree .= buildtree($cats, $cat['id']);
                    $tree .= '</li>';
                }
            }
            elseif(is_numeric($only_parent))
            {
                $cat = $cats[$parent_id][$only_parent];
                $tree .= '<li>' . $cat['name'] . ' Cash $' . $cat["cash"] . ' All Cash $' . $cat["allcash"];
                $tree .=  buildtree($cats, $cat['id']);
                $tree .= '</li>';
            }
        $tree .= '</ul>';
        }
        else return null;
        return $tree;
    }
    
    function deletetree($id)
    {
        $child = CS50::query("SELECT * FROM company WHERE parent_id = ?", $id);
        if(!empty($child))
        {
            foreach($child as $row)
            {
                deletetree($row["id"]);
                CS50::query("DELETE FROM `company` WHERE `id` = ?", $id);
            }
        }
        else
        {
            CS50::query("DELETE FROM `company` WHERE `id` = ?", $id);
        }
    }
    
   
    function findmaincompany($id)
    {
        $parent_id = CS50::query("SELECT `parent_id` FROM `company` WHERE `id` = ?", $id);
        if($parent_id[0]["parent_id"] != 0)
        {
            return findmaincompany($parent_id[0]["parent_id"]);
        }
        else
        {
            return $id;
        }
    }
    
    function updatemoney($id)
    {
        $child = CS50::query("SELECT * FROM `company` WHERE `parent_id` = ?", $id);
        if(empty($child))
        {
            CS50::query("UPDATE `company` SET `allcash`=`cash` WHERE `id`=?", $id);
        }
        else
        {
            for($i = 0; $i< count($child); $i++)
            {
                updatemoney($child[$i]["id"]);
            }
            $childmoney = CS50::query("SELECT sum(`allcash`) AS `total` FROM `company` WHERE `parent_id` = ?", $id);
            $parentmoney = CS50::query("SELECT `cash` FROM `company` WHERE `id` = ?", $id);
            $sum = $childmoney[0]["total"] + $parentmoney[0]["cash"];
            CS50::query("UPDATE `company` SET `allcash`=? WHERE `id`=?", $sum, $id);
            
        }
    }
?>