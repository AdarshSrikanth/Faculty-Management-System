<?php
		//include_once('fpdf.php');
		//define('FPDF_FONTPATH','C:\wamp64\www\fpdf-1-6-es');
//require('fpdf.php');
session_start();
require('fpdf17/fpdf.php');
	$dbhost = "localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="fproject";
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	class PDF extends FPDF
	{
	// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(5);
    // Title
    $this->Cell(50,05,'Project List',1,0,'C');
    // Line break
    $this->Ln(10);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-10);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 
//$db = new dbObj();
//$connString =  $db->getConnstring();
$display_heading = array('name'=>'Name', 'facultyname'=> 'FacultyName', 'title'=> 'TitleofProject','amount'=> 'Amount','sfrom'=> 'Start date','eto'=>'End date','status'=>'Status',);
 
$result = mysqli_query($conn, "SELECT name,facultyname,title,amount,sfrom,eto,status FROM funded") or die("database error:". mysqli_error($connString));
$header = mysqli_query($conn, "SHOW columns FROM funded");
 
$pdf = new FPDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
	
$pdf->Cell(25,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(25,12,$column,1);
}
$pdf->Output();

?>