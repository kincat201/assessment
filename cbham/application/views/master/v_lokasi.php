
<div class="portlet">
    <a class="btn blue" href="<?php echo base_url('master/add/lokasi');?>"><i class="icon-plus"></i> Tambah Lokasi</a>
</div>

<?php echo @$err; ?>
<div class="portlet box green">
  <div class="portlet-title">
    <div class="caption"><i class="icon-list"></i><?=$title?></div>
    <div class="actions">
    </div>
  </div>
  <div class="portlet-body" style="height:500px !important; overflow-y: scroll; ">
      <table class="table table-striped table-bordered table-hover table-full-width" >
          <thead>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Lokasi</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            foreach ($lokasi as $row) { ?>
                <tr>
                    <td><?=$i; ?></td>
                    <td><?=$row->k_lokasi ?></td>
                    <td><?=$row->lokasi ?></td>
                    <td>
                        <a class="btn mini yellow" href="<?php echo base_url('master/update/lokasi/'.$row->id_lokasi)?>"><i class="icon-edit"></i> Edit</a> 
                        <a data-toggle="modal" href="#delete<?=$row->id_lokasi?>" class="btn mini red"><i class="icon-trash"></i> Delete</a> 
                    </td>
                </tr>
                <?=modal_delete('delete'.$row->id_lokasi,site_url('master/delete_lokasi/'.$row->id_lokasi))?>
            <?php $i++; }?>
          
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

