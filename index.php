<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database_name = "imageGallery";

    $connection = new mysqli($hostname, $username, $password, $database_name);
    if ($connection->connect_error) {
        die("Could not establish a connection");
    }

    $sql_query = "SELECT * FROM imageGallery;";
    $result = mysqli_query($connection, $sql_query);
    $number_of_rows = mysqli_num_rows($result);


    function createGallery($result_inner)
    {
       
        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($result_inner)) {
            $image_dir = $row['dir'];

            echo ' <div class="col-md-4">
            <div class="thumbnail">
            <img src= "' . $image_dir . '"style="width:100%; height:300px;">
            </div>
            </div>';
        }
        echo '</div>';
    }


    ?>
    <div class="container">
        <?php
        createGallery($result);
        ?>
    </div>

    </div>
</body>

</html>