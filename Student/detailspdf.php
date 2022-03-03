<?php
include 'include.php';
$myfile = fopen("username.txt", "r") or die("Unable to open file!");
while(!feof($myfile)) {
  $uname=fgets($myfile) . "<br>";
}
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
require ('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(80,10,'Student Data Sheet');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(80,10,'Name : '.$Name);
$pdf->Ln();
$pdf->Cell(80,10,'Phone number : '.$phno);
$pdf->Ln();
$pdf->Cell(80,10,'Email : '.$email);
$pdf->Ln();
$pdf->Cell(80,10,'Date of birth : '.$dob);
$pdf->Ln();
$pdf->Cell(80,10,'Department : '.$department);
$pdf->Ln();
$pdf->Cell(80,10,'Gender : '.$gender);
$pdf->Ln();
$pdf->Cell(80,10,'Year : '.$year);
$pdf->Output('Your datasheet.pdf','I');
$pdf->AddPage();
?>