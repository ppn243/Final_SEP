<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chương Trình Đào Tạo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="./css/animate.css">
   <link rel="stylesheet" href="./css/style.css"> -->
    <meta charset="utf-8">
    <!-- <title>Responsive Navbar with Searchbox</title> -->
    <link rel="icon" href="https://scontent.fdad3-4.fna.fbcdn.net/v/t1.6435-9/69415350_2401113013291530_3888430031340306432_n.png?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=a2SCws4A7ZcAX8p17UR&tn=NjHuDh83nBSslWvb&_nc_ht=scontent.fdad3-4.fna&oh=00_AT_-JOZtJSAa9fFga4aLyP9bP1AX3DjUEfqgDeZ8pzQuKA&oe=62FCFE74">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <style>
        .hover {
            display: inline-block;
            position: relative;
            color: #8B4513;
        }

        .hover:after {
            content: '';
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #8B4513;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        .hover:hover:after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }


.topnav {
  overflow: hidden;
  background-color: #2A2254;
  position: relative;
}

.topnav #myLinks {
  display: flex;
}

.topnav a {
  float: left;
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a.icon {
  float: right;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: white;
  border-radius: 15px;
}
    </style>
</head>

<header>
    <!-- Simulate a smartphone / tablet look -->
    <div class="mobile-container">

        <!-- Top Navigation Menu -->
        <div class="topnav d-flex pl-5 py-1">
            <img class="active mr-auto p-2 my-2" src="imag/vnuk.jpg" alt="" height="50">
            <div id="myLinks">
                <a style="text-decoration:none;" href="#news">Cổng sinh viên</a>
                <a style="text-decoration:none;" href="#contact">Làm việc tại VNUK</a>
                <a style="text-decoration:none;" href="#about">Tuyển sinh VNUK</a>
                <a style="text-decoration:none;" href="#about">Cựu sinh viên & Đóng góp</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>


        <!-- End smartphone / tablet look -->
    </div>

    <!-- Second nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link hover" aria-current="page" href="home.php">Tổng Quan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover" href="ctdt.php">Chương Trình Đào Tạo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover" href="teacher_staff.php">Giảng Viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover" href="gc.php">Thông Tin Khác</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hover" href="contact.php">Liên Hệ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myLinks");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>
</header>

</html>