<?php

include 'config.php';


if (isset($_POST['signin'])) {
    $email = mysqli_real_escape_string($conn, $_POST['your_name']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['your_pass']));

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select_users) > 0) {
        header('location: admin_contact.php');
    } else {
        $message[] = 'incorect email or password!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include 'header_admin.php'; ?>
    <!-- Sing in  Form -->
    <div class="container py-5">
        <h1 style="text-align: center; font-size:40px; font-weight:bold;"><span style="color:#8E0D34">VN</span><span style="color:#2A2254">UK</span> LOGIN FORM</h1>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5 col-md-6 pt-5">
                    <img class="img-fluid" style="border-radius: 15px;" src="imag/anh-nen-work-from-home-1-800x601.png" alt="">
                </div>
                <div class="col-lg-7 col-md-6">
                    <form method="POST">
                        <h1 class="text-center pt-5">Sign in</h1>
                        <div>
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <div class="position-relative">
                                <input name="your_name" type="email" class="form-control px-4" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your name">
                                <div class="position-absolute top-0 pt-2 px-1">
                                    <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" name="your_pass" type="email" class="form-control px-4" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" />
                                <div class="position-absolute top-0 pt-2 px-1">
                                    <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Keep Me Logged In</label>
                            <div class="d-flex justify-content-around">
                                <a href="register.php" class="signup-image-link">Create an account</a>
                            </div> 
                        </div>
                        <button name="signin" type="submit" class="btn btn-primary">Log In</button>
                        <div class="mt-3 d-flex justify-content-center">
                            <h4 class="px-2"><span class="social-label">Or login with:</span></h4>
                            <!-- Facebook -->
                            <a class="btn btn-primary mx-4" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-primary" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <a class="btn btn-primary mx-4" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>

                            <!-- Instagram -->
                            <a class="btn btn-primary" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>
    </section>

    </div>

    <?php include 'footer.php'; ?>

</body>

</html>