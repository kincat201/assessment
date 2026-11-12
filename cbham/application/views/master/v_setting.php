<?php echo @$err; ?>
<div id='alert'></div>

  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <!-- <input type="button" value="Cetak.." onClick="location.href='<?=base_url()."index.php/plant/cetakfinish"?>'"> -->
          <!-- <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/setting/cetaksetting"?>'"><i class="icon-download"></i> Download XLS</a> -->
          <!-- <a style='float:right; margin-right: 10px;' class="btn purple" data-toggle="modal" href="#stack1"><i class="icon-download"></i> Download XLS</a> -->
          <!-- <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah setting</a> -->
<!--           <div class="input-prepend">
            <span class="add-on">setting</span>
            <input class="m-wrap medium" type="text" placeholder="Cari setting" id="cari" name="cari" onchange="carisetting();" oninput="this.onchange();"/>
          </div> -->
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>NIK</th>
          <th>Nama</th>
          <th>Username</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='setting'>
          <?php 
          foreach ($setting as $row) { ?>
              <tr>
                  <td><?=$row->nik ?></td>
                  <td><?=$row->nama ?></td>
                  <td><?=$row->username ?></td>
                  <td><?=$row->password ?></td>
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editsetting('<?php echo $row->nik?>')"><i class="icon-edit"></i> Edit </a>
                      <!-- <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapussetting('<?php echo $row->nik?>')"><i class="icon-trash"></i> Hapus</a>  -->

<!--                       <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editsetting("<?php echo $row->noindex?>")"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapussetting("<?php echo $row->noindex?>")"><i class="icon-trash"></i> Hapus</a>  -->
                  </td>
              </tr>
          <?php }?>
        </tbody>
      </table>

  </div>
</div>

<div id="tambah" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Tambah setting</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">setting</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namasetting">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Deskripsi setting</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsisetting">
            </div>
          </div>
        </form>
      </div>
    </div>    
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpansetting()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Setting</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">NIK</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="nik" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="nama">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Username</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="username">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Password Lama</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="passwordlama">
            </div>
          </div>                    
          <div class="control-group">
            <label class="control-label">Password Baru</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="passwordbaru">
            </div>
          </div>                              
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updatesetting()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Hapus setting</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode setting</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodesetting2" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama setting</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namasetting2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi setting</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsisetting2">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="deletesetting()"><i class="icon-save"></i> Hapus</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<script type="application/javascript">
function simpansetting(){
   xajax_simpansetting(document.getElementById("namasetting").value,document.getElementById("deskripsisetting").value);
}

function editsetting(noindex){
  xajax_editsetting(noindex);
}

function hapussetting(noindex){
  xajax_hapussetting(noindex);
}

function updatesetting(){
  xajax_updatesetting(document.getElementById("nik").value,document.getElementById("passwordbaru").value);
}

function deletesetting(){
  xajax_deletesetting(document.getElementById("kodesetting2").value,document.getElementById("namasetting2").value,document.getElementById("deskripsisetting2").value);
}

$('#cari').on('input',function(e){
    xajax_carisetting(document.getElementById('cari').value);
});
</script>

