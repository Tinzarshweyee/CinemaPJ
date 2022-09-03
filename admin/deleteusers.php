<?php
    include 'connectionpdo.php';
    $did = $_GET['did'];
    $sql = $db->prepare("DELETE FROM user_tbl WHERE user_id='$did'");
    $sql->execute();
    echo "<script>
            alert('User Successfully Removed');
            window.location.href='adminusers.php';
            </script>";
    // header('location: adminmovies.php');
?>