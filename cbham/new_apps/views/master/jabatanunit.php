<?php echo @$err; ?>  
  <div id='alert'></div>
  <div class="row-fluid">
    <div class="span12">
      <div class="portlet">
        <div class="form-search fright">
          <div class="input-prepend">
            <span class="add-on">Unit </span>
            <select id="unit" class="m-wrap selectpicker show-tick span8" data-live-search="true" onchange="getJabatanUnit()">
              <option value="">-- Pilih Unit --</option>
              <?php foreach ($unit as $row) {
                echo "<option value=".$row->kunit.">".$row->namaunit."</option>";
              } ?>
            </select> 
          </div>
        </div>
      </div>
      <div class="portlet">
        <div class="form-search fright">
            <div class="input-prepend">
              <span class="add-on">Jabatan</span>
              <select id="jabatan" class="m-wrap span8 selectpicker" data-live-search="true">
                <option value="">-- Pilih Jabatan --</option>
                <?php foreach ($jabatan as $row) {
                  echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                } ?>
              </select> 
              <a class="btn green" href="#" onclick="tambahJabatanUnit()"><i class="icon-plus"></i> Tambah</a>
            </div>
          </div>
      </div>


      <table class="table table-striped table-bordered table-hover table-full-width" >
        <thead>
        <tr>
          <th>Unit</th>
          <th>Nama Jabatan</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody id='list_jabatanUnit'>
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
function tambahJabatanUnit(){
  xajax_tambahJabatanUnit(document.getElementById("unit").value,document.getElementById("jabatan").value );
}

function getJabatanUnit(){
  xajax_getJabatanUnit(document.getElementById("unit").value);
}

function hapusJabatanUnit(unit,jabatan){
  xajax_hapusJabatanUnit(unit,jabatan);
}

</script>


