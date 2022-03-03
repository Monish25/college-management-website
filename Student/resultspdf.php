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
$sql="SELECT * FROM project1.csemarks WHERE UID='$uname';";
$result=mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0) {
  while($row = mysqli_fetch_assoc($result)) {
    $te=$row['HS6151'];
    $phy=$row['PH6151'];
    $maths=$row['MA6151'];
    $c=$row['CS6101'];
    $ct=$row['CS6102'];
  }
}
require ('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(80,10,'Grade points');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(80,10,'Technical English : '.$te);
$pdf->Ln();
$pdf->Cell(80,10,'Physics : '.$phy);
$pdf->Ln();
$pdf->Cell(80,10,'Maths : '.$maths);
$pdf->Ln();
$pdf->Cell(80,10,'Programming with C : '.$c);
$pdf->Ln();
$pdf->Cell(80,10,'Computational Thinking : '.$ct);
$pdf->Ln();
$pdf->Output('Your marks.pdf','I');
$pdf->AddPage();
?>