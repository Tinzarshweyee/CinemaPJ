<?php 
    include 'connectionpdo.php';
    $movieid = $_POST['id'];
    $title = $_POST['name'];
    $description = $_POST['description'];
    $cast = $_POST['cast'];
    $director=$_POST['director'];
    $genres=$_POST['genres'];
    $duration = $_POST['duration'];
    $link = $_POST['trailer_link'];
    $status = $_POST['status'];
    $seatprize = $_POST['seatprize'];
    $releasedate = $_POST['date'];
    
    $newimg = $_FILES['newimg']['name'];
    $oldimg = $_POST['oldimg'];
    if ($newimg != "") {
        $updatephoto = $newimg;
        move_uploaded_file($_FILES['newimg']['tmp_name'], "images/".$newimg);
    }
    else {
        $updatephoto = $oldimg;
    }
    $sql = $db->prepare("UPDATE movie_tbl SET movie_id='$movieid', 
                        title='$title', poster='$updatephoto', release_date='$releasedate',
                        description='$description', cast='$cast', director='$director',
                        genres='$genres', duration='$duration', 
                        trailer_link='$link', status='$status', seat_prize='$seatprize'
                        WHERE movie_id='$movieid'");
    $sql->execute();
    header("location: adminmovies.php");
?>