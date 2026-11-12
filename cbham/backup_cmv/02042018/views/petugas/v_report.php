<style type="text/css">
th 
{
    text-align:center !important; 
    vertical-align:middle !important;
}
</style>

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
                <div class="caption "><i class="icon-reorder"></i>Daftar Petugas Hajj Darat</div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <form class="form-search fright" action="<?php echo base_url(); ?>petugas/report" method="post">
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
                <form class="form-horizontal form-row-seperated form-row-stripped" action="" method="post" id="form">
                    <div class="input-prepend">
                        <span class="add-on">Tahun</span>
                        <input class="m-wrap small" type="text" value="<?php echo $search['tahun']; ?>" size="15" name="tahun" readonly/>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on">Station</span>
                        <input class="m-wrap small" type="text" value="<?php echo getDesc($search['stat'], 'station'); ?>" size="15" readonly/>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on">Phase</span>
                        <input class="m-wrap small" type="text" value="<?php echo $search['phase']; ?>" size="15" name="phase" readonly/>
                    </div>
                    <div class="input-prepend">
                        <span class="add-on">Lokasi</span>
                        <input class="m-wrap small" type="text" value="<?php echo getDesc($search['lokasi'], 'lokasi'); ?>" size="15" readonly/>
                    </div>
                    <div class="input-prepend">
                        <input type="hidden" name="lokasi" value="<?php echo $search['lokasi']; ?>">
                        <input type="hidden" name="stat" value="<?php echo $search['stat']; ?>">
                        <button class="btn green" type="submit" onclick="save();"><i class="icon-download"></i> Download</button>
                        <!-- <a class="btn green" href="<?php echo base_url('petugas/download/');?>"><i class="icon-download"></i> Download</a> -->
                        <a class="btn purple" onclick="printDiv('printableArea')" target="blank"><i class="icon-print"></i> Print</a>
                    </div>
                </form>
                <br>
                <?php } ?>
                <?php if(!empty($detail)){ ?>
                    <table class="table table-striped table-bordered table-hover table-full-width" >
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Pekerjaan</th>
                                <?php for ($i=1; $i <= $jum_shift->jum_shift; $i++) { ?>    
                                    <th align="center" valign="middle" colspan="3">Shift-<?php echo $i;?></th>
                                <?php } ?>
                                <tr>
                                <?php for ($i=1; $i <= $jum_shift->jum_shift; $i++) { ?> 
                                    <th>Nama</th>
                                    <th>Nopeg</th>
                                    <th>Unit</th>
                                <?php } ?>
                                </tr>
                        </thead>
                        <tbody>
                            <?php for ($i=0; $i < count($detail); $i++) { 
                                   for ($j=1; $j <= $detail[$i]->max; $j++) { ?> 
                                    <tr>
                                        <?php if($j==1){ ?>
                                        <td ><?=$i+1?></td>
                                        <td ><?=getDesc($detail[$i]->id_pekerjaan, 'pekerjaan')?></td>
                                        <?php } else { ?>
                                        <td ></td>
                                        <td ></td>
                                        <?php } 
                                            $ci =& get_instance();
                                            $ci->load->model('M_petugas','mp'); 
                                            $petugas =$ci->mp->get_detail($detail[$i]->id_komposisi,$j);
                                        for ($k=0; $k < $jum_shift->jum_shift; $k++) { ?> 
                                            <td><?=@$petugas[$k]->nama?></td>
                                            <td><?=@$petugas[$k]->nopeg?></td>
                                            <td><?=@$petugas[$k]->unit?></td>
                                        <?php }?>
                                    </tr>
                            <?php } }?> 
                        </tbody>
                    </table>  
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


<div id="printableArea">
    <div class="portlet box">
        <div class="portlet-title">
            <div class="caption"><i class="icon-list"></i><?=$title?></div>
        </div>
        <div class="portlet-body">
            <?php if(!empty($search)){ ?>
            <table class="table table-striped table-bordered table-hover table-full-width">
                <thead>
                    <th>Tahun : <?php echo $search['tahun']; ?></th>
                    <th>Station : <?php echo getDesc($search['stat'], 'station'); ?></th>
                    <th>Phase : <?php echo $search['phase']; ?></th>
                    <th>Lokasi : <?php echo getDesc($search['lokasi'], 'lokasi'); ?></th>
                </thead>
            </table>
            
            <?php } ?>
            <?php if(!empty($detail)){ ?>
                <table class="table table-striped table-bordered table-hover table-full-width" >
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Pekerjaan</th>
                            <?php for ($i=1; $i <= $jum_shift->jum_shift; $i++) { ?>    
                                <th align="center" valign="middle" colspan="3">Shift-<?php echo $i?></th>
                            <?php }?>
                            <tr>
                            <?php for ($i=1; $i <= $jum_shift->jum_shift; $i++) { ?> 
                                <th>Nama</th>
                                <th>Nopeg</th>
                                <th>Unit</th>
                            <?php } ?>
                            </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=0; $i < count($detail); $i++) { 
                               for ($j=1; $j <= $detail[$i]->max; $j++) { ?> 
                                <tr>
                                    <?php if($j==1){ ?>
                                    <td ><?=$i+1; ?></td>
                                    <td ><?=getDesc($detail[$i]->id_pekerjaan, 'pekerjaan'); ?></td>
                                    <?php } else { ?>
                                    <td ></td>
                                    <td ></td>
                                    <?php } 
                                        $ci =& get_instance();
                                        $ci->load->model('M_petugas','mp'); 
                                        $petugas =$ci->mp->get_detail($detail[$i]->id_komposisi,$j);
                                    for ($k=0; $k < $jum_shift->jum_shift; $k++) { ?> 
                                        <td><?php echo @$petugas[$k]->nama;?></td>
                                        <td><?php echo @$petugas[$k]->nopeg;?></td>
                                        <td><?php echo @$petugas[$k]->unit;?></td>
                                    <?php } ?>
                                </tr>
                        <?php } 
                            } ?> 
                    </tbody>
                </table>  
            <?php } else { ?> 
                <div class="row-fluid">
                    <div class="span12">
                        Tidak ada data
                    </div>
                </div>
            <?php } ?> 
        </div>
    </div>
</div>

<script type="text/javascript">
$('#printableArea').hide();
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

function printDiv(divName) {

     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

function save(){
    $('#form').attr("action","<?php echo base_url('petugas/download'); ?>");
}

function cekDouble() {
    if($('#pparam').val() != "" && $('#pcari').val() != "") {
        alert("Error..., Cannot search with 2 parameters.\nReset first and then entry 1 parameter only.....");
        return false;
    } else {
        $('#searchpin').submit();
    }
}

</script> 