<?php

include 'config.php';


if (isset($_POST['update_order'])) {

    $contact_update_id = $_POST['order_id'];
    $update_contact = $_POST['update_payment'];
    mysqli_query($conn, "UPDATE `contact` SET description = '$update_contact' WHERE id = '$contact_update_id'") or die('query failed');
    $message[] = 'description status has been updated!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `contact` WHERE id = '$delete_id'") or die('query failed');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <title>Admin Placed Order</title>
</head>
<?php include 'header_admin.php'; ?>

<body>
    <h1 class="pt-4" style="text-align: center; color:#2A2254">Admin Contact</h1>
    <div class="container">

        <div class="row d-flex flex-wrap py-5">
            <?php
            $select_contact = mysqli_query($conn, "SELECT * FROM contact") or die('query failed');
            if (mysqli_num_rows($select_contact) > 0) {
                while ($fetch_contact = mysqli_fetch_assoc($select_contact)) {
            ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-body" style="border-style:solid; border-width: 4px 4px 0 4px; border-color:#7CFC00">
                            <h6 class="text-center">Firstname : <span><?php echo $fetch_contact['firstName']; ?></span> </h6>
                        </div>
                        <div class="card-body" style="border-style:solid; border-width: 4px 4px 0 4px; border-color:#00FFFF">
                            <h6 class="text-center">Lastname : <span><?php echo $fetch_contact['lastName']; ?></span> </h6>
                        </div>
                        <div class="card-body" style="border-style:solid; border-width: 4px 4px 0 4px; border-color:#87CEFA">
                            <h6 class="text-center">Phone Number : <span><?php echo $fetch_contact['phonenumber']; ?></span> </h6>
                        </div>
                        <div class="card-body" style="border-style:solid; border-width: 4px 4px 0 4px; border-color:#FF00FF">
                            <h6 class="text-center">Email : <span><?php echo $fetch_contact['email']; ?></span> </h6>
                        </div>
                        <div class="card-body" style="border-style:solid; border-width: 4px 4px 4px 4px; border-color:#FFE4B5">
                            <h6 class="text-center">Description : <span><?php echo $fetch_contact['description']; ?></span> </h6>
                        </div>
                        <div class="d-flex justify-content-center py-4">
                            <a style="background-color:#8E0D34;" href="admin_contact.php?delete=<?php echo $fetch_contact['id']; ?>" class="btn text-white" onclick="return confirm('delete?');">Delete</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">empty!!!</p>';
            }
            ?>

        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>