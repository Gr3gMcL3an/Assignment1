<?php

require ("connection.php");

mysqli_select_db( $con, "employees");

$result = mysqli_query($con,"SELECT * FROM employees LIMIT 25");

//emp_no | birth_date | first_name | last_name | gender | hire_date

function showArray($res){
    while($row = mysqli_fetch_array($res))
    {

        echo "<tr>";
        echo "<td>";
        echo $row['emp_no'];
        echo "</td>";
        echo  "<td>";
        echo  $row['birth_date'];
        echo  "</td>";
        echo  "<td>";
        echo  $row['first_name'];
        echo  "</td>";
        echo  "<td>";
        echo  $row['last_name'];
        echo  "</td>";
        echo  "<td>";
        echo  $row['gender'];
        echo  "</td>";
        echo  "<td>";
        echo  $row['hire_date'];
        echo  "</td>";
        echo "</tr>";
    }
}//end showarray
//<?php showArray($result)






?>

<table border="1">
    <tr>
        <td>Emp Number</td>
        <td>Birth Date</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Gender</td>
        <td>Hire Date</td>
    </tr>

    <?php showArray($result)?>


</table>