<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$myfile = fopen("tania.txt", "w+") or die("Unable to open file!");
$result=fwrite($myfile,"Hello world");
if($result){
	echo "file created";}
else{
	echo "file not created";
	}
echo "</br>";
$reading=fopen("Tania.txt.txt","r");
while(!feof($reading)){
	echo (fgets($reading)."</br>");
	
	}
	$str = file_get_contents("Tania.txt.txt");
	echo $str;
echo "</br>";echo "</br>";
$array = file("Tania.txt.txt") or die("Can not read from file");
// count lines in the file
echo "Counted " . count($array) ." line(s). <br>";
$numCharSpace = strlen($str);
echo "Counted " .$numCharSpace. " character(s) with space.<br>";
$numWords = str_word_count($str);
echo "Counted " . $numWords . " word(s).<br>";
echo "using explode function.</br>";

$array1 = explode(" ", $str);
//print_r ($array1);
    echo"counter words:" .count($array1);

?>



</body>
</html>