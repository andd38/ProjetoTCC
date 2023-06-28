<?php
if (isset($_POST['certi'])) {
session_start();
require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF();

$pdf->SetCreator('Brasil Concursos');
$pdf->SetAuthor('');
$pdf->SetTitle('Certificado de conclusão');
$pdf->SetSubject('esrer');
$pdf->SetKeywords('palavra-chave, PDF, PHP');


$pdf->AddPage();


    $id = $_SESSION['id'];
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];


$datacertificado = date("Y/m/d"); 
$nomecurso = 'Técnico em Matemática';


$pdf->SetFont('helvetica', 'B', 24);


$pdf->Cell(0, 15, 'Certificado', 0, 1, 'C');

$imagePath = 'angolanomatematico.jpg';

$pdf->Image($imagePath, 10, 10, 10, 0);

$pdf->SetFont('Poppins', '', 16);

$pdf->Cell(0, 20, 'Parabéns ' . $nome . ' Por Concluir o curso', 0, 1, 'C');
$pdf->Cell(0, 10, $nomecurso, 0, 1, 'C');


$pdf->SetFont('helvetica', '', 12);


$pdf->Cell(0, 20, 'expedido ' . $datacertificado, 0, 1, 'C');


$imagem = 'angolanomatematico.jpg';
$pdf->Image($imagem, 65, 80, 80, 0, 'JPG');


$pdf->Output('certificado.pdf', 'I');


}
?>
