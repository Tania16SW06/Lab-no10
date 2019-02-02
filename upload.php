<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php /*?><body>
<?php
$currentDir = getcwd();
$target_dir = "/uploads/";
$target_file = $currentDir .$target_dir . basename($_FILES["fileupload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo "your choosen file is : ".$imageFileType."</br>";
if(isset($_POST["submit"])) {
	if ($_FILES["fileupload"]["size"] < 16000000) {
	
 // print_r(getimagesize($_FILES["fileupload"]["tmp_name"]));
    if($imageFileType!= "jpg" && $imageFileType != "png" && $imageFileType != "pdf" ) {
        echo "choose only pdf,jpg and png files.</br>";
		echo "you cant upload files with $imageFileType extensions";
		}
		else {
			echo "your file has been uploaded successfully";
			}
		
		}
        else{
  
    echo "Sorry, your file is too large.</br>";}}
 
	

?>
</body><?php */

$currentDir = getcwd();
    $uploadDirectory = "/uploads/";
$fileExtensions = array('jpeg','jpg','png'); // Get all the file extensions

    $fileName = $_FILES['fileupload']['name'];
    $fileSize = $_FILES['fileupload']['size'];
    $fileTmpName  = $_FILES['fileupload']['tmp_name'];
    $fileType = $_FILES['fileupload']['type'];
    $fileExtension = strtolower(end(explode('.', $fileName)));

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } 
    }


?>

























?>
</html>