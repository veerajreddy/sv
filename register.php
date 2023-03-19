<?php
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT into user(username,email,password) values(?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successful...";
    $stmt->close();
    $conn->close();
}
?>
