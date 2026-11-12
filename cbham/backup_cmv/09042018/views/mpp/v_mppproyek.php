<?php echo @$err; ?>
<div id='alert'></div>
<div class="row-fluid" style="height:1200px !important; overflow-y: scroll;">
    <div class="span12">
        <div class='row-fluid'>
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Entry MPP Proyek</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Approval MPP Proyek</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Report MPP Proyek</a></li>
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
                                        <label class="control-label">Divisi</label>
                                        <div class="controls">
                                            <select id="divisi" class="s-wrap span2">
                                                <option value="">-- Pilih Divisi --</option>
                                                <?php foreach ($divisi as $row) {
                                                echo "<option value=".$row->kunit.">".$row->namaunit."</option>";
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
                                        <label class="control-label">Nama Proyek</label>
                                        <div class="controls">
                                            <input type="text" class="s-wrap span4" id="proyek" >
                                            <a class="btn btn-m green" onclick='cekunitmpp()'><i class="icon-plus"></i> Tambah Detail</a>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-full-width" >
                                        <thead>
                                            <tr bgcolor="#245397">
                                                <th><font color="white">Jabatan</th>
                                                <th><font color="white">Mulai</th>
                                                <th><font color="white">Selesai</th>
                                                <th><font color="white">Kebutuhan</th>
                                                <th><font color="white">Kandidat</th>
                                                <th><font color="white">Kualifikasi/Keahlian/SKA</th>
                                                <th><font color="white">PIC</th>
                                                <th><font color="white">Catatan</th>
                                                <th><font color="white">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id='detailmpp'>
                                        </tbody>
                                    </table>

                                    <div class="form-actions">
                                        <a class="btn green" id="simpanmpp" onClick="simpanmppproyek()"><i class="icon-save"></i> Simpan</a>
                                        <a class="btn" id="batal" onClick="batalmppproyek()"> Batal</a>
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
                                    <span class="add-on">Divisi</span>
                                    <select id="appdivisi" class="m-wrap medium" onchange='carimppproyekopen()'>
                                        <option value="">-- Pilih Divisi --</option>
                                        <?php foreach ($divisi as $row) {
                                        echo "<option value=".$row->kunit.">".$row->namaunit."</option>";
                                        } ?>
                                    </select> 
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">No MPP</span>
                                    <select class="m-wrap medium" id='appnompp' onchange='carimppproyekapp()'> 
                                    </select>
                                </div> 
                                <a class="btn green" style='margin-right: 10px;' id="closempp" onClick="closemppproyek()"><i class="icon-lock"></i> Close MPP</a>
                                <a class="btn blue" style='margin-right: 10px;' id="done" onClick="done()"><i class="icon-check"></i> Done</a>
                            </div>
                        </div>
                        <div class="portlet">
                            <div class="form-search fright">
                                <div class="input-prepend">
                                    <span class="add-on">Nama Proyek</span>
                                    <input type="text" class="m-wrap large" id="appproyek" >
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <input type="text" class="m-wrap small" id="apptahun" >
                                </div>
                            </div> 
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                                <tr bgcolor="#245397">
                                    <th><font color="white">Jabatan</th>
                                    <th><font color="white">Mulai</th>
                                    <th><font color="white">Selesai</th>
                                    <th><font color="white">Kebutuhan</th>
                                    <th><font color="white">Kandidat</th>
                                    <th><font color="white">Kualifikasi/Keahlian/SKA</th>
                                    <th><font color="white">PIC</th>
                                    <th><font color="white">Catatan</th>
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
                                    <span class="add-on">Divisi</span>
                                    <select id="caridivisi" class="m-wrap large">
                                        <option value="">-- Pilih Divisi --</option>
                                        <?php foreach ($divisi as $row) {
                                        echo "<option value=".$row->kunit.">".$row->namaunit."</option>";
                                        } ?>
                                    </select> 
                                </div>
                                <div class="input-prepend">
                                    <span class="add-on">Tahun</span>
                                    <select class="m-wrap small" id='caritahun'>   
                                        <?php for ($i=(date('Y')-5); $i < (date('Y')+20); $i++) { 
                                            if(date('Y') == $i){ 
                                                echo "<option value='".$i."' selected>".$i."</option>";
                                            } else {
                                                echo "<option value='".$i."'>".$i."</option>";
                                            }
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
                                <a class="btn green" style='margin-right: 10px;' id="cari" onClick="carireportmppproyek()"><i class="icon-search"></i> Cari</a>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" >
                            <thead>
                                <tr bgcolor="#245397">
                                    <th><font color="white">No MPP</th>
                                    <th><font color="white">Divisi</th>
                                    <th><font color="white">Nama</th>
                                    <th><font color="white">Tahun</th>
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
                                <label class="control-label"><b>Divisi</b></label>
                                <div class="controls">
                                    <span class="text" id='detdivisi'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>Tahun</b></label>
                                <div class="controls">
                                    <span class="text" id='dettahun'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6 ">
                            <div class="control-group">
                                <label class="control-label"><b>Nama Proyek</b></label>
                                <div class="controls">
                                    <span class="text" id='detproyek'></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover table-full-width" >
                        <thead>
                            <tr bgcolor="#245397">
                                <th><font color="white">Jabatan</th>
                                <th><font color="white">Mulai</th>
                                <th><font color="white">Selesai</th>
                                <th><font color="white">Kebutuhan</th>
                                <th><font color="white">Kandidat</th>
                                <th><font color="white">Kualifikasi/Keahlian/SKA</th>
                                <th><font color="white">PIC</th>
                                <th><font color="white">Catatan</th>
                                <th><font color="white">Action</th>
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
        <h4 class="modal-title" id='judul'><i class='icon-add'></i><b>Tambah Detail MPP Team Proyek</b></h4>
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
                        <label class="control-label">Mulai</label>
                        <div class="controls">
                            <input type="text" class="s-wrap span2 date-picker" id="mulai" >
                        </div>
                    </div>    
                    <div class="control-group">
                        <label class="control-label">Selesai</label>
                        <div class="controls">
                            <input type="text" class="s-wrap span2 date-picker" id="selesai" >
                        </div>
                    </div>    
                    <div class="control-group">
                        <label class="control-label">Jenis Kebutuhan / Pemenuhan</label>
                        <div class="controls">
                            <select id="kebutuhan" class="s-wrap span3" onchange='getkandidat()'>
                                <option value="Rotasi">Rotasi</option>
                                <option value="Penyedia Eksternal">Penyedia Eksternal</option>
                                <option value="Rekrutmen">Rekrutmen</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Kandidat</label>
                        <div class="controls">
                            <select id="kandidat" class="s-wrap span5">
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
                        <label class="control-label">Kualifikasi / Keahlian / SKA</label>
                        <div class="controls">
                            <textarea class="medium s-wrap span6" id="kualifikasi" rows="2" ></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">PIC</label>
                        <div class="controls">
                            <textarea class="medium s-wrap span6" id="pic" rows="2"></textarea>
                        </div>
                    </div>   
                    <div class="control-group">
                        <label class="control-label">Catatan</label>
                        <div class="controls">
                            <textarea class="medium s-wrap span6" id="catatan" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <a class="btn blue" href="#" id='simpandetail' onclick="tambahdetailmppproyek()"><i class="icon-plus"></i> Tambah Detail</a>
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
    document.getElementById("mulai").value='';
    document.getElementById("selesai").value='';
    document.getElementById("kebutuhan").value='';
    document.getElementById("kandidat").value='';
    document.getElementById("kualifikasi").value='';
    document.getElementById("pic").value='';
    document.getElementById("catatan").value='';
    $('#kandidat').attr('disabled',false);
}

function batalmppproyek(){
    xajax_batalmppproyek();
}

function done(){
    document.getElementById("appdivisi").value='';
    document.getElementById("appproyek").value='';
    document.getElementById("appnompp").innerHTML='';
    document.getElementById("detailappmpp").innerHTML='';
    $('#closempp').hide();
}

function simpanmppproyek(){
    xajax_simpanmppproyek(document.getElementById("nompp").value,
                      document.getElementById("tglentry").value,
                      document.getElementById("divisi").value,
                      document.getElementById("tahun").value,
                      document.getElementById("proyek").value );
}

function cekunitmpp(){
    if (document.getElementById("divisi").value == '' || document.getElementById("tahun").value == '' || document.getElementById("proyek").value == '') {
        $('#tambah').modal('hide');
        alert('Divisi / Tahun / Nama Proyek Belum Di Isi');
    } else {
        $('#tambah').modal('show');
    } 
}

function tambahdetailmppproyek(){
    xajax_tambahdetailmppproyek(document.getElementById("nompp").value,
                        document.getElementById("jabatan").value,
                        document.getElementById("mulai").value,
                        document.getElementById("selesai").value,
                        document.getElementById("kebutuhan").value,
                        document.getElementById("kandidat").value,
                        document.getElementById("kualifikasi").value,
                        document.getElementById("pic").value,
                        document.getElementById("catatan").value);
}

function hapusdetailmppproyek(nompp,noindex){
    xajax_hapusdetailmppproyek(nompp,noindex);
}

function detailmppproyek(nompp){
    xajax_detailmppproyek(nompp);
}

function carimppproyekopen(){
    xajax_carimppproyekopen(document.getElementById("appdivisi").value);
}

function carireportmppproyek(){
    xajax_carireportmppproyek(document.getElementById("caridivisi").value,
                      document.getElementById("tahun").value,
                      document.getElementById("caristatus").value );
}

function carimppproyekapp(){
    xajax_carimppproyekapp(document.getElementById("appnompp").value);
}

function accdetmppproyek(nompp,noindex){
    xajax_accdetmppproyek(nompp,noindex);
}

function closemppproyek(){
    xajax_closemppproyek(document.getElementById("appnompp").value);
}

function getkandidat(){
    var jenis = document.getElementById("kebutuhan").value;
    if (jenis!='Rotasi') {
        document.getElementById("kandidat").value='';
        $('#kandidat').attr('disabled',true);
    } else {
        $('#kandidat').attr('disabled',false);
    }
}

$('#cari').on('input',function(e){
    xajax_caripegawai(document.getElementById('cari').value);
});
</script>

