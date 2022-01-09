<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail | <?= $user->NAMA_USER?></h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning mb-2">Detail</h6>
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
            <form action"" enctype='multipart/form-data' method="post">
                <div class="form-row">
                    <div class="form-group col">
                        <label>Nama</label>
                        <input class="form-control" type="text" value="<?= $user->NAMA_USER?>" id="" disabled>
                    </div>
                    <div class="form-group col">
                        <label>Email</label>
                        <input class="form-control" type="text" value="<?= $user->EMAIL_USER?>" id="" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Jenis Kelamin</label>
                        <input class="form-control" type="text" value="<?= ($user->JK_USER == "1" ? "Laki - Laki" : "Perempuan")?>" id="" disabled>
                    </div>
                    <div class="form-group col">
                        <label>ALamat</label>
                        <input class="form-control" type="text" value="<?= $user->ALAMAT_USER?>" id="" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Tempat Kelahiran</label>
                        <input class="form-control" type="text" value="<?= $user->TEMPATLAHIR_USER?>" id="" disabled>
                    </div>    
                    <div class="form-group col">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" type="text" value="<?= $user->TGLLAHIR_USER." - ".$user->BULANLAHIR_USER." - ".$user->TAHUNLAHIR_USER?>" id="" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>NIK</label>
                        <input class="form-control" type="text" value="<?= $user->NIK_USER?>" id="" disabled>
                    </div>
                    <div class="form-group col">
                        <label>Perguruan Tinggi</label>
                        <input class="form-control" type="text" value="<?= $user->PERGURUANTINGGI_USER?>" id="" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>NIM</label>
                        <input class="form-control" type="text" value="<?= $user->NIM_USER?>" id="" disabled>
                    </div>
                    <div class="form-group col">
                        <label>Program Studi</label>
                        <input class="form-control" type="text" value="<?= $user->PROGRAMSTUDI_USER?>" id="" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Jenjang</label>
                        <input class="form-control" type="text" value="<?= $user->JENJANG_USER?>" id="" disabled>
                    </div>
                    <div class="form-group col">
                        <label>Semester</label>
                        <input class="form-control" type="text" value="<?= $user->SEMESTER_USER?>" id="" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Account Status</label>
                        <input class="form-control" type="text" value="<?= $user->STATUS_USER?>" id="" disabled>
                        <input class="form-control" type="hidden" value="<?= $user->STATUS_USER?>" id="">
                    </div>
                </div>
                <?php
                    $cv = explode('/', $user->CV_USER);
                    $cv = $cv[count($cv) - 1];
                    $cv = '<a href="'.$user->CV_USER.'"><i class="fa fa-file"></i> '.$cv.'</a>';

                    $portfolio = "-";
                    if($user->PORTFOLIO_USER != null){
                        $portfolio = explode('/', $user->PORTFOLIO_USER);
                        $portfolio = $portfolio[count($portfolio) - 1];
                        $portfolio = '<a href="'.$user->PORTFOLIO_USER.'"><i class="fa fa-file"></i> '.$portfolio.'</a>';
                    }

                    $rekom = "-";
                    if($user->SURATREKOM_USER != null){
                        $rekom = explode('/', $user->SURATREKOM_USER);
                        $rekom = $rekom[count($rekom) - 1];
                        $rekom = '<a href="'.$user->SURATREKOM_USER.'"><i class="fa fa-file"></i> '.$rekom.'</a>';
                    }

                    $dokPend = "-";
                    if($user->DOKPEND_USER != null){
                        $tempDok = explode(';', $user->DOKPEND_USER);
                        $dokPend = "";
                        foreach ($tempDok as $item) {
                            $temp = explode('/', $item);
                            $temp = $temp[count($temp) - 1];     
                            $dokPend .= '<a href="'.$item.'"><i class="fa fa-file"></i> '.$temp.'</a><br>';
                        }
                    }
                ?>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Curiculum Vitae</label>
                        <br>
                        <?= $cv?>    
                    </div>
                    <div class="form-group col">
                        <label>Portfolio</label>
                        <br>
                        <?= $portfolio?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Surat Rekomendasi</label>
                        <br>
                        <?= $dokPend?>    
                    </div>
                    <div class="form-group col">
                        <label>Dokumen Pendukung</label>
                        <br>
                        <?= $portfolio?>
                    </div>
                </div>
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
