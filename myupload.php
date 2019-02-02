<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
 if (isset($_POST['upload'])) {

$currentDir = getcwd();
    $uploadDirectory = "/uploads/";


    $fileName = $_FILES['text']['name'];
	$_SESSION['filename']=$fileName;
    $fileSize = $_FILES['text']['size'];
    $fileTmpName  = $_FILES['text']['tmp_name'];
    $fileType = $_FILES['text']['type'];

	$uploadPath = $currentDir . $uploadDirectory . basename($fileName); 
	// move_uploaded_file($uploadPath);
	move_uploaded_file($_FILES["text"]["tmp_name"], $uploadPath);
	
	if (file_exists($uploadPath)) {
          
     $_SESSION['abc']=  basename($fileName); 
	 echo   $_SESSION['abc'];
	$_SESSION['path']=$uploadPath;
	echo "submitted successfully.</br>";
	}
	else{
		echo "failed";
		}
        
    }?>
    <form action="myupload.php" enctype="multipart/form-data" method="post">

<input type="submit" name="read"  value="read" />

</form>
	
	
	<?php
	
	  if (isset($_POST['read'])) {
		 $myfile = fopen($_SESSION['path'], "r") or die("Unable to open file!");
echo fread($myfile,filesize(	$_SESSION['path']));
echo "</br>";
fclose($myfile); 
		  }


?>
<br />
<form action="myupload.php" enctype="multipart/form-data" method="post">

<input type="submit" name="delete" value="Delete">
</form>
	<?php
	
	  if (isset($_POST['delete'])) {
		// $myfile = fopen($_SESSION['path'], "r") or die("Unable to open file!");
		
if(unlink($_SESSION['path'])) echo "Deleted file ";

echo "File has been deleted</br>";
 
		  }


?>

<br />
<form action="myupload.php" enctype="multipart/form-data" method="post">
<input type="text area" style="height:200px;width:500px"  name="mytext"/></br>
<input type="submit" name="write" value="Write"></form>
</br></br>

<?php
	
	  if (isset($_POST['write'])) {
$val=$_POST['mytext'];
$file=fopen($_SESSION['path'], "a");
  fwrite($file, $val);
  fclose($file);

	  }
?>
<form action="myupload.php" enctype="multipart/form-data" method="post">
<input type="text" name="renametext" placeholder="enter the new name to rename your file" /></br></br>
<input type="submit" name="rename" value="Rename"/></br></br>
</form>
<?php
	
	  if (isset($_POST['rename'])) {
$value=$_POST['renametext']; 
$value="$value.txt";
rename("C:\\xampp\\htdocs\\uploads\\".$_SESSION['abc'],"C:\\xampp\htdocs\\uploads\\".$value);

echo $value;
	  }
?>
</br></br>  <form action="myupload.php" enctype="multipart/form-data" method="post">
<input type="submit" name="copy"  value="Copy" />
</form>
	<?php

	  if (isset($_POST['copy'])) {
copy ($_SESSION['path'],"C:\\xampp\htdocs\\uploads\\"."copy".$_SESSION['abc'] );
	  }
?>

</br></br></br>


</body>
</html>