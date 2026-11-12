<?php echo @$err; ?>
<div id='alert'></div>
<!-- <div class="portlet box green">
  <div class="portlet-title">
    <div class="caption"><i class="icon-list"></i><?=$title?></div>
    <div class="actions">
    </div>
  </div>
  <div class="portlet-body" style="height:500px !important; overflow-y: scroll; "> -->
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/jabatan/cetakjabatan"?>'"><i class="icon-download"></i> Download XLS</a>
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Jabatan</a>
          <!-- Cari <input type="text" class="m-wrap span3" id="cari" onchange="cariunit();" oninput="this.onchange();"> -->
          <!-- <a class="btn purple" href="#"><i class="icon-download"></i> Print</a> -->
          <div class="input-prepend">
            <span class="add-on">Jabatan</span>
            <input class="m-wrap medium" type="text" placeholder="Cari Jabatan" id="cari" name="cari" onchange="carijabatan();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Kode</th>
          <th>Nama Jabatan</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='jabatan'>
          <?php 
          foreach ($jabatan as $row) { ?>
              <tr>
                  <td><?=$row->kojab; ?></td>
                  <td><?=$row->namajabatan ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editjabatan('<?php echo $row->kojab?>')"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapusjabatan('<?php echo $row->kojab?>')"><i class="icon-trash"></i> Hapus</a> 
                  </td>
              </tr>
          <?php }?>
        </tbody>
      </table>
    
    <!-- <div class="row-fluid" style="margin-top: 10px;">
        <div class="span2" style="padding-top: 5px;">Total 4<?php //echo @$total; ?> Data</div>  
        <div class="span10" style="text-align: right;">
          <div id="paging_status" class="pagination" style="margin: 0px;">
            <div class="pagination" style="margin: 0px;">
              <ul>
                <?php echo @$paging; ?>
              </ul>
            </div>
          </div>
      </div>
    </div> -->

  </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Tambah Jabatan</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Nama Jabatan</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="nama">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
              <label class="control-label">Nama Kelompok</label>
              <div class="controls">
                <select data-placeholder="Choose a Category" id='kelompok' tabindex="1">
                  <option value=''>Pilih Kelompok</option>
                  <?php foreach ($kelomjab as $row) {
                      echo "<option value='".$row->kodekelom."'>".$row->namakelompok."</option>";
                  } ?>
                </select>
              </div>
          </div>
        </form>
      </div>
    </div>    
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpanjabatan()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Jabatan</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Jabatan</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kojab" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Jabatan</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namajabatan">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updatejabatan()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Anda yakin akan menghapus data ini?</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kojab2">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn red" href="#" onclick="deletejabatan()"><i class="icon-trash"></i> Ya</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Tidak</a>
    </div>
  </div>
</div>

<script type="application/javascript">
function simpanjabatan(){
  xajax_simpanjabatan(document.getElementById("nama").value,document.getElementById("kelompok").value);
}

function editjabatan(kojab){
  xajax_editjabatan(kojab);
}

function updatejabatan(){
  xajax_updatejabatan(document.getElementById("kojab").value,document.getElementById("namajabatan").value);
}

$(document).ready(function() {    
    $('#kojab2').hide();
});

function hapusjabatan(kojab){
  xajax_hapusjabatan(kojab);
}

function deletejabatan(){
  xajax_deletejabatan(document.getElementById("kojab2").value);
}

$('#cari').on('input',function(e){
    xajax_carijabatan(document.getElementById('cari').value);
});
</script>


