<?php
  // $servername = "185.216.113.35";
  $servername = "localhost";
  $username = "root";
  // $username = "gknasln";
  $password = "";
  // $password = "Gkndb3345";
  $dbname = "notes";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  
  $id = htmlspecialchars($_POST['id']);

  
  $result = mysqli_query($conn, "SELECT * FROM java
  WHERE (id LIKE '%{$id}%' )");

  $row = mysqli_fetch_array($result);


  $conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $row['name']; ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="./item.css">    
    <link rel="icon" href="./../icons/java-logo.png">
  </head>
  <body>
    <div class="container">
      <h1><?php echo $row['name']; ?></h1>
      <div id="content">
        <?php  
          $myfile = fopen("./../" . $row['path'], "r") or die("Unable to open file!");
          echo fread($myfile, filesize("./../" . $row['path']));
          fclose($myfile);
        ?>
      </div>
    </div>
</body>
<script src="item.js"> 
  // document.querySelector('#content').innerHTML = message;
</script>
</html>