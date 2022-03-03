<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
    <link rel = "stylesheet" href= "addstyle.css">
</head>
    <body>
        <center>
        <label class="head1"> LIBRARY MANAGEMENT </label>
        <br> 
        <marquee scrollamount = '10'>ADD BOOKS</marquee>
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
        <div class="outline">
        <form action="" method="GET">
        <span class="detail">Enter Book Number:</span><input type="text" name="serial" class="txt">
        <br><br>
        <span class="detail">Enter Category:</span><input type="text" name="category" class="txt">
        <br><br>
        <span class="detail">Enter Bookname:</span><input type="text" name="bookname" class="txt">
        <br><br>
        <span class="detail">Enter Country:</span><input type="text" name="country" class="txt">
        <br><br>
        <span class="detail">Enter Publisher:</span><input type="text" name="publisher" class="txt">
        <br><br>
        <span class="detail">Enter Author:</span><input type="text" name="author" class="txt">
        <br><br>
        <span class="detail">Enter Pages:</span><input type="number" name="pages" class="txt">
        <br><br>
        <span class="detail">Enter Vendor:</span><input type="text" name="vendor" class="txt">
        <br><br>
        <span class="detail">Enter Language:</span><input type="text" name="language" class="txt">
        <br><br>
        <span class="detail"> Enter Price:</span><input type="text" name="price" class="txt">
        <br><br>
        <input type="submit" value="Submit" class="btn-grad">
        </form>
        </div>
        <?php
        if (!(isset($_GET['serial'])))
            {echo '<label class="title">Enter the fields</label>';
            }
        else{
            $serial = $_GET['serial'];
            $category = $_GET['category'];
            $bookname = $_GET['bookname'];
            $country = $_GET['country'];
            $publisher = $_GET['publisher'];
            $author = $_GET['author'];
            $pages = $_GET['pages'];
            $vendor = $_GET['vendor'];
            $language = $_GET['language'];
            $price = $_GET['price'];
            include 'include.php';
            $conn = mysqli_connect($servername, $username, $password, $dbname);
              if(!($conn))
              {
                  die("Connection failed: " . mysqli_connect_error());
              }
              $sql="INSERT INTO project1.booklist
               (serial, category, bookname, country, useraccess, publisher, author, pages, vendor, language, price,type)
              VALUES ('$serial', '$category', '$bookname', '$country', 'yes', '$publisher', '$author', '$pages', '$vendor','$language','$price','offline');";
              if (mysqli_query($conn, $sql)) {
                echo "<label class='title'>Added successfully </label>";
              } else {
                echo "<label class='title>'Error deleting record: </label>" . mysqli_error($conn);
              }
        }
        ?>
        </center>
    </body> 
</html>