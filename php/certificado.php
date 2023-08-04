<?php
if (isset($_POST['certi'])) {
session_start();
require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8');

$pdf->SetCreator('Brasil Concursos');
$pdf->SetAuthor('');
$pdf->SetTitle('Certificado de conclusão');
$pdf->SetSubject('esrer');
$pdf->SetKeywords('palavra-chave, PDF, PHP');

    $id = $_SESSION['idUsuarios'];
    $nome = $_SESSION['nome'];
    $dataConclusao =  date("Y/m/d");
    $curso = $_POST['curso'];
   
    
    $pdf->AddPage();

    $pdf->SetFont('helvetica', 'B', 20);
    
    $pdf->Cell(0, 10, 'Certificado de Conclusão', 0, 1, 'C');
    $pdf->SetLineWidth(0.5);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetFont('helvetica', '', 14);

    $pdf->Cell(0, 20, 'Certificamos que', 0, 1, 'C');
    $pdf->SetFont('helvetica', 'B', 18);
    $pdf->Cell(0, 20, $nome, 0, 1, 'C');
    
    $pdf->SetFont('helvetica', '', 14);


    $pdf->Cell(0, 10, 'Concluiu com sucesso o curso de', 0, 1, 'C');
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 15, $curso, 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 14);
    $pdf->Cell(0, 10, 'em '.$dataConclusao, 0, 1, 'C');
    

    $html = '
    <span style="font-family: helvetica; font-size: 12pt;">
        Parabenizamos o aluno por sua dedicação e empenho ao longo do curso, demonstrando um excelente desempenho e comprometimento com o aprendizado. Sua determinação e perseverança são dignas de reconhecimento.
    </span><br>
    <span style="font-family: helvetica; font-size: 12pt;">
        Que este certificado seja um símbolo de sua dedicação e um lembrete constante de que com esforço e perseverança, é possível alcançar grandes realizações.
    </span>
';

$pdf->writeHTML($html, true, false, true, false, '');


$x = 10;
$y = 0;
$width = 40;
$height = 0; 


$imageFile = 'logocerti.png';
$pdf->Image($imageFile, $x, $y, $width, $height, '', '', '', false, 300, '', false, false, 0);


    $pdf->Output('certificado.pdf', 'I');
    
}
?>

