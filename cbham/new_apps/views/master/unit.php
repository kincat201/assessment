<?php echo @$err; ?>
<div id='alert'></div>
<!-- <div class="portlet box green">
  <div class="portlet-title">
    <div class="caption"><i class="icon-list"></i><?=$title?></div>
    <div class="actions">
    </div>
  </div>
  <div class="portlet-body" style="height:750px !important; overflow-y: scroll;"> -->
  <div class="row-fluid">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/unit/cetakunit"?>'"><i class="icon-download"></i> Download XLS</a>
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Unit</a>
          <div class="input-prepend">
            <span class="add-on">Unit</span>
            <input class="m-wrap medium" type="text" placeholder="Cari Unit" id="cari" name="cari" onchange="cariunit();" oninput="this.onchange();"/>
          </div>
        </div>
          <!-- Cari <input type="text" class="m-wrap span3" id="cari" onchange="cariunit();" oninput="this.onchange();"> -->
          <!-- <a class="btn purple" href="#"><i class="icon-download"></i> Print</a> -->
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Kode</th>
          <th>Nama Unit</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='unit'>
          <?php 
          foreach ($unit as $row) { ?>
              <tr>
                  <td><?=$row->kunit; ?></td>
                  <td><?=$row->namaunit ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editunit('<?php echo $row->kunit?>')"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapusunit('<?php echo $row->kunit?>')"><i class="icon-trash"></i> Hapus</a> 
                  </td>
              </tr>
          <?php }?>
        </tbody>
      </table>
      <div class="pagination pull-right" id="pagination"><?= $pagination ?></div>

  </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Tambah Unit</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Nama Unit</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="nama">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpanunit()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Unit</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Unit</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kunit" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Unit</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namaunit">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updateunit()"><i class="icon-save"></i> Update</a>
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
              <input type="text" class="s-wrap span3" id="kunit2">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn red" href="#" onclick="deleteunit()"><i class="icon-trash"></i> Ya</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Tidak</a>
    </div>
  </div>
</div>

<script type="application/javascript">
function simpanunit(){
   xajax_simpanunit(document.getElementById("nama").value );
}

function editunit(kunit){
  xajax_editunit(kunit);
}

function updateunit(){
  xajax_updateunit(document.getElementById("kunit").value,document.getElementById("namaunit").value);
}

$(document).ready(function() {    
    $('#kunit2').hide();
});

function hapusunit(kunit){
  xajax_hapusunit(kunit);
}

function deleteunit(){
  xajax_deleteunit(document.getElementById("kunit2").value);
}

function changepage(el){
  var page = $( el ).data('page');
  xajax_cariunit(document.getElementById('cari').value,page);
}

$('#cari').on('input',function(e){
    xajax_cariunit(document.getElementById('cari').value,1);
});
</script>

