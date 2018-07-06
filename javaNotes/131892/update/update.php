<?php

$validate = "";
$id = "";
$name = "";
$description = "";
$class = "";
$content = "";

if(isset($_POST['id']) && $_POST['id'] !== ''){
  $id = htmlspecialchars($_POST['id']);
}else{
  $validate = "id verisi eksik girildi ";
}

if(isset($_POST['name']) && $_POST['name'] !== ''){
   $name = htmlspecialchars($_POST['name']);
}else{
  $validate = "name verisi eksik girildi!";
}

if(isset($_POST['description']) && $_POST['description'] !== ''){
   $description = htmlspecialchars($_POST['description']);
}else{
 $validate = "Description verisi eksik girildi!";
}

if(isset($_POST['class']) && $_POST['class'] !== ''){
   $class = htmlspecialchars($_POST['class']);
}else{
  $validate = "class verisi eksik girildi!";
}

if(isset($_POST['content']) && $_POST['content'] !== ''){
   $content = $_POST['content'];
}else{
  $validate = "content verisi eksik girildi!";
}


if($validate != ""){
  die($validate);
}
  
$myfile = fopen("./../../files/$id.txt", "w") or die("Unable to open file!"); 
fwrite($myfile, $content);  
fclose($myfile);
 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE java SET name='$name', description='$description', class='$class' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

redirect("index.html");

$conn->close(); 

function redirect($url) {
  ob_start();
  header('Location: '.$url);
  ob_end_flush();
  die();
}
?>