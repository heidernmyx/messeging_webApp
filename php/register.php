<?php 

include '../include/connection.php';


$username_input = $_POST['username'];
$password_input = $_POST['password'];
$email = $_POST['email'];


$sql = "INSERT INTO `tbl_accounts`(
  `username`, 
  `password`, 
  `email_address`) 
  VALUES (:username,:password,:email_address)";

$stmt =$conn->prepare($sql);
// bindparam(value, var, pdo_type)
$stmt->bindParam(':username', $username_input, PDO::PARAM_STR);
$stmt->bindParam(':password', $password_input, PDO::PARAM_STR);
$stmt->bindParam(':email_address', $email, PDO::PARAM_STR);
// $stmt->execute();

$user_id = $conn->lastInsertId();

echo '
<script>
  console.log($user_id);
</script>';


$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$role = 'user';


$sql = "INSERT INTO `tbl_profile`(
  `user_id`,
  `fname`,
  `mname`,
  `lname`,
  `gender`,
  `birthdate`
)
VALUES(
  :user_id,
  :fname,
  :mname,
  :lname,
  :gender,
  :birthdate
)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
$stmt->bindParam(':mname', $mname, PDO::PARAM_STR);
$stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
$stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
$stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
// $stmt->bindParam(':role', $role, PDO::PARAM_STR);
// $stmt->execute();

echo '
<script>alert("Registered successfully, going back to login");</script>
';

header ('Location: ../index.html');

?>


