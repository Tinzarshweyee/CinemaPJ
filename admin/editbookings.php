<?php 
    include 'adminheader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Movies</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="admin.css" />
</head>
<body>
	<div class="body">
    <h1>Booking Update</h1>
    <p>Please fill in this form to update the bookings</p>
    <?php 
        include 'connectionpdo.php';
        $eid = $_GET['eid']; 
        $sql = $db->prepare("SELECT * FROM booking_tbl WHERE booking_id='$eid'");
        $sql->execute();
        $row=$sql->fetch(PDO::FETCH_ASSOC);
        extract($row);
    ?>
    <form action="editbookingprocess.php" method="POST" enctype="multipart/form-data">
	    <input type="hidden" name="id" value="<?php echo $booking_id;?>">
        <label for="status"><b>Booking Status</b></label>
        <input type="text" name="status" value="<?php echo $status;?>">
        <button type="submit" class="signupbtn" name="submit">Update</button>
        <a href="adminbookings.php"><button type="button" class="cancelbtn">Cancel</button></a>
    </form>

</body>
</html>