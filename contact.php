<?php

include 'config.php';

if (isset($_POST['submit'])) {

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $phonenumber = $_POST['phonenumber'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $contact_query = mysqli_query($conn, "SELECT * FROM contact WHERE firstName = '$firstName' AND email = '$email' AND lastName = '$lastName' AND phonenumber = '$phonenumber' AND description = '$description'") or die('query failed');
    if (mysqli_num_rows($contact_query) > 0) {
        $message[] = 'contact already placed!';
    } else {
        mysqli_query($conn, "INSERT INTO `contact`(firstName, lastName, email, phonenumber, description) VALUES('$firstName', '$lastName', '$email', '$phonenumber', '$description')") or die('query failed');
        $message[] = 'contact placed successfully!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        input[type=submit] {
            background-color: #8E0D34;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #bd063d;
        }
    </style>
</head>

<body>
<?php include 'header.php';?>
    <div class="container my-5">
        <div class="row">
            <div class="col-8">
                <h1 style="color: #2A2254;">Contact</h1>
                <hr style="border:0">
                <p class="fst-italic fw-bold" style="color: #4E4545;">Chương trình đào tạo của VNUK được tư vấn về chuyên môn bởi các giáo sư của Đại học Aston, Vương quốc Anh – đối tác chiến lược của VNUK do Chính phủ Anh giới thiệu và giao nhiệm vụ hỗ trợ VNUK. </p>
                <hr style="border:0">
                <p><span class="fw-bold">Email:</span><span class="fst-italic"> cse@vnuk.edu.vn</span></p>
                <hr class="border:0">
                <h2 style="color: #2A2254;">What You Get When Asking Your Question</h2>
                <ul>
                    <li>Less than 12-hour response to your question.</li>
                    <li>Less than 12-hour response to your question.</li>
                    <li>Less than 12-hour response to your question.</li>
                </ul>
                <form action="" method="POST">
                    <div class="row my-5">
                        <div class="col-6">
                            <h5>First Name<span style="color:red">*</span></h5>
                            <div class="input-group mb-3">
                                <input name="firstName" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <h5>Email Address<span style="color:red">*</span></h5>
                            <div class="input-group mb-3">
                                <input name="email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="col-6">
                            <h5>Last Name<span style="color:red">*</span></h5>
                            <div class="input-group mb-3">
                                <input name="lastName" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                            <h5>Phone Number<span style="color:red">*</span></h5>
                            <div class="input-group mb-3">
                                <input name="phonenumber" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                    </div>
                    <h5>How may we help you<span style="color:red">*</span></h5>
                    <textarea id="subject" name="description" placeholder="Write something.." style="height:auto; width:100%"></textarea>
                    <br>
                    <input class="mt-3" type="submit" value="Send" name="submit">
                </form>

            </div>
            <div class="col-4">
                <img class="img-fluid" src="./imag/pic2.jpg" alt="#">
                <div class="mt-3" style="border:hidden; background-color: #8E0D34">
                    <h6 style="text-align: center; color:white" class="pt-3">Tổ Khoa học và Công nghệ</h6>
                    <p class="px-3" style="text-align:center; color:white;">Add 158A Lê Lợi, Hải Châu 1, Hải Châu, Đà Nẵng <br>Tel: (0236) 37 38 399 </p>
                    <p style="text-align:center; color:white">Thứ Hai – Thứ Sáu, 8:00 – 17:00</p>
                    <h5 style="text-align: center; color:white">Thông tin mạng xã hội</h5>
                    <div class="d-flex justify-content-center pt-3">
                        <i class="fa-regular fa-message px-2"></i>
                        <i class="fa-brands fa-facebook px-2"></i>
                        <i class="fa-brands fa-youtube px-2"></i>
                        <i class="fa-brands fa-instagram px-2"></i>
                    </div>
                    <h5 class="pt-4" style="text-align: center; color:white">Truy cập nhanh</h5>
                    <hr style="border:0,">
                    <p style="text-align: center;"><a href="https://vnuk.edu.vn/khoa-hoc-du-lieu/" class="text-white">Khoa học Dữ liệu</a></p>
                    <hr style="border:0,">
                    <p style="text-align: center;"><a href="https://vnuk.edu.vn/quan-tri-va-kinh-doanh-quoc-te/" class="text-white">Quản trị và Kinh doanh quốc tế</a></p>
                    <hr style="border:0,">
                    <p style="text-align: center;"><a href="https://vnuk.edu.vn/quan-tri-kinh-doanh-so/" class="text-white">Quản trị Kinh doanh Số</a></p>
                    <hr style="border:0,">
                    <p style="text-align: center;"><a href="https://vnuk.edu.vn/marketing-huong-du-lieu/" class="text-white">Phân tích Marketing</a></p>
                    <hr style="border:0,">
                    <p style="text-align: center;"><a href="#" class="text-white">Công nghệ Nano</a></p>
                    <hr style="border:0," class="pb-5">
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/7a21b9028f.js" crossorigin="anonymous"></script>
</body>
<?php include 'footer.php';?>
</html>