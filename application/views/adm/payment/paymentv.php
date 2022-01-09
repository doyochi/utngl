<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Payment</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <div class="d-sm-flex align-items-center justify-content-between"> -->
            <!-- <h6 class="m-0 font-weight-bold text-warning mb-2">Daftar Course</h6> -->
            <!-- </div> -->
        </div>
        <div class="card-body">
            <?php
            if (!empty($this->session->flashdata('err_msg'))) {
                echo '
                        <div class="alert alert-danger" role="alert">
                           ' . $this->session->flashdata('err_msg') . '
                        </div>
                    ';
            }
            if (!empty($this->session->flashdata('succ_msg'))) {
                echo '
                        <div class="alert alert-success" role="alert">
                            ' . $this->session->flashdata('succ_msg') . '
                        </div>
                    ';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="tableCourse" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th style="width: 5%;">Payment Proof</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $item) {
                            echo '
                                    <tr>
                                        <td>' . $item->EMAIL_USER . '</td>
                                        <td class="text-center"><a class="btn btn-sm btn-primary mdlPoster" data-toggle="modal" data-target="#mdlPoster" data-src="' . $item->BUKTI_BAYAR . '"><i class="fa fa-image"></i></a></td>
                                        
                                        
                                        <td>
                                            <a class="btn btn-sm btn-success" href="'.site_url('admin/ngl/edit/'.str_replace('@', '__', $item->EMAIL_USER)).'" data-bs-toggle="tooltip" data-bs-placement="top" title="Info"><i class="fa fa-check"></i></a>
                                        </td>                            
                                    </tr>
                                ';
                        }
                        ?>
                        <!-- <a class="btn btn-sm btn-success" href="'.site_url('admin/ngl/detail/'.str_replace('@', '__', $item->EMAIL_USER)).'" data-bs-toggle="tooltip" data-bs-placement="top" title="Info"><i class="fa fa-info"></i></a> -->
                        <!-- <a class="btn btn-sm btn-info" href="'.site_url('admin/ngl/course/'.str_replace('@', "__", $item->EMAIL_USER)).'" data-bs-toggle="tooltip" data-bs-placement="top" title="Info"><i class="fa fa-pencil-ruler"></i></a> -->
                        <!-- <a class="btn btn-sm btn-info" href="' . site_url('admin/ngl/course/' . str_replace('@', "__", $item->EMAIL_USER)) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Info"><i class="fa fa-pencil-ruler"></i></a> -->
                        <!-- <a class="btn btn-sm btn-primary" href="' . site_url('admin/ngl/pretest/' . str_replace('@', "__", $item->EMAIL_USER)) . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Pretest"><i class="fa fa-clipboard-list"></i></a> -->
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
                <h5 class="modal-title" id="mdlPoster">Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="mdlPoster_src" style="max-width: 1250px;" />
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tableCourse').DataTable();
    })
    $('#tableCourse tbody').on('click', '.mdlPoster', function() {
        const src = $(this).data('src');
        $('#mdlPoster_src').attr('src', src);
    })
</script>