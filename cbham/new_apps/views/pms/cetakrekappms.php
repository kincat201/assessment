
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
	  $periode='';
	  $tahun='';	 
	 
	  foreach($dataku as $data1)
	  {
      if ($cek==0){	    	 
			  $nama=$data1->nama;	 
			  $jabatan=$data1->jabatan;	 
			  $tahun=$data1->tahun;				  			  			  			  
	    }
      $cek=1;
    }
	 
		$pdf->Cell(12 , 0.5,'HASIL EVALUASI KINERJA TAHUN ', 0, 'LR','R');
		$pdf->Cell(4 , 0.5,$tahun, 0, 'LR','L');			  
    $pdf->Ln();
    $pdf->Ln();			  
    $pdf->Ln();
    $pdf->Ln();			  
    $pdf->Cell(3 , 0.5,'Nama', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    $pdf->Cell(3 , 0.5,$nama, 0, 'LR','L');        
    $pdf->Ln();       
    $pdf->Cell(3 , 0.5,'Jabatan', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    $pdf->Cell(3 , 0.5,$jabatan, 0, 'LR','L');        
    $pdf->Ln();       
    $pdf->Ln();           
    $pdf->Ln();       

    $pdf->SetFont('Times','B',8);			  			 			 			    

    $ok=0;
    $cok=0;

    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);

    $pdf->Cell(3  , 0.5,'Periode', 1, 'LR','C',true);
    $pdf->Cell(5  , 0.5,'Penilai', 1, 'LR','C',true);    
    $pdf->Cell(2  , 0.5,'Nilai KRA', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Nilai KBA', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Total', 1, 'LR','C',true);	  
    $pdf->Cell(4  , 0.5,'Kategori', 1, 'LR','C',true);   
    $pdf->SetFont('Times','',8);
	  foreach($dataku as $data2)
	  {
      if($data2->periode==1){
        $periode='PERIODE I';  
      }elseif($data2->periode==2){
        $periode='PERIODE II';
      }elseif($data2->periode==3){
        $periode='PERIODE III';
      }elseif($data2->periode==4){
        $periode='PERIODE IV';
      }                
      $pdf->Ln();
      $pdf->Cell(3 , 0.5, $periode, 'LTRB',0,'L',0);
      $pdf->Cell(5 , 0.5, $data2->penilai, 'LTRB',0,'L',0);
      $pdf->Cell(2 , 0.5, number_format($data2->totalnilkra, 2, ',', '.'), 'LTRB',0,'R',0);
      $pdf->Cell(2 , 0.5, number_format($data2->totnilkba, 2, ',', '.'), 'LTRB',0,'R',0);
      $pdf->Cell(2 , 0.5, number_format($data2->totkrakba, 2, ',', '.'), 'LTRB',0,'R',0);
      $pdf->Cell(4 , 0.5, $data2->hasil, 'LTRB',0,'L',0);

	  }	
	  
     $pdf->Ln();
     $pdf->Ln();	 			

     $pdf->SetY(-3);
   
    $pdf->Output("cetakrekappms.pdf","I"); 
	
 ?>   