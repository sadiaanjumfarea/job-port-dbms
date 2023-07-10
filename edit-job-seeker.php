<?php
$connect = mysqli_connect('localhost', 'root', '', 'test');

if (!$connect) {
  die('Connection error: ' . mysqli_connect_error());
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT id, name, skills, languages, education FROM job_seeker WHERE id=$id";
  $result = mysqli_query($connect, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Record</title>
  <style>
    label {
      display: inline-block;
      width: 100px;
      text-align: right;
      margin-right: 10px;
    }
    input[type="text"] {
      width: 200px;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    input[type="submit"] {
      padding: 5px 10px;
      background-color: #007bff;
      color: #fff;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #0069d9;
    }
  </style>
</head>
<body>
  <h3>Update Record</h3>
  <form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <br><br>
    <label for="skills">Skills:</label>
    <input type="text" name="skills" value="<?php echo $row['skills']; ?>" required>
    <br><br>
    <label for="languages">Languages:</label>
    <input type="text" name="languages" value="<?php echo $row['languages']; ?>" required>
    <br><br>
    <label for="education">Education:</label>
    <input type="text" name="education" value="<?php echo $row['education']; ?>" required>
    <br><br>
    <input type="submit" name="update" value="Update Record">
  </form>
  <p>Go back to homepage <a href="home.php">HOME</a>.</p>

</body>
</html>

<?php
    if (isset($_POST['update'])) {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $skills = $_POST['skills'];
      $languages = $_POST['languages'];
      $education = $_POST['education'];
      $query = "UPDATE job_seeker SET name='$name', skills='$skills', languages='$languages', education='$education' WHERE id=$id";
      if (mysqli_query($connect, $query)) {
        echo "Record updated successfully.";
      } else {
        echo "Error updating record: " . mysqli_error($connect);
      }
    }
  } else {
    echo "No records found.";
  }
} else {
  header("Location: job-seeker-dashboard.php");
}

?>
