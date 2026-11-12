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
    $pdf->SetFont('Times','B',9);
 
/* setting header table */     
	  foreach($mpp as $row)
	  {
      $nompp = $row->nompp;
  		$pdf->Cell(27.5 , 0.5,'MAN POWER-PLANNING TEAM PROYEK', 0, 'LR','C');
      $pdf->Ln();	  
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'No MPP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->nompp, 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'Divisi', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->namadivisi, 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'Tahun', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->tahun, 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'Nama Proyek', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->proyek, 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(3 , 0.5,'Tanggal Entry', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,date('d F Y',strtotime($row->tglentry)), 0, 'LR','L');        
      $pdf->Ln();  

      // $pdf->Cell(27.5 , 0.5,'Detail MPP', 0, 'LR','C'); 
      $pdf->Ln(); 
      $pdf->SetFont('Times','B',9);
      $pdf->SetFillColor(200,200,200);
      $pdf->Cell(6  , 0.5,'Jabatan','LTR',0,'C',true); 
      $pdf->Cell(2  , 0.5,'Mulai','LTR',0,'C',true); 
      $pdf->Cell(2  , 0.5,'Selesai','LTR',0,'C',true); 
      $pdf->Cell(2  , 0.5,'Kebutuhan', 1, 'LR','C',true);
      $pdf->Cell(4.5  , 0.5,'Kandidat', 'LTR',0,'C',true);
      $pdf->Cell(7  , 0.5,'Kualifikasi', 'LTR',0,'C',true);
      $pdf->Cell(4  , 0.5,'Catatan', 'LTR',0,'C',true);
      // $pdf->Cell(3  , 0.5,'Catatan', 'LTR',0,'C',true);
      // $pdf->Cell(5  , 0.5,'', 1, 'LR','C',true);
      $pdf->SetFont('Times','',9);
      foreach($row->detail as $rowd)
      {
        $pdf->Ln();
        $pdf->Cell(6  , 0.5,$rowd->namajabatan, 1, 'LR','L');
        $pdf->Cell(2  , 0.5,date('d/m/Y',strtotime($rowd->mulai)), 1, 'LR','C');    
        $pdf->Cell(2  , 0.5,date('d/m/Y',strtotime($rowd->selesai)), 1, 'LR','C');
        $pdf->Cell(2  , 0.5,$rowd->kebutuhan, 1, 'LR','L');
        $pdf->Cell(4.5  , 0.5,@$rowd->namakandidat, 1, 'LR','L');
        $pdf->Cell(7  , 0.5,$rowd->kualifikasi, 1, 'LR','L');
        $pdf->Cell(4  , 0.5,$rowd->catatan, 1, 'LR','L');
        // $pdf->Cell(3  , 0.5,$rowd->catatan, 1, 'LR','L');
      }  
    }
	  
    $pdf->Ln();
    $pdf->Ln();	 			
    // $pdf->SetY(-3);
    $pdf->Output("MPP_".$nompp.".pdf","I"); 
	
  ?>   
</body>
</html>