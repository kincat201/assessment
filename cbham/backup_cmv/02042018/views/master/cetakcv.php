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
	  foreach($datapeg as $row)
	  {
      $nik = str_replace('.', '', $row->nik);
      $nama = $row->nama;
      $kelamin = array('L' => 'Laki-laki', 'P' => 'Perempuan');
      $status = array('B' => 'Belum Menikah', 'K' => 'Menikah', 'D' => 'Duda', 'J' => 'Janda');
  		$pdf->Cell(19 , 0.5,'DATA PEGAWAI', 0, 'LR','C');
      $pdf->Ln();	  
      $pdf->Ln(); 
      $pdf->Cell(4 , 0.5,'NIK', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(6.5 , 0.5,$row->nik, 1, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Nama', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(8 , 0.5,$row->gelardepan.' '.$row->nama.', '.$row->gelarbelakang, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Tempat / Tanggal Lahir', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(7.25 , 0.5,$row->tempatlahir.' / '.date('d F Y',strtotime($row->tgllahir)), 0, 'LR','L'); 
      $pdf->Cell(3 , 0.5,'No KTP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->noktp, 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(4 , 0.5,'Tanggal Masuk', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(7.25 , 0.5,date('d F Y',strtotime($row->tglmasuk)), 0, 'LR','L'); 
      $pdf->Cell(3 , 0.5,'No KK', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->nokk, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Status Kepegawaian', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(7.25 , 0.5,$row->status, 0, 'LR','L'); 
      $pdf->Cell(3 , 0.5,'Jenis Kelamin', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->kelamin, 0, 'LR','L'); 
      // $pdf->Cell(4 , 0.5,$kelamin[$row->kelamin], 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Unit / Satmingkal', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(7.25 , 0.5,$row->namaunit, 0, 'LR','L'); 
      $pdf->Cell(3 , 0.5,'Gol Darah', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->darah, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Jabatan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(7.25 , 0.5,$row->namajabatan, 0, 'LR','L'); 
      $pdf->Cell(3 , 0.5,'Agama', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->agama, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Grade', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(7.25 , 0.5,$row->grade.' - '.$row->jenisjabatan, 0, 'LR','L'); 
      $pdf->Cell(3 , 0.5,'Status', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->statuskeluarga, 0, 'LR','L');
      // $pdf->Cell(4 , 0.5,$status[$row->statuskeluarga], 0, 'LR','L');
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Alamat', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(7.25 , 0.5,$row->alamat, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Kota / Kodepos', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(7.25 , 0.5,$row->kota.' / '.$row->kodepos, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Telepon / HP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(7.25 , 0.5,$row->telp.' / '.$row->hp, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Ln();
      $pdf->Cell(3 , 0.5,'Pendidikan', 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(4 , 0.5,'Pendidikan Terakhir', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->pendidikan, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Nama Sekolah / Univ', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(8 , 0.5,strtoupper($row->namauniv), 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Jurusan / Prodi', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,strtoupper($row->jurusan), 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Tahun Lulus', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->lulus, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Tempat Belajar', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->tempatbelajar, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Nomor Ijazah', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->ijazah, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Ln();
      $pdf->Cell(3 , 0.5,'Rekening & Akun', 0, 'LR','L'); 
      $pdf->Ln(); 
      $pdf->Cell(4 , 0.5,'Rekening Bank', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->rekening, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Nomor NPWP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(8 , 0.5,$row->npwp, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'BPJS Ketenagakerjaan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->bpjskt, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'BPJS Kesehatan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->bpjskes, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'DPLK PPIP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->ppip, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'DPLK PPUKP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->ppukp, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'Jiwasraya', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->jiwasraya, 0, 'LR','L'); 
      $pdf->Ln();
      $pdf->Cell(4 , 0.5,'JKDK', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,$row->jkdk, 0, 'LR','L'); 
      $pdf->Ln();
    }
    $pdf->Ln(); 
    $pdf->Cell(3 , 0.5,'Data Keluarga', 0, 'LR','L'); 
    $pdf->Ln(); 
    $pdf->SetFont('Times','B',10);                             

    $no=1;
    $pdf->SetFont('Times','B',10);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.75  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(4.25  , 0.5,'Nama', 1, 'LR','C',true);
    $pdf->Cell(2.5  , 0.5,'Tgl Lahir', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Hubungan', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'JK', 1, 'LR','C',true);
    $pdf->Cell(4.25  , 0.5,'Pekerjaan', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Kondisi', 1, 'LR','C',true);
    $pdf->SetFont('Times','',10);
    if (count($keluarga)>0) {
      foreach(@$keluarga as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.75 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(4.25 , 0.5, @$rowp->nama, 'LTRB',0,'L',0);
        $pdf->Cell(2.5 , 0.5, date('d F Y',strtotime(@$row->tgllahir)), 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, @$rowp->hubungan, 'LTRB',0,'L',0);
        $pdf->Cell(1 , 0.5, @$rowp->kelamin, 'LTRB',0,'C',0);   
        $pdf->Cell(4.25 , 0.5, @$rowp->pekerjaan, 'LTRB',0,'L',0);   
        $pdf->Cell(3 , 0.5, @$rowp->kondisi, 'LTRB',0,'L',0);   
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Data Keluarga Belum Ditambahkan', 'LTRB',0,'C',0);
    }
	  
    $pdf->Ln();
    $pdf->Ln();	 			
    // $pdf->SetY(-3);
    $pdf->Output("CV_".$nik."_".$nama.".pdf","I"); 
	
  ?>   
</body>
</html>