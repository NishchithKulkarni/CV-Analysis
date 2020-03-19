<!DOCTYPE html>
<html>
<head>
 <title> CV Extractor</title>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="assets/css/cava_bs.min.css" crossorigin="anonymous">
</head>
<body>
<div style="background-color: #E9C862;padding:10px"><br>
<h6 class="cava_font-weight-bold" style="padding-left: 20px;font-size:24px" align="center"><b><u>C.V EXTRACTOR</u></b></h6>
</div><br>
<div class="cava_container" style="border:2px black solid"><br>
<form method="POST" enctype="multipart/form-data">
	<div class="cava_form-row" >
	<div class="cava_form-group">
		<h4 style="color:#458AA3" align="center" >Select File to Upload</h4>
		<input type="file" name="uploadfile" class="cava_form-control">
		<br>
	</div>
</div>
<div class="cava_form-row">
	<button class="cava_btn cava_btn-primary" style="width:100%" name="pressbtn">CLICK HERE TO AUTOFILL</button>
</div><br>
</form>
<hr><br>
<?php
if (isset($_POST['pressbtn'])) {
	$time=time();
move_uploaded_file($_FILES["uploadfile"]["tmp_name"], "uploads/".$time.basename($_FILES["uploadfile"]["name"]));
$filename="uploads/".$time.basename($_FILES["uploadfile"]["name"]);
$resumefile = fopen($filename, "r");
$filedata=array();$index=0;$words=array();
//echo fread($resumefile,filesize("resume.doc"));
//$filedata=fread($resumefile,filesize("resume.doc"));
/*
$filecontents = file_get_contents($filename);
$words = preg_split('/[\s\n,]+/', $filecontents);
//print_r($words);
*/
while($data=fgets($resumefile))
{
 $filedata[$index++]=$data;
}
foreach ($filedata as $line) {
	//echo $line;
	$words+=preg_split("/[\s,]+/",$line);
}
//print_r($words);
echo '<table class="cava_table" style="border:2px solid black;">
	<tr><td><b>EMAIL:</b></td><td>';
foreach ($words as $word) {
	if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/",$word))
	{
		echo $word.'</td></tr>
	<tr><td><b>PHONE:</b></td><td>';
	}
	if(preg_match("/[0-9]{10}/",$word))
	{
		echo $word.'</td></tr>
	<tr><td><b>DATE OF BIRTH:</b></td><td>';
	}
	if(preg_match("/[0-9]{2}[\/-][0-9]{2}[\/-][0-9]{4}/",$word))
	{
		echo $word.'</td></tr></table>';
	}
}
fclose($resumefile);
}
?>
</div>
<hr><br>
 <footer>
 <div style="background-color: lightblue;padding:10px">
<center><h6 class="cava_font-weight-bold">Developed by:<br>NISHCHITH KULKARNI & NEHA M</h6></center>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>