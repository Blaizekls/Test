<?php
$mysqli =  new mysqli('localhost','root','','visit') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM data") or die ($mysqli->error);
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<?php require_once 'process.php'?>
    <?php
    if (isset($_SESSION['message'])):
    ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
    	<?php
             echo  $_SESSION['message'] ="Information Updated!";
             unset($_SESSION['message']);
    	?>


    </div>
<?php endif ?>
<br><br>
      <div class="container">
<div class="row justify-content-center">
	<table class="table">
		<thead>
			<th>Company Name</th>
			<th>Representative Name</th>
			<th>Title</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Comment</th>
			<th colspan="2">Action</th>
		</thead>
		<?php
             while ($row = $result->fetch_assoc()):
		?>
		<tr>
		<td><?php echo $row['Companyname']?></td>
		<td><?php echo $row['Representativename']?></td>
		<td><?php echo $row['Title']?></td>
		<td><?php echo $row['Email']?></td>
		<td><?php echo $row['Phonenumber']?></td>
		<td><?php echo $row['Comment']?></td>
		<td>
			<a href="edit.php?edit=<?php echo $row['id'];?>" class="btn btn-info">Edit</a>
			<a href="process.php?delete=<?php echo $row['id'];?>" class="btn btn-danger">delete</a>

		</td>
</tr>
<?php endwhile; ?>
	</table>
</div>
</div>

<?php
function pre_r( $array ) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';

}



?>