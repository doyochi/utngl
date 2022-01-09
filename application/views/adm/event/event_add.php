<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Event</h1>
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
            <form action="<?= site_url('admin/event/store')?>" enctype='multipart/form-data' method="post">
                <div class="form-group">
                    <label>Poster (max 2mb)</label><span class="text-warning">*</span>
                    <br>
                    <div id="boxImg" class="text-center mt-3 mb-3 p-3" style="border: 1px solid #ddd;border-radius: 10px;cursor: pointer;">
                        <img style="max-width: 250px;" id="blah" class="" src="<?= base_url('assets/adm/img/dummy-post.jpg')?>" />
                    </div>
                    <input type="file" accept=".jpg,.png,.jpeg,.bmp" class="form-control" name="poster" style="cursor: pointer;" id="imgPoster" required>
                </div>
                <div class="form-group">
                    <label>Judul</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= !empty($dataTemp['judul']) ? $dataTemp['judul'] : "" ?>" name="judul" id="" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label><span class="text-warning">*</span>
                    <textarea class="summernote" type="text" name="deskripsi" id="" required><?= !empty($dataTemp['deskripsi']) ? $dataTemp['deskripsi'] : "" ?></textarea>
                </div>
                <div class="form-group">
                    <label>Tempat</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= !empty($dataTemp['tempat']) ? $dataTemp['tempat'] : "" ?>" name="tempat" id="" required>
                </div>
                <div class="form-group">
                    <label>Tanggal</label><span class="text-warning">*</span>
                    <input class="form-control" type="date" value="<?= !empty($dataTemp['tgl']) ? $dataTemp['tgl'] : "" ?>" name="tgl" id="" required>
                </div>
                <div class="form-group">
                    <label>Penyelenggara</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= !empty($dataTemp['penyelenggara']) ? $dataTemp['penyelenggara'] : "" ?>" name="penyelenggara" id="" required>
                </div>
                <div class="form-group">
                    <label>Narahubung</label>
                    <input class="form-control" type="text" value="<?= !empty($dataTemp['narahubung']) ? $dataTemp['narahubung'] : "" ?>" name="narahubung" id="">
                </div>
                <div class="form-group">
                    <label>Link Video Conference</label>
                    <input class="form-control" type="text" value="<?= !empty($dataTemp['link']) ? $dataTemp['link'] : "" ?>" name="link" id="">
                </div>
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
