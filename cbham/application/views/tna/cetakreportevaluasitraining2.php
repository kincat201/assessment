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

    $pdf=new PDF('P','cm','Legal');
    $pdf->Open();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','B',10);
 
/* setting header table */     
   
    $cek=0;
	  // $namapegawai='';
	  $periode='';
	  $tahun='';	 
	 
	  foreach($dataku as $data1)
	  {
      if ($cek==0){	    	 
			  // $nama=$data1->ket5;	 
			  // $periode=$data1->ket7;	 
			  // $tahun=$data1->ket8;				  			  			  			  
	    }
      $cek=1;
    }
	 
    $pdf->Cell(10 , 0.5,'', 0, 'LR','L');			  
		$pdf->Cell(12 , 0.5,'RESUME PENILAIAN BERDASARKAN INPUT KEKUATAN DAN KELEMAHAN', 0, 'LR','R');
		// $pdf->Cell(4 , 0.5,$tahun, 0, 'LR','L');			  
    $pdf->Ln();
    $pdf->Ln();			  
    $pdf->Ln();
    $pdf->Ln();			  
    $pdf->Cell(3 , 0.5,'Periode', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    // $pdf->Cell(3 , 0.5,$periode, 0, 'LR','L');        
    $pdf->Ln();       
    $pdf->Cell(3 , 0.5,'Tahun', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    // $pdf->Cell(3 , 0.5,$tahun, 0, 'LR','L');        
    $pdf->Ln();       
    $pdf->Ln();       

    $pdf->SetFont('Times','B',8);			  			 			 			    

    $ok=0;
    $cok=0;

   //  $pdf->SetFont('Times','B',8);
   //  $pdf->SetFillColor(200,200,200);
   //  $pdf->Cell(4  , 0.5,'Nama', 1, 'LR','C',true);
   //  $pdf->Cell(1.5  , 0.5,'Kopeg', 1, 'LR','C',true);
   //  $pdf->Cell(8  , 0.5,'Kekuatan', 1, 'LR','C',true);
   //  $pdf->Cell(9  , 0.5,'Kelemahan', 1, 'LR','C',true);
   //  $pdf->Cell(9  , 0.5,'Tindak Lanjut', 1, 'LR','C',true);
   //  $pdf->Cell(2.5  , 0.5,'Jadwal', 1, 'LR','C',true);	  
   //  $pdf->SetFont('Times','',8);
	  // foreach($dataku as $data2)
	  // {
   //    $pdf->Ln();
   //    $pdf->Cell(4 , 0.5, $data2->ket1, 'LTRB',0,'L',0);
   //    $pdf->Cell(1.5 , 0.5, $data2->ket2, 'LTRB',0,'L',0);
   //    $pdf->Cell(8 , 0.5, substr($data2->ket3,0,70), 'LTRB',0,'L',0);
   //    $pdf->Cell(9 , 0.5, substr($data2->ket4,0,70), 'LTRB',0,'L',0);
   //    $pdf->Cell(9 , 0.5, substr($data2->ket5,0,70), 'LTRB',0,'L',0);
   //    $pdf->Cell(2.5 , 0.5, $data2->ket6, 'LTRB',0,'L',0);
	  // }	

    
	        // $pdf->Ln();
   	     //    $pdf->Cell(24 , 0.5, 'Rata-rata Nilai', 'LTRB',0,'C',0);
   	     //    $pdf->Cell(2 , 0.5, number_format($ratakra, 1, ',', '.'), 'LTRB',0,'C',0);
   	     //    $pdf->Cell(2 , 0.5, number_format($ratakba, 1, ',', '.'), 'LTRB',0,'C',0);						
   	     //    $pdf->Cell(2 , 0.5, number_format($totalsemua, 1, ',', '.'), 'LTRB',0,'C',0);
   	     //    if($kategori=='BUTUH PENGEMBANGAN'){
        	// 	$pdf->SetFillColor(255,0,0);
        	// 	$pdf->Cell(4 , 0.5, $kategori, 1, 'LTRB', 'L', true);       	        
        	// }elseif($kategori=='KOMPETEN'){
        	// 	$pdf->SetFillColor(255,255,0);
        	// 	$pdf->Cell(4 , 0.5, $kategori, 1, 'LTRB', 'L', true);       	                		
        	// }elseif($kategori=='SANGAT EFEKTIF'){
        	// 	$pdf->SetFillColor(0,153,0);
        	// 	$pdf->Cell(4 , 0.5, $kategori, 1, 'LTRB', 'L', true);       	                		
        	// }elseif($kategori=='SEMPURNA'){
        	// 	$pdf->SetFillColor(0,102,204);
        	// 	$pdf->Cell(4 , 0.5, $kategori, 1, 'LTRB', 'L', true);       	                		
        	// }


   	        // $pdf->Cell(4 , 0.5, $kategori, 'LTRB',0,'L',0);
	  
		     $pdf->Ln();
		     $pdf->Ln();	 			

     $pdf->SetY(-3);
 
$pdf->Output("rekapkekuatan.pdf","I"); 
	
 ?>   
</body>
</html>