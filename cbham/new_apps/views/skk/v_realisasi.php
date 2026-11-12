<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Entry</a></li>                                        
                    <li><a href="#tab_2" data-toggle="tab">Report</a></li>                                    
                </ul>
                <div class="tab-content">                                        
                    <div class="tab-pane active" id="tab_1">                    
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap selectpicker small" data-live-search="true" id='tahun'>
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
                                    <span class="add-on">Unit</span>                                    
                                    <select class="span10 selectpicker m-wrap" data-live-search="true" data-placeholder="Choose a Category" onchange="getJabatan('entry')" id='unit'>
                                        <option value=''>Pilih Unit</option>
                                        <?php foreach ($dataunit as $row) {
                                            echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                        } ?>
                                    </select>                                    
                                </div>
                                <div class="input-prepend">                                
                                    <span class="add-on">Jabatan</span>                                    
                                    <select class="span10 selectpicker m-wrap" data-live-search="true" data-placeholder="Choose a Category" id='jabatan'>
                                        <option value=''>Pilih Jabatan</option>
                                    </select>                                    
                                </div>                                 
                                <a class="btn green" style='margin-right: 10px;' id="cari" onClick="caritargetskk()"><i class="icon-search"></i> Cari</a>
                                <!-- <a class="btn purple" id="cetak" onClick=""><i class="icon-download"></i> Download</a> -->
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" style="overflow-x: scroll;display: block; margin-bottom: 150px !important">
                            <thead>
                            <tr>
                              <th>Kode</th>
                              <th>KPI</th>
                              <th>Deskripsi</th>
                              <th>Satuan</th>
                              <th>Rollup</th>
                              <th>Periode</th>
                              <th>Jan</th>
                              <th>Feb</th>
                              <th>Mar</th>
                              <th>Apr</th>                              
                              <th>Mei</th>
                              <th>Jun</th>
                              <th>Jul</th>
                              <th>Agt</th>
                              <th>Sep</th>
                              <th>Okt</th>
                              <th>Nov</th>
                              <th>Des</th>                                                            
                              <th>Realisasi</th>  
                            </tr>
                            </thead>
                            <tbody id='targetskk'>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap selectpicker small" data-live-search="true" id='tahun1'>
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
                                    <span class="add-on">Unit</span>                                    
                                    <select class="span10 selectpicker m-wrap" data-live-search="true" data-placeholder="Choose a Category" onchange="getJabatan('report')" id='unit1'>
                                        <option value=''>Pilih Unit</option>
                                        <?php foreach ($dataunit as $row) {
                                            echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                        } ?>
                                    </select>                                    
                                </div>
                                <div class="input-prepend">                                
                                    <span class="add-on">Jabatan</span>                                    
                                    <select class="span10 selectpicker m-wrap" data-live-search="true" data-placeholder="Choose a Category" id='jabatan1'>
                                        <option value=''>Pilih Jabatan</option>
                                    </select>                                    
                                </div>                                 
                                <a class="btn green" style='margin-right: 10px;' id="cari" onClick="carirealisasi()"><i class="icon-search"></i> Cari</a>
                                <a class="btn purple" id="cetak" onClick="location.href='<?=base_url()."index.php/skk/cetakrealisasi"?>'"><i class="icon-download"></i> Download</a>                                
                                <!-- <a class="btn purple" id="cetak" onClick=""><i class="icon-download"></i> Download</a> -->
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" style="overflow-x: scroll;display: block; margin-bottom: 150px !important">
                            <thead>
                            <tr>
                              <th>Kode</th>
                              <th>KPI</th>
                              <th>Deskripsi</th>
                              <th>Ket</th>
                              <th>Satuan</th>
                              <th>Rollup</th>
                              <th>Periode</th>
                              <th>Jan</th>
                              <th>Feb</th>
                              <th>Mar</th>
                              <th>Apr</th>                              
                              <th>Mei</th>
                              <th>Jun</th>
                              <th>Jul</th>
                              <th>Agt</th>
                              <th>Sep</th>
                              <th>Okt</th>
                              <th>Nov</th>
                              <th>Des</th>
                              <th style="min-width: 75px">Action</th>                                                            
                            </tr>
                            </thead>
                            <tbody id='reportrealisasi'>
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
                <p><b>Kode KPI</b><input type="text" class="span12 m-wrap" id="kodekpi" readonly></p>
                <p><b>Nama KPI</b><input type="text" class="span12 m-wrap" id="namakpi" readonly></p>
                <p><b>Deskripsi</b><input type="text" class="span12 m-wrap" id="deskripsi" readonly></p>
                <p><b>Satuan</b><input type="text" class="span12 m-wrap" id="satuan" readonly></p>                
                <p><b>Rollup</b><input type="text" class="span12 m-wrap" id="rollup" readonly></p>
                <p><b>Periode</b><input type="text" class="span12 m-wrap" id="periode" readonly></p>                
            </div>        
        </div>
        <div class="row-fluid">
            <div class="span6">
                <h4><b><u>Target :</u></b></h4>
                <p><b>Januari</b><input type="text" class="span12 m-wrap" id="jan1" readonly></p>
                <p><b>Februari</b><input type="text" class="span12 m-wrap" id="feb1" readonly></p>
                <p><b>Maret</b><input type="text" class="span12 m-wrap" id="mar1" readonly></p>
                <p><b>April</b><input type="text" class="span12 m-wrap" id="apr1" readonly></p>
                <p><b>Mei</b><input type="text" class="span12 m-wrap" id="mei1" readonly></p>
                <p><b>Juni</b><input type="text" class="span12 m-wrap" id="jun1" readonly></p>
                <p><b>Juli</b><input type="text" class="span12 m-wrap" id="jul1" readonly></p>
                <p><b>Agustus</b><input type="text" class="span12 m-wrap" id="agt1" readonly></p>
                <p><b>September</b><input type="text" class="span12 m-wrap" id="sep1" readonly></p>
                <p><b>Oktober</b><input type="text" class="span12 m-wrap" id="okt1" readonly></p>
                <p><b>November</b><input type="text" class="span12 m-wrap" id="nov1" readonly></p>
                <p><b>Desember</b><input type="text" class="span12 m-wrap" id="des1" readonly></p>                
            </div>
            <div class="span6">
                <h4><b><u>Realisasi :</u></b></h4>
                <input type="hidden" class="span12 m-wrap" id="noindex2">
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
        <button type="button" data-dismiss="modal" class="btn blue" onClick="simpanrealisasi()">Simpan</button>
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

  $("#cari").click(function(){
      var data1 = document.getElementById('tahun1').value;
      var data2 = document.getElementById('unit1').value;
      var data3 = document.getElementById('jabatan1').value;
      $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/realisasi/cetakrealisasi/"+data1+"/"+data2+"/"+data3+"')");
  });         
});

function simpanrealisasi(){
  xajax_simpanrealisasi(
                  document.getElementById("tahun").value,
                  document.getElementById("unit").value,
                  document.getElementById("jabatan").value,
                  document.getElementById("kodekpi").value,
                  document.getElementById("noindex2").value,
                  document.getElementById("jan2").value,
                  document.getElementById("feb2").value,
                  document.getElementById("mar2").value,
                  document.getElementById("apr2").value,
                  document.getElementById("mei2").value,
                  document.getElementById("jun2").value,
                  document.getElementById("jul2").value,
                  document.getElementById("agt2").value,
                  document.getElementById("sep2").value,
                  document.getElementById("okt2").value,
                  document.getElementById("nov2").value,
                  document.getElementById("des2").value
                  );
    // kosong();
}

function kosong(){
                  document.getElementById("tahun").value="";
                  document.getElementById("unit").value="";
                  document.getElementById("jabatan").value="";
                  document.getElementById("kpi").value="";
                  document.getElementById("jan2").value="";
                  document.getElementById("feb2").value="";
                  document.getElementById("mar2").value="";
                  document.getElementById("apr2").value="";
                  document.getElementById("mei2").value="";
                  document.getElementById("jun2").value="";
                  document.getElementById("jul2").value="";
                  document.getElementById("agt2").value="";
                  document.getElementById("sep2").value="";
                  document.getElementById("okt2").value="";
                  document.getElementById("nov2").value="";
                  document.getElementById("des2").value="";
}

function caritargetskk(){
  xajax_caritargetskk(document.getElementById("tahun").value,document.getElementById("unit").value,document.getElementById("jabatan").value);
}

function carirealisasi(){
  xajax_carirealisasi(document.getElementById("tahun1").value,document.getElementById("unit1").value,document.getElementById("jabatan1").value);
}

function getJabatan(type){
  var unit = '';
  unit = type=='entry'?document.getElementById("unit").value:(type=='report'?document.getElementById("unit1").value:document.getElementById("unitreport").value);
  xajax_getJabatan(unit,type);
}

function entryrealisasi(noindex){
  xajax_entryrealisasi(noindex);
}

function hapusrealisasi(noindex,tahun,unit,jabatan){
  xajax_hapusrealisasi(noindex,tahun,unit,jabatan);
}

</script>

