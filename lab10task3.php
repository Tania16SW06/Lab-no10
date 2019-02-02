<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
$newLine = "16SW06";
$filehandle=fopen('tania16sw06.txt','a+');
$result=fwrite($filehandle,'hello tania.'.$newLine);
$file=fopen('tania16sw06.txt','r');
$show=fread($file,1024);
echo $show;





?>
</body>
</html>