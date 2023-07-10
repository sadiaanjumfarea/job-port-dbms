<?php
  $connect = mysqli_connect('localhost', 'root', '', 'test');
  if (!$connect) {
    die('Connection error: ' . mysqli_connect_error());
  }
  
  if (isset($_POST['update'])) {
    $r_id = $_POST['r_id'];
    $r_nam = $_POST['r_nam'];
    $com = $_POST['com'];
    $j_id = $_POST['j_id'];
    $job_d = $_POST['job_d'];
    $job_add = $_POST['job_add'];
    $salary = $_POST['salary'];

    $query = "UPDATE recuiter SET r_nam='$r_nam', com='$com', j_id='$j_id',  job_d='$job_d', job_add='$job_add', salary='$salary' WHERE r_id=$r_id";

    if (mysqli_query($connect, $query)) {
      echo "Record updated successfully.";
    } else {
      echo "Error updating record: " . mysqli_error($connect);
    }
  }

  $r_id = $_GET['r_id'];
  $query = "SELECT * FROM recuiter WHERE r_id=$r_id";
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_assoc($result);
?>
<form method='POST' action=''>
  <input type='hidden' name='r_id' value='<?php echo $row['r_id']; ?>'>
  <label for='r_nam'>Recruiter Name:</label>
  <input type='text' name='r_nam' value='<?php echo $row['r_nam']; ?>' required>
  <br><br>
  <label for='com'>Company:</label>
  <input type='text' name='com' value='<?php echo $row['com']; ?>' required>
  <br><br>
  <label for='j_id'>Job ID:</label>
  <input type='number' name='j_id' value='<?php echo $row['j_id']; ?>' required>
  <br><br>
  <label for='job_d'>Job Description:</label>
  <textarea name='job_d' required><?php echo $row['job_d']; ?></textarea>
  <br><br>
  <label for='job_add'>Job Address:</label>
  <textarea name='job_add' required><?php echo $row['job_add']; ?></textarea>
  <br><br>
  <label for='salary'>Salary:</label>
  <input type='number' name='salary' value='<?php echo $row['salary']; ?>' required>
  <br><br>
  <input type='submit' name='update' value='Update Record'>
</form>
<p>Go back to homepage <a href="home.php">HOME</a>.</p>
<?php
  mysqli_close($connect);
?>
