<?php
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['user-type'];

    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into `registration`(`username`, `password`, `usertype`) values(?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $userType);
        $execval = $stmt->execute();
    
        echo '<p style="color: green;">Registration successful!</p>';
        if($userType === 'admin') {
            echo '<p><a href="index.php">Go to Admin Dashboard</a></p>';
        } else if($userType === 'recruiter') {
            header('Location: recruiter-dashboard.php');
            exit();
        } else if($userType === 'job-seeker') {
            header('Location: job-seeker-dashboard.php');
        }
        $stmt->close();
        $conn->close();
    }
}
?>
