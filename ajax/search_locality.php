<?php

include ('../include/connect.php');

mysql_select_db('buzzspot');

$locality_string = $_POST['msg'];

$result = mysql_query ("SELECT shop_name FROM main_table WHERE pin=(SELECT pin FROM pin_table WHERE sector='$locality_string')");

        while ($row = mysql_fetch_array($result))
        {
            echo"<li class='outlet-select'><a href='#'>".$row['shop_name']."</a></li>";
        };
?>