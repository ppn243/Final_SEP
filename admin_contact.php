<?php

include 'config.php';


if(isset($_POST['update_order'])){

   $contact_update_id = $_POST['order_id'];
   $update_contact = $_POST['update_payment'];
   mysqli_query($conn, "UPDATE `contact` SET description = '$update_contact' WHERE id = '$contact_update_id'") or die('query failed');
   $message[] = 'description status has been updated!';

}

if(isset($_GET['delete'])){
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
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link href="css/admin.css" rel="stylesheet" type="text/css"/>
    <title >Admin Placed Order</title>
</head>
<?php include 'header_admin.php';?>
<body class="bg-primary-color">
    <h1 class="mx-auto py-3 text-color" style="width: 500px;text-align: center; padding-bottom: 25px;">Admin Contact Placed</h1>
    <div class="container">
        <?php
            $select_contact = mysqli_query($conn, "SELECT * FROM `contact`") or die('query failed');
            if(mysqli_num_rows($select_contact) > 0){
                while($fetch_contact = mysqli_fetch_assoc($select_contact)){
        ?>
        <div class="row pb-2">
            <div class="col-md-4 pb-2">
                <div class="card" style="width: auto;">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <p>Firstname : <span><?php echo $fetch_contact['firstName']; ?></span> </p>              
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <p>Lastname : <span><?php echo $fetch_contact['lastName']; ?></span> </p>              
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <p>Phone Number : <span><?php echo $fetch_contact['phonenumber']; ?></span> </p>                
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <p>Email : <span><?php echo $fetch_contact['email']; ?></span> </p>               
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <p>Description : <span><?php echo $fetch_contact['description']; ?></span> </p>               
                        </li>
                    </ul>
                    <a href="admin_contact.php?delete=<?php echo $fetch_contact['id']; ?>" class="btn btn-danger mt-3" onclick="return confirm('delete?');">Delete</a>    
                    </div>
                </div>           
            </div>
            <?php
         }
        }else{
            echo '<p class="empty">no orders placed yet!</p>';
        }
        ?>
        </div>
    </div>
    <?php include 'footer.php';?>
</body>
</html>