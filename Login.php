<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='Log&adm.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="" method="POST">
            <center>
            <input type="email" name="Email" required placeholder="Email"><br>
            <input type="text" name="Nim" require placeholder="Nim"><br>
            <input type="password" name="Password" required placeholder="Password"><br>
            <button type="submit" name="submit" >Submit</button><br>
            <a href="Register.php">or register?</a>
        </center>
        </form> 
    </div>

    <button class="open-button" onclick="back()">Back</button>

<script>
    function back(){
        window.location="index.html";
    }
</script>  

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voting_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['submit'])){
     $Email=$_POST['Email'];
     $Nim=$_POST['Nim'];
     $Password=$_POST['Password'];
    
    $select="select * from pemilih where Email='$Email' and Password='$Password' and Nim='$Nim'";
    $run=mysqli_query($conn,$select);
    
      $row_user=mysqli_fetch_array($run);

      if(is_array($row_user)){
          echo "<script> window.open('LoginSuccess.php','_self') </script>";
          $_SESSION['Email']=$row_user['Email'];
          $_SESSION['Nim']=$row_user['Nim'];
          $_SESSION['Voted']=$row_user['Voted'];
      }else{
          echo "<h5 style='color:red;text-align:center;'>Wrong Username, Nim or Password</h5>".mysqli_error($conn);
      }
}
?>

</body>
</html>