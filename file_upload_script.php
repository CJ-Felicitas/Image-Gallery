

<?php


/*
$file_upload = "file_upload";
$name = "name";
$target_directory = "images/";
$target_file = $target_directory.basename($_FILES['fileUpload'][$name]);

if (isset($_POST['submit'])) {
    move_uploaded_file($_FILES['fileUpload']['tmp_name'],$target_file);
}
*/



$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 90000000000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database_name = "imageGallery";

    $conn = new mysqli($hostname,$username,$password,$database_name);
    
    if ($conn->connect_error) {
    die("Could not establish a connection to the server");
  
    }

    $sql_query = "INSERT INTO imageGallery (dir) VALUES('$target_file');";
    mysqli_query($conn,$sql_query);



    
    header("Location: image_upload.php?uploaded");






  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
