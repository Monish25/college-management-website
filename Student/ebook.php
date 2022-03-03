<!DOCTYPE html>
<head>
    <title>Library Management</title>
    <link rel = "stylesheet" href= "ebookstyle.css">

    <body>
        <center>
        <label class="head1"> LIBRARY MANAGEMENT </label>
        <br>
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
        <marquee scrollamount = '10'>E-BOOK AREA</marquee>
        <form action="" method="GET">
        <div class="outline">       
        <h3>
                  Search : <input type="search" name="bookname" placeholder="Enter Book name"><br>
                  <h5>
                      <div>
                     
                      </div>
                   </h5>
                  <input type="submit" name="" value="Submit" class="btn-grad"> 
                </h3>
        </div>
        <br>
        <br>
              </form>
        
                <?php


                    if(!isset($_GET['bookname'])){
                        include 'include.php';
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                            if(!($conn))
                            {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql="SELECT * FROM ebooklist";
                            $result=mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result)>0) 
                            {
                                echo '<table border="5" class="table table-danger table-hover">';
                                echo '<tr>';
                                echo '<th>Serial Number</th>';
                                echo '<th>Category</th>';
                                echo '<th>Book Name</th>';
                                echo '<th>Country</th>';
                                echo '<th>Publisher</th>';
                                echo '<th>Authour</th>';
                                echo '<th>Pages</th>';
                                echo '<th>link</th>';
                                echo '<th>Language</th>';
                                echo '<th>Price</th>';
                            
                                echo '</tr>';
                                while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>'.$row["serial"].'</td>';
                            echo '<td>'.$row["category"].'</td>';
                            echo '<td>'.$row["ebookname"].'</td>';
                            echo '<td>'.$row["country"].'</td>';
                            echo '<td>'.$row["publisher"].'</td>';
                            
                            echo '<td>'.$row["author"].'</td>';
                            echo '<td>'.$row["pages"].'</td>';
                            echo '<td>'.$row["link"].'</td>';
                            echo '<td>'.$row["language"].'</td>';
                            echo '<td>'.$row["price"].'</td>';
                            echo '</tr>';
                            }
                            }
                            echo '</table>';
                        }
                        else
                        {
                            include 'include.php';;
                            $se=trim($_GET["bookname"]);
                            $sql="SELECT * FROM project1.ebooklist WHERE ";
                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                            if($se!="")
                            {
                            $ksea=explode(' ',$se);
                            foreach($ksea as $word)
                            {
                                $sql.=" ebookname LIKE '%".$word."%'  OR";
                            }
                            }
                            $sql=substr($sql,0,strlen($sql)-3);
                            $result=mysqli_query($conn, $sql);
                              if (mysqli_num_rows($result)>0) 
                                {
                                    echo '<table border="5" class="table table-danger table-hover">';
                                echo '<tr>';
                                echo '<th>Serial Number</th>';
                                echo '<th>Category</th>';
                                echo '<th>Book Name</th>';
                                echo '<th>Country</th>';
                                echo '<th>Publisher</th>';
                                echo '<th>Authour</th>';
                                echo '<th>Pages</th>';
                                echo '<th>link</th>';
                                echo '<th>Language</th>';
                                echo '<th>Price</th>';
                            
                                echo '</tr>';
                                while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>'.$row["serial"].'</td>';
                            echo '<td>'.$row["category"].'</td>';
                            echo '<td>'.$row["ebookname"].'</td>';
                            echo '<td>'.$row["country"].'</td>';
                            echo '<td>'.$row["publisher"].'</td>';
                            
                            echo '<td>'.$row["author"].'</td>';
                            echo '<td>'.$row["pages"].'</td>';
                            echo '<td>'.$row["link"].'</td>';
                            echo '<td>'.$row["language"].'</td>';
                            echo '<td>'.$row["price"].'</td>';
                            echo '</tr>';
                            }
                            }
                            echo '</table>';
                            }

                        
                            ?>


        </center>
    </body>

</head> 