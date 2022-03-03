<html>
<?php
      include 'include.php';
      $conn = mysqli_connect($servername, $username, $password, $dbname);
      if(!($conn))
      {
          die("Connection failed: " . mysqli_connect_error());
      }
      $borrowdate=$_POST["bdate"];
  $returndate=$_POST["ddate"];
  $uid=$_POST["UID"];
  $bid=$_POST["serial"];
      $sql="SELECT * FROM project1.students WHERE UID = '$uid';";
        $result=mysqli_query($conn, $sql);

        if (mysqli_num_rows ($result)>0){
            while($row = mysqli_fetch_assoc($result)) {
              $name=$row["name"];
        }
      }
        $sql2="SELECT * FROM booklist WHERE serial = '$bid';";
        $result2 = mysqli_query($conn,$sql2);
        if (mysqli_num_rows($result2) > 0){
          while($row = mysqli_fetch_assoc($result2)) {
              $bookname=$row["bookname"];
      }
  }
  $borrowdate=$_POST["bdate"];
  $returndate=$_POST["ddate"];
      $sql="INSERT INTO `project1`.`borrow` (`UID`, `name`, `bookname`, `bookid`, `borrowdate`, `due`) 
      VALUES ('$uid', '$name', '$bookname', '$bid', '$borrowdate', '$returndate')";
      if (mysqli_query($conn, $sql)) {
        echo "Borrowed  successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      $sql="UPDATE project1.booklist
      SET useraccess = 'not'
      WHERE serial ='$bid' ;";
      if (mysqli_query($conn, $sql)) {
        echo '';
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
?>
</html>