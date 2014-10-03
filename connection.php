<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 9/22/14
 * Time: 4:12 PM
 */

$con = mysqli_connect("localhost","root","inet2005");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
return $con;

?>