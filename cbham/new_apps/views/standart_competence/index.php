<?php echo @$err; ?>
<div id='alert'></div>

<style>
    .span4{
        margin-top:10px;
    }

    .d-none{
        display: none !important;
    }
</style>

<form id="form-competence" enctype="multipart/form-data" action="#" method="post">
<div class="row-fluid">
    <div class="span12">
        <div class="portlet">
            <div class="row-fluid">
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Cari Kompetensi</label>
                        <div class="controls">
                            <select id="kojab" class="s-wrap span8 selectpicker" data-live-search="true">
                                <option value="">-- Pilih Jabatan --</option>
                                <?php foreach ($jabatan as $row) {
                                    echo "<option value=".$row->kojab.">".$row->namajabatan."</option>";
                                } ?>
                            </select>
                            <a class="btn blue" href="#" onclick="search_competence()"><i class="icon-search"></i> Cari</a>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Tambah Kompetensi</label>
                        <div class="controls">
                            <select id="competence" class="s-wrap span8 selectpicker" data-live-search="true">
                                <option value="">-- Pilih Kompetensi --</option>
                                <?php foreach ($competence as $row) {
                                    echo "<option value=".$row->code." data-object='".json_encode($row)."'>".$row->code." - ".$row->name."</option>";
                                } ?>
                            </select>
                            <a class="btn blue" href="#" onclick="add_competence()"><i class="icon-plus"></i> Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label">Import Kompetensi</label>
                        <div class="controls">
                            <select id="competence_section" class="s-wrap span8 selectpicker" data-live-search="true">
                                <option value="">-- Pilih Bagian --</option>
                                <?php foreach ($competence_section as $row) {
                                    echo "<option value=".$row->section_code." data-object='".json_encode($row)."'>".$row->name."</option>";
                                } ?>
                            </select>
                            <a class="btn blue" href="#" onclick="import_competence()"><i class="icon-download"></i> Import</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr/>
            <div class="row-fluid">
                <div class="span2 sample-item d-none">
                    <div class="control-group">
                        <label class="control-label">FE</label>
                        <div class="controls">
                            <select id="fe" class="s-wrap span4">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <button class="btn popovers" type="button" data-trigger="hover" data-placement="right" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">?</button>
                            <button class="btn btn-modal" type="button" onclick="set_level()">L</button>
                            <button class="btn red btn-delete" type="button" onclick="delete_competence()">X</button>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <h5>Kompetensi Inti</h5>
                    <div class="row-fluid category_CORE">
                        <div class="span3 d-none"></div>
                    </div>
                </div>
                <hr/>
                <div class="row-fluid">
                    <h5>Kompetensi Kepemimpinan</h5>
                    <div class="row-fluid category_LEADERSHIP">
                        <div class="span3 d-none"></div>
                    </div>
                </div>
                <hr/>
                <div class="row-fluid">
                    <h5>Kompetensi Teknis Fundamental</h5>
                    <div class="row-fluid category_FUNDAMENTAL">
                        <div class="span3 d-none"></div>
                    </div>
                </div>
                <hr/>
                <div class="row-fluid">
                    <h5>Kompetensi Teknis Spesifik</h5>
                    <div class="row-fluid category_TECHNICAL">
                        <div class="span3 d-none"></div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="modal-footer">
                        <?php if(getSession('role') != 'User') { ?>
                            <a class="btn green" href="#" onclick="save()"><i class="icon-save"></i> Simpan</a>
                        <?php } ?>
                        <a class="btn purple" href="#" onclick="download_data()"><i class="icon-download"></i> Cetak</a>
                        <a class="btn btn-outline dark" href="dashboard">Keluar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</form>

<div id="modal_level" class="modal hide fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title"><b> Business Skill</b></h4>
    </div>
    <div class="modal-body ">
        <div class="row-fluid">
            <div class="span12">
                <table class="table table-striped table-bordered table-hover table-full-width" >
                    <thead>
                    </thead>
                    <tr id="level-sample-item" class="d-none">
                        <th class="level-title" style="width: 100px;">title</th>
                        <td class="level-content">Lipsum</td>
                    </tr>
                    <tbody class="level_item">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-outline dark" data-dismiss="modal" href="#"> Keluar</a>
    </div>
</div>

<script type="application/javascript">

    let competence_data = [];

    $(document).ready(function() {
        $.fn.autosugguest({
            className: 'ausu-suggest',
            methodType: 'POST',
            minChars: 1,
            rtnIDs: true,
            dataFile: '<?=base_url().'index.php/stdknowhow/jabatanList'?>'
        });
    });

    function search_competence() {

        $('.item-competence').remove();

        const kojab = $('#kojab').val();
        if(!kojab) return;

        competence_data = [];

        $.ajax({
            url : "<?php echo site_url('standart_competence/get_data')?>/" + kojab,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                if(data.length < 1){
                    responseAlert('Gagal Cari Kompetensi', 'Data Kompetensi tidak ditemukan, mohon melakukan penambahan manual!','error');
                    return;
                }

                data.map( item =>{
                    generate_competence_item(item);
                    competence_data.push(item);
                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                responseAlert('Gagal get data', errorThrown,'error');
            }
        });
    }

    function generate_competence_item(item){
        const row = $('.sample-item').clone();
        row.removeClass('d-none');
        row.removeClass('sample-item');
        row.addClass('item-competence')
        row.addClass('item-competence-'+item.competence_code);
        row.find('.control-label').html(item.competence_code);
        row.find('select').prop('name',item.competence_code).val(item.value);
        row.find('.popovers').attr('data-content',item.description);
        row.find('.popovers').attr('title',item.name);
        row.find('.popovers').popover();
        row.find('.btn-modal').attr('onclick','set_level("'+item.competence_code+'")');
        row.find('.btn-delete').attr('onclick','delete_competence("'+item.competence_code+'")');
        $('.category_'+item.category).append(row);
    }

    function set_level(competence_code){
        const competence = competence_data.find( x => x.competence_code == competence_code);
        const level_label = ['Novice','Basic','Skillful','Advance','Expert'];
        if(competence){
            const modal = $('#modal_level');
            modal.find('.modal-title').html('<b>'+competence.name+'</b>');

            $('.level_item').empty();

            for (let i = 1; i <= 5; i++){

                if(!competence['level_'+i]) continue;

                const level_item = $('#level-sample-item').clone();
                level_item.removeClass('d-none');
                level_item.prop('id','level-item-'+new Date().getTime());
                level_item.find('.level-title').html(i+' - '+level_label[i-1]);
                level_item.find('.level-content').html(competence['level_'+i].replace(/\n/g,'<br/>'));

                $('.level_item').append(level_item);
            }

            modal.modal('show');
        }
    }

    function add_competence(){
        const select_competence = $('#competence option:selected').data('object');
        if(!select_competence) return;
        const check_competence = $('.item-competence-'+select_competence.code);
        if(check_competence.length){
            responseAlert('Gagal Tambah Kompetensi', 'Kompetensi sudah ada!','error');
            return;
        }

        generate_competence_item({
            name:select_competence.name,
            competence_code:select_competence.code,
            description:select_competence.description,
            value:0,
            category:select_competence.category,
        });

        responseAlert('Berhasil Tambah Kompetensi', 'Kompetensi sudah ditambahkan!','info');
        $('#competence').val(null);
        $('#competence').selectpicker('refresh');
    }

    function import_competence(){
        const select_competence_section = $('#competence_section option:selected').data('object');
        if(!select_competence_section) return;
        $('.item-competence').remove();

        select_competence_section.detail.map(item =>{
            generate_competence_item({
                name:item.name,
                competence_code:item.code,
                description:item.description,
                value:0,
                category:item.category,
            });
        });
        responseAlert('Berhasil Import Kompetensi', 'Kompetensi sudah diimport!','info');
        $('#competence_section').val(null);
        $('#competence_section').selectpicker('refresh');
    }

    function delete_competence(competence_code){
        $('.item-competence-'+competence_code).remove();
    }

    function save(){

        const kojab = $('#kojab').val();
        if(!kojab) return;

        $.ajax({
            url : "<?php echo site_url('standart_competence/save')?>/" + kojab,
            type: "POST",
            data: $('#form-competence').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                if(!data.status){
                    responseAlert('Gagal Simpan Data', data.message,'error');
                    return;
                }

                responseAlert('Data Berhasil Disimpan', data.message,'info');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                responseAlert('Gagal get data', errorThrown,'error');
            }
        });
    }

    function download_data(){
        const kojab = $('#kojab').val();
        if(!kojab) return;
        window.open('<?= site_url('standart_competence/download/')?>/'+kojab);
    }

</script>

