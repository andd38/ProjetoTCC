<?php
if (isset($_POST['certi'])) {
session_start();
require_once('tcpdf/tcpdf.php');

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

$pdf->SetCreator('Brasil Concursos');
$pdf->SetAuthor('');
$pdf->SetTitle('Certificado de conclusão');
$pdf->SetSubject('esrer');
$pdf->SetKeywords('palavra-chave, PDF, PHP');

    $id = $_SESSION['idAlunos'];
    $nome = $_SESSION['nome'];
    $email = $_SESSION['email'];
    $dataConclusao =  date("Y/m/d");
    $curso = 'Astronauta';
    
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
    

    $pdf->Cell(0, 10, 'concluiu com sucesso o curso de', 0, 1, 'C');
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 15, $curso, 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 14);
    $pdf->Cell(0, 10, 'em '.$dataConclusao, 0, 1, 'C');
    

    $pdf->SetFont('helvetica', '', 12);
    $pdf->MultiCell(0, 10, 'Parabenizamos o aluno por sua dedicação e empenho ao longo do curso, demonstrando um excelente desempenho e comprometimento com o aprendizado. Sua determinação e perseverança são dignas de reconhecimento.', 0, 'J');

    $pdf->MultiCell(0, 10, 'Que este certificado seja um símbolo de sua dedicação e um lembrete constante de que com esforço e perseverança, é possível alcançar grandes realizações.', 0, 'J');
    
    $pdf->SetY(-40);
    
    $pdf->SetFont('helvetica', 'I', 10);
    $pdf->Cell(0, 10, 'Data: '.date('d/m/Y'), 0, 0, 'L');
    
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'Assinatura: _______________________________', 0, 1, 'R');
    

    $pdf->Output('certificado.pdf', 'I');
    
}
?>
