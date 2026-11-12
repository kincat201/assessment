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
	  foreach($header as $row)
	  {
      $notraining = $row->notraining;
  		$pdf->Cell(19 , 0.5,'PROGRAM TRAINING', 0, 'LR','C');
      $pdf->Ln();	  
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'Kode TNA', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->kodetna, 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'Nomor Training', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->notraining, 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'Jadwal Training', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,date('d F Y',strtotime($row->mulai))." s/d ".date('d F Y',strtotime($row->akhir)), 0, 'LR','L');        
      $pdf->Ln();       
      $pdf->Cell(3 , 0.5,'Tutor', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->tutor, 0, 'LR','L');  
      $pdf->Ln();     
      $pdf->Cell(3 , 0.5,'Biaya Training', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,'Rp. '.number_format($row->biaya,0,',','.'), 0, 'LR','L');   
      $pdf->Ln();        
      $pdf->Ln(); 
    }
    $pdf->Cell(3 , 0.5,'Daftar Peserta Training', 0, 'LR','L'); 
    $pdf->Ln(); 
    
    $pdf->SetFont('Times','B',8);			  			 			 			    

    $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.75  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'NIK', 1, 'LR','C',true);    
    $pdf->Cell(5.5  , 0.5,'Nama', 1, 'LR','C',true);
    $pdf->Cell(5.25  , 0.5,'Unit', 1, 'LR','C',true);
    $pdf->Cell(5.5  , 0.5,'Jabatan', 1, 'LR','C',true);
    $pdf->SetFont('Times','',8);
    if (count($detail)>0) {
  	  foreach(@$detail as $rowp)
  	  {
        $pdf->Ln();
        $pdf->Cell(0.75 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(2 , 0.5, @$rowp->nik, 'LTRB',0,'C',0);
        $pdf->Cell(5.5 , 0.5, @$rowp->nama, 'LTRB',0,'L',0);
        $pdf->Cell(5.25 , 0.5, @$rowp->namaunit, 'LTRB',0,'L',0);
        $pdf->Cell(5.5 , 0.5, @$rowp->namajabatan, 'LTRB',0,'L',0);   
        $no++;                       
  	  }	
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Data Perserta Belum Ditambahkan', 'LTRB',0,'C',0);
    }
	  
    $pdf->Ln();
    $pdf->Ln();	 			
    $pdf->SetY(-3);
    $pdf->Output("TRAINING_".$notraining.".pdf","I"); 
	
  ?>   
</body>
</html>