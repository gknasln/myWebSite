<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
  <link rel="stylesheet" href="./stylesheets/delete.css">
</head>
<body>
  <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "notes";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }  

    $id = "";

    if(isset($_POST['id']) && $_POST['id'] !== ''){
       $id = htmlspecialchars($_POST['id']);
    } 

    $result = mysqli_query($conn, "SELECT * FROM java
      WHERE (id LIKE '%{$id}%' )");

    $row = mysqli_fetch_array($result);

    $myfile = fopen("./../../" . $row['path'], "r") or die("Unable to open file!");
    $content =  fread($myfile,filesize("./../../" . $row['path']));
    fclose($myfile);

    $conn->close();
  ?>
  <h1>Aşağıda belirtilen <?php echo $id ?> numaralı  konu silinecek. Silmek istediğine emin misin ?</h1>
  <form method="post" action="delete.php"> 
    <input type="text" name="id" value="<?php echo $id ?>"  style="display:none">
    <p>Dosya ismi</p>
    <input type="text" name="name" id="name-field" value="<?php echo $row['name'] ?>" disabled  >
    <p>Dosya açıklaması</p>
    <input type="text" name="description" id="description-field" value="<?php echo $row['description'] ?>"  disabled>
    <p>Sınıf</p>
    <input type="text" name="class" id="class-field" value="<?php echo $row['class'] ?>"  disabled>
    <p>İçerik</p>
    <textarea type="textarea"  id="content-field" disabled> <?php echo $content ?> > </textarea>
    <input type="submit" value="Eminim konuyu silebilirsin!" id="submit-button" >
  </form> 

</body>
</html>