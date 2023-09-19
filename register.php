<?php
include "database.php";


if (isset($_POST['btn_register'])) {
    if($_POST['password'] == $_POST['confirm_password']) {
        register($_POST);
    } else {
        echo "Password and confirm password does not match!";
    }
}

function register($request)
{
    $conn = databaseConnection();
    $sql = "INSERT INTO `users` (`username`,`password`) VALUES ('" . $request['username'] . "','" . password_hash($request['password'], PASSWORD_DEFAULT) . "')";

    if ($conn->query($sql)) {
        header('location: index.php');
        die;
    } else {
        echo "Not registered";
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div style="height: 100vh;">

        <div class="row mx-auto my-auto justify-content-center">
            <div class="col-4">
                <form action="" method="post">
                    <h4>register</h4>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" />
                    </div>
                    <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
                    </div>
                    <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" />
                    </div>
                    <button type="submit" name="btn_register" class="btn btn-primary w-100">register</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>