<?php
if (isset($_POST['submit'])) {
  
  $user_type = $_POST['user-type'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $connect = mysqli_connect('localhost', 'root', '', 'test');
  
  if (!$connect) {
    die('Connection error: ' . mysqli_connect_error());
  }
  
  if ($user_type == 'admin' && $username == 'abcd' && $password == '9876') {
    echo "Redirecting to admin dashboard...";
    header('Location: addashboard.php');
    exit();
  } else {
    $query = "SELECT * FROM registration WHERE usertype='$user_type' AND username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);
  
    if ($result && mysqli_num_rows($result) > 0) {
      if ($user_type == 'recruiter') {
        echo "Redirecting to recruiter dashboard...";
        header('Location: recruiter-dashboard.php');
        exit();
      } elseif ($user_type == 'job-seeker') {
        echo "Redirecting to job seeker dashboard...";
        header('Location: job-seeker-dashboard.php');
        exit();
      }
    } else {
      echo "<p style='text-align: center;'>Incorrect username or password. Please try again.</p>";
    }
  }
  
  mysqli_close($connect);
}
