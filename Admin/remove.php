<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
    <link rel = "stylesheet" href= "removestyle.css">
</head>
    <body>
        <center>
        <label class="head1"> LIBRARY MANAGEMENT </label>
        <br> 
        <marquee scrollamount = '10'>REMOVE BOOKS</marquee>
        <div align="left">
          <center>
        <button type="button" onclick="location.href='adminlib.php'"  >
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>
        </button>
</center>
        </div>
        <br>
        <br>
        <form action="" method="GET">
          <div class="outline">
        <label class="detail">Enter Book Number:</label>
        <input type="text" name="bno">
        <br>
        <br>
        <input type="submit" value="Submit" class="btn-grad">

          </div>
        </form>
        <br>
        <br>


        <?php
        if (!(isset($_GET['bno'])))
            {echo '<label class="title">Enter the fields</label>';
            }
        else{
            $bid = $_GET['bno'];
            include 'include.php';
            $conn = mysqli_connect($servername, $username, $password, $dbname);
              if(!($conn))
              {
                  die("Connection failed: " . mysqli_connect_error());
              }
              $sql="DELETE FROM project1.booklist WHERE serial='$bid';";
              if (mysqli_query($conn, $sql)) {
                echo "<label class='title'>Record deleted successfully </label>";
              } else {
                echo "<label class='title>'Error deleting record: </label>" . mysqli_error($conn);
              }
        }
        ?>


        </center>
    </body> 
</html>