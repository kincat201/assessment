<?php echo @$err; ?>
<div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">    
      <div class="row-fluid">
        <div class="span12">
          <div class="portlet">
              <div class="form-search fright">
                  <div class="input-prepend">
                      <span class="add-on">Nama</span>
                      <select class="m-wrap large" data-placeholder="Choose a Category" id='nama' tabindex="1" onchange="carinamapegawai()">
                          <option value=''>Pilih Pegawai</option>
                          <?php foreach ($pegawai as $row) {
                              echo "<option value='".$row->nik."'>".$row->nama."</option>";
                          } ?>
                      </select>
                  </div>
                  <div class="input-prepend">
                      <span class="add-on">NIK</span>
                      <input class="m-wrap small" type="text" size="5" value="" name="nik" id="nik"/>                
                  </div>                  
                  <div class="input-prepend">
                      <span class="add-on">Jabatan</span>
                      <input class="m-wrap large" type="text" size="20" value="" name="jabatan" id="jabatan"/>                
                  </div>                                    
                  <div class="input-prepend">
                      <span class="add-on">Unit</span>
                      <input class="m-wrap large" type="text" size="20" value="" name="unit" id="unit"/>                
                  </div>                                                      
                  <a class="btn green" style='margin-right: 10px;' id="cari" onClick="cariknowhow()"><i class="icon-search"></i> Cari</a>
                  <a class="btn red" style='margin-right: 10px;' id="simpan" onClick="simpankeefektifan()"><i class="icon-save"></i> Simpan</a>
              </div>
          </div>      
        </div>
      </div>

      <div class="row-fluid">
        <div class="span12">
          <div class="portlet">
              <div class="form-search fright">
                  <div class="input-prepend">
                      <span class="add-on">Nama Pelatihan</span>
                      <input class="m-wrap large" type="text" size="20" value="" name="namapelatihan" id="namapelatihan"/>                
                  </div>                  

                  <div class="input-prepend">
                      <span class="add-on">Tanggal Pelatihan</span>
                      <input type="text" class="m-wrap small date-picker" id="tglpelatihan">
                  </div>

<!--                   <div class="input-prepend">
                      <span class="add-on">Tanggal Pelatihan</span>
                      <input class="m-wrap small" type="text" size="5" value="" name="tglpelatihan" id="tglpelatihan"/>                
                  </div>                   -->
                  <div class="input-prepend">
                      <span class="add-on">Instruktur</span>
                      <input class="m-wrap large" type="text" size="20" value="" name="instruktur" id="instruktur"/>                
                  </div>                                    
                  <div class="input-prepend">
                      <span class="add-on">Penyelenggara</span>
                      <input class="m-wrap large" type="text" size="20" value="" name="penyelenggara" id="penyelenggara"/>                
                  </div>                                                      
              </div>
          </div>      
        </div>
      </div>      
  
      <div class="row-fluid">
        <div class="span12">

<table border="1" width="100%" align="center">
  <tr>
    <td bgcolor="#9900CC" align="center" style="width:1%" rowspan="3"><font color="#FFFFFF"><b>No</b></font></td>
    <td bgcolor="#9900CC" align="center" style="width:10%" rowspan="3"><font color="#FFFFFF"><b>Aspek Perubahan</b></font></td>
    <td bgcolor="#9900CC" align="center" style="width:10%" colspan="5"><font color="#FFFFFF"><b>Penilaian</b></font></td>
    <td bgcolor="#9900CC" align="center" style="width:10%" rowspan="3"><font color="#FFFFFF"><b>Sasaran</b></font></td>
  </tr>
  <tr>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>Bobot</b></font></td>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>B</b></font></td>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>C</b></font></td>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>K</b></font></td>            
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>Total</b></font></td>                
  </tr>
  <tr>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b></b></font></td>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>80</b></font></td>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>60</b></font></td>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>40</b></font></td>            
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>Nilai</b></font></td>                
  </tr>  
  <tr>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>(1)</b></font></td>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>(2)</b></font></td>
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>(3)</b></font></td>
    <td bgcolor="#CC6600" align="center" style="width:2%" colspan="3"><font color="#FFFFFF"><b>(4)</b></font></td>            
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b>(5)=(3)x(4)</b></font></td>                
    <td bgcolor="#CC6600" align="center" style="width:2%"><font color="#FFFFFF"><b></b></font></td>                
  </tr>    
  <tr>
    <td align="center" style="width:2%"><b>*</b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b>%</b></td>
    <td align="center" style="width:2%"><b>%</b></td>
    <td align="center" style="width:2%"><b>%</b></td>
    <td align="center" style="width:2%"><b>%</b></td>
    <td align="center" style="width:2%"><b>%</b></td>                
    <td align="center" style="width:2%"><b></b></td>                
  </tr>    
  <tr>
    <td align="center" style="width:2%"><b>1</b></td>
    <td align="left" style="width:2%"><b>SIKAP PERILAKU</b></td>
    <td align="center" style="width:2%" id="sikap" name="sikap">25</td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>                
    <!-- <td align="center" style="width:2%"><b></b></td>                 -->
    <td align="center" style="width:2%" rowspan="7"><textarea id="saransikap" name="saransikap" cols="20" rows="7"></textarea></td>                
  </tr>    
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">Peningkatan kualitas sikap atau perilaku pegawai dilingkungan kerjanya berupa:</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>   
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">a. Pengendalian emosi</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="emosi1" name="perilaku" value="80"/></label></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="emosi2" name="perilaku" value="60"/></label></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="emosi3" name="perilaku" value="40"/></label></td>    
    <td align="center" style="width:2%" id="totalperilaku" name="totalperilaku">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>      
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">b. Rasa menghargai atasan, rekan sejawat dan bawahan</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="rasa1" name="menghargai" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="rasa2" name="menghargai" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="rasa3" name="menghargai" value="40"/></td>
    <td align="center" style="width:2%" id="totalmenghargai" name="totalmenghargai">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>        
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">c. Semangat disiplin dalam bekerja</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="disiplin1" name="semangat" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="disiplin2" name="semangat" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="disiplin3" name="semangat" value="40"/></td>
    <td align="center" style="width:2%" id="totalsemangat" name="totalsemangat">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>        
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">d. Dapat menerima hasil keputusan bersama</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="keputusan1" name="menerima" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="keputusan2" name="menerima" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="keputusan3" name="menerima" value="40"/></td>
    <td align="center" style="width:2%" id="totalmenerima" name="totalmenerima">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>          
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">e. Tanggung jawab dalam pelaksanaan tugas</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="tugas1" name="tanggung" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="tugas2" name="tanggung" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="tugas3" name="tanggung" value="40"/></td>
    <td align="center" style="width:2%" id="totaltanggung" name="totaltanggung">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>            

  <tr>
    <td align="center" style="width:2%"><b>*</b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>                
    <td align="center" style="width:2%"><b></b></td>                
  </tr>    
  <tr>
    <td align="center" style="width:2%"><b>2</b></td>
    <td align="left" style="width:2%"><b>PENGETAHUAN/ WAWASAN</b></td>
    <td align="center" style="width:2%" id="pengetahuan" name="pengetahuan">35</td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>                
    <!-- <td align="center" style="width:2%"><b></b></td>                 -->
    <td align="center" style="width:2%" rowspan="7"><textarea id="saranpengetahuan" name="saranpengetahuan" cols="20" rows="7"></textarea></td>                    
  </tr>    
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">Peningkatan pengetahuan/wawasan berpikir pegawai dalam menunjang tugas-tugasnya:</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>   
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">a. Penambahan pengetahuan pada bidang yg dilatihkan</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="pengetahuan1" name="penambahan" value="80"/></label></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="pengetahuan2" name="penambahan" value="60"/></label></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="pengetahuan3" name="penambahan" value="40"/></label></td>    
    <td align="center" style="width:2%" id="totalpenambahan" name="totalpenambahan">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>      
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">b. Pola pikir semakin sistematis dan terstruktur</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="sistematis1" name="polapikir" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="sistematis2" name="polapikir" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="sistematis3" name="polapikir" value="40"/></td>
    <td align="center" style="width:2%" id="totalpolapikir" name="totalpolapikir">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>        
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">c. Proses pengambilan keputusan dilakukan atas dasar analisa masalah</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="analisa1" name="pengambilan" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="analisa2" name="pengambilan" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="analisa3" name="pengambilan" value="40"/></td>
    <td align="center" style="width:2%" id="totalpengambilan" name="totalpengambilan">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>        
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">d. Keaktifan memberikan masukan perbaikan pada fungsinya</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="fungsi1" name="keaktifan" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="fungsi2" name="keaktifan" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="fungsi3" name="keaktifan" value="40"/></td>
    <td align="center" style="width:2%" id="totalkeaktifan" name="totalkeaktifan">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>          
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">e. Rasa percaya diri yg didukung oleh pengetahuan/ wawasan yg dimiliki</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="percayadiri1" name="percaya" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="percayadiri2" name="percaya" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="percayadiri3" name="percaya" value="40"/></td>
    <td align="center" style="width:2%" id="totalpercaya" name="totalpercaya">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>            

  <tr>
    <td align="center" style="width:2%"><b>*</b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>                
    <td align="center" style="width:2%"><b></b></td>                
  </tr>    
  <tr>
    <td align="center" style="width:2%"><b>3</b></td>
    <td align="left" style="width:2%"><b>KETERAMPILAN/ KEMAMPUAN</b></td>
    <td align="center" style="width:2%" id="keterampilan" name="keterampilan">40</td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>
    <td align="center" style="width:2%"><b></b></td>                
<!--     <td align="center" style="width:2%"><b></b></td>                 -->
    <td align="center" style="width:2%" rowspan="7"><textarea id="saranketerampilan" name="saranketerampilan" cols="20" rows="7"></textarea></td>                    
  </tr>    
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">Peningkatan penguasaan teknis pekerjaan pegawai sesuai bidang tugasnya, berupa:</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"></td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>   
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">a. Penguasaan proses/ prosedur kerja</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="proses1" name="penguasaan" value="80"/></label></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="proses2" name="penguasaan" value="60"/></label></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="proses3" name="penguasaan" value="40"/></label></td>    
    <td align="center" style="width:2%" id="totalpenguasaan" name="totalpenguasaan">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>      
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">b. Peningkatan kemampuan penggunaan sarana/ prasarana kerja</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="kemampuan1" name="peningkatan" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="kemampuan2" name="peningkatan" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="kemampuan3" name="peningkatan" value="40"/></td>
    <td align="center" style="width:2%" id="totalpeningkatan" name="totalpeningkatan">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>        
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">c. Kualitas hasil pekerjaan</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="hasilkerja1" name="kualitas" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="hasilkerja2" name="kualitas" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="hasilkerja3" name="kualitas" value="40"/></td>
    <td align="center" style="width:2%" id="totalkualitas" name="totalkualitas">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>        
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">d. Kecepatan penyelesaian masalah</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="masalah1" name="kecepatan" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="masalah2" name="kecepatan" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="masalah3" name="kecepatan" value="40"/></td>
    <td align="center" style="width:2%" id="totalkecepatan" name="totalkecepatan">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>          
  <tr>
    <td align="center" style="width:2%"></td>
    <td align="left" style="width:2%">e. Kreativitas dalam penyelesaian masalah</td>
    <td align="center" style="width:2%"></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="penyelesaian1" name="kreatifitas" value="80"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="penyelesaian2" name="kreatifitas" value="60"/></td>
    <td align="center" style="width:2%"><label class="radio"><input type="radio" id="penyelesaian3" name="kreatifitas" value="40"/></td>
    <td align="center" style="width:2%" id="totalkreatifitas" name="totalkreatifitas">0</td>
    <!-- <td align="center" style="width:2%"></td> -->
  </tr>            
  <tr>
    <td align="center" style="width:2%" colspan="6">Total</td>
    <td align="center" style="width:2%" id="grandtotal" name="grandtotal">0</td>
    <td align="center" style="width:2%"></td>
  </tr>            
  <tr>
    <td align="center" style="width:2%" colspan="6">Kategori</td>
    <td align="center" style="width:2%" id="kategori" name="kategori"></td>
    <td align="center" style="width:2%"></td>
  </tr>              


<!-- <table width="90%" align="center">   
  <tr>
      <td  align="left">
        <input type="button"  id="btnsimpan" value="Simpan" onclick="simpankeefektifan();" tabindex="8" /> 
        <input type="button" id="btncetak" value="Cetak" onClick="">
        <input type="button" class="" value="Kembali" onClick="location.href='<?=base_url()."index.php/cbham/kembali2"?>'">
      </td>                   
  </tr>            
</table> -->
          
        </div>
      </div>
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

//==========================sikap
    $('#emosi1').change(function() {
      document.getElementById("totalperilaku").innerHTML = (80*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);      
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#emosi2').change(function() {
      document.getElementById("totalperilaku").innerHTML = (60*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#emosi3').change(function() {
      document.getElementById("totalperilaku").innerHTML = (40*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });

    $('#rasa1').change(function() {
      document.getElementById("totalmenghargai").innerHTML = (80*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#rasa2').change(function() {
      document.getElementById("totalmenghargai").innerHTML = (60*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#rasa3').change(function() {
      document.getElementById("totalmenghargai").innerHTML = (40*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });

    $('#disiplin1').change(function() {
      document.getElementById("totalsemangat").innerHTML = (80*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#disiplin2').change(function() {
      document.getElementById("totalsemangat").innerHTML = (60*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#disiplin3').change(function() {
      document.getElementById("totalsemangat").innerHTML = (40*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });    

    $('#keputusan1').change(function() {
      document.getElementById("totalmenerima").innerHTML = (80*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });
    $('#keputusan2').change(function() {
      document.getElementById("totalmenerima").innerHTML = (60*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });
    $('#keputusan3').change(function() {
      document.getElementById("totalmenerima").innerHTML = (40*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });    

    $('#tugas1').change(function() {
      document.getElementById("totaltanggung").innerHTML = (80*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#tugas2').change(function() {
      document.getElementById("totaltanggung").innerHTML = (60*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });
    $('#tugas3').change(function() {
      document.getElementById("totaltanggung").innerHTML = (40*Number(document.getElementById("sikap").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });        

//==========================pengetahuan
    $('#pengetahuan1').change(function() {
      document.getElementById("totalpenambahan").innerHTML = (80*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });
    $('#pengetahuan2').change(function() {
      document.getElementById("totalpenambahan").innerHTML = (60*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });
    $('#pengetahuan3').change(function() {
      document.getElementById("totalpenambahan").innerHTML = (40*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });

    $('#sistematis1').change(function() {
      document.getElementById("totalpolapikir").innerHTML = (80*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });
    $('#sistematis2').change(function() {
      document.getElementById("totalpolapikir").innerHTML = (60*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#sistematis3').change(function() {
      document.getElementById("totalpolapikir").innerHTML = (40*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });

    $('#analisa1').change(function() {
      document.getElementById("totalpengambilan").innerHTML = (80*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#analisa2').change(function() {
      document.getElementById("totalpengambilan").innerHTML = (60*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }          
    });
    $('#analisa3').change(function() {
      document.getElementById("totalpengambilan").innerHTML = (40*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });    

    $('#fungsi1').change(function() {
      document.getElementById("totalkeaktifan").innerHTML = (80*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#fungsi2').change(function() {
      document.getElementById("totalkeaktifan").innerHTML = (60*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);      
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#fungsi3').change(function() {
      document.getElementById("totalkeaktifan").innerHTML = (40*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);      
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });    

    $('#percayadiri1').change(function() {
      document.getElementById("totalpercaya").innerHTML = (80*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#percayadiri2').change(function() {
      document.getElementById("totalpercaya").innerHTML = (60*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#percayadiri3').change(function() {
      document.getElementById("totalpercaya").innerHTML = (40*Number(document.getElementById("pengetahuan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });            

//==========================keterampilan
    $('#proses1').change(function() {
      document.getElementById("totalpenguasaan").innerHTML = (80*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#proses2').change(function() {
      document.getElementById("totalpenguasaan").innerHTML = (60*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#proses3').change(function() {
      document.getElementById("totalpenguasaan").innerHTML = (40*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });

    $('#kemampuan1').change(function() {
      document.getElementById("totalpeningkatan").innerHTML = (80*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#kemampuan2').change(function() {
      document.getElementById("totalpeningkatan").innerHTML = (60*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#kemampuan3').change(function() {
      document.getElementById("totalpeningkatan").innerHTML = (40*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });

    $('#hasilkerja1').change(function() {
      document.getElementById("totalkualitas").innerHTML = (80*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#hasilkerja2').change(function() {
      document.getElementById("totalkualitas").innerHTML = (60*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#hasilkerja3').change(function() {
      document.getElementById("totalkualitas").innerHTML = (40*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });    

    $('#masalah1').change(function() {
      document.getElementById("totalkecepatan").innerHTML = (80*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#masalah2').change(function() {
      document.getElementById("totalkecepatan").innerHTML = (60*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#masalah3').change(function() {
      document.getElementById("totalkecepatan").innerHTML = (40*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });    

    $('#penyelesaian1').change(function() {
      document.getElementById("totalkreatifitas").innerHTML = (80*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#penyelesaian2').change(function() {
      document.getElementById("totalkreatifitas").innerHTML = (60*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);      
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });
    $('#penyelesaian3').change(function() {
      document.getElementById("totalkreatifitas").innerHTML = (40*Number(document.getElementById("keterampilan").innerHTML))/100;        
      document.getElementById("grandtotal").innerHTML = Number(document.getElementById("totalperilaku").innerHTML)+Number(document.getElementById("totalmenghargai").innerHTML)+Number(document.getElementById("totalsemangat").innerHTML)+
                                                        Number(document.getElementById("totalmenerima").innerHTML)+Number(document.getElementById("totaltanggung").innerHTML)+Number(document.getElementById("totalpenambahan").innerHTML)+
                                                        Number(document.getElementById("totalpolapikir").innerHTML)+Number(document.getElementById("totalpengambilan").innerHTML)+Number(document.getElementById("totalkeaktifan").innerHTML)+
                                                        Number(document.getElementById("totalpercaya").innerHTML)+Number(document.getElementById("totalpenguasaan").innerHTML)+Number(document.getElementById("totalpeningkatan").innerHTML)+
                                                        Number(document.getElementById("totalkualitas").innerHTML)+Number(document.getElementById("totalkecepatan").innerHTML)+Number(document.getElementById("totalkreatifitas").innerHTML);            
      if (document.getElementById("grandtotal").innerHTML < 270){
           document.getElementById("kategori").innerHTML ='KURANG EFEKTIF';
      }      
      if (document.getElementById("grandtotal").innerHTML >= 270){
          if (document.getElementById("grandtotal").innerHTML < 335){
             document.getElementById("kategori").innerHTML ='CUKUP EFEKTIF';
          }
      }
      if (document.getElementById("grandtotal").innerHTML >= 336){
          document.getElementById("kategori").innerHTML ='EFEKTIF';
      }      
    });            
});    

function kosong(){
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

function carioutstdkompetensi(){
  xajax_carioutstdkompetensi(document.getElementById("kojab").value);
}
function caripegawai(){
  xajax_caripegawai(document.getElementById("nama").value);
}
function carinamapegawai(){
  xajax_carinamapegawai(document.getElementById("nama").value);
}

function simpankeefektifan(){
  var perilaku=$("input[name='perilaku']:checked").val();
  var menghargai=$("input[name='menghargai']:checked").val();
  var semangat=$("input[name='semangat']:checked").val();
  var menerima=$("input[name='menerima']:checked").val();
  var tanggung=$("input[name='tanggung']:checked").val();
  
  var penambahan=$("input[name='penambahan']:checked").val();
  var polapikir=$("input[name='polapikir']:checked").val();
  var pengambilan=$("input[name='pengambilan']:checked").val();
  var keaktifan=$("input[name='keaktifan']:checked").val();
  var percaya=$("input[name='percaya']:checked").val();

  var penguasaan=$("input[name='penguasaan']:checked").val();
  var peningkatan=$("input[name='peningkatan']:checked").val();
  var kualitas=$("input[name='kualitas']:checked").val();
  var kecepatan=$("input[name='kecepatan']:checked").val();
  var kreatifitas=$("input[name='kreatifitas']:checked").val();

  xajax_simpankeefektifan(
      document.getElementById("nama").value,    
      document.getElementById("nik").value,    
      document.getElementById("jabatan").value,    
      document.getElementById("unit").value,    
      document.getElementById("namapelatihan").value,   
      document.getElementById("tglpelatihan").value,   
      document.getElementById("instruktur").value,   
      document.getElementById("penyelenggara").value,   
      document.getElementById("sikap").innerHTML,  
      perilaku,  
      document.getElementById("totalperilaku").innerHTML,  
      menghargai,
      document.getElementById("totalmenghargai").innerHTML,  
      semangat,
      document.getElementById("totalsemangat").innerHTML, 
      menerima,  
      document.getElementById("totalmenerima").innerHTML,
      tanggung,
      document.getElementById("totaltanggung").innerHTML,
      document.getElementById("pengetahuan").innerHTML,
      penambahan,
      document.getElementById("totalpenambahan").innerHTML,
      polapikir,
      document.getElementById("totalpolapikir").innerHTML,
      pengambilan,
      document.getElementById("totalpengambilan").innerHTML,
      keaktifan,
      document.getElementById("totalkeaktifan").innerHTML,
      percaya,  
      document.getElementById("totalpercaya").innerHTML,
      document.getElementById("keterampilan").innerHTML,
      penguasaan,  
      document.getElementById("totalpenguasaan").innerHTML,
      peningkatan, 
      document.getElementById("totalpeningkatan").innerHTML,
      kualitas, 
      document.getElementById("totalkualitas").innerHTML,
      kecepatan,  
      document.getElementById("totalkecepatan").innerHTML,
      kreatifitas,  
      document.getElementById("totalkreatifitas").innerHTML,      
      document.getElementById("saransikap").value,
      document.getElementById("saranpengetahuan").value,  
      document.getElementById("saranketerampilan").value
    )
}


</script>

