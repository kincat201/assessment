<?php echo @$err; ?>
<div id='alert'></div>

  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <div class="input-prepend">
            <span class="add-on">Cari Dokumen</span>
            <input class="m-wrap medium" type="text" placeholder="" id="cari" name="cari" onchange="caridownloaddok();" oninput="this.onchange();"/>
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
          foreach ($uploaddok as $row) { ?>
              <tr>                  
                  <td><?=$row->noindex; ?></td>
                  <td><?=$row->namafile ?></td>
                  <td><?=$row->url ?></td>
                  <td>
                      <a class="btn mini purple sbold" target="_blank" href="<?=base_url()."pdf/$row->namafile"?>"><i class="icon-download"></i> Download</a>
                  </td>
              </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>

<script type="application/javascript">

$('#cari').on('input',function(e){
    xajax_caridownloaddok(document.getElementById('cari').value);
});
</script>

