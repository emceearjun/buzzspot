<?php

session_start();
if(!isset($_SESSION['username']))
{
    header('location:../');
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
            <div id="logout-link"><a href="../include/logout.php">Logout</a></div>
        </div>
        <div id="container">
            
        </div>
    </body>
</html>