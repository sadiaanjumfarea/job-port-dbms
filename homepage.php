<!DOCTYPE html>
<html>
<head>
	<title>JobsQueue</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>JobsQueue</h1>
	</header>
	<nav>
    <br>
    <a href="view1.php">CLICK HERE TO LOGIN!!</a>
    
    <br>
  </div>
        
	</nav>
    
    <section>
	<article>
		<h2>Post Title</h2>
		<p>
        <input type="text" placeholder="Post description goes here">
        <input type="submit" value="DISCRIPTION">
        </p>
        <p><br>PLEASE LOGIN TO APPLY!!!!!!!!!!</P>
		<form>
			<input type="submit" value="Like">
		</form>
		<div class="likes">5likes</div>
		<div class="comments">
			<div class="comment">
				<p>Comment Author</p>
				<small>Comment Date</small>
				<p>Comment Text</p>
			</div>
			<form>
				<input type="text" placeholder="Write a comment...">
				<input type="submit" value="Comment">
            <br>
			</form>
		</div>
	</article>
</section>

<script src="script.js"></script>
</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT job.jobt, job.jobd, job.joba, job.jobs FROM job";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='job-table'><tr><th>Job Title</th><th>Job Details</th><th>Job Address</th><th>Salary</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["jobt"]."</td><td>".$row["jobd"]."</td><td>".$row["joba"]."</td><td>".$row["jobs"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

<style>
.job-table {
  border-collapse: collapse;
  width: 100%;
}

.job-table th, .job-table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.job-table th {
  background-color: #4CAF50;
  color: white;
}
</style>
