<?php echo @$err; ?>  
  <div id='alert'></div>
  <div class="row-fluid" style="height:750px !important; overflow-y: scroll;">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <div class="input-prepend">
            <span class="add-on">Jabatan </span>
            <select id="jabatan1" class="m-wrap span8" onchange="getstruktur()">
              <option value="">-- Pilih Jabatan --</option>
              <?php foreach ($jabatan as $row) {
                echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
              } ?>
            </select> 
          </div>
        </div>
      </div>
      <div class="portlet">
        <div class="form-search fright">
            <div class="input-prepend">
              <span class="add-on">Underline</span>
              <select id="jabatan2" class="m-wrap span8">
                <option value="">-- Pilih Jabatan --</option>
                <?php foreach ($jabatan as $row) {
                  echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                } ?>
              </select> 
              <a class="btn green" href="#" onclick="tambahstruktur()"><i class="icon-plus"></i> Tambah</a>
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


<script type="application/javascript">
function tambahstruktur(){
  xajax_tambahstruktur(document.getElementById("jabatan1").value,document.getElementById("jabatan2").value );
}

function getstruktur(){
  xajax_getstruktur(document.getElementById("jabatan1").value);
}

</script>


