<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Course</h1>
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
            <form action="<?= site_url('admin/course/update')?>" enctype='multipart/form-data' method="post">
                <div class="form-group">
                    <label>Poster (max 2mb)</label><span class="text-warning">*</span>
                    <br>
                    <div id="boxImg" class="text-center mt-3 mb-3 p-3" style="border: 1px solid #ddd;border-radius: 10px;cursor: pointer;">
                        <img style="max-width: 250px;" id="blah" class="" src="<?= (!empty($course->IMG_COURSE) ? $course->IMG_COURSE : (!empty($dataTemp['imgCourse']) ? $dataTemp['imgCourse'] : "")) ?>" />
                        <input type="hidden" name="imgCourse" value="<?= (!empty($course->IMG_COURSE) ? $course->IMG_COURSE : (!empty($dataTemp['imgCourse']) ? $dataTemp['imgCourse'] : "")) ?>">
                    </div>
                    <input type="file" class="form-control" accept=".jpg,.png,.jpeg,.bmp" name="poster" style="cursor: pointer;" id="imgPoster">
                </div>
                <div class="form-group">
                    <label>Nama</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= (!empty($course->NAMA_COURSE) ? $course->NAMA_COURSE : (!empty($dataTemp['nama']) ? $dataTemp['nama'] : "")) ?>" name="nama" id="" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kat" id="">
                        <option value="">Tidak Ada Kategori</option>
                        <?php
                            foreach ($kategoris as $item) {
                                $selected = "";
                                if(!empty($course->ID_KATCOU)){
                                    $selected = ($course->ID_KATCOU == $item->ID_KATCOU ? "selected" : "");
                                }else if(!empty($dataTemp['kat'])){
                                    $selected = ($dataTemp['kat'] == $item->ID_KATCOU ? "selected" : "");
                                }   
                                
                                echo '
                                    <option value="'.$item->ID_KATCOU.'" '.$selected.'>'.$item->NAMA_KATCOU.'</option>
                                ';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label><span class="text-warning">*</span>
                    <textarea class="summernote" type="text" name="deskripsi" id="" required><?= (!empty($course->DESKRIPSI_COURSE) ? $course->DESKRIPSI_COURSE : (!empty($dataTemp['deskripsi']) ? $dataTemp['deskripsi'] : "")) ?></textarea>
                </div>
                <div class="form-group">
                    <label>Pengumuman</label>
                    <textarea class="summernote" type="text" name="pengumuman" id=""><?= (!empty($course->PENGUMUMAN_COURSE) ? $course->PENGUMUMAN_COURSE : (!empty($dataTemp['pengumuman']) ? $dataTemp['pengumuman'] : "")) ?></textarea>
                </div>
                <input type="hidden" name="idCourse" value="<?= (!empty($course->ID_COURSE) ? $course->ID_COURSE : (!empty($dataTemp['idCourse']) ? $dataTemp['idCourse'] : "")) ?>">
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
