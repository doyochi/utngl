<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Course</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('admin/course/add')?>" style="float: right;" class="btn btn-sm btn-warning shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah
            </a>
            <!-- <div class="d-sm-flex align-items-center justify-content-between"> -->
                <!-- <h6 class="m-0 font-weight-bold text-warning mb-2">Daftar Course</h6> -->
            <!-- </div> -->
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
            <div class="table-responsive">
                    <table class="table table-bordered" id="tableCourse" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 5%;">Poster</th>
                            <th style="width: 20%;">Nama</th>
                            <th style="width: 35%;">Kategori</th>
                            <th style="width: 10%;">Materi</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 20%;">Aksi</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($courses as $item) {
                                $status         = ($item->ISPUBLISHED_COURSE == "0" ? '<span class="badge badge-danger">Unpublished</span>' : '<span class="badge badge-success">Published</span>');
                                $statusMateri   = ($item->ISMATREADY_COURSE == "0" ? '<span class="badge badge-danger">Not Ready</span>' : '<span class="badge badge-success">Ready</span>');

                                echo '
                                    <tr>
                                        <td class="text-center"><a class="btn btn-sm btn-primary mdlPoster" data-toggle="modal" data-target="#mdlPoster" data-src="'.$item->IMG_COURSE.'"><i class="fa fa-image"></i></a></td>
                                        <td>'.$item->NAMA_COURSE.'</td>
                                        <td>'.$item->NAMA_KATCOU.'</td>
                                        <td>'.$statusMateri.'</td>
                                        <td>'.$status.'</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="'.site_url('admin/course/edit/'.$item->ID_COURSE).'" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-info" href="'.site_url('admin/material/'.$item->ID_COURSE).'" data-bs-toggle="tooltip" data-bs-placement="top" title="Atur Materi"><i class="fa fa-stream"></i></a>
                                            <a class="btn btn-sm btn-success mdlPublish" data-id="'.$item->ID_COURSE.'" data-stat="'.$item->ISPUBLISHED_COURSE.'" data-toggle="modal" data-target="#mdlPublish" data-bs-toggle="tooltip" data-bs-placement="top" title="Publish"><i class="fa fa-cloud-upload-alt"></i></a>
                                            <a class="btn btn-sm btn-danger mdlHapus" data-id="'.$item->ID_COURSE.'" data-label="'.$item->NAMA_COURSE.'" data-toggle="modal" data-target="#mdlHapus" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
                                        </td>                            
                                    </tr>
                                
                                ';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Pratinjau -->
<div class="modal fade" id="mdlPoster" tabindex="-1" aria-labelledby="mdlPoster" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlPoster">Pratinjau Poster</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="mdlPoster_src" style="max-width: 250px;" />
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Publish -->
<div class="modal fade" id="mdlPublish" tabindex="-1" aria-labelledby="mdlPublish" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Publish Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah anda yakin untuk <span id="mdlPublish_label"></span> course ?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <form action="<?= site_url('admin/course/publish')?>" method="post">
                    <input type="hidden" name="idCourse" id="mdlPublish_id">
                    <input type="hidden" name="stat" id="mdlPublish_stat">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="mdlHapus" tabindex="-1" aria-labelledby="mdlHapus" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah anda yakin untuk menghapus course <span></span> ?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <form action="<?= site_url('admin/course/destroy')?>" method="post">
                    <input type="hidden" name="idCourse" id="mdlHapus_id">
                    <button type="submit" class="btn btn-success">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#tableCourse').DataTable();
    })
    $('#tableCourse tbody').on('click', '.mdlPoster', function(){
        const src = $(this).data('src');
        $('#mdlPoster_src').attr('src', src);
    })
    $('#tableCourse tbody').on('click', '.mdlPublish', function(){
        const id = $(this).data('id');
        const stat = $(this).data('stat');

        $('#mdlPublish_id').val(id);
        $('#mdlPublish_stat').val(stat == "1" ? "0" : "1");
        $('#mdlPublish_label').html(stat == "1" ? "meunpublish" : "mepublish");
    })
    $('#tableCourse tbody').on('click', '.mdlHapus', function(){
        const id = $(this).data('id');
        const label = $(this).data('label');

        $('#mdlHapus_id').val(id);
        $('#mdlHapus_label').html(label);
    })
    $('#tableCourse tbody').on('click', '.mdlKendaraan', function(){
        const nama = $(this).data('nama');

        $('#mdlKendaraan_nama').val(nama);
    })
</script>