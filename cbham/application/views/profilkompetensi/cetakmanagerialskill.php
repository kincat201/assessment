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
	$pdf->Cell(19 , 0.5,'PROFIL KOMPETENSI MANAGERIAL SKILL', 0, 'LR','C');
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
    $pdf->Cell(3 , 0.5,'Periode', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    $pdf->Cell(3 , 0.5,$header['periode'], 0, 'LR','L');  
    $pdf->Ln();      
    $pdf->Ln(); 
    
    // $pdf->Cell(3 , 0.5,'Daftar Peserta Training', 0, 'LR','L'); 
    // $pdf->Ln(); 
    
    $pdf->SetFont('Times','B',10);			  			 			 			    

    $no=1;
    $pdf->SetFont('Times','B',10);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(4.5  , 0.5,'Jenis', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,'Kompetensi', 1, 'LR','C',true);    
    $pdf->Cell(3.5  , 0.5,'Standart', 1, 'LR','C',true);
    $pdf->Cell(3.5  , 0.5,'Nilai', 1, 'LR','C',true);
    $pdf->Cell(3.5  , 0.5,'Gap', 1, 'LR','C',true);
    $pdf->SetFont('Times','',10);
	  foreach(@$dataku as $rowp)
	  {
      $pdf->Ln();
      $pdf->Cell(4.5 , 0.5, @$rowp->jenis, 'LTRB',0,'C',0);
      $pdf->Cell(4 , 0.5, strtoupper(@$rowp->nama), 'LTRB',0,'C',0);
      $pdf->Cell(3.5 , 0.5, @$rowp->standart, 'LTRB',0,'C',0);
      $pdf->Cell(3.5 , 0.5, @$rowp->val, 'LTRB',0,'C',0);
      $pdf->Cell(3.5 , 0.5, @$rowp->gap, 'LTRB',0,'C',0);   
      $no++;                       
	  }	

    $pdf->Ln();
    $pdf->Ln();	 	

    foreach ($catatan as $rowc) 
    {
        $newpenanggungjawab = wordwrap($rowc->penanggungjawab, 105, '<br>');         
        $penanggungjawab = explode(' ', $rowc->penanggungjawab);
        $penanggungjawab = explode('<br>', $newpenanggungjawab);

        $newjadwal = wordwrap($rowc->jadwal, 105, '<br>');         
        $jadwal = explode(' ', $rowc->jadwal);
        $jadwal = explode('<br>', $newjadwal);

        $newkomentar = wordwrap($rowc->komentar, 105, '<br>');         
        $komentar = explode(' ', $rowc->komentar);
        $komentar = explode('<br>', $newkomentar);

        $pdf->Ln();
        $pdf->Cell(19  , 0.5,'Penanggung Jawab', 1, 'LR','C',true);
        $pdf->Ln();
        for ($i=0; $i < count($penanggungjawab); $i++) { 
            $pdf->Cell(19 , 0.5, $penanggungjawab[$i],'LR',1,'L',0);
        }  
        $pdf->Cell(19 , 0.5, '','LRB',1,'L',0);
        $pdf->Ln();
        $pdf->Cell(19  , 0.5,'Jadwal', 1, 'LR','C',true);
        $pdf->Ln();
        for ($i=0; $i < count($jadwal); $i++) { 
            $pdf->Cell(19 , 0.5, $jadwal[$i],'LR',1,'L',0);
        }  
        $pdf->Cell(19 , 0.5, '','LRB',1,'L',0);
        // $pdf->Cell(19 , 0.5,  wordwrap($rowc->kekuatan,15,) , 'LTRB',0,'C',0);
        $pdf->Ln();
        $pdf->Cell(19  , 0.5,'Komentar', 1, 'LR','C',true);
        $pdf->Ln();
        for ($i=0; $i < count($komentar); $i++) { 
            $pdf->Cell(19 , 0.5, $komentar[$i],'LR',1,'L',0);
        }  
        $pdf->Cell(19 , 0.5, '','LRB',1,'L',0);
    }   		
    $pdf->SetY(-3);
    $pdf->Output("MANAGERIAL_".$pegawai.".pdf","I"); 
	
  ?>   
</body>
</html>