<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!-- FUSION CHARTS -->
	   </head>
    <body>
	
	   <?php    
	     ob_start(); 
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=Target.xls");
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
			  <td align="center" valign="middle" colspan="18" bgcolor="#FFFFFF"><font color="black" style="font-size:18px">TARGET SKK</font></td>			 
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
		   	  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Kode</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">KPI</font></td>
		      <td align="center" bgcolor="#666666"><font color="#FFFFFF">Deskripsi</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Satuan</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Rollup</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Periode</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Januari</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Februari</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Maret</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">April</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Mei</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Juni</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Juli</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Agustus</font></td>
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">September</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Oktober</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">November</font></td>			
			  <td align="center" bgcolor="#666666"><font color="#FFFFFF">Desember</font></td>			  			  			  
			</tr>				

<?php 	
	$xunit="";
	  foreach($dataku as $data2)
	  {		  						
	    ?> 		
		<tr>			    
		    <td align="left"><?=$data2->kpi?></td>
		    <td align="left"><?=$data2->namakpi?></td>
		    <td align="left"><?=$data2->deskripsi?></td>	    
		    <td align="left"><?=$data2->satuan?></td>
		    <td align="left"><?=$data2->rollup?></td>
		    <td align="left"><?=$data2->periode?></td>
		    <td align="left"><?=$data2->jan?></td>
		    <td align="left"><?=$data2->feb?></td>
		    <td align="left"><?=$data2->mar?></td>
		    <td align="left"><?=$data2->apr?></td>		    
		    <td align="left"><?=$data2->mei?></td>
		    <td align="left"><?=$data2->jun?></td>
		    <td align="left"><?=$data2->jul?></td>
		    <td align="left"><?=$data2->agt?></td>		    
		    <td align="left"><?=$data2->sep?></td>
		    <td align="left"><?=$data2->okt?></td>
		    <td align="left"><?=$data2->nov?></td>
		    <td align="left"><?=$data2->des?></td>		    		    		    
		</tr>
<?php				
		
		}
	?> 
				      	
  </table>       				
	
</body>
</html>