<?php 
    include 'adminheader.php';
    include 'connectionpdo.php';
    $sql = $db->prepare("SELECT * FROM user_tbl");
    $sql->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Users</title>
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
				<h1>Delete Users</h1>
			</div>
			<!-- table -->
			<div class="col-lg-12">
				<table class="table">
					<thead class="text-center thead-dark">
						<tr>
                            <th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Age</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Password</th>
							<th scope="col">Delete</th>
						</tr>
					</thead>
					<tbody class="text-center">
                        <?php 
	                        while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
	                        extract($row);
	                    ?>
	                    <tr>
		                    <td><?php echo $name; ?></td>
		                    <td><?php echo $email; ?><br><?php echo $phone;?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $password; ?></td>
		                    <td><a href="deleteusers.php?did=<?php echo $user_id;?>"><button type="submit" class="cancelbtn" style="width: 100px; height: 52px; border-radius: 15px;">DELETE</button></a></td>
	                    </tr>
	                    <?php } ?>
                    </tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>