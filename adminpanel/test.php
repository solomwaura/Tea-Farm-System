<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('assets/img/logo.png',70,6,30);
    //$this->Ln(30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(30);
    // Title
    $this->Cell(20,10,'Tea Factory-FARMERS REPORT',0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
include "../db.php";

//Select the Products you want to show in your PDF file
$sql="SELECT fname, factoryid,email FROM users";
$result=mysqli_query($conn,$sql);
$number_of_products = mysqli_num_rows($result);

//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
    $code = $row["fname"];
    $name = $row["factoryid"];
    $real_price = $row["email"];

    $column_code = $column_code.$code."\n";
    $column_name = $column_name.$name."\n";
    $column_price = $column_price.$real_price."\n";

    //Sum all the Prices (TOTAL)
  
}
mysqli_close($conn);

//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.


//Create a new PDF file

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(20);
$pdf->Cell(30,6,'Name',1,0,'L',1);
$pdf->SetX(50);
$pdf->Cell(30,6,'Factory ID',1,0,'L',1);
$pdf->SetX(80);
$pdf->Cell(85,6,'Email Address',1,0,'L',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',10);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(30,6,$column_code,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(30,6,$column_name,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(80);
$pdf->MultiCell(85,6,$column_price,1);

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row


$pdf->Output();
?>