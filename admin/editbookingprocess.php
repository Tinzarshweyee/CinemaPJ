<?php 
    include 'connectionpdo.php';
    $bookingid = $_POST['id'];
    $status = $_POST['status'];

    $sql = $db->prepare("UPDATE booking_tbl SET status='$status' WHERE booking_id='$bookingid'");
    $sql->execute();
    header("location: adminbookings.php");
?>