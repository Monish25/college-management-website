<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
    <link rel = "stylesheet" href= "style2.css">
</head>
    <body>
        <center>
        <label class="head1"> LIBRARY MANAGEMENT </label>>
        <div align="left">
            <center>
        <button type="button" onclick="location.href='main.html'"  >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>
        </button>
</center>
        </div>
        <br>
        <marquee scrollamount = '10'>BORROW BOOKS</marquee>
        <br>
        <br>
        <form action="" method="GET">
            <div class="outline">
        <label>Enter Book Number:</label>
        <input type="text" name="bno" > 
        <br>
        <label>Enter Student Id:</label>
        <input type="text" name="sid" > 
        <br>
        <input type="submit" value="Submit" class="btn-grad">
</div>
        </form>
        <?php
        if (!(isset($_GET['bno'])))
            {echo '<h3>Enter the fields</h3>';
            }

        else{
            $uid = $_GET['sid'];
            $bid = $_GET['bno'];
            include 'include.php';
            $conn = mysqli_connect($servername, $username, $password, $dbname);
              if(!($conn))
              {
                  die("Connection failed: " . mysqli_connect_error());
              }
              $sql="SELECT * FROM project1.students WHERE UID = '$uid';";
              $result=mysqli_query($conn, $sql);

              if (mysqli_num_rows ($result)>0){
                  echo 'Student Data:';
                  echo '<hr style="width:50%">';
                  echo '<table border="5" class="table table-danger table-hover">';
                  echo '<tr>';
                  echo '<th>UID</th>';
                  echo '<th>Name</th>';
                  echo '<th>Phone Number</th>';
                  echo '<th>Email</th>';
                  echo '<th>DOB</th>';
                  echo '<th>Department</th>';
                  echo '<th>Year</th>';
                  echo '</tr>';
                  while($row = mysqli_fetch_assoc($result)) {
                  echo '<tr>';
                  echo '<td>'.$row["UID"].'</td>';
                  echo '<td>'.$row["name"].'</td>';
                  echo '<td>'.$row["phno"].'</td>';
                  echo '<td>'.$row["email"].'</td>';
                  echo '<td>'.$row["DOB"].'</td>';
                  echo '<td>'.$row["Department"].'</td>';
                  echo '<td>'.$row["Year"].'</td>';
                  echo '</tr>';
                  }
                  echo '</table>';
              }
              echo '<hr>';
              $sql2="SELECT * FROM booklist WHERE serial = '$bid';";
              $result2 = mysqli_query($conn,$sql2);
              if (mysqli_num_rows($result2) > 0){
                echo '<table border="5" class="table table-danger table-hover">';
                echo '<th>Serial Number</th>';
                echo '<th>Category</th>';
                echo '<th>Book Name</th>';
                echo '<th>Country</th>';
                echo '<th>User Access</th>';
                echo '<th>Publisher</th>';
                echo '<th>Authour</th>';
                echo '<th>Pages</th>';
                echo '<th>Vendor</th>';
                echo '<th>Language</th>';
                echo '<th>Price</th>';
            
                echo '</tr>';
                while($row = mysqli_fetch_assoc($result2)) {
                    if($row['useraccess']=='yes')
                    {
            echo '<tr>';
            echo '<td>'.$row["serial"].'</td>';
            echo '<td>'.$row["category"].'</td>';
            echo '<td>'.$row["bookname"].'</td>';
            echo '<td>'.$row["country"].'</td>';
            echo '<td>'.$row["useraccess"].'</td>';
            echo '<td>'.$row["publisher"].'</td>';
            echo '<td>'.$row["author"].'</td>';
            echo '<td>'.$row["pages"].'</td>';
            echo '<td>'.$row["vendor"].'</td>';
            echo '<td>'.$row["price"].'</td>';
            echo '<td>'.$row["type"].'</td>';
            echo '</tr>';
            }
            else if($row['useraccess']=='not')
            {
                echo 'Book is not available';
            }
        }
            echo '</table>';
        }
        echo '<hr>';
        echo 'To confirm once again';
        echo '<form action="confirm.php" method="POST">
        Enter Book number : <input type="text" name="serial"><br>
        Enter Student number : <input type="text" name="UID"><br>
        Borrow date : <input type="date" name="bdate" min="2000-01-01"><br>
            Due date : <input type="date" name="ddate" min="2000-01-01"><br>
        <input type ="submit" value="Confirm">
    </form>';
        }
        ?>
        </center>
    </body> 
</html>