
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
                    <form class="form-horizontal form-row-seperated form-row-stripped" action="<?php echo base_url('petugas/add'); ?>" method="post" id="form">
                        
                        <div class="control-group">
                            <label class="control-label">Nopeg</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="nopeg" placeholder="Number Only" onkeypress="return angkasaja(this, event);"> 
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Nama</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="nama">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Unit</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="unit">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Telp Kantor</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="telp" placeholder="Number Only" onkeypress="return angkasaja(this, event);">  
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">No HP 1</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="hp1" placeholder="Number Only" onkeypress="return angkasaja(this, event);">
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label">No HP 2</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="hp2" placeholder="Number Only" onkeypress="return angkasaja(this, event);">
                                
                            </div>
                        </div> 

                        <div class="control-group">
                            <label class="control-label">Alamat</label>
                            <div class="controls">
                                <!-- <input type="text" value="<?php echo @$this->input->get('keterangan'); ?>" id="tanggal" class="m-wrap span4" name="alamat"> -->
                                <textarea class="large m-wrap span4" name="alamat"></textarea>
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label">License</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="license" >
                                
                            </div>
                        </div> 
                        <div class="control-group">
                            <label class="control-label">License Validity</label>
                            <div class="controls">
                                <input type="text" class="date-picker" name="license_val" >
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">Grade/Golongan</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="golongan" placeholder="2 Digit" size="2">
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">No Passport</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="no_pass">
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">Passport Validity</label>
                            <div class="controls">
                                <input type="text" class="date-picker" name="pass_val">
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">Ukuran Kemeja</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="kemeja" onkeypress="return angkasaja(this, event, dec);">
                                
                            </div>
                        </div> 
                         <div class="control-group">
                            <label class="control-label">Ukuran Pantalon</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span4" name="pantalon" placeholder="Number Only" onkeypress="return angkasaja(this, event);">
                                
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
function angkasaja(myfield, e, dec) {
      var key;
      var keychar;

      if (window.event)
         key = window.event.keyCode;
      else if (e)
         key = e.which;
      else
         return true;
      keychar = String.fromCharCode(key);

      // control keys
      if ((key==null) || (key==0) || (key==8) || 
          (key==9) || (key==13) || (key==27) )
         return true;

      // numbers
      else if ((("0123456789").indexOf(keychar) > -1))
         return true;

      // decimal point jump
      else if (dec && (keychar == "."))
         {
         myfield.form.elements[dec].focus();
         return false;
         }
      else
         return false;
    }
</script>