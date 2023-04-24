<?php
session_start();
require_once "dataBase.php";

$email = $_POST["email"];
$password = $_POST["password"];

// validate user input
if(empty($email) || empty($password)){
  echo "Email and password are required.";
  exit();
}

// prepare and bind statement
$stmt = $conn->prepare("SELECT * FROM login WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
// execute statement and fetch result

// check if user exists
if($result->num_rows === 0){
  echo "Invalid email or password.";
  exit();
}

// verify password
$row = $result->fetch_assoc();
// if(password_verify($password, $row["password"])){
//   // login successful
//   echo "success";
// }
if($password == $row["password"]){
  // login successful
  echo "success_". $row["s.no"];
}else{
  echo "invalid password";
}
?>