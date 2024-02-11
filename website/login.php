<?php
session_start();
if ($_SESSION) {
    header('Location:dashboard.php');
}
require_once 'connection/db_con.php';
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "select id,username,role_id from users where (username ='{$username}' or email ='{$username}' or contact ='{$username}') and password='{$password}'";
    //echo $sql;die;
    if($conn->query($sql)){
        $result = $conn->query($sql);
            if(mysqli_num_rows($result) == 1){
            $u_data = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $u_data['user_id'];
            $_SESSION['username'] = $u_data['username'];
            $_SESSION['role_id'] = $u_data['role_id'];
            header('Location:dashboard.php');
        }else{
            $_SESSION['error_msg'] = "<p class='text-center text-danger fs-4'>Your Provided Username or email or contact and Password Does not match</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
                <h2 class="fw-bolder">Login</h2>
                <p class="lead mb-0">Instructor- Md. Tauhidul Alam Sir</p>
            </div>
            <?php 
            if(isset($_SESSION['error_msg'])){
                echo $_SESSION['error_msg'];
                unset($_SESSION['error_msg']);
            }
            ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post">

                        <div class="form-floating mb-3">
                            <input id="name" name="username" type="text" class="form-control" placeholder="Email">
                            <label for="name">User Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="number" name="password" type="text" name="password" class="form-control" placeholder="Enter your phone number">
                            <label for="number">Password</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
                        </div>
                        <a href="registration.php">No Account ? Please Register</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>