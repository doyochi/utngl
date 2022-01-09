<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Course</h1>
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
            <form action="<?= site_url('admin/kategori-course/store')?>" enctype='multipart/form-data' method="post">
                <div class="form-group">
                    <label>Nama Kategori</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= !empty($dataTemp['nama']) ? $dataTemp['nama'] : "" ?>" name="nama" id="" required>
                </div>
                <button style="float: right;" type="submit" class="btn btn-sm btn-warning">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
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
