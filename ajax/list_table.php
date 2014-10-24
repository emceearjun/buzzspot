<?php

include ('../include/connect.php');

mysql_select_db('buzzspot');

$shop_string = $_POST['msg'];

$result = mysql_query ("SELECT brand, alcohol_type, full, half, quarter FROM alcohol_table, main_table WHERE shop_name='$shop_string' AND main_table.alcohol_id = alcohol_table.alcohol_id");

        while ($row = mysql_fetch_array($result))
        {
            echo"<tr>
                 <th>Brand</th>
                 <th>Type</th>
                 <th>Full</th>
                 <th>Half</th>
                 <th>Quarter</th>
                 </tr>
                 <tr>
                 <td>".$row['brand']."</td>
                 <td>".$row['alcohol_type']."</td>
                 <td>".$row['full']."</td>
                 <td>".$row['half']."</td>
                 <td>".$row['quarter']."</td></tr>";
        };
?>