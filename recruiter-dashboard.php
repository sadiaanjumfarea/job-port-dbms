<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<html>
<head>
	<title>Recruiter View</title>
	<link rel="stylesheet" href="recstyle.css">
	<style>
	p {text-align: center;}
	p a {display: inline-block;margin-top: 10px;}
	</style>
</head>
<>
	<h1>Recruiter View</h1>
	<form action="insertR_data.php" method="post">
		<label for="recruiter-id">Recruiter ID:</label>
		<input type="text" id="recruiter-id" name="recruiter-id" required>
		<label for="recruiter-name">Recruiter Name:</label>
	<input type="text" id="recruiter-name" name="recruiter-name" required>

	<label for="recruiter-company">Company:</label>
	<input type="text" id="recruiter-company" name="recruiter-company" required>

	<label for="job-id">Job ID:</label>
	<input type="text" id="job-id" name="job-id" required>

	<label for="job-details">Job Details:</label>
	<textarea id="job-details" name="job-details" rows="5" required></textarea>

	<label for="job-address">Job Address:</label>
	<input type="text" id="job-address" name="job-address" required>

	<label for="job-salary">Salary:</label>
	<input type="text" id="job-salary" name="job-salary" required>


	<input type="submit" value="Submit">
</form>

<p>Want to post a job? Check out our <a href="jobsearch.php">job search page</a>.</p>
<p>viva? <a href="appli_procedure.php">click</a>.</p>
<p>Go back to homepage <a href="home.php">HOME</a>.</p>
</body>
</html>