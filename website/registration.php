<?php
require_once 'connection/db_con.php';
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];
    $role_id = 4;
    if ($password != $cpass) {
        die("Password and Confirm Password Are Not Same");
    }



    $password = md5($password);
    $sql = "insert into users (username,email,contact,password,role_id) value('{$username}','{$email}','{$contact}','{$password}','{$role_id}')";
    if ($conn->query($sql)) {
        header("Location:login.php");
    } else {
        header("Location:registration.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Bootstrap Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- get in touch start here -->
    <section class="bg-light py-5">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <div class="bg-primary bg-gradient text-white rounded-3 mb-3 feature">
                    <i class="bi bi-envelope"></i>
                </div>
                <h2 class="fw-bolder"> Registration Page [105]</h2>
                <p class="lead mb-0">Instructor-Md.Tauhidul Alam Sir</p>

            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input id="name" type="text" name="username" class="form-control" placeholder="Email">
                            <label for="name">User Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="email" name="email" class="form-control" placeholder="Enter your email address">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="number" type="text" name="contact" class="form-control" placeholder="Enter your phone number">
                            <label for="number">Contact</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="number" type="password" name="password" class="form-control" placeholder="Enter your phone number">
                            <label for="number">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="number" type="password" name="cpass" class="form-control" placeholder="Enter your phone number">
                            <label for="number">Confirm Password</label>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                        <a href="login.php">Having an Account Please Login</a>
                </div>

                </form>
            </div>
        </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>