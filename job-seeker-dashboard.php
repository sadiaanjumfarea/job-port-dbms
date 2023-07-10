<!DOCTYPE html>
<html>
<head>
	<title>Job Portal</title>
	<link rel="stylesheet" href="job-seeker1-dashboard.css">

</head>
<body>
	<h1>Job Seeker Form</h1>
	<form method="POST" action="job-seeker-dashboard.php">
		<label for="id">ID:</label>
		<input type="text" id="id" name="id" required><br><br>


		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br><br>

		<label for="skills">Skills:</label>
		<input type="text" id="skills" name="skills" required><br><br>

		<label for="languages">Languages:</label>
		<input type="text" id="languages" name="languages" required><br><br>

		<label for="education">Educational Details:</label>
		<textarea id="education" name="education" required></textarea><br><br>

		<label for="resume">Upload Resume:</label>
		<input type="file" id="resume" name="resume" accept=".pdf"><br><br>

		<input type="submit" value="Submit">
	</form>

<p>Looking for searching jobs? Check out our <a href="jobsearch.php">job search page</a>.</p>
<p>Go back to homepage <a href="home.php">HOME</a>.</p>


<?php
	if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['skills']) && isset($_POST['languages']) && isset($_POST['education'])) {
		$conn = mysqli_connect('localhost', 'root', "", 'test');

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "INSERT INTO job_seeker (id, name, skills, languages, education) VALUES (?, ?, ?, ?, ?)";

		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql)) {
			die("Statement preparation failed: " . mysqli_error($conn));
		}
		$id = $_POST['id'];
		$name = $_POST['name'];
		$skills = $_POST['skills'];
		$languages = $_POST['languages'];
		$education = $_POST['education'];

		mysqli_stmt_bind_param($stmt, "issss", $id, $name, $skills, $languages, $education);

		if (mysqli_stmt_execute($stmt)) {
			echo "Data inserted successfully.";
		} else {
			echo "Data insertion failed: " . mysqli_stmt_error($stmt);
		}

		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
?>
