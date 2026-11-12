<!-- 
<form action="<?php base_url('komposisi')?>" class="form-search fright" method="GET">
    <div class="clearfix">
        <div class="input-prepend">
            <span class="add-on">Tahun </span>
            <select name="tahun" id="ktahun" class="m-wrap small">
                <?php 
                $x = 2010;
                for ($i=0; $i <100 ; $i++) { 
                    ?>
                    <option value="<?php echo $x; ?>" <?php if(@$_GET["tahun"] == $x){echo "selected";} ?>><?php echo $x; ?></option>
                    <?php
                    $x++;
                }
                ?>
            </select>
            <script type="text/javascript">
                var kthn = "<?php echo @$_GET['tahun']; ?>";
                if (kthn != '') {
                    $('#ktahun').val(kthn);
                    
                }else{
                    $('#ktahun').val("<?php echo date('Y'); ?>");
                    
                }
            </script>
        </div>
        <div class="input-prepend">
            <span class="add-on">Station </span>
            <select name="stat" class="m-wrap small">
                <option value="" <?php if(@$_GET["stat"] == "all"){echo "selected";} ?>>All</option>
                <?php foreach ($station as $row): ?>
                    <option value="<?php echo $row->id_station; ?>" <?php if(@$_GET["stat"] == $row->id_station){echo "selected";} ?>><?php echo $row->station; ?></option>
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
                    <option value="<?php echo $row->id_lokasi; ?>" <?php if(@$_GET["lokasi"] == $row->id_lokasi){echo "selected";} ?>><?php echo $row->lokasi; ?></option>
                <?php endforeach ?>
            </select>
        </div>
        
        <input type="hidden" name="act" value="browse"/>
        <input type="submit" name="search_btn" value="Search" class="btn blue">
        <a href="#"><button class="btn red" type="button" style="vertical-align: top;">Reset</button></a>
    </div>
</form> -->

<!-- <div class="portlet">
    <a class="btn blue" href="<?php echo base_url('komposisi/add');?>"><i class="icon-plus"></i> Tambah Komposisi</a>
    <a class="btn green" href="#"><i class="icon-download"></i> Download</a>
    <a class="btn purple" href="#"><i class="icon-download"></i> Print</a>
</div> -->
<!-- 
<?php echo @$err; ?>
<div class="portlet box green">
  <div class="portlet-title">
    <div class="caption"><i class="icon-list"></i><?=$title?></div>
    <div class="actions">
    </div>
  </div>
  <div class="portlet-body" style="height:500px !important; overflow-y: scroll; ">
    <form class="form-horizontal form-row-seperated form-row-stripped" action="" method="post" id="form">
      <table class="table table-striped table-bordered table-hover table-full-width" >
          <thead>
          <tr>
            <th>No</th>
            <th>Nopeg</th>
            <th>Nama</th>
            <th>Unit</th>
            <th>Pekerjaan</th>
            <th>Nilai</th>
            <th>Keterangan</th>
          </tr>
          </thead>
          <tbody>
            <?php for ($i=1; $i < 5; $i++) { ?>
            <tr>
                <td><?=$i?></td>
                <td>
                    <input type="text" class="m-wrap span9" placeholder="Nopeg" name="nopeg">
                </td>
                <td>
                    <input type="text" class="m-wrap span9" placeholder="Nama" name="nama">
                </td>
                <td>
                    <input type="text" class="m-wrap span9" placeholder="Unit" name="unit">
                </td>
                <td>
                    <input type="text" class="m-wrap span8" placeholder="Pekerjaan" name="id_pekerjaan">
                </td>
                <td>
                    <input type="text" class="m-wrap span4" placeholder="Nilai" name="nilai">
                </td>
                <td>
                    <input type="text" class="m-wrap span9" placeholder="Keterangan" name="keterangan">
                </td>
            </tr>
            <?php } ?>
        </table>
        <div class="form-actions">
            <button class="btn blue" type="submit" ><i class="icon-save"></i> Save</button> -->
            <!-- <button class="btn blue" type="submit" onclick="equip();"><i class="icon-plus"></i> Add Petugas</button> -->
        <!-- </div>
    </form> -->
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
    
  <!-- </div>
</div> -->



<?php if(@$this->session->flashdata('flash_manual')) : ?>
<div class="row-fluid">
    <div class="span12">
        <!-- BEGIN ALERTS PORTLET-->
        <div class="portlet ">
            <div class="portlet-body">
                <?php echo @$this->session->flashdata('flash_manual'); ?>
            </div>
        </div>
        <!-- END ALERTS PORTLET-->
    </div>
</div>
<?php endif; ?>

<div class="row-fluid">
    <div class="span12">
        <div class="portlet-body form" style="display: block;">
            <div class="portlet-title">
                <div class="caption "><i class="icon-reorder"></i>Penilaian Petugas Darat</div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <form class="form-search fright" action="<?php echo base_url(); ?>penilaian/add_penilaian" method="post">
                       <!--  <div class="form-search fright">
                            <div class="input-prepend">
                                <span class="add-on">Nopeg / Nama</span>
                                <input type="hidden" name="allnopeg" class="span6 m-wrap all">
                                <input class="m-wrap medium" type="text" placeholder="Search Nopeg / Nama" id="nopeg" name="nopeg"/>
                            </div>
                            <button class="btn green" type="submit"><i class="icon-save"></i> Show</button>
                        </div>
                        -->
                        <div class="clearfix">
                            <div class="input-prepend">
                                <span class="add-on">Tahun </span>
                                <select name="tahun" id="ktahun" class="m-wrap small">
                                    <option value="" >Select Tahun</option>
                                    <?php 
                                    $x = 2010;
                                    for ($i=0; $i <100 ; $i++) { 
                                        ?>
                                        <option value="<?php echo $x; ?>" <?php if(@$_GET["tahun"] == $x){echo "selected";} ?>><?php echo $x; ?></option>
                                        <?php
                                        $x++;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="input-prepend stat">
                                <span class="add-on">Station </span>
                                <select name="stat" id="stat" class="m-wrap small">
                                    <option value="" >Select Station</option>
                                    <?php foreach ($station as $row): ?>
                                        <option value="<?php echo $row->id_station; ?>" <?php if(@$_GET["stat"] == $row->id_station){echo "selected";} ?>><?php echo $row->station; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="input-prepend phase">
                                <span class="add-on">Phase </span>
                                <select name="phase" class="m-wrap small" id="phase">
                                    <option value="" >Select Phase</option>
                                    <option value="1" <?php if(@$_GET["phase"] == "1"){echo "selected";} ?>>1</option>
                                    <option value="2" <?php if(@$_GET["phase"] == "2"){echo "selected";} ?>>2</option>
                                </select>
                            </div>
                            <div class="input-prepend lok">
                                <span class="add-on">Lokasi </span>
                                <select name="lokasi" class="m-wrap small" id="lokasi">
                                    <option value="" >Select Lokasi</option>
                                    <?php foreach ($lokasi as $row): ?>
                                        <option value="<?php echo $row->id_lokasi; ?>" <?php if(@$_GET["lokasi"] == $row->id_lokasi){echo "selected";} ?>><?php echo $row->lokasi; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            
                            <!-- <input type="hidden" name="act" value="browse"/> -->
                            <input type="submit" name="search_btn" value="Show" class="btn blue submit">
                            <!-- <a href="#"><button class="btn red" type="button" style="vertical-align: top;">Reset</button></a> -->
                        </div>
                    </form>
                </div>
            </div>
            <br/>
            
            <div id='data'>
                <?php if(!empty($search)){ ?>
                <div class="input-prepend">
                    <span class="add-on">Tahun</span>
                    <input class="m-wrap small" type="text" value="<?php echo $search['tahun']; ?>" size="15" readonly/>
                </div>
                <div class="input-prepend">
                    <span class="add-on">Station</span>
                    <input class="m-wrap small" type="text" value="<?php echo getDesc($search['stat'], 'station'); ?>" size="15" readonly/>
                </div>
                <div class="input-prepend">
                    <span class="add-on">Phase</span>
                    <input class="m-wrap small" type="text" value="<?php echo $search['phase']; ?>" size="15" readonly/>
                </div>
                <div class="input-prepend">
                    <span class="add-on">Lokasi</span>
                    <input class="m-wrap small" type="text" value="<?php echo getDesc($search['lokasi'], 'lokasi'); ?>" size="15" readonly/>
                </div>
                <?php } ?>
                <?php if(!empty($detail)){ ?>
                <form class="form-horizontal form-row-seperated form-row-stripped" action="<?php echo base_url('penilaian/add_act')?>" method="post" id="form">
                    <table class="table table-striped table-bordered table-hover table-full-width" >
                        <thead>
                            <th>No</th>
                            <th>Pekerjaan</th>
                            <th>ID</th>
                            <th>Unit</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                            <?php $i=1;foreach (@$detail as $key) { ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=getDesc($key->id_pekerjaan, 'pekerjaan')?></td>
                                <td><?=$key->nopeg.' - '.$key->nama?></td>
                                <td><?=$key->unit?></td> 
                                <td>
                                    <input type="text" class="m-wrap span4" placeholder="Nilai" name="nilai[<?=$i?>]" value="<?php echo @$key->nilai?>">
                                </td>
                                <td>
                                    <input type="text" class="m-wrap span9" placeholder="Keterangan" name="keterangan[<?=$i?>]" value="<?php echo @$key->keterangan?>">
                                </td>
                            </tr>
                                <input type="hidden" name="id_komposisi[<?=$i?>]" value="<?php echo $key->id_komposisi?>">
                                <input type="hidden" name="no_shift[<?=$i?>]" value="<?php echo $key->no_shift?>">
                                <input type="hidden" name="index[<?=$i?>]" value="<?php echo $key->index?>">
                                <input type="hidden" name="nopeg[<?=$i?>]" value="<?php echo $key->nopeg?>">
                           <?php $i++; } ?> 
                        </tbody>
                    </table>  
                    <div class="form-actions">
                        <button class="btn blue" type="submit" ><i class="icon-save"></i> Save</button> 
                    </div>
                </form>
                <?php } else { ?> 
                    <div class="row-fluid">
                        <div class="span12">
                            Tidak ada data
                        </div>
                    </div>
                <? } ?> 
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
// $('.submit').hide();
// $('.stat').hide();
// $('.phase').hide();
// $('.lok').hide();

// $('#ktahun').change(function(){
//     var tahun = $('#ktahun').val();
//     if(tahun != '')
//     {
//         $('.stat').show();
//     }
// });

// $('#stat').change(function(){
//     var stat = $('#stat').val();
//     if(stat != '')
//     {
//         $('.phase').show();
//     }
// });

// $('#phase').change(function(){
//     var stat = $('#phase').val();
//     if(stat != '')
//     {
//         $('.lok').show();
//     }
// });

// $('#lokasi').change(function(){
//     var stat = $('#lokasi').val();
//     if(stat != '')
//     {
//         $('.submit').show();
//     }
// });

$('#data').hide();

$('#nopeg').live('focus.autocomplete', function()
{
$(this).autocomplete({
    minLength: 2,
    source:
    function(req, add){
        $.ajax({
            url: "<?php echo base_url(); ?>petugas/get_auto_name",
            dataType: 'json',
            type: 'POST',
            data: req,
            success:   
            function(data){
                if(data.response =="true"){
                    add(data.message);
                }else{
                    $(this).val(' ');
                }
            },
        });
    },
select:
    function(event, ui) {
        $(".all").val(ui.item.id);
        $("#nopeg").val(ui.item.value);
        // $(".all").attr('readonly','readonly');
    },     
});
});

var petugas = '<?php echo @$petugas[0]->nopeg; ?>';
if(petugas!=null){
    $('#data').show();
}

var win = null;
function newWindow(mypage, myname, w, h, features) {
    var winl = (screen.width-w)/2;
    var wint = (screen.height-h)/2;
    if (winl < 0) winl = 0;
    if (wint < 0) wint = 0;
    var settings = 'height=' + h + ',';
    settings += 'width=' + w + ',';
    settings += 'top=' + wint + ',';
    settings += 'left=' + winl + ',';
    settings += 'bgColor="#008888",';
    settings += features;
    win = window.open(mypage, myname, settings);
    win.document.bgColor = 'lightgreen';
    win.window.focus();
}



/*
function cekDouble() {
    if($('#pparam').val() != "" && $('#pcari').val() != "") {
        alert("Error..., Cannot search with 2 parameters.\nReset first and then entry 1 parameter only.....");
        return false;
    } else {
        $('#searchpin').submit();
    }
}
*/

</script>