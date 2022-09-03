<?php 
    include 'adminheader.php';
    include 'connectionpdo.php';
    $sql = $db->prepare("SELECT * FROM booking_tbl");
    $sql->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Bookings</title>
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
				<h1>Update and Delete Bookings</h1>
			</div>
			<!-- table -->
			<div class="col-lg-12">
				<table class="table">
					<thead class="text-center thead-dark">
						<tr>
                            <th scope="col">Customer Name</th>
							<th scope="col">Email and Phone</th>
							<th scope="col">Movie Name</th>
							<th scope="col">Date and Time</th>
                            <th scope="col">Number of Seats and Amount</th>
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
		                    <td><?php echo $customer_name; ?></td>
		                    <td><?php echo $email; ?><br><?php echo $phone; ?></td>
                            <td><?php echo $movie_name; ?></td>
                            <td><?php echo $date; ?><br><?php echo $time; ?></td>
                            <td><?php echo $amount; ?> (<?php echo $number_of_seats; ?>)</td>
                            <td><?php echo $status; ?></td>
                            <td><a href="editbookings.php?eid=<?php echo $booking_id;?>"><button type="submit" class="signupbtn" style="width: 100px; border-radius: 15px;">UPDATE</button></a></td>
		                    <td><a href="deletebookings.php?did=<?php echo $booking_id;?>"><button type="submit" class="cancelbtn" style="width: 100px; height: 52px; border-radius: 15px;">DELETE</button></a></td>
	                    </tr>
	                    <?php } ?>
                    </tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>