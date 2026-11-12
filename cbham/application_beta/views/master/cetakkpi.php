<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
	
	   <?php    
	     ob_start(); 
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=Master KPI.xls");
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
			  <td align="center" valign="middle" colspan="10" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">MASTER KPI</font></td>			 
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
	          	<col width="10%" />
	          	<col width="10%" />
	       </colgroup>  
		   <tr>
		   	  <td align="center" bgcolor="#666666"><font color="#FFFFFF">No</font></td>
		   	  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kode</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Nama KPI</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Deskripsi</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Satuan</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Rollup</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Polarisasi</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Periode</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Formula</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Tgl Update</font></td>			
			</tr>				

<?php 	
	$no=0;
	  foreach($dataku as $data2)
	  {	
	  $no++;	  						
	    ?> 		
		<tr>			    
		    <td align="left"><?=$no?></td>
		    <td align="left"><?=$data2->kodekpi?></td>
		    <td align="left"><?=$data2->kpi?></td>
		    <td align="left"><?=$data2->deskripsi?></td>	    
		    <td align="left"><?=$data2->satuan?></td>	    
		    <td align="left"><?=$data2->rollup?></td>	    
		    <td align="left"><?=$data2->polarisasi?></td>
		    <td align="left"><?=$data2->periode?></td>
		    <td align="left"><?=$data2->formula?></td>
		    <td align="left"><?=$data2->tglupdate?></td>
		</tr>
<?php				
		
		}
	?> 
				      	
  </table>       				
	
</body>
</html>