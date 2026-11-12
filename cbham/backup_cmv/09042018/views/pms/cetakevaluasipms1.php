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
   
    $cek=0;
	  // $namapegawai='';
	  $periode='';
	  $tahun='';	 
	 
	  foreach($dataku as $data1)
	  {
      if ($cek==0){	    	 
			  $nama=$data1->nama;	 
        $nik=$data1->kopeg;
        if($data1->periode==1){
			    $periode='PERIODE I';	 
        }elseif($data1->periode==2){
          $periode='PERIODE II';
        }elseif($data1->periode==3){
          $periode='PERIODE III';
        }elseif($data1->periode==4){
          $periode='PERIODE IV';
        }
			  $tahun=$data1->tahun;				  			  			  			  
	    }
      $cek=1;
    }
	 
		$pdf->Cell(18 , 0.5,'HASIL PENILAIAN KINERJA', 0, 'LR','R');
    $pdf->Ln();
		$pdf->Cell(15.5 , 0.5,$periode, 0, 'LR','R');			  
    $pdf->Cell(1.5 , 0.5,'TAHUN', 0, 'LR','C');        
    $pdf->Cell(4 , 0.5,$tahun, 0, 'LR','L');        
    $pdf->Ln();
    $pdf->Ln();			  
    $pdf->Ln();
    $pdf->Ln();			  
    $pdf->Cell(3 , 0.5,'Nama', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    $pdf->Cell(3 , 0.5,$nama, 0, 'LR','L');        
    $pdf->Ln();       
    $pdf->Cell(3 , 0.5,'NIK', 0, 'LR','L');        
    $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
    $pdf->Cell(3 , 0.5,$nik, 0, 'LR','L');        
    $pdf->Ln();       
    $pdf->Ln();       
    $pdf->Cell(3 , 0.5,'PENILAIAN KEY RESULT AREA', 0, 'LR','L');        
    $pdf->SetFont('Times','B',8);			  			 			 			    

    $ok=0;
    $cok=0;
    
    $pdf->Ln();       
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(4 , 0.5, '', 'LTR',0,'L',0);
    $pdf->Cell(1 , 0.5, '', 'LTR',0,'L',0);    
    $pdf->Cell(3 , 0.5, 'Penjelasan 4', 'LTR',0,'C',0);        
    $pdf->Cell(10 , 0.5, 'SKALA KONVERSI NILAI KRA', 'LTRB',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'Penjelasan 15', 'LTR',0,'C',0);        
    $pdf->Cell(2 , 0.5, 'Bobot', 'LTR',0,'C',0);        
    $pdf->Cell(2 , 0.5, 'Nilai', 'LTR',0,'C',0);        
    $pdf->Cell(2 , 0.5, 'Total', 'LTR',0,'C',0);        
    $pdf->Cell(6 , 0.5, 'Kekuatan', 'LTRB',0,'C',0);        
    $pdf->Ln();       
    $pdf->Cell(4 , 0.5, 'KRA', 'LR',0,'C',0);
    $pdf->Cell(1 , 0.5, '60', 'LR',0,'C',0);    
    $pdf->Cell(3 , 0.5, 'pada nilai', 'LR',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'Butuh', 'LR',0,'C',0);        
    $pdf->Cell(2 , 0.5, 'Kompeten', 'LR',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'Sangat', 'LR',0,'C',0);        
    $pdf->Cell(2 , 0.5, 'Sempurna', 'LR',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'pada nilai', 'LR',0,'C',0);        
    $pdf->Cell(2 , 0.5, 'Sub', 'LR',0,'C',0);            
    $pdf->Cell(2 , 0.5, 'Bobot Sub', 'LR',0,'C',0);            
    $pdf->Cell(2 , 0.5, 'Nilai', 'LR',0,'C',0);            
    $pdf->Cell(6 , 0.5, '', 'LR',0,'C',0);           
    $pdf->Ln();       
    $pdf->Cell(4 , 0.5, '', 'LR',0,'C',0);
    $pdf->Cell(1 , 0.5, '', 'LR',0,'C',0);    
    $pdf->Cell(3 , 0.5, 'KRA', 'LR',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'Pengembangan', 'LR',0,'C',0);        
    $pdf->Cell(2 , 0.5, '', 'LR',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'Efektif', 'LR',0,'C',0);        
    $pdf->Cell(2 , 0.5, '', 'LR',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'KRA', 'LR',0,'C',0);        
    $pdf->Cell(2 , 0.5, 'Aspek', 'LR',0,'C',0);            
    $pdf->Cell(2 , 0.5, 'Aspek', 'LR',0,'C',0);            
    $pdf->Cell(2 , 0.5, 'Bobot', 'LR',0,'C',0);            
    $pdf->Cell(6 , 0.5, '', 'LR',0,'C',0);                
    $pdf->Ln();       
    $pdf->Cell(4 , 0.5, '', 'LR',0,'C',0);
    $pdf->Cell(1 , 0.5, '', 'LR',0,'C',0);    
    $pdf->Cell(3 , 0.5, 'KRA', 'LR',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'Pengembangan', 'LR',0,'C',0);        
    $pdf->Cell(2 , 0.5, '', 'LR',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'Efektif', 'LR',0,'C',0);        
    $pdf->Cell(2 , 0.5, '', 'LR',0,'C',0);        
    $pdf->Cell(3 , 0.5, 'KRA', 'LR',0,'C',0);        
    $pdf->Cell(2 , 0.5, 'Aspek', 'LR',0,'C',0);            
    $pdf->Cell(2 , 0.5, 'Aspek', 'LR',0,'C',0);            
    $pdf->Cell(2 , 0.5, 'Bobot', 'LR',0,'C',0);            
    $pdf->Cell(6 , 0.5, '', 'LR',0,'C',0);                    
    // $pdf->Cell(3  , 0.5,'', 'LTR',0,'C',true);
    // $pdf->Cell(11  , 0.5,'', 'LTR',0,'C',true);
    // $pdf->Cell(5  , 0.5,'Penjelasan 4', 1, 'LR','C',true);
    // $pdf->Ln();
    // $pdf->Cell(3  , 0.5,'', 1, 'LR','C',true);
    // $pdf->Cell(11  , 0.5,'', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'1', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'2', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'3', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'4', 1, 'LR','C',true);
    // $pdf->Cell(1  , 0.5,'5', 1, 'LR','C',true);	  
    $pdf->SetFont('Times','',8);
	  foreach($dataku as $data2)
	  {
      $pdf->Ln();
      // $pdf->Cell(3 , 0.5, $data2->nama, 'LTRB',0,'L',0);
      // $pdf->Cell(11 , 0.5, $data2->kopeg, 'LTRB',0,'L',0);
      // if($data2->ket2=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }      

      // if($data2->ket3=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }      

      // if($data2->ket4=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }      

      // if($data2->ket5=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }      

      // if($data2->ket6=='X'){
      //   $pdf->SetFillColor(200,200,200);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);
      // }else{
      //   $pdf->SetFillColor(255,255,255);
      //   $pdf->Cell(1 , 0.5, '', 'LTRB',0,'L',true);        
      // }                        
	  }	
	  
		     $pdf->Ln();
		     $pdf->Ln();	 			

     $pdf->SetY(-3);
 
$pdf->Output("cetakknowhow.pdf","I"); 
	
 ?>   
</body>
</html>