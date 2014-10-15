<?php
session_start();
if(! (isset($_SESSION["myusername"]))){
    header("location:as1Login.php");
}
?>

<?php

require ("connection.php");

mysqli_select_db( $con, "employees");


if(isset($_GET['delete'])) //if user wants to delete
{
    $deleteRow = $_GET['delete'];

    echo "User with ID ". $deleteRow . " will be deleted. Are you Sure?";


    ?>
    <form action=  "" method="post" name="delEmp">
        <input name="btnDel" type="submit" value = "Sure Am!">
        <input type="hidden" name="rowToDelete" value="<?php echo $deleteRow; ?>" />
     </form>
    </p>
    <form action=  "as1parta.php" method="post" name="outlog">
        <input name="btnLogOut" type="submit" value = "Logout">
    </form>
    <?php

}

if(isset($_POST['btnDel']))
{

    $id = $_POST['rowToDelete'];

    $query = "DELETE FROM employees WHERE emp_no = $id";

    $result = mysqli_query($con, $query);

    if(!$result)
    {
        die('Could not DELETE record: ' . mysqli_error($con));
    }
    Else
    {
        echo "</p>"."RECORD DELETED.";

    }

}


if(isset($_GET['update'])) //if user wants tp update
{

    $updateRow = $_GET['update'];
    echo "User with ID ". $updateRow. " will be updated";

    ?>
    </p>

    <form action=  "" method="post" name="upEmp">
    Birth Date   <input name="addBirth" type="text"> first name <input name="addFirstName" type="text"> last name <input name="addLastName" type="text">
    Gender <input name="addGender" type="text">  Hire Date <input name="addHire" type="text">
    <input type="hidden" name="rowToUpdate" value="<?php echo $updateRow; ?>" />

    <input name="btnUp" type="submit" value = "Update Employee">
        </p>
        </form>
        <form action=  "as1parta.php" method="post" name="delActor">
            <input name="btnLogOut" type="submit" value = "Logout">
        </form>


<?php


    //$query = "UPDATE employees SET (emp_no, birth_date, first_name,last_name,gender, hire_date)VALUES ('$lastIndexInt','$birthDate', '$firstName','$lastName','$gender','$hireDate');";

}




if (isset( $_POST['btnUp'] ))  //IF UPDATE RECORD IS CLICKED
{
//DEFINE INPUTS
$birthDate = $_POST['addBirth'];
$firstName = $_POST['addFirstName'];
$lastName = $_POST['addLastName'];
$gender = $_POST['addGender'];
$hireDate = $_POST['addHire'];
$id = $_POST['rowToUpdate'];

    echo $id;



    $query = "UPDATE employees SET birth_date = '$birthDate', first_name= '$firstName',last_name = '$lastName',gender = '$gender', hire_date = '$hireDate' WHERE emp_no = '$id';";



    $result = mysqli_query($con, $query);

    if(!$result)
    {
        die('Could not update record: ' . mysqli_error($con));
    }
    Else
    {
        echo "</p>"."RECORD UPDATED.";

    }
}







//emp_no | birth_date | first_name | last_name | gender | hire_date


?>

<a href = "as1parta.php">Go Back</a>