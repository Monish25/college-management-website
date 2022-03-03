<!doctype html>
<html lang="en">
  <head>
    <title>Faculty Informtion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"  href="lecinfostyle.css">
    <!-- Bootstrap CSS -->
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
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Faculty Information</a>
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
      <center>
          <label class="title">Faculty Information System</label>
            <form action="" method="GET">
                <h3>
                  Search : <input type="search" name="facname" placeholder="Enter Faculty name" class="search"><br>
                  <h5>
                      <div class="bm">
                        Filter: <br>
                        <br>
                        1) Positions : <select name="position" class="btn btn-success">
                                      <option value="Position">Position</option>
                                      <option value="Professor">Professor</option>
                                      <option value="Assitant Professor">Assitant Professor</option>
                                      <option value="Teaching fellow">Teaching fellow</option>
                                    </select> 
                        2) Department : <select name="department" class="btn btn-success">
                                      <option value="Department">Department</option>
                                      <option value="CSE">CSE</option>
                                      <option value="IT">IT</option>
                                      <option value="ECE">ECE</option>
                                    </select>
                      </div>
                  </h5>
                  <input type="submit" name="" value="Submit" class="btn-grad">
                </h3>
              </form>
              <hr>
      <?php
      if((isset($_GET['facname'])&&$_GET['facname']==""&&$_GET['department']=="Department"&&$_GET['position']=="Position")||!(isset($_GET['facname'])))
      {
        include 'include.php';
      $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!($conn))
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql="SELECT * FROM lecturer ORDER BY Name";
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
          echo '<table border="5" class="table table-danger table-hover">';
          echo '<tr>';
          echo '<th>Name</th>';
          echo '<th>Department</th>';
          echo '<th>Position</th>';
          echo '<th>Mobile no</th>';
          echo '<th>Email</th>';
          echo '</tr>';
          while($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>'.$row["Name"].'</td>';
          echo '<td>'.$row["Department"].'</td>';
          echo '<td>'.$row["Position"].'</td>';
          echo '<td>'.$row["Phno"].'</td>';
          echo '<td>'.$row["Email"].'</td>';
          echo '</tr>';
          }
        }
        echo '</table>';
      }
      else{
        include 'include.php';
      $conn = mysqli_connect($servername, $username, $password, $dbname);
        $se=trim($_GET["facname"]);
        $dep=$_GET["department"];
        $pos=$_GET["position"];
        $sql="SELECT * FROM project1.lecturer WHERE ";
        if($dep!="Department")
        {
          $sql.=" Department='".$dep."' AND";
        }
        if($pos!="Position")
        {
          $sql.=" Position='".$pos."' AND";
        }
        if($se!="")
        {
          $ksea=explode(' ',$se);
          foreach($ksea as $word)
          {
            $sql.=" Name LIKE '%".$word."%'  OR";
          }
        }
        $sql=substr($sql,0,strlen($sql)-3);
        $sql.=" ORDER BY Department";
        $result=mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
          echo mysqli_num_rows($result).' result found';
          echo '<hr style="width:50%">';
          echo '<table border="5" class="table table-danger table-hover">';
          echo '<tr>';
          echo '<th>Name</th>';
          echo '<th>Department</th>';
          echo '<th>Position</th>';
          echo '<th>Mobile no</th>';
          echo '<th>Email</th>';
          echo '</tr>';
          while($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>'.$row["Name"].'</td>';
          echo '<td>'.$row["Department"].'</td>';
          echo '<td>'.$row["Position"].'</td>';
          echo '<td>'.$row["Phno"].'</td>';
          echo '<td>'.$row["Email"].'</td>';
          echo '</tr>';
          }
        }
        echo '</table>';
      }
      ?>
      </center>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>