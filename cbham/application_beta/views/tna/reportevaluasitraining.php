<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Report</a></li>                                        
                    <!-- <li><a href="#tab_2" data-toggle="tab">Report</a></li>                                     -->
                </ul>
                <div class="tab-content">                                        
                    <div class="tab-pane active" id="tab_1">                    
                        <div class="portlet">
                            <div class="form-search fright">

                                <div class="input-prepend">
                                    <span class="add-on">Tanggal Pelatihan</span>
                                    <input type="text" class="m-wrap small date-picker" id="tgl1">
                                    <input type="text" class="m-wrap small date-picker" id="tgl2">
                                </div>

<!--                                 <div class="input-prepend">
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
                                <div class="input-prepend">
                                    <span class="add-on">Bulan</span>
                                    <select class="m-wrap small" id='bulan'>
                                        <option value=''>-</option>
                                        <option value='1'>Januari</option>
                                        <option value='2'>Februari</option>
                                        <option value='3'>Maret</option>
                                        <option value='4'>April</option>
                                        <option value='5'>Mei</option>
                                        <option value='6'>Juni</option>
                                        <option value='7'>Juli</option>
                                        <option value='8'>Agustus</option>                                        
                                        <option value='9'>September</option>
                                        <option value='10'>Oktober</option>
                                        <option value='11'>November</option>
                                        <option value='12'>Desember</option>                                        
                                    </select>
                                </div>                                
                                <div class="input-prepend">                                
                                    <span class="add-on">Unit</span>                                    
                                    <select class="span11 m-wrap" data-placeholder="Choose a Category" id='unit'>
                                        <option value=''>Pilih Unit</option>
                                        <?php foreach ($dataunit as $row) {
                                            echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                        } ?>
                                    </select>                                    
                                </div>
                                <div class="input-prepend">                                
                                    <span class="add-on">Jabatan</span>                                    
                                    <select class="span10 m-wrap" data-placeholder="Choose a Category" id='jabatan'>
                                        <option value=''>Pilih Jabatan</option>
                                        <?php foreach ($datajabatan as $row) {
                                            echo "<option value='".$row->kojab."'>".$row->namajabatan."</option>";
                                        } ?>
                                    </select>                                    
                                </div>                                  -->
                                <a class="btn green" style='margin-right: 10px;' id="cari" onClick="carireportevaluasitraining()"><i class="icon-search"></i> Cari</a>
                                <!-- <a class="btn purple" id="cetak" onClick=""><i class="icon-download"></i> Download</a> -->
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>Nama</th>
                              <th>NIK</th>
                              <th>Jabatan</th>
                              <th>Unit</th>
                              <th>Nama Pelatihan</th>
                              <th>Instruktur</th>
                              <th>Penyelenggara</th>
                              <th>Cetak</th>
                            </tr>
                            </thead>
                            <tbody id='reportevaluasitraining'>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" id='tahun1'>
                                        <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) { 
                                            if(date('Y') == $i){ 
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }                                            
                                        } ?>
                                    </select>
                                </div>                                
                                <div class="input-prepend">
                                    <span class="add-on">Bulan</span>
                                    <select class="m-wrap small" id='bulan1'>
                                        <option value=''>-</option>
                                        <option value='1'>Januari</option>
                                        <option value='2'>Februari</option>
                                        <option value='3'>Maret</option>
                                        <option value='4'>April</option>
                                        <option value='5'>Mei</option>
                                        <option value='6'>Juni</option>
                                        <option value='7'>Juli</option>
                                        <option value='8'>Agustus</option>                                        
                                        <option value='9'>September</option>
                                        <option value='10'>Oktober</option>
                                        <option value='11'>November</option>
                                        <option value='12'>Desember</option>                                        
                                    </select>
                                </div>                                                                
                                <div class="input-prepend">                                
                                    <span class="add-on">Unit</span>                                    
                                    <select class="span11 m-wrap" data-placeholder="Choose a Category" id='unit1'>
                                        <option value=''>Pilih Unit</option>
                                        <?php foreach ($dataunit as $row) {
                                            echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                        } ?>
                                    </select>                                    
                                </div>
                                <div class="input-prepend">                                
                                    <span class="add-on">Jabatan</span>                                    
                                    <select class="span10 m-wrap" data-placeholder="Choose a Category" id='jabatan1'>
                                        <option value=''>Pilih Jabatan</option>
                                        <?php foreach ($datajabatan as $row) {
                                            echo "<option value='".$row->kojab."'>".$row->namajabatan."</option>";
                                        } ?>
                                    </select>                                    
                                </div>                                 
                                <a class="btn green" style='margin-right: 10px;' id="carireport" onClick="carireporthasilskk()"><i class="icon-search"></i> Cari</a>
                                <!-- <a class="btn purple" id="cetak" onClick="location.href='<?=base_url()."index.php/skk/cetakrealisasi"?>'"><i class="icon-download"></i> Download</a>                                 -->
                                <a class="btn purple" id="cetak" onClick=""><i class="icon-download"></i> Download</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>Kode</th>
                              <th>KPI</th>
                              <th>Polarisasi</th>
                              <th>Satuan</th>
                              <th>Target</th>
                              <th>Realisasi</th>
                              <th>Indeks Capaian KPI</th>
                              <th>Indeks KPI</th>
                              <th>Nilai Sasaran Strategis</th>
                              <th>Status</th>                              
                            </tr>
                            </thead>
                            <tbody id='reporthitungskk'>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

<div id="tambah" class="modal hide fade" tabindex="-1" data-width="1000">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3>Entry Realisasi</h3>
    </div>
    <div class="modal-body">
        <div class="row-fluid">
            <div class="span12">
                <p><b>Kode KPI</b><input type="text" class="span12 m-wrap" id="kodekpi"></p>
                <p><b>Nama KPI</b><input type="text" class="span12 m-wrap" id="namakpi"></p>
                <p><b>Deskripsi</b><input type="text" class="span12 m-wrap" id="deskripsi"></p>
                <p><b>Satuan</b><input type="text" class="span12 m-wrap" id="satuan"></p>                
                <p><b>Rollup</b><input type="text" class="span12 m-wrap" id="rollup"></p>
                <p><b>Periode</b><input type="text" class="span12 m-wrap" id="periode"></p>                
            </div>        
        </div>
        <div class="row-fluid">
            <div class="span6">
                <h4><b><u>Target :</u></b></h4>
                <p><b>Januari</b><input type="text" class="span12 m-wrap" id="jan1"></p>
                <p><b>Februari</b><input type="text" class="span12 m-wrap" id="feb1"></p>
                <p><b>Maret</b><input type="text" class="span12 m-wrap" id="mar1"></p>
                <p><b>April</b><input type="text" class="span12 m-wrap" id="apr1"></p>
                <p><b>Mei</b><input type="text" class="span12 m-wrap" id="mei1"></p>
                <p><b>Juni</b><input type="text" class="span12 m-wrap" id="jun1"></p>
                <p><b>Juli</b><input type="text" class="span12 m-wrap" id="jul1"></p>
                <p><b>Agustus</b><input type="text" class="span12 m-wrap" id="agt1"></p>
                <p><b>September</b><input type="text" class="span12 m-wrap" id="sep1"></p>
                <p><b>Oktober</b><input type="text" class="span12 m-wrap" id="okt1"></p>
                <p><b>November</b><input type="text" class="span12 m-wrap" id="nov1"></p>
                <p><b>Desember</b><input type="text" class="span12 m-wrap" id="des1"></p>                
            </div>
            <div class="span6">
                <h4><b><u>Realisasi :</u></b></h4>
                <p><b>Januari</b><input type="text" class="span12 m-wrap" id="jan2"></p>
                <p><b>Februari</b><input type="text" class="span12 m-wrap" id="feb2"></p>
                <p><b>Maret</b><input type="text" class="span12 m-wrap" id="mar2"></p>
                <p><b>April</b><input type="text" class="span12 m-wrap" id="apr2"></p>
                <p><b>Mei</b><input type="text" class="span12 m-wrap" id="mei2"></p>
                <p><b>Juni</b><input type="text" class="span12 m-wrap" id="jun2"></p>
                <p><b>Juli</b><input type="text" class="span12 m-wrap" id="jul2"></p>
                <p><b>Agustus</b><input type="text" class="span12 m-wrap" id="agt2"></p>
                <p><b>September</b><input type="text" class="span12 m-wrap" id="sep2"></p>
                <p><b>Oktober</b><input type="text" class="span12 m-wrap" id="okt2"></p>
                <p><b>November</b><input type="text" class="span12 m-wrap" id="nov2"></p>
                <p><b>Desember</b><input type="text" class="span12 m-wrap" id="des2"></p>              
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn blue" onClick="simpanrealisasi()">Simpan</button>
        <button type="button" data-dismiss="modal" class="btn">Keluar</button>        
    </div>
</div>

<script type="application/javascript">
$('#update').hide();

function showMyPayroll(){
//must be present because auto suggest will callback this function
}

$(document).ready(function() {
    // var unit=document.getElementById("unit").value;
    // $.fn.autosugguest({  
    //        className: 'ausu-suggest',
    //       methodType: 'POST',
    //         minChars: 1,
    //           rtnIDs: true,
    //         dataFile: '<?=base_url().'index.php/tna/pegawaiList/unit'?>'
    // });   

  $("#carireport").click(function(){
      // var data1 = document.getElementById('tahun').value;
      // var data2 = document.getElementById('unit').value;
      // var data3 = document.getElementById('jabatan').value;
      // var data4 = document.getElementById('bulan').value;
      $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/skk/cetakhasilskk/')");
      // $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/skk/cetakhasilskk/"+data1+"/"+data2+"/"+data3+"/"+data4+"')");
  });         
});

function carireportevaluasitraining(){
  xajax_carireportevaluasitraining(document.getElementById("tgl1").value,document.getElementById("tgl2").value);
}

function cetakreportevaluasitraining(noindex){
  xajax_cetakreportevaluasitraining(noindex);
}

// function simpanrealisasi(){
//   xajax_simpanrealisasi(
//                   document.getElementById("tahun").value,
//                   document.getElementById("unit").value,
//                   document.getElementById("jabatan").value,
//                   document.getElementById("kodekpi").value,
//                   document.getElementById("jan2").value,
//                   document.getElementById("feb2").value,
//                   document.getElementById("mar2").value,
//                   document.getElementById("apr2").value,
//                   document.getElementById("mei2").value,
//                   document.getElementById("jun2").value,
//                   document.getElementById("jul2").value,
//                   document.getElementById("agt2").value,
//                   document.getElementById("sep2").value,
//                   document.getElementById("okt2").value,
//                   document.getElementById("nov2").value,
//                   document.getElementById("des2").value
//                   );
//     // kosong();
// }

// function kosong(){
//                   document.getElementById("tahun").value="";
//                   document.getElementById("unit").value="";
//                   document.getElementById("jabatan").value="";
//                   document.getElementById("kpi").value="";
//                   document.getElementById("jan2").value="";
//                   document.getElementById("feb2").value="";
//                   document.getElementById("mar2").value="";
//                   document.getElementById("apr2").value="";
//                   document.getElementById("mei2").value="";
//                   document.getElementById("jun2").value="";
//                   document.getElementById("jul2").value="";
//                   document.getElementById("agt2").value="";
//                   document.getElementById("sep2").value="";
//                   document.getElementById("okt2").value="";
//                   document.getElementById("nov2").value="";
//                   document.getElementById("des2").value="";
// }

// function caritargetskk(){
//   xajax_caritargetskk(document.getElementById("tahun").value,document.getElementById("unit").value,document.getElementById("jabatan").value);
// }

// function carirealisasi(){
//   xajax_carirealisasi(document.getElementById("tahun1").value,document.getElementById("unit1").value,document.getElementById("jabatan1").value);
// }

// function entryrealisasi(noindex){
//   xajax_entryrealisasi(noindex);
// }

// function hitung(){
//   xajax_hitung(document.getElementById("tahun").value,document.getElementById("bulan").value,document.getElementById("unit").value,document.getElementById("jabatan").value);
// }

// function carireporthasilskk(){
//   xajax_carireporthasilskk(document.getElementById("tahun1").value,document.getElementById("bulan1").value,document.getElementById("unit1").value,document.getElementById("jabatan1").value);
// }

</script>

