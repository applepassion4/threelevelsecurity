<!DOCTYPE html>
<html>
  
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
  
<body>
    <div id="content">
  
        <form method="POST" action="" enctype="multipart/form-data">
            <p><input type="file" name="uploadfile" value="" /></p>
  
            <div>
                <button type="submit" name="upload">
                  UPLOAD
                </button>
            </div>
        </form>
    </div>


<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




error_reporting(0);
?>
<?php
  $msg = "";
  

  if (isset($_POST['upload'])) {
  
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
    $folder = "image/".$filename;
          

  
        // Get all the submitted data from the form
        $sql = "INSERT INTO images (name,image) VALUES ('$filename','$folder')";
  
        $result=$conn->query($sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
  $result1 = mysqli_query($db, "SELECT * FROM image");
?>


















</body>
  
</html>
</html>