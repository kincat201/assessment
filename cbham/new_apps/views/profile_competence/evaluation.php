<?php echo @$err; ?>
<div id='alert'></div>

<style>

    .d-none{
        display: none !important;
    }

    th, .text-center{
        text-align: center !important;
    }
</style>

<form id="form-profile-competence" enctype="multipart/form-data" action="#" method="post">
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet">
                <div class="row-fluid">
                    <div class="form-search fright">
                        <div class="input-prepend">
                            <span class="add-on">Nama</span>
                            <select class="m-wrap large selectpicker" name="nik" data-placeholder="Choose a Category" id='nama' tabindex="1" data-live-search="true">
                                <option value=''>Pilih Pegawai</option>
                                <?php foreach ($pegawai as $row) {
                                    echo "<option value='".$row->nik."'>".$row->nama." (".$row->namaunit.")</option>";
                                } ?>
                            </select>
                        </div>
                        <div class="input-prepend">
                            <span class="add-on">Tahun</span>
                            <select class="m-wrap small" name="tahun" id='tahun' >
                                <?php for ($i=(date('Y')-20); $i < (date('Y')+50); $i++) {
                                    if(date('Y') == $i){
                                        echo "<option value='".$i."' selected>".$i."</option>";
                                    } else {
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                        <a class="btn green" style='margin-right: 10px;' id="simpan" onClick="search_profile()"><i class="icon-search"></i> Cari</a>
                        <a class="btn purple" style='margin-right: 10px;' onclick="download_data()" onClick=""><i class="icon-print"></i> Cetak</a>
                    </div>
                </div>

                <hr/>

                <table class="table table-striped table-bordered table-hover table-full-width" >
                    <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>Kompetensi</th>
                        <th>Standart</th>
                        <th>Periode I</th>
                        <th>Gap</th>
                        <th>Periode II</th>
                        <th>Gap</th>
                    </tr>
                    </thead>
                    <tr id="sample-header-category" class="d-none">
                        <th class="category_label" colspan="7" style="text-align: left !important;"></th>
                    </tr>
                    <tbody class="evaluation-list">
                    </tbody>
                    <tr class="sample-row d-none">
                        <td class="competence_code text-center">Jenis</td>
                        <td class="name">Kompetensi</td>
                        <td class="value text-center">Standart</td>
                        <td class="real_value_one text-center">Periode I</td>
                        <td class="gap_one text-center">Gap</td>
                        <td class="real_value_two text-center">Periode II</td>
                        <td class="gap_two text-center">Gap</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
</form>

<script type="application/javascript">

    function search_profile() {

        const nik = $('#nama').val();
        if(!nik) return;

        $('.evaluation-list').empty();

        const tahun = $('#tahun').val();

        const category = [
            {
                code: 'CORE',
                label: 'Kompetensi Inti'
            },
            {
                code: 'LEADERSHIP',
                label: 'Kompetensi Kepemimpinan'
            },
            {
                code: 'FUNDAMENTAL',
                label: 'Kompetensi Teknis Fundamental'
            },
            {
                code: 'TECHNICAL',
                label: 'Kompetensi Teknis Spesifik'
            }
        ];

        $.ajax({
            url : "<?php echo site_url('profile_competence/get_data_evaluation')?>/" + nik +"/"+tahun,
            type: "GET",
            dataType: "JSON",
            success: function(response)
            {
                if(!response.status){
                    responseAlert('Gagal Cari Profile Kompetensi', data.message,'error');
                    return;
                }

                response.data.competence.map( (item,index) =>{
                    if(item.value != 0){

                        if(index == 0 || (index > 0 && item.category != response.data.competence[index-1].category)){
                            const current_category = category.find( x => x.code == item.category );
                            const row_category = $('#sample-header-category').clone();
                            row_category.prop('id','sample-header-category-'+item.category);
                            row_category.removeClass('d-none');
                            row_category.find('.category_label').html(current_category ? current_category.label : '-');
                            $('.evaluation-list').append(row_category)
                        }

                        const row = $('.sample-row').clone();
                        row.removeClass('d-none').removeClass('sample-row');
                        row.addClass('.item-row');
                        row.find('.competence_code').html(item.competence_code);
                        row.find('.name').html(item.name);
                        row.find('.value').html(item.value);
                        row.find('.real_value_one').html(item.real_value_one);
                        row.find('.gap_one').html(item.gap_one);
                        row.find('.real_value_two').html(item.real_value_two);
                        row.find('.gap_two').html(item.gap_two);
                        $('.evaluation-list').append(row);
                    }
                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                responseAlert('Gagal get data', errorThrown,'error');
            }
        });
    }

    function download_data(){
        const nik = $('#nama').val();
        if(!nik) return;

        const tahun = $('#tahun').val();

        window.open('<?= site_url('profile_competence/download/')?>/' + nik +"/"+tahun);
    }

</script>

