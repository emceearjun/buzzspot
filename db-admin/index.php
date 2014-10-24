<?php

session_start();
if(isset($_SESSION['username']))
{
    header('location:dashboard/');
}

if (isset ($_GET['failed']) && $_GET['failed'] != 1)
{
    $_GET['failed'] = 0;   
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>DB Admin Login</title>
        <link rel="stylesheet" href="css/admin_login.css" />
    </head>
    <body>
        <div id="header">
            <h2>Database Admin Login Portal</h2><br />
        </div>
        <div id="form-container">
            <form action="include/login.php" method="POST" id="form-elements">
                Username: <input type="text" name="username" id="textbox"><br /><br />
                Password: <input type="password" name="password"><br /><br />
                <input type="submit" value="Login"><br /><br />
                <?php 
                    if(isset($_GET['failed']))
                    {
                        if($_GET['failed'] == 1)
                        {
                            echo "Invalid username and password!";
                        }
                    }
                ?>
            </form>
        </div>
        <script type="text/javascript">
            window.onload = function setFocusToTextBox(){
                document.getElementById("textbox").focus();
            }           
        </script>
    </body>
</html>
