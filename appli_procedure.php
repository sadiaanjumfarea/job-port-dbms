<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}


if(isset($_POST['job_seeker_id'])) {

  $job_seeker_id = $_POST['job_seeker_id'];

} elseif(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], "recruiter_dashboard.php") !== false) {

  $job_seeker_id = ""; 

} else {

  $job_seeker_id = "";

}

 

if(!empty($job_seeker_id)) {

  // Prepare and execute a parameterized query to fetch job seeker data from the job_seeker table

  $sql = "SELECT id, name, languages, skills, education FROM job_seeker WHERE id = ?";

  $stmt = $conn->prepare($sql);

  $stmt->bind_param("i", $job_seeker_id);

  $stmt->execute();

  $result = $stmt->get_result();

 

  if ($result->num_rows > 0) {


    echo "<table>

          <tr>

            <th>ID</th>

            <th>Name</th>

            <th>Languages</th>

            <th>Skills</th>

            <th>Education</th>

            <th>Viva</th>

          </tr>";
    while($row = $result->fetch_assoc()) {

      echo "<tr>

              <td>".$row["id"]."</td>

              <td>".$row["name"]."</td>

              <td>".$row["languages"]."</td>

              <td>".$row["skills"]."</td>

              <td>".$row["education"]."</td>

              <td>

                <select>

                  <option value='yes'>Yes</option>

                  <option value='no'>No</option>

                </select>

              </td>

            </tr>";

    }

    echo "</table>";

  }
  $stmt->close();

}



$conn->close();

?>

 

<!DOCTYPE html>

<html>

  <head>

    <title>Job Seeker Data</title>

  </head>

  <body>

    <?php

      // Show the HTML form only if the referring page is not recruiter_dashboard.php

      if(empty($job_seeker_id) && (!isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], "recruiter_dashboard.php") === false)) {

    ?>

      <h1>Enter your Job Seeker ID</h1>

      <form method="post" action="">

        <input type="text" name="job_seeker_id" required>

        <input type="submit" value="Submit">

      </form>

    <?php

      }

    ?>

  </body>

</html>

<!DOCTYPE html>

<html>

  <head>

    <title>Job Seeker Data</title>

    <style>

      table {

        border-collapse: collapse;

        width: 100%;

      }

      th, td {

        text-align: left;

        padding: 8px;

      }

      th {

        background-color: #f2f2f2;

      }

      tr:nth-child(even) {

        background-color: #f2f2f2;

      }

      form {

        margin-top: 50px;

        text-align: center;

      }

      input[type="text"] {

        padding: 10px;

        font-size: 16px;

        border: none;

        border-radius: 5px;

        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);

        margin-right: 10px;

      }

      input[type="submit"] {

        padding: 10px 20px;

        font-size: 16px;

        background-color: #4CAF50;

        color: white;

        border: none;

        border-radius: 5px;

        cursor: pointer;

        transition: all 0.3s ease;

      }

      input[type="submit"]:hover {

        background-color: #3e8e41;

      }

    </style>

  </head>

  <body>

