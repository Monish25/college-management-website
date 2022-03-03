<html>
  <head>
    <title>Web page</title>
  </head>
  <body>
<?php
include 'include.php';
$uname=$_POST["appno"];
$passw=$_POST["password"];
$name=$_POST["name"];
$phno=$_POST["phnumber"];
$email=$_POST["eid"];
$dob=$_POST["calender"];
$department=$_POST["depart"];
$gender=$_POST["gender"];
$year=$_POST["year"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!($conn))
{
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO students VALUES ('$uname', '$passw', '$name', '$phno','$email','$dob','$department',
'$gender','$year')";
if ($conn->query($sql) === TRUE) {
    echo '<script>document.write("<center><h1>Thank you for registering</h1></center>")</script>';
    echo '<center><a href="login.html">LOG IN PAGE</a></center>';
} else {
    echo '<script>document.write("<center><h1>Sorry please try again</h1></center>")</script>';
    echo '<center><a href="newregister.html">NEW REGISTER</a></center>';
}
?>

 </body>
</html>