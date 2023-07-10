<!DOCTYPE html>
<html>
<head>
	<title>JobsQueue</title>
	<link rel="stylesheet" href="style1.css">
	<style>
    
	.job-container {
	  width: 80%;
	  margin: auto;
	}
	
	.job-table {
	  border-collapse: collapse;
	  width: 100%;
	}
    h4{text-align: center;}
	
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
        <h4><a href="home.php">Go back to homepage </a>
</h4>
	</header>

	<div class="job-container">
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT job.*, recuiter.r_id FROM job LEFT JOIN recuiter ON job.jobd = recuiter.job_d WHERE  job.jobd IS NOT NULL AND job.joba IS NOT NULL AND job.jobs IS NOT NULL";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    echo "<table class='job-table'><tr><th>Job ID</th><th>Job Details</th><th>Job Address</th><th>Salary</th><th>Recruiter ID</th><th>Apply</th></tr>";
		    while($row = $result->fetch_assoc()) {
		        echo "<tr><td>".$row["jobid"]."</td><td><a href='apply.php'>".$row["jobd"]."</a></td><td><a href='apply.php'>".$row["joba"]."</a></td><td><a href='apply.php'>".$row["jobs"]."</a></td><td><a href='apply/recruiter.php?recruiter_id=".$row["r_id"]."'>".$row["r_id"]."</a></td><td><a href='apply.php?job_id=".$row["jobid"]."'>Apply</a></td></tr>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}

		$conn->close();
		?>
	</div>


</body>
</html>
