<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Materi</h1>
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
                if(!empty($this->session->flashdata('succ_msg'))){
                    echo '
                        <div class="alert alert-success" role="alert">
                           '.$this->session->flashdata('succ_msg').'
                        </div>
                    ';        
                }
            ?>
            <form action="<?= site_url('admin/material/update')?>" enctype='multipart/form-data' method="post">
                <div class="form-group">
                    <label>Topik</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= (!empty($material->NAMA_MATERIAL) ? $material->NAMA_MATERIAL : (!empty($dataTemp['topik']) ? $dataTemp['topik'] : "")) ?>" name="topik" id="" required>
                </div>
                <div class="form-group">
                    <label>Konten File</label><span class="text-warning">*</span>
                    <input class="form-control" type="text" value="<?= (!empty($material->CONTENT_MATERIAL) ? $material->CONTENT_MATERIAL : (!empty($dataTemp['konten']) ? $dataTemp['konten'] : "")) ?>" name="konten" id="" required>
                    <small>Masukkan link eksternal (.mp4/.mkv/.pdf)</small>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label><span class="text-warning">*</span>
                    <textarea class="summernote" type="text" name="deskripsi" id="" required><?= (!empty($material->DESKRIPSI_MATERIAL) ? $material->DESKRIPSI_MATERIAL : (!empty($dataTemp['deskripsi']) ? $dataTemp['deskripsi'] : "")) ?></textarea>
                </div>
                <label>Resource Tambahan (max 2mb)</label>
                <?php
                    if($material->RESOURCE_MATERIAL != null || $material->RESOURCE_MATERIAL != ''){
                        $links = explode(';', $material->RESOURCE_MATERIAL);
                        foreach ($links as $item) {
                            $link = explode('/', $item);
                            $link = $link[count($link) - 1];
    
                            $paramLink = "'".$link."'";
    
                            echo '
                                <div class="input-group">
                                    <input type="text" class="form-control" value="'.$link.'" disabled style="cursor: pointer;" id="">
                                    <div class="input-group-append">
                                        <a class="btn btn-danger" onclick="desRes('.$material->ID_MATERIAL.', '.$paramLink.')"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                                <a class="mb-3" href="'.$item.'"><small><i>Pratinjau</i></small></a>
                            ';
                        }
                    }else{
                        echo '
                            <div class="input-group mb-3">
                                <input type="file" accept=".pdf,.doc,.docx,.pptx,.ppt" class="form-control" name="file[]" style="cursor: pointer;" id="">
                            </div>
                        ';
                    }
                ?>
                
                <div class="resource" style="margin-bottom: -5px;"></div>
                <div class="formgroup">
                    <small>Masukkan file resource (.pdf/.doc/.docs/.ppt/.pptx)</small>
                </div>
                <div class="mt-3">
                    <a id="tambahResource" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Resource</a>
                </div>
                <div>
                    <input type="hidden" name="idCourse" value="<?= (!empty($material) ? $material->ID_COURSE : (!empty($dataTemp['idCourse']) ? $dataTemp['idCourse'] : "")) ?>">
                    <input type="hidden" name="idMaterial" value="<?= (!empty($material) ? $material->ID_MATERIAL : (!empty($dataTemp['idMaterial']) ? $dataTemp['idMaterial'] : "")) ?>">
                    <button style="float: right;" type="submit" class="btn btn-sm btn-warning">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Hapus -->
<div class="modal fade" id="mdlDelete" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlDelete">Hapus Resource</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah anda yakin untuk menghapus resource <code id="mdlDelete_resTitle" style="font-weight: bold;"></code></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="<?= site_url('admin/material/destroy-res')?>" method="post">
                    <input type="hidden" name="idMaterial" id="mdlDelete_id">
                    <input type="hidden" name="resource" id="mdlDelete_resource">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
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
    function desRes(idMaterial, title){
        $('#mdlDelete_id').val(idMaterial);
        $('#mdlDelete_resource').val(title);
        $('#mdlDelete_resTitle').html(title);
        $('#mdlDelete').modal('show');
    }
    function delRes(id){
        $('#resGroup_'+id).remove();
    }
</script>
