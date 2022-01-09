<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Materi</h1>
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
            <form action="<?= site_url('admin/material/store')?>" enctype='multipart/form-data' method="post">
                <div class="form-group">
                    <label>Topik</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= !empty($dataTemp['topik']) ? $dataTemp['topik'] : "" ?>" name="topik" id="" required>
                </div>
                <div class="form-group">
                    <label>Konten File</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= !empty($dataTemp['konten']) ? $dataTemp['konten'] : "" ?>" name="konten" id="" required>
                    <small>Masukkan link eksternal (.mp4/.mkv/.pdf)</small>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label><span class="text-warning">*</span>
                    <textarea class="summernote" type="text" name="deskripsi" id="" required><?= !empty($dataTemp['deskripsi']) ? $dataTemp['deskripsi'] : "" ?></textarea>
                </div>
                <label>Resource Tambahan (max 2mb)</label>
                <div class="input-group mb-3">
                    <input type="file" accept=".pdf,.doc,.docx,.pptx,.ppt" class="form-control" name="file[]" style="cursor: pointer;" id="">
                    <!-- <div class="input-group-append">
                        <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                    </div> -->
                </div>
                <div class="resource" style="margin-bottom: -15px;"></div>
                <div class="formgroup">
                    <small>Masukkan file resource (.pdf/.doc/.docs/.ppt/.pptx)</small>
                </div>
                <div class="mt-3">
                    <a id="tambahResource" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Resource</a>
                </div>
                <div>
                    <input type="hidden" name="idCourse" value="<?= (!empty($course) ? $course->ID_COURSE : (!empty($dataTemp['idCourse']) ? $dataTemp['idCourse'] : "")) ?>">
                    <button style="float: right;" type="submit" class="btn btn-sm btn-warning">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.summernote').summernote({height: 150});
    })
    let countFile = 1;
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
    $('#tambahResource').click(function(){

        const src = "<?= base_url('assets/adm/img/dummy-post.jpg')?>";
        $('.resource').append(`
            <div id="resGroup_${countFile}" class="input-group mb-3">
                <input type="file" accept=".pdf,.doc,.docx,.pptx,.ppt" class="form-control" name="file[]" style="cursor: pointer;" id="">
                <div class="input-group-append">
                    <button onclick="delRes(${countFile})" class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                </div>
            </div>
        `);
        countFile++;
    })
    function delRes(id){
        $('#resGroup_'+id).remove();
    }
    $('.inptResource').on('click', function(){
        alert('ilham');
        $(this).parent().remove();
    })
</script>
