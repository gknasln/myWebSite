<?php

$name = htmlspecialchars($_POST['name']);
$description = htmlspecialchars($_POST['description']);
$class = htmlspecialchars($_POST['class']);
$content = $_POST['content'];

$message = "true";
if(!isset($name) || $name === ""){
    $message = "isim verisi girilmedi";
    
}

if(!isset($description) || $description === ""){
    $message = "açıklama bilgisi girilmedi...";
}

if(!isset($class) || $class === ""){
    $message = "sınıf bilgisi girilmedi...";
}

if(!isset($content) || $content === ""){
    $message = "içerik girilmedi";
}

if($message !== "true"){
    die($message);
}

$servername = "185.216.113.35";
$username = "gknasln";
$password = "Gkndb3345";
$dbname = "notes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  

$result = $conn->query('SELECT AUTO_INCREMENT
FROM information_schema.TABLES
WHERE TABLE_SCHEMA = "notes"
AND TABLE_NAME = "java"
');

$nextId = implode(",",$result->fetch_assoc()); 

$myfile = fopen("./../files/$nextId.txt", "w") or die("unable to open file!");
fwrite($myfile, $content);
fclose($myfile);

$sql = "INSERT INTO `java` (`id`, `name`, `description`, `class`, `path`) 
    VALUES (NULL, '$name', '$description', '$class', 'files/$nextId.txt')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 

$conn->close();

// redirect('131892.html');

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
  }
?>
