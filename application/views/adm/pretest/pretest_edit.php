<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Pretest</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning mb-2">Form</h6>
            </div>
        </div>
        <div class="card-body">
            <?php
                if(!empty($this->session->flashdata('err_msg'))){
                    echo '
                        <div class="alert alert-danger" role="alert">
                           '.$this->session->flashdata('err_msg').'
                        </div>
                    ';        
                }
            ?>
            <form action="<?= site_url('admin/pretest/update')?>" enctype='multipart/form-data' method="post">
            <div class="form-group">
                    <label>Nama Pretest</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= (!empty($pretest->NAMA_PRETEST) ? $pretest->NAMA_PRETEST : (!empty($dataTemp['nama']) ? $dataTemp['nama'] : "")) ?>" name="nama" id="" required>
                </div>
                <div class="form-group">
                    <label>Poster (max 2mb)</label>
                    <br>
                    <div id="boxImg" class="text-center mt-3 mb-3 p-3" style="border: 1px solid #ddd;border-radius: 10px;cursor: pointer;">
                        <img style="max-width: 250px;" id="blah" class="" src="<?= (!empty($pretest->IMG_PRETEST) ? $pretest->IMG_PRETEST : base_url('assets/adm/img/dummy-post.jpg')) ?>" />
                    </div>
                    <input type="file" accept=".jpg,.png,.jpeg,.bmp" class="form-control" name="poster" style="cursor: pointer;" id="imgPoster">
                </div>
                <div class="form-group">
                    <label>Peraturan</label><span class="text-warning">*</span>
                    <textarea class="summernote" name="peraturan" required><?= (!empty($pretest->PERATURAN_PRETEST) ? $pretest->PERATURAN_PRETEST : (!empty($dataTemp['peraturan']) ? $dataTemp['peraturan'] : "")) ?></textarea>
                </div>
                <div class="form-group">
                    <label>Soal</label><span class="text-warning">*</span>
                    <textarea class="summernote" name="soal" required><?= (!empty($pretest->SOAL_PRETEST) ? $pretest->SOAL_PRETEST : (!empty($dataTemp['soal']) ? $dataTemp['soal'] : "")) ?></textarea>
                </div>
                <div class="form-group">
                    <label>Format File</label><span class="text-warning">*</span>
                    <select class="form-control" name="frmtFile" id="" required>
                        <option value="">Pilih</option>
                        <option value="pdf" <?= !empty($dataTemp['frmtFile']) == "pdf" ? "selected" : "" ?>>PDF</option>
                        <option value="ppt|pptx" <?= !empty($dataTemp['frmtFile']) == "ppt|pptx" ? "selected" : "" ?>>PPT</option>
                        <option value="doc|docx" <?= !empty($dataTemp['frmtFile']) == "doc|docx" ? "selected" : "" ?>>DOC</option>
                        <option value="zip|rar" <?= !empty($dataTemp['frmtFile']) == "zip|rar" ? "selected" : "" ?>>ZIP/RAR</option>
                        <option value="txt" <?= !empty($dataTemp['frmtFile']) == "txt" ? "selected" : "" ?>>TXT</option>
                    </select>
                </div>
                <label>Durasi</label><span class="text-warning">*</span>
                <div class="form-row my-2">
                    <div class="col">
                        <div class="input-group">
                            <input class="form-control" onkeypress="return isNumberKey(event)" min="0" type="number" value="<?= (!empty($pretest->DEADLINE_PRETEST) ? explode(';', $pretest->DEADLINE_PRETEST)[0] : (!empty($dataTemp['durHa']) ? $dataTemp['durHa'] : "")) ?>" name="durHa" id="" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Hari</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input class="form-control" onkeypress="return isNumberKey(event)" min=0" max="59" type="number" value="<?= (!empty($pretest->DEADLINE_PRETEST) ? explode(';', $pretest->DEADLINE_PRETEST)[1] : (!empty($dataTemp['durJa']) ? $dataTemp['durJa'] : "")) ?>" name="durJa" id="" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Jam</span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            <input class="form-control" onkeypress="return isNumberKey(event)" min="0" max="59" type="number" value="<?= (!empty($pretest->DEADLINE_PRETEST) ? explode(';', $pretest->DEADLINE_PRETEST)[2] : (!empty($dataTemp['durMe']) ? $dataTemp['durMe'] : "")) ?>" name="durMe" id="" required>        
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Menit</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Format Pengerjaan</label>
                    <input class="form-control" type="text" value="<?= (!empty($pretest->FORMATPENGERJAAN_PRETEST) ? $pretest->FORMATPENGERJAAN_PRETEST : (!empty($dataTemp['pengerjaan']) ? $dataTemp['pengerjaan'] : "")) ?>" name="pengerjaan" id="">
                </div>
                <input type="hidden" name="id" value="<?= (!empty($pretest->ID_PRETEST) ? $pretest->ID_PRETEST : (!empty($dataTemp['id']) ? $dataTemp['id'] : "")) ?>">
                <button style="float: right;" type="submit" class="btn btn-sm btn-warning">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.summernote').summernote({height: 150});
    })
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#boxImg").click(function(){
        $('#imgPoster').click();
    });

    $("#imgPoster").change(function(){
        readURL(this);
    });
</script>
