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
    $pegawai = $header['nik'].' '.$header['nama'];
    $pegawai = str_replace('.', '_', $pegawai);
		$pdf->Cell(19 , 0.5,'REKAP PROFIL KOMPETENSI MANAGERIAL SKILL', 0, 'LR','C');
    $pdf->Ln();	  
    $pdf->Ln(); 
    $pdf->Cell(3 , 0.5,'NIK', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    $pdf->Cell(3 , 0.5,$header['nik'], 0, 'LR','L'); 
    $pdf->Ln(); 
    $pdf->Cell(3 , 0.5,'Nama', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    $pdf->Cell(3 , 0.5,strtoupper($header['nama']), 0, 'LR','L'); 
    $pdf->Ln(); 
    $pdf->Cell(3 , 0.5,'Tahun', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    $pdf->Cell(3 , 0.5,$header['tahun'], 0, 'LR','L');        
    $pdf->Ln();     
    $pdf->Ln(); 
    
    // $pdf->Cell(3 , 0.5,'Daftar Peserta Training', 0, 'LR','L'); 
    // $pdf->Ln(); 
    
    $pdf->SetFont('Times','B',10);			  			 			 			    

    $no=1;
    $pdf->SetFont('Times','B',10);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(4.5  , 0.5,'Jenis', 1, 'LR','C',true);
    $pdf->Cell(4.25  , 0.5,'Kompetensi', 1, 'LR','C',true);    
    $pdf->Cell(2  , 0.5,'Standart', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Periode I', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Gap I', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Periode II', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Gap II', 1, 'LR','C',true);
    $pdf->SetFont('Times','',10);
	  foreach(@$dataku as $rowp)
    {
      $pdf->Ln();
      $pdf->Cell(4.5 , 0.5, @$rowp->jenis, 'LTRB',0,'C',0);
      $pdf->Cell(4.25 , 0.5, strtoupper(@$rowp->nama), 'LTRB',0,'C',0);
      $pdf->Cell(2 , 0.5, @$rowp->standart, 'LTRB',0,'C',0);
      $pdf->Cell(2 , 0.5, @$rowp->val1, 'LTRB',0,'C',0);
      $pdf->Cell(2 , 0.5, @$rowp->gap1, 'LTRB',0,'C',0);   
      $pdf->Cell(2 , 0.5, @$rowp->val2, 'LTRB',0,'C',0);
      $pdf->Cell(2 , 0.5, @$rowp->gap2, 'LTRB',0,'C',0);   
      $no++;                       
    }   

    $pdf->Ln();
    $pdf->Ln();	 			
    $pdf->SetY(-3);
    $pdf->Output("REKAPMANAGERIAL_".$pegawai.".pdf","I"); 
	
  ?>   
</body>
</html>