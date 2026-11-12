<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
	
	   <?php    
	     ob_start(); 
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=Master_Pegawai.xls");
         header("Pragma: no-cache");
         header("Expires: 0");
    ?>

	 <?php
     $cek=0;
	 foreach($dataku as $data1)
	   {
         if ($cek==0){ ?>
	  <?php   }
         $cek=1;
       } ?>

			<table border="0" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
		     <tr>
			  <td align="center" valign="middle" colspan="6" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">MASTER PEGAWAI</font></td>			 
			 </tr>			 
			 
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>

			</table>

		<table border="1" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
           <colgroup align="left">
       			<col width="3%" />
       			<col width="10%" />
	          	<col width="10%" />
	          	<col width="10%" />
                <col width="10%" />
	          	<col width="10%" />
	          	<col width="10%" />
	       </colgroup>  
		   <tr>
		   	   <td align="center" bgcolor="#666666"><font color="#FFFFFF">NO</font></td>
		   	   <td align="center" bgcolor="#666666"><font color="#FFFFFF">NIK</font></td>
		       <td align="center" bgcolor="#666666"><font color="#FFFFFF">Nama</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tanggal Lahir</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tanggal Masuk</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Status Pegawai</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kode Unit</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Unit</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kode Jabatan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Jabatan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Grade</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Jenis Jabatan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tanggal Entry</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">User Entry</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">No KTP</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">No KK</font></td>
		       <td align="center" bgcolor="#666666"><font color="#FFFFFF">Gelar Depan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Gelar Belakang</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tempat Lahir</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Golongan Darah</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Status Keluarga</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Agama</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">No Rekening</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Nama Bank</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">BPJS Ketenagakerjaan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">BPJS Kesehatan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">DPLK PPIP</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">DPLK PPUKP</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kepesertaan Jiwasraya</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kepesertaan JKDK</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">NPWP</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Alamat</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kota</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kode Pos</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Telephone</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">HP</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Status BPJS Ketenagakerjaan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Status BPJS Kesehatan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Status DPLK PPIP</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Status DPLK PPUKP</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Status Kepesertaan Jiwasraya</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Status Kepesertaan JKDK</font></td>
		       <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kelamin</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Pendidikan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Nama Universitas</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Jurusan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Lulus</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tempat Belajar</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Ijazah</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tanggal Kontrak</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tanggal Selesai</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tanggal Pengangkatan</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tanggal Tidak Aktif</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Created At</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Updated At</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Created By</font></td>
               <td align="center" bgcolor="#666666"><font color="#FFFFFF">Updated By</font></td>
			</tr>		

<?php 	
	$xunit="";
	$i= 0;
	  foreach($dataku as $data2)
	  {		 
	  	$i++; 						
	    ?> 		
		<tr>			    
		    <td align="left"><?=$i?></td>
		    <td align="left"><?=$data2->nik==''?'-':$data2->nik?></td>
		    <td align="left"><?=$data2->nama?></td>
            <td align="left"><?=$data2->tgllahir==''?'-':$data2->tgllahir?></td>
            <td align="left"><?=$data2->tglmasuk==''?'-':$data2->tglmasuk?></td>
            <td align="left"><?=$data2->status==''?'-':$data2->status?></td>
            <td align="left"><?=$data2->unit?></td>
            <td align="left"><?=$data2->namaunit?></td>
            <td align="left"><?=$data2->jabatan?></td>
            <td align="left"><?=$data2->namajabatan?></td>
            <td align="left"><?=$data2->grade==''?'-':$data2->grade?></td>
            <td align="left"><?=$data2->jenisjabatan==''?'-':$data2->jenisjabatan?></td>
            <td align="left"><?=$data2->tglentry?></td>
            <td align="left"><?=$data2->userentry?></td>
            <td align="left"><?=$data2->noktp==''?'-':'="'.$data2->noktp.'"'?></td>
            <td align="left"><?=$data2->nokk==''?'-':'="'.$data2->nokk.'"'?></td>
		    <td align="left"><?= $data2->gelardepan==''?'-':$data2->gelardepan?></td>
            <td align="left"><?= $data2->gelarbelakang==''?'-':$data2->gelarbelakang?></td>
            <td align="left"><?=$data2->tempatlahir==''?'-':$data2->tempatlahir?></td>
            <td align="left"><?=$data2->darah==''?'-':$data2->darah?></td>
            <td align="left"><?=$data2->statuskeluarga=='K'?'Sudah Menikah':($data2->statuskeluarga=='D'?'Duda':($data2->statuskeluarga=='J'?'Janda':($data2->statuskeluarga=='B'?'Belum Menikah':'-')))?></td>
            <td align="left"><?=$data2->agama==''?'-':$data2->agama?></td>
            <td align="left"><?=$data2->rekening==''?'-':'="'.$data2->rekening.'"'?></td>
            <td align="left"><?=$data2->namabank==''?'Belum Ada':$data2->namabank?></td>
            <td align="left"><?= ($data2->bpjskt==''?'-':'="'.$data2->bpjskt.'"')?></td>
            <td align="left"><?= ($data2->bpjskes==''?'-':'="'.$data2->bpjskes.'"')?></td>
            <td align="left"><?= ($data2->ppip==''?'-':'="'.$data2->ppip.'"')?></td>
            <td align="left"><?= ($data2->ppukp==''?'-':'="'.$data2->ppukp.'"')?></td>
            <td align="left"><?= ($data2->jiwasraya==''?'-':'="'.$data2->jiwasraya.'"')?></td>
            <td align="left"><?= ($data2->jkdk==''?'-':'="'.$data2->jkdk.'"')?></td>
            <td align="left"><?=$data2->npwp==''?'-':'="'.$data2->npwp.'"'?></td>
            <td align="left"><?=$data2->alamat==''?'-':$data2->alamat?></td>
            <td align="left"><?= $data2->kota==''?'-':$data2->kota?></td>
            <td align="left"><?= $data2->kodepos==''?'-':$data2->kodepos?></td>
            <td align="left"><?=$data2->telp==''?'-':'="'.$data2->telp.'"'?></td>
            <td align="left"><?=$data2->hp==''?'-':'="'.$data2->hp.'"'?></td>
            <td align="left"><?= ($data2->statusbpjskt==0?'Belum':'Sudah')?></td>
            <td align="left"><?= ($data2->statusbpjskes==0?'Belum':'Sudah')?></td>
            <td align="left"><?= ($data2->statusppip==0?'Belum':'Sudah')?></td>
            <td align="left"><?= ($data2->statusppukp==0?'Belum':'Sudah')?></td>
            <td align="left"><?= ($data2->statusjiwasraya==0?'Belum':'Sudah')?></td>
            <td align="left"><?= ($data2->statusjkdk==0?'Belum':'Sudah')?></td>
            <td align="left"><?= $data2->kelamin == '' ? '-' : $data2->kelamin ?></td>
            <td align="left"><?=$data2->pendidikan==''?'-':$data2->pendidikan?></td>
            <td align="left"><?=$data2->namauniv==''?'-':$data2->namauniv?></td>
            <td align="left"><?=$data2->jurusan==''?'-':$data2->jurusan?></td>
            <td align="left"><?=$data2->lulus==''?'-':$data2->lulus?></td>
            <td align="left"><?=$data2->tempatbelajar==''?'-':$data2->tempatbelajar?></td>
            <td align="left"><?=$data2->ijazah==''?'-':$data2->ijazah?></td>
            <td align="left"><?=$data2->tglmulaikontrak==''?'-':$data2->tglmulaikontrak?></td>
            <td align="left"><?=$data2->tglselesaikontrak==''?'-':$data2->tglselesaikontrak?></td>
            <td align="left"><?=$data2->tglpengangkatan==''?'-':$data2->tglpengangkatan?></td>
            <td align="left"><?=$data2->tgltidakaktif==''?'-':$data2->tgltidakaktif?></td>
            <td align="left"><?=$data2->created_at==''?'-':$data2->created_at?></td>
            <td align="left"><?=$data2->updated_at==''?'-':$data2->updated_at?></td>
            <td align="left"><?=$data2->created_by==''?'-':$data2->created_by?></td>
            <td align="left"><?=$data2->updated_by==''?'-':$data2->updated_by?></td>
		</tr>
<?php				
		
		}
	?> 
				      	
  </table>       				
	
</body>
</html>