<?php echo @$err; ?>
<div id='alert'></div>

  <div class="row-fluid">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/polarisasi/cetakpolarisasi"?>'"><i class="icon-download"></i> Download XLS</a>
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Polarisasi</a>
          <div class="input-prepend">
            <span class="add-on">Polarisasi</span>
            <input class="m-wrap medium" type="text" placeholder="Cari Polarisasi" id="cari" name="cari" onchange="caripolarisasi();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Kode</th>
          <th>Polarisasi</th>
          <th>Deskripsi</th>
          <th>Formula</th>
          <th>Konstanta</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='polarisasi'>
          <?php 
          foreach ($polarisasi as $row) { ?>
              <tr>
                  <td><?=$row->noindex; ?></td>
                  <td><?=$row->polarisasi ?></td>
                  <td><?=$row->deskripsi ?></td>
                  <td><?=$row->formula ?></td>
                  <td><?=$row->konstanta ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editpolarisasi('<?php echo $row->noindex?>')"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapuspolarisasi('<?php echo $row->noindex?>')"><i class="icon-trash"></i> Hapus</a> 
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
      <h4 class="modal-title"><i class='icon-add'></i> Tambah Polarisasi</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Polarisasi</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namapolarisasi">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Deskripsi Polarisasi</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsipolarisasi">
            </div>
          </div>
        </form>
      </div>
    </div>    
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Formula</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="formula">
            </div>
          </div>
        </form>
      </div>
    </div>    
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Konstanta</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="konstanta">
            </div>
          </div>
        </form>
      </div>
    </div>            
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpanpolarisasi()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Polarisasi</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Polarisasi</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodepolarisasi" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Polarisasi</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namapolarisasi1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi Polarisasi</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsipolarisasi1">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Formula</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="formula1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Konstanta</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="konstanta1">
            </div>
          </div>                    
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updatepolarisasi()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Hapus Polarisasi</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Polarisasi</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodepolarisasi2" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama Polarisasi</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namapolarisasi2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi Polarisasi</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsipolarisasi2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Formula</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="formula2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Konstanta</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="konstanta2">
            </div>
          </div>                                        
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="deletepolarisasi()"><i class="icon-save"></i> Hapus</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<script type="application/javascript">
function simpanpolarisasi(){
   xajax_simpanpolarisasi(document.getElementById("namapolarisasi").value,document.getElementById("deskripsipolarisasi").value,document.getElementById("formula").value,document.getElementById("konstanta").value);
}

function editpolarisasi(noindex){
  xajax_editpolarisasi(noindex);
}

function hapuspolarisasi(noindex){
  xajax_hapuspolarisasi(noindex);
}

function updatepolarisasi(){
  xajax_updatepolarisasi(document.getElementById("kodepolarisasi").value,document.getElementById("namapolarisasi1").value,document.getElementById("deskripsipolarisasi1").value,document.getElementById("formula1").value,document.getElementById("konstanta1").value);
}

function deletepolarisasi(){
  xajax_deletepolarisasi(document.getElementById("kodepolarisasi2").value,document.getElementById("namapolarisasi2").value,document.getElementById("deskripsipolarisasi2").value,document.getElementById("formula2").value,document.getElementById("konstanta2").value);
}

function changepage(el){
  var page = $( el ).data('page');
  xajax_caripolarisasi(document.getElementById('cari').value,page);
}

$('#cari').on('input',function(e){
    xajax_caripolarisasi(document.getElementById('cari').value,1);
});
</script>

