<?php 
    include 'adminheader.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Home</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="admin.css" />
    <style>
        button{
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
		<div class="row">
            <a href="adminmovies.php"><button type="submit" class="signupbtn" name="submit">Movies</button></a>
            <a href="adminbookings.php"><button type="submit" class="signupbtn" name="submit">Bookings</button></a>
            <a href="admincomments.php"><button type="submit" class="signupbtn" name="submit">Comments</button></a>
            <a href="adminusers.php"><button type="submit" class="signupbtn" name="submit">Users</button></a>
		</div>
	</div>
</body>
</html>
