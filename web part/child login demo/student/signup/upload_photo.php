<?php 
session_start();

//if(!isset($_SESSION['form_2_complete'])) {
//	header("Location: index.php");	
//}
require_once("../../connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $roll_no=$_SESSION['roll_no'];
   // echo $roll_no;
   // echo $target_file;
    //$target_file=$roll_no.".JPG";
    //echo $target_file;
    
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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
if ($_FILES["fileToUpload"]["size"] > 500000) {
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
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>

<html>

<head>
	<title>Welcome Students</title>
	<link rel="stylesheet" href="pure-release-0.6.0/pure-min.css">
</head>

<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    Select your image to upload:
	<input type="hidden" value="1048576">
    <input type="file" name="fileToUpload" id="fileToUpload">
	<button class="pure-button pure-button-primary">Upload Image</button>
</form>

</body>
</html>