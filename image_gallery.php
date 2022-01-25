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

    function create_imageColumnByThree($result_in)
    {
        $result = $result_in;
        $counter = 0; // counts the loop up to 3 to divide the thumbnail into 3 columns per row
        while ($row = mysqli_fetch_assoc($result)) {
            $image_dir = strtolower($row['dir']);
            if ($counter == 0) {
                echo "<div class='row'>";
            }
            if ($counter <= 3 && $counter >= 0) {

                $html_first_col_tag = '<div class="row"><div class="thumbnail"><img href = "';   //></div></div>'
                $sumpay = $image_dir + '"></div></div>';

                $overall = $html_first_col_tag + $sumpay;
                echo $overall;

                $counter++;
            }

            if ($counter = 3) {
                /* echo '
        </div>
        <div class="row">
        <div class="col-md-4">
        <div class="thumbnail">
        <img href="' + "$image_dir" + '"' + 'style="width:100%; height:300px;">
        </div>
        </div></div>';
                */

                $htmls = "
                </div>
                <div class = 'row'>
                <div class = 'col-md-4'>
                <div class='thumbnail'>
                <img href = '"+$image_dir +" style='width:100%; height:300px;'>
                </div>
                </div></div>";


                $html_tag_two =
                    '
                </div>
                <div class="row">
                <div class="col-md-4">
                <div class="thumbnail">
                
                <img href="' + "$image_dir" + '"' + 'style="width:100%; height:300px;">
                </div>
                </div></div>';
                echo $htmls;

                $counter = 0;
            }
        }

        if ($counter != 3) {
            echo '</div>';
        }
    }


    ?>
    <div class="container">
        <?php

        create_imageColumnByThree($result);

        ?>
    </div>

    </div>
</body>

</html>