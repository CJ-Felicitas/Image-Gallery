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
    <title>Upload Image</title>
</head>

<body style="background-color: gray;">
<div class="container-fluid">
<br><br><br><br><br>
<div class="row">

<div class="col-lg-4">

</div>
<div class="col-lg-4">

<form action="file_upload_script.php" method="POST" enctype="multipart/form-data">
<input type="file" name="fileToUpload" class="file" style="margin:auto; color:white; font-size:30px">
<br>
<button class="btn-primary btn-lg" style="margin: auto; display:block;" type="submit">Submit Image</button>
</form>
</div>

<div class="col-lg-4">

</div>
</div>

</div>



</body>

</html>