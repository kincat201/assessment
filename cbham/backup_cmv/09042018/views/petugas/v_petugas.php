<div class="portlet">
    <a class="btn blue" href="<?php echo base_url('petugas/add');?>"><i class="icon-plus"></i> Tambah Petugas</a>
    <!-- <a class="btn green" href="#"><i class="icon-download"></i> Download</a>
    <a class="btn purple" href="#"><i class="icon-download"></i> Print</a> -->
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
            <th>Nopeg</th>
            <th>Nama</th>
            <th>Unit</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($all as $row) { ?>
                <tr>
                    <td><?=$row->nopeg; ?></td>
                    <td><?=$row->nama;?></td>
                    <td><?=$row->unit ?></td>
                    <td>

                        <a class="btn mini blue" href="<?php echo base_url('petugas/detail/'.$row->nopeg)?>"><i class="icon-list"></i> Detail</a> 
                        <a class="btn mini yellow" href="<?php echo base_url('petugas/edit/'.$row->nopeg)?>"><i class="icon-edit"></i> Edit</a> 
                        <a data-toggle="modal" href="#delete<?=$row->nopeg?>" class="btn mini red"><i class="icon-trash"></i> Delete</a> 
                    </td>
                </tr>
                <?=modal_delete('delete'.$row->nopeg,site_url('petugas/delete/'.$row->nopeg))?>
            <?php }?>
          
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

