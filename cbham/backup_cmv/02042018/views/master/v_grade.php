<?php echo @$err; ?>
<div id='alert'></div>

  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <!-- <input type="button" value="Cetak.." onClick="location.href='<?=base_url()."index.php/plant/cetakfinish"?>'"> -->
          <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/grade/cetakgrade"?>'"><i class="icon-download"></i> Download XLS</a>
          <!-- <a style='float:right; margin-right: 10px;' class="btn purple" data-toggle="modal" href="#stack1"><i class="icon-download"></i> Download XLS</a> -->
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Grade</a>
          <div class="input-prepend">
            <span class="add-on">Grade</span>
            <input class="m-wrap medium" type="text" placeholder="Cari Grade" id="cari" name="cari" onchange="carigrade();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Kode</th>
          <th>Grade</th>
          <th>Struktural</th>
          <th>Fungsional</th>
          <th>Kelas</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='grade'>
          <?php 
          foreach ($grade as $row) { ?>
              <tr>
                  <td><?=$row->noindex; ?></td>
                  <td><?=$row->grade ?></td>
                  <td><?=$row->struktural ?></td> 
                  <td><?=$row->fungsional ?></td> 
                  <td><?=$row->kelas ?></td> 
                  <td>
                      <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editgrade('<?php echo $row->noindex?>')"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapusgrade('<?php echo $row->noindex?>')"><i class="icon-trash"></i> Hapus</a> 

<!--                       <a class="btn mini yellow sbold" data-toggle="modal" href="#edit" onClick="editgrade("<?php echo $row->noindex?>")"><i class="icon-edit"></i> Edit </a>
                      <a class="btn mini red sbold" data-toggle="modal" href="#delete" onClick="hapusgrade("<?php echo $row->noindex?>")"><i class="icon-trash"></i> Hapus</a>  -->
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
      <h4 class="modal-title"><i class='icon-add'></i> Tambah Grade</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Grade</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namagrade">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Struktural</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="struktural">
            </div>
          </div>
        </form>
      </div>
    </div>    
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Fungsional</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="fungsional">
            </div>
          </div>
        </form>
      </div>
    </div>        
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kelas</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kelas">
            </div>
          </div>
        </form>
      </div>
    </div>                  
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="simpangrade()"><i class="icon-save"></i> Simpan</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Grade</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Grade</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodegrade" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Grade</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namagrade1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Struktural</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="struktural1">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Fungsional</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="fungsional1">
            </div>
          </div>                    
          <div class="control-group">
            <label class="control-label">Kelas</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kelas1">
            </div>
          </div>                                                
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updategrade()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Hapus Grade</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode Grade</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodegrade2" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Grade</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namagrade2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Struktural</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="struktural2">
            </div>
          </div>          
          <div class="control-group">
            <label class="control-label">Fungsional</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="fungsional2">
            </div>
          </div>                    
          <div class="control-group">
            <label class="control-label">Kelas</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="kelas2">
            </div>
          </div>                         
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="deletegrade()"><i class="icon-save"></i> Hapus</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<script type="application/javascript">
function simpangrade(){
   xajax_simpangrade(document.getElementById("namagrade").value,document.getElementById("struktural").value,document.getElementById("fungsional").value,document.getElementById("kelas").value);
}

function editgrade(noindex){
  xajax_editgrade(noindex);
}

function hapusgrade(noindex){
  xajax_hapusgrade(noindex);
}

function updategrade(){
  xajax_updategrade(document.getElementById("kodegrade").value,document.getElementById("namagrade1").value,document.getElementById("struktural1").value,document.getElementById("fungsional1").value,document.getElementById("kelas1").value);
}

function deletegrade(){
  xajax_deletegrade(document.getElementById("kodegrade2").value,document.getElementById("namagrade2").value,document.getElementById("struktural2").value,document.getElementById("fungsional2").value,document.getElementById("kelas2").value);
}

$('#cari').on('input',function(e){
    xajax_carigrade(document.getElementById('cari').value);
});
</script>

