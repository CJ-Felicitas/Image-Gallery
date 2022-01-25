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

    
    while ($row = mysqli_fetch_assoc($result)) {

        
        $image_dir = $row['dir'];


        echo '<img src= "'.$image_dir.'">';       
        echo '
        </div>
        <div class="row">
        <div class="col-md-4">
        <div class="thumbnail">
        <img src= "'.$image_dir.'">
        </div>
        </div></div>';
      }
