<!DOCTYPE html>
<html>
<head>
	<title>JobsQueue</title>
	<link rel="stylesheet" href="style.css">
	<style>
	.job-table {
	  border-collapse: collapse;
	  width: 80%;
	}

	.job-table th, .job-table td {
	  padding: 8px;
	  text-align: left;
	  border-bottom: 1px solid #ddd;
	}

	.job-table th {
	  background-color: black;
	  color: white;
	}
	</style>
</head>
<body>
    <header>
		<h1>JobsQueue</h1>
	</header>

	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT job.*, recuiter.r_id FROM job LEFT JOIN recuiter ON job.jobd = recuiter.job_d";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    echo "<table><tr><th>Job ID</th><th>Job Title</th><th>Job Details</th><th>Job Address</th><th>Salary</th><th>Recruiter ID</th></tr>";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td><a href='apply.php?job_id=".$row["jobid"]."'>Apply for this job</a></td><td><a href='apply.php'>".$row["jobt"]."</a></td><td><a href='apply.php'>".$row["jobd"]."</a></td><td><a href='apply.php'>".$row["joba"]."</a></td><td><a href='apply.php'>".$row["jobs"]."</a></td><td><a href='apply/recruiter.php?recruiter_id=".$row["r_id"]."'>".$row["r_id"]."</a></td></tr>";
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}

	$conn->close();
	?>

</body>
</html>
