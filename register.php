<?php

include 'config.php';


if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
    $re_pass = mysqli_real_escape_string($conn, md5($_POST['re_pass']));;

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'User already exits!';
    } else {
        if ($pass != $re_pass) {
            $message[] = 'confrim password not matched!';
        } else {
            mysqli_query($conn, "INSERT INTO `users`(name, email, password, re_password) VALUES ('$name', '$email','$pass', '$re_pass')") or die('query failed');
            $message[] = 'registered successfully';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include 'header_admin.php'; ?>
    <!-- Sign up form -->
    <div class="container py-5">
        <h1 style="text-align: center; font-size:40px; font-weight:bold; padding-top:20px"><span style="color:#8E0D34">VN</span><span style="color:#2A2254">UK</span> REGISTER FORM</h1>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                <form action="" method="POST">
                        <h1 class="text-center pt-5">Sign up</h1>
                        <div>
                            <div>
                                <label for="exampleInputEmail1" class="form-label">Your Name</label>
                                <div class="position-relative">
                                    <input name="name" type="text" class="form-control px-4" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name">
                                    <div class="position-absolute top-0 pt-2 px-1">
                                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="exampleInputEmail2" class="form-label">Email address</label>
                                <div class="position-relative">
                                    <input name="email" type="email" class="form-control px-4" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Your Email">
                                    <div class="position-absolute top-0 pt-2 px-1">
                                        <label for="your_name"><i class="zmdi zmdi-email"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" name="pass" type="email" class="form-control px-4" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" />
                                    <div class="position-absolute top-0 pt-2 px-1">
                                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="exampleInputPassword2" class="form-label">Repeat Your Password</label>
                                <div class="position-relative">
                                    <input type="password" name="re_pass" type="email" class="form-control px-4" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Repeat Your Password" />
                                    <div class="position-absolute top-0 pt-2 px-1">
                                        <label for="your_pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                        </div>
                        <button name="signup" type="submit" class="btn btn-primary"><a style="text-decoration:none" class="text-white" href="login.php">Register</a></button>
                    </form>       
                </div>
                <div class="col-lg-5 col-md-6 pt-5">
                <img style="border-radius:15px;" class="img-fluid" src="imag/anh-nen-work-from-home-1-800x601.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <?php include 'footer.php'; ?>
</body>

</html>