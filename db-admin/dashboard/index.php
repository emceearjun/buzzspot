<?php

session_start();
if(!isset($_SESSION['username']))
{
    header('location:../');
}

if (!isset($_GET['failed']) || ($_GET['failed'] != 0 && $_GET['failed'] != 1))
{
    $_GET['failed'] = 2;   
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Dashboard - <?php echo $_SESSION['username']; ?></title>
        <link rel="stylesheet" href="../css/dashboard.css" />
    </head>
    <body>
        <div id="header">
            <h2>Welcome, <?php echo $_SESSION['username']; ?></h2><br />
            <div id="logout-link"><a href="../include/logout.php"><b>Logout</b></a></div>
        </div>
        <div id="container">
            <div id="content">
                <div id="content-header">
                    <h4>city_table</h4>
                </div>
                <form action="../include/submit.php" method="post">
                <table id="city-table">
                    <tr>
                        <th>city_id</th>
                        <th>city_name</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="city_id"></td>
                        <td><input type="text" name="city_name"></td>
                    </tr>
                </table>
                    <br />
                    
                <input type="submit" value="Submit">
                    <br />
                    <br />
                    <?php
                        if ($_GET['failed'] == 0)
                        {
                            echo "Successfully added!";
                        }
                        if ($_GET['failed'] == 1)
                        {
                            echo "Unable to add!";
                        }
                    ?>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="../js/utils.js"></script>
    </body>
</html>