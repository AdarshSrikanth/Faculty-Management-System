<?php
$host = 'localhost';
$user = 'root';
$pass = '';

mysql_connect($host, $user, $pass);

mysql_select_db('staff_details');
?>
<?php

$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO staff_details(imagetmp,imagename) VALUES('$imagetmp','$imagename')";

mysql_query($insert_image);

?>