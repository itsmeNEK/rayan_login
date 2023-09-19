<?php
include "database.php";


if (isset($_POST['btn_login'])) {
    login($_POST);
    // print_r($_POST['username']);
}

function login($request)
{
    $conn = databaseConnection();
    $sql = "SELECT * FROM `users` WHERE `username` = '" . $request['username'] . "'";

    if ($result = $conn->query($sql)) {

        $user_data = $result->fetch_assoc();
        if (password_verify($request['password'], $user_data['password'])) {
            header('location: home.php');
            die;
        } else {
            echo "incorrect password";
        }
    } else {
        echo "not exists";
    }
}

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div style="height: 100vh;">

    <div class="row mx-auto my-auto justify-content-center">
      <div class="col-4">
        <form action="" method="post">
          <h4>Login</h4>
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control" />
          <br />
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control" />
          <br />
          <button type="submit" name="btn_login" class="btn btn-primary w-100">Login</button>
        </form>
        <a  href="register.php">Register Account</a>
      </div>
    </div>
  </div>

</body>

</html>