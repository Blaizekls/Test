<?php

session_start();

$mysqli =  new mysqli('localhost','root','','visit') or die(mysqli_error($mysqli));

$id = 0;

if (isset($_POST['submit'])){
    $Company_Name = $_POST['CompanyName'];
    $Representative_Name = $_POST['RepresentativeName'];
    $Title = $_POST['Title'];
    if(isset($_POST['Email']) == true && empty($_POST['Email']) == false){
    $Email = $_POST['Email'];
    if (filter_var($Email, FILTER_VALIDATE_EMAIL)== true){
    	echo '' ;
    }else{
    		echo 'not a valid email';
    	}
    }
    $Phone_Number = $_POST['PhoneNumber'];
    $Comment = $_POST['Comment'];

   $mysqli->query("INSERT INTO data (Companyname,Representativename,Title,Email,Phonenumber,Comment) VALUES('$Company_Name',         '$Representative_Name','$Title','$Email','$Phone_Number','$Comment')") or die($mysqli->error);

    $_SESSION['message'] ="Information Submitted!";
    $_SESSION['msg_type'] ="success";

    header("location: index.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id=$id") or die(mysqli_error($mysqli));
    header("location: display.php");

}

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die (mysqli_error($mysqli));
	
		$row = $result ->fetch_array();
		$Company_Name = $row['Companyname'];
        $Representative_Name = $row['Representativename'];
        $Title = $row['Title'];
        $Email = $row['Email'];
        $Phone_Number = $row['Phonenumber'];
        $Comment = $row['Comment'];

	

}
if (isset($_POST['update'])){
	$id = $_POST['id'];
	$Company_Name = $_POST['CompanyName'];
    $Representative_Name = $_POST['RepresentativeName'];
    $Title = $_POST['Title'];
    $Email = $_POST['Email'];
    $Phone_Number = $_POST['PhoneNumber'];
    $Comment = $_POST['Comment'];


    $mysqli->query("UPDATE data SET Companyname='$Company_Name',Representativename='$Representative_Name',Title='$Title',Email='$Email',Phonenumber='$Phone_Number',Comment='$Comment' WHERE id=$id  ") or die(mysqli_error($mysqli));

    $_SESSION['message'] ="Information Updated!";
    $_SESSION['msg_type'] ="Warning";

    header("location: display.php");

}

?>