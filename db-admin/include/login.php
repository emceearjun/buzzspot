<?php

if (!isset($_SESSION['username']))
{
    session_start();
}

include ('../../include/connect.php');

mysql_select_db('buzzspot');

$session_user = $_POST['username'];
$session_pass = $_POST['password'];

$result_user = mysql_query ("SELECT * FROM db_admin_tbl WHERE username='$session_user' AND password='$session_pass'");

$user_rows = mysql_num_rows($result_user);    

if ($user_rows == NULL)
{
    header ('location:../index.php?failed=1');
}
else if ($user_rows == 1)
{
    $username_check = mysql_fetch_assoc($result_user);

    if ($username_check['username'] == $session_user)
    {
        $_SESSION['username'] = $username_check['username'];
        header ('location:../dashboard/');
    }
    else
    {
        header ('location:../index.php?failed=1');
    }
}

?>