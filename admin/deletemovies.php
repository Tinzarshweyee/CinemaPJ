<?php
    include 'connectionpdo.php';
    $did = $_GET['did'];
    $sql = $db->prepare("DELETE FROM movie_tbl WHERE movie_id='$did'");
    $sql->execute();
    echo "<script>
            alert('Movie Successfully Removed');
            window.location.href='adminmovies.php';
            </script>";
?>