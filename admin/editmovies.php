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
    <h1>Movies Update</h1>
    <p>Please fill in this form to update the movie information</p>
    <?php 
        include 'connectionpdo.php';
        $eid = $_GET['eid']; 
        $sql = $db->prepare("SELECT * FROM movie_tbl WHERE movie_id='$eid'");
        $sql->execute();
        $row=$sql->fetch(PDO::FETCH_ASSOC);
        extract($row);
    ?>
    <form action="editmovieprocess.php" method="POST" enctype="multipart/form-data">
	    <input type="hidden" name="id" value="<?php echo $movie_id;?>">
        <label for="name"><b>Movie Title</b></label>
        <input type="text" name="name" value="<?php echo $title;?>">
        <label for="description"><b>Description</b></label>
        <input type="text" name="description" value="<?php echo $description;?>">
        <label for="cast"><b>Cast</b></label>
        <input type="text" name="cast" value="<?php echo $cast;?>">
        <label for="director"><b>Director</b></label>
        <input type="text" name="director" value="<?php echo $director;?>">
        <label for="genres"><b>Genres</b></label>
        <input type="text" name="genres" value="<?php echo $genres;?>">
        <label for="duration"><b>Duration</b></label>
        <input type="text" name="duration" value="<?php echo $duration;?>">
        <label for="cast"><b>Trailer Link</b></label>
        <input type="text" name="trailer_link" value="<?php echo $trailer_link;?>">
        <label for="status"><b>Status</b></label>
        <input type="text" name="status" value="<?php echo $status;?>">
        <label for="seatprize"><b>Seat Price</b></label>
        <input type="text" name="seatprize" value="<?php echo $seat_prize;?>">
        <label for="date"><b>Release Date</b></label>
        <input type="date" name="date" value="<?php echo $release_date?>"> <br>
	    <img src="images/<?php echo $poster;?>" width="100" height="150"> <br>
        <label for="photo" style="margin-top: 20px;"><b>Photo</b></label>
	    <input type="file" name="newimg"> <br>
	    <input type="hidden" name="oldimg" value="<?php echo $poster;?>">
        <button type="submit" class="signupbtn" name="submit">Update</button>
        <a href="adminmovies.php"><button type="button" class="cancelbtn">Cancel</button></a>
    </form>

</body>
</html>