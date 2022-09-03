<?php
    include 'connectionpdo.php';
    $did = $_GET['did'];
    $sql = $db->prepare("DELETE FROM comment_tbl WHERE comment_id='$did'");
    $sql->execute();
    echo "<script>
            alert('Comment Successfully Removed');
            window.location.href='admincomments.php';
            </script>";
    // header('location: adminmovies.php');
?>