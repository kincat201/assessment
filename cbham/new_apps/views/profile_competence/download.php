<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <!-- FUSION CHARTS -->
</head>
<body>
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
$file_name = $pegawai->nik.' '.$pegawai->nama;
$file_name = str_replace('.', '_', $file_name);
$pdf->Cell(19 , 0.5,'REKAP PROFIL KOMPETENSI', 0, 'LR','C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(3 , 0.5,'NIK', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$pegawai->nik, 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Nama', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,strtoupper($pegawai->nama).' ( '.strtoupper($pegawai->namaunit).' )', 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Nama Atasan', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,strtoupper($pegawai->nama_atasan ? $pegawai->nama_atasan : '-'), 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Tahun', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$tahun, 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Tanggal Evaluasi', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$competence_pegawai->created_at . ' ( Di Evaluasi oleh : '.strtoupper($competence_pegawai->created_by).')', 0, 'LR','L');
$pdf->Ln();
if($competence_pegawai->created_at != $competence_pegawai->updated_at) {
    $pdf->Cell(3, 0.5, 'Tanggal Modified', 0, 'LR', 'L');
    $pdf->Cell(0.5, 0.5, ':', 0, 'LR', 'L');
    $pdf->Cell(3, 0.5, $competence_pegawai->updated_at . ' ( Di Edit oleh : ' . strtoupper($competence_pegawai->updated_by) . ')', 0, 'LR', 'L');
    $pdf->Ln();
}
$pdf->Ln();
$pdf->Ln();

// $pdf->Cell(3 , 0.5,'Daftar Peserta Training', 0, 'LR','L');
// $pdf->Ln();

$pdf->SetFont('Times','B',10);

$no=1;
$pdf->SetFont('Times','B',10);
$pdf->SetFillColor(200,200,200);
$pdf->Cell(2  , 0.5,'Jenis', 1, 'LR','C',true);
$pdf->Cell(7  , 0.5,'Kompetensi', 1, 'LR','C',true);
$pdf->Cell(2  , 0.5,'Standart', 1, 'LR','C',true);
$pdf->Cell(2  , 0.5,'Periode I', 1, 'LR','C',true);
$pdf->Cell(2  , 0.5,'Gap I', 1, 'LR','C',true);
$pdf->Cell(2  , 0.5,'Periode II', 1, 'LR','C',true);
$pdf->Cell(2  , 0.5,'Gap II', 1, 'LR','C',true);
$pdf->SetFont('Times','',10);

$category = [
    'CORE' => 'Kompetensi Inti',
    'LEADERSHIP' => 'Kompetensi Kepemimpinan',
    'FUNDAMENTAL' => 'Kompetensi Teknis Fundamental',
    'TECHNICAL' => 'Kompetensi Teknis Spesifik',
];

foreach(@$competence as $key => $rowp)
{
    if($rowp->value == 0 ) continue;
    if($key == 0 || ($key > 0 && $rowp->category != $competence[$key-1]->category)){
        $current_category = !empty($category[$rowp->category]) ? $category[$rowp->category] : '-';
        $pdf->Ln();
        $pdf->SetFont('Times','B',10);
        $pdf->SetFillColor(200,200,200);
        $pdf->Cell(19 , 0.5, @$current_category, 'LTRB',0,'L',true);
    }
    $pdf->SetFont('Times','',10);
    $pdf->Ln();
    $pdf->Cell(2 , 0.5, @$rowp->competence_code, 'LTRB',0,'C',0);
    $pdf->Cell(7 , 0.5, mb_strimwidth(strtoupper(@$rowp->name),0,30,"..."), 'LTRB',0,'C',0);
    $pdf->Cell(2 , 0.5, @$rowp->value, 'LTRB',0,'C',0);
    $pdf->Cell(2 , 0.5, @$rowp->real_value_one, 'LTRB',0,'C',0);
    $pdf->Cell(2 , 0.5, @$rowp->gap_one, 'LTRB',0,'C',0);
    $pdf->Cell(2 , 0.5, @$rowp->real_value_two, 'LTRB',0,'C',0);
    $pdf->Cell(2 , 0.5, @$rowp->gap_two, 'LTRB',0,'C',0);
    $no++;
}


$pdf->Ln();
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Kekuatan', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$competence_pegawai->kekuatan, 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Kelemahan', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$competence_pegawai->kelemahan, 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Rencana Pengembangan', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$competence_pegawai->rencana, 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Penanggung Jawab', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$competence_pegawai->penanggung_jawab, 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Jadwal', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$competence_pegawai->jadwal, 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Komentar', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$competence_pegawai->komentar, 0, 'LR','L');
$pdf->Ln();
$pdf->Cell(3 , 0.5,'Catatan Lainnya', 0, 'LR','L');
$pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');
$pdf->Cell(3 , 0.5,$competence_pegawai->notes, 0, 'LR','L');
$pdf->Ln();

$pdf->Ln();
$pdf->Ln();
$pdf->SetY(-3);
$pdf->Output("REKAP_PROFILE_COMPETENCE".$file_name.".pdf","I");

?>
</body>
</html>