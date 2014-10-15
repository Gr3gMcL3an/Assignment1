<?php
session_start();
if(! (isset($_SESSION["myusername"]))){
    header("location:as1Login.php");
}
?>
<?php //session_start();  //USE REGEX WITH JAVASCRIPT TO VALIDATE, USE open() if TRUE

require ("connection.php");

mysqli_select_db( $con, "employees");

//get variable for next and previes that say what the variables should be
//$index = 0;
//a href = index.php?$index + 25

if(isset($_POST['btnLogOut']))
{
    $_SESSION["myusername"] = null;
    header("location:as1Login.php");

}

$maxPage = 25;

if(isset($_GET['pageNumber'])) //IF NEXT OR PREVIOUS IS POSTED
{
    $maxPage =$_GET['pageNumber'];

    if($maxPage<0)
    {
        $maxPage=0;
    }

}



if (isset( $_POST['btnSearch'] ))
{

    $inputSearch = $_POST['searchName'];
    $query = "SELECT * FROM employees WHERE first_name LIKE '%$inputSearch%' OR last_name LIKE '%$inputSearch%'";
}else{

    $query = "SELECT * FROM employees LIMIT $maxPage,25";//first query that is run
    $inputSearch = "";
}


if (isset( $_POST['btnAdd'] ))  //IF ADD RECORD IS CLICKED
{
//DEFINE INPUTS
$birthDate = $_POST['addBirth'];
$firstName = $_POST['addFirstName'];
$lastName = $_POST['addLastName'];
$gender = $_POST['addGender'];
$hireDate = $_POST['addHire'];



    $queryId = "SELECT emp_no FROM employees ORDER BY emp_no desc LIMIT 1";

    $resultId = mysqli_query($con,$queryId);

   $row= mysqli_fetch_assoc($resultId);

   $lastIndexInt = (int)$row['emp_no'];
    $lastIndexInt++;

    $queryInsert = "INSERT INTO employees(emp_no, birth_date, first_name,last_name,gender, hire_date)VALUES ('$lastIndexInt','$birthDate', '$firstName','$lastName','$gender','$hireDate');";

    $result = mysqli_query($con, $queryInsert);


    if(!$result)
    {
        die('Could not insert record: ' . mysqli_error($con));
    }
    Else
    {
        echo "RECORD ADDED.";
    }
  //  showId($resultId);
    //<input type="hidden" name="rowToDelete" value="<?php echo $deleteRow;
    //<a href = as1parta1.php?delete=<?php echo ($maxPage + 25);
}

?>


<body>

<form action=  "" method="post" name="delActor">

Search   <input name="searchName" type="text" value = <?php echo $inputSearch?>>

    <input name="btnSearch" type="submit" value = "Search Records">

</p>
Birth Date   <input name="addBirth" type="text"> first name <input name="addFirstName" type="text"> last name <input name="addLastName" type="text">
Gender <input name="addGender" type="text"id="addGender">  Hire Date <input name="addHire" type="text">

    <input name="btnAdd" type="submit" value = "Add Record" onsubmit = "return validate()">

</p>


    <script>

        var  test = document.getElementById('check').style.display = 'none';

        function validate() {






            var email = document.getElementById("addGender")
            if (email.value.length == 0)
            {
                email.style.borderColor="#FF0000";
                return false;
            }
    </script>




    </form>


</form>

<a href = as1parta.php?pageNumber=<?php echo ($maxPage - 25);?>>Previous 25</a>

<a href = as1parta.php?pageNumber=<?php echo ($maxPage + 25);?>>Next 25</a>

</p>

<form action=  "" method="post" name="delActor">
<input name="btnLogOut" type="submit" value = "Logout">
</form>

</body>

<?php

$result = mysqli_query($con,$query);

//emp_no | birth_date | first_name | last_name | gender | hire_date


function showId($res){
while($row = mysqli_fetch_array($res))
    $lastId=0;
{

    echo $row['emp_no'];
  //  echo $lastId;
}



}//end function

function showArray($res){
    while($row = mysqli_fetch_array($res))
    {
    $id =$row['emp_no'];
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
        echo  "<td>";
        ?>
        <a href = as1parta1.php?update=<?php echo $id; ?>><img src = 'pic/pencil.PNG'></a>
        <?php
        echo "</td>";
        echo  "<td>";
        ?>

        <a href = as1parta1.php?delete=<?php echo $id; ?>><img src = 'pic/delete.PNG'></a>

        <?php
        echo "</td>";
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