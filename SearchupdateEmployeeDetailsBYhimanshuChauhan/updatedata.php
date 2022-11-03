<?php
include 'config.php';
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$design = $_POST['designation'];
$phone = $_POST['phone'];
$status = $_POST['status'];


$sql = "UPDATE employeemaster SET FirstName = '{$fname}',LastName = '{$lname}',Designation = '{$design}',Phone = '{$phone}',Status = '{$status}' WHERE Id = {$id}";
$result = mysqli_query($conn, $sql) or die("There is some problrm in updating");

header("Location: http://localhost/SearchupdateEmployeeDetailsBYhimanshuChauhan/");

mysqli_close($conn);

?>
