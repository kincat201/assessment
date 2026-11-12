<!-- <title>
  Penilaian Kinerja
</title>
<head> -->
  <!-- <script src="<?php echo base_url(); ?>public/assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script> -->

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
    <div class="row-fluid">
        <div class="span12">
          <div class="portlet">
              <div class="form-search fright">
                  <div class="input-prepend">
                      <span class="add-on">Nama</span>
                      <select class="selectpicker" data-live-search="true" data-placeholder="Choose a Category" name="id_pegawai" id='id_pegawai' tabindex="1">
                          <option value=''>Pilih Pegawai</option>
                          <?php foreach ($pegawai as $row) {
                              echo "<option value='".$row->id."'>".$row->nama."</option>";
                          } ?>
                      </select>
                  </div>
                  <div class="input-prepend">
                      <span class="add-on">Periode</span>
                      <select class="selectpicker" data-live-search="true" id='periode'>
                          <option value='1'>Semester I</option>
                          <option value='2'>Semester II</option>
                      </select>
                  </div>
                  <div class="input-prepend">
                      <span class="add-on">Tahun</span>
                      <select class="selectpicker" data-live-search="true" id='tahun'>
                          <?php for ($i=(date('Y')); $i > (date('Y')-20); $i--) { 
                              if(date('Y') == $i){ 
                                  echo "<option value='".$i."' selected>".$i."</option>";
                              } else {
                                  echo "<option value='".$i."'>".$i."</option>";
                              }                              
                          } ?>
                      </select>
                  </div>
                  <br><br>
                  <a class="btn green" style='margin-right: 10px;' id="cari" onClick="caripegawai()"><i class="icon-search"></i> Cari KRA & KBA</a>
                  <a class="btn green" style='margin-right: 10px;' id="cari" onClick="cariHasil()"><i class="icon-search"></i> Cari Hasil</a>
                  <a class="btn blue" style='margin-right: 10px;' id="cari" onClick="hitung()"><i class=""></i> Hitung Hasil</a>
                  <a class="btn purple" id="cetak" onClick="simpanpms()"><i class="icon-save"></i> Simpan Hasil</a>
              </div>
          </div>      
        </div>
      </div>

<div style="overflow-x: auto;">
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
    <td align="center" style="min-width:75px" rowspan="3">Bobot Sub Aspek</td>       
    <td align="center" style="width:10%" rowspan="3">_____</td>           
    <td align="center" style="min-width:100px" rowspan="3">Nilai Bobot Sub Aspek</td>           
    <td align="center" style="min-width:100px" rowspan="3">Total Nilai Bobot</td>               
    <td align="center" style="width:10%"><b>KEKUATAN</b></td>                   
  </tr>
  <tr>
    <td align="center" style="width:5%" colspan="3"><b>Butuh Pengembangan</b></td>
    <td align="center" style="width:5%" colspan="3"><b>Kompeten</b></td>
    <td align="center" style="width:5%" colspan="3"><b>Sangat Efektif</b></td>
    <td align="center" style="width:5%" colspan="3"><b>Sempurna</b></td>            
    <td align="center" style="width:10%" rowspan="4"><textarea id="kekuatan" name="kekuatan" cols="12" rows="5"></textarea></td>
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
    <td align="center" style="width:10%" rowspan="1"><30% di rata-rata pencapaian</td>           
    <td><div class="controls"><label class="radio"><input type="radio" id="radiomain4" name="maintening" value="4" onclick="cekradiomain4(this.value)"/></label></div></td>
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
    <td align="center" style="width:10%" rowspan="1">>=150% dari rata-rata</td>         
    <td align="center" style="width:2%" id="bobsubmain" name="bobsubmain">100</td> 
    <td align="center" style="width:2%"></td>                 
    <td align="center" style="width:2%" id="nilsubmain" name="nilsubmain">0</td>   
    <td align="center" style="width:2%" rowspan="2" id="totalnilkra" name="totalnilkra">0</td>
  </tr>
  <tr id="imprv">
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
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%" id="nilsubimprov" name="nilsubimprov">0</td>                         
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
    <td align="center" style="width:2%" rowspan="6" id="nilbobotinti" name="nilbobotinti">0</td>       
    <!-- <td align="center" style="width:2%" rowspan="7"><input id="nilbobotinti" name="nilbobotinti" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>        -->
    <td align="center" style="width:2%" rowspan="10" id="totnilkba" name="totnilkba">0</td>           
    <!-- <td align="center" style="width:2%" rowspan="8"><input id="totnilkba" name="totnilkba" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>            -->
  </tr> 
  <tr>
    <td><b>-AMANAH</b></td>
<!--    <td rowspan="6"></td>-->
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Kejujuran,Mengetahui harapan Pelanggan & memenuhinya dengan tepat waktu,Memenuhi janji kepada 'Stake Holder' " data-original-title="Integritas">?</button></td> -->
    <td><a href='#modalintegritas'><input type="button" id="ketintegritas" value="?" tabindex="8" /></a></td>    
    <td rowspan="5"></td>
    <?php for($i=4;$i<=15;$i++){ ?>       
      <td><div class="controls"><label class="radio"><input type="radio" id="radioint<?= $i ?>" name="integritas" value="<?= $i ?>" onclick="set_point('int',<?= $i ?>)"/></label></div></td>
    <?php } ?>
    <td rowspan="5"></td>   
    <td rowspan="5"></td>       
    <td align="center" style="width:2%" id="subint" name="subint">0</td>                   
    <!-- <td align="center" style="width:2%"><input id="subint" name="subint" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                    -->
  </tr> 
  <tr>
    <td><b>-KOMPETEN</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Komunikasi secara terbuka,Saling memberikan informasi,Manajemen yang partisipatif,Memecahkan masalah secara bersama" data-original-title="Transparansi">?</button></td>     -->
    <td><a href='#modaltransparan'><input type="button" id="kettransparan" value="?" tabindex="8" /></a></td>
    <?php for($i=4;$i<=15;$i++){ ?>
      <td><div class="controls"><label class="radio"><input type="radio" id="radiotrans<?= $i ?>" name="transparansi" value="<?= $i ?>" onclick="set_point('trans',<?= $i ?>)"/></label></div></td>
    <?php } ?>
    <td align="center" style="width:2%" id="subtrans" name="subtrans">0</td>                   
    <!-- <td align="center" style="width:2%"><input id="subtrans" name="subtrans" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                    -->
    <td align="center" style="width:10%"><b>TINDAK LANJUT</b></td>                                  
  </tr> 
  <tr>
    <td><b>-HARMONIS</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Bekerja-sama menuju sukses,Percaya satu dengan yang lain,Menghargai pendapat orang lain,Mencari solusi yang 'Win-Win' " data-original-title="Kerjasama Team">?</button></td>         -->
    <td><a href='#modalkerjasama'><input type="button" id="ketkerjasama" value="?" tabindex="8" /></a></td>
    <?php for($i=4;$i<=15;$i++){ ?>
      <td><div class="controls"><label class="radio"><input type="radio" id="radiokerja<?= $i ?>" name="kerjasama" value="<?= $i ?>" onclick="set_point('kerja',<?= $i ?>)"/></label></div></td> 
    <?php } ?>
    <td align="center" style="width:2%" id="subkerja" name="subkerja">0</td>                       
    <!-- <td align="center" style="width:2%"><input id="subkerja" name="subkerja" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                        -->
    <td align="center" style="width:10%" rowspan="4"><textarea id="tindaklanjut" name="tindaklanjut" cols="12" rows="7"></textarea></td>                    
  </tr> 
  <tr>
    <td><b>-LOYAL</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Melakukan komparasi/Benchmark exsternal,Mendorong terciptanya ide-ide baru,Selalu mencari cara yang lebih baik" data-original-title="Kreatifitas">?</button></td>             -->
    <td><a href='#modalkreatifitas'><input type="button" id="ketkreatif" value="?" tabindex="8" /></a></td>
    <?php for($i=4;$i<=15;$i++){ ?>
      <td><div class="controls"><label class="radio"><input type="radio" id="radiokreativ<?= $i ?>" name="kreativitas" value="<?= $i ?>" onclick="set_point('kreativ',<?= $i ?>)"/></label></div></td>  
    <?php } ?>   
    <td align="center" style="width:2%" id="subkreativ" name="subkreativ">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subkreativ" name="subkreativ" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  
  
  <tr>
    <td><b>-ADAPTIF</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Bersikap selalu proaktif,Semangat Pantang Menyerah,Proses membentuk budaya belajar,Komitmen total untuk mencapai hasil yang diharapkan" data-original-title="Semangat Untuk Menang">?</button></td>                 -->
    <td><a href='#modalsemangat'><input type="button" id="ketsemangat" value="?" tabindex="8" /></a></td>
    <?php for($i=4;$i<=15;$i++){ ?>
      <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat<?= $i ?>" name="semangat" value="<?= $i ?>" onclick="set_point('semangat',<?= $i ?>)"/></label></div></td> 
    <?php } ?>
    <td align="center" style="width:2%" id="subsemangat" name="subsemangat">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subsemangat" name="subsemangat" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  
  <tr>
    <td><b>-KOLABORATIF</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Bersikap selalu proaktif,Semangat Pantang Menyerah,Proses membentuk budaya belajar,Komitmen total untuk mencapai hasil yang diharapkan" data-original-title="Semangat Untuk Menang">?</button></td>                 -->
    <td><a href='#modalsemangat2'><input type="button" id="ketsemangat2" value="?" tabindex="8" /></a></td>
    <?php for($i=4;$i<=15;$i++){ ?>
      <td><div class="controls"><label class="radio"><input type="radio" id="radiosemangat<?= $i ?>" name="semangat" value="<?= $i ?>" onclick="set_point('semangat',<?= $i ?>)"/></label></div></td> 
    <?php } ?>
    <td align="center" style="width:2%" id="subsemangat" name="subsemangat">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subsemangat" name="subsemangat" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  
  <tr id="smprn">
    <td><b>-KESEMPURNAAN</b></td>
    <!-- <td><button class="btn popovers" data-trigger="hover" data-placement="right" data-content="Quality : Bekerja yang benar dari awal,Cost : Kompetitif secara global,Deliver : Tepat waktu,Safety : Cara kerja yang aman & sehat lingkungan,Morale : Rasa bangga & semangat tinggi" data-original-title="Kesempurnaan">?</button></td>                    -->
    <td><a href='#modalsempurna'><input type="button" id="ketsempurna" value="?" tabindex="8" /></a></td>
    <?php for($i=4;$i<=15;$i++){ ?>
      <td><div class="controls"><label class="radio"><input type="radio" id="radiosemp<?= $i ?>" name="sempurna" value="<?= $i ?>" onclick="set_point('semp',<?= $i ?>)"/></label></div></td> 
    <?php } ?>    
    <td align="center" style="width:2%" id="subsempurna" name="subsempurna">0</td>                           
    <!-- <td align="center" style="width:2%"><input id="subsempurna" name="subsempurna" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>                            -->
  </tr> 
  <tr>
    <td><b>2. DISIPLIN KEHADIRAN</b></td>
    <td></td>
    <td style="width:2%">< 20% Kehadiran</td>
    <?php for($i=4;$i<=15;$i++){ ?>
      <td><div class="controls"><label class="radio"><input type="radio" id="radiodisiplin<?= $i ?>" name="disiplin" value="<?= $i ?>" onclick="set_point('disiplin',<?= $i ?>)"/></label></div></td> 
    <?php } ?>  
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
    <?php for($i=4;$i<=15;$i++){ ?>
      <td><div class="controls"><label class="radio"><input type="radio" id="radiopdca<?= $i ?>" name="pdca" value="<?= $i ?>" onclick="set_point('pdca',<?= $i ?>)"/></label></div></td> 
    <?php } ?>   
    <td align="center" style="width:2%">Ada perencanaan, review dan penetapan tindak</td>   
    <td align="center" style="width:2%" id="bobotpdca" name="bobotpdca">10</td>
    <!-- <td align="center" style="width:2%"><input id="bobotpdca" name="bobotpdca" size="1" type="text" value="10" disabled="T" style="color:#000000"/></td> -->
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%" id="nilbobotpdca" name="nilbobotpdca">0</td>   
    <!-- <td align="center" style="width:2%"><input id="nilbobotpdca" name="nilbobotpdca" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>    -->
    <td align="center" style="width:10%"><b>JADWAL</b></td>                                       
  </tr> 
  <tr>
    <td><b>4. MANAGEMENT ORANG</b></td>
    <td></td>
    <td style="width:2%">Hubungan kerja jelek,tidak ada coaching,conseling,train jelek</td>
    <?php for($i=4;$i<=15;$i++){ ?>
      <td><div class="controls"><label class="radio"><input type="radio" id="radiomanage<?= $i ?>" name="manage" value="<?= $i ?>" onclick="set_point('manage',<?= $i ?>)"/></label></div></td> 
    <?php } ?>
    <td align="center" style="width:2%">Hubungan kerja <br>baik,ada coaching,conseling,<br>kepemimpinan baik</td>   
    <td align="center" style="width:2%" id="bobotmanagement" name="bobotmanagement">10</td>
    <!-- <td align="center" style="width:2%"><input id="bobotmanagement" name="bobotmanagement" size="1" type="text" value="10" disabled="T" style="color:#000000"/></td>     -->
    <td align="center" style="width:2%"></td>                           
    <td align="center" style="width:2%" id="nilbobotmanagement" name="nilbobotmanagement">0</td>   
    <!-- <td align="center" style="width:2%"><input id="nilbobotmanagement" name="nilbobotmanagement" size="1" type="text" value="0" disabled="T" style="color:#000000"/></td>    -->
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
    <td colspan="18"><input style="text-align:right;" id="hasil" name="hasil" size="220" type="text" value="" disabled style="color:#000000"/></td>
    <td align="center" style="width:2%">KRA+KBA</td>                           
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

<!-- Modal Detail  -->
<div id="modalintegritas" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Amanah</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
          <tr>
            <td bgcolor="6094DB"><label for="tanggal">Amanah</label></td>
            <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">1. ..............................</label>
          </tr>                                    
          <tr>
             <td bgcolor="6094DB"><label for="tanggal"></label></td>
               <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">2. .............................</label>
          </tr>                                               
          <tr>
             <td bgcolor="6094DB"><label for="tanggal"></label></td>
               <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">3. ....................................</label>
          </tr>                                                         
          <tr>
             <td bgcolor="6094DB"><label for="tanggal"></label></td>
               <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">4. ...........................</label>
          </tr>                                                                   
        </table>
    </div>
</div>   
<div id="modaltransparan" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Kompeten</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal">masih kosong</label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">1. ................................. </label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">2. .................................</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">3. .................................</label>
           </tr>                                                         
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">4. .................................</label>
           </tr>                                                                  
        </table>
    </div>
</div>   
<div id="modalkerjasama" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Harmonis</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal">Harmonis</label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">1. .................................</label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">2. .................................</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">3. .................................</label>
           </tr>                                                         
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">4. .................................</label>
           </tr>                                                                   
        </table>
    </div>
</div>   
<div id="modalkreatifitas" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Loyal</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal">Loyal</label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">1. .................................</label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">2. .................................</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">3. .................................</label>
           </tr>                                                         
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">4. .................................</label>
           </tr>                                                                    
        </table>
    </div>
</div>   
<div id="modalsemangat" class="modalDialog">
    <div>
        <a href="#close" title="Close" id='closemodal' class="close">X</a>
        <center><h2><u>Penjelasan Adaptif</u></h2></center>
        <table width="100%" align="center">         
          <tr></tr>         
          <tr></tr>
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal">adaptif</label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">1. .................................</label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">2. .................................</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">3. .................................</label>
           </tr>                                                         
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">4. .................................</label>
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
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">1. Quality : Bekerja yang benar dari awal</label>
           </tr>                                    
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">2. Cost : Kompetitif secara global</label>
           </tr>                                               
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">3. Deliver : Tepat waktu</label>
           </tr>                                                         
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">4. Safety : Cara kerja yang aman & sehat lingkungan</label>
           </tr>                                                                   
             <tr>
                 <td bgcolor="6094DB"><label for="tanggal"></label></td>
                   <td  style="font-size:12px "bgcolor="#87CEFA"><label for="tanggal">5. Morale : Rasa bangga & semangat tinggi</label>
           </tr>                                                                             
        </table>
    </div>
</div>   

<script type="application/javascript">

$(document).ready(function() {

  $('#imprv').hide();
  $('#smprn').hide();
});    

function kosong(){
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

  swal('Yakin menyimpan data penilaian kinerja?', {
        icon : 'info',
        buttons: {
            cancel: 'Cancel',
            catch: {
                text: 'Simpan'
            },
        },
    })
    .then((val) => {
        if(val){
            xajax_simpanpms(
            document.getElementById("id_pegawai").value,    
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
        }else{
            swal({
              title: 'Periksa Kembali Data',

              text: 'Pastikan data telah terisi dengan benar!',

              icon: 'info',
            });
        }
    });
}

  function disabled_main_radio(status=true) {
    if(status){
      for (var i = 4; i <= 15; i++) {
        $('#radiomain'+i).attr('disabled',true);
      }
    }
  }

  function set_point(type,value) {
    if($('#kba').text() != '0'){
      if(type =='int'){
        var subint_point = (value*parseFloat($('#bobotinti').text()))/100;
        $('#subint').text(subint_point);
        calculate_subint();
      }else if(type =='trans'){
        var subint_point = (value*parseFloat($('#bobotinti').text()))/100;
        $('#subtrans').text(subint_point);
        calculate_subint();
      }else if(type =='kerja'){
        var subint_point = (value*parseFloat($('#bobotinti').text()))/100;
        $('#subkerja').text(subint_point);
        calculate_subint();
      }else if(type =='kreativ'){
        var subint_point = (value*parseFloat($('#bobotinti').text()))/100;
        $('#subkreativ').text(subint_point);
        calculate_subint();
      }else if(type =='semangat'){
        var subint_point = (value*parseFloat($('#bobotinti').text()))/100;
        $('#subsemangat').text(subint_point);
        calculate_subint();
      }else if(type =='disiplin'){
        var subdisiplin_point = (value*parseFloat($('#bobotdisiplin').text()))/100;
        $('#nilbobotdisiplin').text(subdisiplin_point);
        calculate_kba();
      }else if(type =='pdca'){
        var subpdca_point = (value*parseFloat($('#bobotpdca').text()))/100;
        $('#nilbobotpdca').text(subpdca_point);
        calculate_kba();
      }else if(type =='manage'){
        var submanage_point = (value*parseFloat($('#bobotmanagement').text()))/100;
        $('#nilbobotmanagement').text(submanage_point);
        calculate_kba();
      }
    }else{
      swal({
        title: 'Nilai Bobot KBA Kosong',

        text: 'Untuk mengisi nilai bobot KRA dan KBA, pilih pegawai dulu!',

        icon: 'info',
      })
    }
  }

  function calculate_subint() {
    var total_nilinti = (parseFloat($('#subint').text())+ parseFloat($('#subtrans').text())+parseFloat($('#subkerja').text())+parseFloat($('#subkreativ').text())+parseFloat($('#subsemangat').text()))/5;
    $('#nilbobotinti').text(parseFloat(total_nilinti).toFixed(2));
    calculate_kba();
  }

  function calculate_kba() {
    var total_nilkba = parseFloat($('#nilbobotinti').text())+ parseFloat($('#nilbobotdisiplin').text())+parseFloat($('#nilbobotpdca').text())+parseFloat($('#nilbobotmanagement').text());
    $('#nilbobotkba').text(parseFloat(total_nilkba).toFixed(2));
    var tot_nilkba = (parseFloat($('#nilbobotkba').text())*parseFloat($('#kba').text()))/100;
    $('#totnilkba').text(parseFloat(tot_nilkba).toFixed(2));
  }

  function hitung() {
    var tot_krakba = parseFloat($('#totnilkba').text())+parseFloat($('#totalnilkra').text());
    $('#totkrakba').text(parseFloat(tot_krakba).toFixed(2));

    if(tot_krakba > 0){
      swal({
        title: 'Berhasil Menghitung Kinerja',

        text: 'Berhasil menghitung KRA + KBA',

        icon: 'info',
      });

      if (tot_krakba <= 6.99){
           document.getElementById("hasil").value ='BUTUH PENGEMBANGAN';
      }      
      if (tot_krakba > 6.99){
            if (tot_krakba <= 9.99){
             document.getElementById("hasil").value ='KOMPETEN';
          }
      }
      if (tot_krakba > 9.99){
            if (tot_krakba <= 12.99){
             document.getElementById("hasil").value ='SANGAT EFEKTIF';
          }
      }      
      if (tot_krakba > 12.99){
          if (tot_krakba <= 15){
             document.getElementById("hasil").value ='SEMPURNA';
          }
      } 
    }else{
      swal({
        title: 'Gagal Menghitung Kinerja',

        text: 'Pastikan telah memilih pegawai, KRA dan KBA!',

        icon: 'error',
      });
    }
  }

  disabled_main_radio();

  function carioutstdkompetensi(){
    xajax_carioutstdkompetensi(document.getElementById("kojab").value);
  }
  function caripegawai(){
    //console.log($('#nama').val());
    xajax_caripegawai(document.getElementById("id_pegawai").value,document.getElementById("periode").value,document.getElementById("tahun").value,document.getElementById("bobsubmain").innerHTML);
  }
  
  function cariHasil(){
    xajax_cariHasil(document.getElementById("id_pegawai").value,document.getElementById("periode").value,document.getElementById("tahun").value);
  }

</script>

