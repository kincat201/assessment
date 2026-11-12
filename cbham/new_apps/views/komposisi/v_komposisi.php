
<form action="<?php base_url('komposisi')?>" class="form-search fright" method="GET">
    <div class="clearfix">
        <div class="input-prepend">
            <span class="add-on">Tahun </span>
            <select name="tahun" id="ktahun" class="m-wrap small">
                <option value="all">All</option>
                <?php 
                $x = 2010;
                for ($i=0; $i <1000 ; $i++) { 
                    ?>
                    <option value="<?php echo $x; ?>" ><?php echo $x; ?></option>
                    <?php
                    $x++;
                }
                ?>
            </select>
            <!-- <select name="tahun" id="ktahun" class="m-wrap small">
                <?php 
                $x = 2010;
                for ($i=0; $i <100 ; $i++) { 
                    ?>
                    <option value="<?php echo $x; ?>" <?php if(@$_GET["tahun"] == $x){echo "selected";} ?>><?php echo $x; ?></option>
                    <?php
                    $x++;
                }
                ?>
            </select> -->
            <script type="text/javascript">
                var kthn = "<?php echo @$_GET['tahun']; ?>";
                if (kthn != '') {
                    $('#ktahun').val(kthn);
                    
                }else{
                    $('#ktahun').val("<?php echo date('Y'); ?>");
                    
                }
                // $('#ktahun').change(function(){
                //     $('#ref').submit();
                // });
            </script>
        </div>
        <div class="input-prepend">
            <span class="add-on">Station </span>
            <select name="stat" class="m-wrap small">
                <option value="" <?php if(@$_GET["stat"] == "all"){echo "selected";} ?>>All</option>
                <?php foreach ($station as $row): ?>
                    <option value="<?php echo $row->id_station; ?>" <?php if(@$_GET["stat"] == $row->id_station){echo "selected";} ?>><?php echo $row->k_station.' - '.$row->station; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="input-prepend">
            <span class="add-on">Phase </span>
            <select name="phase" class="m-wrap small">
                <option value="" <?php if(@$_GET["phase"] == "all"){echo "selected";} ?>>All</option>
                <option value="1" <?php if(@$_GET["phase"] == "1"){echo "selected";} ?>>1</option>
                <option value="2" <?php if(@$_GET["phase"] == "2"){echo "selected";} ?>>2</option>
            </select>
        </div>
        <div class="input-prepend">
            <span class="add-on">Lokasi </span>
            <select name="lokasi" class="m-wrap small">
                <option value="" <?php if(@$_GET["lokasi"] == "all"){echo "selected";} ?>>All</option>
                <?php foreach ($lokasi as $row): ?>
                    <option value="<?php echo $row->id_lokasi; ?>" <?php if(@$_GET["lokasi"] == $row->id_lokasi){echo "selected";} ?>><?php echo $row->k_lokasi.' - '.$row->lokasi; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        
        <input type="hidden" name="act" value="browse"/>
        <input type="submit" name="search_btn" value="Search" class="btn blue">
        <a href="<?php echo base_url('komposisi')?>"><button class="btn red" type="button" style="vertical-align: top;">Reset</button></a>
    </div>
</form>

<div class="portlet">
    <a class="btn blue" href="<?php echo base_url('komposisi/add');?>"><i class="icon-plus"></i> Tambah Komposisi</a>
    <a class="btn green" href="<?php echo base_url('komposisi/download');?>"><i class="icon-download"></i> Download</a>
    <a class="btn purple" onclick="printDiv('printableArea')" target="blank"><i class="icon-print"></i> Print</a>
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
                <th>STN/EMB</th>
                <th>Phase</th>
                <th>Lokasi</th>
                <th>Jenis Pekerjaan</th>
                <th>Jumlah Orang</th>
                <th>Shift</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $i = 1;
            foreach ($all as $row) { ?>
                <tr>
                    <td><?=$i; ?></td>
                    <td><?=getDesc($row->id_station,'station')?></td>
                    <td><?=$row->phase ?></td>
                    <td><?=getDesc($row->id_lokasi,'lokasi') ?></td>
                    <td><?=getDesc($row->id_pekerjaan,'pekerjaan')?></td>
                    <td><?=$row->jumlah_petugas ?></td>
                    <td><?=$row->shift ?></td>
                    <td><?=$row->keterangan ?></td>
                    <td>
                        <a class="btn mini yellow" href="<?php echo base_url()?>komposisi/edit/<?php echo $row->id_komposisi?>"><i class="icon-edit"></i> Edit</a> 
                        <a data-toggle="modal" href="#delete<?=$row->id_komposisi?>" class="btn mini red"><i class="icon-trash"></i> Delete</a> 
                        <a class="btn mini blue" href="<?php echo base_url()?>komposisi/add_petugas/<?php echo $row->id_komposisi?>"><i class="icon-plus"></i> Petugas</a> 
                        <a class="btn mini purple" href="<?php echo base_url()?>penilaian/add_penilaian_by_id/<?php echo $row->id_komposisi?>"><i class="icon-pencil"></i> Penilaian</a> 
                    </td>
                </tr>
                <?=modal_delete('delete'.$row->id_komposisi,site_url('komposisi/delete/'.$row->id_komposisi))?>
            <?php $i++; }?>
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

<div id="printableArea">

    <div class="portlet box">
      <div class="portlet-title">
        <div class="caption"><i class="icon-list"></i><?=$title?></div>
        <div class="actions">
        </div>
      </div>
      <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover table-full-width" >
            <thead>
                <tr>
                   <th>No</th>
                   <th>STN/EMB</th>
                   <th>Phase</th>
                   <th>Jenis Pekerjaan</th>
                   <th>Jumlah Orang</th>
                   <th>Shift</th>
                   <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                foreach ($all as $row) { ?>
                    <tr>
                        <td><?=$i; ?></td>
                        <td><?=getDesc($row->id_station,'station')?></td>
                        <td><?=$row->phase ?></td>
                        <td><?=getDesc($row->id_pekerjaan,'pekerjaan')?></td>
                        <td><?=$row->jumlah_petugas ?></td>
                        <td><?=$row->shift ?></td>
                        <td><?=$row->keterangan ?></td>
                    </tr>
                <?php $i++; }?>
            </tbody>
        </table>
      </div>
    </div>
</div>

<script type="text/javascript">
$('#printableArea').hide();

function printDiv(divName) {

     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>