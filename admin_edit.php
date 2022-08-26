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
    $image_folder = 'upload/' . $image;

    $select_teacher_name = mysqli_query($conn, "SELECT name FROM `teacher` WHERE name = '$name'") or die('query failed');

    if (mysqli_num_rows($select_teacher_name) > 0) {
        $message[] = 'Teacher already added';
    } else {
        $add_teacher_query = mysqli_query($conn, "INSERT INTO `teacher`(name, position, email, phonenumber, description, image) VALUES('$name', '$position','$email', '$phonenumber','$description', '$image')") or die('query failed');

        if ($add_teacher_query) {
            if ($image_size > 2000000) {
                $message[] = 'Image size is too large';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Game added successfully!';
            }
        } else {
            $message[] = 'Teacher could not be added!';
        }
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `teacher` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('upload/' . $fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `teacher` WHERE id = '$delete_id'") or die('query failed');
    //header('location:admin_product.php');
}

if (isset($_POST['update_teacher'])) {

    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_position = $_POST['update_position'];
    $update_email = $_POST['update_email'];
    $update_phonenumber = $_POST['update_phonenumber'];
    $update_description = $_POST['update_description'];

    mysqli_query($conn, "UPDATE `teacher` SET name = '$update_name', position = '$update_position', email = '$update_email', phonenumber = '$update_phonenumber', description = '$update_description' WHERE id = '$update_p_id'") or die('query failed');

    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'upload/' . $update_image;
    $update_old_image = $_POST['update_old_image'];

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image file size is too large';
        } else {
            mysqli_query($conn, "UPDATE teacher SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('upload/' . $update_old_image);
        }
    }

    //header('location:admin_product.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <title>Admin Edit Teacher Information</title>
</head>

<body>
<?php include 'header.php'; ?>
    <section class="add-teacher">
        <div class="container pt-5">
        <h2 style="color:#000080; text-align:center">Manage Information Teacher</h2>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-5 pt-5">
                        <img class="img-fluid" src="imag/t1.png" alt="">
                    </div>
                    <div class="col-lg-6 col-md-7" style="background-color:#FFF0F5;">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- Name input -->
                            <div class="form-outline mb-4">
                                <input name="name" type="text" id="form6Example3" class="form-control" />
                                <label class="form-label" for="form6Example3">Teacher name</label>
                            </div>

                            <!-- Position input -->
                            <div class="form-outline mb-4">
                                <input name="position" type="text" id="form6Example3" class="form-control" />
                                <label class="form-label" for="form6Example3">Position</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input name="email" type="text" id="form6Example4" class="form-control" />
                                <label class="form-label" for="form6Example4">Email</label>
                            </div>

                            <!-- Phonenumber input -->
                            <div class="form-outline mb-4">
                                <input name="phonenumber" type="text" id="form6Example5" class="form-control" />
                                <label class="form-label" for="form6Example5">Phonenumber</label>
                            </div>

                            <!-- Description input -->
                            <div class="form-outline mb-4">
                                <textarea name="description" class="form-control" id="form6Example7" rows="4"></textarea>
                                <label class="form-label" for="form6Example7">Description</label>
                            </div>
                            <!-- Image button -->
                            <div>
                                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" required>
                            </div>
                            <!-- Submit button -->
                            <button name="add_teacher" type="submit" class="btn btn-primary btn-block mb-4 mt-5">Add Teacher</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="show-teacher">
        <div class="container">
            <div class="row d-flex flex-wrap py-5">
                <?php
                $select_teacher = mysqli_query($conn, "SELECT * FROM teacher") or die('query failed');
                if (mysqli_num_rows($select_teacher) > 0) {
                    while ($fetch_teacher = mysqli_fetch_assoc($select_teacher)) {
                ?>
                        <div class="col-lg-4 col-md-6">
                            <img class="img-fluid" src="upload/<?php echo $fetch_teacher['image']; ?>" alt="">
                            <div class="name">
                                <h5 class="text-dark text-center"><?php echo $fetch_teacher['name']; ?></h5>
                            </div>
                            <div class="position">
                                <p class="text-dark text-center"><?php echo $fetch_teacher['position']; ?></p>
                            </div>
                            <div class="email">
                                <h5 class="text-dark text-center"><?php echo $fetch_teacher['email']; ?></h5>
                            </div>
                            <div class="phonenumber">
                                <p class="text-dark text-center"><?php echo $fetch_teacher['phonenumber']; ?></p>
                            </div>
                            <div class="description">
                                <p class="text-dark text-center"><?php echo $fetch_teacher['description']; ?></p>
                            </div>
                            <div class="d-flex justify-content-center py-4">
                                <a style="background-color:#8E0D34;" href="test.php?update=<?php echo $fetch_teacher['id']; ?>" class="btn text-white mx-3">Update</a>
                                <a style="background-color:#8E0D34;" href="test.php?delete=<?php echo $fetch_teacher['id']; ?>" class="btn text-white" onclick="return confirm('delete this teacher?');">Delete</a>
                            </div>

                        </div>
                <?php
                    }
                } else {
                    echo '<p class="empty" style="color:black">No teacher added yet!</p>';
                }
                ?>
            </div>

        </div>
    </section>
    <section class="edit-teacher">
        <div class="container">
            <div class="row d-flex flex-wrap py-5">
                <?php
                if (isset($_GET['update'])) {
                    $update_id = $_GET['update'];
                    $update_query = mysqli_query($conn, "SELECT * FROM teacher WHERE id = '$update_id'") or die('query failed');
                    if (mysqli_num_rows($update_query) > 0) {
                        while ($fetch_update = mysqli_fetch_assoc($update_query)) {
                ?>   
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
                                <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
                                <div class="d-flex justify-content-center pb-5">
                                    <img class="img-fluid" src="upload/<?php echo $fetch_update['image']; ?>" alt="">
                                </div>
                                <!-- Name input -->
                                <div class="form-outline mb-4">
                                    <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" name="name" id="form6Example3" class="form-control" />
                                    <label class="form-label" for="form6Example3">Teacher name</label>
                                </div>

                                <!-- Position input -->
                                <div class="form-outline mb-4">
                                    <input name="update_position" value="<?php echo $fetch_update['position']; ?>" id="form6Example3" class="form-control" />
                                    <label class="form-label" for="form6Example3">Position</label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input name="update_email" value="<?php echo $fetch_update['email']; ?>" id="form6Example4" class="form-control" />
                                    <label class="form-label" for="form6Example4">Email</label>
                                </div>

                                <!-- Phonenumber input -->
                                <div class="form-outline mb-4">
                                    <input name="update_phonenumber" value="<?php echo $fetch_update['phonenumber']; ?>" id="form6Example5" class="form-control" />
                                    <label class="form-label" for="form6Example5">Phonenumber</label>
                                </div>

                                <!-- Description input -->
                                <div class="form-outline mb-4">
                                    <textarea name="update_description" value="<?php echo $fetch_update['description']; ?>" class="form-control" id="form6Example7" rows="4"></textarea>
                                    <label class="form-label" for="form6Example7">Description</label>
                                </div>
                                <!-- Image button -->
                                <div>
                                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" required>
                                </div>
                                <!-- Submit button -->
                                <div class="row d-flex flex-wrap justify-content-center">
                                    <input type="submit" value="update" name="update_teacher" class="btn btn-primary btn-block mb-4 mt-5">
                                    <input type="reset" value="cancel" id="close-update" class="btn btn-primary btn-block mb-4 mt-5">
                                </div>
                            </form>

                <?php
                        }
                    }
                } else {
                    echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
                }
                ?>
            </div>

        </div>
    </section>
    <?php include 'footer.php'; ?>

    <!-- <script src="./js/main.js"></script> -->
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
</body>

</html>