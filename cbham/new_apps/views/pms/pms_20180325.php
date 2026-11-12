<title>
  Penilaian Kinerja
</title>
<head>
  <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>

<style type="text/css">
  /*#table-wrapper { 
    overflow-x:scroll;
    overflow-y:visible;
    width:1500px;
    margin-left: 0px;
  }*/

  #table-wrapper2 { 
    overflow-x:scroll;
    overflow-y:visible;
    width:1400px;
    margin-left: 0px;
  }
  
  .fix {
    position: fixed;
    left: 5px;
  }

  /* The Modal (background) */
  .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 50px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;  Full width 
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  .modalDialog {
      position: fixed;
      font-family: Arial, Helvetica, sans-serif;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.8);
      z-index: 99999;
      overflow: auto;
      opacity:0;
      -webkit-transition: opacity 400ms ease-in;
      -moz-transition: opacity 400ms ease-in;
      transition: opacity 200ms ease-in;
      pointer-events: none;
  }

  .modalDialog:target {
      opacity:1;
      pointer-events: auto;
  }

  .modalDialog > div {
      width: 700px;
      position: relative;
      margin: 5% auto;
      padding: 10px 5px 20px 10px;
      border-radius: 0px;
      background: #BAF2E7;
  }

  .close {
      background: #606061;
      color: #FFFFFF;     
      line-height: 25px;
      position: absolute;
      right: -12px;
      text-align: center;
      top: -10px;
      width: 24px;
      text-decoration: none;
      font-weight: bold;
      -webkit-border-radius: 12px;
      -moz-border-radius: 12px;
      border-radius: 12px;
      -moz-box-shadow: 1px 1px 3px #000;
      -webkit-box-shadow: 1px 1px 3px #000;
      box-shadow: 1px 1px 3px #000;
  }
  .close:hover {
      /*background: #ff0000;*/
      background: #00d9ff;
  }
</style>

</head>

<?php echo @$err; ?>
<?php 
  echo $xajax_js;
?>

<!-- <style>
 
.ui-dialog .ui-dialog-content {
  position: relative;
  border: 0;
  padding: .5em 1em;
  background: none;
  overflow: auto;
}

.ui-widget-content {
  border: 1px solid #aaaaaa;
  background: #ffffff url(../../../../varia/application/views/sdm/images/ui-bg_flat_75_ffffff_40x100.png) 50% 50% repeat-x;
  color: #222222;
}

.ui-widget-content a {
  color: #222222;
} 
  
.btn {
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  text-shadow: 1px 1px 3px #666666;
  -webkit-box-shadow: 2px 4px 3px #666666;
  -moz-box-shadow: 2px 4px 3px #666666;
  box-shadow: 2px 4px 3px #666666;
  font-family: Arial;
  color: #ffffff;
  font-size: 19px;
  background: #3498db;
  padding: 5px 10px 5px 10px;
  border: solid #1f628d 2px;
  text-decoration: none;
}

.btn :hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}

</style> -->

<!-- <div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;"> -->
    
<!--       <div class="row-fluid">
        <div class="span12">
          <form class="form-horizontal " id="form">
            <div class="control-group">
              <label class="control-label">Nama</label>
              <div class="controls">
                <div class="ausu-suggest">
                  <input type="text" size="100" value="" name="jabatan" id="jabatan" autocomplete="off" />
                  <input type="text" size="10" value="" name="kojab" id="kojab" autocomplete="off"/>
                </div>
              </div>
            </div>                            
            <div class="control-group">
                <label class="control-label">Periode</label>
                <div class="controls">
                  <select id="periode" class="s-wrap span4">
                    <option value="">-- Pilih Periode --</option>
                    <option value="Periode I">Periode I</option>
                    <option value="Periode II">Periode II</option>
                    <option value="Periode III">Periode III</option>
                    <option value="Periode IV">Periode IV</option>            
                  </select>
                </div>
              </div>
              <div class="row-fluid">
                <div class="span12">
                  <form class="form-horizontal " id="form">
                    <div class="control-group">
                      <label class="control-label">Tahun</label>
                      <div class="controls">                
                          <input type="text" size="20" value="" name="tahun" id="tahun"/>                
                      </div>
                    </div>                            
                  </form>
                </div>
              </div>                        
          </form>
        </div>
      </div> -->

<!--       <div class="row-fluid">
        <div class="span12">
          <div class="portlet">
              <div class="form-search fright">
                  <div class="input-prepend">
                      <span class="add-on">Nama</span>
                      <select class="m-wrap large" data-placeholder="Choose a Category" id='nama' tabindex="1" onchange="caripegawai()">
                          <option value=''>Pilih Pegawai</option>
                          <?php foreach ($pegawai as $row) {
                              echo "<option value='".$row->nik."'>".$row->nama."</option>";
                          } ?>
                      </select>
                  </div>
                  <div class="input-prepend">
                      <span class="add-on">Periode</span>
                      <select class="m-wrap small" id='periode'>
                          <option value='1'>Semester I</option>
                          <option value='2'>Semester II</option>
                      </select>
                  </div>
                  <div class="input-prepend">
                      <span class="add-on">Tahun</span>
                      <select class="m-wrap small" id='tahun'>
                          <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                              if(date('Y') == $i){ 
                                  echo "<option value='".$i."' selected>".$i."</option>";
                              } else {
                                  echo "<option value='".$i."'>".$i."</option>";
                              }                              
                          } ?>
                      </select>
                  </div>

                  <a class="btn green" style='margin-right: 10px;' id="cari" onClick="carikra()"><i class="icon-search"></i> Cari</a>
                  <a class="btn red" style='margin-right: 10px;' id="simpan" onClick="simpanpms()"><i class="icon-save"></i> Simpan</a>
              </div>
          </div>      
        </div>
      </div> -->
  
<!--       <div class="row-fluid">
        <div class="span12"> -->

<table width="20%">
  <tr>  
    <td bgcolor="#00CCFF">Nama</td>
    <td>
      <select id='nama' tabindex="1" onchange="caripegawai()">
          <option value=''>Pilih Pegawai</option>
          <?php foreach ($pegawai as $row) {
              echo "<option value='".$row->nik."'>".$row->nama."</option>";
          } ?>
      </select>
    </td>
  </tr>
  <tr>
    <td bgcolor="#00CCFF">Periode</td>
    <td>
      <select id='periode'>
          <option value='1'>Semester I</option>
          <option value='2'>Semester II</option>
      </select>
    </td>
  </tr>
  <tr>
    <td bgcolor="#00CCFF">Tahun</td>
    <td>
      <select id='tahun'>
          <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
              if(date('Y') == $i){ 
                  echo "<option value='".$i."' selected>".$i."</option>";
              } else {
                  echo "<option value='".$i."'>".$i."</option>";
              }                              
          } ?>
      </select>
    </td>
  </tr>
  <tr>
    <td>
      <input type="button" id="cari" value="Cari" onclick="carikra();" tabindex="8" /> 
      <input type="button"  id="simpan" value="Simpan" onclick="simpanpms();" tabindex="8" /> 
    </td>
  </tr>
<!--                   <a class="btn green" style='margin-right: 10px;' id="cari" onClick="carikra()"><i class="icon-search"></i> Cari</a>
                  <a class="btn red" style='margin-right: 10px;' id="simpan" onClick="simpanpms()"><i class="icon-save"></i> Simpan</a> -->  
</table>

<table border="1" width="100%" align="center">
  <tr>
    <td bgcolor="#9900CC" colspan="20"><font color="#FFFFFF"><b>PENILAIAN UNTUK KEY RESULT AREA</b></font></td>
  </tr>
  <tr>
    <td align="center" style="width:10%" rowspan="3"><b>KRA</b></td>
    <!-- <td align="center" style="width:2%" rowspan="3"><input class="span1 m-wrap" type="text" id="kra" name="kra" value="60" readonly/></td> -->
    <!-- <td align="center" style="width:2%" rowspan="3"><input id="kra" name="kra" size="1" type="text" value="60" disabled="T" style="color:#000000"/></td> -->
    <td align="center" style="width:2%" rowspan="3" id="kra" name="kra">0</td>
    <td align="center" style="width:10%" rowspan="3">Penjelasan 4 pada nilai KRA</td>       
    <td bgcolor="#CC6600" align="center" colspan="12"><font color="#FFFFFF"><b>SKALA KONVERSI NILAI KRA</b></td>
    <td align="center" style="width:10%" rowspan="3">Penjelasan 15 pada nilai KRA</td>    
    <td align="center" style="width:10%" rowspan="3">Bobot Sub Aspek</td>       
    <td align="center" style="width:10%" rowspan="3">_____</td>           
    <td align="center" style="width:10%" rowspan="3">Nilai Bobot Sub Aspek</td>           
    <td align="center" style="width:10%" rowspan="3">Total Nilai Bobot</td>               
    <td align="center" style="width:10%"><b>KEKUATAN</b></td>                   
  </tr>
  <tr>
    <td align="center" style="width:5%" colspan="3"><b>Butuh Pengembangan</b></td>
    <td align="center" style="width:5%" colspan="3"><b>Kompeten</b></td>
    <td align="center" style="width:5%" colspan="3"><b>Sangat Efektif</b></td>
    <td align="center" style="width:5%" colspan="3"><b>Sempurna</b></td>            
    <td align="center" style="width:10%" rowspan="5"><textarea id="kekuatan" name="kekuatan" cols="12" rows="5"></textarea></td>
  </tr>
  <tr>
    <td align="center" style="width:2%">4</td>
    <td align="center" style="width:2%">5</td>    
    <td align="center" style="width:2%">6</td>    
    <td align="center" style="width:2%">7</td>
    <td align="center" style="width:2%">8</td>    
    <td align="center" style="width:2%">9</td>    
    <td align="center" style="width:2%">10</td>
    <td align="center" style="width:2%">11</td>   
    <td align="center" style="width:2%">12</td>   
    <td align="center" style="width:2%">13</td>
    <td align="center" style="width:2%">14</td>   
    <td align="center" style="width:2%">15</td>           
  </tr> 
  <tr>
    <td><b>1. MAINTENING JOB</b></td>
    <td></td>
    <td align="center" style="width:10%" rowspan="2"><5% di rata-rata pencapaian</td>           
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain4" name="maintening" value="4" onclick="cekradiomain4(this.value)"/></label></div></td>
    <!-- <td><div class="controls"><label class="radio"><input type="radio" id="radiomain4" name="maintening" value="4"/></label></div></td>     -->
    <!-- <td><div class="controls"><label class="radio"><input type="radio" id="radiomain5" name="maintening" value="5"/></label></div></td>  -->
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain5" name="maintening" value="5" onclick="cekradiomain5(this.value)"/></label></div></td>     
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain6" name="maintening" value="6" onclick="cekradiomain6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain7" name="maintening" value="7" onclick="cekradiomain7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain8" name="maintening" value="8" onclick="cekradiomain8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain9" name="maintening" value="9" onclick="cekradiomain9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain10" name="maintening" value="10" onclick="cekradiomain10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain11" name="maintening" value="11" onclick="cekradiomain11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain12" name="maintening" value="12" onclick="cekradiomain12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain13" name="maintening" value="13" onclick="cekradiomain13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain14" name="maintening" value="14" onclick="cekradiomain14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain15" name="maintening" value="15" onclick="cekradiomain15(this.value)"/></label></div></td>
    <td align="center" style="width:10%" rowspan="2">>=150% dari rata-rata</td>         
    <td align="center" style="width:2%" id="bobsubmain" name="bobsubmain">90</td> 
    <!-- <td align="center" style="width:2%"><input id="bobsubmain" name="bobsubmain" size="1" type="text" value="100" disabled="T" style="color:#000000"/></td>  -->
    <td align="center" style="width:2%"></td>                 
    <td align="center" style="width:2%" id="nilsubmain" name="nilsubmain">0</td>               
    <!-- <td align="center" style="width:2%"><input id="nilsubmain" name="nilsubmain" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                -->
    <td align="center" style="width:2%" rowspan="2" id="totalnilkra" name="totalnilkra">0</td>             
    <!-- <td align="center" style="width:2%" rowspan="2"><input id="totalnilkra" name="totalnilkra" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>              -->
  </tr>
  <tr>
    <td><b>2. IMPROVEMENT JOB</b></td>
    <td></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov4" name="improvment" value="4" onclick="cekradioimprov4(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov5" name="improvment" value="5" onclick="cekradioimprov5(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov6" name="improvment" value="6" onclick="cekradioimprov6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov7" name="improvment" value="7" onclick="cekradioimprov7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov8" name="improvment" value="8" onclick="cekradioimprov8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov9" name="improvment" value="9" onclick="cekradioimprov9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov10" name="improvment" value="10" onclick="cekradioimprov10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov11" name="improvment" value="11" onclick="cekradioimprov11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov12" name="improvment" value="12" onclick="cekradioimprov12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov13" name="improvment" value="13" onclick="cekradioimprov13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov14" name="improvment" value="14" onclick="cekradioimprov14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov15" name="improvment" value="15" onclick="cekradioimprov15(this.value)"/></label></div></td>
    <td align="center" style="width:2%" id="bobsubimprov" name="bobsubimprov">10</td>   
    <!-- <td align="center" style="width:2%"><input id="bobsubimprov" name="bobsubimprov" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>    -->
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%" id="nilsubimprov" name="nilsubimprov">0</td>                         
    <!-- <td align="center" style="width:2%"><input id="nilsubimprov" name="nilsubimprov" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                          -->
  </tr>
  <tr>
    <td colspan="17"></td>
    <td align="center" style="width:2%"></td>                     
    <td align="center" style="width:2%" id="nilbobotkra" name="nilbobotkra">0</td> 
    <!-- <td align="center" style="width:2%"><input id="nilbobotkra" name="nilbobotkra" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>  -->
    <td style="width:2%"></td>
  </tr>
  <tr>
    <td bgcolor="#9900CC" colspan="20"><font color="#FFFFFF"><b>PENILAIAN UNTUK KEY BEHAVIOR AREA</b></font></td>
    <td align="center" style="width:10%"><b>KELEMAHAN</b></td>                                    
  </tr> 
  <tr>
    <td align="center" style="width:10%" rowspan="3"><b>KBA</b></td>
    <td align="center" style="width:2%" rowspan="3" id="kba" name="kba">0</td>    
    <!-- <td align="center" style="width:2%" rowspan="3"><input class="span1 m-wrap" type="text" placeholder=".span1" id="kba" name="kba" value="40" disabled="T" style="color:#000000"/></td>     -->
    <!-- <td align="center" style="width:2%" rowspan="3"><font color="#FF0000"><input id="kba" name="kba" size="1" type="text" value="40" disabled="T" style="color:#000000"/></font></td> -->
    <td align="center" style="width:10%" rowspan="3">Penjelasan 4 pada nilai KBA</td>       
    <td bgcolor="#CC6600" align="center" colspan="12"><font color="#FFFFFF"><b>SKALA KONVERSI NILAI KRA</b></td>
    <td align="center" style="width:10%" rowspan="3">Penjelasan 15 pada nilai KBA</td>    
    <td align="center" style="width:10%" rowspan="3">Bobot Sub Aspek</td>       
    <td style="width:2%" rowspan="3"></td>    
    <td align="center" style="width:10%" rowspan="3">Nilai Bobot Sub Aspek</td>           
    <td align="center" style="width:10%" rowspan="3">Total Nilai Bobot</td>       
    <td align="center" style="width:10%" rowspan="5"><textarea id="kelemahan" name="kelemahan" cols="12" rows="5"></textarea></td>                
  </tr>
  <tr>
    <td align="center" style="width:5%" colspan="3"><b>Butuh Pengembangan</b></td>
    <td align="center" style="width:5%" colspan="3"><b>Kompeten</b></td>
    <td align="center" style="width:5%" colspan="3"><b>Sangat Efektif</b></td>
    <td align="center" style="width:5%" colspan="3"><b>Sempurna</b></td>            
  </tr>
  <tr>
    <td align="center" style="width:2%">4</td>
    <td align="center" style="width:2%">5</td>    
    <td align="center" style="width:2%">6</td>    
    <td align="center" style="width:2%">7</td>
    <td align="center" style="width:2%">8</td>    
    <td align="center" style="width:2%">9</td>    
    <td align="center" style="width:2%">10</td>
    <td align="center" style="width:2%">11</td>   
    <td align="center" style="width:2%">12</td>   
    <td align="center" style="width:2%">13</td>
    <td align="center" style="width:2%">14</td>   
    <td align="center" style="width:2%">15</td>       
  </tr> 
  <tr>
    <td><b>1. NILAI INTI ku</b></td>
    <td></td>
    <td style="width:2%"></td>  
    <td style="width:2%"></td>  
    <td style="width:2%"></td>    
    <td style="width:2%"></td>    
    <td style="width:2%"></td>
    <td style="width:2%"></td>    
    <td style="width:2%"></td>    
    <td style="width:2%"></td>
    <td style="width:2%"></td>    
    <td style="width:2%"></td>    
    <td style="width:2%"></td>
    <td style="width:2%"></td>    
    <td style="width:2%"></td>            
    <td style="width:2%"></td>            
    <td align="center" style="width:2%" id="bobotinti" name="bobotinti">25</td>    
    <!-- <td align="center" style="width:2%"><input id="bobotinti" name="bobotinti" size="1" type="text" value="25" disabled="T" style="color:#000000"/></td>     -->
    <td align="center" style="width:2%"></td>           
    <td align="center" style="width:2%" rowspan="7" id="nilbobotinti" name="nilbobotinti">0</td>       
    <!-- <td align="center" style="width:2%" rowspan="7"><input id="nilbobotinti" name="nilbobotinti" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>        -->
    <td align="center" style="width:2%" rowspan="8" id="totnilkba" name="totnilkba">0</td>           
    <!-- <td align="center" style="width:2%" rowspan="8"><input id="totnilkba" name="totnilkba" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>            -->
  </tr> 
  <tr>
    <td><b>-INTEGRITAS</b></td>
<!--    <td rowspan="6"></td>-->
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Kejujuran,Mengetahui harapan Pelanggan & memenuhinya dengan tepat waktu,Memenuhi janji kepada 'Stake Holder' " data-original-title="Integritas">?</button></td> -->
    <td><a href='#modalintegritas'><input type="button" id="ketintegritas" value="?" tabindex="8" /></a></td>    
    <td rowspan="6"></td>       
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint4" name="integritas" value="4" onclick="cekradioint4(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint5" name="integritas" value="5" onclick="cekradioint5(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint6" name="integritas" value="6" onclick="cekradioint6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint7" name="integritas" value="7" onclick="cekradioint7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint8" name="integritas" value="8" onclick="cekradioint8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint9" name="integritas" value="9" onclick="cekradioint9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint10" name="integritas" value="10" onclick="cekradioint10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint11" name="integritas" value="11" onclick="cekradioint11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint12" name="integritas" value="12" onclick="cekradioint12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint13" name="integritas" value="13" onclick="cekradioint13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint14" name="integritas" value="14" onclick="cekradioint14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint15" name="integritas" value="15" onclick="cekradioint15(this.value)"/></label></div></td>
    <td rowspan="6"></td>   
    <td rowspan="6"></td>       
    <td align="center" style="width:2%" id="subint" name="subint">0</td>                   
    <!-- <td align="center" style="width:2%"><input id="subint" name="subint" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                    -->
  </tr> 
  <tr>
    <td><b>-TRANSPARANSI</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Komunikasi secara terbuka,Saling memberikan informasi,Manajemen yang partisipatif,Memecahkan masalah secara bersama" data-original-title="Transparansi">?</button></td>     -->
    <td><a href='#modaltransparan'><input type="button" id="kettransparan" value="?" tabindex="8" /></a></td>    
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans4" name="transparansi" value="4" onclick="cekradiotrans4(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans5" name="transparansi" value="5" onclick="cekradiotrans5(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans6" name="transparansi" value="6" onclick="cekradiotrans6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans7" name="transparansi" value="7" onclick="cekradiotrans7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans8" name="transparansi" value="8" onclick="cekradiotrans8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans9" name="transparansi" value="9" onclick="cekradiotrans9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans10" name="transparansi" value="10" onclick="cekradiotrans10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans11" name="transparansi" value="11" onclick="cekradiotrans11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans12" name="transparansi" value="12" onclick="cekradiotrans12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans13" name="transparansi" value="13" onclick="cekradiotrans13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans14" name="transparansi" value="14" onclick="cekradiotrans14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans15" name="transparansi" value="15" onclick="cekradiotrans15(this.value)"/></label></div></td>
    <td align="center" style="width:2%" id="subtrans" name="subtrans">0</td>                   
    <!-- <td align="center" style="width:2%"><input id="subtrans" name="subtrans" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                    -->
    <td align="center" style="width:10%"><b>TINDAK LANJUT</b></td>                                  
  </tr> 
  <tr>
    <td><b>-KERJASAMA TEAM</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Bekerja-sama menuju sukses,Percaya satu dengan yang lain,Menghargai pendapat orang lain,Mencari solusi yang 'Win-Win' " data-original-title="Kerjasama Team">?</button></td>         -->
    <td><a href='#modalkerjasama'><input type="button" id="ketkerjasama" value="?" tabindex="8" /></a></td>   
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja4" name="kerjasama" value="4" onclick="cekradiokerja4(this.value)"/></label></div></td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja5" name="kerjasama" value="5" onclick="cekradiokerja5(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja6" name="kerjasama" value="6" onclick="cekradiokerja6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja7" name="kerjasama" value="7" onclick="cekradiokerja7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja8" name="kerjasama" value="8" onclick="cekradiokerja8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja9" name="kerjasama" value="9" onclick="cekradiokerja9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja10" name="kerjasama" value="10" onclick="cekradiokerja10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja11" name="kerjasama" value="11" onclick="cekradiokerja11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja12" name="kerjasama" value="12" onclick="cekradiokerja12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja13" name="kerjasama" value="13" onclick="cekradiokerja13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja14" name="kerjasama" value="14" onclick="cekradiokerja14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja15" name="kerjasama" value="15" onclick="cekradiokerja15(this.value)"/></label></div></td>
    <td align="center" style="width:2%" id="subkerja" name="subkerja">0</td>                       
    <!-- <td align="center" style="width:2%"><input id="subkerja" name="subkerja" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                        -->
    <td align="center" style="width:10%" rowspan="5"><textarea id="tindaklanjut" name="tindaklanjut" cols="12" rows="7"></textarea></td>                    
  </tr> 
  <tr>
    <td><b>-KREATIVITAS</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Melakukan komparasi/Benchmark exsternal,Mendorong terciptanya ide-ide baru,Selalu mencari cara yang lebih baik" data-original-title="Kreatifitas">?</button></td>             -->
    <td><a href='#modalkreatifitas'><input type="button" id="ketkreatif" value="?" tabindex="8" /></a></td>   
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ4" name="kreativitas" value="4" onclick="cekradiokreativ4(this.value)"/></label></div></td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ5" name="kreativitas" value="5" onclick="cekradiokreativ5(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ6" name="kreativitas" value="6" onclick="cekradiokreativ6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ7" name="kreativitas" value="7" onclick="cekradiokreativ7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ8" name="kreativitas" value="8" onclick="cekradiokreativ8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ9" name="kreativitas" value="9" onclick="cekradiokreativ9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ10" name="kreativitas" value="10" onclick="cekradiokreativ10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ11" name="kreativitas" value="11" onclick="cekradiokreativ11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ12" name="kreativitas" value="12" onclick="cekradiokreativ12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ13" name="kreativitas" value="13" onclick="cekradiokreativ13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ14" name="kreativitas" value="14" onclick="cekradiokreativ14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ15" name="kreativitas" value="15" onclick="cekradiokreativ15(this.value)"/></label></div></td>
    <td align="center" style="width:2%" id="subkreativ" name="subkreativ">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subkreativ" name="subkreativ" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  <tr>
    <td><b>-SEMANGAT UTK MENANG</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Bersikap selalu proaktif,Semangat Pantang Menyerah,Proses membentuk budaya belajar,Komitmen total untuk mencapai hasil yang diharapkan" data-original-title="Semangat Untuk Menang">?</button></td>                 -->
    <td><a href='#modalsemangat'><input type="button" id="ketsemangat" value="?" tabindex="8" /></a></td>    
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat4" name="semangat" value="4" onclick="cekradiosemangat4(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat5" name="semangat" value="5" onclick="cekradiosemangat5(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat6" name="semangat" value="6" onclick="cekradiosemangat6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat7" name="semangat" value="7" onclick="cekradiosemangat7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat8" name="semangat" value="8" onclick="cekradiosemangat8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat9" name="semangat" value="9" onclick="cekradiosemangat9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat10" name="semangat" value="10" onclick="cekradiosemangat10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat11" name="semangat" value="11" onclick="cekradiosemangat11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat12" name="semangat" value="12" onclick="cekradiosemangat12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat13" name="semangat" value="13" onclick="cekradiosemangat13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat14" name="semangat" value="14" onclick="cekradiosemangat14(this.value)" /></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat15" name="semangat" value="15" onclick="cekradiosemangat15(this.value)"/></label></div></td>
    <td align="center" style="width:2%" id="subsemangat" name="subsemangat">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subsemangat" name="subsemangat" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  <tr>
    <td><b>-KESEMPURNAAN</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Quality : Bekerja yang benar dari awal,Cost : Kompetitif secara global,Deliver : Tepat waktu,Safety : Cara kerja yang aman & sehat lingkungan,Morale : Rasa bangga & semangat tinggi" data-original-title="Kesempurnaan">?</button></td>                    -->
    <td><a href='#modalsempurna'><input type="button" id="ketsempurna" value="?" tabindex="8" /></a></td>    
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp4" name="sempurna" value="4" onclick="cekradiosemp4(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp5" name="sempurna" value="5" onclick="cekradiosemp5(this.value)" /></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp6" name="sempurna" value="6" onclick="cekradiosemp6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp7" name="sempurna" value="7" onclick="cekradiosemp7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp8" name="sempurna" value="8" onclick="cekradiosemp8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp9" name="sempurna" value="9" onclick="cekradiosemp9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp10" name="sempurna" value="10" onclick="cekradiosemp10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp11" name="sempurna" value="11" onclick="cekradiosemp11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp12" name="sempurna" value="12" onclick="cekradiosemp12(this.value)" /></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp13" name="sempurna" value="13" onclick="cekradiosemp13(this.value)" /></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp14" name="sempurna" value="14" onclick="cekradiosemp14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp15" name="sempurna" value="15" onclick="cekradiosemp15(this.value)"/></label></div></td>
    <td align="center" style="width:2%" id="subsempurna" name="subsempurna">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subsempurna" name="subsempurna" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  <tr>
    <td><b>2. DISIPLIN KEHADIRAN</b></td>
    <td></td>
    <td style="width:2%">< 20% Kehadiran</td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin4" name="disiplin" value="4" onclick="cekradiodisiplin4(this.value)"/></label></div></td>  
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin5" name="disiplin" value="5" onclick="cekradiodisiplin5(this.value)" /></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin6" name="disiplin" value="6" onclick="cekradiodisiplin6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin7" name="disiplin" value="7" onclick="cekradiodisiplin7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin8" name="disiplin" value="8" onclick="cekradiodisiplin8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin9" name="disiplin" value="9" onclick="cekradiodisiplin9(this.value)" /></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin10" name="disiplin" value="10" onclick="cekradiodisiplin10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin11" name="disiplin" value="11" onclick="cekradiodisiplin11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin12" name="disiplin" value="12" onclick="cekradiodisiplin12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin13" name="disiplin" value="13" onclick="cekradiodisiplin13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin14" name="disiplin" value="14" onclick="cekradiodisiplin14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin15" name="disiplin" value="15" onclick="cekradiodisiplin15(this.value)"/></label></div></td>
    <td align="center" style="width:2%">100% hadir tanpa sakit dan ijin</td>    
    <td align="center" style="width:2%" id="bobotdisiplin" name="bobotdisiplin">55</td>
    <!-- <td align="center" style="width:2%"><input id="bobotdisiplin" name="bobotdisiplin" size="1" type="text" value="55" disabled="T" style="color:#000000"/></td> -->
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%" id="nilbobotdisiplin" name="nilbobotdisiplin">0</td>   
    <!-- <td align="center" style="width:2%"><input id="nilbobotdisiplin" name="nilbobotdisiplin" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>    -->
  </tr> 
  <tr>
    <td><b>3. PDCA</b></td>
    <td></td>
    <td style="width:2%">Hanya membuat perencanaan dan review</td>  
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca4" name="pdca" value="4" onclick="cekradiopdca4(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca5" name="pdca" value="5" onclick="cekradiopdca5(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca6" name="pdca" value="6" onclick="cekradiopdca6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca7" name="pdca" value="7" onclick="cekradiopdca7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca8" name="pdca" value="8" onclick="cekradiopdca8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca9" name="pdca" value="9" onclick="cekradiopdca9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca10" name="pdca" value="10" onclick="cekradiopdca10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca11" name="pdca" value="11" onclick="cekradiopdca11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca12" name="pdca" value="12" onclick="cekradiopdca12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca13" name="pdca" value="13" onclick="cekradiopdca13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca14" name="pdca" value="14" onclick="cekradiopdca14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca15" name="pdca" value="15" onclick="cekradiopdca15(this.value)"/></label></div></td>
    <td align="center" style="width:2%">Ada perencanaan, review dan penetapan tindak</td>   
    <td align="center" style="width:2%" id="bobotpdca" name="bobotpdca">10</td>
    <!-- <td align="center" style="width:2%"><input id="bobotpdca" name="bobotpdca" size="1" type="text" value="10" disabled="T" style="color:#000000"/></td> -->
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%" id="nilbobotpdca" name="nilbobotpdca">0</td>   
    <!-- <td align="center" style="width:2%"><input id="nilbobotpdca" name="nilbobotpdca" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>    -->
    <td style="width:2%"></td>        
    <td align="center" style="width:10%"><b>JADWAL</b></td>                                       
  </tr> 
  <tr>
    <td><b>4. MANAGEMENT ORANG</b></td>
    <td></td>
    <td style="width:2%">Hubungan kerja jelek,tidak ada coaching,conseling,train jelek</td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage4" name="manage" value="4" onclick="cekradiomanage4(this.value)"/></label></div></td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage5" name="manage" value="5" onclick="cekradiomanage5(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage6" name="manage" value="6" onclick="cekradiomanage6(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage7" name="manage" value="7" onclick="cekradiomanage7(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage8" name="manage" value="8" onclick="cekradiomanage8(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage9" name="manage" value="9" onclick="cekradiomanage9(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage10" name="manage" value="10" onclick="cekradiomanage10(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage11" name="manage" value="11" onclick="cekradiomanage11(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage12" name="manage" value="12" onclick="cekradiomanage12(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage13" name="manage" value="13" onclick="cekradiomanage13(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage14" name="manage" value="14" onclick="cekradiomanage14(this.value)"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage15" name="manage" value="15" onclick="cekradiomanage15(this.value)"/></label></div></td>
    <td align="center" style="width:2%">Hubungan kerja <br>baik,ada coaching,conseling,<br>kepemimpinan baik</td>   
    <td align="center" style="width:2%" id="bobotmanagement" name="bobotmanagement">10</td>
    <!-- <td align="center" style="width:2%"><input id="bobotmanagement" name="bobotmanagement" size="1" type="text" value="10" disabled="T" style="color:#000000"/></td>     -->
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%" id="nilbobotmanagement" name="nilbobotmanagement">0</td>   
    <!-- <td align="center" style="width:2%"><input id="nilbobotmanagement" name="nilbobotmanagement" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>    -->
    <td style="width:2%"></td>        
    <td style="width:2%" rowspan="4"><textarea id="jadwal" name="jadwal" cols="12" rows="4"></textarea></td>            
  </tr> 
  <tr>
    <td colspan="17"></td>
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%" id="nilbobotkba" name="nilbobotkba">0</td>   
    <!-- <td align="center" style="width:2%"><input id="nilbobotkba" name="nilbobotkba" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>    -->
    <td style="width:2%"></td>        
  </tr>   
  <tr>
    <td colspan="18"><input style="text-align:right;" id="hasil" name="hasil" size="220" type="text" value="" readonly style="color:#000000"/></td>
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%" id="totkrakba" name="totkrakba">0</td>   
    <!-- <td align="center" style="width:2%"><input id="totkrakba" name="totkrakba" size="1" type="text" value="0" readonly style="color:#000000"/></td>    -->
  </tr>   

                 <table width="90%" align="center">
         
         <tr>
                 <td  align="left">
           <!-- <input type="button"  id="btnsimpan" value="Simpan" onclick="simpanpms();" tabindex="8" />  -->
           <!-- <input type="button"  id="verifyBtn" value="Hapus" onclick="hapuskrakba();" tabindex="8" />  -->
             <!-- <input type="button"  id="verifyBtn" value="Batal" onclick="kosong();" tabindex="8" />  -->
               <!-- <input type="button" id="btncetak" value="Cetak" onClick=""> -->
               <!-- <input type="button" id="btncetak" value="Cetak" onClick="location.href='<?=base_url()."index.php/cbham/formcetakkrakba"?>'"> -->
  
                   <!-- <input type="button" class="" value="Kembali" onClick="location.href='<?=base_url()."index.php/cbham/kembali2"?>'"></td>                    -->
<!--           <input type="button" value="Keluar" onClick="location.href='<?=base_url()."index.php/vis/kembali"?>'"></td>-->
                </tr>            

</table>

<!-- Modal Detail  -->
<div id="modalintegritas" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Integritas</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
          <tr>
            <td bgcolor="6094DB"><label for="tanggal">Integritas</label></td>
            <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Kejujuran</label>
          </tr>                                    
          <tr>
             <td bgcolor="6094DB"><label for="tanggal"></label></td>
               <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Mengetahui harapan Pelanggan & memenuhinya dengan tepat waktu</label>
          </tr>                                               
          <tr>
             <td bgcolor="6094DB"><label for="tanggal"></label></td>
               <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Memenuhi janji kepada "Stake Holder"</label>
          </tr>                                                         
        </table>
    </div>
</div>   
<div id="modaltransparan" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Transparansi</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal">Transparansi</label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Komunikasi secara terbuka</label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Saling memberikan informasi</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Manajemen yang partisipatif</label>
           </tr>                                                         
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Memecahkan masalah secara bersama</label>
           </tr>                                                                  
        </table>
    </div>
</div>   
<div id="modalkerjasama" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Kerjasama Team</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal">Kerjasama Team</label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Bekerja-sama menuju sukses</label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Percaya satu dengan yang lain</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Menghargai pendapat orang lain</label>
           </tr>                                                         
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Mencari solusi yang "Win-Win"</label>
           </tr>                                                                   
        </table>
    </div>
</div>   
<div id="modalkreatifitas" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Kreatifitas</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal">Kreatifitas</label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Melakukan komparasi/Benchmark exsternal</label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Mendorong terciptanya ide-ide baru</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Selalu mencari cara yang lebih baik</label>
           </tr>                                                         
        </table>
    </div>
</div>   
<div id="modalsemangat" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Semangat Untuk Menang</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal">Semangat Untuk Menang</label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Bersikap selalu proaktif</label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Semangat Pantang Menyerah</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Proses membentuk budaya belajar</label>
           </tr>                                                         
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Komitmen total untuk mencapai hasil yang diharapkan</label>
           </tr>                                                                   
        </table>
    </div>
</div>   
<div id="modalsempurna" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Kesempurnaan</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal">Kesempurnaan</label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Quality : Bekerja yang benar dari awal</label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Cost : Kompetitif secara global</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Deliver : Tepat waktu</label>
           </tr>                                                         
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Safety : Cara kerja yang aman & sehat lingkungan</label>
           </tr>                                                                   
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">Morale : Rasa bangga & semangat tinggi</label>
           </tr>                                                                             
        </table>
    </div>
</div>   
<!--         </div>
      </div> -->

<!--       <div class="row-fluid">
        <div class="span12">
          <form class="form-horizontal " id="form">
            <div class="control-group">
              <div class="portlet">
                  <a class="btn blue" data-toggle="modal" href="#" onclick="carioutstdkompetensi()"><i class="icon-search"></i> Cari</a>
                  <a class="btn purple" data-toggle="modal" href="#stack1"><i class="icon-download"></i> Download XLS</a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th align="center">Kompetensi</th>
          <th align='center'>1</th>
          <th align='center'>2</th>
          <th align='center'>3</th>
          <th align='center'>4</th>
          <th align="center">5</th>
        </tr>
        </thead>
        <tbody id='pms'>
      </table>  -->

<!--   </div>
</div> -->

<script type="application/javascript">

function showMyPayroll(){
//must be present because auto suggest will callback this function
}

// $(document).ready(function() {

//     $.fn.autosugguest({  
//            className: 'ausu-suggest',
//           methodType: 'POST',
//             minChars: 1,
//               rtnIDs: true,
//             dataFile: '<?=base_url().'index.php/stdknowhow/jabatanList'?>'
//     });   
// });


function cekradiomain4(jenis){ 
  if (document.getElementById("radiomain4").checked===true){
      document.getElementById("nilsubmain").innerHTML = (4*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      } 
  }
} 

function cekradiomain5(jenis){ 
  if (document.getElementById("radiomain5").checked===true){
      document.getElementById("nilsubmain").innerHTML = (5*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      } 
  }
} 

// $(document).ready(function() {    

function cekradiomain6(jenis){ 
  if (document.getElementById("radiomain6").checked===true){
      document.getElementById("nilsubmain").innerHTML = (6*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 
    
function cekradiomain7(jenis){ 
  if (document.getElementById("radiomain7").checked===true){
      document.getElementById("nilsubmain").innerHTML = (7*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradiomain8(jenis){ 
  if (document.getElementById("radiomain8").checked===true){
      document.getElementById("nilsubmain").innerHTML = (8*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradiomain9(jenis){ 
  if (document.getElementById("radiomain9").checked===true){
      document.getElementById("nilsubmain").innerHTML = (9*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradiomain10(jenis){ 
  if (document.getElementById("radiomain10").checked===true){
      document.getElementById("nilsubmain").innerHTML = (10*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradiomain11(jenis){ 
  if (document.getElementById("radiomain11").checked===true){
      document.getElementById("nilsubmain").innerHTML = (11*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradiomain12(jenis){ 
  if (document.getElementById("radiomain12").checked===true){
      document.getElementById("nilsubmain").innerHTML = (12*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradiomain13(jenis){ 
  if (document.getElementById("radiomain13").checked===true){
      document.getElementById("nilsubmain").innerHTML = (13*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradiomain14(jenis){ 
  if (document.getElementById("radiomain14").checked===true){
      document.getElementById("nilsubmain").innerHTML = (14*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradiomain15(jenis){ 
  if (document.getElementById("radiomain15").checked===true){
      document.getElementById("nilsubmain").innerHTML = (15*Number(document.getElementById("bobsubmain").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

//====================improvment job

function cekradioimprov4(jenis){ 
  if (document.getElementById("radioimprov4").checked===true){      
      document.getElementById("nilsubimprov").innerHTML = (4*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov5(jenis){ 
  if (document.getElementById("radioimprov5").checked===true){      
      document.getElementById("nilsubimprov").innerHTML = (5*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov6(jenis){ 
  if (document.getElementById("radioimprov6").checked===true){      
      document.getElementById("nilsubimprov").innerHTML = (6*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 
    
function cekradioimprov7(jenis){ 
  if (document.getElementById("radioimprov7").checked===true){     
      document.getElementById("nilsubimprov").innerHTML = (7*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov8(jenis){ 
  if (document.getElementById("radioimprov8").checked===true){     
      document.getElementById("nilsubimprov").innerHTML = (8*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov9(jenis){ 
  if (document.getElementById("radioimprov9").checked===true){     
      document.getElementById("nilsubimprov").innerHTML = (9*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov10(jenis){ 
  if (document.getElementById("radioimprov10").checked===true){     
      document.getElementById("nilsubimprov").innerHTML = (10*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov11(jenis){ 
  if (document.getElementById("radioimprov11").checked===true){     
      document.getElementById("nilsubimprov").innerHTML = (11*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov12(jenis){ 
  if (document.getElementById("radioimprov12").checked===true){     
      document.getElementById("nilsubimprov").innerHTML = (12*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov13(jenis){ 
  if (document.getElementById("radioimprov13").checked===true){ 
      document.getElementById("nilsubimprov").innerHTML = (13*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov14(jenis){ 
  if (document.getElementById("radioimprov14").checked===true){ 
      document.getElementById("nilsubimprov").innerHTML = (14*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

function cekradioimprov15(jenis){ 
  if (document.getElementById("radioimprov15").checked===true){ 
      document.getElementById("nilsubimprov").innerHTML = (15*Number(document.getElementById("bobsubimprov").innerHTML))/100;        
      document.getElementById("nilbobotkra").innerHTML = ((Number(document.getElementById("nilsubmain").innerHTML)+Number(document.getElementById("nilsubimprov").innerHTML)))*(100/100);         
      document.getElementById("totalnilkra").innerHTML = ((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100;         
      document.getElementById("totkrakba").innerHTML = (((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
            if (jumlah <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (jumlah > 12.99){
            if (jumlah <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      }
  }
} 

// //====================integritas

function cekradioint4(jenis){ 
  if (document.getElementById("radioint4").checked===true){ 
      document.getElementById("subint").innerHTML = (4*Number(document.getElementById("bobotinti").innerHTML))/100;         
      // var x =((Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6);   
      // document.getElementById("nilbobotinti").innerHTML= x.toFixed(2);
      document.getElementById("nilbobotinti").innerHTML= ((Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6).toFixed(2);        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint5(jenis){ 
  if (document.getElementById("radioint5").checked===true){ 
      document.getElementById("subint").innerHTML = (5*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      // number_format(document.getElementById("nilbobotinti").innerHTML, 2, ',', '.') = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint6(jenis){ 
  if (document.getElementById("radioint6").checked===true){ 
      document.getElementById("subint").innerHTML = (6*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 
    
function cekradioint7(jenis){ 
  if (document.getElementById("radioint7").checked===true){ 
      document.getElementById("subint").innerHTML = (7*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint8(jenis){ 
  if (document.getElementById("radioint8").checked===true){ 
      document.getElementById("subint").innerHTML = (8*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint9(jenis){ 
  if (document.getElementById("radioint9").checked===true){ 
      document.getElementById("subint").innerHTML = (9*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint10(jenis){ 
  if (document.getElementById("radioint10").checked===true){
      document.getElementById("subint").innerHTML = (10*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint11(jenis){ 
  if (document.getElementById("radioint11").checked===true){
      document.getElementById("subint").innerHTML = (11*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint12(jenis){ 
  if (document.getElementById("radioint12").checked===true){
      document.getElementById("subint").innerHTML = (12*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint13(jenis){ 
  if (document.getElementById("radioint13").checked===true){
      document.getElementById("subint").innerHTML = (13*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint14(jenis){ 
  if (document.getElementById("radioint14").checked===true){
      document.getElementById("subint").innerHTML = (14*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradioint15(jenis){ 
  if (document.getElementById("radioint15").checked===true){
      document.getElementById("subint").innerHTML = (15*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

// //====================transparansi

function cekradiotrans4(jenis){ 
  if (document.getElementById("radiotrans4").checked===true){      
      document.getElementById("subtrans").innerHTML = (4*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans5(jenis){ 
  if (document.getElementById("radiotrans5").checked===true){      
      document.getElementById("subtrans").innerHTML = (5*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans6(jenis){ 
  if (document.getElementById("radiotrans6").checked===true){      
      document.getElementById("subtrans").innerHTML = (6*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 
    
function cekradiotrans7(jenis){ 
  if (document.getElementById("radiotrans7").checked===true){     
      document.getElementById("subtrans").innerHTML = (7*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans8(jenis){ 
  if (document.getElementById("radiotrans8").checked===true){     
      document.getElementById("subtrans").innerHTML = (8*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans9(jenis){ 
  if (document.getElementById("radiotrans9").checked===true){     
      document.getElementById("subtrans").innerHTML = (9*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans10(jenis){ 
  if (document.getElementById("radiotrans10").checked===true){     
      document.getElementById("subtrans").innerHTML = (10*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans11(jenis){ 
  if (document.getElementById("radiotrans11").checked===true){    
      document.getElementById("subtrans").innerHTML = (11*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans12(jenis){ 
  if (document.getElementById("radiotrans12").checked===true){    
      document.getElementById("subtrans").innerHTML = (12*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans13(jenis){ 
  if (document.getElementById("radiotrans13").checked===true){    
      document.getElementById("subtrans").innerHTML = (13*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans14(jenis){ 
  if (document.getElementById("radiotrans14").checked===true){    
      document.getElementById("subtrans").innerHTML = (14*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiotrans15(jenis){ 
  if (document.getElementById("radiotrans15").checked===true){   
      document.getElementById("subtrans").innerHTML = (15*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

// //====================kerjasama team

function cekradiokerja4(jenis){ 
  if (document.getElementById("radiokerja4").checked===true){        
      document.getElementById("subkerja").innerHTML = (4*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiokerja5(jenis){ 
  if (document.getElementById("radiokerja5").checked===true){        
      document.getElementById("subkerja").innerHTML = (5*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiokerja6(jenis){ 
  if (document.getElementById("radiokerja6").checked===true){        
      document.getElementById("subkerja").innerHTML = (6*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 
    
function cekradiokerja7(jenis){ 
  if (document.getElementById("radiokerja7").checked===true){        
      document.getElementById("subkerja").innerHTML = (7*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiokerja8(jenis){ 
  if (document.getElementById("radiokerja8").checked===true){        
      document.getElementById("subkerja").innerHTML = (8*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiokerja9(jenis){ 
  if (document.getElementById("radiokerja9").checked===true){        
      document.getElementById("subkerja").innerHTML = (9*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiokerja10(jenis){ 
  if (document.getElementById("radiokerja10").checked===true){        
      document.getElementById("subkerja").innerHTML = (10*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiokerja11(jenis){ 
  if (document.getElementById("radiokerja11").checked===true){        
      document.getElementById("subkerja").innerHTML = (11*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
} 

function cekradiokerja12(jenis){ 
  if (document.getElementById("radiokerja12").checked===true){        
      document.getElementById("subkerja").innerHTML = (12*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokerja13(jenis){ 
  if (document.getElementById("radiokerja13").checked===true){        
      document.getElementById("subkerja").innerHTML = (13*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokerja14(jenis){ 
  if (document.getElementById("radiokerja14").checked===true){        
      document.getElementById("subkerja").innerHTML = (14*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokerja15(jenis){ 
  if (document.getElementById("radiokerja15").checked===true){        
      document.getElementById("subkerja").innerHTML = (15*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

// //====================kreativitas    

function cekradiokreativ4(jenis){ 
  if (document.getElementById("radiokreativ4").checked===true){        
      document.getElementById("subkreativ").innerHTML = (4*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ5(jenis){ 
  if (document.getElementById("radiokreativ5").checked===true){        
      document.getElementById("subkreativ").innerHTML = (5*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ6(jenis){ 
  if (document.getElementById("radiokreativ6").checked===true){        
      document.getElementById("subkreativ").innerHTML = (6*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}
    
function cekradiokreativ7(jenis){ 
  if (document.getElementById("radiokreativ7").checked===true){        
      document.getElementById("subkreativ").innerHTML = (7*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ8(jenis){ 
  if (document.getElementById("radiokreativ8").checked===true){        
      document.getElementById("subkreativ").innerHTML = (8*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ9(jenis){ 
  if (document.getElementById("radiokreativ9").checked===true){        
      document.getElementById("subkreativ").innerHTML = (9*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ10(jenis){ 
  if (document.getElementById("radiokreativ10").checked===true){        
      document.getElementById("subkreativ").innerHTML = (10*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ11(jenis){ 
  if (document.getElementById("radiokreativ11").checked===true){        
      document.getElementById("subkreativ").innerHTML = (11*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ12(jenis){ 
  if (document.getElementById("radiokreativ12").checked===true){        
      document.getElementById("subkreativ").innerHTML = (12*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ13(jenis){ 
  if (document.getElementById("radiokreativ13").checked===true){        
      document.getElementById("subkreativ").innerHTML = (13*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ14(jenis){ 
  if (document.getElementById("radiokreativ14").checked===true){        
      document.getElementById("subkreativ").innerHTML = (14*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiokreativ15(jenis){ 
  if (document.getElementById("radiokreativ15").checked===true){        
      document.getElementById("subkreativ").innerHTML = (15*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

// //====================semangat

function cekradiosemangat4(jenis){ 
  if (document.getElementById("radiosemangat4").checked===true){              
      document.getElementById("subsemangat").innerHTML = (4*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat5(jenis){ 
  if (document.getElementById("radiosemangat5").checked===true){              
      document.getElementById("subsemangat").innerHTML = (5*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat6(jenis){ 
  if (document.getElementById("radiosemangat6").checked===true){              
      document.getElementById("subsemangat").innerHTML = (6*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}
    
function cekradiosemangat7(jenis){ 
  if (document.getElementById("radiosemangat7").checked===true){              
      document.getElementById("subsemangat").innerHTML = (7*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat8(jenis){ 
  if (document.getElementById("radiosemangat8").checked===true){              
      document.getElementById("subsemangat").innerHTML = (8*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat9(jenis){ 
  if (document.getElementById("radiosemangat9").checked===true){              
      document.getElementById("subsemangat").innerHTML = (9*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat10(jenis){ 
  if (document.getElementById("radiosemangat10").checked===true){              
      document.getElementById("subsemangat").innerHTML = (10*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat11(jenis){ 
  if (document.getElementById("radiosemangat11").checked===true){              
      document.getElementById("subsemangat").innerHTML = (11*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat12(jenis){ 
  if (document.getElementById("radiosemangat12").checked===true){              
      document.getElementById("subsemangat").innerHTML = (12*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat13(jenis){ 
  if (document.getElementById("radiosemangat13").checked===true){              
      document.getElementById("subsemangat").innerHTML = (13*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat14(jenis){ 
  if (document.getElementById("radiosemangat14").checked===true){              
      document.getElementById("subsemangat").innerHTML = (14*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemangat15(jenis){ 
  if (document.getElementById("radiosemangat15").checked===true){              
      document.getElementById("subsemangat").innerHTML = (15*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

// //====================sempurna

function cekradiosemp4(jenis){ 
  if (document.getElementById("radiosemp4").checked===true){              
      document.getElementById("subsempurna").innerHTML = (4*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp5(jenis){ 
  if (document.getElementById("radiosemp5").checked===true){              
      document.getElementById("subsempurna").innerHTML = (5*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp6(jenis){ 
  if (document.getElementById("radiosemp6").checked===true){              
      document.getElementById("subsempurna").innerHTML = (6*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}
    
function cekradiosemp7(jenis){ 
  if (document.getElementById("radiosemp7").checked===true){              
      document.getElementById("subsempurna").innerHTML = (7*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp8(jenis){ 
  if (document.getElementById("radiosemp8").checked===true){              
      document.getElementById("subsempurna").innerHTML = (8*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp9(jenis){ 
  if (document.getElementById("radiosemp9").checked===true){              
      document.getElementById("subsempurna").innerHTML = (9*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp10(jenis){ 
  if (document.getElementById("radiosemp10").checked===true){              
      document.getElementById("subsempurna").innerHTML = (10*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp11(jenis){ 
  if (document.getElementById("radiosemp11").checked===true){              
      document.getElementById("subsempurna").innerHTML = (11*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp12(jenis){ 
  if (document.getElementById("radiosemp12").checked===true){              
      document.getElementById("subsempurna").innerHTML = (12*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp13(jenis){ 
  if (document.getElementById("radiosemp13").checked===true){              
      document.getElementById("subsempurna").innerHTML = (13*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp14(jenis){ 
  if (document.getElementById("radiosemp14").checked===true){              
      document.getElementById("subsempurna").innerHTML = (14*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiosemp15(jenis){ 
  if (document.getElementById("radiosemp15").checked===true){              
      document.getElementById("subsempurna").innerHTML = (15*Number(document.getElementById("bobotinti").innerHTML))/100;         
      document.getElementById("nilbobotinti").innerHTML = (Number(document.getElementById("subint").innerHTML)+Number(document.getElementById("subtrans").innerHTML)+Number(document.getElementById("subkerja").innerHTML)+Number(document.getElementById("subkreativ").innerHTML)+Number(document.getElementById("subsemangat").innerHTML)+Number(document.getElementById("subsempurna").innerHTML))/6;        
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);   
      document.getElementById("totkrakba").innerHTML =jumlah;
        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

// //====================disiplin

function cekradiodisiplin4(jenis){ 
  if (document.getElementById("radiodisiplin4").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (4*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin5(jenis){ 
  if (document.getElementById("radiodisiplin5").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (5*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin6(jenis){ 
  if (document.getElementById("radiodisiplin6").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (6*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}
    
function cekradiodisiplin7(jenis){ 
  if (document.getElementById("radiodisiplin7").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (7*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin8(jenis){ 
  if (document.getElementById("radiodisiplin8").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (8*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin9(jenis){ 
  if (document.getElementById("radiodisiplin9").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (9*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin10(jenis){ 
  if (document.getElementById("radiodisiplin10").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (10*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin11(jenis){ 
  if (document.getElementById("radiodisiplin11").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (11*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin12(jenis){ 
  if (document.getElementById("radiodisiplin12").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (12*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin13(jenis){ 
  if (document.getElementById("radiodisiplin13").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (13*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin14(jenis){ 
  if (document.getElementById("radiodisiplin14").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (14*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiodisiplin15(jenis){ 
  if (document.getElementById("radiodisiplin15").checked===true){                    
      document.getElementById("nilbobotdisiplin").innerHTML = (15*Number(document.getElementById("bobotdisiplin").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

// //====================pdca

function cekradiopdca4(jenis){ 
  if (document.getElementById("radiopdca4").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (4*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca5(jenis){ 
  if (document.getElementById("radiopdca5").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (5*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca6(jenis){ 
  if (document.getElementById("radiopdca6").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (6*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}
    
function cekradiopdca7(jenis){ 
  if (document.getElementById("radiopdca7").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (7*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca8(jenis){ 
  if (document.getElementById("radiopdca8").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (8*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca9(jenis){ 
  if (document.getElementById("radiopdca9").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (9*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca10(jenis){ 
  if (document.getElementById("radiopdca10").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (10*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca11(jenis){ 
  if (document.getElementById("radiopdca11").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (11*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca12(jenis){ 
  if (document.getElementById("radiopdca12").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (12*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca13(jenis){ 
  if (document.getElementById("radiopdca13").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (13*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca14(jenis){ 
  if (document.getElementById("radiopdca14").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (14*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiopdca15(jenis){ 
  if (document.getElementById("radiopdca15").checked===true){
      document.getElementById("nilbobotpdca").innerHTML = (15*Number(document.getElementById("bobotpdca").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

// //====================manage

function cekradiomanage4(jenis){ 
  if (document.getElementById("radiomanage4").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (4*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage5(jenis){ 
  if (document.getElementById("radiomanage5").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (5*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage6(jenis){ 
  if (document.getElementById("radiomanage6").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (6*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}
    
function cekradiomanage7(jenis){ 
  if (document.getElementById("radiomanage7").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (7*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage8(jenis){ 
  if (document.getElementById("radiomanage8").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (8*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage9(jenis){ 
  if (document.getElementById("radiomanage9").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (9*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage10(jenis){ 
  if (document.getElementById("radiomanage10").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (10*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage11(jenis){ 
  if (document.getElementById("radiomanage11").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (11*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage12(jenis){ 
  if (document.getElementById("radiomanage12").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (12*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage13(jenis){ 
  if (document.getElementById("radiomanage13").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (13*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage14(jenis){ 
  if (document.getElementById("radiomanage14").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (14*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

function cekradiomanage15(jenis){ 
  if (document.getElementById("radiomanage15").checked===true){      
      document.getElementById("nilbobotmanagement").innerHTML = (15*Number(document.getElementById("bobotmanagement").innerHTML))/100;
      document.getElementById("nilbobotkba").innerHTML = Number(document.getElementById("nilbobotinti").innerHTML)+Number(document.getElementById("nilbobotdisiplin").innerHTML)+Number(document.getElementById("nilbobotpdca").innerHTML)+Number(document.getElementById("nilbobotmanagement").innerHTML);
      document.getElementById("totnilkba").innerHTML = (Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML))/100;         
      var jumlah=(((Number(document.getElementById("nilbobotkba").innerHTML)*Number(document.getElementById("kba").innerHTML)))/100)+(((Number(document.getElementById("nilbobotkra").innerHTML)*Number(document.getElementById("kra").innerHTML)))/100);
      document.getElementById("totkrakba").innerHTML =jumlah;

        if (jumlah <= 6.99){
             document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
        }      
        if (jumlah > 6.99){
              if (jumlah <= 9.99){
               document.getElementById("hasil").value ='KOMPETEN';
            }
        }
        if (jumlah > 9.99){
              if (jumlah <= 12.99){
               document.getElementById("hasil").value ='SANGAT EFEKTIF';
            }
        }      
        if (jumlah > 12.99){
              if (jumlah <= 15){
               document.getElementById("hasil").value ='SEMPURNA';
            }
        }
  }
}

// });    

function kosong(){
   // document.getElementById("radiomain4").checked=false;   
   // document.getElementById("radiomain5").checked=false;   
   // document.getElementById("radiomain6").checked=false;   
   // document.getElementById("radiomain7").checked=false;   
   // document.getElementById("radiomain8").checked=false;   
   // document.getElementById("radiomain9").checked=false;   
   // document.getElementById("radiomain10").checked=false;   
   // document.getElementById("radiomain11").checked=false;   
   // document.getElementById("radiomain12").checked=false;   
   // document.getElementById("radiomain13").checked=false;   
   // document.getElementById("radiomain14").checked=false;   
   // document.getElementById("radiomain15").checked=false;   

   // document.getElementById("radioimprov4").checked=false;   
   // document.getElementById("radioimprov5").checked=false;   
   // document.getElementById("radioimprov6").checked=false;   
   // document.getElementById("radioimprov7").checked=false;   
   // document.getElementById("radioimprov8").checked=false;   
   // document.getElementById("radioimprov9").checked=false;   
   // document.getElementById("radioimprov10").checked=false;   
   // document.getElementById("radioimprov11").checked=false;   
   // document.getElementById("radioimprov12").checked=false;   
   // document.getElementById("radioimprov13").checked=false;   
   // document.getElementById("radioimprov14").checked=false;   
   // document.getElementById("radioimprov15").checked=false;   

   // document.getElementById("radioint4").checked=false;   
   // document.getElementById("radioint5").checked=false;   
   // document.getElementById("radioint6").checked=false;   
   // document.getElementById("radioint7").checked=false;   
   // document.getElementById("radioint8").checked=false;   
   // document.getElementById("radioint9").checked=false;   
   // document.getElementById("radioint10").checked=false;   
   // document.getElementById("radioint11").checked=false;   
   // document.getElementById("radioint12").checked=false;   
   // document.getElementById("radioint13").checked=false;   
   // document.getElementById("radioint14").checked=false;   
   // document.getElementById("radioint15").checked=false;   

   // document.getElementById("radiotrans4").checked=false;   
   // document.getElementById("radiotrans5").checked=false;   
   // document.getElementById("radiotrans6").checked=false;   
   // document.getElementById("radiotrans7").checked=false;   
   // document.getElementById("radiotrans8").checked=false;   
   // document.getElementById("radiotrans9").checked=false;   
   // document.getElementById("radiotrans10").checked=false;   
   // document.getElementById("radiotrans11").checked=false;   
   // document.getElementById("radiotrans12").checked=false;   
   // document.getElementById("radiotrans13").checked=false;   
   // document.getElementById("radiotrans14").checked=false;   
   // document.getElementById("radiotrans15").checked=false;   

   // document.getElementById("radiokerja4").checked=false;   
   // document.getElementById("radiokerja5").checked=false;   
   // document.getElementById("radiokerja6").checked=false;   
   // document.getElementById("radiokerja7").checked=false;   
   // document.getElementById("radiokerja8").checked=false;   
   // document.getElementById("radiokerja9").checked=false;   
   // document.getElementById("radiokerja10").checked=false;   
   // document.getElementById("radiokerja11").checked=false;   
   // document.getElementById("radiokerja12").checked=false;   
   // document.getElementById("radiokerja13").checked=false;   
   // document.getElementById("radiokerja14").checked=false;   
   // document.getElementById("radiokerja15").checked=false;   

   // document.getElementById("radiokreativ4").checked=false;   
   // document.getElementById("radiokreativ5").checked=false;   
   // document.getElementById("radiokreativ6").checked=false;   
   // document.getElementById("radiokreativ7").checked=false;   
   // document.getElementById("radiokreativ8").checked=false;   
   // document.getElementById("radiokreativ9").checked=false;   
   // document.getElementById("radiokreativ10").checked=false;   
   // document.getElementById("radiokreativ11").checked=false;   
   // document.getElementById("radiokreativ12").checked=false;   
   // document.getElementById("radiokreativ13").checked=false;   
   // document.getElementById("radiokreativ14").checked=false;   
   // document.getElementById("radiokreativ15").checked=false;   

   // document.getElementById("radiosemangat4").checked=false;   
   // document.getElementById("radiosemangat5").checked=false;   
   // document.getElementById("radiosemangat6").checked=false;   
   // document.getElementById("radiosemangat7").checked=false;   
   // document.getElementById("radiosemangat8").checked=false;   
   // document.getElementById("radiosemangat9").checked=false;   
   // document.getElementById("radiosemangat10").checked=false;   
   // document.getElementById("radiosemangat11").checked=false;   
   // document.getElementById("radiosemangat12").checked=false;   
   // document.getElementById("radiosemangat13").checked=false;   
   // document.getElementById("radiosemangat14").checked=false;   
   // document.getElementById("radiosemangat15").checked=false;   

   // document.getElementById("radiosemp4").checked=false;   
   // document.getElementById("radiosemp5").checked=false;   
   // document.getElementById("radiosemp6").checked=false;   
   // document.getElementById("radiosemp7").checked=false;   
   // document.getElementById("radiosemp8").checked=false;   
   // document.getElementById("radiosemp9").checked=false;   
   // document.getElementById("radiosemp10").checked=false;   
   // document.getElementById("radiosemp11").checked=false;   
   // document.getElementById("radiosemp12").checked=false;   
   // document.getElementById("radiosemp13").checked=false;   
   // document.getElementById("radiosemp14").checked=false;   
   // document.getElementById("radiosemp15").checked=false;   

   // document.getElementById("radiodisiplin4").checked=false;   
   // document.getElementById("radiodisiplin5").checked=false;   
   // document.getElementById("radiodisiplin6").checked=false;   
   // document.getElementById("radiodisiplin7").checked=false;   
   // document.getElementById("radiodisiplin8").checked=false;   
   // document.getElementById("radiodisiplin9").checked=false;   
   // document.getElementById("radiodisiplin10").checked=false;   
   // document.getElementById("radiodisiplin11").checked=false;   
   // document.getElementById("radiodisiplin12").checked=false;   
   // document.getElementById("radiodisiplin13").checked=false;   
   // document.getElementById("radiodisiplin14").checked=false;   
   // document.getElementById("radiodisiplin15").checked=false;   

   // document.getElementById("radiopdca4").checked=false;   
   // document.getElementById("radiopdca5").checked=false;   
   // document.getElementById("radiopdca6").checked=false;   
   // document.getElementById("radiopdca7").checked=false;   
   // document.getElementById("radiopdca8").checked=false;   
   // document.getElementById("radiopdca9").checked=false;   
   // document.getElementById("radiopdca10").checked=false;   
   // document.getElementById("radiopdca11").checked=false;   
   // document.getElementById("radiopdca12").checked=false;   
   // document.getElementById("radiopdca13").checked=false;   
   // document.getElementById("radiopdca14").checked=false;   
   // document.getElementById("radiopdca15").checked=false;   

   // document.getElementById("radiomanage4").checked=false;   
   // document.getElementById("radiomanage5").checked=false;   
   // document.getElementById("radiomanage6").checked=false;   
   // document.getElementById("radiomanage7").checked=false;   
   // document.getElementById("radiomanage8").checked=false;   
   // document.getElementById("radiomanage9").checked=false;   
   // document.getElementById("radiomanage10").checked=false;   
   // document.getElementById("radiomanage11").checked=false;   
   // document.getElementById("radiomanage12").checked=false;   
   // document.getElementById("radiomanage13").checked=false;   
   // document.getElementById("radiomanage14").checked=false;   
   // document.getElementById("radiomanage15").checked=false;   

    // $("input:radio").prop('checked', '');   
    $("input:radio").attr("checked", false);

   document.getElementById("kekuatan").value="";
   document.getElementById("kelemahan").value="";
   document.getElementById("tindaklanjut").value="";
   document.getElementById("jadwal").value=""; 

   document.getElementById("nilsubmain").innerHTML="0";   
   document.getElementById("nilsubimprov").innerHTML="0";   
   document.getElementById("nilbobotkra").innerHTML="0";   
   document.getElementById("totalnilkra").innerHTML="0";   
   document.getElementById("subint").innerHTML="0";   
   document.getElementById("subtrans").innerHTML="0";   
   document.getElementById("subkerja").innerHTML="0";   
   document.getElementById("subkreativ").innerHTML="0";   
   document.getElementById("subsemangat").innerHTML="0";   
   document.getElementById("subsempurna").innerHTML="0";   
   document.getElementById("nilbobotinti").innerHTML="0";   
   document.getElementById("nilbobotdisiplin").innerHTML="0";   
   document.getElementById("nilbobotpdca").innerHTML="0";   
   document.getElementById("nilbobotmanagement").innerHTML="0";   
   document.getElementById("nilbobotkba").innerHTML="0";   
   document.getElementById("totnilkba").innerHTML="0";   
   document.getElementById("totkrakba").innerHTML="0";   
   document.getElementById("kra").innerHTML="0";   
   document.getElementById("kba").innerHTML="0";   
   document.getElementById("hasil").value="";   

}

function simpanpms(){
  var maintening=$("input[name='maintening']:checked").val();
  var improvment=$("input[name='improvment']:checked").val();
  var integritas=$("input[name='integritas']:checked").val();
  var transparansi=$("input[name='transparansi']:checked").val();
  var kerjasama=$("input[name='kerjasama']:checked").val();
  var kreativitas=$("input[name='kreativitas']:checked").val();
  var semangat=$("input[name='semangat']:checked").val();
  var sempurna=$("input[name='sempurna']:checked").val();
  var disiplin=$("input[name='disiplin']:checked").val();
  var pdca=$("input[name='pdca']:checked").val();
  var manage=$("input[name='manage']:checked").val();

  xajax_simpanpms(
      document.getElementById("nama").value,    
      document.getElementById("periode").value,   
      document.getElementById("tahun").value,   
      maintening,  
      document.getElementById("bobsubmain").innerHTML,  
      document.getElementById("nilsubmain").innerHTML,  
      document.getElementById("totalnilkra").innerHTML, 
      improvment,  
      document.getElementById("bobsubimprov").innerHTML,
      document.getElementById("nilsubimprov").innerHTML,
      document.getElementById("nilbobotkra").innerHTML,
      document.getElementById("bobotinti").innerHTML,
      document.getElementById("nilbobotinti").innerHTML,
      document.getElementById("totnilkba").innerHTML,
      integritas,  
      document.getElementById("subint").innerHTML,
      transparansi,  
      document.getElementById("subtrans").innerHTML,
      kerjasama, 
      document.getElementById("subkerja").innerHTML,
      kreativitas, 
      document.getElementById("subkreativ").innerHTML,
      semangat,  
      document.getElementById("subsemangat").innerHTML,
      sempurna,  
      document.getElementById("subsempurna").innerHTML,
      disiplin,  
      document.getElementById("bobotdisiplin").innerHTML,
      document.getElementById("nilbobotdisiplin").innerHTML,
      pdca,    
      document.getElementById("bobotpdca").innerHTML,
      document.getElementById("nilbobotpdca").innerHTML,
      manage,    
      document.getElementById("bobotmanagement").innerHTML,
      document.getElementById("nilbobotmanagement").innerHTML,
      document.getElementById("nilbobotkba").innerHTML,
      document.getElementById("hasil").value,
      document.getElementById("totkrakba").innerHTML,
      document.getElementById("kra").innerHTML,
      document.getElementById("kba").innerHTML,
      document.getElementById("kekuatan").value,
      document.getElementById("kelemahan").value,
      document.getElementById("tindaklanjut").value,
      document.getElementById("jadwal").value);
  kosong();
}


// function simpanpms(){

//     // var maintening = document.getElementsByName("maintening");
//     // for (i = 0; i < maintening.length; i++) {
//     //   if (maintening[i].checked){
//     //     maintening=maintening[i].value; 
//     //   }
//     // }     
     
//   var maintening=document.getElementsByName("maintening");
//   var improvment=document.getElementsByName("improvment");
//   var integritas=document.getElementsByName("integritas");
//   var transparansi=document.getElementsByName("transparansi");
//   var kerjasama=document.getElementsByName("kerjasama");
//   var kreativitas=document.getElementsByName("kreativitas");
//   var semangat=document.getElementsByName("semangat");
//   var sempurna=document.getElementsByName("sempurna");
//   var disiplin=document.getElementsByName("disiplin");
//   var pdca=document.getElementsByName("pdca");
//   var manage=document.getElementsByName("manage");

//   xajax_simpanpms(
//       document.getElementById("nama").value,    
//       document.getElementById("periode").value,   
//       document.getElementById("tahun").value,   
//       maintening,  
//       document.getElementById("bobsubmain").innerHTML,  
//       document.getElementById("nilsubmain").innerHTML,  
//       document.getElementById("totalnilkra").innerHTML, 
//       improvment,  
//       document.getElementById("bobsubimprov").innerHTML,
//       document.getElementById("nilsubimprov").innerHTML,
//       document.getElementById("nilbobotkra").innerHTML,
//       document.getElementById("bobotinti").innerHTML,
//       document.getElementById("nilbobotinti").innerHTML,
//       document.getElementById("totnilkba").innerHTML,
//       integritas,  
//       document.getElementById("subint").innerHTML,
//       transparansi,  
//       document.getElementById("subtrans").innerHTML,
//       kerjasama, 
//       document.getElementById("subkerja").innerHTML,
//       kreativitas, 
//       document.getElementById("subkreativ").innerHTML,
//       semangat,  
//       document.getElementById("subsemangat").innerHTML,
//       sempurna,  
//       document.getElementById("subsempurna").innerHTML,
//       disiplin,  
//       document.getElementById("bobotdisiplin").innerHTML,
//       document.getElementById("nilbobotdisiplin").innerHTML,
//       pdca,    
//       document.getElementById("bobotpdca").innerHTML,
//       document.getElementById("nilbobotpdca").innerHTML,
//       manage,    
//       document.getElementById("bobotmanagement").innerHTML,
//       document.getElementById("nilbobotmanagement").innerHTML,
//       document.getElementById("nilbobotkba").innerHTML,
//       document.getElementById("hasil").value,
//       document.getElementById("totkrakba").innerHTML,
//       document.getElementById("kra").innerHTML,
//       document.getElementById("kba").innerHTML,
//       document.getElementById("kekuatan").value,
//       document.getElementById("kelemahan").value,
//       document.getElementById("tindaklanjut").value,
//       document.getElementById("jadwal").value);

//   // xajax_simpanpms(
//   //     document.getElementById("nama").value,    
//   //     document.getElementById("periode").value,   
//   //     document.getElementById("tahun").value,   
//   //     $("input[name='maintening']:checked").val(),  
//   //     document.getElementById("bobsubmain").innerHTML,  
//   //     document.getElementById("nilsubmain").innerHTML,  
//   //     document.getElementById("totalnilkra").innerHTML, 
//   //     $("input[name='improvment']:checked").val(),  
//   //     document.getElementById("bobsubimprov").innerHTML,
//   //     document.getElementById("nilsubimprov").innerHTML,
//   //     document.getElementById("nilbobotkra").innerHTML,
//   //     document.getElementById("bobotinti").innerHTML,
//   //     document.getElementById("nilbobotinti").innerHTML,
//   //     document.getElementById("totnilkba").innerHTML,
//   //     $("input[name='integritas']:checked").val(),  
//   //     document.getElementById("subint").innerHTML,
//   //     $("input[name='transparansi']:checked").val(),  
//   //     document.getElementById("subtrans").innerHTML,
//   //     $("input[name='kerjasama']:checked").val(), 
//   //     document.getElementById("subkerja").innerHTML,
//   //     $("input[name='kreativitas']:checked").val(), 
//   //     document.getElementById("subkreativ").innerHTML,
//   //     $("input[name='semangat']:checked").val(),  
//   //     document.getElementById("subsemangat").innerHTML,
//   //     $("input[name='sempurna']:checked").val(),  
//   //     document.getElementById("subsempurna").innerHTML,
//   //     $("input[name='disiplin']:checked").val(),  
//   //     document.getElementById("bobotdisiplin").innerHTML,
//   //     document.getElementById("nilbobotdisiplin").innerHTML,
//   //     $("input[name='pdca']:checked").val(),    
//   //     document.getElementById("bobotpdca").innerHTML,
//   //     document.getElementById("nilbobotpdca").innerHTML,
//   //     $("input[name='manage']:checked").val(),    
//   //     document.getElementById("bobotmanagement").innerHTML,
//   //     document.getElementById("nilbobotmanagement").innerHTML,
//   //     document.getElementById("nilbobotkba").innerHTML,
//   //     document.getElementById("hasil").value,
//   //     document.getElementById("totkrakba").innerHTML,
//   //     document.getElementById("kra").innerHTML,
//   //     document.getElementById("kba").innerHTML,
//   //     document.getElementById("kekuatan").value,
//   //     document.getElementById("kelemahan").value,
//   //     document.getElementById("tindaklanjut").value,
//   //     document.getElementById("jadwal").value);
// }

function carioutstdkompetensi(){
  xajax_carioutstdkompetensi(document.getElementById("kojab").value);
}
function caripegawai(){
  xajax_caripegawai(document.getElementById("nama").value);
}
function carikra(){
  xajax_carikra(document.getElementById("nama").value,document.getElementById("periode").value,document.getElementById("tahun").value,document.getElementById("kra").innerHTML,document.getElementById("kba").innerHTML,document.getElementById("bobsubmain").innerHTML,document.getElementById("nilbobotkba").innerHTML);
}


</script>

