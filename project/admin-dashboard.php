<!DOCTYPE html>
<html>
<head>
	<title>ADMIN VIEW</title>
	<style>
	</style>
</head>
<body>
	<h1>ADMIN VIEW</h1>
	<form action="insert_data.php" method="post">
		<label for="recruiter-id">Recruiter ID:</label>
		<input type="text" id="recruiter-id" name="recruiter-id" required>

		<label for="recruiter-name">Recruiter Name:</label>
		<input type="text" id="recruiter-name" name="recruiter-name" required>

		<label for="recruiter-company">Company:</label>
		<input type="text" id="recruiter-company" name="recruiter-company" required>

		<label for="job-id">Job ID:</label>
		<input type="text" id="job-id" name="job-id" required>

		<label for="job-title">Job Title:</label>
		<input type="text" id="job-title" name="job-title" required>

		<label for="job-details">Job Details:</label>
		<textarea id="job-details" name="job-details" rows="5" required></textarea>

		<label for="job-address">Job Address:</label>
		<input type="text" id="job-address" name="job-address" required>

		<label for="job-salary">Salary:</label>
		<input type="text" id="job-salary" name="job-salary" required>

		<label for="viva-id">Conduct Viva:</label>
		<input type="text" id="viva-id" name="viva-id">

		<label for="resume-id">Resume ID:</label>
		<input type="text" id="resume-id" name="resume-id">
		
		<input type="submit" value="Submit">
    </form>
</body>
</html>
