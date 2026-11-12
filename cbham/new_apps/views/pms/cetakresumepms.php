<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
	
	   <?php    
	     ob_start(); 
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=exceldata.xls");
         header("Pragma: no-cache");
         header("Expires: 0");
    ?>

		<table border="0" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
		     <tr>
			  <td align="center" valign="middle" colspan="13" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">REKAPITULASI HASIL PENILAIAN (<?= strtoupper($leveljabatan) ?>)</font></td>			 
			 </tr>			 
		     <tr>
			  <td align="center" valign="middle" colspan="13" bgcolor="#FFFFFF"><font color="black" style="font-size:16px">TAHUN <?=$tahun?></font></td>			 
			 </tr>			 
			 
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>

		</table>

		<table border="1" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
           <colgroup align="left">
		          	  <col width="5%" />
		          	  <col width="5%" />
		          	  <col width="5%" />
                      <col width="10%" />
		          	  <col width="10%" />
		         	  <col width="5%" />
                      <col width="10%" />
			          <col width="10%" />
		          	  <col width="10%" />
                      <col width="10%" />
		          	  <col width="10%" />
		          	  <col width="10%" />					  
	       </colgroup>  

		   <tr>
		   	  <td align="center" valign="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">No</font></td>
		      <td align="center" valign="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">Unit Kerja</font></td>
		      <td align="center" valign="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">Jabatan</font></td>
		      <td align="center" valign="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">Nama Karyawan</font></td>
		      <td align="center" valign="center" bgcolor="#666666" rowspan="2"><font color="#FFFFFF">NIK</font></td>
			  <td align="center" bgcolor="#666666" colspan="4"><font color="#FFFFFF">Periode I</font></td>			
			  <td align="center" bgcolor="#666666" colspan="4"><font color="#FFFFFF">Periode II</font></td>			    			  			  
			</tr>
			<tr>			
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">KRA</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">KBA</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Total Nilai</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Penilaian</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">KRA</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">KBA</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Total Nilai</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Hasil Penilaian</font></td>			  			  
		    </tr>
		    <?php $i=0;
		    	$id_pegawai_before = 0;
		    	foreach ($dataku->result() as $key => $data2) {
		    	
		    	if($id_pegawai_before == $data2->id_pegawai){
		    		echo "<td align='left'>".$data2->totalnilkra."</td><td align='left'>".$data2->totnilkba."</td><td align='left'>".$data2->totkrakba."</td><td align='left'>".$data2->hasil."</td></tr>";
		    	}else{
		    		$i++;
		    		if($id_pegawai_before != 0){
			    		echo "</tr>";
			    	}
			?>
			<tr>		
			    <td align="left"><?=$i ?></td>
			    <td align="left"><?=$data2->namaunit?></td>
			    <td align="left"><?=$data2->namajabatan?></td>
			    <td align="left"><?=$data2->nama?></td>	
			    <td align="left"><?=$data2->nik?></td>	
			    <td align="left"><?=$data2->totalnilkra?></td>		
			    <td align="left"><?=$data2->totnilkba?></td>		
			    <td align="left"><?=$data2->totkrakba?></td>			
			    <td align="left"><?=$data2->hasil?></td>
			<?php 
		    	}
		    	$id_pegawai_before = $data2->id_pegawai;
		    }
		    ?>				      	
  	</table>   
    
	<!-- <table border="0" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">  
		<tr><td></td></tr>
		<tr><td></td></tr>

  		<tr>		
	    <td align="left">Keterangan</td>
	    <td align="right">Jumlah Karyawan</td>
	    <td align="right">Dalam %</td>		
		</tr>								      			
  		<tr>		
	    <td align="left">Butuh Pengembangan</td>
	    <td align="right"><?=$jum1?></td>
	    <td align="right"><?=number_format($prosjum1,2,',','.')?></td>		
		</tr>								      
  		<tr>		
	    <td align="left">Kompeten</td>
	    <td align="right"><?=$jum2?></td>
	    <td align="right"><?=number_format($prosjum2,2,',','.')?></td>				
		</tr>								      
  		<tr>		
	    <td align="left">Sangat Efektif</td>
	    <td align="right"><?=$jum3?></td>
	    <td align="right"><?=number_format($prosjum3,2,',','.')?></td>				
		</tr>								      
  		<tr>		
	    <td align="left">Sempurna</td>
	    <td align="right"><?=$jum4?></td>
	    <td align="right"><?=number_format($prosjum4,2,',','.')?></td>				
		</tr>		
  		<tr>		
	    <td align="left">Total</td>
	    <td align="right"><?=$jumtotal?></td>
	    <!-- <td align="right"><?=number_format($prosjum1,3,',','.')?></td>		 -->
		<!-- </tr>								      								      
  </table> -->			
	
</body>
</html>