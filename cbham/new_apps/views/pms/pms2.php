<?php echo @$err; ?>
<div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    
      <div class="row-fluid">
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
      </div>
  
<!--       <div class="row-fluid">
        <div class="span12"> -->

<table border="1" width="100%" align="center">
  <tr>
    <td bgcolor="#9900CC" colspan="20"><font color="#FFFFFF"><b>PENILAIAN UNTUK KEY RESULT AREA</b></font></td>
  </tr>
  <tr>
    <td align="center" style="width:10%" rowspan="3"><b>KRA</b></td>
    <td align="center" rowspan="3"><input class="span16 s-wrap" type="text" id="kra" name="kra" value="60" readonly/></td>
    <!-- <td align="center" style="width:2%" rowspan="3"><input id="kra" name="kra" size="1" type="text" value="60" disabled="T" style="color:#000000"/></td> -->
    <td align="center" style="width:10%" rowspan="3">Penjelasan 4 pada nilai KRA</td>       
    <td bgcolor="#CC6600" align="center" colspan="12"><font color="#FFFFFF"><b>SKALA KONVERSI NILAI KRA</b></td>
    <td align="center" rowspan="3">Penjelasan 15<br> pada nilai KRA</td>    
    <td align="center" style="width:10%" rowspan="3">Bobot Sub Aspek</td>       
    <td align="center" rowspan="3"></td>           
    <!-- <td rowspan="3"><input class="span8 s-wrap" size="1" type="text" value="" disabled="T"/></td> -->
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
    <td align="center" style="width:10%" rowspan="2">5% di rata-rata pencapaian</td>   
    <td style="width:6%"><input type="radio" id="radiomain4" name="maintening" value="4" onclick="cekradiomain4(this.value)"/>  
    <td style="width:6%"><input type="radio" id="radiomain5" name="maintening" value="5" onclick="cekradiomain5(this.value)"/> 
    <td style="width:6%"><input type="radio" id="radiomain6" name="maintening" value="6" onclick="cekradiomain6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomain7" name="maintening" value="7" onclick="cekradiomain7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomain8" name="maintening" value="8" onclick="cekradiomain8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomain9" name="maintening" value="9" onclick="cekradiomain9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomain10" name="maintening" value="10" onclick="cekradiomain10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomain11" name="maintening" value="11" onclick="cekradiomain11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomain12" name="maintening" value="12" onclick="cekradiomain12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomain13" name="maintening" value="13" onclick="cekradiomain13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomain14" name="maintening" value="14" onclick="cekradiomain14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomain15" name="maintening" value="15" onclick="cekradiomain15(this.value)"/>
    <td align="center" style="width:10%" rowspan="2">>=150% dari rata-rata</td>         
    <td align="center"><input class="span12 s-wrap" id="bobsubmain" name="bobsubmain" size="1" type="text" value="100" disabled="T" style="color:#000000"/></td> 
    <!-- <td align="center" style="width:2%"></td>                  -->
    <td><input class="span3 s-wrap" size="1" type="text" value="" disabled="T"/></td>
    <td align="center" style="width:2%"><input id="nilsubmain" name="nilsubmain" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>               
    <td align="center" style="width:2%" rowspan="2"><input id="totalnilkra" name="totalnilkra" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>             
  </tr>
  <tr>
    <td><b>2. IMPROVEMENT JOB</b></td>
    <td></td>
    <td style="width:6%"><input type="radio" id="radioimprov4" name="improvment" value="4" onclick="cekradioimprov4(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov5" name="improvment" value="5" onclick="cekradioimprov5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov6" name="improvment" value="6" onclick="cekradioimprov6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov7" name="improvment" value="7" onclick="cekradioimprov7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov8" name="improvment" value="8" onclick="cekradioimprov8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov9" name="improvment" value="9" onclick="cekradioimprov9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov10" name="improvment" value="10" onclick="cekradioimprov10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov11" name="improvment" value="11" onclick="cekradioimprov11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov12" name="improvment" value="12" onclick="cekradioimprov12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov13" name="improvment" value="13" onclick="cekradioimprov13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov14" name="improvment" value="14" onclick="cekradioimprov14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioimprov15" name="improvment" value="15" onclick="cekradioimprov15(this.value)"/>
    <td align="center" ><input class="span8 s-wrap" id="bobsubimprov" name="bobsubimprov" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>   
    <!-- <td align="center" style="width:2%"></td> -->
    <td><input class="span3 s-wrap" size="1" type="text" value="" disabled="T"/></td>
    <td align="center" style="width:2%"><input id="nilsubimprov" name="nilsubimprov" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                         
  </tr>
  <tr>
    <td colspan="17"></td>
    <!-- <td align="center" style="width:2%"></td> -->
    <td><input class="span3 s-wrap" size="1" type="text" value="" disabled="T"/></td>
    <td align="center" style="width:2%"><input id="nilbobotkra" name="nilbobotkra" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td> 
    <td style="width:2%"></td>
  </tr>
  <tr>
    <td bgcolor="#9900CC" colspan="20"><font color="#FFFFFF"><b>PENILAIAN UNTUK KEY BEHAVIOR AREA</b></font></td>
    <td align="center" style="width:10%"><b>KELEMAHAN</b></td>                                    
  </tr> 
  <tr>
    <td align="center" style="width:10%" rowspan="3"><b>KBA</b></td>
    <td align="center" style="width:2%" rowspan="3"><input class="span16 s-wrap" type="text" placeholder=".span1" id="kba" name="kba" value="40" disabled="T" style="color:#000000"/></td>    
    <!-- <td align="center" style="width:2%" rowspan="3"><font color="#FF0000"><input id="kba" name="kba" size="1" type="text" value="40" disabled="T" style="color:#000000"/></font></td> -->
    <td align="center" style="width:10%" rowspan="3">Penjelasan 4 pada nilai KBA</td>       
    <td bgcolor="#CC6600" align="center" colspan="12"><font color="#FFFFFF"><b>SKALA KONVERSI NILAI KRA</b></td>
    <td align="center" style="width:10%" rowspan="3">Penjelasan 15 pada nilai KBA</td>    
    <td align="center" style="width:10%" rowspan="3">Bobot Sub Aspek</td>       
<!--     <td style="width:2%" rowspan="3"></td>     -->
    <td rowspan="3"><input class="span3 s-wrap" size="1" type="text" value="" disabled="T"/></td>
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
    <!-- <td align="center"><input class="span2 s-wrap" type="text" id="kra" name="kra" value="60" readonly/></td> -->
    <td align="center"><input class="span12 s-wrap" id="bobotinti" name="bobotinti" type="text" value="25" disabled="T" style="color:#000000"/></td>    
    <td><input class="span3 s-wrap" size="1" type="text" value="" disabled="T"/></td>
    <td align="center" style="width:2%" rowspan="7"><input id="nilbobotinti" name="nilbobotinti" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>       
    <td align="center" style="width:2%" rowspan="8"><input id="totnilkba" name="totnilkba" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>           
  </tr> 
  <tr>
    <td><b>--INTEGRITAS</b></td>
<!--    <td rowspan="6"></td>-->
    <td><input type="button" id="ketintegritas" value="?" tabindex="8" /></td>    
    <td rowspan="6"></td>       
    <td style="width:6%"><input type="radio" id="radioint4" name="integritas" value="4" onclick="cekradioint4(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint5" name="integritas" value="5" onclick="cekradioint5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint6" name="integritas" value="6" onclick="cekradioint6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint7" name="integritas" value="7" onclick="cekradioint7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint8" name="integritas" value="8" onclick="cekradioint8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint9" name="integritas" value="9" onclick="cekradioint9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint10" name="integritas" value="10" onclick="cekradioint10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint11" name="integritas" value="11" onclick="cekradioint11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint12" name="integritas" value="12" onclick="cekradioint12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint13" name="integritas" value="13" onclick="cekradioint13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint14" name="integritas" value="14" onclick="cekradioint14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radioint15" name="integritas" value="15" onclick="cekradioint15(this.value)"/>
    <td rowspan="6"></td>   
    <td rowspan="6"></td>       
    <td align="center"><input class="span3 s-wrap" id="subint" name="subint" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                   
  </tr> 
  <tr>
    <td><b>--TRANSPARANSI</b></td>
    <td><input type="button" id="kettransparan" value="?" tabindex="8" /></td>    
    <td style="width:6%"><input type="radio" id="radiotrans4" name="transparansi" value="4" onclick="cekradiotrans4(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans5" name="transparansi" value="5" onclick="cekradiotrans5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans6" name="transparansi" value="6" onclick="cekradiotrans6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans7" name="transparansi" value="7" onclick="cekradiotrans7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans8" name="transparansi" value="8" onclick="cekradiotrans8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans9" name="transparansi" value="9" onclick="cekradiotrans9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans10" name="transparansi" value="10" onclick="cekradiotrans10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans11" name="transparansi" value="11" onclick="cekradiotrans11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans12" name="transparansi" value="12" onclick="cekradiotrans12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans13" name="transparansi" value="13" onclick="cekradiotrans13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans14" name="transparansi" value="14" onclick="cekradiotrans14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiotrans15" name="transparansi" value="15" onclick="cekradiotrans15(this.value)"/>
    <td align="center"><input class="span3 s-wrap" id="subtrans" name="subtrans" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                   
    <td align="center" style="width:10%"><b>TINDAK LANJUT</b></td>                                  
  </tr> 
  <tr>
    <td><b>--KERJASAMA TEAM</b></td>
    <td><input type="button" id="ketkerjasama" value="?" tabindex="8" /></td>   
    <td style="width:6%"><input type="radio" id="radiokerja4" name="kerjasama" value="4" onclick="cekradiokerja4(this.value)"/> 
    <td style="width:6%"><input type="radio" id="radiokerja5" name="kerjasama" value="5" onclick="cekradiokerja5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja6" name="kerjasama" value="6" onclick="cekradiokerja6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja7" name="kerjasama" value="7" onclick="cekradiokerja7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja8" name="kerjasama" value="8" onclick="cekradiokerja8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja9" name="kerjasama" value="9" onclick="cekradiokerja9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja10" name="kerjasama" value="10" onclick="cekradiokerja10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja11" name="kerjasama" value="11" onclick="cekradiokerja11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja12" name="kerjasama" value="12" onclick="cekradiokerja12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja13" name="kerjasama" value="13" onclick="cekradiokerja13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja14" name="kerjasama" value="14" onclick="cekradiokerja14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokerja15" name="kerjasama" value="15" onclick="cekradiokerja15(this.value)"/>
    <td align="center"><input class="span3 s-wrap" id="subkerja" name="subkerja" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                       
    <td align="center" style="width:10%" rowspan="5"><textarea id="tindaklanjut" name="tindaklanjut" cols="12" rows="7"></textarea></td>                    
  </tr> 
  <tr>
    <td><b>--KREATIVITAS</b></td>
    <td><input type="button" id="ketkreatif" value="?" tabindex="8" /></td>   
    <td style="width:6%"><input type="radio" id="radiokreativ4" name="kreativitas" value="4" onclick="cekradiokreativ4(this.value)"/> 
    <td style="width:6%"><input type="radio" id="radiokreativ5" name="kreativitas" value="5" onclick="cekradiokreativ5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ6" name="kreativitas" value="6" onclick="cekradiokreativ6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ7" name="kreativitas" value="7" onclick="cekradiokreativ7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ8" name="kreativitas" value="8" onclick="cekradiokreativ8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ9" name="kreativitas" value="9" onclick="cekradiokreativ9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ10" name="kreativitas" value="10" onclick="cekradiokreativ10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ11" name="kreativitas" value="11" onclick="cekradiokreativ11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ12" name="kreativitas" value="12" onclick="cekradiokreativ12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ13" name="kreativitas" value="13" onclick="cekradiokreativ13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ14" name="kreativitas" value="14" onclick="cekradiokreativ14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiokreativ15" name="kreativitas" value="15" onclick="cekradiokreativ15(this.value)"/>
    <td align="center"><input class="span3 s-wrap" id="subkreativ" name="subkreativ" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                           
  </tr> 
  <tr>
    <td><b>--SEMANGAT UTK MENANG</b></td>
    <td><input type="button" id="ketsemangat" value="?" tabindex="8" /></td>    
    <td style="width:6%"><input type="radio" id="radiosemangat4" name="semangat" value="4" onclick="cekradiosemangat4(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat5" name="semangat" value="5" onclick="cekradiosemangat5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat6" name="semangat" value="6" onclick="cekradiosemangat6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat7" name="semangat" value="7" onclick="cekradiosemangat7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat8" name="semangat" value="8" onclick="cekradiosemangat8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat9" name="semangat" value="9" onclick="cekradiosemangat9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat10" name="semangat" value="10" onclick="cekradiosemangat10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat11" name="semangat" value="11" onclick="cekradiosemangat11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat12" name="semangat" value="12" onclick="cekradiosemangat12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat13" name="semangat" value="13" onclick="cekradiosemangat13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat14" name="semangat" value="14" onclick="cekradiosemangat14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemangat15" name="semangat" value="15" onclick="cekradiosemangat15(this.value)"/>
    <td align="center"><input class="span3 s-wrap" id="subsemangat" name="subsemangat" size="5" type="text" value="0" disabled="T" style="color:#000000"/></td>                           
  </tr> 
  <tr>
    <td><b>--KESEMPURNAAN</b></td>
    <td><input type="button" id="ketsempurna" value="?" tabindex="8" /></td>    
    <td style="width:6%"><input type="radio" id="radiosemp4" name="sempurna" value="4" onclick="cekradiosemp4(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp5" name="sempurna" value="5" onclick="cekradiosemp5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp6" name="sempurna" value="6" onclick="cekradiosemp6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp7" name="sempurna" value="7" onclick="cekradiosemp7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp8" name="sempurna" value="8" onclick="cekradiosemp8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp9" name="sempurna" value="9" onclick="cekradiosemp9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp10" name="sempurna" value="10" onclick="cekradiosemp10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp11" name="sempurna" value="11" onclick="cekradiosemp11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp12" name="sempurna" value="12" onclick="cekradiosemp12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp13" name="sempurna" value="13" onclick="cekradiosemp13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp14" name="sempurna" value="14" onclick="cekradiosemp14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiosemp15" name="sempurna" value="15" onclick="cekradiosemp15(this.value)"/>
    <td align="center"><input class="span3 s-wrap" id="subsempurna" name="subsempurna" type="text" value="0" disabled="T" style="color:#000000"/></td>                           
  </tr> 
  <tr>
    <td><b>2. DISIPLIN KEHADIRAN</b></td>
    <td></td>
    <td style="width:2%">< 20% Kehadiran</td> 
    <td style="width:6%"><input type="radio" id="radiodisiplin4" name="disiplin" value="4" onclick="cekradiodisiplin4(this.value)"/>  
    <td style="width:6%"><input type="radio" id="radiodisiplin5" name="disiplin" value="5" onclick="cekradiodisiplin5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin6" name="disiplin" value="6" onclick="cekradiodisiplin6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin7" name="disiplin" value="7" onclick="cekradiodisiplin7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin8" name="disiplin" value="8" onclick="cekradiodisiplin8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin9" name="disiplin" value="9" onclick="cekradiodisiplin9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin10" name="disiplin" value="10" onclick="cekradiodisiplin10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin11" name="disiplin" value="11" onclick="cekradiodisiplin11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin12" name="disiplin" value="12" onclick="cekradiodisiplin12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin13" name="disiplin" value="13" onclick="cekradiodisiplin13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin14" name="disiplin" value="14" onclick="cekradiodisiplin14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiodisiplin15" name="disiplin" value="15" onclick="cekradiodisiplin15(this.value)"/>
    <td align="center" style="width:2%">100% hadir tanpa sakit dan ijin</td>    
    <td align="center" style="width:2%"><input class="span16 s-wrap" id="bobotdisiplin" name="bobotdisiplin" size="1" type="text" value="55" disabled="T" style="color:#000000"/></td>
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%"><input id="nilbobotdisiplin" name="nilbobotdisiplin" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>   
  </tr> 
  <tr>
    <td><b>3. PDCA</b></td>
    <td></td>
    <td style="width:2%">Hanya membuat perencanaan dan review</td>  
    <td style="width:6%"><input type="radio" id="radiopdca4" name="pdca" value="4" onclick="cekradiopdca4(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca5" name="pdca" value="5" onclick="cekradiopdca5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca6" name="pdca" value="6" onclick="cekradiopdca6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca7" name="pdca" value="7" onclick="cekradiopdca7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca8" name="pdca" value="8" onclick="cekradiopdca8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca9" name="pdca" value="9" onclick="cekradiopdca9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca10" name="pdca" value="10" onclick="cekradiopdca10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca11" name="pdca" value="11" onclick="cekradiopdca11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca12" name="pdca" value="12" onclick="cekradiopdca12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca13" name="pdca" value="13" onclick="cekradiopdca13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca14" name="pdca" value="14" onclick="cekradiopdca14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiopdca15" name="pdca" value="15" onclick="cekradiopdca15(this.value)"/>
    <td align="center" style="width:2%">Ada perencanaan, review dan penetapan tindak</td>   
    <td align="center" style="width:2%"><input class="span16 s-wrap" id="bobotpdca" name="bobotpdca" size="1" type="text" value="10" disabled="T" style="color:#000000"/></td>
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%"><input id="nilbobotpdca" name="nilbobotpdca" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>   
    <td style="width:2%"></td>        
    <td align="center" style="width:10%"><b>JADWAL</b></td>                                       
  </tr> 
  <tr>
    <td><b>4. MANAGEMENT ORANG</b></td>
    <td></td>
    <td style="width:2%">Hubungan kerja jelek,tidak ada coaching,conseling,train jelek</td> 
    <td style="width:6%"><input type="radio" id="radiomanage4" name="manage" value="4" onclick="cekradiomanage4(this.value)"/> 
    <td style="width:6%"><input type="radio" id="radiomanage5" name="manage" value="5" onclick="cekradiomanage5(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage6" name="manage" value="6" onclick="cekradiomanage6(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage7" name="manage" value="7" onclick="cekradiomanage7(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage8" name="manage" value="8" onclick="cekradiomanage8(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage9" name="manage" value="9" onclick="cekradiomanage9(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage10" name="manage" value="10" onclick="cekradiomanage10(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage11" name="manage" value="11" onclick="cekradiomanage11(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage12" name="manage" value="12" onclick="cekradiomanage12(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage13" name="manage" value="13" onclick="cekradiomanage13(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage14" name="manage" value="14" onclick="cekradiomanage14(this.value)"/>
    <td style="width:6%"><input type="radio" id="radiomanage15" name="manage" value="15" onclick="cekradiomanage15(this.value)"/>
    <td align="center" style="width:2%">Hubungan kerja baik,ada coaching,conseling,kepemimpinan baik</td>   
    <td align="center" ><input class="span16 s-wrap" id="bobotmanagement" name="bobotmanagement" size="1" type="text" value="10" disabled="T" style="color:#000000"/></td>
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%"><input id="nilbobotmanagement" name="nilbobotmanagement" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>   
    <td style="width:2%"></td>        
    <td style="width:2%" rowspan="4"><textarea id="jadwal" name="jadwal" cols="12" rows="4"></textarea></td>            
  </tr> 
  <tr>
    <td colspan="17"></td>
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%"><input id="nilbobotkba" name="nilbobotkba" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>   
    <td style="width:2%"></td>        
  </tr>   
  <tr>
    <td colspan="18"><input style="text-align:right;" id="hasil" name="hasil" size="220" type="text" value="" readonly style="color:#000000"/></td>
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%"><input id="totkrakba" name="totkrakba" size="1" type="text" value="0" readonly style="color:#000000"/></td>   
  </tr>   

                 <table width="90%" align="center">
         
         <tr>
                 <td  align="left">
           <input type="button"  id="btnsimpan" value="Simpan" onclick="simpankrakba();" tabindex="8" /> 
           <!-- <input type="button"  id="verifyBtn" value="Hapus" onclick="hapuskrakba();" tabindex="8" />  -->
             <!-- <input type="button"  id="verifyBtn" value="Batal" onclick="kosong();" tabindex="8" />  -->
               <input type="button" id="btncetak" value="Cetak" onClick="">
               <!-- <input type="button" id="btncetak" value="Cetak" onClick="location.href='<?=base_url()."index.php/cbham/formcetakkrakba"?>'"> -->
  
                   <input type="button" class="" value="Kembali" onClick="location.href='<?=base_url()."index.php/cbham/kembali2"?>'"></td>                   
<!--           <input type="button" value="Keluar" onClick="location.href='<?=base_url()."index.php/vis/kembali"?>'"></td>-->
                </tr>            

</table>
          
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
    $('#radiomain4').change(function() {
      document.getElementById("nilsubmain").value = (4*Number(document.getElementById("bobsubmain").value))/100;        
      document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100);         
      document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100;         
      document.getElementById("totkrakba").value = (((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);   
      document.getElementById("totkrakba").value =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
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
      document.getElementById("nilsubmain").value = (5*Number(document.getElementById("bobsubmain").value))/100;        
      document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100);         
      document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100;         
      document.getElementById("totkrakba").value = (((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);   
      document.getElementById("totkrakba").value =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
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
      document.getElementById("nilsubmain").value = (6*Number(document.getElementById("bobsubmain").value))/100;        
      document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100);         
      document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100;         
      document.getElementById("totkrakba").value = (((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);   
      document.getElementById("totkrakba").value =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
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
    
    $('#radioimprov4').change(function() {
      document.getElementById("nilsubimprov").value = (4*Number(document.getElementById("bobsubimprov").value))/100;        
      document.getElementById("nilbobotkra").value = ((Number(document.getElementById("nilsubmain").value)+Number(document.getElementById("nilsubimprov").value)))*(100/100);         
      document.getElementById("totalnilkra").value = ((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100;         
      document.getElementById("totkrakba").value = (((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);         
      var jumlah=(((Number(document.getElementById("nilbobotkba").value)*Number(document.getElementById("kba").value)))/100)+(((Number(document.getElementById("nilbobotkra").value)*Number(document.getElementById("kra").value)))/100);   
      document.getElementById("totkrakba").value =jumlah;
      if (jumlah <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (jumlah > 6.99){
            if (jumlah <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (jumlah > 9.99){
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

// function simpanstdmanagerial(){
//   xajax_simpanstdmanagerial(document.getElementById("kojab").value,
//                         document.getElementById("jabatan").value,
//                         document.getElementById("dev").value,
//                         document.getElementById("dir").value,
//                         document.getElementById("tw").value,
//                         document.getElementById("tl").value,
//                         document.getElementById("ps").value,
//                         document.getElementById("po").value,
//                         document.getElementById("so").value,
//                         document.getElementById("at").value,
//                         document.getElementById("ct").value,
//                         document.getElementById("int").value,
//                         document.getElementById("iu").value,
//                         document.getElementById("rb").value,
//                         document.getElementById("imp").value,
//                         document.getElementById("ing").value,
//                         document.getElementById("trp").value,
//                         document.getElementById("tew").value,
//                         document.getElementById("crt").value,
//                         document.getElementById("wis").value,
//                         document.getElementById("exc").value,
//                         document.getElementById("ach").value,
//                         document.getElementById("co").value,
//                         document.getElementById("is").value,
//                         document.getElementById("cso").value );

// }
function carioutstdkompetensi(){
  xajax_carioutstdkompetensi(document.getElementById("kojab").value);
}
// function carireportstdmanagerial(){
//   xajax_carireportstdmanagerial(document.getElementById("kojab1").value);
// }
</script>

