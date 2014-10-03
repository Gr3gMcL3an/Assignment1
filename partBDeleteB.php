



<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 9/29/14
 * Time: 12:30 AM
 */
require('connection.php');
mysqli_select_db( $con,"sakila");




$inputUpdate = $_POST['update'];

$query = "SELECT * FROM actor where actor_id = $inputUpdate;"; //first_name, last_name)

$result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
{
    $beforeFirstName = $row['first_name'];
    $beforeLastName = $row['last_name'];

    $GLOBALS['beforeFirst'] = $beforeFirstName;
    $GLOBALS['beforeLast'] = $beforeLastName;

    echo "First ". $beforeFirstName . " Last " . $beforeLastName. " ID " . $inputUpdate;

}





//if(isset($_POST['fName']) && isset($_POST['lName']))  //SELP POST AND UPDATE TABLE
//{
//    $fNameUpdate = $_POST['fName'];
//    $lNameUpdate = $_POST['lName'];
//
//
//    echo $GLOBALS['updateID'];
//
//    $query = mysqli_query($db,"UPDATE actor SET first_name = $fNameUpdate, last_name = $lNameUpdate where id = $inputUpdate;"); //first_name, last_name)
//
//    $result = mysqli_query($con,$query );
//
//    if(!$result)
//    {
//        die('Could not update record from the Sakila Database: ' . mysqli_error($db));
//    }
//    Else
//    {
//        echo "UPDATED.";
//    }
//
//    echo mysqli_affected_rows($con) . "row(s) have been affected" ;
//}else
//{
//    echo "Please fill out both text boxes"; //<?php $_SERVER['PHP_SELF']
//}
//
//
//
//?>
</p>

<body>
<form action="partBDeleteBupdate.php"  method="post" name="dUpdateActor2">
    First Name: <input name="fName" type="text" value="<?php echo $beforeFirst?>">
    </p>
    Last Name: <input name="lName" type="text"value="<?php echo $beforeLast?>">
    </p>
    <P>
    <input name="btnUpName" type="submit">
    <p>

    <input  name="updateIdSelection" type="hidden" value="<?php echo $inputUpdate ?>" >

        <input type="hidden" value="test" name="f" />

    </p>
</form>
</p>
<a href = "partBDelete.php">Go back to table</a>
</body>

