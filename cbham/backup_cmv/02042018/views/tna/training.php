<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active" id='li1'><a href="#tab_1" data-toggle="tab">Entry</a></li>                    
                    <li id='li2'><a href="#tab_2" data-toggle="tab">Report</a></li>                    
                </ul>
                <div class="tab-content">                    
                    <div class="tab-pane active" id="tab_1">
                        <div class='row-fluid'>
                            <div class='span12'>
                                <form class="form-horizontal form-bordered">
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Nama Training</label>
                                            <div class="controls">
                                                <input class="span9 m-wrap" id="namatraining" onkeydown='uppercase(this)'></input>
                                            </div>
                                        </div>
                                    </div>                                                  
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Kode TNA</label>
                                            <div class="controls">                                    
                                                <div class="input-prepend">                                                        
                                                    <select class="m-wrap small" id='kodetna' onchange='getpeserta()'>
                                                        <option value='-'>-</option>
                                                        <option value='KOM'>KOM</option>
                                                        <option value='KIN'>KIN</option>
                                                        <option value='AUD'>AUD</option>
                                                        <option value='BIP'>BIP</option>
                                                        <option value='DIR'>DIR</option>
                                                    </select>
                                                </div>                                    
                                            </div>
                                        </div>                                                  
                                    </div>  
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Nomor Training</label>
                                            <div class="controls">                                    
                                                <input class="span2 m-wrap" id="notraining" readonly></input>                                   
                                            </div>
                                        </div>                                                  
                                    </div>                   
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Provider / Tutor</label>
                                            <div class="controls">
                                                <input class="span9 m-wrap" id="tutor" onkeydown='uppercase(this)'></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Jadwal</label>
                                            <div class="controls">
                                                <input type="text" placeholder="Mulai" class="s-wrap span2 date-picker" id="awal">
                                                s/d <input type="text" placeholder="Akhir" class="s-wrap span2 date-picker" id="akhir">
                                            </div>
                                        </div>
                                    </div>                                    
                                   <!--  <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Durasi</label>
                                            <div class="controls">
                                                <input class="span3 m-wrap" id="durasi"></input>
                                            </div>
                                        </div>
                                    </div>       -->                              
                                    <div class="control-group">
                                        <div class="control-group">
                                            <label class="control-label">Biaya</label>
                                            <div class="controls">
                                                <input class="span2 m-wrap" id="biaya"></input>
                                            </div>
                                        </div>
                                    </div>                                                                    
                                    <div class="control-group">
                                        <label class="control-label">Peserta</label>
                                        <div class="controls">
                                            <select id='peserta'>
                                                
                                            </select>
                                            <a class="btn green" id="tambah" onClick="tambahpeserta()"><i class="icon-plus"></i> Tambah</a>
                                        </div>
                                    </div>   
                                    <table class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Unit</th>
                                                <th>Jabatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id='datapeserta'>
                                        </tbody>
                                    </table>
                                                                                                                                                                                
                                    <div class="form-actions">                                        
                                        <a class="btn green" id="simpan" onClick="simpantraining()"><i class="icon-save"></i> Simpan</a>
                                        <a class="btn green" id="update" onClick="updatetraining()"><i class="icon-edit"></i> Edit</a>
                                        <a class="btn red" id="batal" onClick="batal()"> Batal</a>                              
                                    </div>                                                                
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Evaluasi -->
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
<!--                                 <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='nama'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div> -->
                                                            

                                <div class="input-prepend">                                
                                    <span class="add-on">Kode</span>                                    
                                    <select class="m-wrap small" id='kodecari'>
                                        <option value=''>Semua</option>
                                        <option value='KOM'>KOM</option>
                                        <option value='KIN'>KIN</option>
                                        <option value='AUD'>AUD</option>
                                        <option value='BIP'>BIP</option>
                                        <option value='DIR'>DIR</option>
                                    </select>                                   
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode Mulai Training</span>
                                    <input type="text" placeholder="Mulai" class="m-wrap small date-picker" id="tglcari1"> s/d
                                    <input type="text" placeholder="Mulai" class="m-wrap small date-picker" id="tglcari2">
                                </div>

                                <a class="btn green" style='margin-right: 10px;' id="cari" onClick="caritraining()"><i class="icon-search"></i> Cari</a>
                                <!-- <a class="btn purple" id="cetak" onClick=""><i class="icon-download"></i> Download</a>                                 -->
                                <!-- <a class="btn purple" target='_blank' href="<?=base_url()."tna/cetaktna"?>"><i class="icon-download"></i> Download</a>                                 -->
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                            <tr>
                              <th>No Training</th>
                              <th>Training</th>
                              <th>Kode TNA</th>
                              <th>Tutor</th>
                              <th>Jadwal</th>
                              <th>Biaya</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id='tna'>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
  
    </div>
</div>


<script type="application/javascript">
$('#update').hide();

function showMyPayroll(){
//must be present because auto suggest will callback this function
}

function uppercase(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

$(document).ready(function() {
    var unit=document.getElementById("unit").value;
    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 1,
              rtnIDs: true,
            dataFile: '<?=base_url().'index.php/tna/pegawaiList/unit'?>'
    });   

  $("#cari").click(function(){
      var data1 = document.getElementById('tahun1').value;
      var data2 = document.getElementById('periode1').value;
      var data3 = document.getElementById('unit1').value;
      $("#cetak").attr("onClick", "window.open('<?=base_url()?>index.php/tna/cetaktna/"+data1+"/"+data2+"/"+data3+"')");
  });         
});

function caripegawai(){
  xajax_caripegawai(document.getElementById("unit").value);                      
}

function caripms(){
  xajax_caripms(document.getElementById("nama").value);                      
}

function simpantraining(){
  xajax_simpantraining(
                    document.getElementById("notraining").value,
                    document.getElementById("namatraining").value,
                    document.getElementById("kodetna").value,
                    document.getElementById("tutor").value,
                    document.getElementById("awal").value,
                    document.getElementById("akhir").value,
                    document.getElementById("biaya").value
                  );
}

function updatetraining(){
  xajax_updatetraining(
                    document.getElementById("notraining").value,
                    document.getElementById("namatraining").value,
                    document.getElementById("kodetna").value,
                    document.getElementById("tutor").value,
                    document.getElementById("awal").value,
                    document.getElementById("akhir").value,
                    document.getElementById("biaya").value
                  );
}

function caritraining(){
  if (document.getElementById("tglcari1").value=='' || document.getElementById("tglcari2").value=='') {
    alert('Periode Tanggal Mulai Belum Di Pilih');
  } else {
    xajax_caritraining(document.getElementById("kodecari").value,document.getElementById("tglcari1").value,document.getElementById("tglcari2").value);
  }
}

function hapustraining(notraining){
  var r = confirm("Yakin akan menghapus Training "+notraining+" ?");
  if (r === false) {
    return false;
  } else {
    xajax_hapustraining(notraining,document.getElementById("kodecari").value,document.getElementById("tglcari1").value,document.getElementById("tglcari2").value);
  }
}

function edittraining(notraining){
  xajax_edittraining(notraining);
}

function getpeserta(){
  xajax_getpeserta(document.getElementById("kodetna").value);
}

function tambahpeserta(){
  xajax_tambahpeserta(document.getElementById("notraining").value,document.getElementById("peserta").value);
}

function hapuspeserta(notraining,nik){
  xajax_hapuspeserta(notraining,nik);
}

$('#cari').on('input',function(e){
    xajax_caripegawai(document.getElementById('cari').value);
});

function kosong(){
    document.getElementById("notraining").value='';
    document.getElementById("namatraining").value='';
    document.getElementById("kodetna").value='';
    document.getElementById("tutor").value='';
    document.getElementById("awal").value='';
    document.getElementById("akhir").value='';
    document.getElementById("biaya").value='';
    document.getElementById("peserta").value='';
    $('#datapeserta').html("");
}

</script>

