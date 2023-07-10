<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }
      h1 {
        text-align: center;
        margin-top: 50px;
      }
      .form-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 5px;
        box-shadow: 0 0 10px #888;
      }
      input[type="text"], input[type="password"], select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
      }
      input[type="submit"] {
        background-color: black;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
      }
      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <body>
    <h1>Registration Form</h1>
    <div class="form-container">
      <form action="index2.php" method="post">
        <label for="user-type">Select User Type:</label>
        <select id="user-type" name="user-type" required>
          <option value="">Select User Type</option>
          <option value="recruiter">Recruiter</option>
          <option value="job-seeker">Job Seeker</option>
        </select>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" name="submit" value="Register">
      </form>
    </div>
  </body>
</html>
