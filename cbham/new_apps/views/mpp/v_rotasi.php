<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Entry Mutasi</a></li>
                    <?php if (getSession('kojab')=='111' || getSession('role')=='Admin') { ?>
                        <li><a href="#tab_2" data-toggle="tab">Approval Mutasi</a></li>
                    <?php }?>
                    <li><a href="#tab_3" data-toggle="tab">Report Mutasi</a></li>
                    <!-- <li><a href="#tab_4" data-toggle="tab">Rekap</a></li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class='row-fluid'>
                            <form class="form form-bordered" id="form">
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Jenis</label>
                                            <div class="controls">
                                                <select id="jenis" class="s-wrap span4" onchange="getnomutasi()">
                                                    <option value="">-- Pilih Jenis --</option>
                                                    <option value="Promosi">Promosi</option>
                                                    <option value="Demosi">Demosi</option>
                                                    <option value="Rotasi">Rotasi</option>
                                                    <option value="Punishment">Punishment</option>
                                                    <option value="Adendum">Adendum</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Nomor</label>
                                            <div class="controls">
                                                 <input type="text" class="s-wrap span4" id="nomutasi" value="<?php echo $nomutasi; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Tanggal Berlaku</label>
                                            <div class="controls">
                                                 <input type="text" placeholder="Tanggal" class="s-wrap span4 date-picker" id="tanggal">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Nama</label>
                                            <div class="controls">
                                                <select id="nama" class="s-wrap span8" onchange="getpegawaiawal()">
                                                    <option value="">-- Pilih Pegawai --</option>
                                                    <?php 
                                                        foreach ($pegawai as $row) {
                                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Tanggal Akhir Kontrak</label>
                                            <div class="controls">
                                                 <input type="text" placeholder="Tanggal" class="s-wrap span4 date-picker" id="tglakhirkontrak">
                                            </div>
                                        </div>
                                    </div>                                                     
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Status Kepegawaian</label>
                                            <div class="controls">
                                                <select id="status" class="s-wrap span4" disabled>
                                                    <option value=""></option>
                                                    <option value="Tetap">Tetap</option>
                                                    <option value="Kontrak">Kontrak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6 ">
                                        <div class="control-group">
                                            <label class="control-label">Status Kepegawaian Baru</label>
                                            <div class="controls">
                                                <select id="statusbaru" class="s-wrap span4">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="Tetap">Tetap</option>
                                                    <option value="Kontrak">Kontrak</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>    
                                <div class="row-fluid">
                                    <div class="span6 ">            
                                        <div class="control-group">
                                            <label class="control-label">Unit / Satmingkal</label>
                                            <div class="controls">
                                                <select id="unit" class="s-wrap span6" disabled>
                                                    <option value=""></option>
                                                    <?php foreach ($dataunit as $row) {
                                                    echo "<option value=".$row->kunit.">".$row->namaunit."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span6 ">       
                                        <div class="control-group">
                                            <label class="control-label">Unit / Satmingkal Baru</label>
                                            <div class="controls">
                                                <select id="unitbaru" class="s-wrap span6">
                                                    <option value="">-- Pilih Unit --</option>
                                                    <?php foreach ($dataunit as $row) {
                                                    echo "<option value=".$row->kunit.">".$row->namaunit."</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Grade</label>
                                            <div class="controls">
                                                <select id="grade" class="s-wrap span2" disabled>
                                                    <option value=""></option>
                                                    <?php foreach ($datagrade as $row) {
                                                    echo "<option value=".$row->grade.">".$row->grade."</option>";
                                                    } ?>
                                                </select> 
                                                <select id="struktural" class="s-wrap span3" disabled>
                                                    <option value=""></option>
                                                    <option value="Struktural">Struktural</option>
                                                    <option value="Fungsional">Fungsional</option>
                                                </select>  
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Grade Baru</label>
                                            <div class="controls">
                                                <select id="gradebaru" class="s-wrap span3">
                                                    <option value="">Pilih Grade</option>
                                                    <?php foreach ($datagrade as $row) {
                                                    echo "<option value=".$row->grade.">".$row->grade."</option>";
                                                    } ?>
                                                </select> 
                                                <select id="strukturalbaru" class="s-wrap span4">
                                                    <option value="">Pilih Jenis Jabatan</option>
                                                    <option value="Struktural">Struktural</option>
                                                    <option value="Fungsional">Fungsional</option>
                                                </select>  
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Jabatan</label>
                                            <div class="controls">
                                                <select id="jabatan" class="s-wrap span6" disabled>
                                                    <option value=""></option>
                                                    <?php foreach ($datajabatan as $row) {
                                                    echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                                                    } ?>
                                                </select>  
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Jabatan Baru</label>
                                            <div class="controls">
                                                <select id="jabatanbaru" class="s-wrap span6">
                                                    <option value="">-- Pilih Jabatan --</option>
                                                    <?php foreach ($datajabatan as $row) {
                                                    echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                                                    } ?>
                                                </select>  
                                            </div>
                                        </div> 
                                    </div>
                                </div> 
                                <div class="row-fluid">
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Punishment</label>
                                            <div class="controls">
                                                <input type="text" class="s-wrap span12" id="punishment" > 
                                            </div>
                                        </div> 
                                    </div>
                                </div>  
                                <div class="row-fluid">
                                    <div class="span6 ">  
                                        <div class="control-group">
                                            <label class="control-label">Keterangan</label>
                                            <div class="controls">
                                                <input type="text" class="s-wrap span12" id="keterangan" > 
                                            </div>
                                        </div> 
                                    </div>
                                </div> 
                                <div class="form-actions">
                                    <a class="btn green" href="#" onclick="simpanrotasi()" id='simpan'><i class="icon-save"></i> Simpan</a>
                                    <a class="btn green" href="#" onclick="updaterotasi()" id='update'><i class="icon-save"></i> Update</a>
                                </div>                     
                            </form>
                        </div>
                    </div>
                   
                    <!-- Evaluasi -->
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='namaoto'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Jenis</span>
                                    <select class="m-wrap small" id='jenisoto'>
                                        <option value=''>Semua</option>
                                        <option value='Rotasi'>Rotasi</option>
                                        <option value='Promosi'>Promosi</option>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <input type="text" placeholder="Periode" class="m-wrap span4 date-picker" id="tgloto1">
                                    <span class="add-on">s/d</span>
                                    <input type="text" placeholder="Periode" class="m-wrap span4 date-picker" id="tgloto2">
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="carioto" onClick="cariotorotasi()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                                <tr>
                                  <th>Jenis</th>
                                  <th>No Surat</th>
                                  <th>Nama</th>
                                  <th>Tanggal</th>
                                  <th>Unit Baru</th>
                                  <th>Jabatan Baru</th>
                                  <th>Detail</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id='dataotorotasi'>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="tab-pane" id="tab_3">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama</span>
                                    <select class="m-wrap large" id='namacari'>
                                        <option value=''>Pilih Pegawai</option>
                                        <?php foreach ($pegawai as $row) {
                                            echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Jenis</span>
                                    <select class="m-wrap small" id='jeniscari'>
                                        <option value=''>Semua</option>
                                        <option value="Promosi">Promosi</option>
                                        <option value="Demosi">Demosi</option>
                                        <option value="Rotasi">Rotasi</option>
                                        <option value="Punishment">Punishment</option>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Periode</span>
                                    <input type="text" placeholder="Periode" class="m-wrap span4 date-picker" id="tglcari1">
                                    <span class="add-on">s/d</span>
                                    <input type="text" placeholder="Periode" class="m-wrap span4 date-picker" id="tglcari2">
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="cari" onClick="carireportrotasi()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                                <tr>
                                  <th>Jenis</th>
                                  <th>No Surat</th>
                                  <th>Nama</th>
                                  <th>Tanggal</th>
                                  <th>Unit Baru</th>
                                  <th>Jabatan Baru</th>
                                  <th>Detail</th>
                                  <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id='datacarirotasi'>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
</div>

<div id="detail" class="modal fade" tabindex="-1" data-width="80%">
    <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id='judul'><i class='icon-add'></i> <b>Detail Rotasi / Promosi</b></h4>
    </div>
    <div class="modal-body ">
        <div class="row-fluid">
            <div class="span12">
                <!-- <div class="portlet-body form"> -->
                    <!-- BEGIN FORM-->
                <div class="form-horizontal form-view form-bordered">
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>Jenis</b></label>
                                <div class="controls">
                                    <span class="text" id='detjenis'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>No Surat</b></label>
                                <div class="controls">
                                    <span class="text" id='detnomutasi'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>Tanggal Berlaku</b></label>
                                <div class="controls">
                                    <span class="text" id='dettanggal'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>Nama</b></label>
                                <div class="controls">
                                    <span class="text" id='detnama'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>Status Kepegawaian</b></label>
                                <div class="controls">
                                    <span class="text" id='detstatuslama'></span>
                                </div>
                            </div>
                        </div>
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>Status Kepegawaian Baru</b></label>
                                <div class="controls">
                                    <span class="text" id='detstatusbaru'></span>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="row-fluid">
                        <div class="span6 ">            
                            <div class="control-group">
                                <label class="control-label"><b>Unit / Satmingkal</b></label>
                                <div class="controls">
                                    <span class="text" id='detunitlama'></span>
                                </div>
                            </div>
                        </div>
                        <div class="span6 ">       
                            <div class="control-group">
                                <label class="control-label"><b>Unit / Satmingkal Baru</b></label>
                                <div class="controls">
                                    <span class="text" id='detunitbaru'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">  
                            <div class="control-group">
                                <label class="control-label"><b>Grade</b></label>
                                <div class="controls">
                                    <span class="text" id='detgradelama'></span>
                                </div>
                            </div>    
                        </div>
                        <div class="span6 ">  
                            <div class="control-group">
                                <label class="control-label"><b>Grade Baru</b></label>
                                <div class="controls">
                                    <span class="text" id='detgradebaru'></span>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">  
                            <div class="control-group">
                                <label class="control-label"><b>Jabatan</b></label>
                                <div class="controls">
                                    <span class="text" id='detjabatanlama'></span>
                                </div>
                            </div> 
                        </div>
                        <div class="span6 ">  
                            <div class="control-group">
                                <label class="control-label"><b>Jabatan Baru</b></label>
                                <div class="controls">
                                    <span class="text" id='detjabatanbaru'></span>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">       
                            <div class="control-group">
                                <label class="control-label"><b>Punishment</b></label>
                                <div class="controls">
                                    <span class="text" id='detpunishment'></span>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row-fluid">
                        <div class="span6 ">       
                            <div class="control-group">
                                <label class="control-label"><b>Keterangan</b></label>
                                <div class="controls">
                                    <span class="text" id='detketerangan'></span>
                                </div>
                            </div>
                        </div>
                    </div>                  
                </div>
                <!-- </div> -->
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
        </div>
    </div>
</div>


<script type="application/javascript">
$('#update').hide();

function simpanrotasi(){
    // alert($("#unit option:selected").text()); return false;
  xajax_simpanrotasi(document.getElementById("jenis").value,
                    document.getElementById("nomutasi").value,
                    document.getElementById("tanggal").value,
                    document.getElementById("nama").value,
                    document.getElementById("status").value,
                    document.getElementById("unit").value,
                    $("#unit option:selected").text(),
                    document.getElementById("grade").value,
                    document.getElementById("struktural").value,
                    document.getElementById("jabatan").value,
                    $("#jabatan option:selected").text(),
                    document.getElementById("statusbaru").value,
                    document.getElementById("unitbaru").value,
                    $("#unitbaru option:selected").text(),
                    document.getElementById("gradebaru").value,
                    document.getElementById("strukturalbaru").value,
                    document.getElementById("jabatanbaru").value,
                    $("#jabatanbaru option:selected").text(),
                    document.getElementById("punishment").value,
                    document.getElementById("keterangan").value,
                    document.getElementById("tglakhirkontrak").value );
}

function getpegawaiawal(){
  xajax_getpegawaiawal(document.getElementById("nama").value);
}

function updaterotasi(){
  xajax_updaterotasi(document.getElementById("jenis").value,
                    document.getElementById("nomutasi").value,
                    document.getElementById("tanggal").value,
                    document.getElementById("nama").value,
                    document.getElementById("status").value,
                    document.getElementById("unit").value,
                    $("#unit option:selected").text(),
                    document.getElementById("grade").value,
                    document.getElementById("struktural").value,
                    document.getElementById("jabatan").value,
                    $("#jabatan option:selected").text(),
                    document.getElementById("statusbaru").value,
                    document.getElementById("unitbaru").value,
                    $("#unitbaru option:selected").text(),
                    document.getElementById("gradebaru").value,
                    document.getElementById("strukturalbaru").value,
                    document.getElementById("jabatanbaru").value,
                    $("#jabatanbaru option:selected").text(),
                    document.getElementById("punishment").value,
                    document.getElementById("keterangan").value,
                    document.getElementById("tglakhirkontrak").value );
}

function cariotorotasi(){
  xajax_cariotorotasi(document.getElementById("namaoto").value,
                    document.getElementById("jenisoto").value,
                    document.getElementById("tgloto1").value,
                    document.getElementById("tgloto2").value);
}

function accrotasi(status,nik,tanggal){
  xajax_accrotasi(status,nik,tanggal);
}

function carireportrotasi(){
  xajax_carireportrotasi(document.getElementById("namacari").value,
                    document.getElementById("jeniscari").value,
                    document.getElementById("tglcari1").value,
                    document.getElementById("tglcari2").value);
}

function detailrotasi(nik,tanggal){
  xajax_detailrotasi(nik,tanggal);
}

function kosong(){
    document.getElementById("tanggal").value='';
    document.getElementById("nama").value='';
    document.getElementById("status").value='';
    document.getElementById("unit").value='';
    document.getElementById("grade").value='';
    document.getElementById("struktural").value='';
    document.getElementById("jabatan").value='';
    document.getElementById("statusbaru").value='';
    document.getElementById("unitbaru").value='';
    document.getElementById("gradebaru").value='';
    document.getElementById("strukturalbaru").value='';
    document.getElementById("jabatanbaru").value='';
    document.getElementById("punishment").value='';
    document.getElementById("keterangan").value='';
    document.getElementById("jenis").value='';
    document.getElementById("nomutasi").value='';
}
// $('#cari').on('input',function(e){
//     xajax_caripegawai(document.getElementById('cari').value);
// });
</script>

