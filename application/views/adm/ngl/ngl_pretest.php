<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pretest | <?= $user->NAMA_USER?></h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
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
                    <table class="table table-bordered" id="tablePretest" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pretest</th>
                            <th>Deadline</th>
                            <th>File Submit</th>
                            <th>Submit</th>
                            <th>Komentar</th>                            
                            <th>Status</th>                            
                            <th>Aksi</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($pretests as $item) {
                                $deadline = date_format(date_create($item->DEADLINE_PU), 'd M Y H:i');

                                $status = "";
                                if($item->STAT_PU == "2" && $item->ISCHECKED_PU == "0"){
                                    $status = '<span class="badge badge-info">Menunggu Review</span>';
                                }else if($item->STAT_PU == "1"){
                                    $status = '<span class="badge badge-warning">Proses</span>';
                                }else{
                                    $status = '<span class="badge badge-success">Selesai</span>';
                                }

                                $statusCollect = "-";
                                if($item->submited_at != null){
                                    $submitedAt = date_create($item->submited_at);
                                    $deadlinePU = date_create($item->DEADLINE_PU);
                                    if($submitedAt > $deadlinePU){
                                        $diff   = date_diff($submitedAt, $deadlinePU);

                                        $hari   = ($diff->format("%d") != "0" ? $diff->format("%d")." hari " : "");
                                        $jam    = ($diff->format("%h") != "0" ? $diff->format("%h")." jam " : "");
                                        $menit  = ($diff->format("%i") != "0" ? $diff->format("%i")." menit" : "");

                                        $statusCollect  = '
                                            Terlambat '.$hari.$jam.$menit.'
                                        ';
                                    }else{
                                        $statusCollect  = date_format($submitedAt, 'd M Y H:i');
                                    }

                                }

                                $btnReview = "";
                                if($item->STAT_PU == "2" && $item->ISCHECKED_PU == "0"){
                                    $btnReview = '<button class="btn btn-sm btn-info mdlReview" data-id="'.$item->ID_PU.'" data-email="'.str_replace('@', '__', $item->EMAIL_USER).'" data-file="'.$item->JAWABAN_PU.'" data-toggle="modal" data-target="#mdlReview">Review</button>';
                                }

                                $fileSubmit = '-';
                                if($item->JAWABAN_PU != null){
                                    $fileSubmit = '<a class="btn btn-sm btn-primary" href="'.$item->JAWABAN_PU.'"><i class="fa fa-file"></i></a>';
                                }

                                echo '
                                    <tr>
                                        <td>'.$item->NAMA_PRETEST.'</td>
                                        <td>'.$deadline.'</td>
                                        <td>'.$fileSubmit.'</td>
                                        <td>'.$statusCollect.'</td>
                                        <td>'.$item->KOMENTAR_PU.'</td>
                                        <td>'.$status.'</td>
                                        <td>'.$btnReview.'</td>
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
<!-- Modal Review -->
<div class="modal fade" id="mdlReview" tabindex="-1" aria-labelledby="mdlReview" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlReview">Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/ngl/review')?>" method="post">
                    <div class="form-group">
                        <label for="">File Pengerjaan</label>
                        <br>
                        <a id="mdlReview_file" target="_blank"></a>
                    </div>
                    <div class="form-group">
                        <label for="">Komentar</label><span class="text-warning">*</span>
                        <textarea name="komen" class="form-control" id="" rows="5" required></textarea>
                    </div>
            </div>

            <div class="modal-footer">
                <input type="hidden" name="id" id="mdlReview_id">
                <input type="hidden" name="email" id="mdlReview_email">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#tablePretest').DataTable();
    })
    $('#tablePretest tbody').on('click', '.mdlReview', function(){
        const id    = $(this).data('id');
        const email = $(this).data('email');
        const file  = $(this).data('file');

        let nameFile = file.split('/')
        nameFile = nameFile[nameFile.length - 1];

        $('#mdlReview_id').val(id);
        $('#mdlReview_email').val(email);
        $('#mdlReview_file').attr('href', file);
        $('#mdlReview_file').html(nameFile);
    })
</script>