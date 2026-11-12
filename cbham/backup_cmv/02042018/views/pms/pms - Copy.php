<?php echo @$err; ?>
<div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    
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

      <div class="row-fluid">
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
<!--                           <option value='3'>Semester III</option>
                          <option value='4'>Semester IV</option> -->
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
      </div>
  
      <div class="row-fluid">
        <div class="span12">

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
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain4" name="maintening" value="4"/></label></div></td>
    <!-- <td><div class="controls"><input type="radio" id="radiomain4" name="maintening" value="4"/></div></td> -->
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain5" name="maintening" value="5"/></label></div></td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain6" name="maintening" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain7" name="maintening" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain8" name="maintening" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain9" name="maintening" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain10" name="maintening" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain11" name="maintening" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain12" name="maintening" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain13" name="maintening" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain14" name="maintening" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain15" name="maintening" value="15"/></label></div></td>
    <td align="center" style="width:10%" rowspan="2">>=150% dari rata-rata</td>         
    <td align="center" style="width:2%" id="bobsubmain" name="bobsubmain">100</td> 
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
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov4" name="improvment" value="4"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov5" name="improvment" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov6" name="improvment" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov7" name="improvment" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov8" name="improvment" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov9" name="improvment" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov10" name="improvment" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov11" name="improvment" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov12" name="improvment" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov13" name="improvment" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov14" name="improvment" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioimprov15" name="improvment" value="15"/></label></div></td>
    <td align="center" style="width:2%" id="bobsubimprov" name="bobsubimprov">0</td>   
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
    <td><b>1. NILAI INTI</b></td>
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
    <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Kejujuran,Mengetahui harapan Pelanggan & memenuhinya dengan tepat waktu,Memenuhi janji kepada 'Stake Holder' " data-original-title="Integritas">?</button></td>
    <!-- <td><input type="button" id="ketintegritas" value="?" tabindex="8" /></td>     -->
    <td rowspan="6"></td>       
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint4" name="integritas" value="4"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint5" name="integritas" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint6" name="integritas" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint7" name="integritas" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint8" name="integritas" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint9" name="integritas" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint10" name="integritas" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint11" name="integritas" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint12" name="integritas" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint13" name="integritas" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint14" name="integritas" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radioint15" name="integritas" value="15"/></label></div></td>
    <td rowspan="6"></td>   
    <td rowspan="6"></td>       
    <td align="center" style="width:2%" id="subint" name="subint">0</td>                   
    <!-- <td align="center" style="width:2%"><input id="subint" name="subint" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                    -->
  </tr> 
  <tr>
    <td><b>-TRANSPARANSI</b></td>
    <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Komunikasi secara terbuka,Saling memberikan informasi,Manajemen yang partisipatif,Memecahkan masalah secara bersama" data-original-title="Transparansi">?</button></td>    
    <!-- <td><input type="button" id="kettransparan" value="?" tabindex="8" /></td>     -->
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans4" name="transparansi" value="4"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans5" name="transparansi" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans6" name="transparansi" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans7" name="transparansi" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans8" name="transparansi" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans9" name="transparansi" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans10" name="transparansi" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans11" name="transparansi" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans12" name="transparansi" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans13" name="transparansi" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans14" name="transparansi" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans15" name="transparansi" value="15"/></label></div></td>
    <td align="center" style="width:2%" id="subtrans" name="subtrans">0</td>                   
    <!-- <td align="center" style="width:2%"><input id="subtrans" name="subtrans" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                    -->
    <td align="center" style="width:10%"><b>TINDAK LANJUT</b></td>                                  
  </tr> 
  <tr>
    <td><b>-KERJASAMA TEAM</b></td>
    <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Bekerja-sama menuju sukses,Percaya satu dengan yang lain,Menghargai pendapat orang lain,Mencari solusi yang 'Win-Win' " data-original-title="Kerjasama Team">?</button></td>        
    <!-- <td><input type="button" id="ketkerjasama" value="?" tabindex="8" /></td>    -->
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja4" name="kerjasama" value="4"/></label></div></td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja5" name="kerjasama" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja6" name="kerjasama" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja7" name="kerjasama" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja8" name="kerjasama" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja9" name="kerjasama" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja10" name="kerjasama" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja11" name="kerjasama" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja12" name="kerjasama" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja13" name="kerjasama" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja14" name="kerjasama" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja15" name="kerjasama" value="15"/></label></div></td>
    <td align="center" style="width:2%" id="subkerja" name="subkerja">0</td>                       
    <!-- <td align="center" style="width:2%"><input id="subkerja" name="subkerja" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                        -->
    <td align="center" style="width:10%" rowspan="5"><textarea id="tindaklanjut" name="tindaklanjut" cols="12" rows="7"></textarea></td>                    
  </tr> 
  <tr>
    <td><b>-KREATIVITAS</b></td>
    <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Melakukan komparasi/Benchmark exsternal,Mendorong terciptanya ide-ide baru,Selalu mencari cara yang lebih baik" data-original-title="Kreatifitas">?</button></td>            
    <!-- <td><input type="button" id="ketkreatif" value="?" tabindex="8" /></td>    -->
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ4" name="kreativitas" value="4"/></label></div></td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ5" name="kreativitas" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ6" name="kreativitas" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ7" name="kreativitas" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ8" name="kreativitas" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ9" name="kreativitas" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ10" name="kreativitas" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ11" name="kreativitas" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ12" name="kreativitas" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ13" name="kreativitas" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ14" name="kreativitas" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ15" name="kreativitas" value="15"/></label></div></td>
    <td align="center" style="width:2%" id="subkreativ" name="subkreativ">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subkreativ" name="subkreativ" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  <tr>
    <td><b>-SEMANGAT UTK MENANG</b></td>
    <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Bersikap selalu proaktif,Semangat Pantang Menyerah,Proses membentuk budaya belajar,Komitmen total untuk mencapai hasil yang diharapkan" data-original-title="Semangat Untuk Menang">?</button></td>                
    <!-- <td><input type="button" id="ketsemangat" value="?" tabindex="8" /></td>     -->
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat4" name="semangat" value="4"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat5" name="semangat" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat6" name="semangat" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat7" name="semangat" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat8" name="semangat" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat9" name="semangat" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat10" name="semangat" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat11" name="semangat" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat12" name="semangat" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat13" name="semangat" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat14" name="semangat" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat15" name="semangat" value="15"/></label></div></td>
    <td align="center" style="width:2%" id="subsemangat" name="subsemangat">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subsemangat" name="subsemangat" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  <tr>
    <td><b>-KESEMPURNAAN</b></td>
    <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Quality : Bekerja yang benar dari awal,Cost : Kompetitif secara global,Deliver : Tepat waktu,Safety : Cara kerja yang aman & sehat lingkungan,Morale : Rasa bangga & semangat tinggi" data-original-title="Kesempurnaan">?</button></td>                   
    <!-- <td><input type="button" id="ketsempurna" value="?" tabindex="8" /></td>     -->
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp4" name="sempurna" value="4"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp5" name="sempurna" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp6" name="sempurna" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp7" name="sempurna" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp8" name="sempurna" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp9" name="sempurna" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp10" name="sempurna" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp11" name="sempurna" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp12" name="sempurna" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp13" name="sempurna" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp14" name="sempurna" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp15" name="sempurna" value="15"/></label></div></td>
    <td align="center" style="width:2%" id="subsempurna" name="subsempurna">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subsempurna" name="subsempurna" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  <tr>
    <td><b>2. DISIPLIN KEHADIRAN</b></td>
    <td></td>
    <td style="width:2%">< 20% Kehadiran</td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin4" name="disiplin" value="4"/></label></div></td>  
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin5" name="disiplin" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin6" name="disiplin" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin7" name="disiplin" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin8" name="disiplin" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin9" name="disiplin" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin10" name="disiplin" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin11" name="disiplin" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin12" name="disiplin" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin13" name="disiplin" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin14" name="disiplin" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin15" name="disiplin" value="15"/></label></div></td>
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
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca4" name="pdca" value="4"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca5" name="pdca" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca6" name="pdca" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca7" name="pdca" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca8" name="pdca" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca9" name="pdca" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca10" name="pdca" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca11" name="pdca" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca12" name="pdca" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca13" name="pdca" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca14" name="pdca" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca15" name="pdca" value="15"/></label></div></td>
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
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage4" name="manage" value="4"/></label></div></td> 
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage5" name="manage" value="5"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage6" name="manage" value="6"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage7" name="manage" value="7"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage8" name="manage" value="8"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage9" name="manage" value="9"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage10" name="manage" value="10"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage11" name="manage" value="11"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage12" name="manage" value="12"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage13" name="manage" value="13"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage14" name="manage" value="14"/></label></div></td>
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage15" name="manage" value="15"/></label></div></td>
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
          
        </div>
      </div>

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

  </div>
</div>

<script type="application/javascript">

function showMyPayroll(){
//must be present because auto suggest will callback this function
}

$(document).ready(function() {

    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 1,
              rtnIDs: true,
            dataFile: '<?=base_url().'index.php/stdknowhow/jabatanList'?>'
    });   
});

$(document).ready(function() {    
//====================maintening job
    $('#radiomain4').change(function() {
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
    });

    $('#radiomain5').change(function() {
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
    });

    $('#radiomain6').change(function() {
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
    });
    
    $('#radiomain7').change(function() {
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
    });

    $('#radiomain7').change(function() {
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
    });

    $('#radiomain8').change(function() {
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
    });

    $('#radiomain9').change(function() {
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
    });

    $('#radiomain10').change(function() {
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
    });

    $('#radiomain11').change(function() {
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
    });    

    $('#radiomain12').change(function() {
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
    });

    $('#radiomain13').change(function() {
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
    });    

    $('#radiomain14').change(function() {
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
    });    

    $('#radiomain15').change(function() {
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
    });

//====================improvment job
    $('#radioimprov4').change(function() {
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
    });

    $('#radioimprov5').change(function() {
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
    });

    $('#radioimprov6').change(function() {
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
    });
    
    $('#radioimprov7').change(function() {
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
    });

    $('#radioimprov7').change(function() {
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
    });

    $('#radioimprov8').change(function() {
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
    });

    $('#radioimprov9').change(function() {
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
    });

    $('#radioimprov10').change(function() {
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
    });

    $('#radioimprov11').change(function() {
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
    });    

    $('#radioimprov12').change(function() {
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
    });

    $('#radioimprov13').change(function() {
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
    });    

    $('#radioimprov14').change(function() {
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
    });    

    $('#radioimprov15').change(function() {
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
    });

//====================integritas
    $('#radioint4').change(function() {
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
    });

    $('#radioint5').change(function() {
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
    });

    $('#radioint6').change(function() {
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
    });
    
    $('#radioint7').change(function() {
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
    });

    $('#radioint8').change(function() {
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
    });

    $('#radioint9').change(function() {
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
    });

    $('#radioint10').change(function() {
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
    });

    $('#radioint11').change(function() {
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
    });    

    $('#radioint12').change(function() {
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
    });

    $('#radioint13').change(function() {
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
    });    

    $('#radioint14').change(function() {
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
    });    

    $('#radioint15').change(function() {
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
    });

//====================transparansi
    $('#radiotrans4').change(function() {
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
    });

    $('#radiotrans5').change(function() {
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
    });

    $('#radiotrans6').change(function() {
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
    });
    
    $('#radiotrans7').change(function() {
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
    });

    $('#radiotrans8').change(function() {
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
    });

    $('#radiotrans9').change(function() {
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
    });

    $('#radiotrans10').change(function() {
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
    });

    $('#radiotrans11').change(function() {
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
    });    

    $('#radiotrans12').change(function() {
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
    });

    $('#radiotrans13').change(function() {
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
    });    

    $('#radiotrans14').change(function() {
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
    });    

    $('#radiotrans15').change(function() {
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
    });

//====================kerjasama team
    $('#radiokerja4').change(function() {
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
    });

    $('#radiokerja5').change(function() {
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
    });

    $('#radiokerja6').change(function() {
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
    });
    
    $('#radiokerja7').change(function() {
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
    });

    $('#radiokerja8').change(function() {
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
    });

    $('#radiokerja9').change(function() {
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
    });

    $('#radiokerja10').change(function() {
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
    });

    $('#radiokerja11').change(function() {
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
    });    

    $('#radiokerja12').change(function() {
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
    });

    $('#radiokerja13').change(function() {
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
    });    

    $('#radiokerja14').change(function() {
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
    });    

    $('#radiokerja15').change(function() {
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
    });

//====================kreativitas
    $('#radiokreativ4').change(function() {
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
    });

    $('#radiokreativ5').change(function() {
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
    });

    $('#radiokreativ6').change(function() {
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
    });
    
    $('#radiokreativ7').change(function() {
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
    });

    $('#radiokreativ8').change(function() {
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
    });

    $('#radiokreativ9').change(function() {
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
    });

    $('#radiokreativ10').change(function() {
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
    });

    $('#radiokreativ11').change(function() {
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
    });    

    $('#radiokreativ12').change(function() {
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
    });

    $('#radiokreativ13').change(function() {
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
    });    

    $('#radiokreativ14').change(function() {
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
    });    

    $('#radiokreativ15').change(function() {
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
    });

//====================semangat
    $('#radiosemangat4').change(function() {
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
    });

    $('#radiosemangat5').change(function() {
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
    });

    $('#radiosemangat6').change(function() {
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
    });
    
    $('#radiosemangat7').change(function() {
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
    });

    $('#radiosemangat8').change(function() {
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
    });

    $('#radiosemangat9').change(function() {
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
    });

    $('#radiosemangat10').change(function() {
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
    });

    $('#radiosemangat11').change(function() {
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
    });    

    $('#radiosemangat12').change(function() {
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
    });

    $('#radiosemangat13').change(function() {
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
    });    

    $('#radiosemangat14').change(function() {
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
    });    

    $('#radiosemangat15').change(function() {
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
    });

//====================sempurna
    $('#radiosemp4').change(function() {
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
    });

    $('#radiosemp5').change(function() {
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
    });

    $('#radiosemp6').change(function() {
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
    });
    
    $('#radiosemp7').change(function() {
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
    });

    $('#radiosemp8').change(function() {
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
    });

    $('#radiosemp9').change(function() {
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
    });

    $('#radiosemp10').change(function() {
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
    });

    $('#radiosemp11').change(function() {
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
    });    

    $('#radiosemp12').change(function() {
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
    });

    $('#radiosemp13').change(function() {
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
    });    

    $('#radiosemp14').change(function() {
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
    });    

    $('#radiosemp15').change(function() {
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
    });  

//====================disiplin
    $('#radiodisiplin4').change(function() {
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
    });

    $('#radiodisiplin5').change(function() {
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
    });

    $('#radiodisiplin6').change(function() {
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
    });
    
    $('#radiodisiplin7').change(function() {
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
    });

    $('#radiodisiplin8').change(function() {
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
    });

    $('#radiodisiplin9').change(function() {
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
    });

    $('#radiodisiplin10').change(function() {
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
    });

    $('#radiodisiplin11').change(function() {
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
    });    

    $('#radiodisiplin12').change(function() {
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
    });

    $('#radiodisiplin13').change(function() {
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
    });    

    $('#radiodisiplin14').change(function() {
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
    });    

    $('#radiodisiplin15').change(function() {
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
    });        

//====================pdca
    $('#radiopdca4').change(function() {
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
    });

    $('#radiopdca5').change(function() {
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
    });

    $('#radiopdca6').change(function() {
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
    });
    
    $('#radiopdca7').change(function() {
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
    });

    $('#radiopdca8').change(function() {
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
    });

    $('#radiopdca9').change(function() {
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
    });

    $('#radiopdca10').change(function() {
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
    });

    $('#radiopdca11').change(function() {
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
    });    

    $('#radiopdca12').change(function() {
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
    });

    $('#radiopdca13').change(function() {
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
    });    

    $('#radiopdca14').change(function() {
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
    });    

    $('#radiopdca15').change(function() {
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
    }); 

//====================manage
    $('#radiomanage4').change(function() {
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
    });

    $('#radiomanage5').change(function() {
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
    });

    $('#radiomanage6').change(function() {
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
    });
    
    $('#radiomanage7').change(function() {
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
    });

    $('#radiomanage8').change(function() {
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
    });

    $('#radiomanage9').change(function() {
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
    });

    $('#radiomanage10').change(function() {
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
    });

    $('#radiomanage11').change(function() {
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
    });    

    $('#radiomanage12').change(function() {
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
    });

    $('#radiomanage13').change(function() {
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
    });    

    $('#radiomanage14').change(function() {
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
    });    

    $('#radiomanage15').change(function() {
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
    }); 

});    

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

    $("input:radio").prop('checked', '');   

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

                  // document.getElementById("nama").value,
                  // document.getElementById("periode").value,
                  // document.getElementById("tahun").value,
                  // maintening,
                  // improvment,                  
                  // integritas,
                  // transparansi,
                  // kerjasama,
                  // kreativitas,
                  // semangat,
                  // sempurna,
                  // disiplin,
                  // pdca,
                  // manage,
                  // document.getElementById("bobsubmain").innerHTML,
                  // document.getElementById("nilsubmain").innerHTML,
                  // document.getElementById("nilsubimprov").innerHTML,
                  // document.getElementById("nilbobotkra").innerHTML,
                  // document.getElementById("totalnilkra").innerHTML,
                  // document.getElementById("subint").innerHTML,
                  // document.getElementById("subtrans").innerHTML,
                  // document.getElementById("subkerja").innerHTML,
                  // document.getElementById("subkreativ").innerHTML,
                  // document.getElementById("subsemangat").innerHTML,
                  // document.getElementById("subsempurna").innerHTML,
                  // document.getElementById("nilbobotinti").innerHTML,
                  // document.getElementById("nilbobotdisiplin").innerHTML,
                  // document.getElementById("nilbobotpdca").innerHTML,
                  // document.getElementById("nilbobotmanagement").innerHTML,
                  // document.getElementById("nilbobotkba").innerHTML,
                  // document.getElementById("totnilkba").innerHTML,
                  // document.getElementById("totkrakba").innerHTML,
                  // document.getElementById("hasil").value,
                  // document.getElementById("kekuatan").value,
                  // document.getElementById("kelemahan").value,
                  // document.getElementById("tindaklanjut").value,
                  // document.getElementById("jadwal").value );
}

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

