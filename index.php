
<?php
include("config/database.php");

if(isset($_POST['submit'])){
  extract($_POST);
  $sql = "SELECT * FROM signup WHERE username = '$username'";
 // $result = mysqli_query($conn, $sql); 
 $result = $conn->query($sql);
$count_user = $result->num_rows;

$sql = "SELECT * FROM signup WHERE email = '$email'";
$result = $conn->query($sql);
$count_email = $result->num_rows;



if( $count_user==0 && $count_email==0){
  // Insert the user into the database
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password_hash')";
  $result=$conn->query($sql);
  //$result = mysqli_query($conn, $sql);

  if ($result) {
   header("Location: welcome.php");
  } else {
    echo "Error: ".$sql."<br>".$conn->error;
  }

}
else{
 if( $count_user>0 && $count_email>0){
  echo '<script>
  window.location.href = "index.php";
  alert("Username and Email already exists!");
  </script>';
  }else if($count_user>0){
    echo '<script>
      window.location.href = "index.php";
    alert("Username already exists!");
    </script>';  }
    else{
      echo '<script>
        window.location.href = "index.php";
      alert("Email already exists!");
      </script>';  
 }
 
}


 
 

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
        <form action="index.php" class="registration-form" method="POST">
            <h2>Register</h2>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn">Sign Up</button>
            <p class="note">Already has an account <span><a href="login.php">login</a></span></p>
        </form>
    </div>
  
</body>
</html>