<?php
    include 'connectionpdo.php';
    $did = $_GET['did'];
    $sql = $db->prepare("DELETE FROM booking_tbl WHERE booking_id='$did'");
    $sql->execute();
    echo "<script>
            alert('Booking Successfully Removed');
            window.location.href='adminbookings.php';
            </script>";
    // header('location: adminmovies.php');
?>