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
	  foreach($datacv as $row)
	  {
  	  $pdf->Cell(25 , 0.5,'UPDATING PERSONAL RECORD', 0, 'LR','C');
      $pdf->Ln();	  
      $pdf->Ln(); 
      $pdf->Ln(); 
      $pdf->SetFont('Times','B',10);
      $pdf->Cell(3 , 0.5,'Data Pegawai', 0, 'LR','L'); 
      $pdf->Ln();       
      $pdf->SetFont('Times','',10);
      $pdf->Cell(4 , 0.5,'NIK', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket2, 0, 'LR','L'); 
      $pdf->Cell(4 , 0.5,'No.PPIP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket21, 0, 'LR','L');        
      $pdf->Ln(); 

      $pdf->Cell(4 , 0.5,'Nama', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket3, 0, 'LR','L'); 
      $pdf->Cell(4 , 0.5,'No.PPUKP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket22, 0, 'LR','L');
      $pdf->Ln(); 

      $pdf->Cell(4 , 0.5,'Tanggal Lahir', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');              
      $pdf->Cell(10 , 0.5,date('d F Y',strtotime($row->ket4)), 0, 'LR','L');        
      $pdf->Cell(4 , 0.5,'No.Jiwasraya', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket23, 0, 'LR','L'); 
      $pdf->Ln();      

      $pdf->Cell(4 , 0.5,'Pendidikan Terakhir', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket5, 0, 'LR','L');  
      $pdf->Cell(4 , 0.5,'No.JKDK', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket24, 0, 'LR','L'); 
      $pdf->Ln(); 

      $pdf->Cell(4 , 0.5,'Status', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket6, 0, 'LR','L');  
      $pdf->Cell(4 , 0.5,'No.NPWP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');              
      $pdf->Cell(3 , 0.5,$row->ket25, 0, 'LR','L'); 
      $pdf->Ln();       

      $pdf->Cell(4 , 0.5,'Unit', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket7, 0, 'LR','L');  
      $pdf->Cell(4 , 0.5,'Alamat', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket26, 0, 'LR','L');  
      $pdf->Ln();         

      $pdf->Cell(4 , 0.5,'Jabatan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket8, 0, 'LR','L'); 
      $pdf->Cell(4 , 0.5,'Kota', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket27, 0, 'LR','L');  
      $pdf->Ln();           

      $pdf->Cell(4 , 0.5,'Tanggal Masuk', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,date('d F Y',strtotime($row->ket9)), 0, 'LR','L'); 
      $pdf->Cell(4 , 0.5,'Kode Pos', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket28, 0, 'LR','L');  
      $pdf->Ln();                       

      $pdf->Cell(4 , 0.5,'No.KTP', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket10, 0, 'LR','L'); 
      $pdf->Cell(4 , 0.5,'Telp', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket29, 0, 'LR','L');      
      $pdf->Ln();      

      $pdf->Cell(4 , 0.5,'No.KK', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');              
      $pdf->Cell(10 , 0.5,$row->ket11, 0, 'LR','L'); 
      $pdf->Cell(4 , 0.5,'Jenis Kelamin', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket30, 0, 'LR','L'); 
      $pdf->Ln();       

      $pdf->Cell(4 , 0.5,'Gelar Depan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket12, 0, 'LR','L');  
      $pdf->Cell(4 , 0.5,'Nama Universitas', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket31, 0, 'LR','L'); 
      $pdf->Ln();       

      $pdf->Cell(4 , 0.5,'Gelar Belakang', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket13, 0, 'LR','L');  
      $pdf->Cell(4 , 0.5,'Jurusan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');              
      $pdf->Cell(3 , 0.5,$row->ket32, 0, 'LR','L'); 
      $pdf->Ln();             

      $pdf->Cell(4 , 0.5,'Tempat Lahir', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket14, 0, 'LR','L');  
      $pdf->Cell(4 , 0.5,'Lulus Tahun', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket33, 0, 'LR','L');  
      $pdf->Ln();           

      $pdf->Cell(4 , 0.5,'Golongan Darah', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket15, 0, 'LR','L');
      $pdf->Cell(4 , 0.5,'No.Ijazah', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket34, 0, 'LR','L');  
      $pdf->Ln();           

      $pdf->Cell(4 , 0.5,'Status Keluarga', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket16, 0, 'LR','L'); 
      $pdf->Cell(4 , 0.5,'Tempat Belajar', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket35, 0, 'LR','L');  
      $pdf->Ln();                       

      $pdf->Cell(4 , 0.5,'Agama', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket17, 0, 'LR','L'); 
      $pdf->Cell(4 , 0.5,'Grade', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket36, 0, 'LR','L');            
      $pdf->Ln();           

      $pdf->Cell(4 , 0.5,'No.Rekening', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');              
      $pdf->Cell(10 , 0.5,$row->ket18, 0, 'LR','L'); 
      $pdf->Cell(4 , 0.5,'Jenis Jabatan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket37, 0, 'LR','L');  
      $pdf->Ln();                       

      $pdf->Cell(4 , 0.5,'No.BPJS Ketenagakerjaan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(10 , 0.5,$row->ket19, 0, 'LR','L');  
      $pdf->Cell(4 , 0.5,'No,Handphone', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket38, 0, 'LR','L');      
      $pdf->Ln();

      $pdf->Cell(4 , 0.5,'No.BPJS Kesehatan', 0, 'LR','L');        
      $pdf->Cell(0.5 , 0.5,':', 0, 'LR','L');        
      $pdf->Cell(3 , 0.5,$row->ket20, 0, 'LR','L');  
      $pdf->Ln();                       
      $pdf->Ln();              
    }

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Keluarga', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(7  , 0.5,'Nama', 1, 'LR','C',true);    
    $pdf->Cell(4  , 0.5,'Hubungan', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,'Pekerjaan', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Tgl Lahir', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Kelamin', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Kondisi', 1, 'LR','C',true);    

    $pdf->SetFont('Times','',8);
    if (count($datakeluarga)>0) {
      foreach(@$datakeluarga as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(7 , 0.5, @$rowp->ket3, 'LTRB',0,'L',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket5, 'LTRB',0,'L',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket6, 'LTRB',0,'L',0);
        $pdf->Cell(2 , 0.5, @$rowp->ket4, 'LTRB',0,'L',0);   
        $pdf->Cell(2 , 0.5, @$rowp->ket7, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket8, 'LTRB',0,'L',0);        
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data keluarga', 'LTRB',0,'C',0);
    }  
    $pdf->Ln();                       
    $pdf->Ln();

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Riwayat Sertifikat Keahlian (SKA)', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(7  , 0.5,'Klasifikasi', 1, 'LR','C',true);    
    $pdf->Cell(4  , 0.5,'Kode', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,'Asosiasi', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'NIR SKA', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Tgl Mulai', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Tgl Selesai', 1, 'LR','C',true);    

    $pdf->SetFont('Times','',8);
    if (count($dataska)>0) {
      foreach(@$dataska as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(7 , 0.5, @$rowp->ket2, 'LTRB',0,'L',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket3, 'LTRB',0,'L',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket4, 'LTRB',0,'L',0);
        $pdf->Cell(2 , 0.5, @$rowp->ket5, 'LTRB',0,'L',0);   
        $pdf->Cell(2 , 0.5, @$rowp->ket6, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket7, 'LTRB',0,'L',0);        
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data SKA', 'LTRB',0,'C',0);
    }  
    $pdf->Ln();                       
    $pdf->Ln();

    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Riwayat Jabatan / Riwayat Pegawai', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'Jenis', 1, 'LR','C',true);    
    $pdf->Cell(1.5  , 0.5,'Tanggal', 1, 'LR','C',true);
    $pdf->Cell(1.5  , 0.5,'Status Lama', 1, 'LR','C',true);
    $pdf->Cell(3.5  , 0.5,'Unit Lama', 1, 'LR','C',true);
    $pdf->Cell(1.5  , 0.5,'Grade Lama', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Struktur Lama', 1, 'LR','C',true);    
    $pdf->Cell(4  , 0.5,'Jabatan Lama', 1, 'LR','C',true);
    $pdf->Cell(0.3  , 0.5,'', 1, 'LR','C',true);
    $pdf->Cell(1.5  , 0.5,'Status Baru', 1, 'LR','C',true);    
    $pdf->Cell(3.5  , 0.5,'Unit Baru', 1, 'LR','C',true);
    $pdf->Cell(1.5  , 0.5,'Grade Baru', 1, 'LR','C',true);            
    $pdf->Cell(2  , 0.5,'Struktur Baru', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,'Jabatan Baru', 1, 'LR','C',true);                

    $pdf->SetFont('Times','',8);
    if (count($datahistorijabatan)>0) {
  	  foreach(@$datahistorijabatan as $rowp)
  	  {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket2, 'LTRB',0,'C',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket3, 'LTRB',0,'L',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket4, 'LTRB',0,'L',0);
        $pdf->Cell(3.5 , 0.5, @$rowp->ket5, 'LTRB',0,'L',0);   
        $pdf->Cell(1.5 , 0.5, @$rowp->ket6, 'LTRB',0,'C',0);
        $pdf->Cell(2 , 0.5, @$rowp->ket7, 'LTRB',0,'L',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket8, 'LTRB',0,'L',0);
        $pdf->Cell(0.3 , 0.5,'', 'LTRB',0,'L',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket9, 'LTRB',0,'L',0);   
        $pdf->Cell(3.5 , 0.5, @$rowp->ket10, 'LTRB',0,'C',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket11, 'LTRB',0,'L',0);
        $pdf->Cell(2 , 0.5, @$rowp->ket12, 'LTRB',0,'L',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket13, 'LTRB',0,'L',0);           
        $no++;                       
  	  }	
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data riwayat jabatan', 'LTRB',0,'C',0);
    }

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Riwayat Pelatihan', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,'No.Training', 1, 'LR','C',true);    
    $pdf->Cell(7  , 0.5,'Nama Training', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Kode TNA', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,'Tutor', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Tgl Mulai', 1, 'LR','C',true);
    $pdf->Cell(2  , 0.5,'Tgl Akhir', 1, 'LR','C',true);    
    $pdf->Cell(3  , 0.5,'Biaya', 1, 'LR','C',true);

    $pdf->SetFont('Times','',8);
    if (count($datahistoritraining)>0) {
      foreach(@$datahistoritraining as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket2, 'LTRB',0,'C',0);
        $pdf->Cell(7 , 0.5, @$rowp->ket3, 'LTRB',0,'L',0);
        $pdf->Cell(2 , 0.5, @$rowp->ket4, 'LTRB',0,'C',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket5, 'LTRB',0,'L',0);   
        $pdf->Cell(2 , 0.5, @$rowp->ket6, 'LTRB',0,'C',0);
        $pdf->Cell(2 , 0.5, @$rowp->ket7, 'LTRB',0,'L',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket8, 'LTRB',0,'L',0);
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data riwayat pelatihan', 'LTRB',0,'C',0);
    }    

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Profil Kompetensi Knowhow Tahun Ini', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,'Kompetensi', 1, 'LR','C',true);    
    $pdf->Cell(10  , 0.5,'Keterangan', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Standar Kompetensi', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Semester 1', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Semester 2', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Rata-rata', 1, 'LR','C',true);    

    $pdf->SetFont('Times','',8);
    if (count($dataknowhow)>0) {
      foreach(@$dataknowhow as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket2, 'LTRB',0,'C',0);
        $pdf->Cell(10 , 0.5, @$rowp->ket3, 'LTRB',0,'L',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket4, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket5, 'LTRB',0,'C',0);   
        $pdf->Cell(3 , 0.5, @$rowp->ket6, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket7, 'LTRB',0,'C',0);
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data Profil Kompetensi Knowhow Tahun ini', 'LTRB',0,'C',0);
    }        

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Profil Kompetensi Managerial Skill Tahun Ini', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(4  , 0.5,'Kompetensi', 1, 'LR','C',true);    
    $pdf->Cell(10  , 0.5,'Keterangan', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Standar Kompetensi', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Semester 1', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Semester 2', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Rata-rata', 1, 'LR','C',true);    

    $pdf->SetFont('Times','',8);
    if (count($datamanagerial)>0) {
      foreach(@$datamanagerial as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(4 , 0.5, @$rowp->ket2, 'LTRB',0,'C',0);
        $pdf->Cell(10 , 0.5, @$rowp->ket3, 'LTRB',0,'L',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket4, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket5, 'LTRB',0,'C',0);   
        $pdf->Cell(3 , 0.5, @$rowp->ket6, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket7, 'LTRB',0,'C',0);
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data Profil Kompetensi Managerial Skill Tahun ini', 'LTRB',0,'C',0);
    }            

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Trend Profil Kompetensi Knowhow', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','',7);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(2.3  , 0.5,'Tahun', 1, 'LR','C',true);    
    $pdf->Cell(0.5  , 0.5,'FE', 1, 'LR','C',true);
    $pdf->Cell(0.5  , 0.5,'IE', 1, 'LR','C',true);
    $pdf->Cell(0.5  , 0.5,'EX', 1, 'LR','C',true);
    $pdf->Cell(0.5  , 0.5,'BS', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'TSMKT', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSEST', 1, 'LR','C',true);        
    $pdf->Cell(1  , 0.5,'TSPPC', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSCON', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSQAC', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSMAN', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSSAR', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSCS', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSPENG', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSFAT', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSHSE', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSHRD', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSGA', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSMD', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TSMR', 1, 'LR','C',true);    
    $pdf->Cell(1.5  , 0.5,'TSENGMECH', 1, 'LR','C',true);    
    $pdf->Cell(1.5  , 0.5,'TSENGELEC', 1, 'LR','C',true);    
    $pdf->Cell(1.5  , 0.5,'TSENGINST', 1, 'LR','C',true);    
    $pdf->Cell(1.5  , 0.5,'TSENGCIV', 1, 'LR','C',true);    
    $pdf->Cell(0.8  , 0.5,'TSSD', 1, 'LR','C',true);    
    $pdf->Cell(0.8  , 0.5,'TSIA', 1, 'LR','C',true);    
    $pdf->Cell(0.8  , 0.5,'TSTOP', 1, 'LR','C',true);    

    $pdf->SetFont('Times','',7);
    if (count($dataknowhowtahunan)>0) {
      foreach(@$dataknowhowtahunan as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(2.3 , 0.5, @$rowp->ket2, 'LTRB',0,'C',0);
        $pdf->Cell(0.5 , 0.5, @$rowp->ket3, 'LTRB',0,'C',0);
        $pdf->Cell(0.5 , 0.5, @$rowp->ket4, 'LTRB',0,'C',0);
        $pdf->Cell(0.5 , 0.5, @$rowp->ket5, 'LTRB',0,'C',0);   
        $pdf->Cell(0.5 , 0.5, @$rowp->ket6, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket7, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket8, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket9, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket10, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket11, 'LTRB',0,'C',0);   
        $pdf->Cell(1 , 0.5, @$rowp->ket12, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket13, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket14, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket15, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket16, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket17, 'LTRB',0,'C',0);   
        $pdf->Cell(1 , 0.5, @$rowp->ket18, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket19, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket20, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket21, 'LTRB',0,'C',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket22, 'LTRB',0,'C',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket23, 'LTRB',0,'C',0);   
        $pdf->Cell(1.5 , 0.5, @$rowp->ket24, 'LTRB',0,'C',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket25, 'LTRB',0,'C',0);
        $pdf->Cell(0.8 , 0.5, @$rowp->ket26, 'LTRB',0,'C',0);
        $pdf->Cell(0.8 , 0.5, @$rowp->ket27, 'LTRB',0,'C',0);
        $pdf->Cell(0.8 , 0.5, @$rowp->ket28, 'LTRB',0,'C',0);
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data trend Profil Kompetensi Knowhow', 'LTRB',0,'C',0);
    }                

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Trend Profil Kompetensi Managerial Skill', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','',7);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(2.3  , 0.5,'Tahun', 1, 'LR','C',true);    
    $pdf->Cell(0.5  , 0.5,'DEV', 1, 'LR','C',true);
    $pdf->Cell(0.5  , 0.5,'DIR', 1, 'LR','C',true);
    $pdf->Cell(0.5  , 0.5,'TW', 1, 'LR','C',true);
    $pdf->Cell(0.5  , 0.5,'TL', 1, 'LR','C',true);
    $pdf->Cell(1  , 0.5,'PS', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'PO', 1, 'LR','C',true);        
    $pdf->Cell(1  , 0.5,'SO', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'AT', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'CT', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'INT', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'IU', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'RB', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'IMP', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'ING', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TRP', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'TEW', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'CRT', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'WIS', 1, 'LR','C',true);    
    $pdf->Cell(1  , 0.5,'EXC', 1, 'LR','C',true);    
    $pdf->Cell(1.5  , 0.5,'ACH', 1, 'LR','C',true);    
    $pdf->Cell(1.5  , 0.5,'CO', 1, 'LR','C',true);    
    $pdf->Cell(1.5  , 0.5,'IS', 1, 'LR','C',true);    
    $pdf->Cell(1.5  , 0.5,'CSO', 1, 'LR','C',true);    

    $pdf->SetFont('Times','',7);
    if (count($datamanagerialtahunan)>0) {
      foreach(@$datamanagerialtahunan as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(2.3 , 0.5, @$rowp->ket2, 'LTRB',0,'C',0);
        $pdf->Cell(0.5 , 0.5, @$rowp->ket3, 'LTRB',0,'C',0);
        $pdf->Cell(0.5 , 0.5, @$rowp->ket4, 'LTRB',0,'C',0);
        $pdf->Cell(0.5 , 0.5, @$rowp->ket5, 'LTRB',0,'C',0);   
        $pdf->Cell(0.5 , 0.5, @$rowp->ket6, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket7, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket8, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket9, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket10, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket11, 'LTRB',0,'C',0);   
        $pdf->Cell(1 , 0.5, @$rowp->ket12, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket13, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket14, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket15, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket16, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket17, 'LTRB',0,'C',0);   
        $pdf->Cell(1 , 0.5, @$rowp->ket18, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket19, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket20, 'LTRB',0,'C',0);
        $pdf->Cell(1 , 0.5, @$rowp->ket21, 'LTRB',0,'C',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket22, 'LTRB',0,'C',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket23, 'LTRB',0,'C',0);   
        $pdf->Cell(1.5 , 0.5, @$rowp->ket24, 'LTRB',0,'C',0);
        $pdf->Cell(1.5 , 0.5, @$rowp->ket25, 'LTRB',0,'C',0);
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data trend Profil Kompetensi Managerial Skill', 'LTRB',0,'C',0);
    }                

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Evaluasi Kinerja Tahun Ini', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Tahun', 1, 'LR','C',true);    
    $pdf->Cell(3  , 0.5,'Periode', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'KRA', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'KBA', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Total', 1, 'LR','C',true);

    $pdf->SetFont('Times','',8);
    if (count($datapms)>0) {
      foreach(@$datapms as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket7, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, number_format(@$rowp->ket6,2, ',', '.'), 'LTRB',0,'R',0);
        $pdf->Cell(3 , 0.5, number_format(@$rowp->ket8,2, ',', '.'), 'LTRB',0,'R',0);
        $pdf->Cell(3 , 0.5, number_format(@$rowp->ket9,2, ',', '.'), 'LTRB',0,'R',0);   
        $pdf->Cell(3 , 0.5, number_format(@$rowp->ket10,2, ',', '.'), 'LTRB',0,'R',0);
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data Evaluasi Kinerja Tahun ini', 'LTRB',0,'C',0);
    }            

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(3 , 0.5,'Data Trend Evaluasi Kinerja', 0, 'LR','L'); 
    $pdf->Ln();   

    $no=1;
    $pdf->SetFont('Times','B',8);
    $pdf->SetFillColor(200,200,200);
    $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Tahun', 1, 'LR','C',true);    
    $pdf->Cell(3  , 0.5,'KRA', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'KBA', 1, 'LR','C',true);
    $pdf->Cell(3  , 0.5,'Total', 1, 'LR','C',true);

    $pdf->SetFont('Times','',8);
    if (count($datapms)>0) {
      foreach(@$datapms as $rowp)
      {
        $pdf->Ln();
        $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, @$rowp->ket7, 'LTRB',0,'C',0);
        $pdf->Cell(3 , 0.5, number_format(@$rowp->ket8,2, ',', '.'), 'LTRB',0,'R',0);
        $pdf->Cell(3 , 0.5, number_format(@$rowp->ket9,2, ',', '.'), 'LTRB',0,'R',0);   
        $pdf->Cell(3 , 0.5, number_format(@$rowp->ket10,2, ',', '.'), 'LTRB',0,'R',0);
        $no++;                       
      } 
    } else {
      $pdf->Ln();
      $pdf->Cell(19 , 0.5, 'Belum ada data Trend Evaluasi Kinerja', 'LTRB',0,'C',0);
    }            

    // // $pdf->Ln();
    // // $pdf->Ln();
    // // $pdf->SetFont('Times','B',10);
    // // $pdf->Cell(3 , 0.5,'Data Trend Profil Kompetensi', 0, 'LR','L'); 
    // // $pdf->Ln();   

    // // $no=1;
    // // $pdf->SetFont('Times','B',8);
    // // $pdf->SetFillColor(200,200,200);
    // // $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    // // $pdf->Cell(4  , 0.5,'Kompetensi', 1, 'LR','C',true);    
    // // $pdf->Cell(10  , 0.5,'Keterangan', 1, 'LR','C',true);
    // // $pdf->Cell(3  , 0.5,'Standar Kompetensi', 1, 'LR','C',true);
    // // $pdf->Cell(3  , 0.5,'Semester 1', 1, 'LR','C',true);
    // // $pdf->Cell(3  , 0.5,'Semester 2', 1, 'LR','C',true);
    // // $pdf->Cell(3  , 0.5,'Rata-rata', 1, 'LR','C',true);    

    // // $pdf->SetFont('Times','',8);
    // // if (count($datamanagerial)>0) {
    // //   foreach(@$datamanagerial as $rowp)
    // //   {
    // //     $pdf->Ln();
    // //     $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
    // //     $pdf->Cell(4 , 0.5, @$rowp->ket2, 'LTRB',0,'C',0);
    // //     $pdf->Cell(10 , 0.5, @$rowp->ket3, 'LTRB',0,'L',0);
    // //     $pdf->Cell(3 , 0.5, @$rowp->ket4, 'LTRB',0,'L',0);
    // //     $pdf->Cell(3 , 0.5, @$rowp->ket5, 'LTRB',0,'L',0);   
    // //     $pdf->Cell(3 , 0.5, @$rowp->ket6, 'LTRB',0,'C',0);
    // //     $pdf->Cell(3 , 0.5, @$rowp->ket7, 'LTRB',0,'L',0);
    // //     $no++;                       
    // //   } 
    // // } else {
    // //   $pdf->Ln();
    // //   $pdf->Cell(19 , 0.5, 'Belum ada data Profil Kompetensi Tahun ini', 'LTRB',0,'C',0);
    // // }  

    // $pdf->Ln();
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',10);
    // $pdf->Cell(3 , 0.5,'Data Evaluasi Kinerja Tahun Ini', 0, 'LR','L'); 
    // $pdf->Ln();   

    // $no=1;
    // $pdf->SetFont('Times','B',8);
    // $pdf->SetFillColor(200,200,200);
    // $pdf->Cell(0.5  , 0.5,'No', 1, 'LR','C',true);
    // $pdf->Cell(4  , 0.5,'NIK', 1, 'LR','C',true);    
    // $pdf->Cell(10  , 0.5,'Nama', 1, 'LR','C',true);
    // $pdf->Cell(3  , 0.5,'Jabatan', 1, 'LR','C',true);
    // $pdf->Cell(3  , 0.5,'Penilai', 1, 'LR','C',true);
    // $pdf->Cell(3  , 0.5,'Periode', 1, 'LR','C',true);
    // $pdf->Cell(3  , 0.5,'Tahun', 1, 'LR','C',true);    
    // $pdf->Cell(3  , 0.5,'Total Nilai Knowhow', 1, 'LR','C',true);
    // $pdf->Cell(3  , 0.5,'Total Nilai KBA', 1, 'LR','C',true);
    // $pdf->Cell(3  , 0.5,'Tahun', 1, 'LR','C',true);        

    // $pdf->Cell(3  , 0.5,'Penilai', 1, 'LR','C',true);
    // $pdf->Cell(3  , 0.5,'Periode', 1, 'LR','C',true);
    // $pdf->Cell(3  , 0.5,'Tahun', 1, 'LR','C',true);    

    // $pdf->SetFont('Times','',8);
    // if (count($datamanagerial)>0) {
    //   foreach(@$datamanagerial as $rowp)
    //   {
    //     $pdf->Ln();
    //     $pdf->Cell(0.5 , 0.5, $no, 'LTRB',0,'C',0);
    //     $pdf->Cell(4 , 0.5, @$rowp->ket2, 'LTRB',0,'C',0);
    //     $pdf->Cell(10 , 0.5, @$rowp->ket3, 'LTRB',0,'L',0);
    //     $pdf->Cell(3 , 0.5, @$rowp->ket4, 'LTRB',0,'L',0);
    //     $pdf->Cell(3 , 0.5, @$rowp->ket5, 'LTRB',0,'L',0);   
    //     $pdf->Cell(3 , 0.5, @$rowp->ket6, 'LTRB',0,'C',0);
    //     $pdf->Cell(3 , 0.5, @$rowp->ket7, 'LTRB',0,'L',0);
    //     $no++;                       
    //   } 
    // } else {
    //   $pdf->Ln();
    //   $pdf->Cell(19 , 0.5, 'Belum ada data Profil Kompetensi Tahun ini', 'LTRB',0,'C',0);
    // }                    
	  
    $pdf->Ln();
    $pdf->Ln();	 			
    $pdf->SetY(-3);
    $pdf->Output("Updating Personal Record.pdf","I"); 
    // $pdf->Output("TRAINING_".$notraining.".pdf","I"); 
	
  ?>   
</body>
</html>