<?php

$validate = "";
$id = ""; 

if(isset($_POST['id']) && $_POST['id'] !== ''){
  $id = htmlspecialchars($_POST['id']);
}else{
  $validate = "id verisi eksik girildi ";
}
 

if($validate != ""){
  die($validate);
}
   

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

$sql = "DELETE FROM java WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully <br>";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  
$file = "./../../files/$id.txt";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }


// redirect("index.html");

$conn->close(); 

function redirect($url) {
  ob_start();
  header('Location: '.$url);
  ob_end_flush();
  die();
}
?>