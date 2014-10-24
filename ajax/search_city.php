<?php

include ('../include/connect.php');

mysql_select_db('buzzspot');

$city_string = $_POST['msg'];

$result = mysql_query ("SELECT sector FROM pin_table WHERE city='$city_string'");

        while ($row = mysql_fetch_array($result))
        {
            echo"<li class='locality-select'><a href='#'>".$row['sector']."</a></li>";
        };
?>