<?php

include 'config.php';

session_start();

if (isset($_POST['add_teacher'])) {

    $name = $_POST['name'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = './upload/' . $image;

    $select_teacher_name = mysqli_query($conn, "SELECT name FROM `teacher` WHERE name = '$name'") or die('query failed');

    if (mysqli_num_rows($select_teacher_name) > 0) {
        $message[] = 'Teacher already added';
    } else {
        $add_teacher_query = mysqli_query($conn, "INSERT INTO `teacher`(name, position, email, phonenumber, description, image) VALUES('$name', '$position', '$email', '$phonenumber', '$description' '$image')") or die('query failed');

        if ($add_teacher_query) {
            if ($image_size > 2000000) {
                $message[] = 'Image size is too large';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Teacher added successfully!';
            }
        } else {
            $message[] = 'Teacher could not be added!';
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
    <title>Teachers Staff</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="teacher.css">
</head>

<body>

    <div class="container">
        <!-- Element one -->
        <div class="row text-center py-5">
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/anh-Vu-web-profile-scaled-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">TS. Trần Thế Vũ</h5>
                            <p class="card-text">
                                Trưởng Phòng Đào tạo
                            </p>
                            <h5>
                                <span class="email">vu.tran@vnuk.edu.vn</span>
                            </h5>

                            <p class="card-text">
                                Học phần giảng dạy: Introduction to Computer Science & Programming, Mobile Design and Development, Big Data Analysis, Data Challenge,...
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Ba-Hoi-web-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">TS. Nguyễn Bá Hội</h5>
                            <p class="card-text">
                                Giảng viên
                            </p>
                            <h5>
                                <span class="email">hoi.nguyenba@vnuk.edu.vn</span>
                            </h5>

                            <p class="card-text">
                                (+84) 905 190070
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Design thinking
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Dam-Minh-Tung-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">TS. Đàm Minh Tùng</h5>
                            <p class="card-text">
                                Giảng viên
                            </p>
                            <h5>
                                <span class="email">tung.dam@vnuk.edu.vn</span>
                            </h5>

                            <p class="card-text">
                                (+84) 935 699 049
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Introduction to Operating System
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Nguyen-Van-Tho-cse-min-scaled-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ThS. Nguyễn Văn Thọ</h5>
                            <p class="card-text">
                                Giảng viên, Phụ trách Không gian sáng chế
                            </p>
                            <h5>
                                <span class="email">tho.nguyen@vnuk.edu.vn</span>
                            </h5>

                            <p class="card-text">
                                (+84) 905 061 636
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Element two -->
        <div class="row text-center py-5">
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/A-Thien-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ThS. Nguyễn Chí Thiện</h5>
                            <p class="card-text">
                                Giảng viên
                            </p>
                            <h5>
                                <span class="email">thien.nguyen@vnuk.edu.vn</span>
                            </h5>

                            <p class="card-text">
                                (+84) 358505886
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Introduction to Computer Science and Programming, Probabilities and Statistics
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/TS.-Tran-Ngoc-Anh.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">TS. GVC. Trần Ngọc Anh</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">anhtndalat@gmail.com</span>
                            </h5>

                            <p class="card-text">
                                (+84) 983 185 834
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Data Structures and Algorithms
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Tran-The-Son-web-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">TS. Trần Thế Sơn</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">ttson@vku.udn.vn</span>
                            </h5>

                            <p class="card-text">
                                (0236) 3962978
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Malware Analysis
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Richard-cse-web-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">TS. Richard Sharp</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">richard.sharp@vnuk.edu.vn</span>
                            </h5>

                            <p class="card-text">
                                (+84) 363 907 203
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: English for IT, Web design and development, System Engineering Project - Core
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Element three -->
        <div class="row text-center py-5">
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Thao-Dang-web-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Ms. Đặng Thị Phương Thảo</h5>
                            <p class="card-text">
                                Giảng viên
                            </p>
                            <h5>
                                <span class="email">thao.dang@vnuk.edu.vn</span>
                            </h5>

                            <p class="card-text">
                                (+84) 37 6464 677
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: 3D programming, System engineering project, Object Oriented Programming
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Duc-Tai-cse-web-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ThS. Nguyễn Đức Tài</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">ndtaibk07t4@gmail.com</span>
                            </h5>

                            <p class="card-text">
                                (+84) 9488 08 608
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Introduction to Java Programming
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Vo-Cong-Dinh-cse-web-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ThS. Võ Công Đình</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">dinhvcvn@gmail.com</span>
                            </h5>

                            <p class="card-text">
                                (+84) 905 729 707
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Advanced Web Development
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Quang-Minh-cse-web-400x599.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ThS. Thân Quang Minh</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">minh.than@vnuk.edu.vn</span>
                            </h5>

                            <p class="card-text">
                                (+84) 985 426 317
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Advanced Web Design, Object-Oriented Programming, Advanced Web Development
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Element four -->
        <div class="row text-center py-5">
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Tung-Chi-2-400x553.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Nguyễn Tùng Chi</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">chi.nguyen@vnuk.edu.vn</span>
                            </h5>

                            <p class="card-text">
                                (+84) 937 566 561
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Human-Computer Interaction
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/TNHoang-Oanh-cse-400x551.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Ms. Tôn Nữ Hoàng Oanh</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">oanhtnh@softech.vn</span>
                            </h5>

                            <p class="card-text">
                                (+84) 988 329 355
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Design with Photoshop and Adobe Illustrator
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/my-hang-cse-400x566.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Ms. Trần Mỹ Hằng</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">myhang0311@gmail.com</span>
                            </h5>

                            <p class="card-text">
                                (+84) 93 555 6080
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Software Project Management
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-sm-6 my-3 my-md-0">
                <form action="index.php" method="POST">
                    <div class="card shadow">
                        <div>
                            <img src="./upload/Ha-Thi-Cam-Lai-1-400x567.png" alt="#" class="img-fluid card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Ms. Hà Thị Cẩm Lai</h5>
                            <p class="card-text">
                                Giảng viên thỉnh giảng
                            </p>
                            <h5>
                                <span class="email">htclai@gmail.com</span>
                            </h5>

                            <p class="card-text">
                                (+84) 982 677 851
                            </p>
                            <p class="card-text">
                                Học phần giảng dạy: Software Project Management
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <section class="New game">
            <div class="container">
                <div class="row text-center py-5">
                    <div class="col-md-3 col-sm-6 my-3 my-md-0">
                        <?php
                        $select_teacher = mysqli_query($conn, "SELECT * FROM teacher") or die('query failed');
                        if (mysqli_num_rows($select_teacher) > 0) {
                            while ($fetch_teacher = mysqli_fetch_assoc($select_teacher)) {
                        ?>
                                <form action="" method="POST">
                                    <div class="card shadow">
                                        <div>
                                            <img class="img-fluid card-img-top" src="./upload/<?php echo $fetch_teacher['image']; ?>" alt="">
                                        </div>
                                        <div class="card-body">
                                            <div class="name"><h5 class="card-title"><?php echo $fetch_teacher['name']; ?></h5></div>
                                            <div class="position"><p class="card-text"><?php echo $fetch_teacher['position']; ?></p></div>
                                            <div class="email"><h5><?php echo $fetch_teacher['email']; ?></h5></div>
                                            <div class="phonenumber"><p class="card-text"><?php echo $fetch_teacher['phonenumber']; ?></p></div>
                                            <div class="description"><p class="card-text"><?php echo $fetch_teacher['description']; ?></p></div>
                                        </div>
                                    </div>
                                </form>
                        <?php
                            }
                        } else {
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    
    
    
    
    
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>