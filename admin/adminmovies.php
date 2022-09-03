<?php 
    include 'adminheader.php';
    include 'connectionpdo.php';
    $sql = $db->prepare("SELECT * FROM movie_tbl");
    $sql->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Movies</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="admin.css" />
    <style>
        textarea{
            width: 100%;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
		<div class="row">
			<div class="col-lg-12 text-center border rounded bg-light my-5">
				<h1>Update And Delete Movies</h1>
			</div>
			<!-- table -->
			<div class="col-lg-12"  style="overflow-x: auto;">
				<table class="table">
					<thead class="text-center thead-dark">
						<tr>
                            <th scope="col">Poster</th>
							<th scope="col">Title</th>
							<!-- <th scope="col">Release Date</th> -->
							<th scope="col">Description</th>
							<th scope="col">Cast</th>
                            <th scope="col">Director</th>
                            <th scope="col">Genres</th>
                            <th scope="col">Duration</th>
                            <!-- <th scope="col">Trailer Link</th> -->
                            <th scope="col">Seat Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Update</th> 
							<th scope="col">Delete</th>
						</tr>
					</thead>
					<tbody class="text-center">
                        <?php 
	                        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
	                        extract($row);
	                    ?>
	                    <tr>
                            <td><img src="images/<?php echo $poster ?>" width="100" height="150"></td>
		                    <td><?php echo $title; ?><br>(<?php echo $release_date;?>)<br><a href="<?php echo $trailer_link?>" target="_blank">Trailer Link</a></td>
		                    <!-- <td><?php //echo $release_date; ?></td> -->
		                    <td><?php echo $description; ?></td>
                            <td><?php echo $cast; ?></td>
                            <td><?php echo $director; ?></td>
                            <td><?php echo $genres; ?></td>
                            <td><?php echo $duration; ?></td>
                            <!-- <td><a href="<?php //echo $trailer_link?>"><?php //echo $trailer_link?></a></td> -->
                            <td><?php echo $seat_prize; ?></td>
                            <td><?php echo $status; ?></td>
		                    <td><a href="editmovies.php?eid=<?php echo $movie_id;?>"><button type="submit" class="signupbtn" style="width: 100px; border-radius: 15px;">UPDATE</button></a></td>
		                    <td><a href="deletemovies.php?did=<?php echo $movie_id;?>"><button type="submit" class="cancelbtn" style="width: 100px; height: 52px; border-radius: 15px;">DELETE</button></a></td>
	                    </tr>
	                    <?php } ?>
                    </tbody>
				</table>
			</div>
		</div>
	</div>
    <div class="container">
		<div class="row">
			<div class="col-lg-12 text-center border rounded bg-light my-5">
				<h1>Insert Movies</h1>
			</div>
            <form method="post" enctype="multipart/form-data">
            <label for="title"><b>Title</b></label>
                <input type="text" placeholder="Enter Movie Title" name="title" required>
                <label for="description"><b>Description</b></label> <br>
                <textarea placeholder="Enter Movie Description" name="description" required></textarea><br>
                <label for="cast"><b>Cast</b></label>
                <input type="text" placeholder="Enter Cast Name" name="cast" required>
                <label for="director"><b>Director</b></label>
                <input type="text" placeholder="Enter Director Name" name="director" required>
                <label for="genres"><b>Genres</b></label>
                <input type="text" placeholder="Enter Genres" name="genres" required>
                <label for="duration"><b>Duration</b></label>
                <input type="text" placeholder="Enter Movie Duration" name="duration" required>
                <label for="link"><b>Trailer Youtube Link</b></label>
                <input type="text" placeholder="Enter Movie Trailer Link" name="link" required>
                <label for="status"><b>Status</b></label>
                <input type="text" placeholder="Enter Status" name="status" required>
                <label for="seatprize"><b>Seat Price</b></label>
                <input type="text" placeholder="Enter Seat Prize" name="seatprize" required>
                <label for="date"><b>Release Date</b></label> <br>
                <input type="date" name="date" required> <br> <br>
                <label for="photo"><b>Upload Poster</b></label> 
                <input type="file" name="image">
                <button type="submit" class="signupbtn" name="submit">Add Movies</button>
                <input type="reset" value="Cancel" style="width: 100%;" class="btn btn-danger"> <br> <br>
		    </form>
		    <?php 
                if(isset($_FILES['image'])){
                    $errors = array();
                    $filename = $_FILES['image']['name'];
                    $filesize = $_FILES['image']['size'];
                    $filetmp = $_FILES['image']['tmp_name'];
                    $filetype = $_FILES['image']['type']; /**images/png**/
                    $fext = explode("/", $filetype);
                    $file_ex = strtolower(end($fext));
                    $extention = array("jpeg","jpg","png","gif");
    
                    if (in_array($file_ex, $extention)==FALSE) {
                        $errors[] = "please upload valid file type";
                    }
                    else if ($filesize > 2097152){
                        $errors[] = "file size is too big";
                    }
                    else if(empty($errors)==TRUE){
                        move_uploaded_file($filetmp, "images/".$filename);
                        echo "Success!!!";
                    }
                    else echo $errors;
                }
                else return FALSE;

                try {
                    include 'connectionpdo.php';
                    $sql="INSERT INTO movie_tbl(title, poster, release_date, description, cast, director, genres, duration, trailer_link, status, seat_prize) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
                    $sq= $db->prepare($sql);
                    $title= $_POST['title'];
                    $description= $_POST['description'];
                    $cast= $_POST['cast'];
                    $director= $_POST['director'];
                    $genres = $_POST['genres'];
                    $duration = $_POST['duration'];
                    $link = $_POST['link'];
                    $photo= $filename;
                    $status=$_POST['status'];
                    $date=$_POST['date'];
                    $seatprize = $_POST['seatprize'];
                    if($sq->execute(array($title, $photo, $date, $description, $cast, $director, $genres, $duration, $link, $status, $seatprize))){   
                        echo "<script>
                                alert('Movie added successfully.');
                                window.location.href='adminmovies.php';
                                </script>";
                    }
                        else echo "FAILED";
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                $db=null;
            ?>
		</div>
	</div>
</body>
</html>