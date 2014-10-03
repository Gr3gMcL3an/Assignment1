<html>
<head>
    <title>NEW PAGE</title>
</head>






<?php

require('connection.php');

mysqli_select_db( $con,"sakila");

$fNameUpdate = $_POST['fName'];
$lNameUpdate = $_POST['lName'];
$id = $_POST['updateIdSelection'];

echo "id ". $fNameUpdate ."  " . $id;



if(isset($_POST['fName']) && isset($_POST['lName']))  //SELP POST AND UPDATE TABLE
{
    $fNameUpdate = $_POST['fName'];
    $lNameUpdate = $_POST['lName'];




    $query = "UPDATE actor SET first_name = '$fNameUpdate', last_name = '$lNameUpdate' where actor_id = $id;"; //first_name, last_name)

    $result = mysqli_query($con,$query );

    if(!$result)
    {
        die('Could not update record from the Sakila Database: ' . mysqli_error($con));
    }
    Else
    {
        echo "UPDATED.";
    }

    echo mysqli_affected_rows($con) . "row(s) have been affected" ;
}else
{
    echo "Please fill out both text boxes"; //<?php $_SERVER['PHP_SELF']
}





?>

<a href = "partBDelete.php">Go back to table</a>
</html>