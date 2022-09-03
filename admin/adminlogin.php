<?php 
    include 'connectionpdo.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    .nav-item {
      padding-left: 20px;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark navbar-fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="loginaction.php">JCGV Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <center>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="loginaction.php">MOVIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="loginaction.php">BOOKINGS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="loginaction.php">COMMENTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="loginaction.php">USERS</a>
                        </li>
                    </ul>
                </div>
            </center>
        </div>
    </nav>
    <div class="container">
		<div class="row">
			<div class="col-lg-12 text-center border rounded bg-light my-5">
				<h1>Admin Login</h1>
			</div>
            <form method="post" enctype="multipart/form-data">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
                <button type="submit" class="signupbtn" name="submit" style="margin-top: 30px;">Login</button>
		    </form>
            <?php 
                $sql=$db->prepare("SELECT * FROM admin_tbl");
                $sql->execute();
                if (isset($_POST['submit'])) {
                    $mail =$_POST['email'];
                    $pwd = $_POST['password'];
                    while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                        extract($row);
                        if($mail!=$email || $pwd!=$password) {
                            echo "<script>
                                    alert('Login Unsuccessful\nPlease Try Again');
                                    window.loaction.href='adminlogin.php'
                                    </script>";
                        }
                        else {
                            echo "<script>
                                    alert('Login Successful');
                                    window.location.href='adminhomepage.php';
                                    </script>";
                        }
                    }
                }    
            ?>
		</div>
	</div>
</body>
</html>