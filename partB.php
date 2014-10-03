<?php

require('connection.php');

mysqli_select_db( $con,"sakila");

$result="";

function insertActor($con){



    $firstNameAdd = $_POST['actorFname'];
    $lastNameAdd = $_POST['actorLname'];
//    $db = mysqli_connect("localhost","root","inet2005","sakila");
//    if (!$db){    die('Could not connect to the Sakila Database: ' . mysqli_error($db));}

    $result = mysqli_query($con,"INSERT INTO actor (first_name, last_name) VALUES ('" . $firstNameAdd . "','" . $lastNameAdd . "');");
 //   showActorArray($result);
    if(!$result){
        die('Could not insert record into the Sakila Database: ' . mysqli_error($con));
}else
{
    echo "New record inserted.";





}



}//end insertActor

function showActorArray($res){
    while($row = mysqli_fetch_array($res,MYSQLI_ASSOC))
    {

        echo "<tr>";
        echo "<td>";
        echo $row['first_name'];
        echo "</td>";
        echo  "<td>";
        echo  $row['last_name'];
        echo  "<td/>";
        echo "</tr>";
    }
}//end showarray
//<?php showArray($result)


    ?>







<html>
<body>
<h1>insert</h1>
<hr/>

<table border="1">
    <tr>
        <td>Title</td>
        <td>Description</td>
    </tr>

 <?php
        if(isset($_POST['actorFname']) && isset($_POST['actorLname']))
        {


            insertActor($con);
            $show = mysqli_query($con,"SELECT * from actor ORDER by actor_id desc LIMIT 0,10");
            showActorArray($show);




        }

 ?>
