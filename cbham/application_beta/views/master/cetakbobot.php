<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
	
	   <?php    
	     ob_start(); 
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=Master Satuan.xls");
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
			  <td align="center" valign="middle" colspan="5" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">MASTER INDEKS KPI</font></td>			 
			 </tr>			 
			 
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr><td></td></tr>

			</table>

		<table border="1" style="border-collapse: collapse; width: 100%; text-align: left;" class="data-table">
           <colgroup align="left">
       			<col width="10%" />
	          	<col width="10%" />
	          	<col width="10%" />
                <col width="10%" />
	          	<col width="10%" />
	          	<col width="10%" />
	          	<col width="10%" />
	          	<col width="10%" />	          	
	       </colgroup>  
		   <tr>
		   	  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tahun</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Unit</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Jabatan</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kode KPI</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Nama KPI</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Indeks Bulanan</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Indeks Semesteran</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Indeks Tahunan</font></td>			
			</tr>				

<?php 	
	$xunit="";
	  foreach($dataku as $data2)
	  {		  						
	    ?> 		
		<tr>			    
		    <td align="left"><?=$data2->tahun?></td>
		    <td align="left"><?=$data2->namaunit?></td>
		    <td align="left"><?=$data2->namajabatan?></td>	    
		    <td align="left"><?=$data2->kpi?></td>
		    <td align="left"><?=$data2->namakpi?></td>
		    <td align="left"><?=$data2->bobotbln?></td>
		    <td align="left"><?=$data2->bobotsmt?></td>
		    <td align="left"><?=$data2->bobotthn?></td>
		</tr>
<?php				
		
		}
	?> 
				      	
  </table>       				
	
</body>
</html>