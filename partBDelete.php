<?php
require('connection.php');
mysqli_select_db( $con,"sakila");

?>

    <h1>Delete</h1>
    <hr/>



<?php

function showActor($con){

$showDelete = mysqli_query($con,"SELECT actor_id, first_name, last_name from actor ORDER by actor_id desc LIMIT 0,10");

while($row = mysqli_fetch_array($showDelete,MYSQLI_ASSOC))
{

    echo "<tr>";

    echo "<td>";
    echo  $row['actor_id'];
    echo "</td>";

    echo  "<td>";
    echo  $row['first_name'];
    echo  "</td>";

    echo "<td>";
    echo $row['last_name'];
    echo "</td>";

    echo "</tr>";

}
}//end function

?>

<body>

<table border="1">
    <tr>
        <td>ID</td>
        <td>First</td>
        <td>Last</td>
    </tr>
    <?php  showActor($con); ?>
    </table>
</p>

<form action="partBDeleteA.php"  method="post" name="delActor">
    ID to delete: <input name="del" type="text">
    </p>
    <input name="btnDel" type="submit">
    </p>
</form>

<form action="partBDeleteB.php"  method="post" name="dUpdateActor">
    ID to update: <input name="update" type="text">
    </p>
    <input name="btnUp" type="submit">
</form>
</body>