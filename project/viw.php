<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>JobsQueue - Login</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      h1 {
        text-align: center;
        margin-top: 50px;
      }
      .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 5px;
        box-shadow: 0 0 10px #888;
      }
      input[type="text"], input[type="password"], select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
      }
      input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
      }
      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <body>
    <h1>JobsQueue</h1>
    <div class="form-container">
      <form action="login.php" method="post">
        <label for="user-type">Select User Type:</label>
        <select id="user-type" name="user-type" required>
          <option value="">Select User Type</option>
          <option value="admin">Admin</option>
          <option value="recruiter">Recruiter</option>
          <option value="job-seeker">Job Seeker</option>
        </select>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" name="submit" value="Login">
      </form>
      <p>Don't have an account? <a href="register.php">Register now!</a></p>
    </div>
  </body>
</html>



<?php
session_start();

if (isset($_POST['usertype'])&& isset($_POST['username']) && isset($_POST['password'])) {
    $usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = mysqli_connect('localhost','usertype','username', 'password', 'test');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $query = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['loggedin'] = true;
        header('Location: register.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>



<?php
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['user-type'];

    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    }
    else 
    {
        $stmt = $conn->prepare("insert into `registration`(`username`, `password`, `usertype`) values(?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $userType);
        $execval = $stmt->execute();
        $query="select * from registration where usertype='$userType',username='$username' and password='$password'";
        $result=mysqli_query($connect,$query);
        if($count>0)
        {
            echo "LOGIN SUCCESSFUL";
        }
        else
        {
            echo "LOGIN  NOT SUCCESSFUL";

        }
        $stmt->close();
        $conn->close();
    }
}
?>
