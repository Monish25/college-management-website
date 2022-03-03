<html>
  <head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="profilestyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php
$uname;
$myfile = fopen("username.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) {
  $uname=fgets($myfile) . "<br>";
}
fclose($myfile);
echo '<nav class="navbar navbar-expand-lg navbar-primary bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Student Portal</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="content.php">Content</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="result.php">Results</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="lecinfo.php">Faculty Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="circular.php">Circular</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="Map.php">Map</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="query.php">Query</a>
      </li>
      <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="main.html">Library</a>
          </li>
    </ul>
  </div>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="nav pull-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            '.$uname.'
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
    </ul>
  </div>
</div>
</nav>';
?>
  
      <center><label class="title">About your profile</label></center>
      <center>
      <div class="outline">
  
<?php
include 'include.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!($conn))
{
    die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * FROM project1.students WHERE UID='$uname';";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0) {
  while($row = mysqli_fetch_assoc($result)) {
    $Name=$row["name"];
    $phno=$row["phno"];
    $email=$row["email"];
    $dob=$row["DOB"];
    $department=$row["Department"];
    $gender=$row["Gender"];
    $year=$row["Year"];
  }
}
echo '<center>';
echo 'Username : '.$uname;
echo 'Name : '.$Name;
echo '<br>';
echo 'Phone Number : '.$phno;
echo '<br>';
echo 'Email : '.$email;
echo '<br>';
echo 'DOB : '.$dob;
echo '<br>';
echo 'Department : '.$department;
echo '<br>';
echo 'Gender : '.$gender;
echo '<br>';
echo 'Year : '.$year;
echo '</center>';
?>
<br>
<br>  
<button onclick="ref()" class="btn-grad">Download pdf</button> 
</center>
      </div>

      <footer class="page-footer font-small blue pt-4">
    <div class="container-fluid text-center text-md-left"  style='background-color:lime'>
      <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
          <h5 class="text-uppercase">Content</h5>
          <p>This website is created for students of college.</p>
        </div>
        <hr class="clearfix w-100 d-md-none pb-3">
        <div class="col-md-3 mb-md-0 mb-3">
          <h5 class="text-uppercase"></h5>
    
          <ul class="list-unstyled">
            <li>
              
            </li>
            <li>
              
            </li>
            <li>
              
            </li>
          </ul>
    
        </div>
        <!-- Grid column -->
    
        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
    
          <!-- Links -->
          <h5 class="text-uppercase">Ph num and Address</h5>
    
          <ul class="list-unstyled">
            <li>
               Contact Us : 044 2235 8491
            </li>
            <li>
              Address:
            </li>
            <li>
            12, Sardar Patel Rd, Anna University, 
            <br> Guindy, Chennai, Tamil Nadu 600025
            </li>
          </ul>
    
        </div>
        <!-- Grid column -->
    
      </div>
      <!-- Grid row -->
    
    </div>
    <!-- Footer Links -->
    
    <!-- Copyright -->
    <div style='background-color:darkcyan' class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="#" style="color:black">K<del>L</del>MN</a>
    </div>
    <!-- Copyright -->
    
    </footer>
<script>
  function ref(){
    window.location.href="detailspdf.php"
  }

</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>