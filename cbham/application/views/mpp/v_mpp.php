<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Entry MPP</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Approval MPP</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Report MPP</a></li>
                    <!-- <li><a href="#tab_4" data-toggle="tab">Rekap</a></li> -->
                </ul>
                <div class="tab-content">
                    <!-- ENTRY MPP -->
                    <div class="tab-pane active" id="tab_1">
                        <div class='row-fluid'>
                            <div class='span12'>
                                <form class="form-horizontal form-bordered">
                                    <div class="control-group">
                                        <label class="control-label">No MPP</label>
                                        <div class="controls">
                                            <input type="text" class="s-wrap span2" id="nompp" value="<?php echo $nompp?>" readonly>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Tanggal Entry</label>
                                        <div class="controls">
                                            <input type="text" class="s-wrap span2 date-picker" id="tglentry" value="<?php echo date('Y-m-d h:i:sa')?>" readonly>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Unit</label>
                                        <div class="controls">
                                            <select class="m-wrap large" data-placeholder="Choose a Category" id='unit' tabindex="1">
                                                <option value=''>Pilih Unit</option>
                                                <?php foreach ($unit as $row) {
                                                    echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                                } ?>
                                            </select>
                                            <a class="btn btn-m green" onclick='cekunitmpp()'><i class="icon-plus"></i> Tambah Detail</a>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-full-width" >
                                        <thead>
                                            <tr bgcolor="#245397">
                                                <th><font color="white">Jabatan</th>
                                                <th><font color="white">Tahun</th>
                                                <th><font color="white">Bulan</th>
                                                <th><font color="white">Std Grade</th>
                                                <th><font color="white">Act Grade</th>
                                                <th><font color="white">Kandidat</th>
                                                <th><font color="white">Tindakan Pengembangan</th>
                                                <th><font color="white">Jadwal</th>
                                                <th><font color="white">PIC</th>
                                                <th><font color="white">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id='detailmpp'>
                                        </tbody>
                                    </table>

                                    <div class="form-actions">
                                        <a class="btn green" id="simpanmpp" onClick="simpanmpp()"><i class="icon-save"></i> Simpan</a>
                                        <a class="btn" id="batal" onClick="batalmpp()"> Batal</a>
                                    </div>                                                                
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- APPROVAL MPP -->
                    <div class="tab-pane" id="tab_2">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Unit</span>
                                    <select class="m-wrap large" id='appunit' onchange='carimppopen()'>
                                        <option value=''>Pilih Unit</option>
                                        <?php foreach ($unit as $row) {
                                            echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">No MPP</span>
                                    <select class="m-wrap medium" id='appnompp' onchange='carimppapp()'> 
                                    </select>
                                </div> 
                                <a class="btn green" style='margin-right: 10px;' id="closempp" onClick="closempp()"><i class="icon-lock"></i> Close MPP</a>
                                <a class="btn blue" style='margin-right: 10px;' id="done" onClick="done()"><i class="icon-check"></i> Done</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                                <tr bgcolor="#245397">
                                    <th><font color="white">Jabatan</th>
                                    <th><font color="white">Tahun</th>
                                    <th><font color="white">Bulan</th>
                                    <th><font color="white">Std Grade</th>
                                    <th><font color="white">Act Grade</th>
                                    <th><font color="white">Kandidat</th>
                                    <th><font color="white">Tindakan Pengembangan</th>
                                    <th><font color="white">Jadwal</th>
                                    <th><font color="white">PIC</th>
                                    <th><font color="white">Action</th>
                                </tr>
                            </thead>
                            <tbody id='detailappmpp'>
                            </tbody>
                        </table> 
                    </div>
                    <!-- REPORT MPP -->
                    <div class="tab-pane" id="tab_3">
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Unit</span>
                                    <select class="m-wrap large" id='cariunit'>
                                        <option value=''>Pilih Unit</option>
                                        <?php foreach ($unit as $row) {
                                            echo "<option value='".$row->kunit."'>".$row->namaunit."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Status</span>
                                    <select class="m-wrap small" id='caristatus'>   
                                        <option value='' selected>Semua</option>
                                        <option value='0'>Open</option>
                                        <option value='1'>Close</option>
                                    </select>
                                </div> 
                                <div class="input-prepend">
                                    <span class="add-on">Periode Entry</span>
                                    <input type="text" class="m-wrap span4 date-picker" id="tgl1">
                                    <span class="add-on">s/d</span>
                                    <input type="text" class="m-wrap span4 date-picker" id="tgl2">
                                </div>
                                <a class="btn green" style='margin-right: 10px;' id="cari" onClick="carireportmpp()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                                <tr bgcolor="#245397">
                                    <th><font color="white">No MPP</th>
                                    <th><font color="white">Unit</th>
                                    <th><font color="white">Tanggal</th>
                                    <th><font color="white">Detail</th>
                                    <th><font color="white">Status</th>
                                </tr>
                            </thead>
                            <tbody id='reportmpp'>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
  
    </div>
</div>

<div id="detail" class="modal fade" tabindex="-1" data-width="70%">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id='judul'><i class='icon-add'></i><b>Detail MPP</b></h4>
    </div>
    <div class="modal-body ">
        <div class="row-fluid">
            <div class="span12"> 
                <form class="form-horizontal form-bordered">
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>No MPP</b></label>
                                <div class="controls">
                                    <span class="text" id='detnompp'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>Tanggal Entry</b></label>
                                <div class="controls">
                                    <span class="text" id='dettanggal'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>Unit</b></label>
                                <div class="controls">
                                    <span class="text" id='detunit'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-full-width" >
                        <thead>
                            <tr bgcolor="#245397">
                                <th><font color="white">Jabatan</th>
                                <th><font color="white">Tahun</th>
                                <th><font color="white">Bulan</th>
                                <th><font color="white">Std Grade</th>
                                <th><font color="white">Act Grade</th>
                                <th><font color="white">Kandidat</th>
                                <th><font color="white">Tindakan Pengembangan</th>
                                <th><font color="white">Jadwal</th>
                                <th><font color="white">PIC</th>
                                <th><font color="white">Status</th>
                            </tr>
                        </thead>
                        <tbody id='detailreportmpp'>
                        </tbody>
                    </table>                                                              
                </form>
            </div>
        </div>
    </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" data-width="70%">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title" id='judul'><i class='icon-add'></i><b>Tambah Detail MPP</b></h4>
    </div>
    <div class="modal-body ">
        <div class="row-fluid">
            <div class="span12">    
                <form class="form-horizontal " id="form">
                    <div class="control-group">
                        <label class="control-label">Jabatan</label>
                        <div class="controls">
                            <select id="jabatan" class="s-wrap span6">
                                <option value="">-- Pilih Jabatan --</option>
                                <?php foreach ($jabatan as $row) {
                                echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                                } ?>
                            </select>  
                        </div>
                    </div>  
                    <div class="control-group">
                        <label class="control-label">Tahun</label>
                        <div class="controls">
                            <select class="s-wrap span2" id='tahun'>
                                <?php for ($i=(date('Y')-5); $i < (date('Y')+20); $i++) { 
                                    if(date('Y') == $i){ 
                                        echo "<option value='".$i."' selected>".$i."</option>";
                                    } else {
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Bulan</label>
                        <div class="controls">
                            <select id="bulan" class="s-wrap span2">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select> 
                        </div>
                    </div>  
                    <div class="control-group">
                        <label class="control-label">Standart Grade</label>
                        <div class="controls">
                            <select id="stdgrade" class="s-wrap span2">
                                <option value="">Pilih Grade</option>
                                <?php foreach ($grade as $row) {
                                    echo "<option value=".$row->grade.">".$row->grade."</option>";
                                } ?>
                            </select> 
                        </div>
                    </div>    
                    <div class="control-group">
                        <label class="control-label">Actual Grade</label>
                        <div class="controls">
                            <select id="actgrade" class="s-wrap span2">
                                <option value="">Pilih Grade</option>
                                <?php foreach ($grade as $row) {
                                    echo "<option value=".$row->grade.">".$row->grade."</option>";
                                } ?>
                            </select> 
                        </div>
                    </div>    
                    <div class="control-group">
                        <label class="control-label">Kandidat</label>
                        <div class="controls">
                            <select id="kandidat" class="s-wrap span6">
                                <option value="">-- Pilih Kandidat --</option>
                                <?php 
                                    foreach ($pegawai as $row) {
                                        echo "<option value='".$row->nik."'>".$row->nama."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tindakan Pengembangan</label>
                        <div class="controls">
                            <textarea class="medium s-wrap span6" id="tindakan" rows="2" ></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jadwal</label>
                        <div class="controls">
                            <textarea class="medium s-wrap span6" id="jadwal" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">PIC</label>
                        <div class="controls">
                            <textarea class="medium s-wrap span6" id="pic" rows="2"></textarea>
                        </div>
                    </div>   
                    <div class="form-actions">
                        <a class="btn blue" href="#" id='simpandetail' onclick="tambahdetailmpp()"><i class="icon-plus"></i> Tambah Detail</a>
                    </div>                       
                </form>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
$('#closempp').hide();
function kosongdetail(){
    document.getElementById("jabatan").value='';
    document.getElementById("tahun").value="<?php echo date('Y'); ?>";
    document.getElementById("bulan").value='1';
    document.getElementById("stdgrade").value='';
    document.getElementById("actgrade").value='';
    document.getElementById("kandidat").value='';
    document.getElementById("tindakan").value='';
    document.getElementById("jadwal").value='';
    document.getElementById("pic").value='';
}

function batalmpp(){
    xajax_batalmpp();
}

function done(){
    document.getElementById("appunit").value='';
    document.getElementById("appnompp").innerHTML='';
    document.getElementById("detailappmpp").innerHTML='';
    $('#closempp').hide();
}

function simpanmpp(){
    xajax_simpanmpp(document.getElementById("nompp").value,
                      document.getElementById("tglentry").value,
                      document.getElementById("unit").value );
}

function cekunitmpp(){
    if (document.getElementById("unit").value == '') {
        $('#tambah').modal('hide');
        alert('Unit Belum DI Pilih');
    } else {
        $('#tambah').modal('show');
    }
}

function tambahdetailmpp(){
    xajax_tambahdetailmpp(document.getElementById("nompp").value,
                        document.getElementById("jabatan").value,
                        document.getElementById("tahun").value,
                        document.getElementById("bulan").value,
                        document.getElementById("stdgrade").value,
                        document.getElementById("actgrade").value,
                        document.getElementById("kandidat").value,
                        document.getElementById("tindakan").value,
                        document.getElementById("jadwal").value,
                        document.getElementById("pic").value );
}

function hapusdetailmpp(nompp,kandidat){
    xajax_hapusdetailmpp(nompp,kandidat);
}

function detailmpp(nompp){
    xajax_detailmpp(nompp);
}

function carimppopen(){
    xajax_carimppopen(document.getElementById("appunit").value);
}

function carireportmpp(){
    xajax_carireportmpp(document.getElementById("cariunit").value,
                      document.getElementById("tgl1").value,
                      document.getElementById("tgl2").value,
                      document.getElementById("caristatus").value );
}

function carimppapp(){
    xajax_carimppapp(document.getElementById("appnompp").value);
}

function accdetmpp(nompp,jabatan,kandidat){
    xajax_accdetmpp(nompp,jabatan,kandidat);
}

function closempp(){
    xajax_closempp(document.getElementById("appnompp").value);
}

$('#cari').on('input',function(e){
    xajax_caripegawai(document.getElementById('cari').value);
});
</script>

