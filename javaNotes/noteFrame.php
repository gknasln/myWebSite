<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
  <link rel="stylesheet" href="./stylesheets/noteFrame.css">
</head>
<body>
  <?php

    $servername = "185.216.113.35";
    $username = "gknasln";
    $password = "Gkndb3345";
    $database = "notes";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }  

    $key = "";
    $nameAndDescription = 0;
    $class = 0;
    $resultNumber = 0;

    if(isset($_GET['key']) && $_GET['key'] !== ''){
       $key = htmlspecialchars($_GET['key']);
    } 

    if(isset($_GET['nameAndDescription']) && $_GET['nameAndDescription'] !== ''){
      $nameAndDescription = htmlspecialchars($_GET['nameAndDescription']);
    }

    if(isset($_GET['class']) && $_GET['class'] !== ''){
      $class = htmlspecialchars($_GET['class']);
    }


    $result = "";
    if($class == 0 && $nameAndDescription == 1){
      $result = mysqli_query($conn, "SELECT * FROM java
      WHERE name LIKE '%{$key}%' OR description LIKE '%{$key}%'");
    }else if($class == 1 && $nameAndDescription == 0){
      $result = mysqli_query($conn, "SELECT * FROM java
      WHERE class LIKE '%{$key}%'");
    }else if($class == 1 && $nameAndDescription == 1){
      $result = mysqli_query($conn, "SELECT * FROM java
      WHERE name LIKE '%{$key}%' 
      OR description LIKE '%{$key}%'
      OR class LIKE '%{$key}%'");
    }

    // echo mysql_num_rows($result);
    // if( sizeof(mysql_num_rows($result)) == 0){
      
    // } 
    if($result != ""){
    }
    
    if($class == 1 || $nameAndDescription == 1){
      $resultNumber = mysqli_num_rows($result);
      if($resultNumber == 0){
        echo "
        <div style='color: darkred; padding-top: 50px; text-align: center; font-weight: bold; font-size: 1rem;'>
          Aramanız ile eşleşen bir konu bulunamadı.
        </div>"; 
      }
      while ($row = mysqli_fetch_array($result)){
        echo "
          <form style='width: 100%' method='post' action='./item/index.php' target='_blank'>
            <button class='content' name='id' value=" . $row['id'] . " >
              <span id='item-name'> " .  $row['name'] . " </span> 
              <hr/>
              <span id='item-description'>" . $row['description']  . " </span>  
              <span id='item-class' > <i> " . $row['class'] . " </i> </span>
            </button>
          </form>
          ";
      }
    }else{
      echo "
        <div style='color: darkred; padding-top: 50px; text-align: center; font-weight: bold; font-size: 1rem;'>
          Arama yapabilmek için  iki filtre seçeneğinden birisinin açık olması gerekmektedir! 
        </div>
        ";
    }

  ?>
</body>
</html>