<html>
  <head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="verificationstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <center>
<?php
include 'include.php';
$uname=$_POST["username"];
$passw=$_POST["password"];
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!($conn))
{
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * FROM students WHERE UID='$uname' AND password='$passw'";
$result=mysqli_query($conn, $sql);
$check=mysqli_fetch_assoc($result);
if (isset($check))
{
  $myfile = fopen("username.txt", "w") or die("Unable to open file!");
  fwrite($myfile, $uname);
  fclose($myfile);
  echo '<label class="head">Signed in</label>';
  echo '<hr>';
  echo '<label class="detail">You have been successfully Signed in</label>';
  echo '<center><button onclick="redirect()" class="btn-grad">Click here to continue</button></center>';
}
else{
  echo '<center><label class="head">Failure</label></center>"';
  echo '<center><label class="detail">Please try again</label></center>';
  echo '<center><button onclick="redirect1()" class="btn-grad">LOG IN PAGE</button></center>';
}
?>
    </center>
<script>
function redirect(){
  window.location.href="content.php";
}
function redirect1(){
  window.location.href="login.html";
}
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>