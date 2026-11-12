
<div class="row-fluid">
    <div class="span12">
    <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-reorder"></i><?php echo $title;?></div>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
        
            <div class="portlet-body">
                    <form class="form-horizontal form-row-seperated form-row-stripped" action="<?php echo base_url('master/insert/'.$type); ?>" method="post" id="form">
                        
                        <div class="control-group">
                            <label class="control-label"><?='Kode '.$type?></label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="kode">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?=$type?></label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="desc">
                            </div>
                        </div>
                       
                        <div class="form-actions">
                            <button class="btn green" type="submit" ><i class="icon-save"></i> Save</button>
                            <button type="button" class="btn" onClick='back()'> Back</button> 
                            <!-- <button class="btn blue" type="submit" onclick="equip();"><i class="icon-plus"></i> Add Petugas</button> -->
                        </div>
                        <!-- <input type="hidden" name="edit" value="<?php echo md5(@$val->unit); ?>" /> -->
                    </form>
                    
        </div>
    </div>
</div>


<script type="text/javascript">
</script>