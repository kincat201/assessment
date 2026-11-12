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

    $pdf=new PDF('L','cm','A4');
    $pdf->Open();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','B',10);
 
/* setting header table */     
	  foreach($dataku as $row)
	  {
      $unit=$row->ket1;
      $jabatan=$row->ket2;
      $bulan=$row->ket4;
      $tahun=$row->ket3;
    }
      // $notraining = $row->notraining;
      $pdf->SetFont('Times','B',15);
  		$pdf->Cell(28 , 0.5,'LAPORAN HASIL PENILAIAN SKK', 0, 'LR','C');
      $pdf->Ln();	  
      $pdf->Ln(); 
      $pdf->Ln(); 
      $pdf->Ln(); 
      $pdf->Ln(); 
      $pdf->SetFont('Times','B',10);
      $pdf->Cell(3 , 0.5,'Unit', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$unit, 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'Jabatan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$jabatan, 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'Bulan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$bulan, 0, 'LR','L');        
      $pdf->Ln();       
      $pdf->Cell(3 , 0.5,'Tahun', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$tahun, 0, 'LR','L');  
      $pdf->Ln();     
      $pdf->Ln(); 
    // }

    // $pdf->Cell(3 , 0.5,'Daftar Peserta Training', 0, 'LR','L'); 
    // $pdf->Ln(); 
    
    // $pdf->SetFont('Times','B',8);			  			 			 			    

    // $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(1  , 0.5,'Kode', 1, 'LR','C',true);
    $pdf->Cell(13  , 0.5,'KPI', 1, 'LR','C',true);    
    $pdf->Cell(2.5  , 0.5,'Polarisasi', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'Satuan', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Target', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Realisasi', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Indeks Capaian', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Indeks KPI', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'NSS', 1, 'LR','C',true);

    $total=0;
    $pdf->SetFont('Times','',8);
    if (count($dataku)>0) {
  	  foreach(@$dataku as $rowp)
  	  {
        $total=$total+@$rowp->ket13;
        $pdf->Ln();
        $pdf->Cell(1 , 0.5, @$rowp->ket5, 'LTRB',0,'C',0);
        $pdf->Cell(13 , 0.5, @$rowp->ket6, 'LTRB',0,'L',0);
        $pdf->Cell(2.5 , 0.5, @$rowp->ket7, 'LTRB',0,'L',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket8, 'LTRB',0,'C',0);
        $pdf->Cell(2 , 0.5, number_format(@$rowp->ket9, 0, ',', '.'), 'LTRB',0,'R',0);   
        $pdf->Cell(2 , 0.5, number_format(@$rowp->ket10, 0, ',', '.'), 'LTRB',0,'R',0);   
        $pdf->Cell(2 , 0.5, number_format(@$rowp->ket11, 0, ',', '.'), 'LTRB',0,'R',0);   
        $pdf->Cell(2 , 0.5, number_format(@$rowp->ket12, 0, ',', '.'), 'LTRB',0,'R',0);   
        $pdf->Cell(2 , 0.5, number_format(@$rowp->ket13, 0, ',', '.'), 'LTRB',0,'R',0);   
        // $no++;                       
  	  }	
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Data kosong', 'LTRB',0,'C',0);
    }
    $pdf->Ln();
    $status='';
    if (round($total)<86) $status='Butuh Pengembangan';
    elseif ((round($total)>=86) and (round($total)<101)) $status='Kompeten';
    elseif ((round($total)>=101) and (round($total)<116)) $status='Sangat Efektif';
    elseif (round($total)>=116) $status='Sempurna';	  

    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(23.5  , 0.5,'Total', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,number_format($total, 0, ',', '.'), 1, 'LR','R',true);
    $pdf->Ln();
    $pdf->Cell(23.5  , 0.5,'Status', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,$status, 1, 'LR','C',true);
    $pdf->Ln(); 
    $pdf->Ln(); 
    $pdf->Ln();    

    // $this->SetFillColor(200,200,200);
    // $this->Cell(615,$h,'Total',1,0,'L',true);
    // $this->Cell(130,$h,round($total),1,1,'R',true);
    // $this->Cell(615,$h,'Status',1,0,'L',true);
    // $this->SetFont('Times','B',9);
    // $this->Cell(130,$h,$status,1,0,'C',true);   

    $tempat='Jakarta, '.date('d F Y');
    $pdf->SetFillColor(255);
    $pdf->Cell(23,0.5,'',0,0,'L',true);
    $pdf->Cell(3 , 0.5, $tempat,'',0,'C',0);          
    $pdf->Ln();
    $pdf->Cell(2,0.5,'',0,0,'L',true);
    $pdf->Cell(15 , 0.5, 'Disetujui,','',0,'C',0);          
    $pdf->Cell(15 , 0.5, 'Dibuat,','',0,'C',0);                  
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(2,0.5,'',0,0,'L',true);
    $pdf->Cell(15 , 0.5, '________________________________','',0,'C',0);          
    $pdf->Cell(15 , 0.5, '________________________________','',0,'C',0);             

    $pdf->Ln();
    $pdf->Ln();	 			
    $pdf->SetY(-3);
    $pdf->Output("SKK_tes.pdf","I"); 
    // $pdf->Output("SKK_tes".$notraining.".pdf","I"); 
	
  ?>   
</body>
</html>