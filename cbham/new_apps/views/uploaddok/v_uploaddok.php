<?php echo @$err; ?>
<div id='alert'></div>

  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <!-- <a style='float:right; margin-right: 10px;' class="btn purple" onClick="location.href='<?=base_url()."index.php/uploaddok/cetakuploaddok"?>'"><i class="icon-download"></i> Download XLS</a> -->
          <a class="btn blue" style='float:right; margin-right: 10px;' data-toggle="modal" href="#tambah"><i class="icon-plus"></i> Tambah Dokumen</a>
          <div class="input-prepend">
            <span class="add-on">Cari Dokumen</span>
            <input class="m-wrap medium" type="text" placeholder="" id="cari" name="cari" onchange="cariuploaddok();" oninput="this.onchange();"/>
          </div>
        </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>          
          <th>Kode</th>          
          <th>Nama File</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='uploaddok'>
          <?php 
          if (count($uploaddok)>0) {
            foreach ($uploaddok as $row) { ?>
                <tr>                  
                    <td><?=$row->noindex; ?></td>
                    <td><?=$row->namafile ?></td>
                    <td><?=$row->url ?></td>
                    <td>
                        <a class="btn mini red sbold" href="#" onClick="deleteuploaddok('<?php echo $row->noindex?>')"><i class="icon-trash"></i> Hapus</a> 
                        <a class="btn mini purple sbold" target="_blank" href="<?=base_url()."pdf/$row->namafile"?>"><i class="icon-download"></i> Download</a>
                    </td>
                </tr>
          <?php 
            }
          } else {
            echo "<tr><td colspan='4'>Data Tidak Ada</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

<div id="tambah" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Upload Dokumen</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="uploadForm">
          <div class="control-group">
            <label class="control-label">Upload Dokumen</label>
            <div class="controls">
              <input name="upfile" id="upfile" type="file" onchange="ambilurl();"/>
              <div id="loading"></div>                        
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama File</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namafile">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">File Disimpan di Alamat</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="txtFolder">
              <div id="targetLayer"><b>No Files</b></div>
            </div>
          </div>            
          <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-success" href="#">
                  <span class="glyphicon glyphicon-save"></span> Simpan
              </button>
              <button type="button" class="btn btn-sm btn-primary" onclick='batalsimpandata()' href="#">
                  <span class="glyphicon glyphicon-remove"></span> Batal
              </button>                                                                                                                                        
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" href="#">
                  <span class="glyphicon glyphicon-off"></span> Keluar
              </button> 
          </div>            
        </form>
      </div>
    </div>
  </div>
</div>

<!-- <div id="edit" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Edit Dokumen</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode uploaddok</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodeuploaddok" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama uploaddok</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namauploaddok1">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Deskripsi uploaddok</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="deskripsiuploaddok1">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="updateuploaddok()"><i class="icon-save"></i> Update</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div> -->

<div id="delete" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
      <h4 class="modal-title"><i class='icon-add'></i> Hapus Dokumen</h4>
  </div>
  <div class="modal-body ">
    <div class="row-fluid">
      <div class="span12">
        <form class="form-horizontal " id="form">
          <div class="control-group">
            <label class="control-label">Kode</label>
            <div class="controls">
              <input type="text" class="s-wrap span3" id="kodedok2" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama File</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="namafile2">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Alamat File</label>
            <div class="controls">
              <input type="text" class="s-wrap span8" id="alamatfile2">
            </div>
          </div>          
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <a class="btn green" href="#" onclick="deleteuploaddok()"><i class="icon-save"></i> Hapus</a>
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"></i> Keluar</a>
    </div>
  </div>
</div>

<script type="application/javascript">

function ambilurl(){
  var nama = $('#upfile').val().substr(12,300);  
  // var nama = $('#upfile').val();    
  document.getElementById("namafile").value=nama.replace(' ','_');          
  var tempat = 'C:/inetpub/wwwroot/cbham/pdf/';
  // var tempat = 'C:/xampp/htdocs/cbham/pdf/';  
  var namafile = document.getElementById("namafile").value;  

  var tuju = tempat + namafile; 
  document.getElementById("txtFolder").value=tuju;  
} 

jQuery.fn.simpandata = function() {
  // if (document.getElementById('kelompok').value=='Formulir'){
  //   var nama = $('#namafile').val().substr(0,9);  
  // }else{
  //   var nama = $('#namafile').val().substr(0,10);  
  // }
  // if (document.getElementById('kodedok').value==nama){

  //   var textpilih = [];
  //   $.each($("input[name='opsi']:checked"), function(){  
  //       textpilih.push($(this).attr('id'));
  //   });

    xajax_simpandata(
        // document.getElementById('kelompok').value,
        // document.getElementById('subkelompok').value,
        // document.getElementById('kodedok').value,
        // document.getElementById('namadok').value,
        document.getElementById('namafile').value,
        document.getElementById('txtFolder').value
        // textpilih
    );
    batalsimpandata();
  // }else{
  //   alert('File yang diupload salah,coba periksa kembali !!!');
  // }
}

$(document).ready(function () {
    $("#uploadForm").on('submit',(function(e) {
      var name = $('#upfile').val();
      // document.getElementById('namafile').value,
      // document.getElementById('txtFolder').value
      // alert(name);
      var extension = name.substr( (name.lastIndexOf('.') +1) );
      // alert(extension);
      // if(extension=='xls'||extension=='xlsx'||extension=='pdf'||extension=='doc') {
      if((extension=='pdf')||(extension=='PDF')){
        document.getElementById("loading").innerHTML = "<img src='<?php echo base_url()."image/loadinglit.gif" ?>'>";
        e.preventDefault();
        $.ajax({
          url: "<?php echo base_url().'index.php/uploaddok/simpanuploaddok'?>",
          type: "POST",
          data:  new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          success: function(data){   
              alert(data);
              $(this).simpandata();
              $("#targetLayer").html('Upload Sukses');
              document.getElementById("loading").innerHTML = "";
            }           
        });
      }
      else{
        alert('Type file yang diupload salah. Type file yang diupload harus pdf');
        document.getElementById('upfile').value='';
        return false;
      }
    })); 
});

function batalsimpandata(){
  document.getElementById("upfile").value="";
  document.getElementById("namafile").value="";
  document.getElementById("txtFolder").value="";
}

// function simpanuploaddok(){
//    xajax_simpanuploaddok(document.getElementById("namauploaddok").value,document.getElementById("deskripsiuploaddok").value);
// }

// function edituploaddok(noindex){
//   xajax_edituploaddok(noindex);
// }

function hapusuploaddok(noindex){
  xajax_hapusuploaddok(noindex);
}

// function updateuploaddok(){
//   xajax_updateuploaddok(document.getElementById("kodeuploaddok").value,document.getElementById("namauploaddok1").value,document.getElementById("deskripsiuploaddok1").value);
// }

// function deleteuploaddok(){
//   xajax_deleteuploaddok(document.getElementById("kodedok2").value);
//   // xajax_deleteuploaddok(document.getElementById("kodedok2").value,document.getElementById("namafile2").value,document.getElementById("alamatfile2").value);
// }

function deleteuploaddok(noindex){
  xajax_deleteuploaddok(noindex);
}

$('#cari').on('input',function(e){
    xajax_cariuploaddok(document.getElementById('cari').value);
});
</script>

