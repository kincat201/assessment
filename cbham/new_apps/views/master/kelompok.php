<?php echo @$err; ?>
<div id='alert'></div>
<!-- <div class="portlet box green">
  <div class="portlet-title">
    <div class="caption"><i class="icon-list"></i><?=$title?></div>
    <div class="actions">
    </div>
  </div>
  <div class="portlet-body" style="height:500px !important; overflow-y: scroll; "> -->
  <div class="row-fluid">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/kelompok/cetakkelompok"?>'"><i class="icon-download"></i> Download XLS</a>
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Kelompok</a>
          <!-- Cari <input type="text" class="m-wrap span3" id="cari" onchange="cariunit();" oninput="this.onchange();"> -->
          <!-- <a class="btn purple" href="#"><i class="icon-download"></i> Print</a> -->
          <div class="input-prepend">
            <span class="add-on">Kelompok</span>
            <input class="m-wrap medium" type="text" placeholder="Cari Kelompok" id="cari" name="cari" onchange="carikelompok();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Kode</th>
          <th>Kelompok</th>
          <th>KRA</th>
          <th>KBA</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='kelompok'>
          <?php 
          foreach ($kelompok as $row) { ?>
              <tr>
                  <td><?=$row->kodekelom; ?></td>
                  <td><?=$row->namakelompok ?></td>
                  <td><?=$row->kra ?></td>
                  <td><?=$row->kba ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editkelompok('<?php echo $row->kodekelom?>')"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapuskelompok('<?php echo $row->kodekelom?>')"><i class="icon-trash"></i> Hapus</a> 
                  </td>
              </tr>
          <?php }?>
        </tbody>
      </table>
      <div class="pagination pull-right" id="pagination"><?= $pagination ?></div>
    
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
      <h4 class="modal-title"><i class='icon-add'></i> Tambah Kelompok</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Nama Kelompok</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="nama">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">KRA</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kra">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">KBA</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kba">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpankelompok()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Kelompok</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Kelompok</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodekelom" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Kelompok</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namakelompok">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">KRA</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="krakel">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">KBA</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kbakel">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updatekelompok()"><i class="icon-save"></i> Update</a>
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
              <input type="text" class="s-wrap span3" id="kodekelom2">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn red" href="#" onclick="deletekelompok()"><i class="icon-trash"></i> Ya</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Tidak</a>
    </div>
  </div>
</div>

<script type="application/javascript">

$(document).ready(function() {    
    $('#kodekelom2').hide();
});

function simpankelompok(){
  xajax_simpankelompok(document.getElementById("nama").value,document.getElementById("kra").value,document.getElementById("kba").value);
}

function editkelompok(kode){
  xajax_editkelompok(kode);
}

function updatekelompok(){
  xajax_updatekelompok(document.getElementById("kodekelom").value,document.getElementById("namakelompok").value,document.getElementById("krakel").value,document.getElementById("kbakel").value);
}

function hapuskelompok(kode){
  xajax_hapuskelompok(kode);
}

function deletekelompok(){
  xajax_deletekelompok(document.getElementById("kodekelom2").value);
}

function changepage(el){
  var page = $( el ).data('page');
  xajax_carikelompok(document.getElementById('cari').value,page);
}

$('#cari').on('input',function(e){
    xajax_carikelompok(document.getElementById('cari').value,1);
});
</script>


