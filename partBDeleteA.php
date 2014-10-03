<?php
require('connection.php');
mysqli_select_db( $con,"sakila");


$inputDel = $_POST['del'];



if(isset($_POST['del']))
{
$query ="DELETE FROM actor WHERE actor_id = $inputDel; ";
}





$result = mysqli_query($con,$query );

if(!$result)
{
    die('Could not delete record from the Sakila Database: ' . mysqli_error($db));
}
Else
{
    echo "DELETED.";
}

echo mysqli_affected_rows($con) . "row(s) have been affected" ;

?>
</p>
<a href = "partBDelete.php">Go back to table</a>

