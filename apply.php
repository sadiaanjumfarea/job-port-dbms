<!DOCTYPE html>
<html>
<head>
  <title>Apply and grabb!!</title>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
      font-size: 16px;
      line-height: 1.5;
      margin: 0;
      padding: 0;
    }

    h1 {
      color: #333333;
      font-size: 32px;
      margin-bottom: 20px;
      text-align: center;
    }

    form {
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 20px auto;
      max-width: 500px;
      padding: 20px;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="number"] {
      border: 1px solid #cccccc;
      border-radius: 3px;
      font-size: 16px;
      padding: 10px;
      width: 100%;
    }

    input[type="submit"] {
      background-color: #333333;
      border: none;
      border-radius: 3px;
      color: #ffffff;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
      padding: 10px;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #555555;
    }
  </style>
</head>
<body>
  <h1>Provide Recruiter's ID</h1>
  <form method="post" action="check_job_seeker.php">
    <label for="recruiter-id">Recruiter ID:</label>
    <input type="number" name="recruiter-id" id="recruiter-id">

    <input type="submit" value="submit">
  </form>
</body>
</html>
