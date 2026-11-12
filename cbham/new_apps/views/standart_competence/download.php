<?php
ob_start();
date_default_timezone_set('Asia/Jakarta');
class PDF extends FPDF {
}
/*---- header selesai ---*/

$pdf=new PDF('P','cm','A4');
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',10);

/* setting header table */

$cek=0;
// $namapegawai='';
$periode='';
$tahun='';

/*foreach($dataku as $data1)
{
    if ($cek==0){
        // $nama=$data1->ket5;
        $periode=$data1->ket7;
        $tahun=$data1->ket8;
    }
    $cek=1;
}*/

$pdf->Cell(12 , 0.5,'STANDAR KOMPETENSI - '.$jabatan->namajabatan, 0, 'LR','R');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Times','B',8);

$ok=0;
$cok=0;

$pdf->SetFont('Times','B',8);
$pdf->SetFillColor(200,200,200);
$pdf->Cell(3  , 0.5,'Kompetensi', 1, 'LR','C',true);
$pdf->Cell(11  , 0.5,'Keterangan', 1, 'LR','C',true);
$pdf->Cell(5  , 0.5,'Nilai', 1, 'LR','C',true);
$pdf->Ln();
$pdf->Cell(3  , 0.5,'', 1, 'LR','C',true);
$pdf->Cell(11  , 0.5,'', 1, 'LR','C',true);
$pdf->Cell(1  , 0.5,'1', 1, 'LR','C',true);
$pdf->Cell(1  , 0.5,'2', 1, 'LR','C',true);
$pdf->Cell(1  , 0.5,'3', 1, 'LR','C',true);
$pdf->Cell(1  , 0.5,'4', 1, 'LR','C',true);
$pdf->Cell(1  , 0.5,'5', 1, 'LR','C',true);
$pdf->SetFont('Times','',8);

$category = [
    'CORE' => 'Kompetensi Inti',
    'LEADERSHIP' => 'Kompetensi Kepemimpinan',
    'FUNDAMENTAL' => 'Kompetensi Teknis Fundamental',
    'TECHNICAL' => 'Kompetensi Teknis Spesifik',
];

foreach($competence as $key => $item)
{
    if($key == 0 || ($key > 0 && $item->category != $competence[$key-1]->category)){
        $current_category = !empty($category[$item->category]) ? $category[$item->category] : '-';
        $pdf->Ln();
        $pdf->SetFont('Times','B',10);
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(19 , 0.5, @$current_category, 'LTRB',0,'L',true);
    }
    $pdf->Ln();
    $pdf->Cell(3 , 0.5, $item->competence_code, 'LTRB',0,'L',0);
    $pdf->Cell(11 , 0.5, $item->name, 'LTRB',0,'L',0);
    if($item->value==1){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, 'X', 'LTRB',0,'C',true);
    }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
    }

    if($item->value==2){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, 'X', 'LTRB',0,'C',true);
    }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
    }

    if($item->value==3){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, 'X', 'LTRB',0,'C',true);
    }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
    }

    if($item->value==4){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, 'X', 'LTRB',0,'C',true);
    }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
    }

    if($item->value==5){
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(1 , 0.5, 'X', 'LTRB',0,'C',true);
    }else{
        $pdf->SetFillColor(255,255,255);
        $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
    }
}

$pdf->Ln();
$pdf->Ln();

$pdf->SetY(-3);

$pdf->Output("standart_competence_".$jabatan->kojab.".pdf","I");