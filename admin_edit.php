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
   unlink('./upload/' . $fetch_delete_image['image']);
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
   $update_folder = './upload/' . $update_image;
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
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
   <link href="./css/style.css" rel="stylesheet" type="text/css" />
   <title>Admin Edit Teacher Information</title>
</head>

<body>
   <div class="main">
      <section class="add-teacher">
         <div class="container" style="padding-right: 0px;">
            <div class="teaching-content">
               <div class="teaching-image">
                  <img class="teaching-img" src="./imag/t1.png" alt="#">
               </div>
               <div class="teaching-form">
                  <form action="" method="post" enctype="multipart/form-data" id="teaching-form">
                     <h2>Manage Information Teacher!</h2>
                     <div class="form-group form-input">
                        <input type="text" name="name" id="name" value="" required />
                        <label for="name" class="form-label">Teacher name</label>
                     </div>
                     <div class="form-group form-input">
                        <input type="text" name="position" id="position" value="" required />
                        <label for="position" class="form-label">Position</label>
                     </div>
                     <div class="form-group form-input">
                        <input type="text" name="email" id="email" value="" required />
                        <label for="email" class="form-label">Email</label>
                     </div>
                     <div class="form-group form-input">
                        <input type="text" name="phonenumber" id="phonenumber" value="" required />
                        <label for="phonenumber" class="form-label">Phonenumber</label>
                     </div>
                     <div class="form-group form-input">
                        <input type="text" name="description" id="description" value="" required />
                        <label for="description" class="form-label">Description</label>
                     </div>
                     <div>
                        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" required>
                     </div>
                     <div class="form-submit">
                            <input type="submit" value="Add Teacher" class="submit" id="submit" name="add_teacher" />
                            <a href="#" class="vertify-teaching">Verify your Teacher info from your phone</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
   </div>

   <section class="show-teacher">
      <div class="container d-flex flex-wrap justify-content-center">
         <?php
         $select_teacher = mysqli_query($conn, "SELECT * FROM teacher") or die('query failed');
         if (mysqli_num_rows($select_teacher) > 0) {
            while ($fetch_teacher = mysqli_fetch_assoc($select_teacher)) {
         ?>
               <div class="card col-lg-2 border">
                  <img src="./upload/<?php echo $fetch_teacher['image']; ?>" alt="">
                  <div class="name"><h5 class="text-dark text-center"><?php echo $fetch_teacher['name']; ?></h5></div>
                  <div class="position"><p class="text-dark text-center"><?php echo $fetch_teacher['position']; ?></p></div>
                  <div class="email"><h5 class="text-dark text-center"><?php echo $fetch_teacher['email']; ?></h5></div>
                  <div class="phonenumber"><p class="text-dark text-center"><?php echo $fetch_teacher['phonenumber']; ?></p></div>
                  <div class="description"><p class="text-dark text-center"><?php echo $fetch_teacher['description']; ?></p></div>
                  <a href="admin_edit.php?update=<?php echo $fetch_teacher['id']; ?>" class="btn btn-primary m-1 p-0">Update</a>
                  <a href="admin_edit.php?delete=<?php echo $fetch_teacher['id']; ?>" class="btn btn-primary m-1 p-0" onclick="return confirm('delete this teacher?');">Delete</a>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty" style="color:black">No teacher added yet!</p>';
         }
         ?>
      </div>
   </section>
   <section class="edit-teacher">
      <div class="container d-flex flex-wrap justify-content-center mt-3 pb-3">
         <?php
         if (isset($_GET['update'])) {
            $update_id = $_GET['update'];
            $update_query = mysqli_query($conn, "SELECT * FROM teacher WHERE id = '$update_id'") or die('query failed');
            if (mysqli_num_rows($update_query) > 0) {
               while ($fetch_update = mysqli_fetch_assoc($update_query)) {
         ?>

                  <form action="" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
                     <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
                     <div class="py-auto">
                        <img class="img d-block w-100 mb-5" src="upload/<?php echo $fetch_update['image']; ?>" alt="">
                     </div>
                     <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="px-2 py-2 border rounded border-dark mb-2 text-capitalize text-dark" required placeholder="Enter teacher name">
                     <input type="text" name="update_position" value="<?php echo $fetch_update['position']; ?>" class="px-2 py-2 border rounded border-dark mb-2 text-dark" required placeholder="Enter teacher position">
                     <input type="text" name="update_email" value="<?php echo $fetch_update['email']; ?>" class="px-2 py-2 border rounded border-dark mb-2 text-dark" required placeholder="Enter teacher email">
                     <input type="text" name="update_phonenumber" value="<?php echo $fetch_update['phonenumber']; ?>" class="px-2 py-2 border rounded border-dark mb-2 text-dark" required placeholder="Enter teacher phone">
                     <input type="text" name="update_description" value="<?php echo $fetch_update['description']; ?>" class="px-2 py-2 border rounded border-dark mb-2 text-dark" required placeholder="Enter teacher description">
                     <input type="file" class="px-2 py-2 border rounded border-dark mb-2" name="update_image" accept="image/jpg, image/jpeg, image/png">
                     <div class="row d-flex flex-wrap justify-content-center">
                        <input type="submit" value="update" name="update_teacher" class="col-md-5 btn btn-primary m-1 p-2 text-capitalize">
                        <input type="reset" value="cancel" id="close-update" class="col-md-5 btn btn-secondary m-1 py-1 text-capitalize">
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
   </section>


   <!-- <script src="./js/main.js"></script> -->
   <!-- JS -->
   <script src="vendor/jquery/jquery.min.js"></script>
   <!-- <script src="js/main.js"></script> -->
</body>

</html>




