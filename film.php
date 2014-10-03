<!DOCTYPE HTML>
    <head>
        <title>Lab3</title>
    </head>
    <body>

    <h1>Step 1</h1>
    <hr/>
        <?php

        require('connection.php');

        mysqli_select_db( $con, "sakila");

        $result = mysqli_query($con,"SELECT * FROM film LIMIT 0,10");


        function showArray($res){
        while($row = mysqli_fetch_array($res))
        {

            echo "<tr>";
            echo "<td>";
            echo $row['title'];
            echo "</td>";
            echo  "<td>";
            echo  $row['description'];
            echo  "<td/>";
            echo "</tr>";
        }
        }//end showarray
        //<?php showArray($result)
        ?>

        <table border="1">
            <tr>
                <td>Title</td>
                <td>Description</td>
            </tr>

            <?php showArray($result)?>


        </table>

    <h1>Step 2</h1>
    <hr/>

    <form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post" name="search">
        Search Movie Descriptions: <input name="searchFilmDesc" type="text">
        </p>

            <input name="" type="submit">
        </p>
    </form>





    <?php

 //   mysql_close($con);

  //  mysql_select_db("sakila", $con);

    ?>

    <table border="1">
        <tr>
            <td>Title</td>
            <td>Description</td>
        </tr>

        <?php
        if(isset($_POST['searchFilmDesc']))
        {
            $input = $_POST['searchFilmDesc'];
            $resultSearch = mysqli_query($con,"SELECT * FROM film WHERE description LIKE '%$input%'  LIMIT 0,10");
            showArray($resultSearch);
            // echo "hitTARGET";
        }

        ?>


    </table>




    </body>
</html>


