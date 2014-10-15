<?php
require ("connection.php");

mysqli_select_db( $con, "employees");

session_start();
?>

<?php

$host="localhost"; // Host name
$username=""; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="NewUsers"; // Table name
$sql;
$result;
if(isset($_POST['forgotPass']))
{
    $myusername=$_POST['myusername'];
    $mycolor =$_POST['mycolor'];

    $sql="SELECT * FROM $tbl_name WHERE Name = '$myusername' AND color = '$mycolor'";
    $result=mysqli_query($con,$sql);

}
else{

 // username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$encrypted_mypassword=SHA1($mypassword);

// To protect MySQL injection (more detail about MySQL injection)
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
//$myusername = mysqli_real_escape_string($con,$myusername);
//$mypassword = mysqli_real_escape_string($con,$mypassword);

$sql="SELECT * FROM $tbl_name WHERE Name = '$myusername' AND Password = '$encrypted_mypassword'";
$result=mysqli_query($con,$sql);


}


// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"



    $_SESSION["myusername"] = $myusername;

  //  session_register("myusername");
   // session_register("mypassword");
    header("location:as1parta.php");

    echo "Sucess";

}
else {
    echo "Wrong Username or Password"  . "</p>";
    echo "<a href = as1Login.php>Go Back</a>";
    $_SESSION["myusername"]  = null;
}
?>