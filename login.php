
<?php
include('config/database.php');

if(isset($_POST['submit']))
{
    extract($_POST);
    $sql = "SELECT * FROM signup WHERE email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        // check the hashed password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        if(password_verify($password, $hashed_password))
        {
           
            header('Location: welcome.php');
        }
        else
        {
            echo "Invalid Password!";
        }
    }else{
        echo "Invalid Email";
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
        <form action="login.php" class="registration-form" method="POST">
            <h2>Login</h2>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <p class="note">Don't have an account <span><a href="index.php">signUp</a></span></p>

        </form>
    </div>
  
</body>
</html>