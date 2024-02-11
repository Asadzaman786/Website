<?php
require_once 'connection/db_con.php';
$error = array();
$username = '';
$email = '';
$contact = '';
if (isset($_POST['register'])) {
    /*echo '<pre>';
    print_r($_POST);*/

    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];
    $role_id = 4;
    if ($password != $cpass) {
        die("Password and Confirm Password Are Not Same");
    }

    if (empty($username)) {
        $error['username'] = "Username Required";
    } else {
        /* == Check username exixts ==  */
        $usql = "select * from users where username = '{$username}'";
        $u_result = $conn->query($usql);
        if ($u_result->num_rows > 0) {
            $error['username'] = "User Already Exists";
        }
    }
    if (empty($email)) {
        $error['email'] = "Email Required";
    } else {
        /* == Check email exixts ==  */
        $esql = "select * from users where email = '{$email}'";
        $e_result = $conn->query($esql);
        if ($e_result->num_rows > 0) {
            $error['email'] = "Email Already Exists";
        }
    }
    if (empty($contact)) {
        $error['contact'] = "Contact Required";
    } else {
        /* == Check email exixts ==  */
        $csql = "select * from users where contact = '{$contact}'";
        $c_result = $conn->query($csql);
        if ($c_result->num_rows > 0 && !empty($contact)) {
            $error['contact'] = "Contact Already Exists";
        }
    }

    if(count($error) == 0){
        $password = md5($password);
        $sql = "insert into users (username,email,contact,password,role_id) value('{$username}','{$email}','{$contact}','{$password}','{$role_id}')";
        if ($conn->query($sql)) {
            header("Location:login.php");
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
                <?php foreach($error as $e) { ?>
                <p class="text-danger"><?= $e; ?></p>
                <?php } ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input id="name" type="text" value="<?= $username; ?>" name="username" class="form-control" placeholder="Email">
                            <label for="name">User Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="email" name="email" value="<?= $email; ?>" class="form-control" placeholder="Enter your email address">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input id="number" type="text" value="<?= $contact; ?>" name="contact" class="form-control" placeholder="Enter your phone number">
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