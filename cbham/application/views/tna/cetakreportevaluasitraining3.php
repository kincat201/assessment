<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
    <?php    
      ob_start(); 
  
      date_default_timezone_set('Asia/Jakarta');
     
//      class PDF extends FPDF {
	  
	  class FPDF_AutoWrapTable extends FPDF {
		private $data = array();
		// private $datab = array();
		private $options = array(
			'filename' => '',
			'destinationfile' => '',
			'paper_size'=>'A4',
			'orientation'=>'P'
			);
 		// private $optionsb = array(
			// 'filename' => '',
			// 'destinationfile' => '',
			// 'paper_size'=>'A4',
			// 'orientation'=>'P'
			// );

		function __construct($data = array(), $options = array()) {
		// function __construct($data = array(),$datab = array(), $options = array(), $optionsb = array()) {
		parent::__construct();
		$this->data = $data;
		// $this->datab = $datab;
		$this->options = $options;
		// $this->optionsb = $optionsb;
		} 
 
		// function __construct($datab = array(), $options = array()) {
		// parent::__construct();
		// $this->datab = $datab;
		// $this->options = $options;
		// }

		public function rptDetailData () {
		//
			
		 foreach ($this->data as $barisx) {			
			$this->Row(
				array(
					$barisx['ket1'],
					$barisx['ket2'],
					$barisx['ket3'],
					$barisx['ket37']
				)
			);
		} 
				
		$border = 0;
		$this->AddPage();
		$this->SetAutoPageBreak(true,60);
		$this->AliasNbPages();
		$left = 25;
		
//		$this->Image('logo.png',10,6,30);
		$this->image('image/logo.png',12,14,100,45);
		
		#header
		$this->SetFont("", "BU", 12);
		$this->Cell(0, 12, 'DATA BIODATA PEGAWAI',0,1,'C');
		$this->Ln(1);		

		$this->Ln(30);
		if($barisx['ket35']<>''){
			// $this->Image($barisx['ket35'],430,10,-100);		
			$this->Image($barisx['ket35'],430,50,-800);					
		}
		
		$this->SetFont("", "", 8);		
		$this->Cell(0, 12, 'Kode Pegawai', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);
		$this->Cell(0, 12, $barisx['ket1'], 0,1,'L');				
		$this->Cell(0, 12, 'Nama Lengkap', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket2'], 0,1,'L');		
		$this->Cell(0, 12, 'Nama Panggilan', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket3'], 0,1,'L');
		$this->Cell(0, 12, 'Tanggal Lahir', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket4'], 0,1,'L');
		$this->Cell(0, 12, 'Kota Lahir', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket5'], 0,1,'L');
		$this->Cell(0, 12, 'Jenis Kelamin', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket6'], 0,1,'L');
		$this->Cell(0, 12, 'Status Perkawinan', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket7'], 0,1,'L');
		$this->Cell(0, 12, 'Alamat Sekarang', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket8'], 0,1,'L');
		$this->Cell(0, 12, 'Alamat Asal', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket9'], 0,1,'L');
		$this->Cell(0, 12, 'Telepon', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket10'], 0,1,'L');
		$this->Cell(0, 12, 'Handphone', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket11'], 0,1,'L');
		$this->Cell(0, 12, 'Email 1', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket12'], 0,1,'L');
		$this->Cell(0, 12, 'Email 2', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket13'], 0,1,'L');
		$this->Cell(0, 12, 'Paspor', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket14'], 0,1,'L');
		$this->Cell(0, 12, 'Golongan Darah', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket15'], 0,1,'L');
		$this->Cell(0, 12, 'Tinggi Badan', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket16'], 0,0,'L');
		$this->SetX(160);
		$this->Cell(0, 12, 'Berat Badan :', 0,0,'L');		
		$this->SetX(220);
		$this->Cell(0, 12, $barisx['ket17'], 0,0,'L');
		$this->SetX(250);
		$this->Cell(0, 12, 'Ukuran Baju :', 0,0,'L');		
		$this->SetX(300);
		$this->Cell(0, 12, $barisx['ket18'], 0,0,'L');
		$this->SetX(320);
		$this->Cell(0, 12, 'Ukuran Celana :', 0,0,'L');		
		$this->SetX(380);
		$this->Cell(0, 12, $barisx['ket19'], 0,0,'L');
		$this->SetX(400);
		$this->Cell(0, 12, 'Ukuran Sepatu :', 0,0,'L');		
		$this->SetX(470);
		$this->Cell(0, 12, $barisx['ket20'], 0,1,'L');
		$this->Cell(0, 12, 'No.SIM', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket21'], 0,0,'L');
		$this->SetX(200);
		$this->Cell(0, 12, 'Masa Berlaku :', 0,0,'L');		
		$this->SetX(260);
		$this->Cell(0, 12, $barisx['ket22'], 0,1,'L');
		$this->Cell(0, 12, 'No.Rekening', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket23'], 0,0,'L');		
		$this->SetX(200);
		$this->Cell(0, 12, 'Nama Bank :', 0,0,'L');		
		$this->SetX(250);
		$this->Cell(0, 12, $barisx['ket41'], 0,1,'L');				
		$this->Cell(0, 12, 'Agama', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket24'], 0,1,'L');
		$this->Cell(0, 12, 'Suku', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket25'], 0,1,'L');
		$this->Cell(0, 12, 'Kewarganegaraan', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket26'], 0,1,'L');
		$this->Cell(0, 12, 'No.NPWP', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket27'], 0,1,'L');
		$this->Cell(0, 12, 'No.KTP', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket28'], 0,1,'L');
		$this->Cell(0, 12, 'Tanggal Masuk', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket29'], 0,1,'L');
		$this->Cell(0, 12, 'Departemen', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket31'], 0,1,'L');
		$this->Cell(0, 12, 'No.KK', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket38'], 0,1,'L');
		$this->Cell(0, 12, 'No.BPJS Kesehatan', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket39'], 0,1,'L');
		$this->Cell(0, 12, 'No.BPJS Ketenagakerjaan', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket40'], 0,1,'L');
		$this->Cell(0, 12, 'Jabatan', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket32'], 0,1,'L');
		$this->Cell(0, 12, 'Status Karyawan', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket33'], 0,1,'L');
		$this->Cell(0, 12, 'Golongan', 0,0,'L');
		$this->SetX(130);
		$this->Cell(0, 12, ':', 0,0,'L');
		$this->SetX(135);		
		$this->Cell(0, 12, $barisx['ket34'], 0,1,'L');

		$this->Ln(10);		
		$h = 13;
		$left = 40;
		$top = 80;
		#tableheader
		$this->SetFont('Times','',9);
		$this->SetFillColor(200,200,200);
		$left = $this->GetX();
		$this->Cell(20,$h,'NCR',1,0,'L',true);
		$this->SetX($left += 20); $this->Cell(150, $h, 'Uraian Temuan', 1, 0, 'C',true);
		$this->SetX($left += 150); $this->Cell(30, $h, 'ISO', 1, 0, 'C',true);
		$this->SetX($left += 30); $this->Cell(30, $h, 'OHSAS', 1, 0, 'C',true);
		$this->SetX($left += 30); $this->Cell(55, $h, 'Prosedur', 1, 0, 'C',true);
		$this->SetX($left += 55); $this->Cell(130, $h, 'Analisa Penyebab', 1, 0, 'C',true);
		$this->SetX($left += 130); $this->Cell(130, $h, 'Tindakan Perbaikan', 1, 0, 'C',true);
		$this->SetX($left += 130); $this->Cell(50, $h, 'Target', 1, 0, 'C',true);		
		$this->SetX($left += 50); $this->Cell(50, $h, 'PIC', 1, 0, 'C',true);
		$this->SetX($left += 50); $this->Cell(50, $h, 'Kategori', 1, 0, 'C',true);
		$this->SetX($left += 50); $this->Cell(30, $h, 'Status', 1, 0, 'C',true);
		$this->SetX($left += 30); $this->Cell(50, $h, 'Tgl Close', 1, 1, 'C',true);
 
		$this->SetFont('Times','',9);
		$this->SetWidths(array(20,150,30,30,55,130,130,50,50,50,30,50));
		$this->SetAligns(array('C','L','L','L','L','L','L','L','L','L','L','L'));
		$no = 1; $this->SetFillColor(255);
		
		
		foreach ($this->data as $baris) {
			$this->Row(
			array($no++,
			$baris['ket1'],
			$baris['ket2'],
			$baris['ket3'],
			$baris['ket4'],
			$baris['ket5'],
			$baris['ket6'],
			$baris['ket7'],
			$baris['ket8'],
			$baris['ket9'],
			$baris['ket10'],
			$baris['ket11']
			));
			} 
		
		$this->Ln(20);
								 
		#footer

		} 
 
		public function printPDF () {
 
		if ($this->options['paper_size'] == "F4") {
		$a = 8.3 * 72; //1 inch = 72 pt
		$b = 13.0 * 72;
		$this->FPDF($this->options['orientation'], "pt", array($a,$b));
		} else {
		$this->FPDF($this->options['orientation'], "pt", $this->options['paper_size']);
		}
 
 	// 	if ($this->optionsb['paper_size'] == "F4") {
		// $a = 8.3 * 72; //1 inch = 72 pt
		// $b = 13.0 * 72;
		// $this->FPDF($this->optionsb['orientation'], "pt", array($a,$b));
		// } else {
		// $this->FPDF($this->optionsb['orientation'], "pt", $this->optionsb['paper_size']);
		// }

		$this->SetAutoPageBreak(false);
		$this->AliasNbPages();
		$this->SetFont("helvetica", "B", 10);
		//$this->AddPage();
 
		$this->rptDetailData();
 
		$this->Output($this->options['filename'],$this->options['destinationfile']);
		// $this->Output($this->optionsb['filename'],$this->optionsb['destinationfile']);
		}
 
		private $widths;
		private $aligns;
 
		function SetWidths($w)
		{
		//Set the array of column widths
		$this->widths=$w;
		}
 
		function SetAligns($a)
		{
		//Set the array of column alignments
		$this->aligns=$a;
		}
 
		function Row($data)
		{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
			$h=10*$nb;
			//Issue a page break first if needed
			$this->CheckPageBreak($h);
			//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,10,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
		}

#====================================== 
		// function Row1($datab)
		// {
		// //Calculate the height of the row
		// $nb=0;
		// for($i=0;$i<count($datab);$i++)
		// 	$nb=max($nb,$this->NbLines($this->widths[$i],$datab[$i]));
		// 	$h=10*$nb;
		// 	//Issue a page break first if needed
		// 	$this->CheckPageBreak($h);
		// 	//Draw the cells of the row
		// for($i=0;$i<count($datab);$i++)
		// {
		// 	$w=$this->widths[$i];
		// 	$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		// 	//Save the current position
		// 	$x=$this->GetX();
		// 	$y=$this->GetY();
		// 	//Draw the border
		// 	$this->Rect($x,$y,$w,$h);
		// 	//Print the text
		// 	$this->MultiCell($w,10,$datab[$i],0,$a);
		// 	//Put the position to the right of the cell
		// 	$this->SetXY($x+$w,$y);
		// }
		// //Go to the next line
		// $this->Ln($h);
		// }
#======================================

		function CheckPageBreak($h)
		{
			//If the height h would cause an overflow, add a new page immediately
			if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
		}
 
		function NbLines($w,$txt)
		{
			//Computes the number of lines a MultiCell of width w will take
			$cw=&$this->CurrentFont['cw'];
			if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
			$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
			$s=str_replace("\r",'',$txt);
			$nb=strlen($s);
			if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
			$sep=-1;
			$i=0;
			$j=0;
			$l=0;
			$nl=1;
			while($i<$nb)
			{
				$c=$s[$i];
				if($c=="\n")
				{
					$i++;
					$sep=-1;
					$j=$i;
					$l=0;
					$nl++;
					continue;
				}
				if($c==' ')
					$sep=$i;
					$l+=$cw[$c];
				if($l>$wmax)
				{
				if($sep==-1)
				{
					if($i==$j)
					$i++;
				}
				else
					$i=$sep+1;
					$sep=-1;
					$j=$i;
					$l=0;
					$nl++;
				}
				else
					$i++;
				}
				return $nl;
			}
		} //end of class
		
		$data = array();		
		$query = "select * from tampung6 where urut='" .$_SESSION['username']."' and ket1='" .$kopeg."' and ket37='a'";		
		$sql = mysql_query ($query);
		while ($row = mysql_fetch_assoc($sql)) {
			array_push($data, $row);
		}		 
 
 		$datab = array();		
		$query = "select * from tampung6 where urut='" .$_SESSION['username']."' and ket1='" .$kopeg."' and ket37='b'";		
		$sql = mysql_query ($query);
		while ($row = mysql_fetch_assoc($sql)) {
			array_push($datab, $row);
		}

		//pilihan
		$options = array(
			'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
			'destinationfile' => '', //I=inline browser (default), F=local file, D=download
			'paper_size'=>'A4',	//paper size: F4, A3, A4, A5, Letter, Legal
			'orientation'=>'P' //orientation: P=portrait, L=landscape
		);
 
		// $optionsb = array(
		// 	'filename' => '', //nama file penyimpanan, kosongkan jika output ke browser
		// 	'destinationfile' => '', //I=inline browser (default), F=local file, D=download
		// 	'paper_size'=>'A4',	//paper size: F4, A3, A4, A5, Letter, Legal
		// 	'orientation'=>'P' //orientation: P=portrait, L=landscape
		// );

		$tabel = new FPDF_AutoWrapTable($data, $options);
		// $tabel = new FPDF_AutoWrapTable($datab, $optionsb);
		$tabel->printPDF();
		
// 	  }
	  	  
/*---- header selesai ---*/

$pdf->Output("Cetak Karyawan.pdf","I"); 
	
 ?>   
</body>
</html>