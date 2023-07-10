<!DOCTYPE html>

<html>

  <head>

    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="addash.css">

  </head>

  <body>
  <div>
  <div class="admin-logo"></div>
  <h1>Welcome Admin</h1>
  <h4><a href="home.php">Go back to homepage</a></h4>

  </div>
    <h2>Job Seeker Data</h2>
    
    <ul>
      <li><a href="job-seeker-dashboard.php">Job Seeker Dashboard</a></li>
    </ul>
    <?php

      $connect = mysqli_connect('localhost', 'root', '', 'test');

      if (!$connect) {

        die('Connection error: ' . mysqli_connect_error());

      }

      $query = "SELECT id, name, skills, languages, education FROM job_seeker";
      $result = mysqli_query($connect, $query);
      if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
              <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Skills</th>
              <th>Languages</th>
              <th>Education</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['skills'] . "</td>";
          echo "<td>" . $row['languages'] . "</td>";
          echo "<td>" . $row['education'] . "</td>";
          echo "<td><a href='edit-job-seeker.php?id=" . $row['id'] . "'>Edit</a></td>";
          echo "</tr>";
        }

        echo "</table>";
        echo "<h3>Delete Record</h3>";
        echo "<form method='POST' action=''>";
        echo "<label for='id'>Enter Job Seeker ID:</label>";
        echo "<input type='number' name='id' required>";
        echo "<br><br>";
        echo "<input type='submit' name='delete' value='Delete Record'>";
        echo "</form>";

        if (isset($_POST['delete'])) {
          $id = $_POST['id'];
          $query = "DELETE FROM job_seeker WHERE id=$id";
          if (mysqli_query($connect, $query)) {
            echo "Record deleted successfully.";
          } else {
            echo "Error deleting record: " . mysqli_error($connect);
          }
        }
       
      } else {
        echo "No records found.";
      }
      
    ?>
    <h2>Recruiter Data</h2>
    <ul>
      <li><a href="recruiter-dashboard.php">Recruiter Dashboard</a></li>
    </ul>
    <?php
      $connect = mysqli_connect('localhost', 'root', '', 'test');
      if (!$connect) {
        die('Connection error: ' . mysqli_connect_error());
      }
      $query = "SELECT r_id, r_nam, com, j_id, job_d, job_add, salary FROM recuiter";
      $result = mysqli_query($connect, $query);
      if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>
              <tr>
              <th>Recruiter ID</th>
              <th>Recruiter Name</th>
              <th>Company</th>
              <th>Job ID</th>
              <th>Job Description</th>
              <th>Job Address</th>
              <th>Salary</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['r_id'] . "</td>";
          echo "<td>" . $row['r_nam'] . "</td>";
          echo "<td>" . $row['com'] . "</td>";
          echo "<td>" . $row['j_id'] . "</td>";
          echo "<td>" . $row['job_d'] . "</td>";
          echo "<td>" . $row['job_add'] . "</td>";
          echo "<td>" . $row['salary'] . "</td>";
          echo "<td><a href='edit-recruiter.php?r_id=" . $row['r_id'] . "'>update</a></td>";
          echo "</tr>";
        }
        echo "</table>";
        echo "<form method='POST' action=''>";
        echo "<label for='id'>Enter Recruiter ID to delete:</label>";
        echo "<input type='number' name='id' required>";
        echo "<br><br>";
        echo "<input type='submit' name='delete' value='Delete Record'>";
        echo "</form>";
        if (isset($_POST['delete'])) {
          $id = $_POST['id'];
          $query = "DELETE FROM recuiter WHERE r_id=$id";
          if (mysqli_query($connect, $query)) {
            echo "Record deleted successfully.";
          } else {
            echo "Error deleting record: " . mysqli_error($connect);
          }
        }
      } else {
        echo "No records found.";
      }
      
      mysqli_close($connect);