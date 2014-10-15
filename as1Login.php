<?php
/**
 * Created by PhpStorm.
 * User: inet2005
 * Date: 10/15/14
 * Time: 12:46 AM
 */
?>

<html>
<head>
    <style>
        body {
            background-color: linen;
        }
    </style>
</head>
<body>




<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
        <form name="form1" method="post" action="as1LoginCheck.php">
            <td>
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                    <tr>
                        <td colspan="3"><strong>Assignment 1 Login </strong></td>
                    </tr>
                    <tr>
                        <td width="78">Username</td>
                        <td width="6">:</td>
                        <td width="294"><input name="myusername" type="text" id="myusername"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input name="mypassword" type="password" id="mypassword"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Login"></td>

                        <h2><a href = as1ForgotPass.php>I forgot my password</a></h2>

                    </tr>
                </table>
            </td>
        </form>
    </tr>
</table>

</body>
</html>