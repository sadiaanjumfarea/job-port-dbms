<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$recruiter_id = $_POST["recruiter-id"];
$recruiter_name = $_POST["recruiter-name"];
$recruiter_company = $_POST["recruiter-company"];
$job_id = $_POST["job-id"];
$job_details = $_POST["job-details"];
$job_address = $_POST["job-address"];
$job_salary = $_POST["job-salary"];

$sql_recuiter = "INSERT INTO recuiter (r_id, r_nam, com, j_id, job_d, job_add, salary) 
                 VALUES ('$recruiter_id', '$recruiter_name', '$recruiter_company', '$job_id','$job_details', '$job_address', '$job_salary')";

$sql_job = "INSERT INTO job(jobID, jobd, joba, jobs) 
            VALUES ('$job_id', '$job_details', '$job_address', '$job_salary')";

if (mysqli_query($conn, $sql_recuiter) && mysqli_query($conn, $sql_job)) {
    echo "New records created successfully";
 
} else {
    echo "Error: " . $sql_recuiter . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
